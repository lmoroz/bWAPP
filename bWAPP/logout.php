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

// Destroys the session 
$_SESSION = array();
session_destroy();

// Deletes the cookies
setcookie("admin", "", time()-3600, "/", "", false, false);
setcookie("top_security", "", time()-3600, "/", "", false, false);
setcookie("top_security_nossl", "", time()-3600, "/", "", false, false);
setcookie("top_security_ssl", "", time()-3600, "/", "", false, false);
setcookie("movie_genre", "", time()-3600, "/", "", false, false);

header("location: login.php");

?>