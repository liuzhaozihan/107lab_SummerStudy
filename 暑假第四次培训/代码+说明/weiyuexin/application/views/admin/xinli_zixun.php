<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url() . 'style/admin/' ?>css/public.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/admin/' ?>css/footer.css">
	<script type="text/javascript">
		window.UEDITOR_HOME_URL = "<?php echo base_url() ?>ueditor/";
		window.onload = function(){
            window.UEDITOR_CONFIG.initialFrameWidth = 900;
            window.UEDITOR_CONFIG.initialFrameHeight = 600;
            UE.getEditor('content');
		}
	</script>
	<script type="text/javascript" src="<?php echo base_url() ?>ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>ueditor/ueditor.all.min.js"></script>
	<title>发布心理咨询</title>
</head>
<body>
	<form action="<?php echo site_url('admin/xinli_zixun/send') ?>" method="POST" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<td class="th" colspan="10">发布心理咨询</td>
			</tr>
			<tr>
				<td id='head'>作者</td>
				<td>
					<input type="text" name="writer" class="writer" value="<?php echo set_value('writer') ?>">
					<?php echo form_error('writer','<span>','</span>') ?>
				</td>
			</tr>
			<tr>
				<td id='head'>标题</td>
				<td>
					<input type="text" name="title" class="title" value="<?php echo set_value('title') ?>">
					<?php echo form_error('title','<span>','</span>') ?>
				</td>
			</tr>
			<tr>
				<td id='head'>内容</td>
				<td>
					<textarea name="content" id="content" style="width: 500px;height: 350px">
					    <?php echo set_value('content') ?>	
					</textarea>
					<?php echo form_error('content','<span>','</span>') ?>
				</td>
			</tr>
			<tr>
				<td colspan="10">
					<input type="submit" name="submit" class="input_button" value="发布">
					<input type="reset" value="重置" class="input_button">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>