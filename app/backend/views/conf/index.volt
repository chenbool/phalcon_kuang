{% extends "layouts/_base.volt" %}

{% block title %} 产品列表 {% endblock %}

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
			<li><a href="{{static_url('/admin/product/index')}}">产品列表</a></li> 
			<li><a href="{{static_url('/admin/product/add')}}">产品添加</a></li>
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
                        <header class="panel-heading" style="text-align:center;"> 
                            基本配置 
                        </header>
                        <div class="panel-body">

                            <form class="form-horizontal bordered-group form" role="form" action="" method="post">


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">网站名称</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control name" placeholder="名称" name="title" value="{{ info.title }}">
                                    </div>
                                     <div class="alert alert-danger col-md-2 hidden-xs hidden-sm no-pading no-margin pull-right" role="alert">  网站名称 </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 col-xs-12 control-label">关键字</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control name" placeholder="关键字" name="keyword" value="{{ info.keyword }}">
                                    </div>
                                    <div class="alert alert-danger col-md-2 hidden-xs hidden-sm no-pading no-margin pull-right" role="alert"> 关键字: 关键词1,关键词2 </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-2 control-label">网站描述</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" rows="3" name="desc">{{ info.desc }}</textarea>
                                    </div>
                                    <div class="alert alert-danger col-md-2 hidden-xs hidden-sm no-pading no-margin pull-right" role="alert"> 网站描述 </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">备案号</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control name" placeholder="备案号" name="icp" value="{{ info.icp }}">
                                    </div>
                                    <div class="alert alert-danger col-md-2 hidden-xs hidden-sm no-pading no-margin pull-right" role="alert"> 备案号 </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Copy</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control name" placeholder="备案号" name="copy" value="{{ info.copy }}">
                                    </div>
                                    <div class="alert alert-danger col-md-2 hidden-xs hidden-sm no-pading no-margin pull-right" role="alert"> Copy </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">统计代码</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" rows="3" name="html">{{ info.html }}</textarea>
                                    </div>
                                    <div class="alert alert-danger col-md-2 hidden-xs hidden-sm no-pading no-margin pull-right" role="alert"> 统计代码 </div>
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

<script type="text/javascript" src="{{static_url('/admin/js/underscore-min.js')}}"></script>
<script type="text/javascript">

//提交
$('.submit').click(function(){
    var data = $('.form').serializeArray();

    $.post('{{static_url('/admin/conf/save')}}',data,function(res){

        if( res.status > 0 ){
            layer.msg( res.info[0] );
        }else{
            //成功
            layer.msg( res.info[0] )
            setTimeout(function(){
                location.href = '{{static_url('/admin/conf/index')}}';
            },1500);
        }
        
    },'json');
});



</script>
{% endblock %}  