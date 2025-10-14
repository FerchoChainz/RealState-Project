<?php

namespace App;

use PDO;

class Propertie extends ActiveRecord{
    protected static $table = 'properties';
    protected static $DBcols = ['id', 'tittle', 'price', 'image', 'description', 'rooms', 'wc', 'parking', 'created', 'sellers_id'];


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

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->tittle = $args['tittle'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->image = $args['image'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->rooms = $args['rooms'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->parking = $args['parking'] ?? '';
        $this->created = date('Y/m/d');
        $this->sellers_id = $args['sellers_id'] ?? '';
    }

    public function validate()
    {
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

        if (!$this->image) {
            self::$errors[] = 'Image is mandatory';
        }


        return self::$errors;
    }
}
