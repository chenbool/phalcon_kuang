<?php
namespace App\Backend\Repositories;
use App\Backend\Repositories\BaseRepository;
use App\Backend\Validations\AdminValidation;
use App\Backend\Models\Admin;
use Phalcon\Paginator\Adapter\Model;

class AdminRepository extends BaseRepository
{

    public function initialize(){
    }

    //获取分页列表
    public function plist(){ 
        //接受参数
        isset( $_GET['username'] ) && $name = $_GET['username'];

        //建立条件
        $condition = [];
        !empty($name) && $condition[] = "username like '%{$name}%' ";
        $condition = implode(' and ',$condition);

        //查询
        return  Admin::find([
            'conditions'=>$condition,
            'colums'=>'*'
        ]);

    }

    //添加
    public function add($data){ 
        //验证
        $error = $this->validate($data);

        if( $error['status'] == 0 ){

            $admin = new Admin();
            $admin->username    = $data['username'];
            $admin->password    = md5( $data['password'] );
            $admin->email       = $data['email'];
            $admin->phone       = $data['phone'];
            // $admin->state       = 0; 
            $admin->add_time    = time();

            if ( $admin->save() == false) {
                $error = []; 
                foreach ($admin->getMessages() as $message) {
                    $error[] = $message;
                }
                return [ 'status' =>  100,'info'  => $error ]; 
            } else {
                return [ 'status' =>  0,'info'  => ['添加成功'] ];   
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

            $admin = Admin::findFirst($data['id']);
            // $admin->username    = $data['username'];
            $admin->password    = md5( $data['password'] );
            $admin->email       = $data['email'];
            $admin->phone       = $data['phone'];
            $admin->state        = $data['state']; 

            if ($admin->save() == false) {
                $error = []; 
                foreach ($admin->getMessages() as $message) {
                    $error[] = $message;
                }
                return [ 'status' =>  100,'info'  => $error ];
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
        $res = Admin::findFirst( $id )->delete();

        if( $res == false) {
            $error = []; 
            foreach ($admin->getMessages() as $message) {
                $error[] = $message;
            }
            return [ 'status' =>  100,'info'  => $error ];
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
        $validation = new AdminValidation();
        $messages = $validation->validate($data);

        //记录错误信息
        $error = [];    
        if (count($messages)) {
            $error[] = $messages[0]->getMessage();
        }  

        if( $type == 'add' ){
            if( Admin::findFirstByUsername( $data['username'] ) ){
                $error[] = '用户名已经存在';
            }
        }
        
        if( $data['password'] != $data['c_password'] ){
            $error[] = '两次密码不一致';
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

  

}