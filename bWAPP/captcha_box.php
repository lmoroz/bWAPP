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

?>
<!DOCTYPE html>
<html>
    
<head>
        
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>bWAPP - Captcha box</title>

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