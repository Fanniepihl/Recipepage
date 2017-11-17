<!-- En del av en av de tre sidorna (fish steak pasta) som vi kommer lägga till recept i-->
<?php
include "config.php";
?>

<?php
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
	echo "could not connect: " . $db->connect_error;
	printf("<br><a href=index.php>Return to home page</a>");
	exit();
}



// while($stmt->fetch()){
// 	echo $catname;
// }
//Query to add ingredients
if(isset($_POST['newcategories'])) {

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
	echo "could not connect: " . $db->connect_error;
	printf("<br><a href=index.php>Return to home page</a>");
	exit();
}

$newcatid = $_POST['newcatid'];
$newcatname = $_POST['newcatname'];

//echo $newingredientsid;
//echo $newname; 

$newcategories = "INSERT INTO categories(catid, catname) VALUES(?,?);";

//echo $newingredients;
$stmt = $db->prepare($newcategories);
$stmt->bind_param('is', $newcatid, $newcatname);
$stmt->execute();


header("location:fn.php");
printf("<br>Category added!");

}

?>

<?php

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
if(isset($_POST['newrecipe'])) {

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
	echo "could not connect: " . $db->connect_error;
	printf("<br><a href=index.php>Return to home page</a>");
	exit();
}

$newtitle = $_POST['newtitle'];
$newdescription = $_POST['newdescription'];
$newcatid = $_POST['category'];
$ingredientsids = $_POST['ingredients']; //kanske ska vara ingredientsidS 
//$newimage = $_POST['image'];


echo $newtitle;
echo $newdescription;
echo $newcatid;
echo $ingredientsids;


$newrecipe ="INSERT INTO recipe(title, description, catid) VALUES (?, ?, ?)"; //image också efter catid
echo $newrecipe;

//New book with AutoIncrement ID is added.
//Last one is 50
$stmt = $db->prepare($newrecipe);
$stmt->bind_param('ssi', $newtitle, $newdescription, $newcatid); //$image
$stmt->execute();

$newrecipeid = mysqli_insert_id($db); //kanske ska vara receptid

echo $newrecipeid;


//Echo under här outar nästa nummer i listan vi har 50 så då blire nästa 51 auto..
//echo $recipeid
//                                 $id kommer från en specifik ingrediens som sänds
//									från listan i js filen (addade ingredienser)
//									i listan går det från 0, 1, 2, 3 osv
foreach ($ingredientsids as $index => $id) {
	
	@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);



	$add_recing = "INSERT INTO recing(recipeid,ingredientsid) VALUES('$newrecipeid','$id')";

	$stmt = $db->prepare($add_recing);
	$stmt->execute();
}

}

?>


<!-- ADD RECIPE HERE -->
<form action="fn.php" method="POST">
	<h2>Add Recipe</h2>
	<INPUT type="text" required placeholder="Recipe Name" name="newtitle"></br>
	<INPUT type="text" required placeholder="Description" name="newdescription"></br>
	<!-- <INPUT type="text" required placeholder="Recipe Name" name="ingredients"><br> -->

	<ul id="ingredientsToRecipe"></ul>

	<!-- This is where we select all ingredients from the DB and present 
	them as options in a dropdown list -->
<!-- Ändra denna för att recing ska fungera -->
	<select id="ingredients" name="ingredients[]">
	<?php
		 while ($stmt->fetch()) {
		 	echo "<option value='".$ingredientsid."'>".$name."</option>";
		 }
	?>
	</select>
	<button id="connectIngredientsRecipe" for="ingredients">Add Ingredients</button></br>


	<!--<INPUT type="text" required placeholder="Upload image" name="image"></br>-->
	<!-- <INPUT type="text" required placeholder="Recipe Name" name="userid"></br> -->
	<!-- User ska vara inloggad när den lägger till recept, ska skickas med automatiskt -->

	<!-- HÄR KOMMER CATEGORY-DROPDOWNEN -->
	<ul id="categoryToRecipe"></ul>

	<!--This is where we select all categories from the DB and present 
	them as options in a dropdown list-->
	<select name="category" id="category">
	<?php

	//Query to get all categories
	$getCategories = "SELECT * FROM categories";

	$stmt_cat = $db->prepare($getCategories);
	$stmt_cat->bind_result($catid, $catname);
	$stmt_cat->execute();

	while ($stmt_cat->fetch()) {
		echo "<option value='".$catid."'>".$catname."</option>";
		}
	?>

	<?php
	     
	    	$files = glob("uploadedfiles/*.*");
	    		for ($i=0; $i<count($files); $i++)
	      		{
	       			$uploadedfiles = $files[$i];
	        		$supported_file = array(
	              	 'gif',
	               	 'jpg',
	               	 'jpeg',
	               	 'png'
	         		);

	        $ext = strtolower(pathinfo($uploadedfiles, PATHINFO_EXTENSION));
	        	if (in_array($ext, $supported_file)) {
	            	echo basename($uploadedfiles)."<br />"; 
	            	echo '<img src="'.$uploadedfiles .' "alt="Random image" style="max-height:200px;max-width:200px" style=""/>'."<br /><br />";
	            	} 
	            	else {
	                continue;
	            	}
	          	}

	    ?>




	
	</select>

	<INPUT type="submit" name="newrecipe" value="Send">

</form>


<!-- ADD INGREDIENTS IN DROP DOWN HERE -->
<form action="fn.php" method="POST">
	<h2>Add Ingredients</h2>
	<!--<INPUT type="number" required placeholder="Id" id="newingredientsid" name="newingredientsid"></br>-->
	<INPUT type="text" required placeholder="Name" id="newname" name="newname"></br></br>
	<!--<INPUT type="submit" id="newingredients" name="newingredients" value="Send">-->
	<INPUT type="submit" name="newingredients" value="Send">
</form>

<form action="fn.php" method="POST">
	<h2>Add Category</h2>
	<!--<INPUT type="number" required placeholder="Id" id="newcatid" name="newcatid"></br>-->
	<INPUT type="text" required placeholder="Name" id="newcatname" name="newcatname"></br></br>
	<!--<INPUT type="submit" id="newingredients" name="newingredients" value="Send">-->
	<INPUT type="submit" name="newcategories" value="Send">
</form>

<script type="text/javascript" src="addCategory.js"></script>
<script type="text/javascript" src="addRecipe.js"></script>



<!-- 11.29 är vi i i JAsmins video om Joins och inserts -->



<!-- är i videon: 15.47 -->












