<!-- En del av en av de tre sidorna (fesi steak pasta) som vi kommer lägga till recept i-->
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
 
if(isset($_POST['addIngredients'])) {

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
	echo "could not connect: " . $db->connect_error;
	printf("<br><a href=index.php>Return to home page</a>");
	exit();
}

$newingredientsid = $_POST['ingredientsid'];
$newname = $_POST['name'];

//echo $newingredients;
//echo $newname; 

$addIngredients = "INSERT INTO ingredients(ingredientsid, name) VALUES(?,?);";

//echo $addIngredients;

$stmt = $db->prepare($addIngredients);
$stmt->bind_result('is', $ingredientsid, $name);
$stmt->execute();

//header("location:../fn.php");

}

?>

<!-- ADD RECIPE HERE -->
<form method="POST">
	<h2>Add Recipe</h2>
	<INPUT type="text" required placeholder="Recipe Name" name="title"></br>
	<INPUT type="text" required placeholder="Description" name="description"></br>
	<!-- <INPUT type="text" required placeholder="Recipe Name" name="ingredients"><br> -->
	<INPUT type="text" required placeholder="Category" name="catid"></br>
	<!-- Göra en drop down för catID och för våra tre kategorier -->
	<INPUT type="text" required placeholder="Upload image" name="image"></br>
	<!-- <INPUT type="text" required placeholder="Recipe Name" name="userid"></br> -->
	<!-- User ska vara inloggad när den lägger till recept, ska skickas med automatiskt -->

<!-- This is where we use script, in this 'ul' tag. Är div:en i js script -->
<ul id="ingredientsToRecipe"></ul>

<!-- This is where we select all ingredients from the DB and present 
them as aoptions in a dropdown list -->
<select id="ingredients" name="addIngredients[]" id="ingredients">
	<?php
		 while ($stmt->fetch()) {
		 	echo "<option value='".$ingredientsid."'>".$name."</option>";
		 }
	?>
</select>

<!-- And this is the button "Add ingredients" that adds to the array of ingredients, using the js script -->
<!-- 5.07 min i videon, "connectIngredientsRecipe" är button ID i js script. 8.47 min  -->
<button id="connectIngredientsRecipe" for="addIngredients">Add Ingredients</button></br>
<INPUT type="submit" name="addRecipe">

</form>

<!-- ADD INGREDIENTS IN DROP DOWN HERE -->
<form method="POST">
	<h2>Add Ingredients</h2>
	<INPUT type="text" required placeholder="Name" name="name"></br>
	<INPUT type="submit" name="addIngredients">
</form>

<script type="text/javascript" src="addRecipe.js"></script>


















