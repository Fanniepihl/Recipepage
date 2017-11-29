<?php include("header.php") ?>
<?php include("config.php") ?>

<body>

</body>

<main class="field">

			<fieldset><legend><h3>Recipes:</h3></legend>

       		<?php

        	$catid = trim($_GET['catid']);

                @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

                if ($db->connect_error) {
				    echo "could not connect: " . $db->connect_error;
				    printf("<br><a href=index.php>Return to home page</a>");
				    exit();
				}

				//This is egentligen en JOIN 
				$query = "SELECT recipe.recipeid, recipe.title, recipe.description, recipe.onloan, recipe.image, GROUP_CONCAT(ingredients.name) as als FROM recipe, recing, ingredients WHERE recipe.catid=? AND recipe.recipeid = recing.recipeid AND recing.ingredientsid = ingredients.ingredientsid GROUP BY recipe.recipeid";

				// Prepare an update statement and execute it. Here the code prepare the database 
   				// stmt->bind_param : är när du binder parametrar tillvanadra,
   				// bind_result är för kolumnerna 
				$stmt = $db->prepare($query);
				$stmt->bind_param('i', $catid);
			    $stmt->bind_result($recipeid, $title, $description, $onloan, $image, $grouped_ing);
			    $stmt->execute();


			echo '<table id="t01" style="width:100%" >';
		    echo '<tr><b><td>Image</td><b> <td>Title</td> <td>Ingredients</td> <td>Description</td> <td>Added?</td> </b> <td>Add</td> </b></tr>';
		    while ($stmt->fetch()) {
		        if($onloan==0)
		            $onloan="No";
		        else $onloan="Yes";
;
		       //Denna använder vi för att få mellanrum och komma tecken i Ingredients listan som syns sen när userna har lagt till ett recept så att inte orden sitter ihop.
		       	$grouped_ing = str_replace(",", ", ", $grouped_ing);

		       	//Här ecoar vi efter / ut bilderna från mappen så de syns, även lagt till en max-height och en max-width så att bilderna håller sig lika stora.

		       	//Här echoar vi även ut vad vi vill få  för information som : Bilden, Titeln, Mellanrummen som ska vara i description och description, och om man har addat receptet till sina favourites.

		       	//Vi echoar även ut och söker om receptet är tillagt i favourites eller inte, 
		        echo "<tr>";
		        echo "<td> <img src='uploadedfiles/$image' style='max-height:150px;max-width:150px'</img> </td><td> $title </td><td> $grouped_ing </td> <td> $description </td><td> $onloan </td>";
		        echo '<td><a href="add.php?recipeid=' . urlencode($recipeid) . '"><input type="submit" value="Add"></input></a></td>';
		        echo "</tr>";

        
	   		}
	   		//Echos the table 
	    	echo "</table>";
			

	    	?>
	    	</fieldset>
	    



</main>		
	


<?php include("footer.php") ?>