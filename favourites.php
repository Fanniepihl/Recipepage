<?php include("header.php") ?>
<?php include("config.php") ?>

<body>

<h2> Here is your favorite recipes</h2>


</body>

<main>
			<!--  This is a form so every recipe that has been addaed from the different categories will show up -->
		
		<form action="showlistrecipes.php" method="POST">
			<table id="t01" style="width:100%">
			
			</table>
		</form>

		<?php

		$searchtitle = "";
        $searchingredients = "";

            if (isset($_POST) && !empty($_POST)) {
                
                $searchtitle = trim($_POST['searchtitle']);
                $searchingredients = trim($_POST['searchingredients']);

            	}
               
                $searchtitle = addslashes($searchtitle);
                $searchingredients = addslashes($searchingredients);

                $searchtitle = htmlentities($searchtitle);
                $searchingredients = htmlentities($searchingredients);

		
		@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

		if ($db->connect_error) {
		    echo "could not connect: " . $db->connect_error;
		    printf("<br><a href=index.php>Return to home page </a>");
		    exit();
		}
		

		# Build the query. Users are allowed to search on title, author, or both
		
		$query = " SELECT recipeid, title, ingredients, description, onloan, image FROM recipe WHERE onloan = 1";
			if ($searchtitle && !$searchingredients) { // Title search only
			$query = $query . " Where title like '%" . $searchtitle . "%'";
				}
			if (!$searchtitle && $searchingredients) { // Ingredients search only
			$query = $query . " Where ingredients like '%" . $searchingredients . "%'";
				}
			if ($searchtitle && $searchingredients) { // Title and ingredience search
				$query = $query . " Where title like '%" . $searchtitle . "%' and ingredients like '%" . $searchingredients . "%'"; 
				} 

		 

		# Here's the query using bound result parameters
	    // echo "we are now using bound result parameters <br/>";
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
		        echo '<td><a href="addrecipes.php?recipeid=' . urlencode($recipeid) . '"><input type="submit" value="Remove"></input></a></td>';
		        echo "</tr>";

        
	   		}
	    	echo "</table>";
	    

	    ?>

	</main>


<?php include("footer.php") ?>