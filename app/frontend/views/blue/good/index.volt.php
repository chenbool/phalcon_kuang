
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>微交易 |  商品行情  </title>

    

    <link rel="stylesheet" href="<?= $this->url->getStatic('/static/blue/css/frozen.css') ?>">
    <script src="<?= $this->url->getStatic('/static/blue/lib/zepto.min.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/static/blue/js/frozen.js') ?>"></script>

    <!-- socket  -->
    <script src="<?= $this->url->getStatic('/static/blue/lib/socket.io.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/static/blue/lib/vue.js') ?>"></script>
    <!-- <script src="<?= $this->url->getStatic('/static/blue/lib/vue-resource.js') ?>"></script> -->
    
    <script>
      var socket = io("127.0.0.1:8080");
      // var socket = io("<?= $_SERVER['SERVER_ADDR'] ;?>:8080");
    </script>      
      
<style>
    .balance .ui-tiled{margin-bottom:5px;} 
    .balance .balance-list li{margin:0 2px;padding:5px 0;border:1px solid #bbb;}
    .balance .balance-list .active{border:1px solid red;}
    .balance .balance-list li .ui-txt-red{font-weight:bold;display:inline;}
</style>

  </head>

<body ontouchstart>

  

  <header class="ui-header ui-header-positive ui-border-b">
      <i class="ui-icon-return" onclick="history.back()"> </i> 
      <h1> 商品行情 </h1>
  </header>

        <!-- main -->
        <section class="ui-container" id="app">
            
            <!-- 加载 -->
<!--             <div class="demo-block load-with-head">
                <div class="ui-loading-wrap">
                    <p class="ui-txt-info">正在加载中...</p>
                    <i class="ui-loading"></i>
                </div>
            </div> -->
 

            <ul class="ui-tiled" style="margin-bottom: 5px; background-color: rgb(255, 255, 255);">
                <li>
                    <div style="font-weight:bold;font-family:simhei;"> <h2 v-text="product.name">--.--</h2> </div> 
                    <h6 class="ui-txt-muted" v-text="mytime">--:--</h6>
                </li>
            </ul>

            <ul class="ui-tiled" style="margin-bottom: 5px; background-color: rgb(255, 255, 255);">
                <li><div  v-bind:class="[ product.isup ? 'ui-txt-primary' : 'ui-txt-red' ]" ><h2 v-text="product.price" style="font-weight:bold;">--.--</h2></div></li> 
                <li><div class="ui-txt-muted"><h5>最低</h5></div> <i class="ui-txt-warning"><h2 v-text="product.low">--.--</h2></i></li> 
                <li><div class="ui-txt-muted"><h5>最高</h5></div> <i class="ui-txt-primary"><h2 v-text="product.high">--.--</h2></i></li>
            </ul>

            
            <section id="tab">

                <div class="ui-tab" style="margin-bottom:5px;">
                    <ul class="ui-tab-nav ui-border-b">
                        <!-- <li @click="kInterval('0')" v-bind:class="[ data.interval=='0' ? 'current' : '' ]" >1S</li> -->
                        <li @click="kInterval('1')" v-bind:class="[ data.interval=='1' ? 'current' : '' ]" >1M</li> 
                        <li @click="kInterval('5')" v-bind:class="[ data.interval=='5' ? 'current' : '' ]" >5M</li> 
                        <li @click="kInterval('15')" v-bind:class="[ data.interval=='15' ? 'current' : '' ]" >15M</li>
                        <li @click="kInterval('30')" v-bind:class="[ data.interval=='30' ? 'current' : '' ]" >30M</li>
                        <li @click="kInterval('60')" v-bind:class="[ data.interval=='60' ? 'current' : '' ]" >1H</li>
                    </ul>
                </div>

                <div class="demo-item" style="height:400px;">
                    <div id="main" style="height:400px;width:98%;padding-left:5px;">
                        <img alt="" src="http://hl.anseo.cn/images/ichart.gif?bs=KRWCNY=x" width="99%">
                    </div>
                </div> 

                

            </section>

            
            <ul class="ui-tiled " style="background-color: rgb(255, 255, 255);" >
                <li>
                    <button class="ui-btn ui-btn-primary" @click="buyDialog(1)" style="position: fixed; left: 0px; bottom:60px; height: 40px; width: 80px;">买涨</button>
                </li> 
                <li>
                    <button class="ui-btn ui-btn-danger" @click="buyDialog(0)" style="position: fixed; right: 0px; bottom:60px; height: 40px; width: 80px;">买跌</button>
                </li>
            </ul>


        <!-- dialog  -->
        <div class="demo-item">
            
            <div class="demo-block">
                <div class="ui-dialog hide">
                    <div class="ui-dialog-cnt" style="width:90%;">

                        <header class="ui-dialog-hd ui-border-b">
                            <h3>订单确认</h3>
                            <i class="ui-dialog-close" data-role="button"></i>
                        </header>

                        <div class="ui-dialog-bd">
                            <div class="demo-block balance">
                                
                                <center> <h5 class="ui-tiled">结算时间</h5> </center>
                                <ul class="ui-tiled balance-list">
                                    <li class="active ui-grid-halve-img ui-tag-selected" value="30"><div class="ui-txt-red">30</div><h6>秒</h6> </li>
                                    <li value="60"><div class="ui-txt-red">60</div><h6>秒</h6></li>
                                    <li value="180"><div class="ui-txt-red">180</div><h6>秒</h6></li>
                                    <li value="300"><div class="ui-txt-red">300</div><h6>秒</h6></li>
                                    <input type="hidden" name="buy_time" class="buy_time" style="height:20px;width:40px;line-height:20px;">
                                </ul>
                                <br>
                                <center> <h5 class="ui-tiled">下注金额</h5> </center>    
                                <ul class="ui-tiled balance-list">
                                        <li value="30" class="active ui-grid-halve-img ui-tag-selected"><div class="ui-txt-red">30</div><i>￥</i> </li>
                                        <li value="60"><div class="ui-txt-red">60</div><i>￥</i></li>
                                        <li value="180"><div class="ui-txt-red">180</div><i>￥</i></li>
                                        <li value="250"><div class="ui-txt-red">250</div><i>￥</i></li>
                                        <li value="0">
                                            <div class="ui-txt-red"> 
                                                <div class="ui-form-item ui-form-item-pure" style="height:20px;line-height:20px;">
                                                    <input type="text" placeholder="其它"  >
                                                </div>
                                            </div>
                                        </li>
                                        <input type="hidden" name="buy_price" class="buy_price" style="height:20px;width:40px;line-height:20px;">
                                </ul>

                                <br>
                                <ul class="ui-tiled">
                                    <li> <p class="ui-txt-muted">余额:0.0</p> </li>
                                    <li> <p class="ui-txt-muted">手续费:2%</p> </li>
                                </ul>
                                <div class="ui-progress">
                                    <span style="width:50%"></span>
                                </div>

                                <ul class="ui-tiled" style="margin-top:10px;">
                                        <li><div class="ui-txt-muted"><h5>名称</h5></div> <i class="ui-border"><h6 v-text="product.name">--.--</h6></i></li> 
                                        <li><div class="ui-txt-muted">
                                            <h5>方向</h5></div> 
                                            <i class="ui-border">
                                                <h6 v-if='buy.state == 1'> 涨幅 </h6>
                                                <h6 v-else> 跌幅 </h6>
                                            </i>
                                        </li> 
                                        <li><div class="ui-txt-muted"><h5>现价</h5></div> <i class="ui-border"><h6 v-text="product.price">--.--</h6></i></li> 
                                        <li><div class="ui-txt-muted"><h5>金额</h5></div> <i class="ui-border"><h6 v-text="buy.price">--.--</h6></i></li> 
                                </ul>                                        
                                <div class="ui-btn-wrap">
                                    <button class="ui-btn-lg ui-btn-primary" @click="submitBuy" >确定下单</button>
                                </div>
                                <ul class="ui-tiled">
                                    <li> <p class="ui-txt-red" v-text=" '预计收益:'+buy.income"> 0.0</p> </li>
                                    <li> <p class="ui-txt-red">保底金额: 0.0</p> </li>
                                </ul>
                            </div>                                
                        </div>

                    </div>        
                </div>
                
            </div>

        </div>


        </section>
        <!-- /.ui-container-->



 
        <!-- 加载-->   
        <div class="demo-item">
            <div class="demo-block">
                <div class="ui-loading-block show">
                    <div class="ui-loading-cnt">
                        <i class="ui-loading-bright"></i>
                        <p>正在加载中...</p>
                    </div>
                </div>
            </div>             
        </div>



 

  <footer class="ui-footer ui-footer-btn">
      <ul class="ui-tiled ui-border-t">
          <li data-href="index.html" class="ui-border-r"><div>商品行情</div></li>
          <li data-href="ui.html" class="ui-border-r"><div> 交易记录 </div></li>
          <li data-href="js.html"><div> 个人账户 </div></li>
      </ul>
  </footer>


</body>
</html>

<script src="<?= $this->url->getStatic('/static/blue/lib/echarts.min.js') ?>"></script>
<script src="<?= $this->url->getStatic('/static/blue/lib/good.js') ?>"></script>

<script type="text/javascript">
var myChart = '';

var vue=new Vue({
  el: '#app',
  data:{
    product:[{
        name:'--.--',
        price:'--.--',
        low:'--.--',
        high:'--.--',
        diff:'--.--'
    }],
    mytime:'--:--',
    data : {
		pcode:"<?= $info->pcode ?>",
		interval:"1",
		api:"<?= $info->api ?>"
	},
    dataChar:data,
    buy:{
        state:1,
        price:30,
        time:30,
        income: 0 
    },
    pid:<?= $info->id ?>
  },
  mounted:function(){
    this.start();
    this.echart();
    this.buyDialogInit();
  },
  methods: {
    start:function(){
        var _this = this;

        //产品
        socket.on('ajaxpro', function(msg){
            var product_id = <?= $info->id ?>;

            msg.forEach(function(v){
                if( product_id == v.pid ){
                    _this.product = v;
                }
            });
            var myDate = new Date();
            _this.mytime=myDate.toLocaleTimeString();
            // _this.load();
        });

        //k线
        setInterval(function(){
            socket.emit('kline', _this.data);
        },1000);

        socket.on('kline_'+_this.data.pcode, function(msg){

            if( msg.interval == _this.data.interval ){
                data = msg.body;  
                
                var temp = new Array();
                var dateTemp = new Array();

                // temp.push( data[0].price * 1.101 )

                for (var i = data.length - 1; i >= 0; i--) {
                    temp.push( data[i].price ); 
                    dateTemp.push( data[i].upDate.substring(11,16) ); 
                }

                // data.forEach(function(v){
                //     temp.push( v.price );       
                //     dateTemp.push( v.upDate.substring(11,16) );       
                // });

                //重新绘制图表
                
                //y坐标
                option.yAxis.min = data[0].low;
                option.yAxis.max = data[0].high;

                // console.log(  option.yAxis);
                option.title.text = data[0].name;

                option.xAxis.data = dateTemp;
                option.series[0].data =  temp;
                myChart.setOption( option );

                //关闭加载
                _this.load();
            }	 

        });

    },
    load:function(){
        //关闭加载特效
        $('.ui-loading-block').removeClass('show');
        $('.ui-loading-block').addClass('hide');
        $('.load-with-head').hide();
    },
    buyDialog:function(state){
        $(".ui-dialog").dialog("show");
        this.buy.state = state;
    },
    echart:function(){
        // 基于准备好的dom，初始化echarts实例
        myChart = echarts.init(document.getElementById('main'));
        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption( option );
    },
    buyDialogInit:function(){
        var _this = this;
        $(".balance-list .ui-txt-red .ui-form-item input").keyup(function(){
            var _this = $(".balance-list .ui-txt-red .ui-form-item input");
            var vals = $(_this).val();
            $(_this).parents('li').val( vals );
            $(_this).parents('ul').children('input').val( vals );
        });

        $(".balance-list .ui-txt-red .ui-form-item input").keyup(function(){
            var vals = $(this).val();
            $(this).parents('li').val( vals );
            $(this).parents('ul').children('input').val( vals );
        });

        $('.balance-list li').click(function(){
            $(this).parent('ul').children('li').removeClass('active ui-grid-halve-img ui-tag-selected');
            $(this).addClass('active ui-grid-halve-img ui-tag-selected');
            var vals= $(this).val();
            $(this).parent('ul').children('input').val( vals );

            _this.buy.time = $('.buy_time').val();
            _this.buy.price = $('.buy_price').val();
            // Decimal.Parse(str);
            var income = parseInt( '<?= $info->income ?>' )/100;
            _this.buy.income = income * parseInt(_this.buy.price) + parseInt(_this.buy.price);
        });
    },
    kInterval:function(interval){
        this.data.interval = interval;
        //关闭加载特效
        $('.ui-loading-block').removeClass('hide');
        $('.ui-loading-block').addClass('show');
        // $('.load-with-head').show();    
    },
    submitBuy:function(){
        var data = {
            pid: this.pid,
            state:this.buy.state,
            price:this.buy.price,
            time:this.buy.time,
            income:this.buy.income
        };
        // console.log( data );
        $.post('<?= $this->url->getStatic('/good/order') ?>',data,function(res){
              if( res.status > 0 ){
                  layer.msg(res.info[0]);   
              }else{
                  //成功
                  layer.msg(res.info[0]);
              }
              console.log( data );
        },'json');

    }

  }


});


</script>

 