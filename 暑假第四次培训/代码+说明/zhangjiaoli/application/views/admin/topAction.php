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
	case 'news_cancle':
        $sql="UPDATE newslist SET level=0 WHERE id=$id;";
        $res=$mysqli->query($sql);
        if($res){
            $mes="取消置顶成功";
        }else{
            $mes="取消置顶失败";
        }
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}?p=1';
        </script>";
        exit;
		break;
	case 'news_istop':
        $sql="UPDATE newslist SET level=1 WHERE id=$id;";
        $res=$mysqli->query($sql);
        if($res){
            $mes="置顶成功";
        }else{
            $mes="置顶失败";
        }
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}?p=1';
        </script>";
        exit;
		break;
	case 'bk_cancle':
	    $sql="UPDATE xlbk SET level=0 WHERE id=$id;";
        $res=$mysqli->query($sql);
        if($res){
            $mes="取消置顶成功";
        }else{
            $mes="取消置顶失败";
        }
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}?p=1';
        </script>";
        exit;
		break;
	case 'bk_istop':
	    $sql="UPDATE xlbk SET level=1 WHERE id=$id;";
        $res=$mysqli->query($sql);
        if($res){
            $mes="置顶成功";
        }else{
            $mes="置顶失败";
        }
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}?p=1';
        </script>";
        exit;
		break;
	case 'bj_cancle':
	    $sql="UPDATE xlbj SET level=0 WHERE id=$id;";
        $res=$mysqli->query($sql);
        if($res){
            $mes="取消置顶成功";
        }else{
            $mes="取消置顶失败";
        }
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}?p=1';
        </script>";
        exit;
		break;
	case 'bj_istop':
	    $sql="UPDATE xlbj SET level=1 WHERE id=$id;";
        $res=$mysqli->query($sql);
        if($res){
            $mes="置顶成功";
        }else{
            $mes="置顶失败";
        }
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}?p=1';
        </script>";
        exit;
		break;
	case 'zx_cancle':
	    $sql="UPDATE xlzx SET level=0 WHERE id=$id;";
        $res=$mysqli->query($sql);
        if($res){
            $mes="取消置顶成功";
        }else{
            $mes="取消置顶失败";
        }
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}?p=1';
        </script>";
        exit;
		break;
	case 'zx_istop':
	    $sql="UPDATE xlzx SET level=1 WHERE id=$id;";
        $res=$mysqli->query($sql);
        if($res){
            $mes="置顶成功";
        }else{
            $mes="置顶失败";
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