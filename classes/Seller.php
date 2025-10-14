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
    
}


