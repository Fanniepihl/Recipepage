<?php

session_start();
echo "Welcome" . $_SESSION['username'];
echo <a href="logout.php">"logout"</a>;

?>