<?php
namespace App\Backend\Controllers;
use Phalcon\Mvc\Controller;
use App\Backend\Models\Menu;

class BaseController extends Controller
{
    public function initialize(){

        //判断session ,检测用户是否登录
        if( !$this->session->has("admin_id") ){
            return $this->response->redirect('/admin/login/index');
            exit;
        }

        // 直接传递单个参数
        // $this->view->paramName = value; 
        // // 传递单个参数
        // $this->view->setVar('paramName', 'value'); 

        //菜单
        $menu['child'] = Menu::child_menu();
        $menu['father'] = Menu::father_menu();
        
        //url        
        $url = explode('/',$this->request->getUri() );
        $controller = $url[2];

        // 传递多个参数
        $this->view->setVars([
            'controller'    =>  $controller,
            'menu_list'     =>  $menu,
            'sys_linux'     =>  sys_linux(),
            'admin_name'    => $this->session->get('admin_name'),
            'admin_id'      => $this->session->get('admin_id'),
        ]);


    }

}
