
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


    
 

</head>
<body>
    <?php
      // $currentUrl = trim($this->request->getUri(),'/');
      // dump( strtr($currentUrl,'/','-') );
    ?>
    
    
    <!-- header -->
    <header data-blend-widget="header" class="blend-header">
        <span class="blend-header-left">
            <a class="blend-header-item blend-action-back-icon" href="javascript:history.back();">&#xe600;</a>
        </span>
        <span class="blend-header-title"> 交易中心 </span>
        <span class="blend-header-right">
            <a class="blend-header-item blend-action-back-icon" href="#"></a>
        </span>
    </header>


    <!-- main -->
    <div class="main">
        <div style="border-bottom:1px solid #ddd;margin:0;" class="blend-row">
            <div style="background:#fff;border:none;" >
                <div class="blend-col-4" style="border:none;">
                    <strong>幅度:</strong>  <span>1%</span> <br>
                    <strong>数量:</strong>  <span>26</span>
                </div>
                <div class="blend-col-4" style="border:none;">
                    <strong>最低:</strong>  <span>0.99</span> <br>
                    <strong>最高:</strong>  <span>9.89</span> 
                </div>
                <div class="blend-col-4" style="border:none;">
                    <i class="icon iconfont">&#xe77e;</i>
                    <strong style="font-size:24px;">9.6</strong>
                </div>
            </div>

        </div>

        <section class="blend-tab blend-tab-animation" style="border-bottom:1px solid #ddd;">
            <div class="blend-tab-header">
                <div class="blend-tab-header-item blend-tab-header-item-active">走势图</div>
                <div class="blend-tab-header-item">分时线</div>
                <div class="blend-tab-header-active" style="width: 207px; transform: translateX(207px);"></div>
            </div>
            <div class="blend-tab-content">
                <div class="blend-tab-content-item" style="display:block;">
                    <!-- 走势图 -->
                    <div id="main" style="height:300px;width:98%;">
                        <img alt="" src="http://hl.anseo.cn/images/ichart.gif?bs=KRWCNY=x" width="99%">
                    </div>
                </div>
                <div class="blend-tab-content-item" style="display:none;">
                    <!-- 分时线 -->
                    <div id="main1" style="height:300px;width:98%;">
                        <img alt="" src="http://hl.anseo.cn/images/ichart.gif?bs=KRWCNY=x" width="99%">
                    </div>
                </div>
            </div>
        </section>

        <section class="blend-tab blend-tab-animation" >
            <div class="blend-tab-header">
                <div class="blend-tab-header-item blend-tab-header-item-active">买入</div>
                <div class="blend-tab-header-item">卖出</div>
                <div class="blend-tab-header-active" style="width: 207px; transform: translateX(207px);"></div>
            </div>
            <div class="blend-tab-content">
                <div class="blend-tab-content-item" style="display:block;">
                    <!-- 买入 -->
                    <div class="blend-form" style="margin: 8px 0;text-align:center;">
                        <div class="blend-formgroup">
                            <label class="blend-formgroup-label">数量</label>
                            <input type="text" class="blend-formgroup-input" placeholder="买入数量">
                        </div>
                        <div class="blend-formgroup">
                            <label class="blend-formgroup-label">单价</label>
                            <input type="text" class="blend-formgroup-input" placeholder="买入单价" value="9.6">
                        </div>
                    </div>
                    <center style="padding:5px 20px;">
                        <button class="blend-button blend-button-primary blend-button-large"> 买 入 </button>
                    </center>
                </div>
                <div class="blend-tab-content-item" style="display:none;">
                    <!-- 卖出 -->
                    <div class="blend-form" style="margin: 8px 0;text-align:center;">
                        <div class="blend-formgroup">
                            <label class="blend-formgroup-label">数量</label>
                            <input type="text" class="blend-formgroup-input" placeholder="卖出数量">
                        </div>
                        <div class="blend-formgroup">
                            <label class="blend-formgroup-label">单价</label>
                            <input type="text" class="blend-formgroup-input" placeholder="卖出单价">
                        </div>
                    </div>
                    <center style="padding:5px 20px;">
                        <button class="blend-button blend-button-primary blend-button-large"> 卖 出 </button>
                    </center>
                    
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

    <!-- <script src="<?= $this->url->getStatic('/index/js/chardata.js') ?>"></script> -->
    <script src="<?= $this->url->getStatic('/static/default/js/echarts.min.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/static/default/js/kLine.js') ?>"></script>
    <script>
        // 基于准备好的dom，初始化echarts实例
        myChart = echarts.init(document.getElementById('main'));
        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption( option );

        // tab
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
 