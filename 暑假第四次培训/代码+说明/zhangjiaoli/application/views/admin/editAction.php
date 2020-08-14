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
//修改前id
$id=$_GET['id'];
$act=$_GET['act'];
$title=$_POST['title'];
//修改后id
$id1=$_POST['id1'];
$content=$_POST['content'];
$month=$_POST['month'];
$day=$_POST['day'];
$author=$_POST['author'];
switch ($act) {
	case 'newslist':
		$sql="UPDATE newslist SET id='{$id1}', title='{$title}',content='{$content}',month='{$month}',day='{$day}',author='{$author}' WHERE id='{$id}';";
        $res=$mysqli->query($sql);
        //1.获取上传文件信息
        $upfile=$_FILES["myfile"];
    if(!empty($upfile)){
        
        //定义允许的类型
        $typelist=array("image/jpeg","image/jpg","image/png","image/gif");
        $path="uploads/images/";//定义一个上传后的目录
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
        if(!in_array($upfile["type"],$typelist)){
            die("上传文件类型非法!".$upfile["type"]);
        }
        /*
        //5.上传后的文件名定义(随机获取一个文件名)
        $fileinfo=pathinfo($upfile["name"]);//解析上传文件名字
        do{ 
            $newfile=date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];
        }while(file_exists($path.$newfile));
        */
        $imgName=$upfile["name"];
        //6.执行文件上传
        //判断是否是一个上传的文件
        if(is_uploaded_file($upfile["tmp_name"])){
            //执行文件上传(移动上传文件)
            if(move_uploaded_file($upfile["tmp_name"],$path.$imgName)){
                //将图片的名称和路径存入数据库
                $query = "UPDATE newslist SET path='{$path}' WHERE id='{$id}'";
                $query1 = "UPDATE newslist SET image='{$imgName}' WHERE id='{$id}'";
                $result = $mysqli -> query($query);
                $result1 = $mysqli -> query($query1);
                if($result && $result1){
                    if($res){
                        $mes="修改成功";
                        $url="../admin/index";
                        echo "<script type='text/javascript'>
                        alert('{$mes}');
                        location.href='{$url}?p=1';
                        </script>";
                        exit;
                    }else{
                        $mes="图片上传成功，文章修改失败";
                        $url="../admin/index";
                        echo "<script type='text/javascript'>
                        alert('{$mes}');
                        location.href='{$url}?p=1';
                        </script>";
                        exit;
                    }
                    
                }
                else{
                    $mes="请求失败，请重试";
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
    }else{ 
        if($res){
            $mes="修改成功";
        }else{
            $mes="修改失败";
        }
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}?p=1';
        </script>";
        exit;
    }
		break;
	case 'xlbk':
	    $sql="UPDATE xlbk SET id='{$id1}', title='{$title}',content='{$content}',month='{$month}',day='{$day}',author='{$author}' WHERE id='{$id}';";
        $res=$mysqli->query($sql);
        //1.获取上传文件信息
        $upfile=$_FILES["myfile"];
        if(!empty($upfile)){
        
        //定义允许的类型
        $typelist=array("image/jpeg","image/jpg","image/png","image/gif");
        $path="uploads/images/";//定义一个上传后的目录
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
        if(!in_array($upfile["type"],$typelist)){
            die("上传文件类型非法!".$upfile["type"]);
        }
        /*
        //5.上传后的文件名定义(随机获取一个文件名)
        $fileinfo=pathinfo($upfile["name"]);//解析上传文件名字
        do{ 
            $newfile=date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];
        }while(file_exists($path.$newfile));
        */
        $imgName=$upfile["name"];
        //6.执行文件上传
        //判断是否是一个上传的文件
        if(is_uploaded_file($upfile["tmp_name"])){
            //执行文件上传(移动上传文件)
            if(move_uploaded_file($upfile["tmp_name"],$path.$imgName)){
                //将图片的名称和路径存入数据库
                $query = "UPDATE xlbk SET path='{$path}' WHERE id='{$id}'";
                $query1 = "UPDATE xlbk SET imgName='{$imgName}' WHERE id='{$id}'";
                $result = $mysqli -> query($query);
                $result1 = $mysqli -> query($query1);
                if($result && $result1){
                    if($res){
                        $mes="修改成功";
                        $url="../admin/index";
                        echo "<script type='text/javascript'>
                        alert('{$mes}');
                        location.href='{$url}?p=1';
                        </script>";
                        exit;
                    }else{
                        $mes="图片上传成功，文章修改失败";
                        $url="../admin/index";
                        echo "<script type='text/javascript'>
                        alert('{$mes}');
                        location.href='{$url}?p=1';
                        </script>";
                        exit;
                    }
                    
                }
                else{
                    $mes="请求失败，请重试";
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
         }else{ 
            if($res){
               $mes="修改成功";
            }else{
               $mes="修改失败";
        }
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}?p=1';
        </script>";
        exit;
    }
        break;
	case 'xlbj':
	    $sql="UPDATE xlbj SET id='{$id1}', title='{$title}',content='{$content}',month='{$month}',day='{$day}',author='{$author}' WHERE id='{$id}';";
        $res=$mysqli->query($sql);
        //1.获取上传文件信息
        $upfile=$_FILES["myfile"];
        if(!empty($upfile)){
        
        //定义允许的类型
        $typelist=array("image/jpeg","image/jpg","image/png","image/gif");
        $path="uploads/images/";//定义一个上传后的目录
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
        if(!in_array($upfile["type"],$typelist)){
            die("上传文件类型非法!".$upfile["type"]);
        }
        /*
        //5.上传后的文件名定义(随机获取一个文件名)
        $fileinfo=pathinfo($upfile["name"]);//解析上传文件名字
        do{ 
            $newfile=date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];
        }while(file_exists($path.$newfile));
        */
        $imgName=$upfile["name"];
        //6.执行文件上传
        //判断是否是一个上传的文件
        if(is_uploaded_file($upfile["tmp_name"])){
            //执行文件上传(移动上传文件)
            if(move_uploaded_file($upfile["tmp_name"],$path.$imgName)){
                //将图片的名称和路径存入数据库
                $query = "UPDATE xlbj SET path='{$path}' WHERE id='{$id}'";
                $query1 = "UPDATE xlbj SET imgName='{$imgName}' WHERE id='{$id}'";
                $result = $mysqli -> query($query);
                $result1 = $mysqli -> query($query1);
                if($result && $result1){
                    if($res){
                        $mes="修改成功";
                        $url="../admin/index";
                        echo "<script type='text/javascript'>
                        alert('{$mes}');
                        location.href='{$url}?p=1';
                        </script>";
                        exit;
                    }else{
                        $mes="图片上传成功，文章修改失败";
                        $url="../admin/index";
                        echo "<script type='text/javascript'>
                        alert('{$mes}');
                        location.href='{$url}?p=1';
                        </script>";
                        exit;
                    }
                    
                }
                else{
                    $mes="请求失败，请重试";
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
        }else{ 
           if($res){
            $mes="修改成功";
           }else{
            $mes="修改失败";
        }
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}?p=1';
        </script>";
        exit;
    }
        break;
	case 'xlzx':
	    $sql="UPDATE xlzx SET id='{$id1}', title='{$title}',content='{$content}',month='{$month}',day='{$day}',author='{$author}' WHERE id='{$id}';";
        $res=$mysqli->query($sql);
        //1.获取上传文件信息
        $upfile=$_FILES["myfile"];
        if(!empty($upfile)){
        
        //定义允许的类型
        $typelist=array("image/jpeg","image/jpg","image/png","image/gif");
        $path="uploads/images/";//定义一个上传后的目录
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
        if(!in_array($upfile["type"],$typelist)){
            die("上传文件类型非法!".$upfile["type"]);
        }
        /*
        //5.上传后的文件名定义(随机获取一个文件名)
        $fileinfo=pathinfo($upfile["name"]);//解析上传文件名字
        do{ 
            $newfile=date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];
        }while(file_exists($path.$newfile));
        */
        $imgName=$upfile["name"];
        //6.执行文件上传
        //判断是否是一个上传的文件
        if(is_uploaded_file($upfile["tmp_name"])){
            //执行文件上传(移动上传文件)
            if(move_uploaded_file($upfile["tmp_name"],$path.$imgName)){
                //将图片的名称和路径存入数据库
                $query = "UPDATE xlzx SET path='{$path}' WHERE id='{$id}'";
                $query1 = "UPDATE xlzx SET imgName='{$imgName}' WHERE id='{$id}'";
                $result = $mysqli -> query($query);
                $result1 = $mysqli -> query($query1);
                if($result && $result1){
                    if($res){
                        $mes="修改成功";
                        $url="../admin/index";
                        echo "<script type='text/javascript'>
                        alert('{$mes}');
                        location.href='{$url}?p=1';
                        </script>";
                        exit;
                    }else{
                        $mes="图片上传成功，文章修改失败";
                        $url="../admin/index";
                        echo "<script type='text/javascript'>
                        alert('{$mes}');
                        location.href='{$url}?p=1';
                        </script>";
                        exit;
                    }
                    
                }
                else{
                    $mes="请求失败，请重试";
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
        }else{ 
            if($res){
              $mes="修改成功";
           }else{
              $mes="修改失败";
        }
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('{$mes}');
        location.href='{$url}?p=1';
        </script>";
        exit;
    }
        break;
}
?>