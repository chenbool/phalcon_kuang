<?php
namespace App\Backend\Models;
use Phalcon\Mvc\Model;


class Conf extends Model
{
    protected $id;
    public $title;
    public $keyword;
    public $desc; 
    public $icp; 
    public $copy; 
    public $html; 

    public function getSource()
    {
        return "w_conf";
    }

    public function getId()
    {
        return $this->id;
    }


}
