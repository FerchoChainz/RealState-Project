<?php

require 'functions.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';


// Connect to db
$db = DBconn();

use App\ActiveRecord;

ActiveRecord::setDB($db);