{% extends "layouts/_base.volt" %}

{% block title %} 管理员 {% endblock %}

{% block head %}
    <style type="text/css">
    </style>
{% endblock %}

{# main content #}
{% block content %}

<div class="page-title">
	<!-- <h3 class="hidden-xs">产品添加</h3>  -->
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="{{static_url('/admin/admin/index')}}">管理员列表</a></li> 
			<li><a href="{{static_url('/admin/admin/add')}}">管理员添加</a></li>
		</ol>
	</div>
</div>

<!-- main -->
<div class="row">
              
    <div class="col-md-12">
        <section class="panel">

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading"> 
                            管理员添加 
                        <a class="pull-right" href="{{static_url('/admin/admin/index')}}" > 返回列表 </a>
                        </header>
                        <div class="panel-body">

                            <form class="form-horizontal bordered-group form" role="form" action="/tp/admin.php/Role/add" method="post">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">用户名</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control name" placeholder="用户名" name="username">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">邮箱</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control name" placeholder="邮箱" name="email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">手机号</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control name" placeholder="手机号" name="phone">
                                    </div>
                                </div>
<!-- 
                                <div class="form-group">
                                    <label class="col-sm-2 col-xs-12 control-label">角色</label>
                                    <div class="col-sm-2 col-xs-6">
                                        <select class="form-control" name="game_rule">
                                            <option value="0" > 默认 </option>    
                                            <option value="1" > 点位 </option>        
                                        </select>
                                    </div>
                                    <div class="alert alert-danger col-md-2 hidden-xs hidden-sm no-pading no-margin pull-right" role="alert"> 时间玩法间隔,以分钟为单位 </div>
                                </div> 
-->

<!-- 
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">状态</label>
                                    <div class="col-sm-6">
                                        <input type="radio" name="state" value="0" checked="checked"> 使用 &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="state" value="1"> 禁用
                                    </div>
                                </div> 
-->

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">密码</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control name" placeholder="密码" name="password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">确认密码</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control name" placeholder="密码" name="c_password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class=" col-sm-offset-2 col-sm-6">
                                        <button type="button" class="btn btn-primary btn-sm submit">提交</button> &nbsp;&nbsp;
                                        <button type="reset" class="btn btn-success btn-sm">重置</button>
                                    </div>
                                </div>                                                    

                            </form>

                        </div>
                    </section>
                </div>
            </div>


        </section>
    </div>
</div>


{% endblock %}



{# js content #}
{% block js %}

<script type="text/javascript">
//提交
$('.submit').click(function(){
    var data = $('.form').serializeArray();

    $.post('{{static_url('/admin/admin/add')}}',data,function(res){

        if( res.status > 0 ){
            layer.msg( res.info[0] );
        }else{
            //成功
            layer.msg( res.info[0] )
            setTimeout(function(){
                location.href = '{{static_url('/admin/admin/index')}}';
            },1500);
        }
        
    },'json');
});



</script>
{% endblock %}  