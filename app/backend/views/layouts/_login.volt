{# templates/_login.volt #}
<!DOCTYPE html lang="en">
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="布尔管理系统,布尔系统">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">    
    
    <link rel="stylesheet" href="{{static_url('/admin/css/theme.css')}}">
    <link rel="stylesheet" href="{{static_url('/admin/css/theme_1.css')}}">
    <link rel="stylesheet" href="{{static_url('/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{static_url('/admin/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{static_url('/admin/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{static_url('/admin/css/palette.1.css')}}" id="skin">
    <link rel="stylesheet" href="{{static_url('/admin/css/style.1.css')}}" id="font">
    <link rel="stylesheet" href="{{static_url('/admin/css/main.css')}}">

    <!--[if lt IE 9]>
        <script src="{{static_url('/admin/js/html5shiv.js')}} "></script>
        <script src="{{static_url('/admin/js/respond.min.js')}} "></script>
    <![endif]-->

    <script src="{{static_url('/admin/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{static_url('/admin/js/modernizr.js')}}"></script>
    <script src="{{static_url('/layer/layer.js')}}"></script>

    {% block head %} {% endblock %}  
    <title> 布尔管理系统 | {% block title %}{% endblock %} </title>
</head>  
<body class="bg-color center-wrapper">
      
{% block content %}
{% endblock %} 
    
</body>
</html>

{% block js %}
{% endblock %} 