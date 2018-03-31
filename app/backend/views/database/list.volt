{% extends "layouts/_base.volt" %}

{% block title %} 数据库管理 {% endblock %}

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
			<li><a href="{{static_url('/admin/database/index')}}">数据库管理</a></li> 
			<li><a href="{{static_url('/admin/database/list')}}">备份列表</a></li>
		</ol>
	</div>
</div>

<!-- main -->
<div class="row">
						<div class="col-md-12">
                            <section class="panel">

                                <header class="panel-heading">
                                    <a href="{{static_url('/admin/database/index')}}">
                                        <i class="fa fa-plus btn btn-default btn-sm btn-outline"></i> 
                                        <span>数据库信息</span>
                                    </a>
                                </header>


                                <!-- list -->
                                <div class="panel-body padding">
                                    <div class="table-responsive">
                                     <!-- table-striped table-bordered -->
                                        <table class="table responsive  table-hover no-margin" data-sortable="" data-sortable-initialized="true">
                                            <thead>
                                                <tr class=" bg-warning">
                                                    <th style="text-align:center;">序号</th>
                                                    <th> 文件名 </th>
                                                    <th> 目录 </th>
                                                    <th> 大小 </th>
                                                    <th> 可读 </th>
                                                    <th> 可写 </th>
                                                    <th> 执行 </th>
                                                    <th class="hidden-xs">创建时间</th>
                                                    <th style="text-align:center;">操作</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {% for vo in list %}
                                                    <tr {{ vo.state == 1 ? ' class="bg-danger" ' : null }}>
                                                        <td style="text-align:center;"> # </td>
                                                        <td> {{vo}} </td>
                                                        <td> <?= ROOT_PATH . "/app/backup/".$vo ?></td>
                                                        <td> <?= transByte( filesize(ROOT_PATH . "/app/backup/".$vo) ) ?></td>
                                                        <td> <?= is_readable(ROOT_PATH."/app/backup/".$vo) ?'√':'×' ?></td>
                                                        <td> <?= is_writeable(ROOT_PATH."/app/backup/".$vo) ?'√':'×' ?></td>
                                                        <td> <?= is_executable(ROOT_PATH."/app/backup/".$vo) ?'√':'×' ?></td>
                                                        <td class="hidden-xs"><?= date('Y-m-d H:i:s',filectime(ROOT_PATH."/app/backup/".$vo) ) ?></td>
                                                        <td style="text-align:center;">                                                          
                                                            <a href="{{static_url('/admin/database/down?file=')}}{{vo}}" class="btn btn-xs btn-warning"> 下载 </a> &nbsp;&nbsp;
    														<a href="javascript:;" class="btn btn-xs btn-danger"  onclick="del('{{vo}}')"> 删 除 </a> 
                                                            <!-- {{static_url('/admin/database/rm?file=')}}{{vo}} -->
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
function del(file){
    //询问框
    layer.confirm('你真的要删除?', {icon: 3, title:'提示'}, function(index){
        //do something
        $.post('{{static_url('/admin/database/rmfile')}}',{file:file},function(res){

            if( res.status > 0 ){
                layer.msg( res.info[0] );
            }else{
                //成功
                layer.msg( res.info[0] )
                setTimeout(function(){
                    location.href = '{{static_url('/admin/database/list')}}';
                },1000);
            }
            
        },'json');    

        layer.close(index);
    });

}     


</script>
{% endblock %}  