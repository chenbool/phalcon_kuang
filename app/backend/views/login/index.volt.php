
<!DOCTYPE html lang="en">
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="布尔管理系统,布尔系统">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">    
    
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/theme.css') ?>">
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/theme_1.css') ?>">
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/palette.1.css') ?>" id="skin">
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/style.1.css') ?>" id="font">
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/main.css') ?>">

    <!--[if lt IE 9]>
        <script src="<?= $this->url->getStatic('/admin/js/html5shiv.js') ?> "></script>
        <script src="<?= $this->url->getStatic('/admin/js/respond.min.js') ?> "></script>
    <![endif]-->

    <script src="<?= $this->url->getStatic('/admin/js/jquery-1.11.1.min.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/admin/js/modernizr.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/layer/layer.js') ?>"></script>

    
    <style type="text/css">
        
    </style>
  
    <title> 布尔管理系统 |  登录  </title>
</head>  
<body class="bg-color center-wrapper">
      

    <div class="center-content animated fadeInDown">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-offset-5 col-lg-2">
                <section class="panel panel-default">
                    <center> <header class="panel-heading"> <strong>登录</strong> </header> </center> 
                    <div class="bg-white user pd-md">
                        <h6>
                            <strong>欢迎登录!</strong>
                        </h6>
                        <form role="form" action="<?= $this->url->getStatic('/admin/login/login') ?>" class="form">
                            <input type="text" class="form-control mg-b-sm" name="username" placeholder="账号" autofocus>
                            <input type="password" class="form-control mg-b-sm" name="password" placeholder="密码">

                            <input type="text" class="form-control pull-left mg-b-sm" name="code" placeholder="验证码" style="width:60%;">
                            <img src="/admin/login/captcha" alt="验证码" class="mg-b-sm pull-left verify" style="width:40%;height:35px;" >
           
                            <label class="checkbox pull-left">
                                <input type="checkbox" value="remember-me" checked="checked">记住密码
                            </label>
                            <div class="text-right mg-b-sm mg-t-sm">
                                <a href="<?= __STATIC__ ?>/admin/javascript:;">忘记密码?</a>
                            </div>
                            <button class="btn btn-info btn-block" type="button" id="login">登录</button>
                        </form>

                    </div>
                </section>
            </div>
        </div>
    </div>
 
    
</body>
</html>


<script type="text/javascript">
       
//点击图片切换验证码
$('.verify').click(function(){

    $(this).addClass('animated pulse');

    var verifyurl=$(this).attr('src');
    $(this).attr('src',verifyurl+'/'+Math.random()); 

    setTimeout(function(){
        $('.verify').removeClass('animated pulse');
    },1000);
     
});

//登录
$('#login').click(function(){
    var data = $('.form').serializeArray();

    $.post('<?= $this->url->getStatic('/admin/login/login') ?>',data,function(res){
        // console.log(res);
        if( res.status > 0 ){
            layer.msg(res.info[0]);   
        }else{
            //成功
            layer.msg(res.info[0]);
            setTimeout(function(){
                location.href = '<?= $this->url->getStatic('/admin/index/index') ?>';
            },1500);
        }
        
    },'json');
});

$(document).keyup(function(evnet) {
    if (evnet.keyCode == '13') {
        // alert('哈哈');
        $('#login').click();
    }
});

</script>
 