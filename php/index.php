<?php
/*判断用户是手机端访问还是PC端访问*/
function CheckSubstrs($substrs,$text){
    foreach($substrs as $substr)
        if(false!==strpos($text,$substr)){
            return true;
        }
    return false;
}
function isMobile(){
    $useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    $useragent_commentsblock=preg_match('|\(.*?\)|',$useragent,$matches)>0?$matches[0]:'';

    $mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ');
    $mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod');

    $found_mobile=CheckSubstrs($mobile_os_list,$useragent_commentsblock) ||
        CheckSubstrs($mobile_token_list,$useragent);

    if ($found_mobile){
        return true;
    }else{
        return false;
    }
}
/*判断用户是手机端访问还是PC端访问结束*/

/*自动获取微信信息*/
//首先获取地址参数
if(empty($_GET['id'])){
    $id=$_SESSION['d_id'];//注意找合适的位置清除这两个session
}else{
    $id=$_GET['id'];
}
if(isset($_GET['jgj'])){
    $jgj=$_GET['jgj'];
}else if(isset($_SESSION['jgj'])){
    $jgj=$_SESSION['jgj'];
}else{
    $jgj='';
}
//保存get参数
$_SESSION['d_id']=$_GET['id'];
$_SESSION['jgj']=isset($_GET['jgj'])?$_GET['jgj']:'';
if(empty($_SESSION['user_id'])||$_SESSION['user_id']==0){
//跳转页面获取微信用户信息
    ?>

    <div class="bm-btn-box" onClick="location.href='../wechat_login.php?is=1-customer/detail'">
        我要报名
    </div>
    <?php


    include("conn.php");
    include("db.php");
    session_start();
    $appid = "wxb73e999933c6b6cb";
    $secret = "2695d4d298a2e5dab8a9c3eeac1db8dd";

    if(isset($_GET['is'])){
        $p=explode('-',$_GET['is']);
        if(intval($p[0])==1){//is表示来自哪里
            get_wx_oauth($p[1]);
        }elseif(intval($p[0])==2){
            $code=$_GET['code'];
            get_wx_info($p[1]);
        }
    }


    function get_wx_oauth($p){

        global $appid;
        global $secret;

        $surl="http://zc36524.com/resource/get_user_info.php?is=2-$p";
        $url ="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$surl&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
        header("location:{$url}");

    }

    function get_wx_info($p){

        global $appid;
        global $secret;
        global $code;

        $get_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
        $json_obj=getJson($get_token_url);
//print_r($json_obj);
        $access_token = $json_obj['access_token'];
        $openid = $json_obj['openid'];
        $uid=isUser($openid);

        if(empty($uid)||$uid==0){
            $get_user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';
            $wx_json=getJson($get_user_info_url);
//print_r($wx_json);
            $uid=insertUser($wx_json);

        }
        $_SESSION["openid"]=$openid;
        $_SESSION['userid']=$uid;
        header("location:$p.php?id={$_SESSION['d_id']}&jgj={$_SESSION['jgj']}");


    }



    function insertUser($wx_json){

        $openid=$wx_json['openid'];
        $nickname=$wx_json['nickname'];
        /*$sex=$user_obj['sex'];
        $language=$user_obj['language'];
        $city=$user_obj['city'];
        $province=$user_obj['province'];
        $country=$user_obj['country'];*/
        $headimgurl=$wx_json['headimgurl'];
        $addtime=time();
        $pw=md5(123456);
        $sql="insert into ecs_users set open_id='$openid',headimg='$headimgurl',reg_time=$addtime, password='$pw',user_name='$nickname'";
        mysql_query($sql);
        return mysql_insert_id();
    }
    function isUser($openid){
        $uid;
        if(!empty($openid)){
            $sql="select user_id  from ecs_users where open_id='$openid'";
            $re=getAll($sql);
            $uid=$re[0]['user_id'];
        }
        return $uid;
    }
    function getJson($url){
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //SSL
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); //SSL
        $res = curl_exec($ch);
        curl_close($ch);
        return json_decode($res,true);

    }

    function verify_access_token(){


    }


    /*自动获取微信信息*/
?>