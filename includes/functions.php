<?php

define('TEMPLATES_URL', __DIR__ . '/templates');

define('FUNCTIONS_URL', __DIR__ . 'functions.php');

function addTemplate(string $name, bool $main = false)
{
    include TEMPLATES_URL . "/{$name}.php";
}

function isAuth() {
    session_start();

    // if is not login
    if (!$_SESSION['login']) {
        header("Location: /");
    }

}

function debbuging($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}
