pipeline {
    agent any

    environment {
        ECR_REPO = "590715976556.dkr.ecr.ap-northeast-2.amazonaws.com/whs/devops"
        IMAGE_TAG = "latest"
        REGION = "ap-northeast-2"
        SBOM_EC2_USER = "ec2-user"
        SBOM_EC2_IP = "172.31.11.127"
    }

    stages {
        stage('📦 Checkout') {
            steps {
                checkout scm
            }
        }

        stage('🔨 Build JAR') {
            steps {
                sh 'mvn clean package -DskipTests'
            }
        }

        stage('🚀 Generate SBOM via CDXGEN Docker') {
            steps {
                script {
                    def repoUrl = scm.userRemoteConfigs[0].url
                    def repoName = repoUrl.tokenize('/').last().replace('.git', '')

                    echo "📍 REPO URL: ${repoUrl}"
                    echo "📁 Project Name: ${repoName}"

                    withCredentials([sshUserPrivateKey(credentialsId: 'jenkins-sbom-key', keyFileVariable: 'SSH_KEY')]) {
                        def remoteCmd = """
                            ssh -i \$SSH_KEY -o StrictHostKeyChecking=no ${env.SBOM_EC2_USER}@${env.SBOM_EC2_IP} '
                                echo "[+] 클린 작업: /tmp/${repoName} 제거"
                                rm -rf /tmp/${repoName} && \\

                                echo "[+] Git 저장소 클론: ${repoUrl}"
                                git clone ${repoUrl} /tmp/${repoName} && \\

                                 echo "[+] Java/언어 감지"
                                cd /tmp/${repoName} && \\
                                bash /home/ec2-user/detect-java-version.sh && \\

                                IMAGE_TAG=\$(cat /tmp/cdxgen_image_tag.txt) && \\
                                echo "[+] 선택된 이미지 태그: \$IMAGE_TAG" && \\

                                echo "[+] CDXGEN 실행"
                                docker run --rm -v \$(pwd):/app ghcr.io/cyclonedx/cdxgen-\$IMAGE_TAG:latest -o sbom.json && \\

                                echo "[+] Dependency-Track 업로드"
                                /home/ec2-user/upload-sbom.sh ${repoName}
                            '
                        """
                        sh remoteCmd
                    }
                }
            }
        }

        stage('🐳 Docker Build') {
            steps {
                sh "docker build -t ${env.ECR_REPO}:${env.IMAGE_TAG} ."
            }
        }

        stage('🔐 ECR Login') {
            steps {
                sh "aws ecr get-login-password --region ${env.REGION} | docker login --username AWS --password-stdin ${env.ECR_REPO}"
            }
        }

        stage('🚀 Push to ECR') {
            steps {
                sh "docker push ${env.ECR_REPO}:${env.IMAGE_TAG}"
            }
        }
    }

    post {
        always {
            sh 'rm -f sbom.json || true'
        }
    }
}
