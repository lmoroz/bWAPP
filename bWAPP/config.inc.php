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

// Connection settings
$server = $db_server;
$username = $db_username;
$password = $db_password;
$database = $db_name;

// Connection settings, used in older bWAPP versions
// $server = "localhost";
// $username = "root";
// $password = "";
// $database = "bWAPP";

?>