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
$link = mysql_connect($server, $username, $password);

// Checks the connection
if(!$link)
{
    
    // @mail($recipient, "Could not connect to server: ", mysql_error());
    
    die("Could not connect to the server: " . mysql_error());
    
}

// Connects to the database
$database = mysql_select_db($database, $link);

// Checks the connection
if(!$database)
{
    
    // @mail($recipient, "Could not connect to database: ", mysql_error());
    
    die("Could not connect to the database: " . mysql_error()); 

}

// mysql_close($link);

?>