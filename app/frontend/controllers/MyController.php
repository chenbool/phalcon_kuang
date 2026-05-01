<?php
namespace App\Frontend\Controllers;

use Phalcon\Mvc\Controller;
// use App\Frontend\Repositories\MyRepository;

/**
 * 我的订单控制器
 * 处理用户订单相关业务逻辑
 */
class MyController extends BaseController
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
        // $this->repo = new MyRepository();
    }

    /**
     * 我的订单页面动作
     */
    public function indexAction()
    {
        // $id = $this->request->get('id'); 
        // $data = $this->repo->getOne($id);
        // $this->view->setVar('info', $data);
    }

    /**
     * 订单操作动作
     * 处理 AJAX 异步订单请求
     */
    public function orderAction()
    {
        if ( $this->request->isPost() &&  $this->request->isAjax() ) {
            $this->response->setJsonContent( $this->repo->order( $this->request->getPost() ) );
            return false;
        }
    }

}
