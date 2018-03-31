<?php
namespace App\Backend\Validations;

use Phalcon\Validation,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\StringLength;

class LoginValidation extends Validation
{
    public function initialize()
    {
        $this->add('username', new PresenceOf([
            'message' => '用户名必须填写'
        ]));

        $this->add('password', new PresenceOf([
            'message' => '密码必须填写'
        ]));

        // $this->add('code', new PresenceOf([
        //     'message' => '验证码必须填写'
        // ]));

        $this->add("password",new StringLength([
            "max"            => 16,
            "min"            => 4,
            "messageMaximum" => "密码最多只能16位",
            "messageMinimum" => "密码最少只能4位",
        ]));    

    }


}
