{% extends "layouts/_base.volt" %}

{% block title %} 产品列表 {% endblock %}

{% block head %}
    <style type="text/css">
    </style>
{% endblock %}

{# main content #}
{% block content %}

<div class="page-title">
	<!-- <h3 class="hidden-xs"> 产品管理 </h3>  -->
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="{{static_url('/admin/product/index')}}">产品管理</a></li> 
			<li><a href="{{static_url('/admin/product/risk')}}">风控管理</a></li>
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
                        风控管理 
                        <a class="pull-right" href="{{static_url('/admin/product/index')}}" > 返回列表 </a>
                        </header>
                        <div class="panel-body">

                            <form class="form-horizontal bordered-group form" role="form" action="/tp/admin.php/Role/add" method="post">

                                <input type="hidden" class="form-control" name="id" value="{{info.id}}">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">指定客户亏损</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control name" placeholder="指定客户亏损" name="name" value="{{info.name}}">
                                    </div>
                                    <div class="alert alert-danger col-md-2 hidden-xs hidden-sm no-pading no-margin pull-right" role="alert">设置会员ID（如：8888|9999） </div>                                    
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-2 col-xs-12 control-label">指定客户赢利</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control name" placeholder="指定客户赢利" name="rand" value="{{info.rand}}">
                                    </div>
                                    <div class="alert alert-danger col-md-2 hidden-xs hidden-sm no-pading no-margin pull-right" role="alert">设置会员ID（如：8888|9999） </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-xs-12 control-label">风控概率</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control" rows="5" name="desc">0-99:50|100-300:40</textarea>
                                    </div>
                                  
                                    <div class="alert alert-danger col-md-2 hidden-xs hidden-sm no-pading no-margin pull-right" role="alert">
                                        说明: 输入金额区间，在区间之内会根据此概率盈亏,不在此区间则不受风控影响 <br>
                                        格式: 区间开始-区间结束:客户赢利概率 如 0-100:50|100-200:30 
                                     </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">定时开启</label>
                                    <div class="col-sm-6">
                                        <input type="radio" name="state" value="0" {% if 0 == info.state %} checked="checked" {% endif %} > 使用 &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="state" value="1" {% if 1 == info.state %} checked="checked" {% endif %}> 关闭 <br><br>
                                        <input type="text" class="form-control name" placeholder="开启区间" name="rand" value="3:00-5:00|10:30-11:30">
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

<script type="text/javascript" src="{{static_url('/admin/js/underscore-min.js')}}"></script>
<script type="text/javascript">

$(function(){
    apiList();
    $('.api_type').change(function(){
        apiList();
    });

});

//list
function apiList(){
    var api_type = $('.api_type').val();

    $.post('{{static_url('/admin/product/apilist')}}',{type:api_type},function(res){

        var template = _.template("<% _.each(res, function(code,name) { %> <option value='<%= code %>' ><%= name %></option>  <% }); %>");  
        var html = template( { res: res } );

        $('.api-list').append( html  )
        var pcode = '{{info.pcode}}';
        $(".api-list option[value='"+pcode+"']").attr("selected","selected");
    },'json');
}


//提交
$('.submit').click(function(){
    var data = $('.form').serializeArray();

    $.post('{{static_url('/admin/product/edit')}}',data,function(res){

        if( res.status > 0 ){
            layer.msg( res.info[0] );
        }else{
            //成功
            layer.msg( res.info[0] )
            setTimeout(function(){
                location.href = '{{static_url('/admin/product/index')}}';
            },1500);
        }
        
    },'json');
});



</script>
{% endblock %}  