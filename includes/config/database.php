<?php

function DBconn() : mysqli{
    $db =new mysqli('localhost','root', '',
'realstate_crud');

if(!$db){
    echo "Error, no se pudo conectar a la base de datos";
    exit;
}

return $db;

}