<?php
namespace App\Frontend\Controllers;
use Phalcon\Mvc\Controller;
use App\Frontend\Repositories\IndexRepository;
use App\Frontend\Models\Product;

class IndexController extends BaseController
{
    protected $repo;
    public function initialize()
    {   
        parent::initialize();
        $this->repo = new IndexRepository();
    }

    public function indexAction()
    {
        $this->view->setVars([
            'plist'    =>  $this->repo->index(),
        ]);
    }
}
