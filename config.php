<!-- Here we create a database configuration file for our project -->

<?php

$url = $_SERVER['REQUEST_URI'];
$strings = explode ('/', $url);
$current_page = end($strings);

// Under here we have the 

$dbname = 'bread';
$dbuser = 'root';
$dbpass = 'root';
$dbserver = 'localhost';
?>