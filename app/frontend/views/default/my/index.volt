{% extends "layouts/_common.volt" %}

{% block title %} 我的矿机 {% endblock %}

{% block head %}
    <style>
        body{
            background:#EEEFF3;
        }
        table{
            width:100%;
            background:#fff;
        }
        table th,table td{
            height:30px;
        }
        table td{
            font-size:10px;
            text-align:center;
        }
    </style> 
{% endblock %}


{% block content %}
	<!-- header -->
    <header data-blend-widget="header" class="blend-header">
        <span class="blend-header-left"></span>
        <span class="blend-header-title"> 我的矿机 </span>
        <span class="blend-header-right">
            <!-- <a class="blend-header-item blend-action-back-icon" href="#"></a> -->
        </span>
    </header>

    <div class="main">
        <section class="blend-tab blend-tab-animation">
            <div class="blend-tab-header">
                <div class="blend-tab-header-item">运行中的矿机</div>
                <div class="blend-tab-header-item blend-tab-header-item-active">已停止的矿机</div>
                <div class="blend-tab-header-active" style="width: 207px; transform: translateX(207px);"></div>
            </div>
            <div class="blend-tab-content">
                <div class="blend-tab-content-item" style="display:none;">
                    <!-- 运行中的矿机 -->
                    <table  style="margin-top:5px;">
                        <tr>
                            <th>矿机名称</th>
                            <th>矿机编号</th>
                            <th>运行时间</th>
                            <th>收入(GEC)</th>
                            <th>状态</th>
                        </tr>
                        <tr style="background:#fff;">
                            <td>基础云矿机</td>
                            <td>B2014729</td>
                            <td>10H</td>
                            <td>0.004</td>
                            <td>正在运行</td>
                        </tr>
                        <tr style="background:#fff;">
                            <td>基础云矿机</td>
                            <td>B2014729</td>
                            <td>10H</td>
                            <td>0.004</td>
                            <td>正在运行</td>
                        </tr>
                    </table>
                </div>
                <div class="blend-tab-content-item" style="display: block;">
                    <!-- 已停止的矿机 -->
                    <table  style="margin-top:5px;">
                        <tr>
                            <th>矿机名称</th>
                            <th>矿机编号</th>
                            <th>运行时间</th>
                            <th>收入(GEC)</th>
                            <th>状态</th>
                        </tr>
                        <tr style="background:#fff;">
                            <td>基础云矿机</td>
                            <td>B2014729</td>
                            <td>10H</td>
                            <td>0.004</td>
                            <td>正在运行</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </div>
 
{% endblock %}


{% block js %}
<script>
    zepto('.blend-tab').tab();
    zepto('#active').click(function() {
        zepto('.blend-tab').tab('active', 1);
    });
    zepto('#destroy').click(function() {
        zepto('.blend-tab').tab('destroy');
    });
    zepto('#create').click(function() {
        zepto('.blend-tab').tab();
    });
</script>

{% endblock %}  
