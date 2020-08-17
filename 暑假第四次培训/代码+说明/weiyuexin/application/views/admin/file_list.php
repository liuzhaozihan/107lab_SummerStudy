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
			<td class="th" colspan="10">查看文件列表</td>
		</tr>
		<tr>
			<td id='head'>序号</td>
			<td id='head'>文件说明</td>
			<td id='head'>发布时间</td>
			<td id='head'>操作</td>
		</tr>

		<?php foreach($download as $v):  ?>
		<tr>
			<td><?php echo $v['id'] ?></td>
			<td class="title"><a href="<?php echo base_url('uploads/' . $v['filename']) ?>"><?php echo $v['title'] ?></a></td>
			<td><?php echo date("Y-m-d H:i:s",$v['addtime']) ?></td>
			<td>
				[<a href="<?php echo base_url('uploads/' . $v['filename']) ?>">点击下载</a>]
				[<a href="<?php echo site_url('admin/download/del/' . $v['id']) ?>">删除</a>]
				[<a href="">置顶</a>]
			</td>
		</tr>
		<?php endforeach ?>
	</table>
</body>
</html>