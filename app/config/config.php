<?php 
/**
 * 应用主配置文件
 * 包含数据库连接、应用基础 URL、主题配置等
 */
 return array (
  'database' => 
  array (
    'adapter' => 'Mysql',      // 数据库适配器
    'host' => 'localhost',     // 数据库主机地址
    'username' => 'root',       // 数据库用户名
    'password' => 'root',       // 数据库密码
    'dbname' => 'gec',         // 数据库名称
    'charset' => 'utf8',        // 数据库字符集
  ),
  'baseUri' => 'http://localhost',  // 应用基础 URL
  'theme' => 'default',              // 前端主题名称
);
