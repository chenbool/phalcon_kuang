<?php
namespace App\Frontend\Models;

use Phalcon\Mvc\Model;

/**
 * 产品模型
 * 对应数据库中的 w_product 表
 */
class Product extends Model
{
    /**
     * 产品 ID
     * @var int
     */
    protected $id;
    
    /**
     * 产品分类 ID
     * @var int
     */
    public $pid;
    
    /**
     * 产品名称
     * @var string
     */
    public $name;
    
    /**
     * 产品代码
     * @var string
     */
    public $pcode;
    
    /**
     * 外部 API 标识
     * @var string
     */
    public $api;
    
    /**
     * 时间规则
     * @var string
     */
    public $time_rule;
    
    /**
     * 游戏规则
     * @var string
     */
    public $game_rule;
    
    /**
     * 随机参数
     * @var string
     */
    public $rand;
    
    /**
     * 收益比例
     * @var float
     */
    public $income;
    
    /**
     * 每日时间限制
     * @var int
     */
    public $day_time;
    
    /**
     * 每周时间限制
     * @var int
     */
    public $week_time;
    
    /**
     * 状态
     * @var int
     */
    public $state; 
    
    /**
     * 添加时间
     * @var int
     */
    public $add_time; 

    /**
     * 初始化方法
     * 设置模型关联关系
     */
    public function initialize()
    {
        // 关联产品分类表
        $this->belongsTo('pid', 'App\Backend\Models\ProductCate', 'id', ['alias' => 'ProductCate']);  
    }

    /**
     * 获取数据表名
     * @return string 数据表名称
     */
    public function getSource()
    {
        return "w_product";
    }

    /**
     * 获取产品 ID
     * @return mixed 产品 ID
     */
    public function getId()
    {
        return $this->id;
    }    

}
