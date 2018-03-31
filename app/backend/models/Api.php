<?php
namespace App\Backend\Models;
use Phalcon\Mvc\Model;

class Api extends Model
{
    public $name;
    public $type;
    public $url;
    public $args;
    public function getSource()
    {
        return "w_api";
    }

    public function getId()
    {
        return $this->id;
    }

}
