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

switch($_COOKIE["security_level"])
{
        
    case "0" :       
            
        // Do nothing
    
        break;
        
    case "1" :            
        
        // Destroys the session        
        session_destroy();       
        
        break;
        
    case "2" :            
                       
        // Unsets all of the session variables
        $_SESSION = array();
        
        // Destroys the session    
        session_destroy();
                
        break;
        
    default :

        // Do nothing
        
        break;
       
}

// Deletes the cookies
setcookie("admin", "", time()-3600, "/", "", false, false);
setcookie("top_security", "", time()-3600, "/", "", false, false);
setcookie("top_security_nossl", "", time()-3600, "/", "", false, false);
setcookie("top_security_ssl", "", time()-3600, "/", "", false, false);
setcookie("movie_genre", "", time()-3600, "/", "", false, false);

header("location: login.php");

?>