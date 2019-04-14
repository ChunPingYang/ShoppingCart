<?php

$servername = 'localhost';
$username = 'root';
$password = '';

// Create connection
$con = new mysqli($servername, $username, $password, "shoppingcart");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

?>