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

include("security.php");
include("security_level_check.php");

?>
<!DOCTYPE html>
<html>
    
<head>
        
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>bWAPP - CAPTCHA box</title>

</head>

<body>

<table>

    <tr>
        
        <td><img src="captcha.php"></iframe></td>        
        <td><input type="button" value="Reload" onClick="window.location.reload()"></td>
        
    </tr>
    
</table>      
        
</body>

</html>