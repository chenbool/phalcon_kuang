<?php
namespace App\Frontend\Validations;

use Phalcon\Validation,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\StringLength;

class LoginValidation extends Validation
{
    public function initialize()
    {
        $this->add('phone', new PresenceOf([
            'message' => '手机号必须填写'
        ]));

        $this->add('password', new PresenceOf([
            'message' => '密码必须填写'
        ]));

        $this->add('c_password', new PresenceOf([
            'message' => '确认密码必须填写'
        ]));

        $this->add('code', new PresenceOf([
            'message' => '验证码必须填写'
        ]));

        $this->add("phone",new StringLength([
            "max"            => 11,
            "min"            => 11,
            "messageMaximum" => "手机号只能11位",
            "messageMinimum" => "手机号只能11位",
        ]));   

        $this->add("password",new StringLength([
            "max"            => 16,
            "min"            => 4,
            "messageMaximum" => "密码最多只能16位",
            "messageMinimum" => "密码最少只能4位",
        ]));    

    }


}


// $validation = new LoginValidation();

// $messages = $validation->validate($_POST);
// if (count($messages)) {
//     foreach ($messages as $message) {
//         echo $message, '<br>';
//     }
// }