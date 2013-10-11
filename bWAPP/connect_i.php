<?php

/*

bWAPP or a buggy web application is a free and open source web application
build to allow security enthusiasts, students and developers to better secure web applications.
It is for educational purposes only.

Please feel free to grab the code and make any improvements you want.
Just say thanks.
https://twitter.com/MME_IT

© 2013 MME BVBA. All rights reserved.

*/

// Connection settings
include("config.inc.php");

// Connects to the server
$link = new mysqli($server, $username, $password, $database);

// Checks the connection
if ($link->connect_error)
{
    
    // @mail($recipient, "Connection failed: ", $link->connect_error);
    
    die("Connection failed: " . $link->connect_error);   
   
}

// $link->close();

?>