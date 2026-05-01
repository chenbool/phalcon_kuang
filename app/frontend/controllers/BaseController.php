<?php
namespace App\Frontend\Controllers;

use Phalcon\Mvc\Controller;

/**
 * 前台控制器基类
 * 提供前台控制器的通用初始化和权限验证功能
 */
class BaseController extends Controller
{
    /**
     * 初始化方法
     * 在每个前台控制器动作执行前检查用户登录状态
     */
    public function initialize(){

        // 判断 Session 中是否存在用户 ID，若不存在则跳转到登录页面
        if( !$this->session->has("user_id") ){
            return $this->response->redirect('/login/index');
            exit;
        }

        // 将当前用户信息传递给视图
        $this->view->setVars([
            'admin_name'    => $this->session->get('user_name'),  // 用户名
            'admin_id'      => $this->session->get('user_id'),     // 用户 ID
        ]);


    }

}
