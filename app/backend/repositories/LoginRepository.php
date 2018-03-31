<?php
namespace App\Backend\Repositories;
use App\Backend\Repositories\BaseRepository;
use App\Backend\Validations\LoginValidation;
use App\Backend\Models\Admin;

class LoginRepository extends BaseRepository
{

    public function initialize(){
    }

    //登录验证
    public function login($data,$seesions){ 
        //验证
        $validation = new LoginValidation();
        $messages = $validation->validate($data);
        
        //记录错误信息
        $error = [];    
        if (count($messages)) {
            $error[] = $messages[0]->getMessage(); 
        }  

        //检测验证码
        // $code = $seesions->get("check_code" );
        // if( $code != $data['code'] ){
        //     $error[] = '验证码不正确:';
        // }        

        //根据username 查找
        $admin = Admin::findFirstByUsername( $data['username'] );
        if( is_null($admin) ){
            $error[] = '用户名不存在';
        }
        $password=$admin->password;
        if( $password != md5($data['password'])  ){
            $error[] = '密码错误';
        }

        //返回
        if( count( $error ) ){
            return [
                'status'    =>  100,
                'info'      => $error
            ];
        }else{
            $seesions->set('admin_id',$admin->id);
            $seesions->set('admin_name',$admin->username);

            $admin->ip = $_SERVER["REMOTE_ADDR"];
            $admin->last_time = time();
            $admin->login_num += 1;
            $admin->save();

            return [
                'status'    =>  0,
                'info'      => ['登录成功']
            ];            
        }

    }




}