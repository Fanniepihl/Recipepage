<?php

//Icluding the database
include ("config.php");


$recipeid = trim($_GET['recipeid']);
echo '<INPUT type="hidden" name="recipeid" value=' . $recipeid . '>';

$recipeid = trim($_GET['recipeid']);      // From the hidden field
$recipeid = addslashes($recipeid);


@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }
    
    //Echo och printf utför samma saker. printar ut samma saker!

   echo "You are adding a recipe with the ID:"           .$recipeid;

    // Prepare an update statement and execute it. Here the code prepare the database 
   // stmt->bind_param : är när du binder parametrar tillvanadra,
   // bind_result är för kolumner.

    $stmt = $db->prepare("UPDATE recipe SET onloan=1 WHERE recipeid = ?");
    $stmt->bind_param('i', $recipeid);
    $stmt->execute();
    printf("<br>Recipe added!");
    printf("<br><a href=listrecipes.php>Search for more recipes </a>");
    printf("<br><a href=index.php>Return to home page </a>");
    exit;
    

?>