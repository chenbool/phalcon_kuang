

<!doctype html>
<html class="no-js" lang="en">
<head>

    <meta charset="utf-8">
    <meta name="description" content="布尔管理系统,布尔系统">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

    <title> 布尔管理系统 |  应用商店  </title>

    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/theme.css') ?>">
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/theme_1.css') ?>">
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/panel.css') ?>">
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/palette.1.css') ?>" id="skin">
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/style.1.css') ?>" id="font">
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/main.css') ?>">

    <!--[if lt IE 9]>
        <script src="<?= $this->url->getStatic('/admin/js/html5shiv.js') ?> "></script>
        <script src="<?= $this->url->getStatic('/admin/js/respond.min.js') ?> "></script>
    <![endif]-->

    <script src="<?= $this->url->getStatic('/admin/js/modernizr.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/admin/js/jquery-1.11.1.min.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/admin/js/bootstrap.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/layer/layer.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/admin/js/modernizr.js') ?>"></script>
    
    <link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/modern.min.css') ?>"> 
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
                    <a href="<?= $this->url->getStatic('/index/index') ?>" target="_blank"> 前台首页 </a>
                </li>

                <li class="hidden-xs">
                    <a href="javascript:;">+ <?= $admin_name ?> </a>
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
                                            <img src="<?= $this->url->getStatic('/admin/picture/face4.jpg') ?>" class="avatar avatar-sm img-circle" alt="">
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
                        <img src="<?= $this->url->getStatic('/admin/picture/avatar.jpg') ?>" class="avatar pull-left img-circle" alt="user" title="user">
                        <i class="caret mg-l-xs hidden-xs no-margin"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right mg-r-xs">
                        <li>
                            <a href="javascript:;">
                                <div class="pd-t-sm">
                                    <?= $admin_name ?> 
                                    <br>
                                    <small class="text-muted"> <?= $sys_linux['memTotal'] ?> GB / <?= $sys_linux['memRealUsed'] * 1024 ?> MB </small> <span class="pull-right"> <?= $sys_linux['memRate'] ?>%</span> 
                                </div>
                                <div class="progress progress-xs no-radius no-margin mg-b-sm">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $sys_linux['memRate'] ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $sys_linux['memRate'] ?>%">
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li> <a href="profile.html">设置</a> </li>
                        
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
                            <a href="<?= $this->url->getStatic('/admin/login/quit') ?>">退出</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>

        <!-- layout -->
        <section class="layout">
            
            <!-- 引入菜单 -->
                        <aside class="sidebar canvas-left">

                <nav class="main-navigation">
                    <ul>
                    
                    <!-- list -->
                    <?php foreach ($menu_list['father'] as $vo) { ?>

                        <li class="dropdown show-on-hover <?= $vo->pclass ?> <?php if ($vo->controller == $controller) { ?>active<?php } ?> " >

                            <?php if (empty($vo->controller)) { ?>

                                <a href="javascript:;" data-toggle="dropdown">
                                    <i class="fa <?= $vo->ico ?>"></i>
                                    <span><?= $vo->name ?></span>
                                </a>
                                <ul class="dropdown-menu">

                                    <?php foreach ($menu_list['child'] as $vv) { ?>    
                                        <?php if ($vv->pid == $vo->id) { ?>
                                            <li 
                                                <?= $this->request->getUri() == '/admin/'.$vv->controller.'/'.$vv->action ? 'class="active" ' : null; ?>
                                            >
                                                <a href="/admin/<?= $vv->controller ?>/<?= $vv->action ?>">
                                                    <span><?= $vv->name ?></span>
                                                </a>
                                            </li>
                                        <?php } ?>   
                                    <?php } ?>

                                </ul>
                            <?php } else { ?>

                                <a href="/admin/<?= $vo->controller ?>/<?= $vo->action ?>" >
                                    <i class="fa <?= $vo->ico ?>"></i>
                                    <span><?= $vo->name ?></span>
                                </a>

                            <?php } ?>

                        </li> 
                    <?php } ?>


                    </ul>
                </nav>


                <footer>
                    <div class="about-app pd-md animated pulse">
                        <a href="javascript:;">
                            <img src="<?= $this->url->getStatic('/admin/picture/about.png') ?>" alt="">
                        </a>
                        <span>
                            <b>bool</b>&#32; 布尔制作 <br>
                            <a href="javascript:;">
                                <b>了解详情</b>
                            </a>
                        </span>
                    </div>
                    <div class="footer-toolbar pull-left">
                        <a href="javascript:;" class="pull-left help">
                            <i class="fa fa-question-circle"></i>
                        </a>
                        <a href="javascript:;" class="toggle-sidebar pull-right hidden-xs">
                            <i class="fa fa-angle-left"></i>
                        </a>
                    </div>
                </footer>

            </aside>
<script>
    //展开父级菜单
    $(".<?= $controller ?>").addClass('active');
    var menu =$('.dropdown-menu .active').parents('.dropdown ');
    menu.addClass('active');
    // menu.addClass('active open');
</script>

            <!-- 主体内容 -->
            <section class="main-content">
                <div class="content-wrap">  
                    

<link rel="stylesheet" href="<?= $this->url->getStatic('/admin/css/modern.min.css') ?>">

<div class="page-title">
	<h3 class="hidden-xs">应用商店</h3> 
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="<?= $this->url->getStatic('/admin/store/index') ?>">应用商店</a></li> 
			<li><a href="<?= $this->url->getStatic('/admin/store/index') ?>">应用列表</a></li>
		</ol>
	</div>
</div>


<div class="row">
						<div class="col-md-12">
                            <section class="panel">
                            
                                <header class="panel-heading">
                                    <a href="<?= $this->url->getStatic('/admin/product/add') ?>">
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
                                                        <td class="hidden-xs"><?= date('Y-m-d H:i:s', time()) ?></td>
                                                        <td style="text-align:center;">
                                                            <a href="javascript:;" class="btn btn-xs btn-danger" onclick="del(<?= $vo->id ?>)"> 卸 载 </a>
                                                        </td>
                                                    </tr>             
                                                    <tr>
                                                        <td style="text-align:center;"> # 2 </td>
                                                        <td> 雅虎接口 </td>
                                                        <td> 数据接口 </td>
                                                        <td> [ 测试  ]</td>
                                                        <td> 1.0 </td>
                                                        <td class="hidden-xs"> 描述</td>
                                                        <td class="hidden-xs"><?= date('Y-m-d H:i:s', time()) ?></td>
                                                        <td style="text-align:center;">
    														<a href="<?= $this->url->getStatic('/admin/product/cateedit&id=') ?><?= $vo->id ?>" class="btn btn-xs btn-warning"> 安 装 </a> 
    														
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td style="text-align:center;"> # 3 </td>
                                                        <td> 比特币中国 </td>
                                                        <td> 数据接口 </td>
                                                        <td> [ 测试  ]</td>
                                                        <td> 0.1 </td>
                                                        <td class="hidden-xs"> 比特币中国</td>
                                                        <td class="hidden-xs"><?= date('Y-m-d H:i:s', time()) ?></td>
                                                        <td style="text-align:center;">
                                                            <a href="javascript:;" class="btn btn-xs btn-danger" onclick="del(<?= $vo->id ?>)"> 卸 载 </a>
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


 
                </div>
            </section>

        </section>
        <!-- layout -->

    </div>

    <script src="<?= $this->url->getStatic('/admin/js/jquery.easing.min.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/admin/js/jquery.placeholder.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/admin/js/fastclick.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/admin/js/offline.min.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/admin/js/pace.min.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/admin/js/off-canvas.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/admin/js/main.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/admin/js/panel.js') ?>"></script>

</body>
</html>

<script type="text/javascript">
function del(id){
    //询问框
    layer.confirm('你真的要删除?', {icon: 3, title:'提示'}, function(index){
        //do something
        $.post('<?= $this->url->getStatic('/admin/product/catedel') ?>',{id:id},function(res){

            if( res.status > 0 ){
                layer.msg( res.info[0] );
            }else{
                //成功
                layer.msg( res.info[0] )
                setTimeout(function(){
                    location.href = '<?= $this->url->getStatic('/admin/product/cate') ?>';
                },1500);
            }
            
        },'json');    

        layer.close(index);
    });

  
}      
</script>
 