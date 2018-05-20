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
<!--侧拉-->
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
<!--侧拉结束-->

<!--顶部菜单固定-->
<!--js代码-->
<script type="text/javascript">
    $(function () {
        var win_height=$(document).height();
        $(window).scroll(function () {
            //获得元素距离浏览器顶部的距离
            var footer_top=$('.footer-box').offset().top;
            if(footer_top>win_height-55){
                console.log(1);
                $('.footer-box').css({'position':'relative','margin_top':'0px'})
            }else{
                console.log(0);
                $('.footer-box').css({'position':'fixed','bottom':'0px','left':'0px'});
            }
        })
    })
</script>
<!--js代码结束-->
<!--css代码-->
<style>
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
