<?php
//连接数据库
header("Content-Type: text/html;charset=utf-8");
include ('conn.php');
 

//获取要更改的用户名
$username1 = $_POST['username1'];
$username = $_POST['username2'];

//修改管理员信息
//$sql2 = "update register set username='{$username}' where id={$_GET['id']}";
$sql="update register set username='$username' where username='$username1'";

$result=mysqli_query($conn,$sql);
 
 
//header("Location:usermessage.php?username =$username");
if($result){
	echo "<script>alert('管理员信息更新成功，请重新登录！！！');location= 'login.php?'</script>";
}else{
	echo "<script>alert('管理员信息更新失败！！！');location= 'login.php'</script>";
}
//关闭数据库
mysqli_close($conn);
?>