<?php
namespace App\Frontend\Models;
use Phalcon\Mvc\Model;

class Product extends Model
{

    protected $id;
    public $pid;
    public $name;
    public $pcode;
    public $api;
    public $time_rule;
    public $game_rule;
    public $rand;
    public $income;
    public $day_time;
    public $week_time;
    public $state; 
    public $add_time; 

    public function initialize()
    {
        $this->belongsTo('pid', 'App\Backend\Models\ProductCate', 'id', ['alias' => 'ProductCate']);  
    }

    public function getSource()
    {
        return "w_product";
    }

    public function getId()
    {
        return $this->id;
    }    

}
