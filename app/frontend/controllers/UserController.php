<?php
namespace App\Frontend\Controllers;
use Phalcon\Mvc\Controller;
use App\Frontend\Repositories\UserRepository;

class UserController extends BaseController
{
    protected $repo;
    public function initialize()
    {   
        parent::initialize();
        $this->repo = new UserRepository($this->session);
    }

    public function indexAction()
    {
        $res = $this->repo->getInfo();
        $this->view->setVars([
            'userInfo'    =>  $this->repo->getInfo(),
        ]);
    }
}
