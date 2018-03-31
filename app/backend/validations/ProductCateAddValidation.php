<?php
namespace App\Backend\Validations;

use Phalcon\Validation,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\StringLength;

class ProductCateAddValidation extends Validation
{
    public function initialize()
    {
        $this->add('name', new PresenceOf([
            'message' => '名称必须填写'
        ]));

        $this->add('pid', new PresenceOf([
            'message' => '上级不能为空'
        ]));

        $this->add('desc', new PresenceOf([
            'message' => '描述不能为空'
        ]));

        $this->add(
            "desc",
            new StringLength([
                    "max"            => 100,
                    "messageMaximum" => "描述最多只能100字",
            ])
        );    

    }


}
