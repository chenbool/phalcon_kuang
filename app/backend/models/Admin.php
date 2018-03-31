<?php
namespace App\Backend\Models;
use Phalcon\Mvc\Model;
use Phalcon\Validation,
Phalcon\Validation\Validator\PresenceOf,
// Phalcon\Validation\Validator\StringLength,
Phalcon\Validation\Validator\Identical,
Phalcon\Validation\Validator\Uniqueness;

class Admin extends Model
{
    protected $id;
    public $username;
    public $password;
    public $state; 

    public function getSource()
    {
        return "w_admin";
    }

    public function validation()
    {
        $validation = new Validation;

        $validation->add("username", new Uniqueness([
            "message" => "用户名已经存在"
        ]));
        $validation->add('username', new PresenceOf([
            'message' => '用户名必须填写'
        ]));

        $validation->add('password', new PresenceOf([
            'message' => '密码必须填写'
        ]));

        // $validation->add("password",new StringLength([
        //     "max"            => ,
        //     "min"            => 4,
        //     "messageMaximum" => "密码最多只能32位",
        //     "messageMinimum" => "密码最少只能4位",
        // ]));
        return $this->validate($validation);
    }

    public function getId()
    {
        return $this->id;
    }


}
