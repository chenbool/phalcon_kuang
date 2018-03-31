<?php
namespace App\Frontend\Models;
use Phalcon\Mvc\Model;
// use Phalcon\Validation,
// Phalcon\Validation\Validator\PresenceOf,
// Phalcon\Validation\Validator\Identical,
// Phalcon\Validation\Validator\Uniqueness;

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
