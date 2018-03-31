<?php
namespace App\Frontend\Repositories;
use App\Frontend\Models\Product;

class IndexRepository extends BaseRepository
{

    public function initialize(){
    }

    //获取列表
    public function index(){ 
        //查询
        return Product::find([
            'conditions'=>'',
            'colums'=>'id,name,api,pcode'
        ]);
        // $robot = Product::findFirst(2);
        // dump( $robot->ProductCate->name );
    }

}