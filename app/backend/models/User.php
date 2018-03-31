<?php
namespace App\Backend\Models;
use Phalcon\Mvc\Model;

class User extends Model
{
    public $username;
    public $password;
    public $nickname;
    public $money;
    public function getSource()
    {
        return "w_user";
    }

    public function getId()
    {
        return $this->id;
    }

}
