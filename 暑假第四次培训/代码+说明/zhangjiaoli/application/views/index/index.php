<?php
header('content-type:text/html;charset=utf-8');
$mysqli=@new mysqli('localhost','root','air0729.','summer4');
if($mysqli->connect_errno){
    die('Connect Error:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');
//新闻列表
$sql="select * from newslist ORDER BY level DESC,month DESC,day DESC";
$mysqli_result=$mysqli->query($sql);
if($mysqli_result && $mysqli_result->num_rows>0){
    while($row=$mysqli_result->fetch_assoc()){
        $rows[]=$row;
    }
}
//心理百科
$sql1="select * from xlbk ORDER BY level DESC,month DESC,day DESC";
$mysqli_result1=$mysqli->query($sql1);
if($mysqli_result1 && $mysqli_result1->num_rows>0){
    while($content1=$mysqli_result1->fetch_assoc()){
        $contents1[]=$content1;
    }
}
//心理保健
$sql2="select * from xlbj ORDER BY level DESC,month DESC,day DESC";
$mysqli_result2=$mysqli->query($sql2);
if($mysqli_result2 && $mysqli_result2->num_rows>0){
    while($content2=$mysqli_result2->fetch_assoc()){
        $contents2[]=$content2;
    }
}
//心理咨询
$sql3="select * from xlzx ORDER BY level DESC,month DESC,day DESC";
$mysqli_result3=$mysqli->query($sql3);
if($mysqli_result3 && $mysqli_result3->num_rows>0){
    while($content3=$mysqli_result3->fetch_assoc()){
        $contents3[]=$content3;
    }
}
//文件下载
$sql4="select * from download";
$mysqli_result4=$mysqli->query($sql4);
if($mysqli_result4 && $mysqli_result4->num_rows>0){
    while($content4=$mysqli_result4->fetch_assoc()){
        $contents4[]=$content4;
    }
}
//小轮播图
$sql5="select * from newslist where path is not null ORDER BY level DESC,month DESC,day DESC limit 2";
$mysqli_result5=$mysqli->query($sql5);
if($mysqli_result5 && $mysqli_result5->num_rows>0){
    while($content5=$mysqli_result5->fetch_assoc()){
        $contents5[]=$content5;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=0.1">
	<title>心理健康工作站-计算机与信息工程学院官网</title>
	<!--引入字体-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courier">
	<link href="<?php echo base_url().'style/index/' ?>css/border.css" rel="stylesheet"/>
	<link href="<?php echo base_url().'style/index/' ?>css/sheetstyle.css" rel="stylesheet"/> 
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
    <!--banner图-->
    <div class="banner1">
    	<ul class="img_container">
    		<li><img src="<?php echo base_url().'style/index/' ?>images/image1.jpg" alt="1"/></li>
    		<li><img src="<?php echo base_url().'style/index/' ?>images/image2.jpg" alt="2"/></li>
    		<li><img src="<?php echo base_url().'style/index/' ?>images/image3.jpg" alt="3"/></li>
    		<li><img src="<?php echo base_url().'style/index/' ?>images/image4.jpg" alt="4 "/></li>
    	</ul>
    	<ol>
    		<li class="on"><img src="<?php echo base_url().'style/index/' ?>images/image_dot.png""/></li>
    		<li><img src="<?php echo base_url().'style/index/' ?>images/image_dot.png""/></li>
    		<li><img src="<?php echo base_url().'style/index/' ?>images/image_dot.png""/></li>
    		<li><img src="<?php echo base_url().'style/index/' ?>images/image_dot.png""/></li>
    	</ol>
    </div>
    <!--主体内容-->
    <div class="content">
    	<div class="content_up">
    		<div class="left_img">
    			<ul class="banner2">
                    <?php foreach ($contents5 as $content5):?>
    				<li><img src="<?php echo base_url().$content5['path'] ?><?php echo $content5['image']?>"/></li>
                    <?php endforeach; ?>
    			</ul>
    			<ol>
    				<li class="current_img">1</li>
    				<li>2</li>
    			</ol>
    		</div>
    		<div class="right_news">
    			<span class="title"><a href="<?php echo site_url().'/index/home/category'?>&p=1">新闻公告</a></span>
    			<ul>
    			    <?php foreach ($rows as $row):?>
                    <li><img src="<?php echo base_url().'style/index/' ?>images/list_icon.png" />
                    <?php if($row['level']==1){
                                   echo '<a class="A_css" title='.$row['title'].' href="content"?act=newslist&id='.$row['id'].'" target="_blank">'.$row['title'].'</a><span>'.$row['month'].'月'.$row['day'].'日</span>';
                                }else{
                                    echo '<a title='.$row['title'].' href="content?act=newslist&id='.$row['id'].'" target="_blank">'.$row['title'].'</a><span>'.$row['month'].'月'.$row['day'].'日</span>';
                                }
                    ?>
                    </li>
                    <?php endforeach; ?>
    			</ul>
    		</div>
    	</div>
    	<div class="content_down">
    		<div class="left_introduce">
    			<span class="title"><a href="<?php echo site_url().'/index/home/introduce'?>">中心简介</a></span>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;计算机与信息工程学院心理健康教育工作站始建于2015年3月，在学院101办公室，占地面积50平方米。工作站领导小组由学院党委副书记、各年级辅导员、年级朋辈辅导员组成。工作站宗旨以增强学生的心理素质为目的，以普及心理健康知识...<a href="<?php echo site_url().'/index/home/introduce'?>">详细</a></p>
    		</div>
    		<div class="middle_tab">
    			<div class="tab_titles">
    				<ul>
    					<li class="current_tab"><a href="<?php echo site_url().'/index/home/xlbk'?>&p=1">心理百科</a></li>
    					<li><a href="<?php echo site_url().'/index/home/xlbj'?>&p=1">心理保健</a></li>
    					<li><a href="<?php echo site_url().'/index/home/xlzx'?>&p=1">心理咨询</a></li>
    				</ul>
    			</div>
    			<div class="tab_ul">
    				<ul>
    					<?php foreach ($contents1 as $content1):?>
                        <li><img src="<?php echo base_url().'style/index/' ?>images/list_tabicon.png" />
                        <?php if($content1['level']==1){
                                   echo '<a class="A_css" title='.$content1['title'].' href="content"?act=xlbk&id='.$content1['id'].'" target="_blank">'.$content1['title'].'</a>';
                                }else{
                                    echo '<a title='.$content1['title'].' href="content?act=xlbk&id='.$content1['id'].'" target="_blank">'.$content1['title'].'</a>';
                                }
                            ?>
                        </li>
                        <?php endforeach; ?>
    				</ul>
    				<ul>
    					<?php foreach ($contents2 as $content2):?>
                        <li><img src="<?php echo base_url().'style/index/' ?>images/list_tabicon.png" />
                            <?php if($content2['level']==1){
                                   echo '<a class="A_css" title='.$content2['title'].' href="content"?act=xlbj&id='.$content2['id'].'" target="_blank">'.$content2['title'].'</a>';
                                }else{
                                    echo '<a title='.$content2['title'].' href="content?act=xlbj&id='.$content2['id'].'" target="_blank">'.$content2['title'].'</a>';
                                }
                            ?>
                        </li>
                        <?php endforeach; ?>
    				</ul>
    				<ul>
    					<?php foreach ($contents3 as $content3):?>
                        <li><img src="<?php echo base_url().'style/index/' ?>images/list_tabicon.png" />
                        <?php if($content3['level']==1){
                                   echo '<a class="A_css" title='.$content3['title'].' href="content"?act=xlzx&id='.$content3['id'].'" target="_blank">'.$content3['title'].'</a>';
                                }else{
                                    echo '<a title='.$content3['title'].' href="content?act=xlzx&id='.$content3['id'].'" target="_blank">'.$content3['title'].'</a>';
                                }
                            ?>
                        </li>
                        <?php endforeach; ?>
    				</ul>
    			</div>
    		</div>
    		<div class="right_download">
    			<span class="title"><a href="<?php echo site_url().'/index/home/download'?>">下载中心</a></span>
    			<ul>
                    <?php foreach ($contents4 as $content4):?>
    				<li><img src="<?php echo base_url().'style/index/'?>images/list_tabicon.png" /><a href="<?php echo base_url().'style/index/'?>files/<?php echo $content4['filename']?>" download="$content4['filename']"><?php echo $content4['filename']?></a></li>
                    <?php endforeach; ?>
    			</ul>
    		</div>
    	</div>
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
<!--
1.阅读量
2.后台文章列表操作，文章可进行增删改查置顶等操作 √
3.文章上传图片传入前台轮播图 
5.前台留言后台分页查看 √
6.管理员可以在后台通过验证原密码正确性的方式更改密码。√
发布文章至少包含文章标题，作者，来源，访问量，发布时间（可自行设置，如果管理员不设置，用当前的系统时间作为发布时间）√
下载中心栏目， 管员在后台上传相应的附件,删除时带附件和数据库记录一并删除 √
兼顾网站的安全性。（只有进行管理员登陆后才能对网站的内容进行修改）√
-->