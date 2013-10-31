<?php

/*

bWAPP, or a buggy web application, is a free and open source deliberately insecure web application.
It helps security enthusiasts, developers and students to discover and to prevent web vulnerabilities.
bWAPP covers all major known web vulnerabilities, including all risks from the OWASP Top 10 project!
It is for educational purposes only.

Enjoy!

Malik Mesellem
Twitter: @MME_IT

© 2013 MME BVBA. All rights reserved.

*/

?>
<!DOCTYPE html>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<title>A.I.M.</title>

</head>

<body style="font-family:arial;font-size:15px;">

<h1>A.I.M.</h1>

<p>A no-authentication mode for testing web scanners and crawlers.</p>

<p><u>Procedure</u></p>

<p>1. Change the IP address in the 'settings.php' file to your IP.</p>

<p>2. Point your scanner or crawler to this URL.</p>

<p>3. All hell breaks loose, evil bees are HUNGRY ;)</p>

<p><img src="./images/evil_bee.png"></p>

<?php

$bugs = file("bugs.txt");

// Displays all bugs, from the array 'bugs' (bugs.txt)
foreach ($bugs as $key => $value)
{

    $bug = explode(",", trim($value));

    // Debugging
    // echo "key: " . $key;
    // echo " value: " . $bug[0];
    // echo " filename: " . $bug[1] . "<br />";

    echo "<p><a href='$bug[1]'>$bug[0]</a></p>";

}

?>

</body>

</html>