<?php include("header.php"); ?>
<?php include("config.php"); 

    session_start();
?>

<body>

<h2>Here are your saved recipes</h2>
</br></br>
    
<?php echo $_SESSION['username'];  #start sessions and echo username. ?>
<?php

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

		if ($db->connect_error) {
		    echo "could not connect: " . $db->connect_error;
		    printf("<br><a href=index.php>Return to home page </a>");
		    exit();
		}

			$query = "SELECT recipe.recipeid, recipe.title, recipe.description, recipe.onloan, recipe.image, GROUP_CONCAT(ingredients.name) as als FROM recipe, recing, ingredients WHERE onloan = 1 AND recipe.recipeid = recing.recipeid AND recing.ingredientsid = ingredients.ingredientsid GROUP BY recipe.recipeid";
				$stmt = $db->prepare($query);
			    $stmt->bind_result($recipeid, $title, $description, $onloan, $image, $grouped_ing);
			    $stmt->execute();


			echo '<table id="t01" style="width:100%" >';
		    echo '<tr><b><td>Image</td><b> <td>Title</td> <td>Ingredients</td> <td>Description</td> <td>Added?</td> </b> <td>Delete</td> </b></tr>';
		    while ($stmt->fetch()) {
		        if($onloan==0)
		            $onloan="No";
		        else $onloan="Yes";

		        $grouped_ing = str_replace(",", ", ", $grouped_ing);
		       
		        echo "<tr>";
		        echo "<td> <img src='uploadedfiles/$image' style='max-height:150px;max-width:150px'</img> </td><td> $title </td><td> $grouped_ing </td> <td> $description </td><td> $onloan </td>";
		        echo '<td><a href="deleterecipe.php?recipeid=' . urlencode($recipeid) . '"><input type="submit" value="Delete"></input></a></td>';
		        echo "</tr>";

        
	   		}
	    	echo "</table>";


	  	?>
	  	</body>
	  	<?php include("footer.php") ?>