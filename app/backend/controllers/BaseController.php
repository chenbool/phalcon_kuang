<?php
namespace App\Backend\Controllers;

use Phalcon\Mvc\Controller;
use App\Backend\Models\Menu;

/**
 * 后台控制器基类
 * 提供后台控制器的通用初始化和权限验证功能
 */
class BaseController extends Controller
{
    /**
     * 初始化方法
     * 在每个后台控制器动作执行前检查用户登录状态并加载菜单
     */
    public function initialize(){

        // 判断 Session 中是否存在管理员 ID，若不存在则跳转到登录页面
        if( !$this->session->has("admin_id") ){
            return $this->response->redirect('/admin/login/index');
            exit;
        }

        // 获取菜单数据
        $menu['child'] = Menu::child_menu();   // 子菜单
        $menu['father'] = Menu::father_menu(); // 父菜单
        
        // 获取当前控制器名称
        $url = explode('/',$this->request->getUri() );
        $controller = $url[2];

        // 传递视图变量
        $this->view->setVars([
            'controller'    =>  $controller,             // 当前控制器
            'menu_list'     =>  $menu,                   // 菜单列表
            'sys_linux'     =>  sys_linux(),            // 系统信息
            'admin_name'    => $this->session->get('admin_name'),  // 管理员名称
            'admin_id'      => $this->session->get('admin_id'),     // 管理员 ID
        ]);


    }

}
