<?php
namespace App\Backend\Controllers;
use Phalcon\Mvc\Controller;
use App\Backend\Repositories\UiRepository;

class UiController extends BaseController
{
    public function initialize()
    {   
        parent::initialize();
        $this->repo = new UiRepository();
    }

    public function indexAction()
    {  

        $this->view->setVars([
            'list'    =>$this->repo->readDirectory()
        ]);

    }  

    //安装
    public function installAction()
    {  
        if ( $this->request->isPost() &&  $this->request->isAjax() ) {
            $this->response->setJsonContent( $this->repo->install( $this->request->getPost('name') ) );
        }
        return false;
    }  


}
