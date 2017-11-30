<?php include("header.php") ?>      <!--inkluderar header.php vilket ger index.php en header med menu-->
<?php include("config.php") ?>      <!--inkluderar config.php så att datan hämtas från rätt databas. -->

<body> 
  <div id="kontakt" >
    <h2>Contact us!</h2>
    </div> 
    
    <?php

    @ $db = new mysqli('localhost', 'root', 'root', 'bread');       #Vägen till Bread databasen som är kopplad till detta projekt. 

    if ($db->connect_error) {                                       #If no connection to the database then print a link to index.php. 
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
    } 

 if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {      #POST för att det skall synas på hemsidan och inte hämtas från databasen.
    
    $name = htmlentities($_POST['name']);
   
    $email = htmlentities($_POST['email']);

    $message = htmlentities($_POST['message']);
    
    } 
    ?>
    
<!-- Forumlär för att kunna kontakta oss-->
<?php
$action=$_REQUEST['action'];
if ($action=="")    /* display the contact form */
    {
    ?>
    <form  action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="action" value="submit">
    Your name:<br>
    <input name="name" type="text" value="" size="30"/><br><br>
    Your email:<br>
    <input name="email" type="text" value="" size="30"/><br><br>
    Your message:<br>
    <textarea name="message" rows="7" cols="30"></textarea><br>
    <input type="submit" value="Send email"/>
    </form>
    <?php
    } 
else                /* send the submitted data */
    {
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $message=$_REQUEST['message'];
    if (($name=="")||($email=="")||($message==""))
        {
		echo "All fields are required, please fill <a href=\"\">the form</a> again.";
	    }
    else{		
	    $from="From: $name<$email>\r\nReturn-path: $email";
        $subject="Message sent using your contact form";
		// mail("youremail@yoursite.com", $subject, $message, $from);
		echo "Email sent!";
	    }
    }  
?>



</body>
<?php include("footer.php") ?>