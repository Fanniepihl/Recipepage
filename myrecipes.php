<?php include("header.php") ?>
<?php include("config.php"); 

    session_start();
?>

<body>

<h2>Here is your saved recipes</h2>
    
<div class="mygallery"><!--en div att lägga in sina uppladdade recept i.-->
    
    <?php echo $_SESSION['username'];  #start sessions and echo username. ?>
    
</div><!---end mygallery--->
</body>

<?php include("footer.php") ?>
