{% extends "layouts/_base.volt" %}

{% block title %} 登录 {% endblock %}

{% block head %}

{% endblock %}


{% block content %}
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
                <img src="{{static_url('/static/default/img/qr.png')}}" alt="" width="200">
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
                    <a href="{{static_url('/login/index')}}">
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
{% endblock %}  