<?php

require 'app.php';

function addTemplate(string $name, bool $main = false){
    include TEMPLATES_URL ."/{$name}.php";
}