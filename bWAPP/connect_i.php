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

// Connection settings
include("config.inc.php");

// Connects to the server
$link = new mysqli($server, $username, $password, $database);

// Checks the connection
if($link->connect_error)
{
    
    // @mail($recipient, "Connection failed: ", $link->connect_error);
    
    die("Connection failed: " . $link->connect_error);   
   
}

// $link->close();

?>