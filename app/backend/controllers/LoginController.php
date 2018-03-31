<?php
namespace App\Backend\Controllers;
use Phalcon\Mvc\Controller;
use App\Backend\Plugins\Captcha;
use App\Backend\Repositories\LoginRepository;

class LoginController extends Controller
{
    protected $repo;
    public function initialize()
    {
        //判断session ,检测用户是否登录
        if( $this->session->has("admin_id") ){
            return $this->response->redirect('/admin/index/index');
            exit;
        }

        $this->repo = new LoginRepository();
    }

    public function indexAction()
    {
    }

    //登录操作
    public function loginAction()
    {
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {
            //验证信息
            $data = $this->request->getPost();
            $this->response->setJsonContent( $this->repo->login( $data,$this->session ) );
        }
        return false;
    }

    //验证码
    public function captchaAction()
    {
        $captcha = new Captcha();
        $captcha->CreateImg();
        $this->session->set("check_code", $captcha->codes );
        $captcha = NULL;
        return false;
    }

    //退出登录
    public function quitAction()
    {
        $this->session->remove("admin_id");
        $this->session->remove("admin_name");
        // $this->session->destroy();
        return $this->response->redirect('/admin/login/index');
    }


}
