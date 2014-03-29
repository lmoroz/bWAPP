<?php

/*

bWAPP, or a buggy web application, is a free and open source deliberately insecure web application.
It helps security enthusiasts, developers and students to discover and to prevent web vulnerabilities.
bWAPP covers all major known web vulnerabilities, including all risks from the OWASP Top 10 project!
It is for educational purposes only.

Enjoy!

Malik Mesellem
Twitter: @MME_IT

© 2014 MME BVBA. All rights reserved.

*/

include("connect_i.php");
include("admin/settings.php");

session_start();

$message = "";

if(isset($_POST["form"]))   
{

    $login = $_POST["login"];
    $login = mysqli_real_escape_string($link, $login);

    $password = $_POST["password"];
    $password = mysqli_real_escape_string($link, $password);
    $password = hash("sha1", $password, false);

    $sql = "SELECT * FROM users WHERE login = '" . $login; 
    $sql.= "' AND BINARY password = '" . $password . "'";
    // Checks if the user is activated
    $sql.= " AND activated = 1";

    // Debugging
    // echo $sql;

    $recordset = $link->query($sql);

    if(!$recordset)
    {

        die("Error: " . $link->error);

    }

    else
    {       

        $row = $recordset->fetch_object();

        // Debugging
        // print_r($row);

        if($row)
        {

            session_regenerate_id(true);

            $token = sha1(uniqid(mt_rand(0,100000)));

            $_SESSION["login"] = $row->login;
            $_SESSION["admin"] = $row->admin;
            $_SESSION["token"] = $token;
            $_SESSION["amount"] = 1000;  
    
            $security_level_cookie = $_POST["security_level"];

            switch($security_level_cookie)
            {

                case "0" :

                    $security_level_cookie = "0";
                    break;

                case "1" :

                    $security_level_cookie = "1";
                    break;

                case "2" :

                    $security_level_cookie = "2";
                    break;

                default : 

                    $security_level_cookie = "0";
                    break;

            }
    
            if($evil_bee == 1)
            {

                setcookie("security_level", "666", time()+60*60*24*365, "/", "", false, false);

            }

            else        
            {

                setcookie("security_level", $security_level_cookie, time()+60*60*24*365, "/", "", false, false);

            }

            header("Location: portal.php");
            
            exit;

        }

        else        
        {

        $message = "<font color=\"red\">Invalid credentials or user not activated!</font>";

        }

    } 

}

?>
<!DOCTYPE html>
<html>
    
<head>
        
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Architects+Daughter">
<link rel="stylesheet" type="text/css" href="stylesheets/stylesheet.css" media="screen" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<!--<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>-->
<script src="js/html5.js"></script>

<title>bWAPP - Login</title>

</head>

<body>
    
<header>

<h1>bWAPP</h1>

<h2>an extremely buggy web app !</h2>

</header>    

<div id="menu">
      
    <table>
        
        <tr>
            
            <td><font color="#ffb717">Login</font></td>
            <td><a href="user_new.php">New User</a></td>
            <td><a href="info.php">Info</a></td>
			<td><a href="training.php">Talks & Training</a></td>
            <td><a href="http://itsecgames.blogspot.com" target="_blank">Blog</a></td>
			
        </tr>
        
    </table>   
   
</div> 

<div id="main">

    <h1>Login</h1>

    <p>Enter your credentials <i>(bee/bug)</i>.</p>

    <form action="<?php echo($_SERVER["SCRIPT_NAME"]);?>" method="POST">

        <p><label for="login">Login:</label><br />
        <input type="text" id="login" name="login" size="20" autocomplete="off"></p> 

        <p><label for="password">Password:</label><br />
        <input type="password" id="password" name="password" size="20" autocomplete="off"></p>

        <p><label for="security_level">Set the security level:</label><br />

        <select name="security_level">

            <option value="0">low</option>
            <option value="1">medium</option>
            <option value="2">high</option>

        </select>

        </p>  

        <button type="submit" name="form" value="submit">Login</button>  

    </form>

    <br />
    <?php

    echo $message;

    $link->close();

    ?>

</div>
    
<div id="side">    
    
    <a href="http://itsecgames.blogspot.com" target="blank_" class="button"><img src="./images/blogger.png"></a>
    <a href="http://be.linkedin.com/in/malikmesellem" target="blank_" class="button"><img src="./images/linkedin.png"></a>
    <a href="http://twitter.com/MME_IT" target="blank_" class="button"><img src="./images/twitter.png"></a>
    <a href="http://www.facebook.com/pages/MME-IT-Audits-Security/104153019664877" target="blank_" class="button"><img src="./images/facebook.png"></a>

</div>     
    
<div id="disclaimer">
          
    <p>bWAPP is for educational purposes only / Follow <a href="http://twitter.com/MME_IT" target="_blank">@MME_IT</a> on Twitter and ask for our cheat sheet, containing all solutions! / Need a <a href="http://www.mmeit.be/bWAPP/training.htm" target="_blank">training</a>? / &copy; 2014 MME BVBA</p>
   
</div>
    
<div id="bee">
    
    <img src="./images/bee_1.png">
    
</div>
      
</body>
    
</html>
