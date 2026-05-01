<?php
namespace App\Frontend\Repositories;

use App\Frontend\Models\User;
use App\Frontend\Validations\LoginValidation;
use App\Library\Encrypt;

/**
 * 登录数据仓储
 * 处理用户注册、登录、注销等业务逻辑
 */
class LoginRepository extends BaseRepository
{
    /**
     * Session 对象
     * @var mixed
     */
    public $session;
    
    /**
     * 构造函数
     * @param mixed $session Session 实例
     */
    function __construct($session){
        parent::__construct();
        $this->session = $session;
    }    

    /**
     * 用户注册
     * 验证验证码并创建新用户
     * @param array $data 用户注册数据
     * @return array 注册结果
     */
    public function register($data){ 

        // 检测验证码
        if( $this->session->has('phone_code') ){
           if( $this->session->get('phone_code') !=  $data['code'] ){
                return [ 
                    'status'    =>  100,
                    'info'      => ['验证码不对']
                ];
           }
           exit();   
        }
                
        // 验证数据
        $error = $this->validate($data);

        if( $error['status'] == 0 ){
            // 创建新用户
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
                // 清空 Session
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

    /**
     * 用户登录
     * 验证用户凭据并创建会话
     * @param array $data 登录数据
     * @return array 登录结果
     */
    public function login($data){ 
    
        if( empty($data['phone']) || empty($data['password']) ){
            return ['status'    =>  100,'info'      => ['手机号或者密码不能为空'] ];   
            exit;
        }

        // 查找用户
        $res = User::findFirstByPhone( Encrypt::encode($data['phone']) );
        if( $res ){
            // 检测密码
            if( $res->password == md5($data['password']) ){
                // 登录成功，设置 Session
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

    /**
     * 用户注销
     * 清除用户会话
     * @return bool 成功返回 true
     */
    public function quit(){
        $this->session->remove('user_id');
        $this->session->remove('user_name');
        $this->session->remove('user_phone');
        return true;
    }
}
