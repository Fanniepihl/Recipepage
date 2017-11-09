<?php include("header.php") ?>
<?php include("config.php") ?>

<body>

<h2> Here is your favorite recipes</h2>

<h3>To see your favorite recipes you need to logg in</h3>  
    <button><a href="logIn.php" >Logg in here</a></button>


</body>

<main>
	
		
		<form action="showaddrecipes.php" method="POST">
			<table id="t01" style="width:100%">
			
			</table>
		</form>

		<?php

		$searchtitle = "";
        $searchingredients = "";

            if (isset($_POST) && !empty($_POST)) {
                
                $searchtitle = trim($_POST['searchtitle']);
                $searchingredients = trim($_POST['searchingredients']);
               
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
		

		$query = " SELECT * FROM recipe WHERE onloan = 1";
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
		$stmt->bind_result($recipeid, $title, $ingredients, $onloan);
		$stmt->execute();
	    
	//    $stmt2 = $db->prepare("update onloan set 0 where bookid like ". $bookid);
	//    $stmt2->bind_result($onloan, $bookid);
	    

	    echo '<table id="t01" style="width:100%" >';
		echo '<tr><b><td>Image</td><b> <td>Title</td> <td>Ingredients</td> <td>Added?</td> </b> <td>Add</td> </b></tr>';
	    while ($stmt->fetch()) {
	        if($onloan==0)
		            $onloan="No";
		        else $onloan="Yes";
	       
	        echo "<tr>";
	        echo "<td> $recipeid </td><td> $title </td><td> $ingredients </td><td> $onloan </td>";
	        echo '<td><a href="removerecipe.php?recipeid=' . urlencode($recipeid) . '"><input type="submit" value="Remove"></input></a></td>';
	        echo "</tr>";
	        
	    }
	    echo "</table>";
	    }

	    ?>

	</main>


<?php include('footer.php') ?>