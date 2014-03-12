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

include("admin/settings.php");

session_start();

if(in_array($_SERVER["REMOTE_ADDR"], $AIM_IPs))
{

    ini_set("display_errors", 0);

    $_SESSION["login"] = "A.I.M.";
    $_SESSION["admin"] = "1";

}

if(!(isset($_SESSION["login"]) && $_SESSION["login"]))
{
    
    header("Location: login.php");
    
    exit;
   
}

?>