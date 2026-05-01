<?php
namespace App\Frontend\Repositories;

use App\Frontend\Models\User;
use App\Library\Encrypt;

/**
 * 用户数据仓储
 * 处理用户相关的数据查询业务
 */
class UserRepository extends BaseRepository
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
     * 获取用户信息
     * 根据当前会话中的用户 ID 获取用户详细信息
     * @return User 用户信息
     */
    public function getInfo(){
    	$res = User::findFirstById( $this->session->get('user_id') );
    	$res->phone = Encrypt::decode( $res->phone );
    	$res->username = Encrypt::decode( $res->username );
    	return $res;
    }

}
