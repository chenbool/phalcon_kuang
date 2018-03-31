{% extends "layouts/_base.volt" %}

{% block title %} 管理员 {% endblock %}

{% block head %}
    <style type="text/css">
    </style>
{% endblock %}

{# main content #}
{% block content %}

<link rel="stylesheet" href="{{static_url('/admin/css/modern.min.css')}}">

<!-- title -->
<div class="page-title">
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="{{static_url('/admin/admin/index')}}">管理员管理</a></li> 
			<li><a href="{{static_url('/admin/admin/index')}}">管理员列表</a></li>
		</ol>
	</div>
</div>

<!-- main -->
<div class="row">
						<div class="col-md-12">
                            <section class="panel">

                                <header class="panel-heading">
                                    <a href="{{static_url('/admin/admin/add')}}">
                                        <i class="fa fa-plus btn btn-default btn-sm btn-outline"></i> 
                                        <span>管理员添加</span>
                                    </a>
                                </header>

                                <!-- search -->
                                <div class="panel-body">
                                    <form class="form-horizontal bordered-group form" role="form" action="" method="get">
                                        <div class="form-group">
                                            
                                            <div class="col-sm-4 col-xs-10">
                                                <input type="text" class="form-control" placeholder="名称" name="username" value="{{this.request.get('username')}}">
                                            </div>

                                            <div class="col-sm-2 col-xs-10">
                                                <button type="submit" class="btn btn-primary btn-sm submit"> 查 找 </button> 
                                            </div>
                                        </div>                   
                                    </form>
                                </div> 

                                <!-- list -->
                                <div class="panel-body padding">
                                    <div class="table-responsive">
                                     <!-- table-striped table-bordered -->
                                        <table class="table responsive  table-hover no-margin" data-sortable="" data-sortable-initialized="true">
                                            <thead>
                                                <tr class=" bg-warning">
                                                    <th style="text-align:center;">序号</th>
                                                    <th>用户名</th>
                                                    <th>手机号</th>
                                                    <th>邮箱</th>
                                                    <th>状态</th>
                                                    <th>ip</th>
                                                    <th>登录次数</th>
                                                    <th class="hidden-xs">最近登录</th>
                                                    <th class="hidden-xs">创建时间</th>
                                                    <th style="text-align:center;">操作</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {% for vo in list %}
                                                    <tr {{ vo.state == 1 ? ' class="bg-danger" ' : null }}>
                                                        <td style="text-align:center;"> # {{vo.id}}</td>
                                                        <td> {{vo.username}} </td>
                                                        <td> {{vo.phone}} </td>
                                                        <td> {{vo.email}} </td>
                                                        <td> [ {{ vo.state == 0 ? '正常' : '禁用' }} ]</td>
                                                        <td> {{ vo.ip }} </td>
                                                        <td> {{ vo.login_num }} </td>
                                                        <td class="hidden-xs">{{ date('Y-m-d H:i:s',vo.last_time)}}</td>
                                                        <td class="hidden-xs">{{ date('Y-m-d H:i:s',vo.add_time)}}</td>
                                                        <td style="text-align:center;">                                                          
    														<a href="{{static_url('/admin/admin/edit?id=')}}{{vo.id}}" class="btn btn-xs btn-warning"> 编 辑 </a> &nbsp;&nbsp;
                                                            {% if vo.id != 1 %}  
                                                                <a href="javascript:;" class="btn btn-xs btn-danger" onclick="del({{vo.id}})"> 删 除 </a>
                                                            {% endif %}
    														
                                                        </td>
                                                    </tr>             
                                                {% endfor  %}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>



                            </section>
                        </div>
</div>


{% endblock %}



{# js content #}
{% block js %}
<script type="text/javascript">
function del(id){
    //询问框
    layer.confirm('你真的要删除?', {icon: 3, title:'提示'}, function(index){
        //提交
        $.post('{{static_url('/admin/admin/del')}}',{id:id},function(res){

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

        layer.close(index);
    });

}   

</script>
{% endblock %}  