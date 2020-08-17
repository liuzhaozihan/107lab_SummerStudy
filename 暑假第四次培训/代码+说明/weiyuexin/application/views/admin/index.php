<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>心理健康工作站后台管理首页-河南大学计算机与信息工程学院</title>
	<link rel="stylesheet" href="<?php echo base_url() . 'style/admin/' ?>css/admin.css" />
	<script type="text/javascript" src="<?php echo base_url() . 'style/admin/' ?>js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() . 'style/admin/' ?>js/admin.js"></script>
<!-- 默认打开目标 -->
<base target="iframe"/>
</head>
<body>
<!-- 头部 -->
	<div id="top_box">
		<div id="top">
			<p id="top_font">河南大学计算机与信息工程学院心理健康工作站后台管理首页 （V5.6）</p>
		</div>
		<div class="top_bar">
			<p class="adm">
				<span>管理员：</span>
				<span class="adm_pic">&nbsp&nbsp&nbsp&nbsp</span>
				<span class="adm_people"><?php echo $this->session->userdata('username') ?></span>
			</p>
			<p class="now_time">
				今天是：<?php echo date('Y-m-d'); ?> &nbsp;
				当前位置是：
				<span>首页</span>
			</p>
			<p class="out">
				<span class="out_bg">&nbsp&nbsp&nbsp&nbsp</span>&nbsp
				<a href="<?php echo site_url() . '/admin/login/login_out' ?>" target="_self">退出</a>
			</p>
		</div>
	</div>
<!-- 左侧菜单 -->
		<div id="left_box">
			<p class="use">常用菜单</p>
			<div class="menu_box">
				<h2>文章发布</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin/news/send_news') ?>" class="pos">新闻公告</a>				        	
				        </li> 
				    </ul>
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin/xinli_baike/send_xinli_baike') ?>" class="pos">心理百科</a>				        	
				        </li> 
				    </ul>
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin/xinli_baojian/send_xinli_baojian') ?>" class="pos">心理保健</a>				        	
				        </li> 
				    </ul>
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin/xinli_zixun/send_xinli_zixun') ?>" class="pos">心理咨询</a>				        	
				        </li> 
				    </ul>
				</div>
			</div>	
			<div class="menu_box">
				<h2>查看文章列表</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin/news/index') ?>" class="pos">新闻公告</a>				        	
				        </li> 
				    </ul>
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin/xinli_baike/index') ?>" class="pos">心理百科</a>				        	
				        </li> 
				    </ul>
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin/xinli_baojian/index') ?>" class="pos">心理保健</a>				        	
				        </li> 
				    </ul>
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin/xinli_zixun/index') ?>" class="pos">心理咨询</a>				        	
				        </li> 
				    </ul>
				</div>
			</div>
			<div class="menu_box">
				<h2>前台留言管理</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin/liuyan/index') ?>" class="pos">留言信息</a>				        	
				        </li> 
				    </ul>
				</div>
			</div>
			<div class="menu_box">
				<h2>下载中心</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin/download/index') ?>" class="pos">文件列表</a>				        	
				        </li> 
				    </ul>
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin/download/send_download') ?>" class="pos">上传文件</a>        	
				        </li> 
				    </ul>
				</div>
			</div>
			<div class="menu_box">
				<h2>前台轮播图</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin/slider/send_slider') ?>" class="pos">修改大轮播图图片</a>				        	
				        </li> 
				    </ul>
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin/slider/send_slider_lianjie') ?>" class="pos">修改大轮播图链接</a>				        	
				        </li> 
				    </ul>
				</div>
			</div>
			<div class="menu_box">
				<h2>常用菜单</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url() ?>" class="pos" target=_blank>前台首页</a>				        	
				        </li> 
				    </ul>
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin/admin/copy') ?>" class="pos">系统信息</a>				        	
				        </li> 
				    </ul>
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo site_url('admin/admin/change') ?>" class="pos">密码修改</a>				        	
				        </li> 
				    </ul>
				</div>
			</div>			
		</div>
		<!-- 右侧 -->
		<div id="right">
			<iframe  frameboder="0" border="0" 	scrolling="yes" name="iframe" src="<?php echo site_url() . '/admin/admin/copy' ?>">
				
			</iframe>
		</div>
	<!-- 底部 -->
	<div id="foot_box">
		<div class="foot">
			<p>@Copyright © 2019-2020 weiyuexin All Rights Reserved. </p>
		</div>
	</div>

</body>
</html>

