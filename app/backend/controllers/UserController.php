<?php
namespace App\Backend\Controllers;
use Phalcon\Mvc\Controller;
use App\Backend\Repositories\UserRepository;

class UserController extends BaseController
{
    public function initialize()
    {   
        parent::initialize();
        $this->repo = new UserRepository();
    }

    public function indexAction()
    {  
        $currentPage = $this->request->getQuery('page', 'int') ? $this->request->getQuery('page', 'int') : 1;
        $this->view->setVars([
            'page'    =>  $this->repo->list( $currentPage )
        ]);

    }    

}
