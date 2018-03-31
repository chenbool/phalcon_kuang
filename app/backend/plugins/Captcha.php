<?php
namespace App\Backend\Plugins;

// 验证码
class Captcha
{

  public $codes = '';
  function __construct()
  {
    // $code = '0-1-2-3-4-5-6-7-8-9-A-B-C-D-E-F-G-H-I-J-K-L-M-N-O-P-Q-R-S-T-U-V-W-X-Y-Z';
    $code = '0-1-2-3-4-5-6-7-8-9';
    $codeArray = explode('-',$code);
    shuffle($codeArray);
    $this->codes = implode('',array_slice($codeArray,0,4));
  }

  public function CreateImg()
  {
    Header("Content-type: image/gif");
    session_start();
    $_SESSION['check_pic'] = $this->codes;

    $img = imagecreate(70,25);
    imagecolorallocate($img,222,222,222);
    $testcolor1 = imagecolorallocate($img,255,0,0);
    $testcolor2 = imagecolorallocate($img,51,51,51);
    $testcolor3 = imagecolorallocate($img,0,0,255);
    $testcolor4 = imagecolorallocate($img,255,0,255);
    for ($i = 0; $i < 4; $i++)
    {
      imagestring($img,rand(5,6),8 + $i * 15,rand(2,8),$this->codes[$i],rand(1,4));
    }
    imagegif($img);
  }

}

// $code = new Captcha();
// $code->CreateImg();
// $code = NULL;
// $_SESSION['check_pic']
