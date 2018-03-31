{# templates/_common.volt #}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width,initial-scale=1,user-scalable=no" name="viewport">
  <title> 布尔系统 | {% block title %}{% endblock %}</title>
  <link rel="stylesheet" href="{{static_url('/static/default/css/boost.css')}}">
  <link rel="stylesheet" href="{{static_url('/static/default/css/iconfont.css')}}">

  <script src="{{static_url('/static/default/js/boost.js')}}"></script>
  <script>
    window.zepto =  window.$;
  </script>
  <script src="{{static_url('/static/default/lib/jquery.min.js')}}"></script>
  <script src="{{static_url('/static/default/lib/vue.js')}}"></script>

  <!-- 弹框插件 -->
  <script src="{{static_url('/layer/layer.js')}}"></script> 

  <script>
  </script>

{% block head %}{% endblock %}
</head>
<body>
    <?php
      // $currentUrl = trim($this->request->getUri(),'/');
      // dump( strtr($currentUrl,'/','-') );
    ?>
    {# {% include "layouts/_header.volt" %} #}
    {% block content %}{% endblock %}
    {% include "layouts/_footer.volt" %}
</body>
</html>
{% block js %}
{% endblock %} 