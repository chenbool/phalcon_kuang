{% extends "layouts/_base.volt" %}

{% block title %} 应用商店 {% endblock %}

{% block head %}
    <style type="text/css">
    </style>
{% endblock %}

{# main content #}
{% block content %}

<link rel="stylesheet" href="{{static_url('/admin/css/modern.min.css')}}">

<div class="page-title">
	<h3 class="hidden-xs">应用商店</h3> 
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="{{static_url('/admin/store/index')}}">应用商店</a></li> 
			<li><a href="{{static_url('/admin/store/index')}}">应用列表</a></li>
		</ol>
	</div>
</div>


<div class="row">
						<div class="col-md-12">
                            <section class="panel">
                            
                                <header class="panel-heading">
                                    <a href="{{static_url('/admin/product/add')}}">
                                        <span>应用列表</span>
                                    </a>
                                </header>

                                <div class="panel-body">

                                    <form class="form-horizontal bordered-group form" role="form" action="" method="get">

                                        <div class="form-group">
                                            
                                            <div class="col-sm-2 col-xs-10">
                                                <input type="text" class="form-control" placeholder="名称" name="name">
                                            </div>
                                            
                                            <div class="col-sm-2 col-xs-10">
                                                <select class="form-control" name="pid">
                                                    <option value="0" > 全部 </option>     
                                                    <option value="0" > 数据接口 </option>        
                                                </select>
                                            </div>
                                            <div class="col-sm-2 col-xs-10">
                                                <button type="button" class="btn btn-primary btn-sm submit"> 查 找 </button> 
                                            </div>
                                        </div>
                                                        

                                    </form>

                                </div>                                

                                <div class="panel-body padding">
                                    <div class="table-responsive">
                                     <!-- table-striped table-bordered -->
                                        <table class="table responsive  table-hover no-margin" data-sortable="" data-sortable-initialized="true">
                                            <thead>
                                                <tr class=" bg-warning">
                                                    <th style="text-align:center;">序号</th>
                                                    <th>应用名称</th>
                                                    <th>应用分类</th>
                                                    <th>状态</th>
                                                    <th>版本</th>
                                                    <th class="hidden-xs">描述</th>
                                                    <th class="hidden-xs">创建时间</th>
                                                    <th style="text-align:center;">操作</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td style="text-align:center;"> # 1 </td>
                                                        <td> 新浪接口 </td>
                                                        <td> 数据接口 </td>
                                                        <td> [ 正常  ]</td>
                                                        <td> 1.0 </td>
                                                        <td class="hidden-xs"> 描述</td>
                                                        <td class="hidden-xs">{{ date('Y-m-d H:i:s',time() )}}</td>
                                                        <td style="text-align:center;">
                                                            <a href="javascript:;" class="btn btn-xs btn-danger" onclick="del({{vo.id}})"> 卸 载 </a>
                                                        </td>
                                                    </tr>             
                                                    <tr>
                                                        <td style="text-align:center;"> # 2 </td>
                                                        <td> 雅虎接口 </td>
                                                        <td> 数据接口 </td>
                                                        <td> [ 测试  ]</td>
                                                        <td> 1.0 </td>
                                                        <td class="hidden-xs"> 描述</td>
                                                        <td class="hidden-xs">{{ date('Y-m-d H:i:s',time() )}}</td>
                                                        <td style="text-align:center;">
    														<a href="{{static_url('/admin/product/cateedit&id=')}}{{vo.id}}" class="btn btn-xs btn-warning"> 安 装 </a> 
    														{# 
                                                            <a href="javascript:;" class="btn btn-xs btn-danger" onclick="del({{vo.id}})"> 卸 载 </a>
                                                            #}
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td style="text-align:center;"> # 3 </td>
                                                        <td> 比特币中国 </td>
                                                        <td> 数据接口 </td>
                                                        <td> [ 测试  ]</td>
                                                        <td> 0.1 </td>
                                                        <td class="hidden-xs"> 比特币中国</td>
                                                        <td class="hidden-xs">{{ date('Y-m-d H:i:s',time() )}}</td>
                                                        <td style="text-align:center;">
                                                            <a href="javascript:;" class="btn btn-xs btn-danger" onclick="del({{vo.id}})"> 卸 载 </a>
                                                        </td>
                                                    </tr> 

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                
								<div class="text-center">
                                    <ul class="pagination pagination-sm">
                                        <li>
                                            <a href="javascript:;">«</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">1</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">»</a>
                                        </li>
                                    </ul>
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
        //do something
        $.post('{{static_url('/admin/product/catedel')}}',{id:id},function(res){

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

        layer.close(index);
    });

  
}      
</script>
{% endblock %}  