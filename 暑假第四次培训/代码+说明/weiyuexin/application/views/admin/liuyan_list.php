<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo base_url() . 'style/admin/' ?>css/public.css" />
	<title>Document</title>
</head>
<body>
	<table class="table">
		<tr>
			<td class="th" colspan="10">查看新闻公告列表</td>
		</tr>
		<tr>
			<td id='head'>序号</td>
			<td id='head'>留言人邮箱</td>
			<td id='head'>留言内容</td>
			<td id='head'>留言时间</td>
			<td id='head'>操作</td>
		</tr>

		<?php foreach($news as $v):  ?>
		<tr>
			<td><?php echo $v['id'] ?></td>
			<td><?php echo $v['email'] ?></td>
			<td><?php echo $v['content'] ?></td>
			<td><?php echo date("Y-m-d H:i:s",$v['addtime']) ?></td>
			<td>
				[<a href="<?php echo site_url('admin/liuyan/del/' . $v['id']) ?>">删除</a>]
				[<a href="">置顶</a>]
				[<a href="https://mail.qq.com/" target="_blavk">回复</a>]
			</td>
		</tr>
		<?php endforeach ?>
	</table>
	<div class="page">
		<?php echo $links ?>
	</div>
</body>
</html>