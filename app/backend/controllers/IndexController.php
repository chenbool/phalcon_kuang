<?php
namespace App\Backend\Controllers;
use Phalcon\Mvc\Controller;

class IndexController extends BaseController
{
    public function initialize()
    {   
        parent::initialize();
        // $this->view->setTemplateAfter('common');
    }

    public function indexAction()
    {  
        // return false;
    }    

}
