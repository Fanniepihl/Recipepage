<?php
include("config.php");      #inkluderar header.php vilket ger index.php en header med menu
include("header.php");      #inkluderar config.php så att datan hämtas från rätt databas. 
?>

<?php
if (isset($_GET['submit'])) {
    # Get data from form
    $recipeid = trim($_GET['recipeid']);      // From the hidden field
    $recipeid = addslashes($recipeid);         //Måste ha med addslashes ifall man vill skriva t.ex. Smith´s. Smith\´s. 

    # Open the database using the "ellinor" account and password 
    @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) { #If connection error så tas användaren tillbaka till startsidan/index.php via "Return to homepage"-link.
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

    // Prepare an update statement and execute it
    
        $stmt = $db->prepare("delete from recipe where recipeid = ?");      #Förbered, välj recipeid. 
        $stmt->bind_param('i', $recipeid);                                  #Bind "i" med det valda recipeid.
        $response = $stmt->execute();                                       #UTFÖR 
        printf("<br>Recipe deleted!");                                      #När det är genomfört så printas "Recipe deleted" ut. 
        printf("<br><a href=index.php>Return to home page </a>");           #En länk till startsidan/index.php printas också ut. 
    
    
    exit;
}

// We don't have a borrower id yet so present a form to get one,
// then post back using a hidden field to pass through the bookid
// which came from the hand-crafted URL query string on the book
// search page
?>

<h3>Delete recipe</h3>
<hr>
<form action="deleterecipe.php" method="GET">       <!--använder method="GET" eftersom recipeid ska hämtas och inte postas från sidan. -->
    Are you sure you want to delete the recipe?
    <?php
    $recipeid = trim($_GET['recipeid']);            #Använder GET här med av samma orsak. Att det recipeid:et skall hämtas och sedan tas bort. 
    echo '<INPUT type="hidden" name="recipeid" value=' . $recipeid . '>';
    ?>
    <INPUT type="submit" name="submit" value="Continue">
</form>
<?php include("footer.php"); ?>



