<?php
/**
 * 云通讯 REST API 客户端类
 *
 * 提供短信发送、语音验证、电话呼叫等功能
 * 文档: http://www.yuntongxun.com
 */

namespace App\Library;

class REST {
    private $AccountSid;
    private $AccountToken;
    private $AppId;
    private $SubAccountSid;
    private $SubAccountToken;
    private $ServerIP;
    private $ServerPort;
    private $SoftVersion;
    private $Batch;
    private $BodyType = "xml";
    private $enabeLog = true;
    private $Filename = "./log/sms_log.log";
    private $Handle;

    /**
     * 构造函数
     * @param string $ServerIP 服务器地址
     * @param string $ServerPort 服务器端口
     * @param string $SoftVersion API 版本
     */
    function __construct($ServerIP,$ServerPort,$SoftVersion)
    {
        $this->Batch = date("YmdHis");
        $this->ServerIP = $ServerIP;
        $this->ServerPort = $ServerPort;
        $this->SoftVersion = $SoftVersion;
        $this->Handle = fopen($this->Filename, 'a');
    }

    /**
     * 设置主帐号
     * @param string $AccountSid 主帐号
     * @param string $AccountToken 主帐号Token
     */
    function setAccount($AccountSid,$AccountToken){
      $this->AccountSid = $AccountSid;
      $this->AccountToken = $AccountToken;
    }

    /**
     * 设置子帐号
     * @param string $SubAccountSid 子帐号
     * @param string $SubAccountToken 子帐号Token
     */
    function setSubAccount($SubAccountSid,$SubAccountToken){
      $this->SubAccountSid = $SubAccountSid;
      $this->SubAccountToken = $SubAccountToken;
    }

    /**
     * 设置应用ID
     * @param string $AppId 应用ID
     */
    function setAppId($AppId){
       $this->AppId = $AppId;
    }

    /**
     * 打印日志
     * @param string $log 日志内容
     */
    function showlog($log){
      if($this->enabeLog){
         fwrite($this->Handle,$log."\n");
      }
    }

    /**
     * 发起 HTTPS POST 请求
     * @param string $url 请求地址
     * @param string $data 请求数据
     * @param array $header 请求头
     * @param int $post 是否 POST 请求
     * @return mixed
     */
     function curl_post($url,$data,$header,$post=1)
     {
       $ch = curl_init();
       $res= curl_setopt ($ch, CURLOPT_URL,$url);
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
       curl_setopt($ch, CURLOPT_HEADER, 0);
       curl_setopt($ch, CURLOPT_POST, $post);
       if($post)
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
       curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
       $result = curl_exec ($ch);
       if($result == FALSE){
