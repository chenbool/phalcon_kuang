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