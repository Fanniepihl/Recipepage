<?php #Denna sida användes inte. Man skulle komma hit när man loggat in men istället så kommer användaren direkt till myrecipe.php så att den kan ladda upp filer och se sina sparade recept. 

session_start();
echo "Welcome" . $_SESSION['username'];
echo '<a href="logout.php">"logout"</a>';

?>