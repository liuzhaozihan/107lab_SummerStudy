<?php
session_start();
$id=$_GET['id'];
header('content-type:text/html;charset=utf-8');
$mysqli=new mysqli('localhost','root','','news');
if($mysqli->connect_errno){
	die($mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');
$writer=$_POST['writer'];
$title=$_POST['title'];
$content=$_POST['content'];
$releasetime=$_POST['releasetime'];
$istop=$_POST['istop'];
$sql="UPDATE news1 SET  writer='$writer',title='$title',content='$content',releasetime='$releasetime',istop='$istop' WHERE id=".$id;
		$res=$mysqli->query($sql);
		if($res){
		$mes='修改成功';
	}else{
		$mes='修改失败';
	}
	$url='updatenews1.php';
	echo "<script type='text/javascript'>
		alert('{$mes}');
		location.href='{$url}';
		</script>";
		exit;