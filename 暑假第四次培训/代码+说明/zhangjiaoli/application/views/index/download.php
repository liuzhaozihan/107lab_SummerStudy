<?php
header('content-type:text/html;charset=utf-8');
$mysqli=@new mysqli('localhost','root','air0729.','summer4');
if($mysqli->connect_errno){
    die('Connect Error:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');
//文件下载
$sql4="select * from download";
$mysqli_result4=$mysqli->query($sql4);
if($mysqli_result4 && $mysqli_result4->num_rows>0){
    while($content4=$mysqli_result4->fetch_assoc()){
        $contents4[]=$content4;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=0.1">
	<title>download-计算机与信息工程学院官网</title>
	<!--引入字体-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courier">
	<link href="<?php echo base_url().'style/index/' ?>css/border.css" rel="stylesheet"/>
    <link href="<?php echo base_url().'style/index/' ?>css/download.css" rel="stylesheet"/> 
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
                <a href="#">新闻公告</a>
                <ul class="nav2">
                    <li><a href="#">中心动态</a></li>
                    <li><a href="#">学院风采</a></li>
                    <li><a href="#">朋辈成长</a></li>
                    <li><a href="#">教师园地</a></li>
                </ul>
            </li>
            <li>
                <a href="#">心理百科</a>
                <ul class="nav2">
                    <li><a href="#">心理常识</a></li>
                    <li><a href="#">最新发现</a></li>
                </ul>
            </li>
            <li>
                <a href="#">心理保健</a>
                <ul class="nav2">
                    <li><a href="#">情感美文</a></li>
                    <li><a href="#">开心一刻</a></li>
                </ul>
            </li>
            <li>
                <a href="#">心理咨询</a>
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
    <!--下载内容-->
    <div class="download">
        <div class="current_site">
            <span>当前位置：</span>
            <a href="<?php echo site_url().'/index/home/index'?>">首页</a>>>
            <a href="<?php echo site_url().'/index/home/download'?>">下载中心</a>
        </div>
        <ul>
            <?php foreach ($contents4 as $content4):?>
            <li><img src="<?php echo base_url().'style/index/'?>images/list_tabicon.png" />
                <a href="<?php echo base_url().'style/index/'?>files/<?php echo $content4['filename']?>" download="$content4['filename']"><?php echo $content4['filename']?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!--页尾-->
    <div class="footer">
        <p>河南大学计算机与信息工程学院心理健康教育工作站  地址：河南大学计算机与信息工程学院101</p>
        <p>电话：0371-23883169  邮编：475000</p>
    </div>
    <script type="text/javascript" src="<?php echo base_url().'style/index/' ?>js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'style/index/' ?>js/index_style.js"></script>
</body>
</html>