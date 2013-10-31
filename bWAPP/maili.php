<?php

/*

bWAPP, or a buggy web application, is a free and open source deliberately insecure web application.
It helps security enthusiasts, developers and students to discover and to prevent web vulnerabilities.
bWAPP covers all major known web vulnerabilities, including all risks from the OWASP Top 10 project!
It is for educational purposes only.

Enjoy!

Malik Mesellem
Twitter: @MME_IT

© 2013 MME BVBA. All rights reserved.

*/

include("security.php");
include("security_level_check.php");
include("functions_external.php");
include("selections.php");

$email = "";
$recipient = "bwapp@mailinator.com";
$subject = "bWAPP - Mail Injection"; 
$message = "";
// $debug = "false";

if(isset($_POST["form"]))
{

    // E-mail validation if the security level is MEDIUM or HIGH
    if(!email_check_2($_POST["email"]) && ($_COOKIE["security_level"] == "1" || $_COOKIE["security_level"] == "2"))
    {
        
        $message = "<font color=\"red\">Enter a valid e-mail address!</font>";     
        
    }
    
    else
    {

        // If the SMTP server is blank, then the default SMTP server is set (php.ini)
        if($_POST["server"] != "")
        {
        
            ini_set( "SMTP", $_POST["server"]);
        
            //Debugging
            // $debug = "true";     
        
        }
         
        // HIGH security level
        if($_COOKIE["security_level"] == "2")  
        {                     
            
            $email = maili_check_2($_POST["email"]);
            
            // Debugging
            // $email = "foo@foo.com\r\nCc:bar@bar.com";

        }
    
        else
        {       
        
            $email = $_POST["email"];
        
            // Debugging
            // $email = "foo@foo.com\r\nCc:bar@bar.com";        
        
        }
    
        // Formatting the message body        
        $content =  "Content:\n\n";
        $content .= "Name: " . $_POST["name"] . "\n";
        $content .= "E-mail: " . $email . "\n";  
        $content .= "Remarks: \n";
        $content .= $_POST["remarks"] . "\n\n";
        $content .= "Greets from bWAPP!";  
    
        // Sends the e-mail
        $status = @mail($recipient, $subject, $content, "From: $email");    

        if($status != true)
        {

            $message = "<font color=\"red\">An e-mail could not be send...</font>";

            // Debugging
            // die("Error: mail was NOT send");
            // echo "Mail was NOT send";

        }

        else
        {

            $message = "<font color=\"green\">Your message has been sent to our master bee!</font>";

            // Debugging
            // echo "e-mail: ".$email;
            // echo "<br />";
            // echo "SMTP server: ". $debug;   
 
        }

    }

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

<title>bWAPP - Mail Injection</title>

</head>

<body>
    
<header>

<h1>bWAPP</h1>

<h2>an extremely buggy web app !</h2>

</header>    

<div id="menu">
      
    <table>
        
        <tr>
            
            <td><a href="portal.php">Bugs</a></td>
            <td><a href="password_change.php">Change Password</a></td>
            <td><a href="user_extra.php">Create User</a></td>
            <td><a href="security_level_set.php">Set Security Level</a></td>
            <td><a href="reset.php" onclick="return confirm('All settings will be cleared. Are you sure?');">Reset</a></td>            
            <td><a href="credits.php">Credits</a></td>
            <td><a href="http://itsecgames.blogspot.com" target="_blank">Blog</a></td>
            <td><a href="logout.php" onclick="return confirm('Are you sure you want to leave?');">Logout</a></td>
            <td><font color="red">Welcome <?php if(isset($_SESSION["login"])){echo ucwords($_SESSION["login"]);}?></font></td>
            
        </tr>
        
    </table>   
   
</div> 

<div id="main">
    
    <h1>Mail Injection</h1>

    <form action="<?php echo($_SERVER["SCRIPT_NAME"]);?>" method="POST">

        <p><label for="name">Name:</label><br />
        <input type="text" id="name" name="name"></p>    
        <?php

        // If the security level is MEDIUM or HIGH, then show an 'input text' instead of a 'text area'
        if($_COOKIE["security_level"] == "1" or $_COOKIE["security_level"] == "2")
        {

        ?>

        <p><label for="email">E-mail:</label><br />
        <input type="text" id="email" name="email"></p>         
        <?php        

        }
        else
        {

        ?>

        <p><label for="email">E-mail:</label><br />   
        <textarea name="email"></textarea>         
        <?php      

        }

        ?>       
        <p><label for="remarks">Remarks:</label><br />
        <textarea name="remarks" cols="50" rows="3" id="remarks"></textarea></p>

        <p><label for="server">Mail server:</label><br />
        <input type="text" id="server" name="server" value=""></p>

        <button type="submit" name="form" value="submit">Send</button><?php echo "&nbsp;&nbsp;" . $message;?>     

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