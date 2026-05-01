<?php
namespace App\Frontend\Repositories;

use App\Frontend\Plugins\Sms\YunTongXun;

/**
 * 短信数据仓储
 * 处理短信发送、验证码生成等业务逻辑
 */
class MsmRepository extends BaseRepository
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
     * 检查短信发送频率
     * 确保同一手机号在 60 秒内只能发送一次
     * @return array 检查结果
     */
    public function check(){

		if( $this->session->has('sms_time' ) ){
			$res = $this->session->get('sms_time',time() );
			$offset = time() - $res;
			if( $offset >60 ){
				$this->session->set('sms_time',time() );
				return [
					'status' => 0,
					'info'	 => ''
				];
			}else{
				return [
					'status' => 100,
					'info'	 => 60-$offset.'秒稍后尝试...'
				];
			} 
		}else{
			$this->session->set('sms_time',time() );
			return [
				'status' => 0,
				'info'	 => '发送成功'
			];
		}

    }

    /**
     * 生成随机验证码
     * 生成 5 位数字验证码并存储到 Session
     * @return int 生成的验证码
     */
    public function makeCode(){
    	while(($authnum=rand()%100000)<10000); 
    	$this->session->set('phone_code',$authnum );
    	return $authnum;
    	dump($authnum);
    }

    /**
     * 发送短信
     * 验证手机号并发送验证码短信
     * @param array $data 包含手机号的数据
     * @return array 发送结果
     */
	public function send($data){
		if( empty($data['phone']) ){
			return [
				'status' => 100,
				'info'	 => ['请填写手机号']
			];
			exit;
		}
		
		// 检测之前是否发送过	
		$res = $this->check();
		if( $res['status'] > 0 ){
			return $res;
		}else{
			$code = $this->makeCode();
			$this->ytx_sendsms($code, $data['phone'] );
			return $res;
		}
		
	}

	/**
	 * 云通讯短信发送
	 * 使用云通讯平台发送验证码短信
	 * @param int $code 验证码
	 * @param string $phone 手机号
	 * @return bool 发送结果
	 */
	public function ytx_sendsms($code ,$phone){

		$config = config('sms');
		// 主帐号
		$accountSid		= $config->yuntongxun->accountSid;
		// 主帐号 Token
		$accountToken	= $config->yuntongxun->accountToken;
		// 应用 Id
		$appId			=	$config->yuntongxun->appId;
		// 请求地址
		$serverIP		=	$config->yuntongxun->serverIP;
		// 请求端口 
		$serverPort		=	$config->yuntongxun->serverPort;
		// REST 版本号
		$softVersion	=	$config->yuntongxun->softVersion;

		// 实例化
		$rest = new YunTongXun($serverIP,$serverPort,$softVersion);

		$rest->setAccount($accountSid,$accountToken);
		$rest->setAppId($appId);

		// 模板 id		
		$templateId = $config->yuntongxun->templateId;

		// 发送短信
		$result = $rest->sendTemplateSMS($phone,array($code,10),$templateId);
		
		// 判断是否发送成功
		if($result == NULL ) {
			die('result error!');
		}
		return true;

	 }


	/**
	 * 短信宝短信发送（备用）
	 * @deprecated 已弃用，使用云通讯替代
	 */
	 // public function sendsms($uid = 0, $code ,$phone)
	 // {



}
