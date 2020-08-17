<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言-心理健康工作站-计算机与信息工程学院官网</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/index/' ?>css/public.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/index/' ?>css/content.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/index/' ?>css/footer.css">
	<script src="<?php echo base_url() . 'style/index/' ?>js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo base_url() . 'style/index/' ?>js/index.js"></script>
</head>
<body>
	<?php include("head.php"); ?>
	<div class="content">
		<div class="top">
    	    <p>当前位置: 首页 &gt;&gt; 心理保健  &gt;&gt; 正文</p>
    	</div>
		<h2><?php echo $news[0]['title'] ?></h2><br>
		<div class="bottom">
			<h4>
				作者：<?php echo $news[0]['writer'] ?>&nbsp;&nbsp;&nbsp;&nbsp;
				发布时间：	<?php echo date("Y-m-d",$news[0]['addtime']) ?>
			</h4><br>
			<p>&nbsp;&nbsp;<?php echo $news[0]['content'] ?></p>
		</div>
	</div>

	<?php include("footer.php"); ?>
</body>
</html>