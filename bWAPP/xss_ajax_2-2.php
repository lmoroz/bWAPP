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

if(isset($_GET["title"]))
{

    // Creates the movie table
    $movies = array("CAPTAIN AMERICA", "IRON MAN", "SPIDER-MAN", "THE INCREDIBLE HULK", "THE WOLVERINE", "THOR", "X-MEN");

    // Retrieves the movie title
    $title = $_GET["title"];

    if($_COOKIE["security_level"] != "1" && $_COOKIE["security_level"] != "2")
    {   

        // Generates the output depending on the movie title received from the client
        if (in_array(strtoupper($title), $movies))
            echo '{"movies":[{"response":"Yes! We have that movie..."}]}';
        else if (trim($title) == "")
            echo '{"movies":[{"response":"HINT: our master really loves Marvel movies :)"}]}';
         else
            echo '{"movies":[{"response":"' . $title . '??? Sorry, we don\'t have that movie :("}]}';

    }

    else      
    {

        // Generates the JSON output
        header("Content-Type: text/json; charset=utf-8");
        
       // Generates the output depending on the movie title received from the client
        if (in_array(strtoupper($title), $movies))
        {
       
            // Creates the response array
            $movies = array(
                "movies" => array(
                    array(
                        "response" => "Yes! We have that movie..."
                    )
                )
            );

        }

        else if (trim($title) == "")       
        {

            // Creates the response array
            $movies = array(
                "movies" => array(
                    array(
                        "response" => "HINT: our master really loves Marvel movies :)"
                    )
                )
            );

        }

        else        
        {

            // Creates the response array
            $movies = array(
                "movies" => array(
                    array(
                        "response" => xss_check_3($title) . "??? Sorry, we don't have that movie :("
                    )
                )
            );

        }

        // Returns the JSON representation
        echo json_encode($movies);

    }

}

// Multiple entries
/*
$movies = array(
    "movies" => array(
        array(
            "title" => "Iron Man"
        ),
        array(
            "title" => "Captain America"
        )
    )
);
*/

?>