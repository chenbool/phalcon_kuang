<?php
/**
 * 短信服务配置文件
 * 包含云通讯短信平台配置信息
 */
return [
    'yuntongxun' => [           
        'accountSid'        => '8a216da85e5b3555015e5fa966a302c4',  // 主帐号标识
        'accountToken'      =>  '6e2e1c484af34282bc66ad4e8dc31123',     // 主帐号 Token
        'appId'             =>  '8a216da85e5b3555015e5fa966e802c9',     // 应用 ID
        'templateId'        =>  '203826',    // 短信模板 ID
        'serverIP'          => "app.cloopen.com",    // 服务器地址
        'serverPort'        => '8883',       // 服务器端口
        'softVersion'       =>  '2013-12-26'  // API 版本
    ],
];
