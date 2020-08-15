<?php 
header('content-type:text/html;charset=utf-8');
$mysqli=@new mysqli('localhost','root','air0729.','summer4');
if($mysqli->connect_errno){
    die('Connect Error:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');
//验证登录
//接收用户名
$login_name=$_POST['login_name'];
//接收密码
$login_pw=$_POST['login_pw'];
session_start();
$_SESSION['login_name']=$login_name;
//判断用户名和密码是否匹配
$login_pw=md5($login_pw);   //由于表中加密了密码所以此时要先加密才能判断是否匹配
$check="SELECT * FROM admin WHERE username='{$login_name}' and password='{$login_pw}';";
$res=$mysqli->query($check);
/*
验证码
 */
//接收验证码
$code=$_POST['captcha'];
if(strtolower($_SESSION["code"]) != strtolower($code)){   
    echo "验证码错误<br/>".'<a href="index">请重新登录</a>';  
}else if($res->num_rows>0){
    echo "恭喜您登陆成功！<br/>";
    $data=mysqli_fetch_assoc($res);
    $_SESSION['manage']['username']=$data['username'];
    $_SESSION['manage']['password']=sha1($data['password']);
    $userInfo=<<<EOF
<table border="1" cellspacing="0" width="70%">
    <tr>
         <td>用户名</td>
         <td>密码</td>
         <td>操作</td>
    </tr>
    <tr>
         <td>{$login_name}</td>
         <td>{$login_pw}</td>
         <td><a href="../admin/editpw?name=$login_name&password=$login_pw">修改密码</a>|
         <a href="../admin/index?name1=$login_name&p=1">后台管理</a></td>
    </tr>
</table>
EOF;
    echo $userInfo;
}else{
    echo "用户名或密码错误<br/>".'<a href="index">请重新登录</a>';
}
mysqli_close($mysqli);
?>