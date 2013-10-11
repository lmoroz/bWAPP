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

include("security.php");
include("security_level_check.php");
include("functions_external.php");
include("connect_i.php");
include("selections.php");

$login = $_SESSION["login"];

$sql = "SELECT * FROM users WHERE login = '" . $login . "'";

$recordset = $link->query($sql);             

if (!$recordset)
{

    die("Error: " . $link->error);

}

$row = $recordset->fetch_object();

header("Content-Type: text/plain");

if ($row)
{

    $secret = $row->secret;

    echo "Your secret: " . $secret;          

}  

?>