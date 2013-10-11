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
include("connect_i.php");
include("selections.php");

$message = "";
$db_reset = false;

// Cookie operations

// Deletes the cookie 'admin' 
setcookie("admin", "0", time()-300, "/", "", false, false);

// File operations

// Deletes the file '.htaccesss' 
$file = "documents/.htaccess";

if(file_exists($file))
{    

    unlink($file);

}

// Deletes the file 'account' 
$file = "passwords/accounts.txt";

if(file_exists($file))
{

    unlink($file);
      
}

// Database operations

// Recreates the database
if(isset($_GET["secret"]) && $_GET["secret"]== "bWAPP")
{

    // Deletes the database 'bWAPP'
    $sql = "DROP DATABASE IF EXISTS bWAPP";

    $recordset = $link->query($sql);             

    if(!$recordset)
    {

        die("Error: " . $link->error);

    }

    // Creates the database 'bWAPP'
    $sql = "CREATE DATABASE IF NOT EXISTS bWAPP";

    $recordset = $link->query($sql);             

    if(!$recordset)
    {

        die("Error: " . $link->error);

    }

    // Selects the database 'bWAPP'
    mysqli_select_db($link,"bWAPP");

    // Drops the table 'users' 
    $sql = "DROP TABLE IF EXISTS users";

    $recordset = $link->query($sql);             

    if(!$recordset)
    {

        die("Error: " . $link->error);

    }

    // Creates the table 'users' 
    $sql = "CREATE TABLE IF NOT EXISTS users (id int(10) NOT NULL AUTO_INCREMENT,login varchar(100) DEFAULT NULL,password varchar(100) DEFAULT NULL,";
    $sql.= "email varchar(100) DEFAULT NULL,secret varchar(100) DEFAULT NULL,activation_code varchar(100) DEFAULT NULL,activated tinyint(1) DEFAULT '0',";
    $sql.= "reset_code varchar(100) DEFAULT NULL,admin tinyint(1) DEFAULT '0',PRIMARY KEY (id)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

    $recordset = $link->query($sql);             

    if(!$recordset)
    {

        die("Error: " . $link->error);

    }

    // Populates the table 'users' with the default user
    $sql = "INSERT INTO users (login, password, email, secret, activation_code, activated, reset_code, admin) VALUES";
    $sql.= "('administrator', 'f494a6bb2db46bc9be853cb4d345edd599b80ae9', 'bwapp-admin@mailinator.com', 'a buggy web application!', NULL, 1, NULL, 1),";
    $sql.= "('bee', '6885858486f31043e5839c735d99457f045affd0', 'bwapp-bee@mailinator.com', 'Any bugs?', NULL, 1, NULL, 0)";

    $recordset = $link->query($sql);             

    if(!$recordset)
    {

        die("Error: " . $link->error);

    }
    
    $db_reset = true;

}

// Drops the table 'blog' 
$sql = "DROP TABLE IF EXISTS blog";

$recordset = $link->query($sql);             
        
if(!$recordset)
{
        
    die("Error: " . $link->error);
            
}

// Creates the table 'blog'
$sql = "CREATE TABLE IF NOT EXISTS blog (id int(10) NOT NULL AUTO_INCREMENT,owner varchar(100) DEFAULT NULL,";
$sql.= "entry varchar(500) DEFAULT NULL,date datetime DEFAULT NULL,PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

$recordset = $link->query($sql);             
        
if(!$recordset)
{
        
    die("Error: " . $link->error);
            
}

// Drops the table 'movies' 
$sql = "DROP TABLE IF EXISTS movies";

$recordset = $link->query($sql);             
        
if(!$recordset)
{
        
    die("Error: " . $link->error);
            
}

// Creates the table 'movies' 
$sql = "CREATE TABLE IF NOT EXISTS movies (id int(10) NOT NULL AUTO_INCREMENT,title varchar(100) DEFAULT NULL,";
$sql.= "release_year varchar(100) DEFAULT NULL,genre varchar(100) DEFAULT NULL,main_character varchar(100) DEFAULT NULL,";
$sql.= "imdb varchar(100) DEFAULT NULL,PRIMARY KEY (id)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

$recordset = $link->query($sql);             
        
if(!$recordset)
{
        
    die("Error: " . $link->error);
            
}

// Populates the table 'movies' 
$sql = "INSERT INTO movies (title, release_year, genre, main_character, imdb) VALUES ('Iron Man', '2008', 'action', 'Tony Stark', 'tt0371746'),";
$sql.= "('The Amazing Spider-Man', '2012', 'action', 'Peter Parker', 'tt0948470'),";
$sql.= "('The Incredible Hulk', '2008', 'action', 'Bruce Banner', 'tt0800080'),";
$sql.= "('The Dark Knight Rises', '2012', 'action', 'Bruce Wayne', 'tt1345836'),";
$sql.= "('The Cabin in the Woods', '2011', 'horror', 'Some zombies', 'tt1259521'),";
$sql.= "('Terminator Salvation', '2009', 'sci-fi', 'John Connor', 'tt0438488')";

$recordset = $link->query($sql);             
        
if(!$recordset)
{
        
    die("Error: " . $link->error);
            
}

// Drops the table 'heroes' 
$sql = "DROP TABLE IF EXISTS heroes";

$recordset = $link->query($sql);             
        
if(!$recordset)
{
        
    die("Error: " . $link->error);
            
}

// Creates the 'heroes' table
$sql = "CREATE TABLE IF NOT EXISTS heroes (id int(10) NOT NULL AUTO_INCREMENT,login varchar(100) DEFAULT NULL,password varchar(100) DEFAULT NULL,secret varchar(100) DEFAULT NULL,";
$sql.= "PRIMARY KEY (id)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

$recordset = $link->query($sql);             

if(!$recordset)
{

        die("Error: " . $link->error);

}

// Populates the table 'heroes' with the default users
$sql = "INSERT INTO heroes (login, password, secret) VALUES";
$sql.= "('neo', 'trinity', 'Oh why didn\'t I took that BLACK pill?'),";
$sql.= "('alice', 'loveZombies', 'There\'s a cure!'),";
$sql.= "('thor', 'Asgard', 'Oh, no... this is Earth... isn\'t it?'),";
$sql.= "('wolverine', 'Log@N', 'What\'s a Magneto?'),";
$sql.= "('johnny', 'm3ph1st0ph3l3s', 'I\'m the Ghost Rider!'),";
$sql.= "('seline', 'm00n', 'It wasn\'t the Lycans. It was you.')";

$recordset = $link->query($sql);             

if(!$recordset)
{

        die("Error: " . $link->error);

}

$link->close();

if($db_reset == true)
{
    
    // Destroys the session 
    $_SESSION = array();
    session_destroy();

    header("location: login.php");
    
    exit;

}

$message = "The application has been resetted!";

/*

// Other SQL statements

// Clears a table
// $sql = "truncate table ...";

//  Inserts a SQL statement from a file
$file = "file.sql";

$fp    = fopen($file, 'r');
$sql = fread($fp, filesize($file));
fclose($fp); 

$link->query($sql);

$recordset = $link->query($sql);             
        
if(!$recordset)
{
        
    die("Error: " . $link->error);
            
}
 
*/

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

<title>bWAPP - Reset</title>

</head>

<body>

<header>

<h1>bWAPP</h1>

<h2>an extremely buggy web application !</h2>

</header>
   
<div id="menu">
      
    <table>
        
        <tr>
            
            <td><a href="portal.php">Bugs</a></td>
            <td><a href="password_change.php">Change Password</a></td>
            <td><a href="user_extra.php">Create User</a></td>
            <td><a href="security_level_set.php">Set Security Level</a></td>
            <td><font color="#ffb717">Reset</font></td>            
            <td><a href="credits.php">Credits</a></td>
            <td><a href="http://itsecgames.blogspot.com" target="_blank">Blog</a></td>
            <td><a href="logout.php" onclick="return confirm('Are you sure you want to leave?');">Logout</a></td>
            <td><font color="red">Welcome <?php echo ucwords($_SESSION["login"])?></font></td>
            
        </tr>
        
    </table>   
   
</div> 

<div id="main">
    
    <h1>Reset</h1>

    <p><?php echo $message ?></p>

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