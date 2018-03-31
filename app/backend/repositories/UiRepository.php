<?php
namespace App\Backend\Repositories;
use App\Backend\Repositories\BaseRepository;
use Phalcon\Config\Adapter\Php as ConfigPhp;

class UiRepository extends BaseRepository
{
    public function initialize()
    {   
        parent::initialize();
    }
    
    public function readDirectory(){
        $config  = new ConfigPhp(ROOT_PATH . '/app/config/config.php'); 
        // dd( $config['theme'] );
        
        $repo = new DatabaseRepository();
        $res = $repo->readDirectory(ROOT_PATH . '/app/frontend/views');
        $temp = [];
        foreach( $res['dir'] as $k =>$v ){
            $temp[$k]['checked'] = $config['theme'] == $v ? 1 : 0;
            $temp[$k]['dirName'] = $v;
            $json = file_get_contents(ROOT_PATH . '/app/frontend/views/'.$v.'/config.json');
            $temp[$k]['body'] = json_decode( $json,true );
        }
        return $temp;
    }
    
    public function install($name)
    {  
        $config  = new ConfigPhp(ROOT_PATH . '/app/config/config.php'); 
        $config['theme'] = $name;
        $config = (array)$config;
        $config['database'] = (array)$config['database'];

        //写出php配置
        if( $this->write_config($config,ROOT_PATH . '/app/config/config.php')  ) {
            return ['status'    =>  0,'info'      => ['设置成功'] ];  
        } else {
            return ['status'    =>  100,'info'      => ['设置失败'] ];   
        }        
        
    }  


    //写出php配置
    public function write_config($data,$path){
        return file_put_contents($path,"<?php \n return ".var_export($data,true).';' );
    }

}