{% extends "layouts/_base.volt" %}

{% block title %} 首页 {% endblock %}

{% block head %}
    <style type="text/css">
    </style>
{% endblock %}


{# main content #}
{% block content %}

<div class="page-title">
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="{{static_url('/admin/index/index')}}">首页</a></li> 
			<li><a href="{{static_url('/admin/ui/index')}}"> 界面设计 </a></li>
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
                                        <header class="panel-heading" style="text-align:center;">界面模板</header>
                                        <div class="panel-body">
                
                
                
                
                                            {% for vo in list %}
                                                <div class="col-sm-2 table-bordered no-padding mg-r-lg mg-b-sm">
                                                    <section class="panel no-border profile-panel overflow-hidden no-margin no-padding">
                                                        <div class="panel-body bg-warning no-padding 
                                                        {% if vo['checked'] == 0 %} 
                                                            bg-warning
                                                        {% else %}
                                                            bg-danger
                                                        {% endif %} ">

                                                            <div class="mg-b-sm text-center text-white" style="padding:5px;">
                                                                <div class="mg-b-sm">
                                                                    <img src="<?= getHost().'/static/'.$vo['dirName'].'/logo.png' ?>" 
                                                                    class="avatar" alt="logo" title="logo"
                                                                    width="150" height="255"
                                                                    >
                                                                </div>
                                                                <h6 class="no-margin">
                                                                   <strong> <?= $vo['body']['name'] ?> </strong>
                                                                </h6>
                                                                <small>@ <?= $vo['body']['author'] ?> </small>
                                                            </div>
                                                        </div>

                                                        <div class="panel-footer bg-white no-border text-center">
                                                        
                                                        {% if vo['checked'] == 0 %} 
                                                            <button type="button" class="btn btn-primary btn-sm mg-r-lg" onclick="install('<?= $vo['dirName'] ?>')"> 安 装 </button> 
                                                        {% else %}
                                                            <button type="button" class="btn btn-primary btn-sm mg-r-lg" disabled="disabled"> 已 安 装 </button> 
                                                        {% endif %}
                                                            
                                                            <button type="button" class="btn btn-danger btn-sm"> 卸 载 </button>
                                                    </section>
                                                </div>
                                            {% endfor  %}    
                
                                        </div>
                                      </section>
                                    </div>
                                  </div>
                
                                </section>
                
                
                              </div>
                
                
                            </div>
                
                            <!-- end main -->

<!-- main -->

{% endblock %}


{# js content #}
{% block js %}
<script type="text/javascript">
function install(name){

    var index = layer.load(1, {
      shade: [0.1,'#fff'] //0.1透明度的白色背景
    });

    $.post('{{static_url('/admin/ui/install')}}',{name:name},function(res){

        if( res.status > 0 ){
            layer.msg( res.info[0] );
        }else{
            //成功
            layer.close(index);
            
            layer.msg( res.info[0] )
            setTimeout(function(){
                location.href = '{{static_url('/admin/ui/index')}}';
            },1500);
        }
        
    },'json');    
}     
</script>
{% endblock %}  