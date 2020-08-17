<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url() . 'style/admin/' ?>css/public.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/admin/' ?>css/footer.css">
	<title>发布下载中心文件</title>
</head>
<body>
	<form action="<?php echo site_url('admin/download/send') ?>" method="POST" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<td class="th" colspan="10">发布下载中心文件</td>
			</tr>
			<tr>
				<td id='head'>文件</td>
				<td>
					<input type="file" name="filename" class="filename">
					<?php echo form_error('filename','<span>','</span>') ?>
				</td>
			</tr>
			<tr>
				<td id='head'>文件摘要</td>
				<td>
					<input type="text" name="title" class="title" value="<?php echo set_value('title') ?>">
					<?php echo form_error('title','<span>','</span>') ?>
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