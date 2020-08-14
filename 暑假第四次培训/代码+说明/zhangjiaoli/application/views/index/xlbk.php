<?php 
header('content-type:text/html;charset=utf-8');
$mysqli=@new mysqli('localhost','root','air0729.','summer4');
if($mysqli->connect_errno){
    die('Connect Error:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');
//分页
$page=1;
$page=$_GET['p'];
if(empty($page)){
  $page=1;
  } 
$sql="select * from xlbk ORDER BY level DESC,month DESC,day DESC limit ".($page-1) * 10 .",10 ";
$mysqli_result=$mysqli->query($sql);
if($mysqli_result && $mysqli_result->num_rows>0){
    while($row=$mysqli_result->fetch_assoc()){
        $rows[]=$row;
    }
}
$to_sql="SELECT COUNT(*)FROM xlbk";
$result= $mysqli->query($to_sql);
$row1=mysqli_fetch_array($result);
$count=$row1[0];
$to_pages=ceil($count/10); //向上取整
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=0.1">
	<title>心理百科-计算机与信息工程学院官网</title>
	<!--引入字体-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courier">
	<link href="<?php echo base_url().'style/index/' ?>css/border.css" rel="stylesheet"/>
    <link href="<?php echo base_url().'style/index/' ?>css/newlist.css" rel="stylesheet"/> 
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
    <!--新闻列表-->
    <div class="newlist">
        <div class="current_site">
            <span>当前位置：</span>
            <a href="<?php echo site_url().'/index/home/index'?>">首页</a>>>
            <a href="<?php echo site_url().'/index/home/xlbk'?>">心理百科</a>
        </div>
        <ul class="list">
            <?php foreach ($rows as $row):?>
            <li><img src="<?php echo base_url().'style/index/' ?>images/list_icon.png" />
                <a href="<?php echo base_url().'style/index/' ?>index/home/content?act=xlbk&id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a>
                <span><?php echo $row['month'];?>月<?php echo $row['day'];?>日</span></li>
            <?php endforeach; ?>
            <div class="changePage">
                <?php 
                if($page<=1){
                    echo "<button type='button'><a href='".$_SERVER['PHP_SELF']."?p=1'>上一页</a></button>";
                }else{
                    echo "<button type='button'><a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'>上一页</a></button>";
                }
                if ($page<$to_pages){
                    echo "<button type='button'><a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页</a></button>";
                }else{
                    echo "<button type='button'><a href='".$_SERVER['PHP_SELF']."?p=".($to_pages)."'>下一页</a></button>";
                }
                ?>
                <form style="float: right;">
                    <input type="text" name="p" />
                    <button type="submit">跳转</button>
                </form>
            </div>
        </ul>
        <div class="list_img">
            <img src="<?php echo base_url().'style/index/' ?>images/newslist.jpg"/>
        </div>
    </div>
    <!--页尾-->
    <div class="footer">
        <p>河南大学计算机与信息工程学院心理健康教育工作站  地址：河南大学计算机与信息工程学院101</p>
        <p>电话：0371-23883169  邮编：475000</p>
    </div>
</body>
<script type="text/javascript" src="<?php echo base_url().'style/index/' ?>js/jquery-1.12.4.js"></script>
<script type="text/javascript">
    $(function(){
    $('.list>li').on({
            mouseover:function(){
                $(this).children('a').css('color','#39A4DB');
                $(this).children('span').css('color','#39A4DB');
        },
            mouseout:function(){
                $(this).children('a').css('color','black');
                $(this).children('span').css('color','black');
            }
        });
});
</script>
</html>