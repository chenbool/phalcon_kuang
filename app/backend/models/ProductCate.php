<?php
namespace App\Backend\Models;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Uniqueness,
    Phalcon\Mvc\Model\Validator\PresenceOf;

class ProductCate extends Model
{
    protected $id;
    public $pid;
    public $name;
    public $state; 
    public $order; 
    public $add_time; 

    public function getSource()
    {
        return "w_product_cate";
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMessages()
    {
        $messages = [];
        foreach (parent::getMessages() as $message) {
            switch ($message->getType()) {
                case 'InvalidCreateAttempt':
                    $messages[] = '已经存在';
                    break;
                case 'InvalidUpdateAttempt':
                    $messages[] = '不能更新记录因为它已经存在';
                    break;
            }
        }
        return $messages;
    }

    // PhalconMvcModel::beforeSave()
    // PhalconMvcModel::beforeCreate()
    // PhalconMvcModel::beforeUpdate()
    public function beforeDelete()
    {
        return true;
    }

}
