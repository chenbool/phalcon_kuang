<?php
namespace App\Frontend\Controllers;
use Phalcon\Mvc\Controller;
use App\Frontend\Repositories\LoginRepository;

class LoginController extends Controller
{
    protected $repo;
    public function initialize()
    {   
        $this->repo = new LoginRepository($this->session);
    }

    public function indexAction()
    {     
        
    }

    public function registerAction()
    {
        if ( $this->request->isPost() &&  $this->request->isAjax() ) {
            $this->response->setJsonContent( $this->repo->register( $this->request->getPost() ) );
            return false;
        }
    }

    public function loginAction()
    {
        if ( $this->request->isPost() &&  $this->request->isAjax() ) {
            $this->response->setJsonContent( $this->repo->login( $this->request->getPost() ) );
            return false;
        }
    }

    public function quitAction()
    {
        $this->repo->quit() && $this->response->redirect('/login/index');
    }


}
