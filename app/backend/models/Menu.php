<?php
namespace App\Backend\Models;
use Phalcon\Mvc\Model;


class Menu extends Model
{
    protected $id;
    public $pid;
    public $name;
    public $ico;
    public $state; 
    public $sort; 
    public $path; 
    public $controller; 
    public $action; 
    public $level; 
    protected $add_time; 

    public function getSource()
    {
        return "w_menu";
    }

    public function getId()
    {
        return $this->id;
    }

    public static function child_menu(){
        $conditions = "level > ?1 AND state = ?2";
        $parameters = [
            1 => 0,
            2 => 0
        ];
        $menu  = self::find([
            $conditions,
            "bind" => $parameters
        ]);
        return $menu;
    }

    public static function father_menu(){
        $conditions = "level = ?1 AND state = ?2 ORDER BY ?3 DESC,?4 DESC";
        $parameters = [
            1 => 0,
            2 => 0,
            3=>'sort',
            4=>'id'
        ];
        $menu  = self::find([
            $conditions,
            "bind" => $parameters
        ]);
        return $menu;
    }


}
