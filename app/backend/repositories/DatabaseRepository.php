<?php
namespace App\Backend\Repositories;
use App\Backend\Repositories\BaseRepository;
use Phalcon\Config\Adapter\Php as ConfigPhp;
use App\Backend\Plugins\Medoo;

class DatabaseRepository extends BaseRepository
{
	protected $config;
	protected $db;
    public function __construct(){
    	parent::__construct();
    	$this->config  = new ConfigPhp(ROOT_PATH . "/app/config/config.php"); 
    	$database = $this->config->database;

    	$this->db = new Medoo([
		    'database_type' => $database['adapter'],
		    'database_name' => 'information_schema',
		    'server' 		=> $database['host'],
		    'username' 		=> $database['username'],
		    'password' 		=> $database['password']
		]);

    }

    public function plist(){
    	$data = $this->db->query("SELECT * FROM tables where TABLE_SCHEMA = '{$this->config->database['dbname']}' ")->fetchAll();
    	return $data;
    }


    public function back($filename=null){
    	// MySQLBackup dbname
    	$data = $this->db->query("SELECT TABLE_NAME FROM tables where TABLE_SCHEMA = '{$this->config->database['dbname']}' ")->fetchAll();
 
    	$tables = [];
    	foreach ($data as $k => $v) {
    		$tables[] = $v['TABLE_NAME'];
    	}

    	$this->db = new Medoo([
		    'database_type' => $this->config->database['adapter'],
		    'database_name' => $this->config->database['dbname'],
		    'server' 		=> $this->config->database['host'],
		    'username' 		=> $this->config->database['username'],
		    'password' 		=> $this->config->database['password']
		]);

    	$basePath = ROOT_PATH . "/app/backup/";
    	
    	if( is_null($filename) ){
    		$filename=date('Y-m-d_h_i_s').'.sql';
    	}

    	$this->backup($basePath.$filename,$tables);
    }    


	/**
	*@filename string
	*@tables array or string
	*@retuen  bool 
	*/
	public function backup($filename,$tables){
	    
	    //如果不是数组就压入数组
	    if(!is_array($tables) ){
	        $temp[]=$tables;
	        $tables=$temp;
	    }
	     //头部信息
	     $header = "-- -----------------------------\r\n";
	     $header .= "-- bool MySQL Data Transfer --\r\n";
	     $header .= "-- 日期：".date("Y-m-d H:i:s",time())." --\r\n";
	     $header .= "-- -----------------------------\r\n\r\n";
	     file_put_contents($filename,$header) || die('导出失败!');
	     

	     

	     //获取表结构
	     foreach ($tables as $v) {
	         $structure=$this->db->query('show create table '.$v)->fetchAll();

	         $desc = "-- -----------------------------------\r\n";
	         $desc .= "-- Table structure for `".$structure[0]['Table']."` --\r\n";
	         $desc .= "-- -----------------------------------\r\n";
	         $desc .= "DROP TABLE IF EXISTS `".$structure[0]['Table']."`;\r\n";
	         $desc .= $structure[0]['Create Table'].";\r\n\r\n\r\n";

	         file_put_contents($filename,$desc,FILE_APPEND) || die('导出失败!');
	     }


	     //取出所有数据
	    foreach($tables as $tableName){
	        $all=$this->db->query('select * from '.$tableName)->fetchAll();

	        //判断取出的结果是否小于1
	        if( count($all)<1 ){
	            continue;
	        } 

	        //insert头部信息
	        $insert = "\r\n\r\n-- ---------------------------------\r\n";
	        $insert .= "-- insert of `".$tableName."` --\r\n";
	        $insert .= "-- ---------------------------------\r\n";
	        file_put_contents($filename,$insert,FILE_APPEND) || die('导出失败!');
	        foreach ($all as $k => $v) {
	            $rows=" INSERT INTO `".$tableName."` VALUES (";
	            //获取键值
	            $values=array_values($v);
	            //循环值拼接sql语句
	            foreach ($values as $key => $value) {
	                $rows .="'".$value."',";
	            }
	            //去除最后一个逗号
	            $rows = substr($rows,0,strlen($sqlStr)-1);
	            $rows .= ");\r\n";
	            file_put_contents($filename,$rows,FILE_APPEND) || die('导出失败!');
	        }
	    }
	    return true;
	   
	}



	//恢复数据库
	public function source_mysql($filename){
	    include './Lib/source.php';
	    $db=New mysqli_db(C('DB_HOST'),C('DB_USER'),C('DB_PWD'),C('DB_NAME'),C('DB_CHARSET'));
	    return $db->backup($filename);
	}

	
	//打开指定目录
	/**
	 * 遍历目录函数，只读取目录中的最外层的内容
	 * @param string $path
	 * @return array
	 */
	public function readDirectory($path) {
	    $handle = opendir ( $path );
	    while ( ($item = readdir ( $handle )) !== false ) {
	        //.和..这2个特殊目录
	        if ($item != "." && $item != "..") {
	            if (is_file ( $path . "/" . $item )) {
	                $arr ['file'] [] = $item;
	            }
	            if (is_dir ( $path . "/" . $item )) {
	                $arr ['dir'] [] = $item;
	            }
	        
	        }
	    }
	    closedir ( $handle );
	    return $arr;
	}


	//下载
	public function downFile($filename){
	    header("content-disposition:attachment;filename=".basename($filename));
	    header("content-length:".filesize($filename));
	    readfile($filename);
	}




}