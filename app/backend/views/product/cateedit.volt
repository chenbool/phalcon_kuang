{% extends "layouts/_base.volt" %}

{% block title %} 产品分类 {% endblock %}

{% block head %}
    <style type="text/css">
    </style>
{% endblock %}

{# main content #}
{% block content %}
<div class="page-title">
	<!-- <h3 class="hidden-xs">分类添加</h3>  -->
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="{{static_url('/admin/product/cate')}}">产品分类</a></li> 
			<li><a href="{{static_url('/admin/product/cateadd')}}">分类添加</a></li>
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
                        <header class="panel-heading"> 分类添加 </header>
                        <div class="panel-body">

                            <form class="form-horizontal bordered-group form" role="form" action="/tp/admin.php/Role/add" method="post">

                                <input type="hidden" name="id" value="{{info.id}}">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">上级</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="pid">
                                            <option value="0" {{info.pid == 0 ? 'selected="selected" ':null }}> 顶级 </option>    
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">名称</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="名称" name="name" value="{{info.name}}">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">状态</label>
                                    <div class="col-sm-6">
                                        <input type="radio" name="state" value="0" {{info.state == 0 ? 'checked="checked" ':null }} > 正常 &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="state" value="1" {{info.state == 1 ? 'checked="checked" ':null }}> 禁用
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">排序</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="排序" name="order" value="{{info.order}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">备注</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" rows="3" name="desc">{{info.desc}}</textarea>
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

    $.post('{{static_url('/admin/product/cateedit')}}',data,function(res){
        if( res.status > 0 ){
            layer.msg( res.info[0] );
        }else{
            //成功
            layer.msg( res.info[0] )
            setTimeout(function(){
                location.href = '{{static_url('/admin/product/cate')}}';
            },1500);
        }
        
    },'json');
});



</script>
{% endblock %}  