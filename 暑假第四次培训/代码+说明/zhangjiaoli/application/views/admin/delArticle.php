<?php
header('content-type:text/html;charset=utf-8');
$mysqli=new mysqli('localhost','root','air0729.','summer4');
if($mysqli->connect_errno){
    die('CONNECT ERROR:'.$mysqli->connect_error);
}
include_once 'tool.inc.php';
$link=connect();
//验证是否登录
include_once 'is_manage_login.php';
$mysqli->set_charset('utf8');
$act=$_GET['act'];
$id=$_GET['id'];
switch ($act) {
	case 'newslist':
		$sql="DELETE FROM newslist WHERE id='{$id}';";
        $res=$mysqli->query($sql);
        if($res){
            $mes="删除成功";
        }else{
            $mes="删除失败";
        }
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}?p=1';
        </script>";
        exit;
        break;
	case 'xlbk':
	    $sql="DELETE FROM xlbk WHERE id='{$id}';";
        $res=$mysqli->query($sql);
        if($res){
            $mes="删除成功";
        }else{
            $mes="删除失败";
        }
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}?p=1';
        </script>";
        exit;
        break;
	case 'xlbj':
	    $sql="DELETE FROM xlbj WHERE id='{$id}';";
        $res=$mysqli->query($sql);
        if($res){
            $mes="删除成功";
        }else{
            $mes="删除失败";
        }
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}?p=1';
        </script>";
        exit;
        break;
	case 'xlzx':
	    $sql="DELETE FROM xlzx WHERE id='{$id}';";
        $res=$mysqli->query($sql);
        if($res){
            $mes="删除成功";
        }else{
            $mes="删除失败";
        }
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}?p=1';
        </script>";
        exit;
        break;
    case 'download':
        $filename=$_GET['filename'];
        $sql="DELETE FROM download WHERE filename='{$filename}';";
        $res=$mysqli->query($sql);
        if($res){
            $mes="删除成功";
        }else{
            $mes="删除失败";
        }
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}?p=1';
        </script>";
        exit;
        break;

}
?>