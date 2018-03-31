<?php
namespace App\Backend\Controllers;
use Phalcon\Mvc\Controller;
use App\Backend\Repositories\ConfRepository;

class ConfController extends BaseController
{
    public function initialize()
    {   
        parent::initialize();
        $this->repo = new ConfRepository();
    }

    public function indexAction()
    {  
 
        $this->view->setVars([
            'info'    => $this->repo->getRes()
        ]);

    }  

    public function saveAction()
    {  
        if ( $this->request->isPost() && $this->request->isAjax()  ) {
            $this->response->setJsonContent( $this->repo->save( $this->request->getPost() ) );
        }
        return false;
    }

}
