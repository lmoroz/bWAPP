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

// A.I.M.
// A.I.M., or Authentication Is Missing, is a no-authentication mode
// It can be used for testing web scanners and crawlers
// Steps to crawl all pages, and to detect all vulnerabilities without authentication:
//   1. Change the IP address(es) in this file to the IP address(es) of your tool(s)
//   2. Point your web scanners, crawlers or attack tools to this URL: http://[bWAPP-IP]/bWAPP/aim.php
//   3. Push the button: all hell breaks loose...
$AIM_IPs = array("6.6.6.6", "6.6.6.7");
//
// Add here the files that could break bWAPP or your web server in the A.I.M. mode
$AIM_exclusions = array("aim.php", "ba_logout.php", "csrf_1.php", "cs_validation.php", "http_verb_tampering.php", "ldapi.php", "ldap_connect.php", "portal.php", "sm_dos_2.php", "sm_obu_files.php");

// Evil Bee Mode
// All bWAPP security levels are bypassed in this mode by using a fixed cookie (security_level: 666)
// It can be combined with the A.I.M. mode, your web scanner will ONLY detect the vulnerabilities
// Evil bees are HUNGRY :)
// Possible values: 0 (off) or 1 (on)
$evil_bee = 0;

// Credentials
// Static credentials, used on some pages
$login = "bee";
$password = "bug";

?>