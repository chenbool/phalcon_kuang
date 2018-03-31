{% extends "layouts/_common.volt" %}

{% block title %} 矿机商城 {% endblock %}

{% block head %}
    {#<script type="text/javascript" src="{{static_url('/index/js/lodash.min.js')}}"></script> #}
 
{% endblock %}


{% block content %}
  	<!-- header -->
    <header data-blend-widget="header" class="blend-header">
        <span class="blend-header-left"></span>
        <span class="blend-header-title"> 矿机商城 </span>
        <span class="blend-header-right">
            <!-- <a class="blend-header-item blend-action-back-icon" href="#"></a> -->
        </span>
    </header>

    <!-- main -->
    <div class="mian">
        <div class="blend-listview-main">

            <div class="blend-flexbox blend-listview-item">
                <div class="blend-flexbox-item">
                    <img class="blend-listview-item-pic" src="http://pic.4j4j.cn/upload/pic/20130530/f41069c61a.jpg" alt="pic">
                </div>
                <div class="blend-flexbox-item blend-flexbox-ratio">
                    <div class="blend-listview-item-title">
                        初级矿机
                    </div>
                    <div class="blend-listview-item-badge">
                        <span class="blend-badge blend-badge-empty">初级矿机</span>
                        <span class="blend-badge blend-badge-empty">24小时</span>
                    </div>
                    <div class="blend-listview-item-price">
                        <em>￥</em>9
                    </div>
                </div>
                <div data-blend-widget="counter" class="blend-counter blend-listview-conter-box">
                    <button class="blend-button blend-button-primary"> 购买 </button>
                </div>
            </div>

            <div class="blend-flexbox blend-listview-item">
                <div class="blend-flexbox-item">
                    <img class="blend-listview-item-pic" src="http://pic.4j4j.cn/upload/pic/20130530/f41069c61a.jpg" alt="pic">
                </div>
                <div class="blend-flexbox-item blend-flexbox-ratio">
                    <div class="blend-listview-item-title">
                        中级矿机
                    </div>
                    <div class="blend-listview-item-badge">
                        <span class="blend-badge blend-badge-empty">中级矿机</span>
                        <span class="blend-badge blend-badge-empty">120小时</span>
                    </div>
                    <div class="blend-listview-item-price">
                        <em>￥</em>99
                    </div>
                </div>
                <div data-blend-widget="counter" data-blend-counter="{&quot;step&quot;:1,&quot;maxValue&quot;:10,&quot;minValue&quot;:1}" class="blend-counter blend-listview-conter-box">
                    <button class="blend-button blend-button-primary"> 购买 </button>
                </div>
            </div>

        </div>    
    </div>
   
{% endblock %}


{# js content #}
{% block js %}
    <!-- <script src="{{static_url('/index/js/chardata.js')}}"></script> -->

{% endblock %}  