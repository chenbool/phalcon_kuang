{% extends "layouts/_base.volt" %}

{% block title %} 产品分类 {% endblock %}

{% block head %}
    <style type="text/css">
    </style>
{% endblock %}

{# main content #}
{% block content %}

<link rel="stylesheet" href="{{static_url('/admin/css/modern.min.css')}}">

<div class="page-title">
	<!-- <h3 class="hidden-xs">产品分类</h3>  -->
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="{{static_url('/admin/product/index')}}">产品管理</a></li> 
			<li><a href="{{static_url('/admin/product/cate')}}">产品分类</a></li>
		</ol>
	</div>
</div>


<div class="row">
						<div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">

                                    <a href="{{static_url('/admin/product/cateadd')}}">
                                        <i class="fa fa-plus btn btn-default btn-sm btn-outline"></i> 
                                        <span>添加分类</span>
                                    </a>
                                	
                                    {#
									<!-- Component -->
									<script src="{{static_url('/admin/js/tableexporter.js')}}"></script>
                                    <script>
                                    function exportTo(type) {

                                        $('.table').tableExport({
                                            filename: 'menu_%YY%-%MM%-%DD%_%hh%_%mm%_%ss%',
                                            format: type,
                                            cols: '2,3,4,5'
                                        });
                                    }
                                    </script>

				                    <div class="pull-right hidden-xs">
					                    <button type="button" class="btn btn-default btn-xs btn-outline">
					                    	打印
	                                        <i class="fa fa-print mg-l-xs"></i>
	                                    </button>

								      <div class="btn-group mg-r-md">
								        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
								        	导出 <span class="caret"></span>
								        </button>
								        <ul class="dropdown-menu col-lg-1" role="menu">
								          <li><a onclick="exportTo('csv');" href="javascript://">CSV</a></li>
								          <li><a onclick="exportTo('txt');" href="javascript://">TXT</a></li>
								          <li><a onclick="exportTo('xls');" href="javascript://">XLS</a></li>
								          <li><a onclick="exportTo('sql');" href="javascript://">SQL</a></li>
								        </ul>
								      </div>
				                    </div>
                                    #}
                                </header>

                                <div class="panel-body padding">
                                    <div class="table-responsive">
                                     <!-- table-striped table-bordered -->
                                        <table class="table responsive  table-hover no-margin" data-sortable="" data-sortable-initialized="true">
                                            <thead>
                                                <tr class=" bg-warning">
                                                    <th style="text-align:center;">序号</th>
                                                    <th>分类名称</th>
                                                    <th>状态</th>
                                                    <th class="hidden-xs">描述</th>
                                                    <th class="hidden-xs">创建时间</th>
                                                    <th style="text-align:center;">操作</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {% for vo in list %}
                                                    <tr {{ vo.state == 1 ? ' class="bg-danger" ' : null }}>
                                                        <td style="text-align:center;"> # {{vo.id}}</td>
                                                        <td> {{vo.name}} </td>
                                                        <td> [ {{ vo.state == 0 ? '正常' : '禁用' }} ]</td>
                                                        <td class="hidden-xs"> {{vo.desc}}</td>
                                                        <td class="hidden-xs">{{ date('Y-m-d H:i:s',vo.add_time)}}</td>
                                                        <td style="text-align:center;">
    														<a href="{{static_url('/admin/product/cateedit?id=')}}{{vo.id}}" class="btn btn-xs btn-warning"> 编 辑 </a> &nbsp;&nbsp;
    														<a href="javascript:;" class="btn btn-xs btn-danger" onclick="del({{vo.id}})"> 删 除 </a>
                                                        </td>
                                                    </tr>             
                                                {% endfor  %}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

<!--                                 
								<div class="text-center">
                                    <ul class="pagination pagination-sm">
                                        <li>
                                            <a href="javascript:;">«</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">1</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">2</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">3</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">»</a>
                                        </li>
                                    </ul>
                                </div> 
-->


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