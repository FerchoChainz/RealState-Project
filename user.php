<?php 

// Import conn
require 'includes/functions.php';
$db = DBconn();

// Create email and pass
$email = "correo@correo.com";
$password = '123456';

// Hashing pswd - is always 60char length
$passHash = password_hash($password, PASSWORD_DEFAULT);

// User query
$query = "INSERT INTO users (email, password) VALUES 
('$email', '$passHash'); ";
echo $query;



// add to DB
mysqli_query($db, $query);