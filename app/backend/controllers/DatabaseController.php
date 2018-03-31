<?php
namespace App\Backend\Controllers;
use Phalcon\Mvc\Controller;
use App\Backend\Repositories\DatabaseRepository;

class DatabaseController extends BaseController
{
    protected $repo;
    public function initialize()
    {   
        parent::initialize();
        $this->repo = new DatabaseRepository();
    }

    public function indexAction()
    {  
        //传递多个参数
        $this->view->setVars([
            'list'    => $this->repo->plist()
        ]);
    }    

    public function backAction()
    {  
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {
            $this->repo->back( $this->request->getPost('filename') );
            //验证信息
            $this->response->setJsonContent( [ 'status' =>  0,'info'  => ['备份成功'] ] );
        }

        return false;
    } 
     

    public function listAction()
    {  
        $dir = $this->repo->readDirectory(ROOT_PATH . "/app/backup/");
        //传递多个参数
        $this->view->setVars([
            'list'    => $dir['file']
        ]);
    } 

    // 添加
    public function downAction()
    {   
        $file = $this->request->getQuery('file', 'string') ; 
        $this->repo->downFile(ROOT_PATH . "/app/backup/".$file);
    }
  

    public function rmfileAction(){
        if ( $this->request->isPost() == true ) {

            $file= $this->request->getPost('file');
            // dd($file);
            unlink(ROOT_PATH . "/app/backup/".$file);
            //验证信息
            $this->response->setJsonContent( [ 'status' =>  0,'info'  => ['删除成功'] ] );
        }
        return false;
    }


}
