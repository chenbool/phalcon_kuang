<?php
namespace App\Frontend\Models;

use Phalcon\Mvc\Model;
// use Phalcon\Validation,
// Phalcon\Validation\Validator\PresenceOf,
// Phalcon\Validation\Validator\Identical,
// Phalcon\Validation\Validator\Uniqueness;

/**
 * 用户模型
 * 对应数据库中的 w_user 表
 */
class User extends Model
{
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
     * 昵称
     * @var string
     */
    public $nickname;
    
    /**
     * 账户余额
     * @var float
     */
    public $money;
    
    /**
     * 获取数据表名
     * @return string 数据表名称
     */
    public function getSource()
    {
        return "w_user";
    }

    /**
     * 获取用户 ID
     * @return mixed 用户 ID
     */
    public function getId()
    {
        return $this->id;
    }

}
