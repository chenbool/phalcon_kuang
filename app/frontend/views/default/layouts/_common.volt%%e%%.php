a:9:{i:0;s:184:"
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width,initial-scale=1,user-scalable=no" name="viewport">
  <title> 布尔系统 | ";s:5:"title";N;i:1;s:661:"</title>
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

";s:4:"head";N;i:2;s:154:"
</head>
<body>
    <?php
      // $currentUrl = trim($this->request->getUri(),'/');
      // dump( strtr($currentUrl,'/','-') );
    ?>
    
    ";s:7:"content";N;i:3;s:1584:"
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
";s:2:"js";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:2:"
";s:4:"file";s:50:"../app/frontend/views/default/layouts/_common.volt";s:4:"line";i:37;}}i:4;s:1:" ";}