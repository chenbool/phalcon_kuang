<?php
namespace App\Backend\Models;

use Phalcon\Mvc\Model;

/**
 * 菜单模型
 * 对应数据库中的 w_menu 表
 */
class Menu extends Model
{
    /**
     * 菜单 ID
     * @var int
     */
    protected $id;
    
    /**
     * 父级菜单 ID
     * @var int
     */
    public $pid;
    
    /**
     * 菜单名称
     * @var string
     */
    public $name;
    
    /**
     * 菜单图标
     * @var string
     */
    public $ico;
    
    /**
     * 状态
     * @var int
     */
    public $state; 
    
    /**
     * 排序
     * @var int
     */
    public $sort; 
    
    /**
     * 路径
     * @var string
     */
    public $path; 
    
    /**
     * 控制器名称
     * @var string
     */
    public $controller; 
    
    /**
     * 方法名称
     * @var string
     */
    public $action; 
    
    /**
     * 层级
     * @var int
     */
    public $level; 
    
    /**
     * 添加时间
     * @var int
     */
    protected $add_time; 

    /**
     * 获取数据表名
     * @return string 数据表名称
     */
    public function getSource()
    {
        return "w_menu";
    }

    /**
     * 获取菜单 ID
     * @return mixed 菜单 ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 获取子级菜单
     * 获取所有启用的子级菜单
     * @return Menu[] 子级菜单列表
     */
    public static function child_menu(){
        $conditions = "level > ?1 AND state = ?2";
        $parameters = [
            1 => 0,
            2 => 0
        ];
        $menu  = self::find([
            $conditions,
            "bind" => $parameters
        ]);
        return $menu;
    }

    /**
     * 获取父级菜单
     * 获取所有启用的顶级菜单
     * @return Menu[] 父级菜单列表
     */
    public static function father_menu(){
        $conditions = "level = ?1 AND state = ?2 ORDER BY ?3 DESC,?4 DESC";
        $parameters = [
            1 => 0,
            2 => 0,
            3=>'sort',
            4=>'id'
        ];
        $menu  = self::find([
            $conditions,
            "bind" => $parameters
        ]);
        return $menu;
    }


}
