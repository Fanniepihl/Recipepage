<?php include("header.php") ?>
<?php include("config.php") ?>

<body>

</body>

<main class="field">
			<form action="listrecipes.php" method="POST">
				<fieldset>
					<legend><h3>Browse recipes:</h3></legend><br>
			    	<table bgcolor="#ffffff">
			    		<tbody>
			    		Recipe:<br>
			    		<INPUT type="text" id="searchtitle" name="searchtitle" value=""><br>
			    		Ingredients:<br>
			    		<INPUT type="text" id="searchingredients" name="searchingredients" value=""><br><br>
			    		<INPUT type="submit" name="submit" value="Search">
			    	</table>
			  	</fieldset>
			</form>
	
			<br><br>
			<fieldset><legend><h3>Recipes:</h3></legend>


       		<?php

        	$searchtitle = "";
        	$searchingredients = "";

        	$catid = trim($_GET['catid']);

                
                $searchtitle = trim($_POST['searchtitle']);
                $searchingredients = trim($_POST['searchingredients']);
               
                $searchtitle = addslashes($searchtitle);
                $searchingredients = addslashes($searchingredients);

                $searchtitle = htmlentities($searchtitle);
                $searchingredients = htmlentities($searchingredients);


                //$id = array_serach($catid, array_column($catid,'1'))

               // $ingredientsid = array_search($searchingredients, array_column($recipe, 'ingredients'));

                @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

                if ($db->connect_error) {
				    echo "could not connect: " . $db->connect_error;
				    printf("<br><a href=index.php>Return to home page</a>");
				    exit();
				}


						// # Build the query. Users are allowed to search on title, ingredients, or both

				$query = " SELECT recipeid, title, ingredients, description, onloan, image FROM recipe WHERE catid={$catid}";
					if ($searchtitle && !$searchingredients) { // Title search only
				    $query = $query . " Where title like '%" . $searchtitle . "%'";
					}
					if (!$searchtitle && $searchingredients) { // Ingredients search only
				    $query = $query . " Where ingredients like '%" . $searchingredients . "%'";
					}
					if ($searchtitle && $searchingredients) { // Title and Ingredients search
				    $query = $query . " Where title like '%" . $searchtitle . "%' and ingredients like '%" . $searchingredients . "%'"; 
				} 


				$stmt = $db->prepare($query);
			    $stmt->bind_result($recipeid, $title, $ingredients, $description, $onloan, $image);
			    $stmt->execute();


			echo '<table id="t01" style="width:100%" >';
		    echo '<tr><b><td>Image</td><b> <td>Title</td> <td>Ingredients</td> <td>description</td> <td>Added?</td> </b> <td>Add</td> </b></tr>';
		    while ($stmt->fetch()) {
		        if($onloan==0)
		            $onloan="No";
		        else $onloan="Yes";
		       
		        echo "<tr>";
		        echo "<td> <img src='img/$image' style='max-height:150px;max-width:150px'</img> </td><td> $title </td><td> $ingredients </td> <td> $description </td><td> $onloan </td>";
		        echo '<td><a href="addrecipes.php?recipeid=' . urlencode($recipeid) . '"><input type="submit" value="Add"></input></a></td>';
		        echo "</tr>";

        
	   		}
	    	echo "</table>";
			

	    	?>
	    	</fieldset>
	    



</main>		
	


<?php include("footer.php") ?>