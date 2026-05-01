<?php
namespace App\Backend\Controllers;

use Phalcon\Mvc\Controller;
use App\Backend\Plugins\Captcha;
use App\Backend\Repositories\LoginRepository;

/**
 * 后台登录控制器
 * 处理管理员登录、验证码、退出等认证相关业务
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
     * 检查是否已登录，已登录则跳转到后台首页
     */
    public function initialize()
    {
        // 判断是否已登录
        if( $this->session->has("admin_id") ){
            return $this->response->redirect('/admin/index/index');
            exit;
        }

        $this->repo = new LoginRepository();
    }

    /**
     * 登录页面动作
     * 显示登录页面
     */
    public function indexAction()
    {
    }

    /**
     * 登录操作动作
     * 处理 AJAX 异步登录请求
     */
    public function loginAction()
    {
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {
            // 验证信息
            $data = $this->request->getPost();
            $this->response->setJsonContent( $this->repo->login( $data,$this->session ) );
        }
        return false;
    }

    /**
     * 验证码动作
     * 生成并显示验证码图片
     */
    public function captchaAction()
    {
        $captcha = new Captcha();
        $captcha->CreateImg();
        $this->session->set("check_code", $captcha->codes );
        $captcha = NULL;
        return false;
    }

    /**
     * 退出登录动作
     * 清除 Session 并跳转到登录页面
     */
    public function quitAction()
    {
        $this->session->remove("admin_id");
        $this->session->remove("admin_name");
        // $this->session->destroy();
        return $this->response->redirect('/admin/login/index');
    }


}
