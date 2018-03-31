{% extends "layouts/_base.volt" %}

{% block title %} 登录 {% endblock %}

{% block head %}

{% endblock %}


{% block content %}
    <div id="app">

        <header data-blend-widget="header" class="blend-header">
            <span class="blend-header-left"></span>
            <span class="blend-header-title"> 登录 </span>
            <span class="blend-header-right"></span>
        </header>
        
        <!-- main -->
        <div class="mian">
            <div style="margin:10px auto;text-align:center;">
                <img src="{{static_url('/static/default/img/qr.png')}}" alt="" width="200">
            </div>
            <div class="blend-form" style="margin: 8px 0;border:none;padding:0 30px;">
                <form action="" class="form">
                    <div class="blend-formgroup">
                        <label class="blend-formgroup-label">手机号码</label>
                        <input type="text" class="blend-formgroup-input" placeholder="手机号码" name="phone">
                    </div>
                    <div class="blend-formgroup">
                        <label class="blend-formgroup-label">密码</label>
                        <input type="password" class="blend-formgroup-input" placeholder="密码" name="password">
                    </div>
                </form>
                <center style="padding:10px 100px;">
                    <button class="blend-button blend-button-primary blend-button-large" @click="submit()"> 登 录 </button>
                </center>
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

        </div>

    </div>

{% endblock %}


{% block js %}
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
{% endblock %}  