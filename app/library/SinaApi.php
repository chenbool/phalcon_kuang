<?php
namespace App\Backend\Plugins;

/**
 * 新浪金融 API 客户端
 * 用于获取实时金融行情数据
 * @author bool
 * @qq 30024167
 */
class SinaApi
{
    /**
     * API 请求基础 URL
     * @var string
     */
    protected $url = 'http://hq.sinajs.cn/rn=';
    
    /**
     * CURL 客户端实例
     * @var Curl
     */
    protected $curl;
    
    /**
     * 构造函数
     * 初始化 CURL 客户端并设置带时间戳的 API URL
     */
    function __construct(){
        $this->url .= time().'list=';
        $this->curl = Curl::init();
    }

    /**
     * 获取金融行情数据
     * 根据货币代码获取实时汇率等金融数据
     * @param string $code 货币或金融产品代码，如 fx_scnyaud
     * @return mixed API 返回的数据
     */
    public function get($code){
        return $curl->url(  $this->curl.$code );
    }

}
