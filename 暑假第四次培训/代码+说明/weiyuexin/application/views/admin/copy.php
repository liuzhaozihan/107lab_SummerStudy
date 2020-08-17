<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url() . 'style/admin/' ?>css/admin.css" />
</head>
<body>
	<table class="table">
		<tr>
			<td colspan='2' class="th"><span class="span_people">&nbsp</span>欢迎光临河南大学计算机与信息工程学院心理健康工作站管理后台</td>
		</tr>
		<tr>
			<td>用户名</td>
			<td><?php echo $this->session->userdata('username') ?></td>
		</tr>
		<tr>
			<td>登录时间</td>
			<td><?php echo date('Y-m-d H:i:s',$this->session->userdata('logintime')) ?></td>
		</tr>
		<tr>
			<td>登录IP</td>
			<td><?php echo $this->input->ip_address() ?></td>
		</tr>
		<tr>
			<td colspan='2' class="th"><span class="span_server" style="float:left">&nbsp</span>服务器信息</td>
		</tr>

		<tr>
			<td>服务器环境</td>
			<td><?php echo $this->input->server('SERVER_SOFTWARE') ?></td>
		</tr>
		<tr>
			<td>PHP版本</td>
			<td><?php echo PHP_VERSION ?></td>
		</tr>
		<tr>
			<td>服务器IP</td>
			<td><?php echo $this->input->server('SERVER_ADDR') ?></td>
		</tr>
		<tr>
			<td>数据库信息</td>
			<td>5.6.14</td>
		</tr>

</table>
</body>
</html>