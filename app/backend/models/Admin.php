<?php
namespace App\Backend\Models;

use Phalcon\Mvc\Model;
use Phalcon\Validation,
Phalcon\Validation\Validator\PresenceOf,
// Phalcon\Validation\Validator\StringLength,
Phalcon\Validation\Validator\Identical,
Phalcon\Validation\Validator\Uniqueness;

/**
 * 管理员模型
 * 对应数据库中的 w_admin 表
 */
class Admin extends Model
{
    /**
     * 管理员 ID
     * @var int
     */
    protected $id;
    
    /**
     * 用户名
     * @var string
     */
    public $username;
    
    /**
     * 密码
     * @var string
     */
    public $password;
    
    /**
     * 状态
     * @var int
     */
    public $state; 

    /**
     * 获取数据表名
     * @return string 数据表名称
     */
    public function getSource()
    {
        return "w_admin";
    }

    /**
     * 数据验证
     * 验证用户名唯一性和必填项
     * @return Validation 验证结果
     */
    public function validation()
    {
        $validation = new Validation;

        // 验证用户名唯一性
        $validation->add("username", new Uniqueness([
            "message" => "用户名已经存在"
        ]));
        
        // 验证用户名必填
        $validation->add('username', new PresenceOf([
            'message' => '用户名必须填写'
        ]));

        // 验证密码必填
        $validation->add('password', new PresenceOf([
            'message' => '密码必须填写'
        ]));

        return $this->validate($validation);
    }

    /**
     * 获取管理员 ID
     * @return mixed 管理员 ID
     */
    public function getId()
    {
        return $this->id;
    }
}
