

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>微交易 |  登录  </title>

    <link rel="stylesheet" href="{{static_url('/static/blue/css/frozen.css')}}">
<!--     <script src="{{static_url('/static/blue/js/frozen.js')}}"></script> -->
    <script src="{{static_url('/admin/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{static_url('/layer/layer.js')}}"></script>
    <script src="{{static_url('/static/blue/lib/vue.js')}}"></script>
    
  </head>
<body>

  

  <header class="ui-header ui-header-positive ui-border-b"> <h1> 登录 </h1> </header>

        <!-- main -->
        <section class="ui-container" id="app">
            
          <div style="margin:10px;text-align:center;">
            <img src="http://120.78.202.17/static/index/img/logo.png" alt="" width="150">
          </div>

          <div class="demo-item" style="margin:10px;">
              
              <div class="demo-block">
                  <div class="ui-form ui-border-t">
                      <form action="#"  class="form">
                          <div class="ui-form-item ui-form-item-pure ui-border-b">
                              <input type="text" placeholder="手机号" value="17052850083" name="phone">
                          </div>
                          <div class="ui-form-item ui-form-item-pure ui-border-b">
                              <input type="password" placeholder="密码" value="" name="password">
                          </div>
                          
                      </form>
                  </div>
              </div>
          </div>

          <div style="margin:20px;">
            <button class="ui-btn-lg ui-btn-primary"  @click="submit()">登录</button>
          </div>
 
          <div style="margin:20px;text-align:center;">
            <a href="{{static_url('/login/register')}}">
              <span>立即注册</span>
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
    index:'',
  },
  mounted:function(){
    
  },
  methods: {
    submit:function(){
      var data = $('.form').serializeArray();

      $.post('{{ static_url('/login/login') }}',data,function(res){
          if( res.status > 0 ){
              layer.msg(res.info[0]);   
          }else{
              //成功
              layer.msg(res.info[0]);
              setTimeout(function(){
                  location.href = '{{ static_url('/index/index') }}';
              },1500);
          }
          
      },'json');
    }
  }

});

</script>

 