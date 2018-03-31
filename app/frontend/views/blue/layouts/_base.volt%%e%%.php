a:9:{i:0;s:236:"
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>微交易 | ";s:5:"title";N;i:1;s:754:" </title>

    

    <link rel="stylesheet" href="<?= $this->url->getStatic('/static/blue/css/frozen.css') ?>">
    <script src="<?= $this->url->getStatic('/static/blue/lib/zepto.min.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/static/blue/js/frozen.js') ?>"></script>

    <!-- socket  -->
    <script src="<?= $this->url->getStatic('/static/blue/lib/socket.io.js') ?>"></script>
    <script src="<?= $this->url->getStatic('/static/blue/lib/vue.js') ?>"></script>
    <!-- <script src="<?= $this->url->getStatic('/static/blue/lib/vue-resource.js') ?>"></script> -->
    
    <script>
      var socket = io("127.0.0.1:8080");
      // var socket = io("<?= $_SERVER['SERVER_ADDR'] ;?>:8080");
    </script>      
      ";s:4:"head";N;i:2;s:40:"
  </head>

<body ontouchstart>

  ";s:7:"content";N;i:3;s:377:" 

  <footer class="ui-footer ui-footer-btn">
      <ul class="ui-tiled ui-border-t">
          <li data-href="index.html" class="ui-border-r"><div>商品行情</div></li>
          <li data-href="ui.html" class="ui-border-r"><div> 交易记录 </div></li>
          <li data-href="js.html"><div> 个人账户 </div></li>
      </ul>
  </footer>


</body>
</html>
";s:2:"js";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:2:"
";s:4:"file";s:45:"../app/frontend/views/blue/layouts/_base.volt";s:4:"line";i:44;}}i:4;s:1:" ";}