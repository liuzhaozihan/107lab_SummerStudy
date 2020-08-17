<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>newslist-心理健康工作站-计算机与信息工程学院官网</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/index/' ?>css/public.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/index/' ?>css/news.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/index/' ?>css/footer.css">
	<script src="<?php echo base_url() . 'style/index/' ?>js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo base_url() . 'style/index/' ?>js/index.js"></script>
</head>
<body>
	<?php include("head.php"); ?>
	</div>
    <div class="content">
    	<div class="top">
    		<p>当前位置: 首页 &gt;&gt; 心理咨询</p>
    	</div>
    	<div class="bottom">
    		<div class="newslist">
                <table>
                    <?php foreach($zixun as $v):  ?>
                    <tr>
                        <td><img src="<?php echo base_url() . 'style/index/' ?>images/list_tabicon.png ?>"></td>
                        <td><a href="<?php echo site_url('index/content/zixun_content/' . $v['id']) ?>"><?php echo $v['title'] ?></a></td>
                    </tr>
                    <?php endforeach ?>
                </table>
    		</div>
    	</div>
    </div>
	<?php include("footer.php"); ?>
</body>
</html>