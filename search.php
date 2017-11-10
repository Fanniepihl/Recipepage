<?php include("header.php") ?>
<?php include("config.php") ?>


<body>

<fieldset><h2>Choose a category</h2>
  
    
<div class="container"><!---contaner är boxen som fish bilden och texten ligger i-->
  <img img src="img/fish1.png" class="image">
  <a href="listrecipes.php?catid=1">
      <div class="overlay">
    <div class="text">Fish</div><!--end class text-->
  </div><!--end class overlay-->
      </a><!--end link-->
</div><!--end container--> 

<div class="container">
  <img img src="img/pasta1.png" class="image">
  <a href="listrecipes.php?catid=2">
      <div class="overlay">
    <div class="text">Pasta</div><!---end class text-->
  </div><!--end class overlay-->
      </a><!--end link-->
</div><!--end container-->

<div class="container">
  <img img src="img/steak1.png" class="image">
  <a href="listrecipes.php?catid=3">
      <div class="overlay">
    <div class="text">Steak</div><!--end class text-->
  </div><!--end class overlay-->
      </a><!--end link-->
</div><!--end container-->


</fieldset>

</body>
     










<?php include("footer.php") ?>