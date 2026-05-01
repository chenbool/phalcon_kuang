<?php
namespace App\Backend\Controllers;

use Phalcon\Mvc\Controller;
use App\Backend\Repositories\AdminRepository;
use App\Backend\Models\Admin;

/**
 * 管理员控制器
 * 处理管理员的增删改查等业务逻辑
 */
class AdminController extends BaseController
{
    /**
     * 管理员数据仓储实例
     * @var AdminRepository
     */
    protected $repo;
    
    /**
     * 初始化方法
     * 调用父类初始化方法并实例化数据仓储
     */
    public function initialize()
    {   
        parent::initialize();
        $this->repo = new AdminRepository();
    }

    /**
     * 管理员列表页面动作
     * 显示所有管理员列表
     */
    public function indexAction()
    {  
        // 传递视图变量
        $this->view->setVars([
            'list'    => $this->repo->plist()
        ]);
    }    

    /**
     * 添加管理员动作
     * 处理 AJAX 异步添加请求
     */
    public function addAction()
    {  
        // 添加管理员
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {
            // 验证信息
            $this->response->setJsonContent( $this->repo->add( $this->request->getPost() ) );
            return false;
        }
    } 

    /**
     * 编辑管理员动作
     * 显示编辑页面并处理 AJAX 异步编辑请求
     */
    public function editAction()
    {   
        $id = $this->request->get('id'); 
        $info = Admin::findFirst($id);

        // 传递视图变量
        $this->view->setVars([
            'info'    =>  $info
        ]);

        // 编辑管理员
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {
            // 验证信息
            $this->response->setJsonContent( $this->repo->edit( $this->request->getPost() ) );
            return false;
        }
    }
  

    /**
     * 删除管理员动作
     * 处理 AJAX 异步删除请求
     */
    public function delAction(){
        // 删除
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {
            // 验证信息
            $id = $this->request->getPost('id'); 
           

            if( !$id ){
                $error = ['status'    =>  100,'info'      => '非法请求'];
                $this->response->setJsonContent( $error );
            }


            if( $id == $this->session->get("admin_id") ){
                $error = ['status'    =>  100,'info' => '不能删除自己'];
                $this->response->setJsonContent( $error );
            }else{
                if( ($id == '1' || $id == 1 )  ){
                    $error = ['status'    =>  100,'info' => '超级用户不能删除'];
                    $this->response->setJsonContent( $error );
                }else{
                    $this->response->setJsonContent( $this->repo->del( $id ) );
                }  
            }      
