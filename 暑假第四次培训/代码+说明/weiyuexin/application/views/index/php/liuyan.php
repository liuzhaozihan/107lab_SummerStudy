<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>留言-心理健康工作站-计算机与信息工程学院官网</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/index/' ?>css/public.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/index/' ?>css/liuyan.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/index/' ?>css/footer.css">
	<script type="text/javascript">
		window.UEDITOR_HOME_URL = "<?php echo base_url() ?>ueditor/";
		window.onload = function(){
            window.UEDITOR_CONFIG.initialFrameWidth = 650;
            window.UEDITOR_CONFIG.initialFrameHeight = 200;
            UE.getEditor('content');
		}
	</script>
	<script type="text/javascript" src="<?php echo base_url() ?>ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>ueditor/ueditor.all.min.js"></script>
	<script src="<?php echo base_url() . 'style/index/' ?>js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo base_url() . 'style/index/' ?>js/index.js"></script>
</head>
<body>
	<?php include("head.php"); ?>
    <div class="content">
    	<form action="<?php echo site_url('index/home/add_liuyan') ?>" method="POSt">
    		<table class="table">
    			<tr colspan="10">
    				<td class="th" colspan="10">我要留言</td>
    			</tr>
    			<tr>
    				<td>邮箱:</td>
    				<td>
    					<input type="text" name="email" value="" class="email"><br>
    					<?php echo form_error('email','<span>','</span>') ?>
    				</td>
    			</tr>
    			<tr>
    				<td>留言内容:</td>
    				<td>
    					<textarea name="content" id="content" style="width: 500px;height: 350px">
					       <?php echo set_value('content') ?>
					    </textarea>
					    <?php echo form_error('content','<span>','</span>') ?>
    				</td>
    			</tr>
    			<tr>
    				<td colspan="10" class="td">
    					<input type="submit" name="submit" class="input_button" value="留言">
    					<input type="reset" value="重置" class="input_button">
    				</td>
    			</tr>
    		</table>
    	</form>
    </div>
	<?php include("footer.php"); ?>
</body>
</html>