<?php
include("config.php");
$title = "Delete recipe";
include("header.php");
?>

<?php
if (isset($_GET['submit'])) {
    // We know the borrower so go ahead and check the book out
    # Get data from form
    $recipeid = trim($_GET['recipeid']);      // From the hidden field
    $recipeid = addslashes($recipeid);

    # Open the database using the "librarian" account
    @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

    // Prepare an update statement and execute it
    
        $stmt = $db->prepare("delete from recipe where recipeid = ?");
        $stmt->bind_param('i', $recipeid);
        $response = $stmt->execute();
        printf("<br>Recipe deleted!");
        printf("<br><a href=index.php>Return to home page </a>");
    
    
    exit;
}

// We don't have a borrower id yet so present a form to get one,
// then post back using a hidden field to pass through the bookid
// which came from the hand-crafted URL query string on the book
// search page
?>

<h3>Delete recipe</h3>
<hr>
<form action="deleterecipe.php" method="GET">
    Are you sure you want to delete the recipe?
    <?php
    $recipeid = trim($_GET['recipeid']);
    echo '<INPUT type="hidden" name="recipeid" value=' . $recipeid . '>';
    ?>
    <INPUT type="submit" name="submit" value="Continue">
</form>
<?php include("footer.php"); ?>