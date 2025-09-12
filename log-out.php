<?php 
session_start();

// to close session reset session array to an empty array
$_SESSION = [];

var_dump($_SESSION);

header('Location: /');
 ?>