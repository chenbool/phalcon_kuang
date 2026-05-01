<?php
namespace App\Library;

/**
 * 简单对称加密算法类
 * 提供字符串的加密和解密功能
 * @author Anyon Zou <zoujingli@qq.com>
 * @date 2013-08-13 19:30
 * @update 2014-10-10 10:10
 */
class Encrypt
{
    /**
     * 加密密钥
     * @var string
     */
    public $skey = 'bool';

    /**
     * 简单对称加密算法 - 加密
     * @param string $string 需要加密的字符串
     * @param string $skey 加密密钥
     * @return string 加密后的字符串
     */
    public static function encode($string = '', $skey = 'wenzi') {
        $strArr = str_split(base64_encode($string));
        $strCount = count($strArr);
        foreach (str_split($skey) as $key => $value)
            $key < $strCount && $strArr[$key].=$value;
        return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
    }

    /**
     * 简单对称加密算法 - 解密
     * @param string $string 需要解密的字符串
     * @param string $skey 解密密钥
     * @return string 解密后的原始字符串
     */
    public static function decode($string = '', $skey = 'wenzi') {
        $strArr = str_split(str_replace(array('O0O0O', 'o000o', 'oo00o'), array('=', '+', '/'), $string), 2);
        $strCount = count($strArr);
        foreach (str_split($skey) as $key => $value)
            $key <= $strCount && $strArr[$key][1] === $value && $strArr[$key] = $strArr[$key][0];
        return base64_decode(join('', $strArr));
    }
}
