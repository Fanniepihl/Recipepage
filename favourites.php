<?php include("header.php") ?>
<?php include("config.php") ?>

<body>
<!-- Title -->
<h2> Here are your favorite recipes</h2>


	</body>

	<main>

		<?php
		
		@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

		if ($db->connect_error) {
		    echo "could not connect: " . $db->connect_error;
		    printf("<br><a href=index.php>Return to home page </a>");
		    exit();
		}
		

		# Build the query. Users are allowed to search on recipe title, ingredients, or both 

				$query = "SELECT recipe.recipeid, recipe.title, recipe.description, recipe.onloan, recipe.image, GROUP_CONCAT(ingredients.name) as als FROM recipe, recing, ingredients WHERE onloan = 1 AND recipe.recipeid = recing.recipeid AND recing.ingredientsid = ingredients.ingredientsid GROUP BY recipe.recipeid";
				$stmt = $db->prepare($query);
			    $stmt->bind_result($recipeid, $title, $description, $onloan, $image, $grouped_ing);
			    $stmt->execute();




			echo '<table id="t01" style="width:100%" >';
		    echo '<tr><b><td>Image</td><b> <td>Title</td> <td>Ingredients</td> <td>description</td> <td>Added?</td> </b> <td>Remove</td> </b></tr>';
		    while ($stmt->fetch()) {
		        if($onloan==0)
		            $onloan="No";
		        else $onloan="Yes";


		        //mellanrum mellan ingredients listan
		        $grouped_ing = str_replace(",", ", ", $grouped_ing);
		       
		       //Här ecoar vi efter bildmappen/ och ut bilderna från mappen så de syns, även lagt till en max-height och en max-width så att bilderna håller sig lika stora.
		        echo "<tr>";
		        echo "<td> <img src='uploadedfiles/$image' style='max-height:150px;max-width:150px'</img> </td><td> $title </td><td> $grouped_ing </td> <td> $description </td><td> $onloan </td>";
		        echo '<td><a href="removerecipe.php?recipeid=' . urlencode($recipeid) . '"><input type="submit" value="Remove"></input></a></td>';
		        echo "</tr>"; 

	   		}
	    	echo "</table>";
	    

	    ?>

	</main>


<?php include("footer.php") ?>