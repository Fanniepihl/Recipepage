<?php include("header.php") ?>
<?php include("config.php") ?>

<body>
<h2>Choose a category</h2>
    
    
<div class="container"><!---contaner är boxen som fish bilden och texten ligger i--->
  <img img src="img/fisk.jpeg" class="image">
  <a href="fish.php">
      <div class="overlay">
    <div class="text">Fish</div><!---end class text--->
  </div><!--end class overlay--->
      </a><!--end link--->
</div><!--end container-->

<div class="container">
  <img img src="img/stek.jpeg" class="image">
  <a href="steak.php">
      <div class="overlay">
    <div class="text">Steak</div><!---end class text--->
  </div><!--end class overlay--->
      </a><!--end link--->
</div><!--end container-->

<div class="container">
  <img img src="img/pasta.jpg" class="image">
  <a href="pasta.php">
      <div class="overlay">
    <div class="text">Pasta</div><!---end class text--->
  </div><!--end class overlay--->
      </a><!--end link--->
</div><!--end container-->


</body>

<?php include("footer.php") ?>