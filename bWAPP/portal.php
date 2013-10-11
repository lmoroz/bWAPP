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
include("selections.php");

if(isset($_POST["form"]) && isset($_POST["bug"]))
{
        
            $key = $_POST["bug"];
            $bug = explode(",", trim($bugs[$key]));
            
            // Debugging
            // echo " value: " . $bug[0];
            // echo " filename: " . $bug[1] . "<br />";
            
            header("location: " . $bug[1]); 

}

?>
<!DOCTYPE html>
<html>
    
<head>
        
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Architects+Daughter">
<link rel="stylesheet" type="text/css" href="stylesheets/stylesheet.css" media="screen" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<!--<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>-->
<script src="js/html5.js"></script>

<title>bWAPP</title>

</head>

<body>

<header>

<h1>bWAPP</h1>

<h2>an extremely buggy web application !</h2>

</header>
   
<div id="menu">
      
    <table>
        
        <tr>
            
            <td><font color="#ffb717">Bugs</font></td>
            <td><a href="password_change.php">Change Password</a></td>
            <td><a href="user_extra.php">Create User</a></td>
            <td><a href="security_level_set.php">Set Security Level</a></td>
            <td><a href="reset.php" onclick="return confirm('All settings will be cleared. Are you sure?');">Reset</a></td>            
            <td><a href="credits.php">Credits</a></td>
            <td><a href="http://itsecgames.blogspot.com" target="_blank">Blog</a></td>
            <td><a href="logout.php" onclick="return confirm('Are you sure you want to leave?');">Logout</a></td>
            <td><font color="red">Welcome <?php echo ucwords($_SESSION["login"])?></font></td>
            
        </tr>
        
    </table>   
   
</div> 

<div id="main">
        
    <h1>Portal</h1>
    
    <p>bWAPP or <i>a buggy web application</i> is build to allow security enthusiasts, students and developers to better secure web applications.
    bWAPP prepares you to conduct successful penetration testing and ethical hacking projects.<br />
    bWAPP contains all vulnerabilities from the OWASP Top 10 project. It is for educational purposes only.</p>

    <p><i>Which bug do you want to hack today? :-)</i></p>

    <form action="<?php echo($_SERVER["SCRIPT_NAME"]);?>" method="POST">
        
        <select name="bug" size="9">
     
            <?php

            // Lists the options from the array 'bugs' (bugs.txt)
            foreach ($bugs as $key => $value)
            {

               $bug = explode(",", trim($value));

               // Debugging
               // echo "key: " . $key;
               // echo " value: " . $bug[0];
               // echo " filename: " . $bug[1] . "<br />";

               echo "<option value='$key'>$bug[0]</option>";

            }

            ?>

        </select>
        
        <br />
                
        <button type="submit" name="form" value="submit">Hack</button>
             
    </form>

</div>

<div id="side">    
 
    <a href="http://itsecgames.blogspot.com" target="blank_" class="button"><img src="./images/blogger.png"></a>
    <a href="http://be.linkedin.com/in/malikmesellem" target="blank_" class="button"><img src="./images/linkedin.png"></a>
    <a href="http://twitter.com/MME_IT" target="blank_" class="button"><img src="./images/twitter.png"></a>
    <a href="http://www.facebook.com/pages/MME-IT-Audits-Security/104153019664877" target="blank_" class="button"><img src="./images/facebook.png"></a>

</div>     
    
<div id="disclaimer">
          
    <p>bWAPP or a buggy web application is for educational purposes only / © 2013 <b>MME BVBA</b>. All rights reserved.</p>
   
</div>
    
<div id="bee">
    
    <img src="./images/bee_1.png">
    
</div>
    
    <div id="security_level">
  
    <form action="<?php echo($_SERVER["SCRIPT_NAME"]);?>" method="POST">
        
        <label>Set your security level:</label><br />
        
        <select name="security_level">
            
            <option value="0">low</option>
            <option value="1">medium</option>
            <option value="2">high</option> 
            
        </select>
        
        <button type="submit" name="form_security_level" value="submit">Set</button>
        <font size="4">Current: <b><?php echo $security_level?></b></font>
        
    </form>   
    
</div>
    
<div id="bug">

    <form action="<?php echo($_SERVER["SCRIPT_NAME"]);?>" method="POST">
        
        <label>Choose your bug:</label><br />
        
        <select name="bug">
            
<?php

// Lists the options from the array 'bugs' (bugs.txt)
foreach ($bugs as $key => $value)
{
    
   $bug = explode(",", trim($value));
   
   // Debugging
   // echo "key: " . $key;
   // echo " value: " . $bug[0];
   // echo " filename: " . $bug[1] . "<br />";
   
   echo "<option value='$key'>$bug[0]</option>";
 
}

?>

            
        </select>
        
        <button type="submit" name="form_bug" value="submit">Hack</button>
        
    </form>
    
</div>
      
</body>
    
</html>
