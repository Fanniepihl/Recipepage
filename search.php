<?php include("header.php") ?>
<?php include("config.php") ?>


<body>

<h2>Choose a category</h2>
  
  <!-- tre boxar med de olika kategorierna vi valt. Varje kategori/bildbox är kopplad till databasens tre olika katergorier(fisk, steak, pasta) så när du klickar in på kagetorin/bildboxen ex: 'pasta' så kommer alla recept som är tillagda i pasta kategorin dyka upp i listreipes.php! -->
    
<div class="container">
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



</body>
     










<?php include("footer.php") ?>