<?php
namespace App\Frontend\Repositories;
use App\Frontend\Plugins\Sms\YunTongXun;

class MsmRepository extends BaseRepository
{
	public $session;
    function __construct($session){
    	parent::__construct();
    	$this->session = $session;
    }

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

    //制作验证码
    public function makeCode(){
    	while(($authnum=rand()%100000)<10000); 
    	$this->session->set('phone_code',$authnum );
    	return $authnum;
    	dump($authnum);
    }

    //发送
	public function send($data){
		if( empty($data['phone']) ){
			return [
				'status' => 100,
				'info'	 => ['请填写手机号']
			];
			exit;
		}
		
		//检测之前是否发送过	
		$res = $this->check();
		if( $res['status'] > 0 ){
			return $res;
		}else{
			$code = $this->makeCode();
			$this->ytx_sendsms($code, $data['phone'] );
			return $res;
		}
		
	}

	 /*
	 *云通讯 http://www.yuntongxun.com/
	 */
	public function ytx_sendsms($code ,$phone){

		$config = config('sms');
		//主帐号
		$accountSid		= $config->yuntongxun->accountSid;
		//主帐号Token
		$accountToken	= $config->yuntongxun->accountToken;
		//应用Id
		$appId			=	$config->yuntongxun->appId;
		//请求地址，格式如下，不需要写https://
		$serverIP		=	$config->yuntongxun->serverIP;
		//请求端口 
		$serverPort		=	$config->yuntongxun->serverPort;
		//REST版本号
		$softVersion	=	$config->yuntongxun->softVersion;

		// dd( new YunTongXun($serverIP,$serverPort,$softVersion) );

		//实例化
		$rest = new YunTongXun($serverIP,$serverPort,$softVersion);

		$rest->setAccount($accountSid,$accountToken);
		$rest->setAppId($appId);

		//模板id		
		$templateId = $config->yuntongxun->templateId;

		//发送短信
		$result = $rest->sendTemplateSMS($phone,array($code,10),$templateId);
		
		// dump( $result );

		// object(SimpleXMLElement)#51 (2) {
		//   ["statusCode"]=>
		//   string(6) "000000"
		//   ["TemplateSMS"]=>
		//   object(SimpleXMLElement)#52 (2) {
		//     ["smsMessageSid"]=>
		//     string(32) "7dfba89207ff49a2b0bd250854211e16"
		//     ["dateCreated"]=>
		//     string(14) "20171201012352"
		//   }
		// }

		//判断是否发送成功
		if($result == NULL ) {
			die('result error!');
		}
		return true;

		// if($result->statusCode != 0) {
		// 	echo "error code :" . $result->statusCode . "<br>";
		// 	echo "error msg :" . $result->statusMsg . "<br>";
		// 	return false;
		// }else{
		// 	// echo "Sendind TemplateSMS success!<br/>";
		// 	$smsmessage = $result->TemplateSMS;
		// 	return true;
		// }


	 }


	/**
	 * 短信宝 http://www.smsbao.com/
	 */
	 // public function sendsms($uid = 0, $code ,$phone)
	 // {
		//  $conf = getconf('');
 
		//  if(!$code){
		// 	 return false;
		//  }
 
		//  if(!$phone){
		// 	 return false;
		//  }
 
		//  $content = '您的验证码为'.$code.'，在10分钟内有效。';
		 
		//  $smsapi = "http://api.smsbao.com/"; //短信网关
		//  $user = $conf['msm_appkey']; //短信平台帐号
		//  $pass = md5($conf['msm_secretkey']); //短信平台密码
		//  $content="【".$conf['msm_SignName']."】".$content;//要发送的短信内容
		//  $phone = $phone;
		//  $sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
		 
		//  $result =file_get_contents($sendurl) ;
		//  if($result != 0){
		// 	 return false;
		//  }else{
		// 	 return true;
		//  }
 
	 // }


	//叮咚云  http://dingdongcloud.com/
	// public function sendsms($uid = 0, $code ,$phone){
	// 	$conf = getconf('');


	// 	$url="https://api.dingdongcloud.com/v1/sms/sendyzm";
 //        $data = "apikey=%s&mobile=%s&content=%s";
 //        $content = "【".$conf['msm_SignName']."】你的验证码是".$code."，请在10分钟内输入。";
 //        $content = urlencode($content);
 //        $apikey = $conf['msm_appkey'];
 //        $mobile = $phone; 
        
 //        $rdata = sprintf($data, $apikey, $mobile, $content);
 //        $url = $url.'?'.$rdata;
       	
 //       	$api = controller('Api');
 //       	$result = $api->curlfun($url);
 //       	$arr = json_decode($result,1);
 //        if($arr['code'] == 1){
 //        	return true;
 //        }else{
 //        	return false;
 //        }
        
	// }




}