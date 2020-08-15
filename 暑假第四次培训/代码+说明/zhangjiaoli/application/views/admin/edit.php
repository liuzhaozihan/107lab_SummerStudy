<?php
header('content-type:text/html;charset=utf-8');
$mysqli=new mysqli('localhost','root','air0729.','summer4');
if($mysqli->connect_errno){
    die('CONNECT ERROR:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');
include_once 'tool.inc.php';
$link=connect();
//验证是否登录
include_once 'is_manage_login.php';
$id=$_GET['id'];
$act=$_GET['act'];
switch ($act) {
	case 'newslist':
		$sql="SELECT * FROM newslist WHERE id='{$id}';";
        $mysqli_result=$mysqli->query($sql);
        if($mysqli_result){
           $row=$mysqli_result->fetch_assoc();
        }
		break;
	case 'xlbk':
	    $sql="SELECT * FROM xlbk WHERE id='{$id}';";
        $mysqli_result=$mysqli->query($sql);
        if($mysqli_result){
           $row=$mysqli_result->fetch_assoc();
        }
		break;
	case 'xlbj':
	    $sql="SELECT * FROM xlbj WHERE id='{$id}';";
        $mysqli_result=$mysqli->query($sql);
        if($mysqli_result){
           $row=$mysqli_result->fetch_assoc();
        }
		break;
	case 'xlzx':
	    $sql="SELECT * FROM xlzx WHERE id='{$id}';";
        $mysqli_result=$mysqli->query($sql);
        if($mysqli_result){
           $row=$mysqli_result->fetch_assoc();
        }
		break;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>编辑文章</title>
	<link rel="stylesheet" href="<?php echo base_url().'style/admin/' ?>css/style.css" type="text/css" media="all" />
</head>
<body>
    <div class="box">
		<!-- Box Head -->
		<div class="box-head">
			<h2>Edit Article</h2>
		</div>
		<!-- End Box Head -->
					
		<form action="editAction?act=<?php echo $act?>&id=<?php echo $id?>" method="post" enctype="multipart/form-data">
						
            <!-- Form -->
            <div class="form">
               		<p>
						<span class="req">max 100 symbols</span>
						<label>Article Title <span>(Required Field)</span></label>
						<input type="text" class="field size1" name="title" value="<?php echo $row['title']?>" />
					</p>	
					<p class="inline-field">
						<label>Date</label>
					    <input type="text" name="month" value="<?php echo $row['month']?>">月
					    <input type="text" name="day" value="<?php echo $row['day']?>">日
					</p>
					<p class="inline-field">
					   	<label>Author</label>
					   	<input type="text" name="author" value="<?php echo $row['author']?>">
					</p>
					<p class="inline-field">
					   	<label>Id</label>
					   	<input type="text" name="id1" value="<?php echo $row['id']?>">
					</p>
					<p>
						<span class="req">max 100 symbols</span>
						<label>Content <span>(Required Field)</span></label>
						<textarea class="field size1" rows="10" cols="30" name="content"><?php echo $row['content']?></textarea>
					</p>
                    <p class="inline-field">
                    	<label>上传图片</label>
                    	<input type="file" name="myfile">
                    </p>
							
			</div>
			<!-- End Form -->
						
			<!-- Form Buttons -->
			<div class="buttons">
				<input type="button" class="button" value="preview" />
				<input type="submit" class="button" value="submit" />
			</div>
			<!-- End Form Buttons -->
		</form>
	</div>
	<!-- End Box -->
</body>
</html>