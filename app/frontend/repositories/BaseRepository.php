<?php
namespace App\Frontend\Repositories;

use \Phalcon\Di,
    \Phalcon\DiInterface,
    \Marser\App\Frontend\Models\ModelFactory;

/**
 * 前台数据仓储基类
 * 提供数据仓储的通用功能
 */
class BaseRepository {

    /**
     * DI 容器
     * @var \Phalcon\Di
     */
    private $_di;

    /**
     * 构造函数
     * @param DiInterface|null $di DI 容器实例
     */
    public function __construct(DiInterface $di = null){
        $this -> setDI($di);
    }

    /**
     * 设置 DI 容器
     * @param DiInterface|null $di DI 容器实例
     */
    public function setDI(DiInterface $di = null){
        empty($di) && $di = Di::getDefault();
        $this -> _di = $di;
    }

    /**
     * 获取 DI 容器
     * @return Di DI 容器实例
     */
    public function getDI(){
        return $this -> _di;
    }

    /**
     * 获取模型对象
     * 通过模型工厂获取对应的模型实例
     * @param string $modelName 模型名称
     * @return mixed 模型实例
     * @throws \Exception
     */
    protected function get_model($modelName){
        return ModelFactory::get_model($modelName);
    }
}
