<?php

$url = $_SERVER['REQUEST_URI'];
$strings = explode ('/', $url);
$current_page = end($strings);

// $current_page = end(explode('/', ∞_SERVER['REQUEST_URI']));

$dbname = 'bread';
$dbuser = 'root';
$dbpass = 'root';
$dbserver = 'localhost';
?>