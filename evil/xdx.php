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

if(isset($_POST["data"]))
{

    $req_dump = $_POST["data"];
    $fp = fopen("xdx.log", "w");
    fwrite($fp, $req_dump);
    fclose($fp);
    exit;

}

?>
<!DOCTYPE html>
<html>
 
<object type="application/x-shockwave-flash" data="xdx.swf" width="1" height="1">
    
    <param name="movie" value="xdx.swf" />

</object>

</html>