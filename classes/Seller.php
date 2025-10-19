<?php 

namespace App;

class Seller extends ActiveRecord{

    protected static $table = 'sellers';
    protected static $DBcols = ['id', 'name', 'last_name', 'phone_number'];

    public $id;
    public $name;
    public $last_name;
    public $phone_number;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->last_name = $args['last_name'] ?? '';
        $this->phone_number = $args['phone_number'] ?? '';
    }
    
    
    public function validate(){
        if(!$this->name){
            self::$errors[] = "Name can't be empty.";
        }
        if(!$this->last_name){
            self::$errors[] = "Last name can't be empty.";
        }
        if(!$this->phone_number){
            self::$errors[] = "Phone number can't be empty.";
        }

        $pattern = '/^(\(?\d{3}\)?[-.\s]?){2}\d{4}$/';

        if(!preg_match( $pattern, $this->phone_number)){
            self::$errors[] = 'Incorrect type of phone number';
        }


        return self::$errors;
    }
}


