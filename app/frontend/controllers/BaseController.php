<?php
namespace App\Frontend\Controllers;
use Phalcon\Mvc\Controller;

class BaseController extends Controller
{
    public function initialize(){

        //判断session ,检测用户是否登录
        if( !$this->session->has("user_id") ){
            return $this->response->redirect('/login/index');
            exit;
        }


        $this->view->setVars([
            'admin_name'    => $this->session->get('user_name'),
            'admin_id'      => $this->session->get('user_id'),
        ]);


    }

}
