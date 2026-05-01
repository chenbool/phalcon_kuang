<?php
namespace App\Frontend\Repositories;

use App\Frontend\Models\Product;

/**
 * 首页数据仓储
 * 处理首页相关的数据查询业务
 */
class IndexRepository extends BaseRepository
{
    /**
     * 初始化方法
     */
    public function initialize(){
    }

    /**
     * 获取首页产品列表
     * 查询所有产品基本信息
     * @return Product[] 产品列表
     */
    public function index(){ 
        // 查询产品列表，返回 ID、名称、API、代码
        return Product::find([
            'conditions'=>'',
            'colums'=>'id,name,api,pcode'
        ]);
        // $robot = Product::findFirst(2);
        // dump( $robot->ProductCate->name );
    }

}
