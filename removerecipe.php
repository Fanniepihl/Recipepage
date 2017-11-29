<?php

include("config.php");


$recipeid = trim($_GET['recipeid']);                                    #Hämta recipeid från databasen. 
echo '<INPUT type="hidden" name="recipeid" value=' . $recipeid . '>';

$recipeid = trim($_GET['recipeid']);      // Om Usern råkar klicka ett extra mellanslag/an extra space in the form befor or/and 
$recipeid = addslashes($recipeid);        // the word the user search for, this function will take that whitspace/space away so 
                                            // no error 
                                        //addslashes för ´s. 

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname); #man kan bara ta bort recipes om man är inloggad. 

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }
    
   echo "You are removing recipe with the ID:"           .$recipeid;


    // Prepare an update statement and execute it
    $stmt = $db->prepare("UPDATE recipe SET onloan=0 WHERE recipeid = ?");
    $stmt->bind_param('i', $recipeid);
    $stmt->execute();
    printf("<br>Succesfully returned!");
    printf("<br><a href=favourites.php>Return to Favorites </a>");
    printf("<br><a href=index.php>Return to home page </a>");
    exit;

?>
