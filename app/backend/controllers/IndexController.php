<?php
namespace App\Backend\Controllers;

use Phalcon\Mvc\Controller;

/**
 * 后台首页控制器
 * 处理后台首页相关业务逻辑
 */
class IndexController extends BaseController
{
    /**
     * 初始化方法
     * 调用父类初始化方法
     */
    public function initialize()
    {   
        parent::initialize();
        // $this->view->setTemplateAfter('common');
    }

    /**
     * 首页动作
     * 显示后台管理首页
     */
    public function indexAction()
    {  
        // return false;
    }    

}
