{% extends "layouts/_base.volt" %}

{% block title %} 商品行情 {% endblock %}

{% block head %}
    <style type="text/css"></style>
{% endblock %}

{# main content #}
{% block content %}

  <header class="ui-header ui-header-positive ui-border-b"> <h1> 商品行情 </h1> </header>

        <!-- main -->
        <section class="ui-container" id="app">
            
            <!-- 加载 -->
<!--             <div class="demo-block load-with-head">
                <div class="ui-loading-wrap">
                    <p class="ui-txt-info">正在加载中...</p>
                    <i class="ui-loading"></i>
                </div>
            </div> -->
 
            <div class="demo-item" style="padding:10px 0;">

                <div class="demo-block">
                    <table class="ui-table">
                        <thead>
                            <tr>
                                <th>商品名称</th><th>现价</th><th>最高</th><th>最低</th><th>走势</th>
                            </tr>
                        </thead>
                        <tbody>

                        <tr  v-for="item in product"  v-bind:class="[ item.diff>0 ? 'ui-txt-primary' : 'ui-txt-red' ]" @click="jump(item.pid)" >
                            <td v-text="item.name">--.--</td>
                            <td><button class="ui-btn ui-btn-s" v-text="item.price" v-bind:class="[ item.diff>0 ? 'ui-btn-primary' : 'ui-btn-danger' ]" > --.-- </button></td>
                            <td v-text="item.high">--.--</td>
                            <td v-text="item.low">--.--</td>
                            <td v-text="item.diff">--.--</td>
                        </tr>

                        </tbody>
                    </table>
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


{% endblock %}



{# js content #}
{% block js %}

<script type="text/javascript">
var vue=new Vue({
  el: '#app',
  data:{
    product:[],
  },
  mounted:function(){
    this.start();
  },
  methods: {
    start:function(){
        socket.on('connect', function(){
            console.log('socket链接成功！');
        });
        var _this = this;
        socket.on('ajaxpro', function(msg){
            _this.product = msg;
            // console.log(_this.product);
            _this.load();
        });
    },
    load:function(){
        //关闭加载特效
        $('.ui-loading-block').removeClass('show');
        $('.ui-loading-block').addClass('hide');
        $('.load-with-head').hide();
    },
    jump:function(pid){
        parent.location='{{static_url('/good/index?id=')}}'+pid;
    }
  }

});

</script>

{% endblock %}  