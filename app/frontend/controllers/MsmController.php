<?php
namespace App\Frontend\Controllers;

use Phalcon\Mvc\Controller;
use App\Frontend\Repositories\MsmRepository;

/**
 * 短信控制器
 * 处理短信发送相关业务逻辑
 */
class MsmController extends Controller
{
	/**
	 * 短信数据仓储实例
	 * @var MsmRepository
	 */
	protected $repo;
    
    /**
     * 初始化方法
     * 实例化短信数据仓储
     */
    public function initialize()
    {   
        $this->repo = new MsmRepository($this->session);
    }

	/**
	 * 发送短信动作
	 * 处理 AJAX 异步短信发送请求
	 */
	public function indexAction(){
        if ( $this->request->isPost() &&  $this->request->isAjax() ) {
            $data = $this->request->getPost(); 
            $this->response->setJsonContent( $this->repo->send(  $data  ) );
        }
		
		return false;
	}



}
