<?php
namespace App\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use App\Frontend\Repositories\IndexRepository;
use App\Frontend\Models\Product;

/**
 * 前台首页控制器
 * 处理前台首页相关业务逻辑
 */
class IndexController extends BaseController
{
    /**
     * 数据仓储实例
     * @var IndexRepository
     */
    protected $repo;
    
    /**
     * 初始化方法
     * 调用父类初始化方法并实例化数据仓储
     */
    public function initialize()
    {   
        parent::initialize();
        $this->repo = new IndexRepository();
    }

    /**
     * 首页动作
     * 获取首页数据并渲染视图
     */
    public function indexAction()
    {
        $this->view->setVars([
            'plist'    =>  $this->repo->index(),  // 获取首页产品列表
        ]);
    }
}
