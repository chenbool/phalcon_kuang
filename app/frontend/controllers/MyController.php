<?php
namespace App\Frontend\Controllers;
use Phalcon\Mvc\Controller;
// use App\Frontend\Repositories\MyRepository;

class MyController extends BaseController
{
    protected $repo;
    public function initialize()
    {   
        parent::initialize();
        // $this->repo = new MyRepository();
    }

    public function indexAction()
    {
        // $id = $this->request->get('id'); 
        // $data = $this->repo->getOne($id);
        // $this->view->setVar('info', $data);
    }


    public function orderAction()
    {
        if ( $this->request->isPost() &&  $this->request->isAjax() ) {
            $this->response->setJsonContent( $this->repo->order( $this->request->getPost() ) );
            return false;
        }
    }

}
