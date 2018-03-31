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
	<!-- <h3 class="hidden-xs">产品列表</h3>  -->
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="{{static_url('/admin/product/index')}}">产品管理</a></li> 
			<li><a href="{{static_url('/admin/product/cate')}}">产品列表</a></li>
		</ol>
	</div>
</div>


<div class="row">
						<div class="col-md-12">
                            <section class="panel">

                                <header class="panel-heading">
                                    <a href="{{static_url('/admin/shop/add')}}">
                                        <i class="fa fa-plus btn btn-default btn-sm btn-outline"></i> 
                                        <span>产品列表</span>
                                    </a>
                                </header>


                                <div class="panel-body">

                                    <form class="form-horizontal bordered-group form" role="form" action="" method="get">

                                        <div class="form-group">
                                            
                                            <div class="col-sm-2 col-xs-10">
                                                <input type="text" class="form-control" placeholder="名称" name="name" value="{{this.request.get('name')}}">
                                            </div>

                                            <div class="col-sm-2 col-xs-10">
                                                <select class="form-control" name="pid">
                                                    <option value="0" > 全部 </option>     
                                                    {% for vo in menu %}    
                                                        <option value="{{vo.id}}" {% if vo.id == this.request.get('pid') %} selected="selected" {% endif %} > {{vo.name}} </option> 
                                                    {% endfor %}
                                                </select>
                                            </div>

                                            <div class="col-sm-2 col-xs-10">
                                                <select class="form-control" name="api">
                                                    <option value="0" > 全部 </option>     
                                                    {% for vo in apiList %}    
                                                        <option value="{{vo.type}}" {% if vo.type == this.request.get('api') %} selected="selected" {% endif %} > {{vo.name}} </option> 
                                                    {% endfor %}     
                                                </select>
                                            </div>

                                            <div class="col-sm-2 col-xs-10">
                                                <button type="submit" class="btn btn-primary btn-sm submit"> 查 找 </button> 
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
                                                    <th>产品名称</th>
                                                    <th>产品分类</th>
                                                    <th>接口</th>
                                                    <th>产品代码</th>
                                                    <th>亏盈比例</th>
                                                    <th>波动范围</th>
                                                    <th>时间间隔</th>
                                                    <th>状态</th>
                                                    
                                                    <th class="hidden-xs">创建时间</th>
                                                    <th style="text-align:center;">操作</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {% for vo in page.items %}
                                                    <tr {{ vo.state == 1 ? ' class="bg-danger" ' : null }}>
                                                        <td style="text-align:center;"> # {{vo.id}}</td>
                                                        <td> {{vo.name}} </td>
                                                        <td> {{vo.ProductCate.name}} </td>
                                                        <td> {{vo.api}} </td>
                                                        <td> {{vo.pcode}} </td>
                                                        <td> {{vo.income}}% </td>
                                                        <td> {{vo.rand}} ~ -{{vo.rand}} </td>
                                                        <td> {{vo.time_rule}} </td>
                                                        <td> [ {{ vo.state == 0 ? '正常' : '禁用' }} ]</td>
                                                        
                                                        <td class="hidden-xs">{{ date('Y-m-d H:i:s',vo.add_time)}}</td>
                                                        <td style="text-align:center;">
                                                            {% if vo.open == 1 %}
                                                                <a href="javascript:;" class="btn btn-xs btn-warning" onclick="openProduct({{vo.id}},0)"> 开 市 </a> &nbsp;&nbsp;
                                                            {% else %}
                                                                <a href="javascript:;" class="btn btn-xs btn-danger" onclick="openProduct({{vo.id}},1)"> 休 市 </a> &nbsp;&nbsp;
                                                            {% endif %}
                                                            

    														<a href="{{static_url('/admin/product/edit?id=')}}{{vo.id}}" class="btn btn-xs btn-warning"> 编 辑 </a> &nbsp;&nbsp;
    														<a href="javascript:;" class="btn btn-xs btn-danger" onclick="del({{vo.id}})"> 删 除 </a>
                                                        </td>
                                                    </tr>             
                                                {% endfor  %}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {# page #}
								<div class="text-center">
                                    <ul class="pagination pagination-sm">
                                        {#
                                        <li><a href="{{static_url('/admin/product/index?page=1')}}"> 首页  </a></li>
                                        #}
                                        <li><a href="{{static_url('/admin/product/index?page=')}}{{page.before}}"> «  </a></li>
                                        
                                        <?php for($i=1;$i<=$page->total_pages;$i++):?>
                                            <li {% if i == page.current %} class="active" {% endif %} >
                                                <a href="{{static_url('/admin/product/index?page=')}}<?= $i; ?>" >
                                                    <?= $i; ?> 
                                                </a>
                                            </li>
                                        <?php endfor;?>

                                        <li><a href="{{static_url('/admin/product/index?page=')}}{{page.next}}"> » </a></li>
                                        {#
                                        <li><a href="{{static_url('/admin/product/index?page=')}}{{page.last}}"> 尾页 </a></li>
                                        #}
                                    {#
                                        <li><a href="javascript:;">{{page.current}}</a></li>
                                        <li><a href="javascript:;">{{page.last}}</a></li>
                                        <li><a href="javascript:;">{{page.total_pages}}</a></li>
                                    #}
 
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
        $.post('{{static_url('/admin/product/del')}}',{id:id},function(res){

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

        layer.close(index);
    });

}   

//开市
function openProduct(id,state){
    
    $.post('{{static_url('/admin/product/open')}}',{id:id,state:state},function(res){

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
}

</script>
{% endblock %}  