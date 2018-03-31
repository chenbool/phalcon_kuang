<?php
namespace App\Frontend\Controllers;
use Phalcon\Mvc\Controller;
use App\Frontend\Repositories\MsmRepository;

/**
* 发送短信
*/
class MsmController extends Controller
{
	protected $repo;
    public function initialize()
    {   
        $this->repo = new MsmRepository($this->session);
    }


	public function indexAction(){
        if ( $this->request->isPost() &&  $this->request->isAjax() ) {
            $data = $this->request->getPost(); 
            $this->response->setJsonContent( $this->repo->send(  $data  ) );
        }
		
		return false;
	}



}