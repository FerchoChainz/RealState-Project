<?php

namespace App;


class Propertie
{

    // DATABASE
    protected static $db;

    //identify columns to the object 
    protected static $DBcols = ['id', 'tittle', 'price', 'image', 'description', 'rooms', 'wc', 'parking', 'created', 'sellers_id'];

    // log errors 
    protected static $errors = [];

    public $id;
    public $tittle;
    public $price;
    public $image;
    public $description;
    public $rooms;
    public $wc;
    public $parking;
    public $created;
    public $sellers_id;

    // Define connection to db 
    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->tittle = $args['tittle'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->image = $args['image'] ?? 'image.jpg';
        $this->description = $args['description'] ?? '';
        $this->rooms = $args['rooms'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->parking = $args['parking'] ?? '';
        $this->created = date('Y/m/d');
        $this->sellers_id = $args['sellers_id'] ?? '';
    }

    public function saveData()
    {
        // Sanitize data
        $atributes = $this->sanitizeData();

        // Takes an array and make plain text with a separator, in this case ', ' to separate every key
        // $string = join(', ',array_values($atributes));


        // Insert DB
        $query = "INSERT INTO properties (";
        $query .= join(', ', array_keys($atributes));
        $query .= ") VALUES ('";
        $query .= join("', '", array_values($atributes));
        $query .= "')";

        // debbuger($query);


        $result = self::$db->query($query);
        debbuger($result);
    }

    //   identify and join atributes of DB
    public function atributes()
    {
        $atributes = [];
        foreach (self::$DBcols as $column) {
            if ($column == 'id') continue;
            $atributes[$column] = $this->$column;
        }

        return $atributes;
    }

    // sanitize every atribute
    public function sanitizeData()
    {
        $atributes = $this->atributes();
        $sanitized = [];

        foreach ($atributes as $key => $value) {
            $sanitized[$key] = self::$db->escape_string($value);
        }

        return $sanitized;
    }

    // validation 
    public static function getErrors(){
        return self::$errors;
    }

    public function validate(){
        if (!$this->tittle) {
        self::$errors[] = 'Tittle cant be empty';
    }

    if (!$this->price) {
        self::$errors[] = 'Price cant be empty';
    }

    //stren(description)< 50
    if (!$this->description) {
        self::$errors[] = 'Description cant be empty and it must be at least 50 characters';
    }

    if (!$this->rooms) {
        self::$errors[] = 'Rooms number cant be empty';
    }

    if (!$this->wc) {
        self::$errors[] = 'WC number cant be empty';
    }

    if (!$this->parking) {
        self::$errors[] = 'Parking lot spots cant be empty';
    }

    if (!$this->sellers_id) {
        self::$errors[] = 'Select one selller';
    }

    // if(!$this->image['name'] || $this->image['error']){
    //     self::$errors[] = 'Image is mandatory';
    // }

    // // Image size validator (1 MB max)
    // $messure = 1000 * 1000;

    // if($$this->mage['size'] > $messure){
    //     self::$errors[] = 'Image is so big, upload another';
    // }

    return self::$errors;
    }
}
