{# templates/_base.volt #}

<!doctype html>
<html class="no-js" lang="en">
<head>

    <meta charset="utf-8">
    <meta name="description" content="布尔管理系统,布尔系统">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

    <title> 布尔管理系统 | {% block title %}{% endblock %} </title>

    <link rel="stylesheet" href="{{static_url('/admin/css/theme.css')}}">
    <link rel="stylesheet" href="{{static_url('/admin/css/theme_1.css')}}">
    <link rel="stylesheet" href="{{static_url('/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{static_url('/admin/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{static_url('/admin/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{static_url('/admin/css/panel.css')}}">
    <link rel="stylesheet" href="{{static_url('/admin/css/palette.1.css')}}" id="skin">
    <link rel="stylesheet" href="{{static_url('/admin/css/style.1.css')}}" id="font">
    <link rel="stylesheet" href="{{static_url('/admin/css/main.css')}}">

    <!--[if lt IE 9]>
        <script src="{{static_url('/admin/js/html5shiv.js')}} "></script>
        <script src="{{static_url('/admin/js/respond.min.js')}} "></script>
    <![endif]-->

    <script src="{{static_url('/admin/js/modernizr.js')}}"></script>
    <script src="{{static_url('/admin/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{static_url('/admin/js/bootstrap.js')}}"></script>
    <script src="{{static_url('/layer/layer.js')}}"></script>
    <script src="{{static_url('/admin/js/modernizr.js')}}"></script>
    
    <link rel="stylesheet" href="{{static_url('/admin/css/modern.min.css')}}"> 
    {% block head %}{% endblock %}
</head>
<body>
    <div class="app">

        <header class="header header-fixed navbar">
            <div class="brand">
                <a href="javascript:;" class="fa fa-bars off-left visible-xs" data-toggle="off-canvas" data-move="ltr"></a>
                <a href="index.html" class="navbar-brand text-white">
                    <i class="fa fa-stop mg-r-sm"></i>
                    <span class="heading-font">
                    布尔<b>管理系统</b>
                    </span>
                </a>
            </div>

            <form class="navbar-form navbar-left hidden-xs" role="search">
                <div class="form-group">
                    <button class="btn no-border no-margin bg-none no-pd-l" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                    <input type="text" class="form-control no-border no-padding search" placeholder="搜索">
                </div>
            </form>


            <ul class="nav navbar-nav navbar-right off-right">

                <li class="hidden-xs">
                    <a href="{{static_url('/index/index')}}" target="_blank"> 前台首页 </a>
                </li>

                <li class="hidden-xs">
                    <a href="javascript:;">+ {{admin_name}} </a>
                </li>
                <li class="notifications dropdown hidden-xs">
                    <a href="javascript:;" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <div class="badge badge-top bg-danger animated flash">3</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated slideInRight">
                        <div class="panel bg-white no-border no-margin">
                            <div class="panel-heading no-radius">
                                <small>
                                <b>通知</b>
                                </small>
                                <small class="pull-right">
                                    <a href="javascript:;" class="mg-r-xs">标记为已读</a>&#8226;
                                    <a href="javascript:;" class="fa fa-cog mg-l-xs"></a>
                                </small>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="javascript:;">
                                        <span class="pull-left mg-t-xs mg-r-md">
                                            <img src="{{static_url('/admin/picture/face4.jpg')}}" class="avatar avatar-sm img-circle" alt="">
                                        </span>
                                        <div class="m-body show pd-t-xs">
                                            <span>布尔</span>
                                            <span>给你发送了一条消息</span> <br>
                                            <small>2 分钟前</small>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="javascript:;">
                                        <span class="pull-left mg-t-xs mg-r-md">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa fa-circle fa-stack-2x text-warning"></i>
                                                <i class="fa fa-download fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </span>
                                        <div class="m-body show pd-t-xs">
                                            <span>145 MB 正在下载.</span>
                                            <div class="progress progress-xs mg-t-xs mg-b-xs">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                </div>
                                            </div>
                                            <small>大约23分钟</small>
                                        </div>
                                    </a>
                                </li>
<!-- 
                                <li class="list-group-item">
                                    <a href="javascript:;">
                                        <span class="pull-left mg-t-xs mg-r-md">
                                            <img src="__PUBLIC__/Admin/picture/face3.jpg" class="avatar avatar-sm img-circle" alt="">
                                        </span>
                                        <div class="m-body show pd-t-xs">
                                            <span>应用</span>
                                            <span>Where is my workspace widget</span>  <br>
                                            <small>5天前</small>
                                        </div>
                                    </a>
                                </li>
-->
                            </ul>
                            <div class="panel-footer no-border">
                                <a href="javascript:;">查看所有通知</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="quickmenu mg-r-sm" >
                    <a href="javascript:;" data-toggle="dropdown">
                        <img src="{{static_url('/admin/picture/avatar.jpg')}}" class="avatar pull-left img-circle" alt="user" title="user">
                        <i class="caret mg-l-xs hidden-xs no-margin"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right mg-r-xs">
                        <li>
                            <a href="javascript:;">
                                <div class="pd-t-sm">
                                    {{admin_name}} 
                                    <br>
                                    <small class="text-muted"> {{sys_linux['memTotal'] }} GB / {{sys_linux['memRealUsed']*1024}} MB </small> <span class="pull-right"> {{sys_linux['memRate']}}% </span> 
                                </div>
                                <div class="progress progress-xs no-radius no-margin mg-b-sm">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{sys_linux['memRate']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{sys_linux['memRate']}}%">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li> <a href="profile.html">设置</a> </li>
                        {#<li> <a href="javascript:;">更新</a> </li>#}
                        <li>
                            <a href="javascript:;">通知
                                <div class="badge bg-danger pull-right">3</div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">帮助 ?</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{static_url('/admin/login/quit')}}">退出</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>

        <!-- layout -->
        <section class="layout">
            
            <!-- 引入菜单 -->
            {% include "layouts/_menu.volt" %}

            <!-- 主体内容 -->
            <section class="main-content">
                <div class="content-wrap">  
                    {% block content %}
                    {% endblock %} 
                </div>
            </section>

        </section>
        <!-- layout -->

    </div>

    <script src="{{static_url('/admin/js/jquery.easing.min.js')}}"></script>
    <script src="{{static_url('/admin/js/jquery.placeholder.js')}}"></script>
    <script src="{{static_url('/admin/js/fastclick.js')}}"></script>
    <script src="{{static_url('/admin/js/offline.min.js')}}"></script>
    <script src="{{static_url('/admin/js/pace.min.js')}}"></script>
    <script src="{{static_url('/admin/js/off-canvas.js')}}"></script>
    <script src="{{static_url('/admin/js/main.js')}}"></script>
    <script src="{{static_url('/admin/js/panel.js')}}"></script>

</body>
</html>
{% block js %}
{% endblock %} 