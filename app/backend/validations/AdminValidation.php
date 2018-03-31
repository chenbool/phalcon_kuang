<?php
namespace App\Backend\Validations;

use Phalcon\Validation,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\StringLength;

class AdminValidation extends Validation
{
    public function initialize()
    {
        $this->add('username', new PresenceOf([
            'message' => '用户名必须填写'
        ]));

        $this->add('password', new PresenceOf([
            'message' => '密码不能为空'
        ]));

        $this->add('email', new PresenceOf([
            'message' => '邮箱不能为空'
        ]));

        $this->add('phone', new PresenceOf([
            'message' => '手机号不能为空'
        ]));

        $this->add('c_password', new PresenceOf([
            'message' => '确认密码不能为空'
        ]));

        $this->add("username",new StringLength([
            "max"            => 16,
            "min"            => 4,
            "messageMaximum" => "用户名最多只能16位",
            "messageMinimum" => "用户名最少只能4位",
        ])); 

        // $this->add("password",new StringLength([
        //     "max"            => 16,
        //     "min"            => 4,
        //     "messageMaximum" => "密码最多只能16位",
        //     "messageMinimum" => "密码最少只能4位",
        // ]));   

    }


}
