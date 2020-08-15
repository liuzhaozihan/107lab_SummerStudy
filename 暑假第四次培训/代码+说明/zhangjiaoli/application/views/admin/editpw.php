<?php 
require 'tool.inc.php';
$link=connect();
//验证是否登录
require 'is_manage_login.php';
header('content-type:text/html;charset=utf-8');
$mysqli=new mysqli('localhost','root','air0729.','summer4');
if($mysqli->connect_errno){
    die('CONNECT ERROR:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');
$username=$_GET['name'];
$password=$_GET['password'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>修改密码</title>
</head>
<body>
    <form action="#" method="post">
         <table border="1" cellpadding="0" cellspacing="0" bgcolor="#ABCDEF" width="50%">
             <tr>
                 <td>用户名</td>
                 <td><?php echo $username;?></td>
             </tr>
             <tr>
             	<td>原密码</td>
             	<td><input type="password" name="password" id="" placeholder="请输入原密码" required="required"/></td>
             </tr>
             <tr>
                 <td>密码</td>
                 <td><input type="password" name="password1" id="" placeholder="请输入新密码" required="required"/></td>
             </tr>
             <tr>
                 <td colspan="2"><input type="submit" value="修改"/></td>
             </tr>
         </table>
    </form>
    <?php
    $check="SELECT * FROM admin WHERE username='{$username}' and password='{$password}';";
    $res=$mysqli->query($check);
    if($res->num_rows>0 && !empty($_POST['password1'])){
        $password1=md5($_POST['password1']);
    	$sql="UPDATE admin SET password='{$password1}' WHERE username='{$username}';";
        $res1=$mysqli->query($sql);
        if($res1){
            $mes="修改成功";
            $url=site_url().'/admin/login/index';
            echo "<script type='text/javascript'>
            alert('{$mes}');
            location.href='{$url}';
            </script>";
        }else{
            $mes="修改失败";
            echo "<script type='text/javascript'>
            alert('{$mes}');
            </script>";
        }     
    }else if($res->num_rows<=0){
             $mes="修改失败,原密码错误";
             echo "<script type='text/javascript'>
             alert('{$mes}');
             </script>";
         }
    ?>
</body>
</html>