<?php
session_start();
session_destroy();
echo "You are loged out";
#med session_destroy så tas sessions bort och användaren är inte inloggad längre. 
?>