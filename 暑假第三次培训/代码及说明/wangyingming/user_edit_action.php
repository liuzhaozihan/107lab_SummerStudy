<?php
$link=new mysqli('localhost','root','','test');
if($link->connect_errno)
{
    echo '连接失败'.$link->connection_status;
    echo '请稍后在进行尝试' ;
    exit(0);
}
$link->set_charset('utf8');

$id = $_GET['id'];

$newusername=$_POST['username'];
$newpassword=$_POST['password'];
$repassword=$_POST['repassword'];

if($newpassword == $repassword)
{
    $sql = "update user set username='$newusername',password='$newpassword' where id='$id'";
    $res = $link->query($sql);
    if($res)
    {
        echo "<script>
            alert('修改账户成功，请重新登录');
            location='login.php';
        </script>";
    }
    else
    {
        echo "<script>
            alert('出错了,从新登录吧!');
            location='login.php';
        </script>";
    }
}
else
{
    echo "<script>
        alert('两次密码不一致，请重新输入你的密码');
        location='user_edit.php?username=$oldusername';   
    </script>";
}

 $link->close();
?>