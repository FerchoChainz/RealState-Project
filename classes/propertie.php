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
        $this->image = $args['image'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->rooms = $args['rooms'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->parking = $args['parking'] ?? '';
        $this->created = date('Y/m/d');
        $this->sellers_id = $args['sellers_id'] ?? 1;
    }

    public function saveUpdate(){
        if(isset($this -> id)){
            // update register if exist 
            $this -> update();
        } else{
            // create new register
            $this->saveData();
        }
    }

    public function update(){
        $atributes = $this->sanitizeData();

        // this join atributes and values
        $values = [];

        foreach ($atributes as $key => $value) {
            $values[] = "{$key}='{$value}'";
        }

        $query = " UPDATE properties SET ";
        $query .= join(', ',$values);
        // join convert the array values into like a sql query sentence
        // we have the key and value y plain string separated by ','
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1";
        
        $result = self::$db->query($query);

        if($result){
            header('Location: /admin?result=2');
        }

        return $result;

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
        if ($result) {
            // Redirection
            header('location: /admin?result=1');
        }
        // debbuger($result)
    }

    // identify and join atributes of DB
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

    if(!$this->image){
        self::$errors[] = 'Image is mandatory';
    }


    return self::$errors;
    }


    public function setImage($image){
        // delete previous image

        if(isset($this->id)){
            // check if file exists 
            $exist = file_exists(DIR_IMAGES . $this->image);

            if($exist){
                unlink(DIR_IMAGES . $this->image);
            }
        }


        if($image){
            $this->image = $image;
        }
    }


    // list all properties
    // in this function had a query, this return an assoc array
    public static function all(){
        $query = "SELECT * FROM properties";

        // take this query in assoc array form to the method consult
        $resutl = self::consultSQL($query);

       return $resutl; 
    }

    // search a register by ID
    public static function find($id){
        $query = "SELECT * FROM properties WHERE id = $id ";

        // re-use the methods to convert arrays to objects
        $result = self::consultSQL($query);


        return(array_shift($result));

    }


    // HERE CONVERT ARRAYS TO OBJECTS
    public static function consultSQL($query){
        // consult bd
        $result = self::$db->query($query);

        // iterate results
        // this a assoc array, but we created a new method to convert arrays to objects
        $array = [];
        while($register = $result->fetch_assoc()){
            $array[] = self::createObjects($register);
        }

        // clear memory 
        $result->free();


        // return results
        // return an array full of all the objects converted
        return $array;
    }


    // In activeRecord you cant use arrays, you must have to use objects
    // this method convert array in objects
    protected static function createObjects($register){
        $object = new self;

        // this code check and map the data from arrays to objects
        foreach($register as $key => $value){
            if(property_exists($object, $key)){
                $object->$key = $value;
            }
        }

        return $object;
    }


    // sync the object in memory with the changes made by user admin in update
    public function sync($args = []){

        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}
