<?php
namespace App\Frontend\Models;

use Phalcon\Mvc\Model;

/**
 * 订单模型
 * 对应数据库中的 w_order 表
 */
class Order extends Model
{
    /**
     * 订单名称
     * @var string
     */
    public $name;
    
    /**
     * 用户 ID
     * @var int
     */
    public $uid;
    
    /**
     * 产品 ID
     * @var int
     */
    public $pid;
    
    /**
     * 订单金额
     * @var float
     */
    public $money;
    
    /**
     * 结束时间
     * @var int
     */
    public $end_time;
    
    /**
     * 添加时间
     * @var int
     */
    public $add_time;
    
    /**
     * 获取数据表名
     * @return string 数据表名称
     */
    public function getSource()
    {
        return "w_order";
    }

    /**
     * 获取订单 ID
     * @return mixed 订单 ID
     */
    public function getId()
    {
        return $this->id;
    }

}
