<?php
namespace App\Backend\Repositories;
use App\Backend\Repositories\BaseRepository;
use App\Backend\Validations\ProductCateAddValidation as CateAdd;
use App\Backend\Validations\ProductAddValidation;
use App\Backend\Models\ProductCate;
use App\Backend\Models\Product;
use Phalcon\Paginator\Adapter\Model;

class ProductRepository extends BaseRepository
{

    public function initialize(){
    }

    //获取分页列表
    public function plist($currentPage){ 

        //接受参数
        isset( $_GET['name'] ) && $name = $_GET['name'];
        isset( $_GET['pid'] ) && $pid = $_GET['pid'];
        isset( $_GET['api'] ) && $api = $_GET['api'];

        //建立条件
        $condition = [];
        !empty($name) && $condition[] = "name like '%{$name}%' ";
        ($pid > 0 ) && $condition[] = "pid = {$pid}";
        !empty($api) && $condition[] = "api = '{$api}' ";
        $condition = implode(' and ',$condition);

        //查询
        $res = Product::find([
            'conditions'=>$condition,
            'colums'=>'*'
        ]);
        $paginator = new Model([
            "data" => $res,
            "limit"=> 10,
            "page" => $currentPage
        ]);
    
        return  $paginator->getPaginate();  
        // $robot = Product::findFirst(2);
        // dump( $robot->ProductCate->name );
    }

    //添加
    public function add($data){ 
        //验证
        $error = $this->validate($data);

        if( $error['status'] == 0 ){

            $product = new Product();
            $product->name         = $data['name'];
            $product->pid          = $data['pid'];
            $product->pcode        = $data['pcode'];
            $product->api          = $data['api'];
            $product->time_rule    = $data['time_rule'];
            $product->game_rule    = $data['game_rule'];
            $product->rand         = $data['rand'];
            $product->income       = $data['income'];
            $product->day_time     = $data['day_time'];
            $product->week_time    = $data['week_time'];
            $product->desc         = $data['desc']; 
            $product->state        = $data['state']; 
            $product->add_time     = time();

            if ($product->save() == false) {
                foreach ($product->getMessages() as $message) {
                    echo $message, "<br>";
                }
            } else {
                return [
                    'status'    =>  0,
                    'info'      => ['添加成功']
                ];   
            }             
        }else{
            return $error;
        }
    }

    //编辑产品
    public function edit($data){ 
        //验证
        $error = $this->validate($data,'');

        if( $error['status'] == 0 ){

            $product = Product::findFirst($data['id']);
            $product->name         = $data['name'];
            $product->pid          = $data['pid'];
            $product->pcode        = $data['pcode'];
            $product->api          = $data['api'];
            $product->time_rule    = $data['time_rule'];
            $product->game_rule    = $data['game_rule'];
            $product->rand         = $data['rand'];
            $product->income       = $data['income'];
            $product->day_time     = $data['day_time'];
            $product->week_time    = $data['week_time'];
            $product->desc         = $data['desc']; 
            $product->state        = $data['state']; 

            if ($product->save() == false) {
                foreach ($product->getMessages() as $message) {
                    echo $message, "<br>";
                }
            } else {
                return [
                    'status'    =>  0,
                    'info'      => ['修改成功']
                ];   
            }             
        }else{
            return $error;
        }
    }


    //删除数据
    public function del( $id ){
        // dump($id);
        $res = Product::findFirst( $id )->delete();

        if( $res == false) {
            foreach ($res->getMessages() as $message) {
                echo $message, "<br>";
            }
        } else {
            return [
                'status'    =>  0,
                'info'      => ['删除成功']
            ];   
        }         
    }

    //验证器調用
    public function validate($data,$type = 'add'){
        //验证
        $validation = new ProductAddValidation();
        $messages = $validation->validate($data);
        
        //记录错误信息
        $error = [];    
        if (count($messages)) {
            $error[] = $messages[0]->getMessage();
        }  

        if( $type == 'add' ){
            if( Product::findFirstByName( $data['name'] ) ){
                $error[] = '名称已经存在';
            }
        }

        //返回
        if( count( $error ) ){
            return [
                'status'    =>  100,
                'info'      => $error
            ];
        }else{
            return [
                'status'    =>  0,
                'info'      => ['添加成功']
            ];                     
        } 

    }

    /******************************产品分类 curd ************************************/
    //获取分类
    public function cateList($data){ 
        return ProductCate::find();
    }
    
    //id获取分类
    public function cateOne($id){ 
        return ProductCate::findFirst($id);
    }

    //分类验证器調用
    public function cateValidate($data,$type = 'add'){
        //验证
        $validation = new CateAdd();
        $messages = $validation->validate($data);
        
        //记录错误信息
        $error = [];    
        if (count($messages)) {
            $error[] = $messages[0]->getMessage();
        }  

        if( $type == 'add' ){
            if( ProductCate::findFirstByName( $data['name'] ) ){
                $error[] = '名称已经存在';
            }
        }

        //返回
        if( count( $error ) ){
            return [
                'status'    =>  100,
                'info'      => $error
            ];
        }else{
            return [
                'status'    =>  0,
                'info'      => ['添加成功']
            ];                     
        } 

    }

    //添加分类
    public function addCate($data){ 
        //验证
        $error = $this->cateValidate($data);

        if( $error['status'] == 0 ){
            $cate = new ProductCate();
            $cate->name = $data['name'];
            $cate->desc = $data['desc']; 
            $cate->order = $data['order']; 
            $cate->state = $data['state']; 
            $cate->add_time = time();

            if ($cate->save() == false) {
                foreach ($cate->getMessages() as $message) {
                    echo $message, "<br>";
                }
            } else {
                return [
                    'status'    =>  0,
                    'info'      => ['添加成功']
                ];   
            }             
        }else{
            return $error;
        }

    }

    //编辑分类
    public function editCate($data){ 
        //验证
        $error = $this->cateValidate($data,'update');

        if( $error['status'] == 0 ){
            $cate = ProductCate::findFirst($data['id']);
            $cate->name = $data['name'];
            $cate->desc = $data['desc']; 
            $cate->order = $data['order']; 
            $cate->state = $data['state']; 

            if ($cate->save() == false) {
                foreach ($cate->getMessages() as $message) {
                    echo $message, "<br>";
                }
            } else {
                return [
                    'status'    =>  0,
                    'info'      => ['修改成功']
                ];   
            }             
        }else{
            return $error;
        }

    }    

    //删除数据
    public function delCate( $id ){
        // dump($id);
        $res = ProductCate::findFirst( $id )->delete();

        if( $res == false) {
            foreach ($res->getMessages() as $message) {
                echo $message, "<br>";
            }
        } else {
            return [
                'status'    =>  0,
                'info'      => ['删除成功']
            ];   
        }         
    }

}