<?php
namespace App\Frontend\Repositories;
use App\Frontend\Models\User;
use App\Library\Encrypt;

class UserRepository extends BaseRepository
{
    public $session;
    function __construct($session){
        parent::__construct();
        $this->session = $session;
    }       
   
   	//获取用户信息
    public function getInfo(){
    	$res = User::findFirstById( $this->session->get('user_id') );
    	$res->phone = Encrypt::decode( $res->phone );
    	$res->username = Encrypt::decode( $res->username );
    	return $res;
    }

}