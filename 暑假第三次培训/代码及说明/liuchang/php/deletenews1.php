<?php
session_start();
header('content-type:text/html;charset=utf-8');
//接受页面
$mysqli=new mysqli('localhost','root','','news');
if($mysqli->connect_errno){
	die($mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');
$id=$_GET['id'];
$sql="DELETE FROM news1 WHERE id=".$id;
	$res=$mysqli->query($sql);
	if($res){
		$delete='恭喜你，删除成功';
	}else{
		$delete='很遗憾，删除失败';
	}
	$url='updatenews1.php';
	echo "<script type='text/javascript'>
		alert('{$delete}');
		location.href='{$url}';
		</script>";
		exit;
?>