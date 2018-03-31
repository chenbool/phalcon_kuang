{# templates/_base.volt #}
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>微交易 | {% block title %}{% endblock %} </title>

    {# <link rel="stylesheet" href="{{static_url('/static/blue/css/basic.css')}}"> #}

    <link rel="stylesheet" href="{{static_url('/static/blue/css/frozen.css')}}">
    <script src="{{static_url('/static/blue/lib/zepto.min.js')}}"></script>
    <script src="{{static_url('/static/blue/js/frozen.js')}}"></script>

    <!-- socket  -->
    <script src="{{static_url('/static/blue/lib/socket.io.js')}}"></script>
    <script src="{{static_url('/static/blue/lib/vue.js')}}"></script>
    <!-- <script src="{{static_url('/static/blue/lib/vue-resource.js')}}"></script> -->
    
    <script>
      var socket = io("127.0.0.1:8080");
      // var socket = io("<?= $_SERVER['SERVER_ADDR'] ;?>:8080");
    </script>      
      {% block head %}{% endblock %}
  </head>

<body ontouchstart>

  {% block content %}{% endblock %} 

  <footer class="ui-footer ui-footer-btn">
      <ul class="ui-tiled ui-border-t">
          <li data-href="index.html" class="ui-border-r"><div>商品行情</div></li>
          <li data-href="ui.html" class="ui-border-r"><div> 交易记录 </div></li>
          <li data-href="js.html"><div> 个人账户 </div></li>
      </ul>
  </footer>


</body>
</html>
{% block js %}
{% endblock %} 