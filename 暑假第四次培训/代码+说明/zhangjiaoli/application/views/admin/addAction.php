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
switch ($act) {
	case 'newslist':
        $title=$_POST['title'];
        $content=$_POST['content'];
        if(!empty($_POST['month']) && !empty($_POST['day'])){
           $month=$_POST['month'];
           $day=$_POST['day'];
        }else{
           $month=date(m);
           $day=date(d);
        }
        $author=$_POST['author'];
        $id=$_POST['id'];
		$sql="INSERT newslist(id,title,content,level,month,day,author) VALUES('{$id}','{$title}','{$content}',0,'{$month}','{$day}','{$author}');";
        $res=$mysqli->query($sql);
        if($res){
            echo "<script type='text/javascript'>
                     alert('添加成功');
                     location.href='../admin/index?p=1';
                   </script>";
            exit;
        }else{
            echo "<script type='text/javascript'>
                     alert('添加失败');
                     location.href='../admin/index?p=1';
                   </script>";
            exit;
        }
		break;
	case 'xlbk':
        $title=$_POST['title'];
        $content=$_POST['content'];
        if(!empty($_POST['month']) && !empty($_POST['day'])){
           $month=$_POST['month'];
           $day=$_POST['day'];
        }else{
           $month=date(m);
           $day=date(d);
        }
        $author=$_POST['author'];
        $id=$_POST['id'];
	    $sql="INSERT xlbk(id,title,content,level,month,day,author) VALUES('{$id}','{$title}','{$content}',0,'{$month}','{$day}','{$author}');";
        $res=$mysqli->query($sql);
        if($res){
            echo "<script type='text/javascript'>
                     alert('添加成功');
                     location.href='../admin/index?p=1';
                   </script>";
            exit;
        }else{
            echo "<script type='text/javascript'>
                     alert('添加失败');
                     location.href='../admin/index?p=1';
                   </script>";
            exit;
        }
	    break;
	case 'xlbj':
        $title=$_POST['title'];
        $content=$_POST['content'];
        if(!empty($_POST['month']) && !empty($_POST['day'])){
           $month=$_POST['month'];
           $day=$_POST['day'];
        }else{
           $month=date(m);
           $day=date(d);
        }
        $author=$_POST['author'];
        $id=$_POST['id'];
	    $sql="INSERT xlbj(id,title,content,level,month,day,author) VALUES('{$id}','{$title}','{$content}',0,'{$month}','{$day}','{$author}');";
        $res=$mysqli->query($sql);
        if($res){
            echo "<script type='text/javascript'>
                     alert('添加成功');
                     location.href='../admin/index?p=1';
                   </script>";
            exit;
        }else{
            echo "<script type='text/javascript'>
                     alert('添加失败');
                     location.href='../admin/index?p=1';
                   </script>";
            exit;
        }
	    break;
	case 'xlzx':
        $title=$_POST['title'];
        $content=$_POST['content'];
        if(!empty($_POST['month']) && !empty($_POST['day'])){
           $month=$_POST['month'];
           $day=$_POST['day'];
        }else{
           $month=date(m);
           $day=date(d);
        }
        $author=$_POST['author'];
        $id=$_POST['id'];
	    $sql="INSERT xlzx(id,title,content,level,month,day,author) VALUES('{$id}','{$title}','{$content}',0,'{$month}','{$day}','{$author}');";
        $res=$mysqli->query($sql);
        if($res){
            echo "<script type='text/javascript'>
                     alert('添加成功');
                     location.href='../admin/index?p=1';
                   </script>";
            exit;
        }else{
            echo "<script type='text/javascript'>
                     alert('添加失败');
                     location.href='../admin/index?p=1';
                   </script>";
            exit;
        }
	    break;
    case 'download':
        //1.获取上传文件信息
        $upfile=$_FILES["file"];
        //定义允许的类型
        $typelist=array("image/jpeg","image/jpg","image/png","application/msword","application/pdf","application/vnd.ms-powerpoint","application/zip");
        $path="style/index/files/";//定义一个上传后的目录
        //2.过滤上传文件的错误号
        if($upfile["error"]>0 && $upfile["error"]!=4){
            switch($upfile['error']){//获取错误信息
                case 1:
                    $info="上传得文件超过了 php.ini中upload_max_filesize 选项中的最大值.";
                    break;
                case 2:
                    $info="上传文件大小超过了html中MAX_FILE_SIZE 选项中的最大值.";
                    break;
                case 3:
                    $info="文件只有部分被上传";
                    break;
                case 5:
                    $info="找不到临时文件夹.";
                    break;
                case 6:
                    $info="文件写入失败！";break;
            }die("上传文件错误,原因:".$info);
        }
        //3.本次上传文件大小的过滤（自己选择）
        if($upfile['size']>2097152){
            die("上传文件大小超出限制");
        }
        //4.类型过滤
        if(!in_array($upfile["type"],$typelist) && substr($upfile["name"],-5)!=".docx"){
            die("上传文件类型非法!".$upfile["type"]);
        }
        /**
        //5.上传后的文件名定义(随机获取一个文件名)
        $fileinfo=pathinfo($upfile["name"]);//解析上传文件名字
        do{ 
            $newfile=date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];
        }while(file_exists($path.$newfile));
        **/
        $filename=$upfile["name"];
        //6.执行文件上传
        //判断是否是一个上传的文件
        if(is_uploaded_file($upfile["tmp_name"])){
            //执行文件上传(移动上传文件)
            if(move_uploaded_file($upfile["tmp_name"],$path.$filename)){
                echo "文件上传成功!";
                //将图片的名称和路径存入数据库
                $query = "INSERT download(filename,path) VALUES('{$filename}','{$path}');";
                $result = $mysqli -> query($query);
                if($result){
                    $mes= "文件上传成功！";
                    $url="../admin/index";
                    echo "<script type='text/javascript'>
                    alert('{$mes}');
                    location.href='{$url}?p=1';
                    </script>";
                    exit;
                }
                else{
                    $mes= "请求失败，请重试！";
                    $url="../admin/index";
                    echo "<script type='text/javascript'>
                    alert('{$mes}');
                    location.href='{$url}?p=1';
                    </script>";
                    exit;
                }
            }else{
            die("上传文件失败！");
            }
        }else{
            die("不是一个上传文件!");
        }
        break;

}
?>