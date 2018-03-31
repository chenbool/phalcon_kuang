<?php
namespace App\Frontend\Repositories;
use App\Frontend\Models\User;
use App\Frontend\Validations\LoginValidation;
use App\Library\Encrypt;

class LoginRepository extends BaseRepository
{

    public $session;
    function __construct($session){
        parent::__construct();
        $this->session = $session;
    }    

    //注册
    public function register($data){ 

        //检测验证码
        if( $this->session->has('phone_code') ){
           if( $this->session->get('phone_code') !=  $data['code'] ){
                return [ 
                    'status'    =>  100,
                    'info'      => ['验证码不对'] 
                ];
           }
           exit();   
        }
                

        $error = $this->validate($data);

        if( $error['status'] == 0 ){
            $user = new User();
            $user->username  = Encrypt::encode( $data['phone'] );
            $user->password  = md5( $data['password'] );
            $user->phone     = Encrypt::encode( $data['phone'] );
            // $user->email     = Encrypt::encode( $data['email'] );
            $user->integral  = 0;
            $user->money     = 0;
            $user->exp       = 0;
            $user->amount    = 0;
            $user->type      = '代理商'; 
            $user->status    = 0; 
            $user->add_time  = time();

            if ($user->save() == false) {
                foreach ($user->getMessages() as $message) {
                    echo $message, "<br>";
                }
            } else {
                //清空Session
                $this->session->remove("phone_code");
                return [
                    'status'    =>  0,
                    'info'      => ['注册成功']
                ];   
            }   
        }else{
            return $error;
        }
       

    }    

    //登录
    public function login($data){ 
    
        if( empty($data['phone']) || empty($data['password']) ){
            return ['status'    =>  100,'info'      => ['手机号或者密码不能为空'] ];   
            exit;
        }

        //查找用户
        $res = User::findFirstByPhone( Encrypt::encode($data['phone']) );
        if( $res ){
            //检测密码
            if( $res->password == md5($data['password']) ){
                //登录成功
                // dump( $res->password );
                $this->session->set('user_id',$res->id);
                $this->session->set('user_name',$res->username);
                $this->session->set('user_phone',$res->phone);
                 return ['status'    =>  0,'info'      => ['登录成功'] ];   
            }else{
                return ['status'    =>  100,'info'      => ['手机号或者密码错误'] ];   
            }
        }else{
            return ['status'    =>  100,'info'      => ['手机号或者密码错误'] ];   
        }  

    }  

    //注销
    public function quit(){
        $this->session->remove('user_id');
        $this->session->remove('user_name');
        $this->session->remove('user_phone');
        return true;
    }


    // *****************验证器調用********************************************
    public function validate($data,$type = 'add'){
        //验证
        $validation = new LoginValidation();
        $messages = $validation->validate($data);
        
        //记录错误信息
        $error = [];    
        if (count($messages)) {
            $error[] = $messages[0]->getMessage();
        }  

        if( $type == 'add' ){
            if( User::findFirstByPhone( Encrypt::encode($data['phone'])  ) ){
                $error[] = '用户已经存在';
            }

            if( User::findFirstByUsername( Encrypt::encode($data['phone'])  ) ){
                $error[] = '用户已经存在';
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