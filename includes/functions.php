<?php


define('TEMPLATES_URL', __DIR__ . '/templates');

define('FUNCTIONS_URL',__DIR__ . 'functions.php');

define('DIR_IMAGES', __DIR__ . '/../images/');

function addTemplate(string $name, bool $main = false){
    include TEMPLATES_URL ."/{$name}.php";
}

function isAuth() : bool {
    session_start();
    
    $auth = $_SESSION['login'];
    if($auth){

        return true;
    }

    return false;

}

function debbuger($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}