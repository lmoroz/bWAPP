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
            
        header("location: ba_pwd_attacks_1.php");
        
        break;
        
    case "1" :
                
        header("location: ba_pwd_attacks_2.php");
        
        break;
        
    case "2" :           
       
        header("location: ba_pwd_attacks_4.php");
        
        break;
        
    default : 
            
        header("location: ba_pwd_attacks_1.php");
        
        break;
       
} 

?>