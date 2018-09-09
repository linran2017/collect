<?php
?>
    <!--js代码-->
    <script type="text/javascript">
        $(function () {

        })
    </script>
    <!--js代码结束-->
    <!--css代码-->

    <!--css代码结束-->
    <!--html-->
    <html>

    </html>
    <!--html结束-->
<!-------------------------------------------------------------------------------------------------->
<?php
?>
<!--侧拉效果-->
<!--js代码-->
<script type="text/javascript">
   $(function () {
       $('.right').click(function () {
           $('.cover').show();
           $('.rightbox').animate({'left':'40%'},200);
       })
       $('.cover').click(function () {
           $('.rightbox').animate({'left':'100%'},200);
           $(this).hide();
       })
   })
</script>
<!--js代码结束-->
<!--html-->
<html>
<div class="header-box">
    <div class="left" onclick="window.history.back(-1)">
        <i class="fa fa-chevron-left"></i>
    </div>
    家政员详情
    <div class="right">
        <i class="fa fa-bars"></i>
    </div>
</div>
<div class="rightbox">
    <div class="right-header">操作</div>
    <ul class="right-ul">
        <li class="right-li" onclick="location.href='./edit.php?id=<?php echo $person_data['id']?>'">
            <div class="pic">
                <i class="fa fa-edit"></i>
            </div>
            <div class="font">编辑</div>
            <div class="dyh">
                <i class="fa fa-angle-right"></i>
            </div>
        </li>
        <li class="right-li" onclick="if(confirm('确定要删除此家政员吗？')){ location.href='./del.php?id=<?php echo $person_data['id']?>' }">
            <div class="pic">
                <i class="fa fa-trash"></i>
            </div>
            <div class="font">删除</div>
            <div class="dyh">
                <i class="fa fa-angle-right"></i>
            </div>
        </li>
    </ul>
</div>
<div class="cover"></div>
</html>
<!--html结束-->
<!--侧拉效果结束-->

<!--顶部菜单固定-->
<!--js代码-->
<script type="text/javascript">
    $(function () {
        var url=window.location.href;
        if(url.indexOf('person')>=0){
            $('.footer-box').find('.footer-tab').eq(0).addClass('active');
        }else if(url.indexOf('customer')>=0){
            $('.footer-box').find('.footer-tab').eq(1).addClass('active');
        }else if(url.indexOf('join')>=0){
            $('.footer-box').find('.footer-tab').eq(2).addClass('active');
        }else if(url.indexOf('contract')>=0){
            $('.footer-box').find('.footer-tab').eq(3).addClass('active');
        }else if(url.indexOf('my')>=0){
            $('.footer-box').find('.footer-tab').eq(4).addClass('active');
        }
    })
</script>
<!--js代码结束-->
<!--css代码-->
<style>
    .footer-top{
        height:55px;
        width: 100%;
    }
    .footer-box{
        width: 100%;
        height: 50px;
        padding-top: 2px;
        padding-bottom: 2px;
        border-top: 1px solid #ddd;
        background: white;
        position: fixed;
        left: 0;
        bottom: 0;
        display: flex;
        justify-content: space-between;
    }
    .footer-box .footer-tab{
        color: #838383;
        text-align: center;
        width: 25%;
        font-size: 14px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .footer-box .active{
        color: #0091DA;
    }
    .footer-box .footer-tab .footer-img{
        font-size: 20px;
        font-weight: 500;
    }
</style>
<!--css代码结束-->
<!--html-->
<html>
<div class="footer-top"></div>
<div class="footer-box">
    <div onclick="location.href='../person/'" class="footer-tab">
        <div class="footer-img"><i class="fa fa-user-circle-o"></i></div>
        <div class="footer-text">家政员</div>
    </div>
    <div onclick="location.href='../customer/'" class="footer-tab">
        <div class="footer-img"><i class="fa fa-cc-mastercard"></i></div>
        <div class="footer-text">客户</div>
    </div>
    <div onclick="location.href='../join/'" class="footer-tab">
        <div class="footer-img"><i class="fa fa-handshake-o"></i></div>
        <div class="footer-text">合作</div>
    </div>
    <div onclick="location.href='../contract/'" class="footer-tab">
        <div class="footer-img"><i class="fa fa-file-photo-o"></i></div>
        <div class="footer-text">合同</div>
    </div>
    <div onclick="location.href='../my/'" class="footer-tab">
        <div class="footer-img"><i class="fa fa-user-o"></i></div>
        <div class="footer-text">我</div>
    </div>
</div>
</html>
<!--html结束-->
<!--顶部菜单固定-->

<!--一键复制-->
<!--js代码-->
<script src="./clipboard.min.js"></script>
<script type="text/javascript">
    $(function () {
        var clipboard = new Clipboard('.share');
        clipboard.on('success', function(e) {
            console.log(e);
            $('.notice').fadeIn(2000,function () {
                setTimeout(function () {
                    $('.notice').fadeOut(200);
                },2000)
            })
        });
        clipboard.on('error', function(e) {
            console.log(e);
            alert('复制失败！');
        });
    })
</script>
<!--js代码结束-->
<!--css代码-->
<style>
    .notice{
        position: absolute;
        right: 2%;
        bottom: 2px;
        background: #000000;
        opacity: 0.8;
        border-radius: 3px;
        color: #444;
        padding: 3px 5px;
        display: none;
    }
</style>
<!--css代码结束-->
<!--html-->
<html>
<li class="li-box share" data-clipboard-text="http://zc36524.com/jzy/tpl/person/store.php?uid=<?php echo $_SESSION['uid'] ?>">
    <div class="img-box">
        <img src="../register/jundaologo.png" />
    </div>
    <div class="title">
        转发添加家政员
    </div>
    <div class="notice">
        已复制到剪切板！
    </div>
</li>
</html>
<!--html结束-->
<<<<<<< HEAD
<!--一键复制结束-->

<!--判断是否是微信访问-->
<!--js代码-->
<script type="text/javascript">
    $(function () {
        function is_weixin(){

            var ua = navigator.userAgent.toLowerCase();

            if(ua.match(/MicroMessenger/i)=="micromessenger") {
               // 微信
                return true;

            } else {
                //其他
                return false;

            }

        }
    })
</script>
<!--js代码结束-->
<!--css代码-->

<!--css代码结束-->
<!--html-->
<html>

</html>
<!--html结束-->
<!--判断是否是微信访问结束-->
=======
<!--一键复制结束-->
>>>>>>> 5119e7412cb29ceec1304bdb128cc8a9167507d4

<!--判断是否是微信访问-->
<script type="text/javascript">
    function is_weixin() {
        var ua = window.navigator.userAgent.toLowerCase();
        if (ua.match(/MicroMessenger/i) == 'micromessenger') {
            //   alert("微信浏览器");
        } else {
            //alert("不是微信浏览器");
        }
    }
    is_weixin();
</script>
<!--判断是否是微信访问结束-->
