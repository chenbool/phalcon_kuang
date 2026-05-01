<?php
namespace App\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use App\Frontend\Repositories\LoginRepository;

/**
 * 前台登录控制器
 * 处理用户登录、注册、退出等认证相关业务
 */
class LoginController extends Controller
{
    /**
     * 登录数据仓储实例
     * @var LoginRepository
     */
    protected $repo;
    
    /**
     * 初始化方法
     * 实例化登录数据仓储
     */
    public function initialize()
    {   
        $this->repo = new LoginRepository($this->session);
    }

    /**
     * 登录页面动作
     * 显示登录页面
     */
    public function indexAction()
    {     
        
    }

    /**
     * 用户注册动作
     * 处理 AJAX 异步注册请求
     */
    public function registerAction()
    {
        if ( $this->request->isPost() &&  $this->request->isAjax() ) {
            $this->response->setJsonContent( $this->repo->register( $this->request->getPost() ) );
            return false;
        }
    }

    /**
     * 用户登录动作
     * 处理 AJAX 异步登录请求
     */
    public function loginAction()
    {
        if ( $this->request->isPost() &&  $this->request->isAjax() ) {
            $this->response->setJsonContent( $this->repo->login( $this->request->getPost() ) );
            return false;
        }
    }

    /**
     * 用户退出动作
     * 清除 Session 并跳转到登录页面
     */
    public function quitAction()
    {
        $this->repo->quit() && $this->response->redirect('/login/index');
    }


}
