<?php
header('content-type:text/html;charset=utf-8');
$mysqli=new mysqli('localhost','root','air0729.','summer4');
if($mysqli->connect_errno){
    die('CONNECT ERROR:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');
$id=$_GET['id'];
$act=$_GET['act'];
switch($act){
    case 'newslist':
        $site="新闻列表";
        $site1="category";
        $sql="SELECT * from newslist where id='{$id}';";
        $result= $mysqli->query($sql);
        $row=mysqli_fetch_array($result);
        break;
    case 'xlbk':
        $site="心理百科";
        $site1="xlbk";
        $sql="SELECT * from xlbk where id='{$id}';";
        $result= $mysqli->query($sql);
        $row=mysqli_fetch_array($result);
        break;
    case 'xlbj':
        $site="心理保健";
        $site1="xlbj";
        $sql="SELECT * from xlbj where id='{$id}';";
        $result= $mysqli->query($sql);
        $row=mysqli_fetch_array($result);
        break;
    case 'xlzx':
        $site="心理咨询";
        $site1="xlzx";
        $sql="SELECT * from xlzx where id=$id;";
        $result= $mysqli->query($sql);
        $row=mysqli_fetch_array($result);
        break;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=0.1">
	<title>文章内容-计算机与信息工程学院官网</title>
	<!--引入字体-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courier">
	<link href="<?php echo base_url().'style/index/' ?>css/border.css" rel="stylesheet"/>
    <link href="<?php echo base_url().'style/index/' ?>css/content.css" rel="stylesheet"/> 
</head>
<body>
    <!--顶部-->
    <div class="top">
    	<span>设为首页 | 加入收藏</span>
    </div>
    <!--logo-->
    <div class="top_logo">
    	<a href="#">
    		<img src="<?php echo base_url().'style/index/' ?>images/ICON.png" alt="计算机与信息工程学院心理健康教育工作站"/>
    	</a>
    </div>
    <!--导航条-->
    <div class="nav">
        <ul class="nav1">
            <li class="choosed"><a href="<?php echo site_url().'/index/home/index'?>">首页</a></li>
            <li>
                <a href="#">关于我们</a>
                <ul class="nav2">
                    <li><a href="<?php echo site_url().'/index/home/introduce'?>">中心简介</a></li>
                    <li><a href="#">服务内容</a></li>
                    <li><a href="#">师资队伍</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo site_url().'/index/home/category'?>">新闻公告</a>
                <ul class="nav2">
                    <li><a href="#">中心动态</a></li>
                    <li><a href="#">学院风采</a></li>
                    <li><a href="#">朋辈成长</a></li>
                    <li><a href="#">教师园地</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo site_url().'/index/home/xlbk'?>">心理百科</a>
                <ul class="nav2">
                    <li><a href="#">心理常识</a></li>
                    <li><a href="#">最新发现</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo site_url().'/index/home/xlbj'?>">心理保健</a>
                <ul class="nav2">
                    <li><a href="#">情感美文</a></li>
                    <li><a href="#">开心一刻</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo site_url().'/index/home/xlzx'?>">心理咨询</a>
                <ul class="nav2">
                    <li><a href="#">咨询常识</a></li>
                    <li><a href="#">药品指南</a></li>
                </ul>
            </li>
            <li>
                <a href="#">心理测评</a>
                <ul class="nav2">
                    <li><a href="#">心灵普查</a></li>
                    <li><a href="#">趣味检测</a></li>
                    <li><a href="#">专业问卷</a></li>
                </ul>
            </li>
            <li><a href="#">专题活动</a></li>
            <li><a href="<?php echo site_url().'/index/home/download'?>">下载中心</a></li>
            <li><a href="<?php echo site_url().'/index/home/leaveMess'?>">我要留言</a></li>
        </ul>
    </div>
    <!--文章-->
    <div class="content">
        <div class="current_site">
            <span>当前位置：</span>
            <a href="<?php echo site_url().'/index/home/index'?>">首页</a>>>
            <a href="<?php echo site_url().'/index/home/'?><?php echo $site1?>"><?php echo $site;?></a>>>
            <a href="<?php echo site_url().'/index/home/content'?>">正文</a>
        </div>
        <div style="height:500px;display: block;">
            <h2 align="center"><?php echo $row['title']?></h3>
                <br/>
            <span>作者：<?php echo $row['author']?></span>
            <br/>
            <span style="float: left;">发布时间:<?php echo $row['month'].'月'.$row['day'].'日'?></span>
            <span style="float:left;">&nbsp;&nbsp;阅读量:</span>
            <br/>
            <br/>
            <hr style="color:#39A4DB;"/>
            <br/>
            <br/>
            <p style="width: 80%;display: grid;font-weight: bold;font-size: 16px;"><?php echo $row['content']?></p>
            </div>
    </div>
    <!--页尾-->
    <div class="footer">
        <p>河南大学计算机与信息工程学院心理健康教育工作站  地址：河南大学计算机与信息工程学院101</p>
        <p>电话：0371-23883169  邮编：475000</p>
    </div>
</body>
</html>