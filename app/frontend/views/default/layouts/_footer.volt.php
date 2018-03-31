    <!-- footer -->
    <footer data-blend-widget="fixedBar" class="blend-header blend-fixedBar blend-fixedBar-bottom" style="height:60px;" >
        <a class="blend-col-3" style="padding:0;" href="<?= $this->url->getStatic('/index/index') ?>"> 
            <div class="icon iconfont" >&#xe792;</div>
            <span>矿机商城</span> 
        </a>
        <a class="blend-col-3" style="padding:0;" href="<?= $this->url->getStatic('/my/index') ?>"> 
            <div class="icon iconfont" >&#xe755;</div>
            <span>我的矿机</span> 
        </a>
        <a class="blend-col-3" style="padding:0;" href="<?= $this->url->getStatic('/pay/index') ?>">
            <div class="icon iconfont">&#xe710;</div> 
            <span>交易中心</span> 
        </a>
        <a class="blend-col-3" style="padding:0;" href="<?= $this->url->getStatic('/user/index') ?>"> 
            <div class="icon iconfont" >&#xe6f7;</div> 
            <span>个人中心</span> 
        </a>
    </footer>
    <style>
        .blend-fixedBar-bottom>a .iconfont{
            font-size:24px;
        }
        .blend-fixedBar-bottom>a>span{
            font-size:12px;
            position:relative;bottom:25px;
        }
        .blend-fixedBar-bottom .active{
            color:#FF6666;
        }
        a{
            text-decoration : none;
        }
    </style>

<script>
    $(function(){
        $('a').removeClass('active');
         $("a[href*= '<?= $this->request->getUri() ?>' ] ").addClass('active');
    });
</script>