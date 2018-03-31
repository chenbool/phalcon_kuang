
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width,initial-scale=1,user-scalable=no" name="viewport">
  <title> 布尔系统 |  登录 </title>
  <link rel="stylesheet" href="<?= $this->url->getStatic('/static/default/css/boost.css') ?>">
  <link rel="stylesheet" href="<?= $this->url->getStatic('/static/default/css/iconfont.css') ?>">

  <script src="<?= $this->url->getStatic('/static/default/js/boost.js') ?>"></script>
  <script src="<?= $this->url->getStatic('/static/default/lib/jquery.min.js') ?>"></script>
  <script src="<?= $this->url->getStatic('/static/default/lib/vue.js') ?>"></script>

  <!-- 弹框插件 -->
  <script src="<?= $this->url->getStatic('/layer/layer.js') ?>"></script>




</head>
<body>
    
    <div id="app">
  
        <!-- header -->
        <header data-blend-widget="header" class="blend-header">
            <span class="blend-header-left"></span>
            <span class="blend-header-title"> 注册 </span>
            <span class="blend-header-right"></span>
        </header>
        
        <!-- main -->
        <div class="mian">
            <div style="margin:10px auto;text-align:center;">
                <img src="<?= $this->url->getStatic('/static/default/img/qr.png') ?>" alt="" width="200">
            </div>
            
                <div class="blend-form" style="margin: 8px 0;border:none;padding:0 30px;">
                    <form action="#" class="form">
                        <div class="blend-formgroup">
                            <label class="blend-formgroup-label">手机号码</label>
                            <input type="text" class="blend-formgroup-input" placeholder="手机号码" id="#phone" name="phone">
                        </div>
                        <div class="blend-formgroup">
                            <label class="blend-formgroup-label">验证码</label>
                            <input type="text" class="blend-formgroup-input" placeholder="验证码" name="code">
                            <button class="blend-button blend-button-primary blend-button-large" @click="sms"> 发 送 </button>
                        </div>
                        <div class="blend-formgroup">
                            <label class="blend-formgroup-label">密码</label>
                            <input type="text" class="blend-formgroup-input" placeholder="密码" name="password">
                        </div>
                        <div class="blend-formgroup">
                            <label class="blend-formgroup-label">确认密码</label>
                            <input type="text" class="blend-formgroup-input" placeholder="密码" name="c_password">
                        </div>
                    </form>
                    <center style="padding:10px 100px;">
                        <button class="blend-button blend-button-primary blend-button-large" @click="submit"> 注 册 </button>
                    </center>
                </div>
                <div style="margin:20px;text-align:center;">
                    <a href="<?= $this->url->getStatic('/login/index') ?>">
                      <span>立即登录</span>
                    </a>            
                </div>

                <div style="margin:20px;text-align:center;">
                    <a href="">
                      <span>忘记密码</span>
                    </a>            
                </div>

        </div>
    
    </div>
 
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

      $.post('<?= $this->url->getStatic('/login/register') ?>',data,function(res){
          // console.log(res);
          if( res.status > 0 ){
              layer.msg(res.info[0]);   
          }else{
              //成功
              layer.msg(res.info[0]);
              setTimeout(function(){
                  location.href = '<?= $this->url->getStatic('/login/index') ?>';
              },1500);
          }
          
      },'json');
 
    },
    sms:function(){
      var phone = $('#phone').val();

      $.post('<?= $this->url->getStatic('/msm/index') ?>',{phone:phone},function(res){
          
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
 