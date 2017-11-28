<?php include("config.php") ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

    <title>Recept</title>
</head>
<header class="site-header">
    <nav class="site-nav">
        <ul>
            <li>
                <a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">Home</a>
            </li>
            <li>
                <a class="<?php echo $current_page == 'search.php' ? 'active' : NULL ?>" href="search.php">Categories</a>   
            </li>
            <li>
                <a class="<?php echo $current_page == 'favourites.php' ? 'active' : NULL ?>" href="favourites.php">Favourite recipes</a>   
            </li>
            <li> 
                <a class="<?php echo $current_page == 'myrecipes.php' ? 'active' : NULL ?>" href="myrecipes.php">Add my recipes</a>
            </li>
            <li> 
                <a class="<?php echo $current_page == 'savedrecipes.php' ? 'active' : NULL ?>" href="savedrecipes.php">Saved recipes</a>
            </li>
            <li> 
                <a class="<?php echo $current_page == 'contact.php' ? 'active' : NULL ?>" href="contact.php">Contact</a>
            </li>
            <li>
                <a class="<?php echo $current_page == 'logIn.php' ? 'active' : NULL ?>" href="logIn.php">Sign in</a>
            </li>
        </ul>
    </nav>
</header> 