<?php

function DBconn() : mysqli{
    $db =mysqli_connect('localhost','root', '',
'realstate_crud');

if(!$db){
    echo "Error, no se pudo conectar a la base de datos";
    exit;
}

return $db;

}