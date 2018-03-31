<?php
namespace App\Backend\Validations;

use Phalcon\Validation,
    Phalcon\Validation\Validator\PresenceOf;

class ProductAddValidation extends Validation
{
    public function initialize()
    {
        $this->add('name', new PresenceOf([
            'message' => '名称必须填写'
        ]));

        $this->add('pid', new PresenceOf([
            'message' => '上级不能为空'
        ]));

        $this->add('api', new PresenceOf([
            'message' => '请选择接口'
        ]));

        $this->add('pcode', new PresenceOf([
            'message' => '请选择产品接口'
        ]));

        $this->add('time_rule', new PresenceOf([
            'message' => '时间间隔不能为空'
        ]));

        $this->add('game_rule', new PresenceOf([
            'message' => '玩法规则不能为空'
        ]));

        $this->add('rand', new PresenceOf([
            'message' => '波动范围不能为空'
        ]));
        
        $this->add('income', new PresenceOf([
            'message' => '亏盈比例不能为空'
        ]));       

        // $this->add(
        //     "desc",
        //     new StringLength([
        //             "max"            => 100,
        //             "messageMaximum" => "描述最多只能100字",
        //     ])
        // );    

    }


}
