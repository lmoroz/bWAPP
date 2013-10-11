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

header("Content-Type: text/plain");

if(isset($_SERVER["HTTP_ORIGIN"]) and $_SERVER["HTTP_ORIGIN"] == "http://intranet.itsecgames.com")
{

    header("Access-Control-Allow-Origin: http://intranet.itsecgames.com");

	echo "Wolverine's secret: What's a Magneto?";
	
}

else
{

    echo "This is just a normal page with no secrets ;)";

}

?>