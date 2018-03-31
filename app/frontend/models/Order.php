<?php
namespace App\Frontend\Models;
use Phalcon\Mvc\Model;

class Order extends Model
{
    public $name;
    public $uid;
    public $pid;
    public $money;
    public $end_time;
    public $add_time;
    public function getSource()
    {
        return "w_order";
    }

    public function getId()
    {
        return $this->id;
    }

}
