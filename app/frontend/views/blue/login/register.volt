

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>微交易 |  登录  </title>

    <link rel="stylesheet" href="{{static_url('/static/blue/css/frozen.css')}}">

    <!-- <script src="{{static_url('/static/blue/js/frozen.js')}}"></script> -->
    <!-- <script src="{{static_url('/static/blue/lib/zepto.min.js')}}"></script> -->
    <script src="{{static_url('/admin/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{static_url('/layer/layer.js')}}"></script>

    <script src="{{static_url('/static/blue/lib/vue.js')}}"></script>
  </head>
<body>


  <header class="ui-header ui-header-positive ui-border-b"> <h1> 注册 </h1> </header>

        <!-- main -->
        <section class="ui-container" id="app">
            
          <div style="margin:10px;text-align:center;">
            <img src="http://120.78.202.17/static/index/img/logo.png" alt="" width="150">
          </div>

          <div class="demo-item" style="margin:10px;">
              

              <div class="demo-block">
                  <div class="ui-form ui-border-t">
                      <form action="#" class="form">
                          <div class="ui-form-item ui-form-item-l ui-border-b">
                              <label class="ui-border-r">中国 +86</label>
                              <input type="text" placeholder="请输入手机号码" name="phone" id="phone">
                          </div>
                          <div class="ui-form-item ui-form-item-r ui-border-b">
                              <input type="text" placeholder="请输入验证码" name="code">
                              <button type="button" class="ui-border-l" @click="sms()"> 发 送 </button>
                          </div>

                          <div class="ui-form-item ui-form-item-l ui-border-b">
                              <label class="ui-border-r">密码</label>
                              <input type="password" placeholder="密码" name="password">
                          </div>

                          <div class="ui-form-item ui-form-item-l ui-border-b">
                              <label class="ui-border-r">确认密码</label>
                              <input type="password" placeholder="确认密码" name="c_password">
                          </div>

                          <div class="ui-form-item ui-form-item-l ui-border-b">
                              <label class="ui-border-r">邀请码</label>
                              <input type="text" placeholder="邀请码" name="invite" value="1">
                          </div>

                      </form>
                  </div>
              </div>


          </div>


          <div style="margin:20px;">
            <button class="ui-btn-lg ui-btn-primary" @click="submit()">注册</button>
          </div>
 
          <div style="margin:20px;text-align:center;">
            <a href="{{static_url('/login/index')}}">
              <span>立即登录</span>
            </a>            
          </div>

          <div style="margin:20px;text-align:center;">
            <a href="">
              <span>忘记密码</span>
            </a>            
          </div>


        </section>
        <!-- /.ui-container-->

</body>
</html>


<script type="text/javascript">
var vue=new Vue({
  el: '#app',
  data:{
    product:[],
  },
  mounted:function(){
    
  },
  methods: {
    submit:function(){
      var data = $('.form').serializeArray();

      $.post('{{ static_url('/login/register') }}',data,function(res){
          // console.log(res);
          if( res.status > 0 ){
              layer.msg(res.info[0]);   
          }else{
              //成功
              layer.msg(res.info[0]);
              setTimeout(function(){
                  location.href = '{{ static_url('/login/index') }}';
              },1500);
          }
          
      },'json');
    },
    sms:function(){
      var phone = $('#phone').val();

      $.post('{{ static_url('/msm/index') }}',{phone:phone},function(res){
          
          if( res.status > 0 ){
              layer.msg(res.info[0]);   
          }else{
              //成功
              layer.msg(res.info[0]);
          }
          
      },'json');
    }

  }

});

</script>

 