<?php include("header.php") ?>      <!--inkluderar header.php vilket ger index.php en header med menu-->
<?php include("config.php");        #inkluderar config.php så att datan hämtas från rätt databas. 

session_start(); #Session startar här. 
ob_start();         //While Output Buffering is active no output is sent from the script (other than headers),
                    //instead the output is stored in an internal buffer.

?>

<h1 class="">Sign in</h1> <!--endast rubrik för sign in sidan-->

<?php

//this function is for older PHP versions that use Magic Quotes.

    function escapestring($input) {
    if (get_magic_quotes_gpc()) {
    $input = stripslashes($input);
    }

    @ $db = new mysqli('localhost', 'root', '', 'testinguser');


    return mysqli_real_escape_string($db, $input); #returne dabasens input. 

    }

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname); #vägen i databasen server > user table > userpassword och username. 

if ($db->connect_error) { #Om det inte går att conecta med databasen så echoas "could not conect" ut och sedan finns en länk som skickar användaren tillbaka till startsidan/index.php. 
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

if (isset($_POST['username'], $_POST['userpass'])) {
    #with statement under we're making it SQL Injection-proof
    
    $uname = htmlentities($_POST['username']);
    $uname = mysqli_real_escape_string($db, $_POST['username']);
    
    #without function, so here you can try to implement the SQL injection
    #various types to do it, either add ' -- to the end of a username, which will comment out
    #or simply use 
    #' OR '1'='1' #
    #$uname = $_POST['username'];
    
    #here we hash the password, and we want to have it hashed in the database as well
    #optimally when you create a user (through code) you simply send a hash
    #hasing can be done using different methods, MD5, SHA1 etc.
    
    $upass = htmlentities($_POST['userpass']);
    $upass = sha1($_POST['userpass']); #SHA1 för att hasa lösenordet. 
    
    $query = ("SELECT * FROM user WHERE username = '{$uname}' "."AND userpass = '{$upass}'"); #Hämtar rätt användarnamn och lösenord mot databasen. Kollar så att det stämmer. 
       
    
    $stmt = $db->prepare($query);   #förbered 
    $stmt->execute();               #Utför
    $stmt->store_result();          #Spara resultatet
    
    #here we create a new variable 'totalcount' just to check if there's at least
    #one user with the right combination. If there is, we later on print out "access granted"
    $totalcount = $stmt->num_rows(); 
    
    if(isset($_POST['remember'])){ 
        setcookie('username',$uname, time()+60*60*7); #kom ihåg användaren  i Cookie i 60*60*7. 
        
        }
}   
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        
        
        if (isset($totalcount)) {
            if ($totalcount == 0) { #om totalcount == 0 betyder det att lösenordet eller användarnamnet är fel jämfört med databasens. Då får användaren inte tillträdde. Då echoas understående ut. 
                echo '<h2>You got it wrong. Can\'t break in here!</h2>';
            } else {
                echo '<h2>Welcome! Correct password.</h2><a href="myrecipes.php"><h3>Upplode your recipie here</h3></a>'; # om det stämmer mot databasen alltså om totalcount == 1 så echoas Welcome! Correct password ut.  
                $_SESSION['username'] = $uname; #Session startar så att användaren hålls innlogad. 
    echo "<script>window.location.href='myrecipes.php'</script>"; #Användaren tas automatiskt till Myrecipes.php.
         
            }
        }
        ?>
        <style type="text/css"> 
            th{
                text-align: center;
            }
            h3{
                text-align: center;
            }
        
        
        </style> <!-- form för att skriva in användarnamn och lösenord.--> 
        <table cellpadding="10" cellspacing="10" align="center"> 
        <form method="POST" action="">
            <tr><th>Username<input type="text" name="username" align="center" cellpadding="5"></th></tr>
            <tr><th>Password<input type="password" name="userpass" align="center" cellpadding="5"></th></tr>
            <tr><th colspan="2" align="center"><input type="checkbox" name="remember" value="1">Remember Me</th></tr>
            <tr><th colspan="2" align="center"><input type="submit" name="login" value="Login"></th></tr>
        </form>
    </table>
    </body>
</html>
<?php include("footer.php") ?>