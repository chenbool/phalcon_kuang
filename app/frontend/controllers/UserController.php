<?php
namespace App\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use App\Frontend\Repositories\UserRepository;

/**
 * 前台用户控制器
 * 处理用户中心相关业务逻辑
 */
class UserController extends BaseController
{
    /**
     * 用户数据仓储实例
     * @var UserRepository
     */
    protected $repo;
    
    /**
     * 初始化方法
     * 调用父类初始化方法并实例化用户数据仓储
     */
    public function initialize()
    {   
        parent::initialize();
        $this->repo = new UserRepository($this->session);
    }

    /**
     * 用户中心首页动作
     * 获取用户信息并渲染视图
     */
    public function indexAction()
    {
        $res = $this->repo->getInfo();
        $this->view->setVars([
            'userInfo'    =>  $this->repo->getInfo(),  // 用户信息
        ]);
    }
}
