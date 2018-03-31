<?php

function dump($arg){
    echo '<div style="border:1px solid #ccc;background:#FAFAFA;padding:5px 15px;z-index:1000;margin:5px;"> <pre>';
    var_dump($arg);
    echo '</pre></div> ';
    return false;
}

function dd($arg){
    echo '<div style="border:1px solid #ccc;background:#FAFAFA;padding:5px 15px;z-index:1000;margin:5px;"> <pre>';
    var_dump($arg);
    die('</pre></div>');
    return false;
}


function getHost(){
    return 'http://'.$_SERVER['HTTP_HOST'];
}


//获取硬盘状态
function disk($type='linux'){
    
        if( $type == 'linux' ){
            // $df 包含根目录下可用的字节数
            $free 	= disk_free_space("/");
            $total 	= disk_total_space("/");		
        }else{
            //在 Windows 下:
            $free 	= disk_free_space("C:");
            $total 	= disk_total_space("C:");		
        }
    
        dump( $free );

        $free /= 1024*1024*1024;
        $total /= 1024*1024*1024;
    
        $free = sprintf("%.1f",$free);
        $total = sprintf("%.1f",$total);
        $scale = $total/100;
        $progress = round( $free/$scale ,1);
    
        return [
            'free'	=>	$free,
            'total'	=>	$total,
            'progress' => $progress,
        ];
    }
    
    //linux系统探测
    
    function sys_linux(){
    
        // CPU
        if (false === ($str = @file("/proc/cpuinfo"))) return false;
    
        $str = implode("", $str);
    
        @preg_match_all("/model\s+name\s{0,}\:+\s{0,}([\w\s\)\(\@.-]+)([\r\n]+)/s", $str, $model);
    
        @preg_match_all("/cpu\s+MHz\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/", $str, $mhz);
    
        @preg_match_all("/cache\s+size\s{0,}\:+\s{0,}([\d\.]+\s{0,}[A-Z]+[\r\n]+)/", $str, $cache);
    
        @preg_match_all("/bogomips\s{0,}\:+\s{0,}([\d\.]+)[\r\n]+/", $str, $bogomips);
    
        if (false !== is_array($model[1]))
    
        {
    
            $res['cpu']['num'] = sizeof($model[1]);
            
            if($res['cpu']['num']==1)
                $x1 = '';
            else
                $x1 = ' ×'.$res['cpu']['num'];
            $mhz[1][0] = ' | 频率:'.$mhz[1][0];
            $cache[1][0] = ' | 二级缓存:'.$cache[1][0];
            $bogomips[1][0] = ' | Bogomips:'.$bogomips[1][0];
            $res['cpu']['name'] = $model[1][0];
            $res['cpu']['model'][] = $model[1][0].$mhz[1][0].$cache[1][0].$bogomips[1][0].$x1;
    
            if (false !== is_array($res['cpu']['model'])) $res['cpu']['model'] = implode("<br />", $res['cpu']['model']);
    
            if (false !== is_array($res['cpu']['mhz'])) $res['cpu']['mhz'] = implode("<br />", $res['cpu']['mhz']);
    
            if (false !== is_array($res['cpu']['cache'])) $res['cpu']['cache'] = implode("<br />", $res['cpu']['cache']);
    
            if (false !== is_array($res['cpu']['bogomips'])) $res['cpu']['bogomips'] = implode("<br />", $res['cpu']['bogomips']);
    
        }
    
    
        // NETWORK
    
        // UPTIME
    
        if (false === ($str = @file("/proc/uptime"))) return false;
    
        $str = explode(" ", implode("", $str));
    
        $str = trim($str[0]);
    
        $min = $str / 60;
    
        $hours = $min / 60;
    
        $days = floor($hours / 24);
    
        $hours = floor($hours - ($days * 24));
    
        $min = floor($min - ($days * 60 * 24) - ($hours * 60));
    
        if ($days !== 0) $res['uptime'] = $days."天";
    
        if ($hours !== 0) $res['uptime'] .= $hours."小时";
    
        $res['uptime'] .= $min."分钟";
    
    
        // MEMORY
    
        if (false === ($str = @file("/proc/meminfo"))) return false;
    
        $str = implode("", $str);
    
        preg_match_all("/MemTotal\s{0,}\:+\s{0,}([\d\.]+).+?MemFree\s{0,}\:+\s{0,}([\d\.]+).+?Cached\s{0,}\:+\s{0,}([\d\.]+).+?SwapTotal\s{0,}\:+\s{0,}([\d\.]+).+?SwapFree\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buf);
        preg_match_all("/Buffers\s{0,}\:+\s{0,}([\d\.]+)/s", $str, $buffers);
    
    
        $res['memTotal'] = round($buf[1][0]/1024/1024, 2);
    
        $res['memFree'] = round($buf[2][0]/1024/1024, 2);
    
        $res['memBuffers'] = round($buffers[1][0]/1024/1024, 2);
        $res['memCached'] = round($buf[3][0]/1024/1024, 2);
    
        $res['memUsed'] = $res['memTotal']-$res['memFree'];
    
        $res['memPercent'] = (floatval($res['memTotal'])!=0)?round($res['memUsed']/$res['memTotal']*100,2):0;
    
    
        $res['memRealUsed'] = $res['memTotal'] - $res['memFree'] - $res['memCached'] - $res['memBuffers']; //真实内存使用
        $res['memRealFree'] = $res['memTotal'] - $res['memRealUsed']; //真实空闲
        $res['memRealPercent'] = (floatval($res['memTotal'])!=0)?round($res['memRealUsed']/$res['memTotal']*100,2):0; //真实内存使用率
    
        $res['memCachedPercent'] = (floatval($res['memCached'])!=0)?round($res['memCached']/$res['memTotal']*100,2):0; //Cached内存使用率
    
        $res['memRate'] =   round( $res['memRealUsed'] / ($res['memTotal']/100) ,2);
        $res['swapTotal'] = round($buf[4][0]/1024, 2);
    
        $res['swapFree'] = round($buf[5][0]/1024, 2);
    
        $res['swapUsed'] = round($res['swapTotal']-$res['swapFree'], 2);
    
        $res['swapPercent'] = (floatval($res['swapTotal'])!=0)?round($res['swapUsed']/$res['swapTotal']*100,2):0;
    
    
        // LOAD AVG
    
        if (false === ($str = @file("/proc/loadavg"))) return false;
    
        $str = explode(" ", implode("", $str));
    
        $str = array_chunk($str, 4);
    
        $res['loadAvg'] = implode(" ", $str[0]);
    
    
        return $res;
    }
    

//转换文件大小
function transByte($size){
    $arr=array('B','KB','MB','GB','TB','EB');
    $i=0;
    while ( $size>=1024) {
        $size/=1024;
        $i++;
    }
    return round($size,2).$arr[$i];
}

//获取配置
function config($file = 'config',$arg=null){
    $config  = new \Phalcon\Config\Adapter\Php(ROOT_PATH . '/app/config/'.$file.'.php'); 

    if( is_null($arg) ){
        return $config;
    }else{
        return $config[$arg];
    }
    
}