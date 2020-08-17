<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url() . 'style/admin/' ?>css/public.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/admin/' ?>css/footer.css">
	<title>slider</title>
</head>
<body>
	<form action="<?php echo site_url('admin/slider/send') ?>" method="POST" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<td class="th" colspan="10">修改前台轮播图图片</td>
			</tr>
			<tr>
				<td id='head'>图片</td>
				<td>
					<input type="file" name="filename" class="filename" >
					<?php echo form_error('filename','<span>','</span>') ?>
				</td>
			</tr>
			<tr>
				<td id='head'>修改哪张轮播图图片</td>
				<td>
					<select name="pic">
						<option value="1">
							第一张轮播图图片
						</option>
						<option value="2">
							第二张轮播图图片
						</option>
						<option value="3">
							第三张轮播图图片
						</option>
						<option value="4">
							第四张轮播图图片
						</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="10">
					<input type="submit" name="submit" class="input_button" value="修改">
					<input type="reset" value="重置" class="input_button">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>