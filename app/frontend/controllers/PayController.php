<?php
namespace App\Frontend\Controllers;

use Phalcon\Mvc\Controller;
// use App\Frontend\Repositories\IndexRepository;
// use App\Frontend\Models\Product;

/**
 * 前台支付控制器
 * 处理支付相关业务逻辑
 */
class PayController extends BaseController
{
    /**
     * 数据仓储实例
     * @var mixed
     */
    protected $repo;
    
    /**
     * 初始化方法
     * 调用父类初始化方法
     */
    public function initialize()
    {   
        parent::initialize();
        // $this->repo = new IndexRepository();
    }

    /**
     * 支付页面动作
     */
    public function indexAction()
    {
        // $this->view->setVars([
        //     'plist'    =>  $this->repo->index(),
        // ]);
    }
}
