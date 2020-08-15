<?php 
include_once 'tool.inc.php';
header('content-type:text/html;charset=utf-8');
$mysqli=@new mysqli('localhost','root','air0729.','test');
if($mysqli->connect_errno){
    die('Connect Error:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');
//检查登录
$mysqli=connect();
if(is_manage_login($mysqli)){
   
}else{
    exit();
}
//查询(模糊查询)
$keywords=$_POST['keywords'];
$act=$_GET['act'];
switch ($act) {
  case 'newslist':
    $sql="SELECT * FROM newslist WHERE title like '%{$keywords}%'";
    $result=$mysqli->query($sql);
    if($result && $result->num_rows>0){
      echo '<table border="1" cellspacing="0" cellpadding="0" width="80%" bgcolor="#ABCDEFG">
       <tr>
           <td>编号</td>
           <td>标题</td>
           <td>发布日期</td>
       </tr>';
    while($row=$result->fetch_assoc()){
        $rows[]=$row;
        //高亮显示
        $row['title']=preg_replace("/($keywords)/i","<b style=\"color:red\">\\1</b>",$row['title']); 
        //echo '<table border="1" cellspacing="0" cellpadding="0" width="80%" bgcolor="#ABCDEFG">';
        echo "<tr><td>".$row['id']."</td>";
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['month']."月".$row['day']."日</td></tr>";
        }
        echo '</table>';
        echo '<br/>';
        echo '<a href="../admin/index?p=1">'.'返回</a>';
    }
    if(!$result){
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('没有查询到有关信息');
        location.href='{$url}?p=1';
        </script>";
        exit;
      }
       break;
  case 'xlbk':
      $sql="SELECT * FROM xlbk WHERE title like '%{$keywords}%'";
      $result=$mysqli->query($sql);
      if($result && $result->num_rows>0){
         echo '<table border="1" cellspacing="0" cellpadding="0" width="80%" bgcolor="#ABCDEFG">
       <tr>
           <td>编号</td>
           <td>标题</td>
           <td>发布日期</td>
       </tr>';
    while($row=$result->fetch_assoc()){
        $rows[]=$row;
        //高亮显示
        $row['title']=preg_replace("/($keywords)/i","<b style=\"color:red\">\\1</b>",$row['title']); 
        //echo '<table border="1" cellspacing="0" cellpadding="0" width="80%" bgcolor="#ABCDEFG">';
        echo "<tr><td>".$row['id']."</td>";
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['month']."月".$row['day']."日</td></tr>";
        }
        echo '</table>';
        echo '<br/>';
        echo '<a href="../admin/index?p=1">'.'返回</a>';
    }
    if(!$result){
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('没有查询到有关信息');
        location.href='{$url}?p=1';
        </script>";
        exit;
      }
       break;
  case 'xlbj':
      $sql="SELECT * FROM xlbj WHERE title like '%{$keywords}%'";
      $result=$mysqli->query($sql);
      if($result && $result->num_rows>0){
         echo '<table border="1" cellspacing="0" cellpadding="0" width="80%" bgcolor="#ABCDEFG">
       <tr>
           <td>编号</td>
           <td>标题</td>
           <td>发布日期</td>
       </tr>';
    while($row=$result->fetch_assoc()){
        $rows[]=$row;
        //高亮显示
        $row['title']=preg_replace("/($keywords)/i","<b style=\"color:red\">\\1</b>",$row['title']); 
        //echo '<table border="1" cellspacing="0" cellpadding="0" width="80%" bgcolor="#ABCDEFG">';
        echo "<tr><td>".$row['id']."</td>";
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['month']."月".$row['day']."日</td></tr>";
        }
        echo '</table>';
        echo '<br/>';
        echo '<a href="../admin/index?p=1">'.'返回</a>';
    }
    if(!$result){
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('没有查询到有关信息');
        location.href='{$url}?p=1';
        </script>";
        exit;
      }
       break;
  case 'xlzx':
    $sql="SELECT * FROM xlzx WHERE title like '%{$keywords}%'";
    $result=$mysqli->query($sql);
    if($result && $result->num_rows>0){
      echo '<table border="1" cellspacing="0" cellpadding="0" width="80%" bgcolor="#ABCDEFG">
       <tr>
           <td>编号</td>
           <td>标题</td>
           <td>发布日期</td>
       </tr>';
    while($row=$result->fetch_assoc()){
        $rows[]=$row;
        //高亮显示
        $row['title']=preg_replace("/($keywords)/i","<b style=\"color:red\">\\1</b>",$row['title']); 
        //echo '<table border="1" cellspacing="0" cellpadding="0" width="80%" bgcolor="#ABCDEFG">';
        echo "<tr><td>".$row['id']."</td>";
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['month']."月".$row['day']."日</td></tr>";
        }
        echo '</table>';
        echo '<br/>';
        echo '<a href="../admin/index?p=1">'.'返回</a>';
    }
    if(!$result){
        $url="../admin/index";
        echo "<script type='text/javascript'>
        alert('没有查询到有关信息');
        location.href='{$url}?p=1';
        </script>";
        exit;
      }
       break;
}
?>