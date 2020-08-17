<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="<?php echo base_url() . 'style/admin/' ?>css/public.css" />
	<title></title>
</head>
<body>
	<form action="<?php echo site_url('admin/admin/change_password') ?>" method="post">
		<table class="table">
			<tr >
				<td class="th" colspan="2">修改密码</td>
			</tr>
			<tr>
				<td>用户名</td>
				<td><?php echo $this->session->userdata('username') ?></td>
			</tr>
			<tr>
				<td>原密码：</td>
				<td><input type="password" name="password"/></td>
			</tr>
			<tr>
				<td>新密码：</td>
				<td><input type="password" name="passwordF"/></td>
			</tr>
			<tr>
				<td>确认密码：</td>
				<td><input type="password" name="passwordS"/></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="修改" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>