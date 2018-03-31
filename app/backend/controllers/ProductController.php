<?php
namespace App\Backend\Controllers;
use Phalcon\Mvc\Controller;
use App\Backend\Repositories\ProductRepository;

class ProductController extends BaseController
{
    protected $repo;
    public function initialize()
    {   
        parent::initialize();
        $this->repo = new ProductRepository();
    }

    public function indexAction()
    {   
        $currentPage = $this->request->getQuery('page', 'int') ? $this->request->getQuery('page', 'int') : 1;

        // 传递多个参数
        $this->view->setVars([
            'page'    => $this->repo->plist($currentPage),
            'menu'    => $this->repo->cateList(),
            // 'apiList' => Api::find(),
        ]);
    }

    // 添加
    public function addAction()
    {   
        // 传递多个参数
        $this->view->setVars([
            'menu'    => $this->repo->cateList()
            // 'api'     =>  Api::find(),
        ]);
        //添加产品
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {
            //验证信息
            $data = $this->request->getPost(); 
            $this->response->setJsonContent( $this->repo->add( $data ) );
            return false;
        }
    }

    // 添加
    public function editAction()
    {   
        $id = $this->request->get('id'); 
        $info = \App\Backend\Models\Product::findFirst($id);

        // 传递多个参数
        $this->view->setVars([
            'menu'    => $this->repo->cateList(),
            'api'     =>  Api::find(),
            'info'    =>  $info
        ]);

        //编辑产品
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {
            //验证信息
            $data = $this->request->getPost(); 
            $this->response->setJsonContent( $this->repo->edit( $data ) );
            return false;
        }
    }
  
    // 删除
    public function delAction(){
        //删除
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {
            //验证信息
            $id = $this->request->getPost('id'); 
           
            if( !$id ){
                $error = ['status'    =>  100,'info'      => '非法请求'];
                $this->response->setJsonContent( $error );
            }

            $this->response->setJsonContent( $this->repo->del( $id ) );
            return false;
        }
    }  

    // 开市 或者 休市更新
    public function openAction(){
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {

            $data = $this->request->getPost(); 
            $product = \App\Backend\Models\Product::findFirst($data['id']);
            $product->open = $data['state']; 
            if ($product->save() == false) {
                foreach ($product->getMessages() as $message) {
                    echo $message, "<br>";
                }
            } else {
                $this->response->setJsonContent([
                    'status'    =>  0,
                    'info'      => $data['state']==0 ? ['开市成功'] : ['休市成功']
                ]) ;  
                
            }  
            
        }
        return false;
    }    

    // 产品api列表
    public function apilistAction(){
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {

            $type = $this->request->getPost('type'); 
            $res = Api::findFirstByType($type)->toArray();
            $list = json_decode( $res['args'],true); 
            // dump( $list );
            $this->response->setJsonContent( $list );
            return false;
        }
        
    }


    /*
     * 风控管理
    */
    public function riskAction(){

    }

    /********************************产品分类**********************************************/
    //产品分类
    public function cateAction()
    {   
        $res = $this->repo->cateList();
        $this->view->setVar('list', $res); 
    }

    // 添加
    public function cateaddAction()
    {   
        //添加
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {
            //验证信息
            $data = $this->request->getPost(); 
            $this->response->setJsonContent( $this->repo->addCate( $data ) );
            return false;
        }
    }

    // 编辑
    public function cateeditAction(){
        $id = $this->request->get('id'); 
        $data = $this->repo->cateOne($id);
        $this->view->setVar('info', $data);

        //更新
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {
            //验证信息
            $data = $this->request->getPost(); 
            $this->response->setJsonContent( $this->repo->editCate( $data ) );
            return false;
        }
    }
  
    // 删除
    public function catedelAction(){
        //删除
        if ( $this->request->isPost() == true &&  $this->request->isAjax() == true ) {
            //验证信息
            $id = $this->request->getPost('id'); 
           
            if( !$id ){
                $error = ['status'    =>  100,'info'      => '非法请求'];
                $this->response->setJsonContent( $error );
            }

            $this->response->setJsonContent( $this->repo->delCate( $id ) );
            return false;
        }
    }    
    

}
