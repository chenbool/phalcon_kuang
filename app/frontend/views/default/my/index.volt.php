
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width,initial-scale=1,user-scalable=no" name="viewport">
  <title> 布尔系统 |  我的矿机 </title>
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
        body{
            background:#EEEFF3;
        }
        table{
            width:100%;
            background:#fff;
        }
        table th,table td{
            height:30px;
        }
        table td{
            font-size:10px;
            text-align:center;
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
        <span class="blend-header-title"> 我的矿机 </span>
        <span class="blend-header-right">
            <!-- <a class="blend-header-item blend-action-back-icon" href="#"></a> -->
        </span>
    </header>

    <div class="main">
        <section class="blend-tab blend-tab-animation">
            <div class="blend-tab-header">
                <div class="blend-tab-header-item">运行中的矿机</div>
                <div class="blend-tab-header-item blend-tab-header-item-active">已停止的矿机</div>
                <div class="blend-tab-header-active" style="width: 207px; transform: translateX(207px);"></div>
            </div>
            <div class="blend-tab-content">
                <div class="blend-tab-content-item" style="display:none;">
                    <!-- 运行中的矿机 -->
                    <table  style="margin-top:5px;">
                        <tr>
                            <th>矿机名称</th>
                            <th>矿机编号</th>
                            <th>运行时间</th>
                            <th>收入(GEC)</th>
                            <th>状态</th>
                        </tr>
                        <tr style="background:#fff;">
                            <td>基础云矿机</td>
                            <td>B2014729</td>
                            <td>10H</td>
                            <td>0.004</td>
                            <td>正在运行</td>
                        </tr>
                        <tr style="background:#fff;">
                            <td>基础云矿机</td>
                            <td>B2014729</td>
                            <td>10H</td>
                            <td>0.004</td>
                            <td>正在运行</td>
                        </tr>
                    </table>
                </div>
                <div class="blend-tab-content-item" style="display: block;">
                    <!-- 已停止的矿机 -->
                    <table  style="margin-top:5px;">
                        <tr>
                            <th>矿机名称</th>
                            <th>矿机编号</th>
                            <th>运行时间</th>
                            <th>收入(GEC)</th>
                            <th>状态</th>
                        </tr>
                        <tr style="background:#fff;">
                            <td>基础云矿机</td>
                            <td>B2014729</td>
                            <td>10H</td>
                            <td>0.004</td>
                            <td>正在运行</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
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

<script>
    zepto('.blend-tab').tab();
    zepto('#active').click(function() {
        zepto('.blend-tab').tab('active', 1);
    });
    zepto('#destroy').click(function() {
        zepto('.blend-tab').tab('destroy');
    });
    zepto('#create').click(function() {
        zepto('.blend-tab').tab();
    });
</script>

 