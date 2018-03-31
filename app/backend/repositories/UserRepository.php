<?php
namespace App\Backend\Repositories;
use App\Backend\Repositories\BaseRepository;
use Phalcon\Paginator\Adapter\Model;
use App\Backend\Models\User;

class UserRepository extends BaseRepository
{
    public function initialize()
    {   
        parent::initialize();
    }

    public function list($currentPage){
        //接受参数
        isset( $_GET['username'] ) && $username = $_GET['username'];
        // isset( $_GET['pid'] ) && $pid = $_GET['pid'];
        // isset( $_GET['api'] ) && $api = $_GET['api'];

        //建立条件
        $condition = [];
        !empty($name) && $condition[] = "username like '%{$username}%' ";
        // ($pid > 0 ) && $condition[] = "pid = {$pid}";
        // !empty($api) && $condition[] = "api = '{$api}' ";
        $condition = implode(' and ',$condition);

        

        //查询
        $res = User::find([
            'conditions'=>$condition,
            'colums'=>'*'
        ]);  

        $paginator = new Model([
            "data" => $res,
            "limit"=> 10,
            "page" => $currentPage
        ]);
    
        return  $paginator->getPaginate();  
    }
    
    
}