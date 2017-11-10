<?php include("header.php") ?>
<?php include("config.php"); 

    session_start();
?>

<body>

<h2>Here is your saved recipes</h2>
    
<div class="mygallery"><!--en div att lägga in sina uppladdade recept i.-->
    
    <?php echo $_SESSION['username']; ?>
    
 <h3>To see your saved recipes or upplode a new recipe you need to logg in</h3>  
    <button><a href="logIn.php" >Logg in here</a></button>
    
<div class="mygallery"><!---en div att lägga in sina uppladdade recept i.--->

    
</div>

</body>

<?php include("footer.php") ?>