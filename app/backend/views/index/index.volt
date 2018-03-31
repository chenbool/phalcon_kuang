{% extends "layouts/_base.volt" %}

{% block title %} 首页 {% endblock %}

{% block head %}
    <style type="text/css">
    </style>
{% endblock %}


{# main content #}
{% block content %}

<div class="page-title">
	<h3 class="hidden-xs">首页</h3> 
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="{{static_url('/admin/index/index')}}">首页</a></li> 
			<li><a href="{{static_url('/admin/index/index')}}">简介</a></li>
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
                                        <header class="panel-heading" style="text-align:center;">系统简介</header>
                
                                        <div class="panel-body">
                
                
                
                                                <div class="col-md-5 col-sm-5 col-xs-12 table-bordered" style="height:150px;margin-right:10px;margin-bottom:10px;">
                                                    <section class="panel position-relative">
                                                        <div class="ribbon ribbon-danger">
                                                            <div class="banner">
                                                                <div class="text">CPU状态</div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            
                                                            <small>
                                                                CPU状态<i class="fa fa-circle text-primary mg-r-xs"></i>
                                                            </small>
                                                            <p class="mg-xs">
                                                                <span>类型：amd</span>  <span>核心：4核</span> <br>
                                                                <span>类型：amd</span> <br>
                                                                <span>类型：amd</span>
                
                                                            </p>
                                                        </div>
                                                    </section>
                                                </div>
                
                
                                                <div class="col-md-6 col-sm-6 col-xs-12 table-bordered" style="height:150px;">
                                                    <section class="panel position-relative">
                                                        <div class="ribbon ribbon-info">
                                                            <div class="banner">
                                                                <div class="text">内存状态</div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            
                                                            <small>
                                                                内存状态<i class="fa fa-circle text-primary mg-r-xs"></i>
                                                            </small>
                                                            <p class="mg-xs">
                
                                                                <div class="pd-t-sm">
                                                                    <small class="text-muted"> {{sys_linux['memTotal'] }} GB / {{sys_linux['memRealUsed']*1024}} MB </small>
                                                                    <span class="pull-right" style="margin-right:5%;"> {{sys_linux['memRate']}}% </span>
                                                                </div>
                                                                <div class="progress progress-md no-margin" style="width:95%;">
                                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                                    </div>
                                                                </div>
                
                                                            </p>
                                                        </div>
                                                    </section>
                                                </div>
                
                
                
                                        </div>
                                        <!-- ****************************************************************** -->
            
                
                                        <table class="table no-margin table-bordered table-striped col-md-6"  >
                                            <thead>
                                                <tr>
                                                    <th class="col-md-2" colspan="2"><span class="pd-l-sm"></span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td  class="col-md-2">域名</td>
                                                    <td> <?= $_SERVER['HTTP_HOST'] ?> </td>
                                                </tr>                                
                                                <tr>
                                                    <td  class="col-md-2">IP地址</td>
                                                    <td> <?= $_SERVER['REMOTE_ADDR'] ?> </td>
                                                </tr>                                
                                                <tr>
                                                    <td  class="col-md-2">端口</td>
                                                    <td> <?= $_SERVER['SERVER_PORT'] ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>php</td>
                                                    <td> <?= PHP_VERSION ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>操作系统</td>
                                                    <td> <?= PHP_OS ?> | <?= $_SERVER['OS'] ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>服务器</td>
                                                    <td> <?= $_SERVER['SERVER_SOFTWARE'] ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>网关接口</td>
                                                    <td> <?= $_SERVER['GATEWAY_INTERFACE'] ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>服务器时间</td>
                                                    <td> <?= date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']) ?> </td>
                                                </tr>                                
                                                <tr>
                                                    <td>系统所在文件夹</td>
                                                    <td> <?= $_SERVER['DOCUMENT_ROOT'] ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>入口所在文件夹</td>
                                                    <td> <?= $_SERVER['SCRIPT_FILENAME'] ?> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                
                
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
       
</script>
{% endblock %}  