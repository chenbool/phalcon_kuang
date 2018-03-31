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
            <li><a href="<?= $this->url->getStatic('/admin/database/index') ?>">数据库管理</a></li> 
            <li><a href="<?= $this->url->getStatic('/admin/database/list') ?>">数据库备份</a></li>
        </ol>
    </div>
</div>

<!-- main -->
<div class="row">
                        <div class="col-md-12">
                            <section class="panel">

                                <header class="panel-heading">
                                    <a href="<?= $this->url->getStatic('/admin/database/list') ?>">
                                        <i class="fa fa-plus btn btn-default btn-sm btn-outline"></i> 
                                        <span>备份列表</span>
                                    </a>
                                </header>


                                <!-- list -->
                                <div class="panel-body padding">
                                    <div class="table-responsive">
                                     <!-- table-striped table-bordered -->
                                        <table class="table responsive  table-hover no-margin" data-sortable="" data-sortable-initialized="true">
                                            <thead>
                                                <tr class=" bg-warning">
                                                    <!-- <th style="text-align:center;">序号</th> -->
                                                    <th style="text-align:center;" >主键</th>
                                                    <th>数据库</th>
                                                    <th>表名</th>
                                                    <th>表类型</th>
                                                    <th>行格式</th>
                                                    <th>数据长度</th>
                                                    <th>最大数据长度</th>
                                                    <th>编码</th>
                                                    <th>引擎</th>
                                                    <th>版本</th>
                                                    <th>注释</th>
                                                    <th class="hidden-xs">更新时间</th>
                                                    <th class="hidden-xs">创建时间</th>
                                                    <th style="text-align:center;">操作</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {% for vo in list %}
                                                    <tr <?= ($vo->state == 1 ? ' class="bg-danger" ' : null) ?>>
                                                        <!-- <td style="text-align:center;"> # <?= $vo->id ?></td> -->
                                                        <td  style="text-align:center;"> <?= $vo['AUTO_INCREMENT'] ?> </td>
                                                        <td> <?= $vo['TABLE_SCHEMA'] ?> </td>
                                                        <td> <?= $vo['TABLE_NAME'] ?> </td>
                                                        <td> <?= $vo['TABLE_TYPE'] ?> </td>
                                                        <td> <?= $vo['ROW_FORMAT'] ?> </td>
                                                        <td> <?= $vo['DATA_LENGTH'] ?> 字节</td>
                                                        <td> <?= $vo['MAX_DATA_LENGTH'] / 1024 / 1024 / 1024 / 1024 ?> mb</td>
                                                        <td> <?= $vo['TABLE_COLLATION'] ?> </td>
                                                        <td> <?= $vo['ENGINE'] ?> </td>
                                                        <td> <?= $vo['VERSION'] ?> </td>
                                                        <td> <?= $vo['TABLE_COMMENT'] ?> </td>
                                                        <td class="hidden-xs"><?= $vo['UPDATE_TIME'] ?></td>
                                                        <td class="hidden-xs"><?= $vo['CREATE_TIME'] ?></td>
                                                        <td style="text-align:center;">                                                          
                                                            <!-- <a href="<?= $this->url->getStatic('/admin/admin/edit?id=') ?><?= $vo->id ?>" class="btn btn-xs btn-warning"> 编 辑 </a> &nbsp;&nbsp; -->
                                                        </td>
                                                    </tr>             
                                                {% endfor  %}

                                                <tr>
                                                    <td colspan="5" style="text-align:right;">
                                                        <label class="control-label" style="line-height:30px;">文件名</label>
                                                    </td>
                                                    <td  style="text-align:center;" colspan="4">   
                                                        <input type="text" name="" value="<?= date('Y-m-d_h_i_s', time()) ?>.sql" class="form-control" id="filename">
                                                    </td>
                                                    <td colspan="5" >                               
                                                        <input type="button" value=" 备 份 " class="btn btn-sm btn-warning" onclick="submit()">
                                                    </td>
                                                </tr>  


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
function submit(){

        var filename = $('#filename').val();

        var index = layer.load(1, {
          shade: [0.1,'#fff'] //0.1透明度的白色背景
        });

        //提交
        $.post('<?= $this->url->getStatic('/admin/database/back') ?>',{filename:filename},function(res){

            if( res.status > 0 ){
                layer.msg( res.info[0] );
            }else{
                //成功
                layer.close(index);
                layer.msg( res.info[0] )
                setTimeout(function(){
                    location.href = '<?= $this->url->getStatic('/admin/database/index') ?>';
                },1000);
            }
            
        },'json');    

}   
</script>
{% endblock %}  


 