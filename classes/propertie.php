<?php 

namespace App;

class Propertie{

    public $id;
    public $tittle;
    public $price;
    public $image;
    public $description;
    public $rooms;
    public $wc;
    public $parking;
    public $created;
    public $seller_id;
    
    // Constructor
    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->tittle = $args['tittle'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->image = $args['image'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->rooms = $args['rooms'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->parking = $args['parking'] ?? '';
        $this->created = date('Y/m/d');
        $this->seller_id = $args['sellers_id'] ?? '';
    }

}

?>