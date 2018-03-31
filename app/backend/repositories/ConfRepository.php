<?php
namespace App\Backend\Repositories;
use App\Backend\Repositories\BaseRepository;
use App\Backend\Models\Conf;

class ConfRepository extends BaseRepository
{

    public function initialize(){
    }

    public function getRes(){
    	return Conf::findFirst(1);
    }

    public function save($data){
		$conf = Conf::findFirst(1);
		
		$conf->title = $data['title'];
		$conf->keyword = $data['keyword'];
		$conf->desc = $data['desc'];
		$conf->icp = $data['icp'];
		$conf->copy = $data['copy'];
		$conf->html = $data['html'];

        if ($conf->save() == false) {
            $error = []; 
            foreach ($conf->getMessages() as $message) {
                $error[] = $message;
            }
            return [ 'status' =>  100,'info'  => $error ];
        } else {
            return [
                'status'    =>  0,
                'info'      => ['修改成功']
            ];   
        }  
    }

}