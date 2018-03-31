<?php
namespace App\Backend\Plugins;

/*
*   新浪api
*   http://hq.sinajs.cn/rn=1506873036list=fx_scnyaud
*   aurhor:bool
*   qq: 30024167
*/
class SinaApi
{
    protected $url = 'http://hq.sinajs.cn/rn=';
    protected $curl;
    function __construct(){
        $this->url .= time().'list=';
        $this->curl = Curl::init();
    }

    public function get($code){
        return $curl->url(  $this->curl.$code );
    }

}