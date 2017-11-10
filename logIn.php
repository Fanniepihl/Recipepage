<?php include("header.php") ?>
<?php include("config.php"); 

session_start();
ob_start();

?>

<h1 class="">Sign in</h1>



<?php

//this function is for older PHP versions that use Magic Quotes.

    function escapestring($input) {
    if (get_magic_quotes_gpc()) {
    $input = stripslashes($input);
    }

    @ $db = new mysqli('localhost', 'root', '', 'testinguser');


    return mysqli_real_escape_string($db, $input);

    }

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

if ($db->connect_error) {
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
    $upass = sha1($_POST['userpass']);

    //echo $uname;
    //echo '</br>';
    //echo $upass;
    
    #echo "SELECT * FROM user WHERE username = '{$uname}' AND userpass = '{$upass}'";
    
    $query = ("SELECT * FROM user WHERE username = '{$uname}' "."AND userpass = '{$upass}'");
       
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result(); 
    
    #here we create a new variable 'totalcount' just to check if there's at least
    #one user with the right combination. If there is, we later on print out "access granted"
    $totalcount = $stmt->num_rows();
    
    if(isset($_POST['remember'])){ 
        setcookie('username',$uname, time()+60*60*7);
        
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
            if ($totalcount == 0) {
                echo '<h2>You got it wrong. Can\'t break in here!</h2>';
            } else {
                echo '<h2>Welcome! Correct password.</h2><a href="myrecipes.php"><h3>Upplode your recipie here</h3></a>';
                $_SESSION['username'] = $uname;
    echo "<script>window.location.href='myrecipes.php'</script>";
         
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
        
        
        </style>
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






















