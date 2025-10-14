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
}
