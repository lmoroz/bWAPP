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

header("Content-Type: text/plain");

if(isset($_SERVER["HTTP_ORIGIN"]) and $_SERVER["HTTP_ORIGIN"] == "http://intranet.itsecgames.com")
{

    header("Access-Control-Allow-Origin: http://intranet.itsecgames.com");

	echo "Wolverine's secret: What's a Magneto?";
	
}

else
{

    echo "This is just a normal page with no secrets :)";

}

?>