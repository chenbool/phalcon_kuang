
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width,initial-scale=1,user-scalable=no" name="viewport">
  <title> 布尔系统 |  矿机商城 </title>
  <link rel="stylesheet" href="<?= $this->url->getStatic('/static/default/css/boost.css') ?>">
  <link rel="stylesheet" href="<?= $this->url->getStatic('/static/default/css/iconfont.css') ?>">

  <script src="<?= $this->url->getStatic('/static/default/js/boost.js') ?>"></script>
  <script>
    window.zepto =  window.$;
  </script>
  <script src="<?= $this->url->getStatic('/static/default/lib/jquery.min.js') ?>"></script>
  <script src="<?= $this->url->getStatic('/static/default/lib/vue.js') ?>"></script>

  <!-- 弹框插件 -->
  <script src="<?= $this->url->getStatic('/layer/layer.js') ?>"></script> 

  <script>
  </script>


    <style>
        .menu-list .blend-col-4{
            background:#fff;
            text-align:center;
        }
        .menu-list .iconfont{
            font-size:30px;
        }
    </style>


</head>
<body>
    <?php
      // $currentUrl = trim($this->request->getUri(),'/');
      // dump( strtr($currentUrl,'/','-') );
    ?>
    
    
	
	<!-- header -->
    <header data-blend-widget="header" class="blend-header">
        <span class="blend-header-left"></span>
        <span class="blend-header-title"> 个人中心 </span>
        <span class="blend-header-right">
            <!-- <a class="blend-header-item blend-action-back-icon" href="#"></a> -->
        </span>
    </header>

    <div class="main">

        <div class="blend-card" style="margin:20px auto; border:none;">
            
            <div class="blend-card-img-view" style="border: 1px solid rgba(86, 61, 124, 0.2);">
                <img src="http://clouda.baidu.com/assets/blend2/images/demo/fruit.jpg">
            </div>
            <div class="blend-card-content-view">

                <div class="blend-card-sub-title"> <?= $userInfo->username ?>   <i class="iconfont" style="color:#FF9933;">&#xe74a;</i> </div>
                <br>
                <div class="blend-card-row my-card-row">
                    <div>
                         <span>矿石</span> <span class="blend-badge blend-badge-large" > <?= $userInfo->money ?> </span> <br>
                         <span>积分</span> <span class="blend-badge blend-badge-large" > <?= $userInfo->integral ?> </span>
                    </div>
                   
                    <a class="blend-badge blend-badge-large" 
                    href="<?= $this->url->getStatic('/login/quit') ?>" 
                    style="background-color:#ff0000;position:relative;top:-30px;" >     
                        安全退出 
                    </a>
                </div>
            </div>
        </div>

        <div class="blend-row menu-list" style="margin:0;">
            <span class="blend-col-4" style="border-bottom:none;">
                <div class="icon iconfont" >&#xe792;</div>
                <span>矿机商城</span> 
            </span>            
            <span class="blend-col-4" style="border-left:none;border-right:none;border-bottom:none;">
                <div class="icon iconfont" >&#xe755;</div>
                <span>我的矿机</span> 
            </span>
            <span class="blend-col-4" style="border-bottom:none;">
                <div class="icon iconfont">&#xe710;</div> 
                <span>交易中心</span> 
            </span>
            <span class="blend-col-4" style="border-bottom:none;">
                <div class="icon iconfont">&#xe719;</div> 
                <span>矿场管理</span> 
            </span>
            <span class="blend-col-4" style="border-left:none;border-right:none;border-bottom:none;">
                <div class="icon iconfont">&#xe71c;</div> 
                <span>矿工工会</span> 
            </span>
            <span class="blend-col-4" style="border-bottom:none;">
                <div class="icon iconfont">&#xe6fc;</div> 
                <span>我要推广</span> 
            </span>
            <span class="blend-col-4">
                <div class="icon iconfont" >&#xe6f7;</div> 
                <span>个人资料</span> 
            </span>
            <span class="blend-col-4" style="border-left:none;border-right:none;">
                <div class="icon iconfont" >&#xe6cf;</div> 
                <span>实名认证</span> 
            </span>
            <span class="blend-col-4">
                <div class="icon iconfont" >&#xe780;</div> 
                <span>帮助中心</span> 
            </span>
        </div>

    </div>
   

        <!-- footer -->
    <footer data-blend-widget="fixedBar" class="blend-header blend-fixedBar blend-fixedBar-bottom" style="height:60px;" >
        <a class="blend-col-3" style="padding:0;" href="<?= $this->url->getStatic('/index/index') ?>"> 
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
        a{
            text-decoration : none;
        }
    </style>

<script>
    $(function(){
        $('a').removeClass('active');
         $("a[href*= '<?= $this->request->getUri() ?>' ] ").addClass('active');
    });
</script>
</body>
</html>

    <!-- <script src="<?= $this->url->getStatic('/index/js/chardata.js') ?>"></script> -->
 