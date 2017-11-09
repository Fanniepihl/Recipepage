<!-- En del av en av de tre sidorna (fish steak pasta) som vi kommer lägga till recept i-->
<?php
include "config.php";


@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
	echo "could not connect: " . $db->connect_error;
	printf("<br><a href=index.php>Return to home page</a>");
	exit();
}



//Query to get all ingredients
$getIngredients = "SELECT * FROM ingredients";

$stmt = $db->prepare($getIngredients);
$stmt->bind_result($ingredientsid, $name);
$stmt->execute();

//Query to add ingredients
if(isset($_POST['newingredients'])) {

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
	echo "could not connect: " . $db->connect_error;
	printf("<br><a href=index.php>Return to home page</a>");
	exit();
}

$newingredientsid = $_POST['newingredientsid'];
$newname = $_POST['newname'];

//echo $newingredientsid;
//echo $newname; 

$newingredients = "INSERT INTO ingredients(ingredientsid, name) VALUES(?,?);";

//echo $newingredients;
$stmt = $db->prepare($newingredients);
$stmt->bind_param('is', $newingredientsid, $newname);
$stmt->execute();


header("location:fn.php");
printf("<br>Ingredient added!");

}


//HÄR BÖRJA JAG NU IDAG: TA BORT OM DET EJ FUNKAR (8:44) i koden!!
//
if(isset($_POST['addRecipe'])) {

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
	echo "could not connect: " . $db->connect_error;
	printf("<br><a href=index.php>Return to home page</a>");
	exit();
}

//KOLLA KODEN I VIDEON VID 19:21 (detta för om detta nedanför stämmer, om det ska med ett ID eller ej?!?!?!?)
$newrecipeid = $_POST ['recipeid'];
$newtitle = $_POST['title'];
$newdescription = $_POST['description'];
$newcatid = $_POST['catid'];
//$newimage = $_POST['image'];


$addRecipe ="INSERT INTO recipe(title, description, catid) VALUES (?, ?, ?, ?)"; //image också efter catid

//New book with AutoIncrement ID is added.
//Last one is 50										longblob for image
$stmt = $db->prepare($addRecipe);
$stmt->bind_param('ssi', $title, $description, $catid); //$image 
$stmt->execute();

$recipeid = mysqli_insert_id($db);

//Echo under här autoincrement nästa nummer i listan vi har 50 så då blire nästa 51 auto..
//echo $recipeid
//                                 $id kommer från en specifik ingrediens som sänds
//									från listan i js filen (addade ingredienser)
//									i listan går det från 0, 1, 2, 3 osv
foreach ($ingredientsid as $index => $id) {
	
	@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

	$add_recing = "INSERT INTO recing(recipeid,ingredientsid) VALUES('?','?')";

	$stmt = $db->prepare($add_recing);
	$stmt->execute();
}

}

//TILL HIT HAR JAG KODAT!!!!! INTE UNDER/ÖVER!!!!

?>


<!-- ADD RECIPE HERE -->
<form action="fn.php" method="POST">
	<h2>Add Recipe</h2>
	<INPUT type="text" required placeholder="Recipe Name" name="title"></br>
	<INPUT type="text" required placeholder="Description" name="description"></br>
	<!-- <INPUT type="text" required placeholder="Recipe Name" name="ingredients"><br> -->
	<INPUT type="text" required placeholder="Category" name="catid"></br>
	<!-- Göra en drop down för catID och för våra tre kategorier -->
	<!--<INPUT type="text" required placeholder="Upload image" name="image"></br>-->
	<!-- <INPUT type="text" required placeholder="Recipe Name" name="userid"></br> -->
	<!-- User ska vara inloggad när den lägger till recept, ska skickas med automatiskt -->

<!-- This is where we use script, in this 'ul' tag. Är div:en i js script -->
<ul id="ingredientsToRecipe"></ul>

<!-- This is where we select all ingredients from the DB and present 
them as aoptions in a dropdown list -->
<select id="ingredients" name="ingredients[]" id="ingredients">
	<?php
		 while ($stmt->fetch()) {
		 	echo "<option value='".$ingredientsid."'>".$name."</option>";
		 }
	?>
</select>

<!-- And this is the button "Add ingredients" that adds to the array of ingredients, using the js script -->
<!-- 5.07 min i videon, "connectIngredientsRecipe" är button ID i js script. 8.47 min  -->
<button id="connectIngredientsRecipe" for="ingredients">Add Ingredients</button></br>
<INPUT type="submit" name="addRecipe" value="Send">

</form>

<!-- ADD INGREDIENTS IN DROP DOWN HERE -->
<form action="fn.php" method="POST">
	<h2>Add Ingredients</h2>
	<INPUT type="number" required placeholder="Id" id="newingredientsid" name="newingredientsid"></br>
	<INPUT type="text" required placeholder="Name" id="newname" name="newname"></br></br>
	<!--<INPUT type="submit" id="newingredients" name="newingredients" value="Send">-->
	<INPUT type="submit" name="newingredients" value="Send">
</form>

<script type="text/javascript" src="addRecipe.js"></script>



<!-- 11.29 är vi i i JAsmins video om Joins och inserts -->



<!-- är i videon: 15.47 -->












