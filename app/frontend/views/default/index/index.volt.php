
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width,initial-scale=1,user-scalable=no" name="viewport">
  <title> 布尔系统 |  矿机商城 </title>
  <link rel="stylesheet" href="<?= $this->url->getStatic('/static/default/css/boost.css') ?>">
  <link rel="stylesheet" href="<?= $this->url->getStatic('/static/default/css/iconfont.css') ?>">

  <script src="<?= $this->url->getStatic('/static/default/js/boost.js') ?>"></script>
  
  <script src="<?= $this->url->getStatic('/static/default/lib/vue.js') ?>"></script>

  <!-- 弹框插件 -->
  


    
 

</head>
<body>
    
    
  	<!-- header -->
    <header data-blend-widget="header" class="blend-header">
        <span class="blend-header-left"></span>
        <span class="blend-header-title"> 矿机商城 </span>
        <span class="blend-header-right">
            <!-- <a class="blend-header-item blend-action-back-icon" href="#"></a> -->
        </span>
    </header>

    <!-- main -->
    <div class="mian">
        <div class="blend-listview-main">

            <div class="blend-flexbox blend-listview-item">
                <div class="blend-flexbox-item">
                    <img class="blend-listview-item-pic" src="http://pic.4j4j.cn/upload/pic/20130530/f41069c61a.jpg" alt="pic">
                </div>
                <div class="blend-flexbox-item blend-flexbox-ratio">
                    <div class="blend-listview-item-title">
                        初级矿机
                    </div>
                    <div class="blend-listview-item-badge">
                        <span class="blend-badge blend-badge-empty">初级矿机</span>
                        <span class="blend-badge blend-badge-empty">24小时</span>
                    </div>
                    <div class="blend-listview-item-price">
                        <em>￥</em>9
                    </div>
                </div>
                <div data-blend-widget="counter" class="blend-counter blend-listview-conter-box">
                    <button class="blend-button blend-button-primary"> 购买 </button>
                </div>
            </div>

            <div class="blend-flexbox blend-listview-item">
                <div class="blend-flexbox-item">
                    <img class="blend-listview-item-pic" src="http://pic.4j4j.cn/upload/pic/20130530/f41069c61a.jpg" alt="pic">
                </div>
                <div class="blend-flexbox-item blend-flexbox-ratio">
                    <div class="blend-listview-item-title">
                        中级矿机
                    </div>
                    <div class="blend-listview-item-badge">
                        <span class="blend-badge blend-badge-empty">中级矿机</span>
                        <span class="blend-badge blend-badge-empty">120小时</span>
                    </div>
                    <div class="blend-listview-item-price">
                        <em>￥</em>99
                    </div>
                </div>
                <div data-blend-widget="counter" data-blend-counter="{&quot;step&quot;:1,&quot;maxValue&quot;:10,&quot;minValue&quot;:1}" class="blend-counter blend-listview-conter-box">
                    <button class="blend-button blend-button-primary"> 购买 </button>
                </div>
            </div>

        </div>    
    </div>
   

        <!-- footer -->
    <footer data-blend-widget="fixedBar" class="blend-header blend-fixedBar blend-fixedBar-bottom" style="height:60px;" >
        <a class="blend-col-3 active" style="padding:0;" href="<?= $this->url->getStatic('/index/index') ?>"> 
            <div class="icon iconfont" >&#xe792;</div>
            <span>矿机商城</span> 
        </a>
        <a class="blend-col-3" style="padding:0;" href="<?= $this->url->getStatic('/my/index') ?>"> 
            <div class="icon iconfont" >&#xe755;</div>
            <span>我的矿机</span> 
        </a>
        <a class="blend-col-3" style="padding:0;" href="<?= $this->url->getStatic('/pay/index') ?>">
            <div class="icon iconfont">&#xe710;</div> 
            <span>交易中心</span> 
        </a>
        <a class="blend-col-3" style="padding:0;" href="<?= $this->url->getStatic('/user/index') ?>"> 
            <div class="icon iconfont" >&#xe6f7;</div> 
            <span>个人中心</span> 
        </a>
    </footer>
    <style>
        .blend-fixedBar-bottom>a .iconfont{
            font-size:24px;
        }
        .blend-fixedBar-bottom>a>span{
            font-size:12px;
            position:relative;bottom:25px;
        }
        .blend-fixedBar-bottom .active{
            color:#FF6666;
        }
    </style>
</body>
</html>

    <!-- <script src="<?= $this->url->getStatic('/index/js/chardata.js') ?>"></script> -->

 