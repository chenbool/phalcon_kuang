<?php
namespace App\Backend\Controllers;
use Phalcon\Mvc\Controller;
use App\Backend\Repositories\AdminRepository;
use App\Backend\Models\Admin;

class AdminController extends BaseController
{
    protected $repo;
    public function initialize()
    {   
        parent::initialize();
        $this->repo = new AdminRepository();
    }

    public function indexAction()
    {  
        // 传递多个参数
        $this->view->setVars([
            'list'    => $this->repo->plist()
        ]);
    }    

    public function addAction()
    {  
        //添加产品
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {
            //验证信息
            $this->response->setJsonContent( $this->repo->add( $this->request->getPost() ) );
            return false;
        }
    } 

    // 添加
    public function editAction()
    {   
        $id = $this->request->get('id'); 
        $info = Admin::findFirst($id);

        // 传递多个参数
        $this->view->setVars([
            'info'    =>  $info
        ]);

        //编辑产品
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {
            //验证信息
            $this->response->setJsonContent( $this->repo->edit( $this->request->getPost() ) );
            return false;
        }
    }
  

    // 删除
    public function delAction(){
        //删除
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {
            //验证信息
            $id = $this->request->getPost('id'); 
           

           // dd( $this->session->get("admin_id") );

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

            return false;
        }
    } 


}
