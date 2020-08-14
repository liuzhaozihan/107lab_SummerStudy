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
$username=$_SESSION['login_name'];;
//分页
$page=1;
$page=$_GET['p'];
if(empty($page)){
  $page=1;
  } 
$sql="select * from newslist ORDER BY level DESC,month DESC,day DESC";
$mysqli_result=$mysqli->query($sql);
if($mysqli_result && $mysqli_result->num_rows>0){
    while($row=$mysqli_result->fetch_assoc()){
        $rows[]=$row;
    }
}

//心理百科
$sql1="select * from xlbk ORDER BY level DESC,month DESC,day DESC";
$mysqli_result1=$mysqli->query($sql1);
if($mysqli_result1 && $mysqli_result1->num_rows>0){
    while($content1=$mysqli_result1->fetch_assoc()){
        $contents1[]=$content1;
    }
}

//心理保健
$sql2="select * from xlbj ORDER BY level DESC,month DESC,day DESC";
$mysqli_result2=$mysqli->query($sql2);
if($mysqli_result2 && $mysqli_result2->num_rows>0){
    while($content2=$mysqli_result2->fetch_assoc()){
        $contents2[]=$content2;
    }
}

//心理咨询
$sql3="select * from xlzx ORDER BY level DESC,month DESC,day DESC";
$mysqli_result3=$mysqli->query($sql3);
if($mysqli_result3 && $mysqli_result3->num_rows>0){
    while($content3=$mysqli_result3->fetch_assoc()){
        $contents3[]=$content3;
    }
}

//留言板分页
$page=1;
$page=$_GET['p'];
if(empty($page)){
  $page=1;
  } 
$sql4="select * from mes_board ORDER BY date DESC limit ".($page-1) * 10 .",10 ";
$mysqli_result4=$mysqli->query($sql4);
if($mysqli_result4 && $mysqli_result4->num_rows>0){
    while($content4=$mysqli_result4->fetch_assoc()){
        $contents4[]=$content4;
    }
}
$to_sql="SELECT COUNT(*)FROM mes_board";
$result= $mysqli->query($to_sql);
$row1=mysqli_fetch_array($result);
$count=$row1[0];
$to_pages=ceil($count/10); //向上取整

//下载文件管理
$sql5="select * from download";
$mysqli_result5=$mysqli->query($sql5);
if($mysqli_result5 && $mysqli_result5->num_rows>0){
    while($content5=$mysqli_result5->fetch_assoc()){
        $contents5[]=$content5;
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Free CSS template by ChocoTemplates.com</title>
	<link rel="stylesheet" href="<?php echo base_url().'style/admin/' ?>css/style.css" type="text/css" media="all" />
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="#">计算机与信息工程学院-心理健康工作站后台</a></h1>
			<div id="top-navigation">
				Welcome <a href="#"><strong><?php echo $username;?></strong></a>
				<span>|</span>
				<a href="../login/logout">Log out</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="#" class="active"><span>新闻公告</span></a></li>
			    <li><a href="#" ><span>心理百科</span></a></li>
			    <li><a href="#" ><span>心理保健</span></a></li>
			    <li><a href="#" ><span>心理咨询</span></a></li>
			    <li><a href="#" ><span>留言板</span></a></li>
			    <li><a href="#" ><span>下载列表</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="#"></a>
			<span>&gt;</span>
			列表
		</div>
		<!-- End Small Nav -->
		
		<!-- Message OK -->		
		<div class="msg msg-ok">
			<p><strong>Your file was uploaded succesifully!</strong></p>
			<a href="#" class="close">close</a>
		</div>
		<!-- End Message OK -->		
		
		<!-- Message Error -->
		<div class="msg msg-error">
			<p><strong>You must select a file to upload first!</strong></p>
			<a href="#" class="close">close</a>
		</div>
		<!-- End Message Error -->
		<br />
		<!-- Main -->
		<div class="mains">
		    <div id="main">
			    <div class="cl">&nbsp;</div>
			
			    <!-- Content -->
			    <div id="content">
				
				    <!-- Box -->
				    <div class="box">
					    <!-- Box Head -->
					    <div class="box-head">
						    <h2 class="left">Current Articles</h2>
						    <div class="right">
						    	<label>search articles</label>
						    	<form action="../article/search?act=newslist" method="post" style="float: left;width: 200px;">
						    	   <input type="text" class="field small-field" name="keywords" />
						    	   <input type="submit" class="button" value="search" />
						    	</form>
						    </div>
					    </div>
					    <!-- End Box Head -->	

					    <!-- Table -->
					    <div class="table">
					    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
					    		<tr>
								    <th>题目</th>
								    <th>日期</th>
								    <th>作者</th>
								    <th width="110" class="ac">操作</th>
							    </tr>
							    <?php foreach ($rows as $row):?>
							    <tr>
							    	<td><h3><a href="../../index/home/content?act=newslist&id=<?php echo $row['id']?>"><?php echo $row['title']?></a></h3></td>
							    	<td><?php echo $row['month'].'月'.$row['day'].'日';?></td>
							    	<td><a href="#"><?php echo $row['author']?></a></td>
							    	<td><a href="../article/delete?act=newslist&id=<?php echo $row['id'];?>" class="ico del">Delete</a><a href="../article/edit?act=newslist&id=<?php echo $row['id'];?>" class="ico edit">Edit</a>
							    	    <?php if($row['level']){
                                             echo '<a href="../article/topAction?act=news_cancle&id='.$row['id'].'">取消置顶</a>';
                                          }else{
                                             echo '<a href="../article/topAction?act=news_istop&id='.$row['id'].'">置顶</a>';
                                          }
                                        ?>
							    	</td>
							    </tr>
							    <?php endforeach; ?>
						    </table>
						
					    </div>
					    <!-- Table -->
					
				    </div>
				    <!-- End Box -->
				
				    <!-- Box -->
				    <div class="box">
				    	<!-- Box Head -->
				    	<div class="box-head">
				    		<h2>Add New Article</h2>
				    	</div>
				    	<!-- End Box Head -->
					
				    	<form action="../article/addAction?act=newslist" method="post">
						
				    		<!-- Form -->
				    		<div class="form">
				    				<p>
					    				<span class="req">max 100 symbols</span>
					    				<label>Article Title <span>(Required Field)</span></label>
					    				<input type="text" class="field size1" name="title"/>
					    			</p>	
					    			<p class="inline-field">
					    				<label>Date</label>
					    				<input type="text" name="month">月
					    				<input type="text" name="day">日
								    </p>
								    <p class="inline-field">
					    				<label>Author</label>
					    				<input type="text" name="author">
								    </p>
								    <p class="inline-field">
					    				<label>Id</label>
					    				<input type="text" name="id">
								    </p>
								    <p>
									    <span class="req">max 100 symbols</span>
									    <label>Content <span>(Required Field)</span></label>
									    <textarea class="field size1" rows="10" cols="30" name="content"></textarea>
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

			    </div>
			    <!-- End Content -->
			
			    <div class="cl">&nbsp;</div>			
		    </div>
		    <div id="main">
			    <div class="cl">&nbsp;</div>
			
			    <!-- Content -->
			    <div id="content">
				
			    	<!-- Box -->
			    	<div class="box">
					    <!-- Box Head -->
			    		<div class="box-head">
			    			<h2 class="left">Current Articles</h2>
			    			<div class="right">
			    				<label>search articles</label>
			    				<form action="../article/search?act=xlbk" method="post" style="float: left;width: 200px;">
						    	   <input type="text" class="field small-field" name="keywords" />
						    	   <input type="submit" class="button" value="search" />
						    	</form>
			    			</div>
				    	</div>
				    	<!-- End Box Head -->	

				    	<!-- Table -->
				    	<div class="table">
				    		<table width="100%" border="0" cellspacing="0" cellpadding="0">
				    			<tr>
				    				<th>题目</th>
				    				<th>日期</th>
				    				<th>作者</th>
				    				<th width="110" class="ac">操作</th>
				    			</tr>
							    <?php foreach ($contents1 as $content1):?>
							    <tr>
							    	<td><h3><a href="../../index/home/content?act=xlbk&id=<?php echo $content1['id']?>"><?php echo $content1['title']?></a></h3></td>
								    <td><?php echo $content1['month'].'月'.$content1['day'].'日';?></td>
								    <td><a href="#"><?php echo $content1['author']?></a></td>
								    <td><a href="../article/delete?act=xlbk&id=<?php echo $content1['id'];?>" class="ico del">Delete</a><a href="../article/edit?act=xlbk&id=<?php echo $content1['id'];?>" class="ico edit">Edit</a>
								    	<?php if($content1['level']){
                                             echo '<a href="../article/topAction?act=bk_cancle&id='.$content1['id'].'">取消置顶</a>';
                                          }else{
                                             echo '<a href="../article/topAction?act=bk_istop&id='.$content1['id'].'">置顶</a>';
                                          }
                                        ?>
								    </td>
							    </tr>
							    <?php endforeach; ?>
						    </table>
						
					    </div>
					    <!-- Table -->
					
				    </div>
				    <!-- End Box -->
				
				    <!-- Box -->
				    <div class="box">
					    <!-- Box Head -->
					    <div class="box-head">
					    	<h2>Add New Article</h2>
					    </div>
					    <!-- End Box Head -->
					
					    <form action="../article/addAction?act=xlbk" method="post">
						
						    <!-- Form -->
						    <div class="form">
								    <p>
								    	<span class="req">max 100 symbols</span>
								    	<label>Article Title <span>(Required Field)</span></label>
								    	<input type="text" class="field size1" name="title"/>
								    </p>	
								    <p class="inline-field">
									    <label>Date</label>
					    				<input type="text" name="month">月
					    				<input type="text" name="day">日
								    </p>
								    <p class="inline-field">
					    				<label>Author</label>
					    				<input type="text" name="author">
								    </p>
								    <p class="inline-field">
					    				<label>Id</label>
					    				<input type="text" name="id">
								    </p>
								    <p>
								    	<span class="req">max 100 symbols</span>
								    	<label>Content <span>(Required Field)</span></label>
								    	<textarea class="field size1" rows="10" cols="30" name="content"></textarea>
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

			    </div>
			    <!-- End Content -->
			
			    <div class="cl">&nbsp;</div>			
		    </div>
		    <div id="main">
			    <div class="cl">&nbsp;</div>
			
			    <!-- Content -->
			    <div id="content">
				
			    	<!-- Box -->
			    	<div class="box">
					    <!-- Box Head -->
				    	<div class="box-head">
				    		<h2 class="left">Current Articles</h2>
				    		<div class="right">
				    			<label>search articles</label>
				    			<form action="../article/search?act=xlbj" method="post" style="float: left;width: 200px;">
						    	   <input type="text" class="field small-field" name="keywords" />
						    	   <input type="submit" class="button" value="search" />
						    	</form>
				    		</div>
				    	</div>
				    	<!-- End Box Head -->	

					    <!-- Table -->
					    <div class="table">
					    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
					    		<tr>
					    			<th>题目</th>
					    			<th>日期</th>
					    			<th>作者</th>
					    			<th width="110" class="ac">操作</th>
					    		</tr>
					    		<?php foreach ($contents2 as $content2):?>
							    <tr>
								    <td><h3><a href="../../index/home/content?act=xlbj&id=<?php echo $content2['id']?>"><?php echo $content2['title']?></a></h3></td>
								    <td><?php echo $content2['month'].'月'.$content2['day'].'日';?></td>
							    	<td><a href="#"><?php echo $content2['author']?></a></td>
								    <td><a href="../article/delete?act=xlbj&id=<?php echo $content2['id'];?>" class="ico del">Delete</a><a href="../article/edit?act=xlbj&id=<?php echo $content2['id'];?>" class="ico edit">Edit</a>
								    	<?php if($content2['level']){
                                             echo '<a href="../article/topAction?act=bj_cancle&id='.$content2['id'].'">取消置顶</a>';
                                          }else{
                                             echo '<a href="../article/topAction?act=bj_istop&id='.$content2['id'].'">置顶</a>';
                                          }
                                        ?>
								    </td>
							    </tr>
							    <?php endforeach; ?>
						    </table>
						
					    </div>
					    <!-- Table -->
					
				    </div>
				    <!-- End Box -->
				
				    <!-- Box -->
				    <div class="box">
				    	<!-- Box Head -->
				    	<div class="box-head">
				    		<h2>Add New Article</h2>
				    	</div>
				    	<!-- End Box Head -->
					
					    <form action="../article/addAction?act=xlbj" method="post">
						
						    <!-- Form -->
						    <div class="form">
						    		<p>
						    			<span class="req">max 100 symbols</span>
						    			<label>Article Title <span>(Required Field)</span></label>
									    <input type="text" class="field size1" name="title" />
								    </p>	
								    <p class="inline-field">
								    	<label>Date</label>
					    				<input type="text" name="month">月
					    				<input type="text" name="day">日
								    </p>
								    <p class="inline-field">
					    				<label>Author</label>
					    				<input type="text" name="author">
								    </p>
								    <p class="inline-field">
					    				<label>Id</label>
					    				<input type="text" name="id">
								    </p>
								    <p>
								    	<span class="req">max 100 symbols</span>
								    	<label>Content <span>(Required Field)</span></label>
								    	<textarea class="field size1" rows="10" cols="30" name="content"></textarea>
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

			    </div>
			    <!-- End Content -->
			
			    <div class="cl">&nbsp;</div>			
		    </div>
		    <div id="main">
			    <div class="cl">&nbsp;</div>
			
			    <!-- Content -->
			    <div id="content">
				
			    	<!-- Box -->
			    	<div class="box">
					    <!-- Box Head -->
				    	<div class="box-head">
				    		<h2 class="left">Current Articles</h2>
				    		<div class="right">
				    			<label>search articles</label>
				    			<form action="../article/search?act=xlzx" method="post" style="float: left;width: 200px;">
						    	   <input type="text" class="field small-field" name="keywords" />
						    	   <input type="submit" class="button" value="search" />
						    	</form>
				    		</div>
				    	</div>
				    	<!-- End Box Head -->	

					    <!-- Table -->
					    <div class="table">
					    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
					    		<tr>
					    			<th>题目</th>
					    			<th>日期</th>
					    			<th>作者</th>
					    			<th width="110" class="ac">操作</th>
					    		</tr>
					    		<?php foreach ($contents3 as $content3):?>
							    <tr>
								    <td><h3><a href="../../index/home/content?act=xlzx&id=<?php echo $content3['id']?>"><?php echo $content3['title']?></a></h3></td>
								    <td><?php echo $content3['month'].'月'.$content3['day'].'日';?></td>
							    	<td><a href="#"><?php echo $content3['author']?></a></td>
								    <td><a href="../article/delete?act=xlzx&id=<?php echo $content3['id'];?>" class="ico del">Delete</a><a href="../article/edit?act=xlzx&id=<?php echo $content3['id'];?>" class="ico edit">Edit</a>
								    	<?php if($row['level']){
                                             echo '<a href="../article/topAction?act=zx_cancle&id='.$row['id'].'">取消置顶</a>';
                                          }else{
                                             echo '<a href="../article/topAction?act=zx_istop&id='.$row['id'].'">置顶</a>';
                                          }
                                        ?>
								    </td>
							    </tr>
							    <?php endforeach; ?>
						    </table>
						
					    </div>
					    <!-- Table -->
					
				    </div>
				    <!-- End Box -->
				
				    <!-- Box -->
				    <div class="box">
				    	<!-- Box Head -->
				    	<div class="box-head">
				    		<h2>Add New Article</h2>
				    	</div>
				    	<!-- End Box Head -->
					
					    <form action="../article/addAction?act=xlzx" method="post">
						
						    <!-- Form -->
						    <div class="form">
						    		<p>
						    			<span class="req">max 100 symbols</span>
						    			<label>Article Title <span>(Required Field)</span></label>
									    <input type="text" class="field size1" name="title"/>
								    </p>	
								    <p class="inline-field">
								    	<label>Date</label>
					    				<input type="text" name="month">月
					    				<input type="text" name="day">日
								    </p>
								    <p class="inline-field">
					    				<label>Author</label>
					    				<input type="text" name="author">
								    </p>
								    <p class="inline-field">
					    				<label>Id</label>
					    				<input type="text" name="id">
								    </p>
								    <p>
								    	<span class="req">max 100 symbols</span>
								    	<label>Content <span>(Required Field)</span></label>
								    	<textarea class="field size1" rows="10" cols="30" name="content"></textarea>
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

			    </div>
			    <!-- End Content -->
			
			    <div class="cl">&nbsp;</div>			
		    </div>
		    <div id="main">
			    <div class="cl">&nbsp;</div>
			
			    <!-- Content -->
			    <div id="content">
				
			    	<!-- Box -->
			    	<div class="box">
					    <!-- Box Head -->
				    	<div class="box-head">
				    		<h2 class="left">Current Message</h2>
				    	</div>
				    	<!-- End Box Head -->	

					    <!-- Table -->
					    <div class="table">
					    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
					    		<tr>
					    			<th>邮箱</th>
					    			<th>日期</th>
					    			<th>内容</th>
					    		</tr>
					    		<?php foreach ($contents4 as $content4):?>
							    <tr>
								    <td><h3><?php echo $content4['mail']?></h3></td>
								    <td><?php echo $content4['date'];?></td>
							    	<td><?php echo $content4['content']?></td>
							    </tr>
							    <?php endforeach; ?>
						    </table>
						    <!-- Pagging -->
						    <div class="pagging">
						    	<div class="left">Showing 10 of all</div>
						    	<div class="right">
							    	<?php 
                                     if($page<=1){
                                        echo "<button type='button'><a href='".$_SERVER['PHP_SELF']."?p=1'>上一页</a></button>";
                                     }else{
                                        echo "<button type='button'><a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'>上一页</a></button>";
                                     }
                                     if ($page<$to_pages){
                                        echo "<button type='button'><a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页</a></button>";
                                     }else{
                                        echo "<button type='button'><a href='".$_SERVER['PHP_SELF']."?p=".($to_pages)."'>下一页</a></button>";
                                     }
                                    ?>
							    </div>
						    </div>
						    <!-- End Pagging -->
					    </div>
					    <!-- Table -->
					
				    </div>
				    <!-- End Box -->
				
			    </div>
			    <!-- End Content -->
			
			    <div class="cl">&nbsp;</div>			
		    </div>
		    <div id="main">
			    <div class="cl">&nbsp;</div>
			
			    <!-- Content -->
			    <div id="content">
				
			    	<!-- Box -->
			    	<div class="box">
					    <!-- Box Head -->
				    	<div class="box-head">
				    		<h2 class="left">Current files</h2>
				    	</div>
				    	<!-- End Box Head -->	

					    <!-- Table -->
					    <div class="table">
					    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
					    		<tr>
					    			<th>文件名</th>
					    			<th>保存路径</th>
					    			<th width="110" class="ac">操作</th>
					    		</tr>
					    		<?php foreach ($contents5 as $content5):?>
							    <tr>
								    <td><h3><?php echo $content5['filename']?></h3></td>
								    <td><?php echo base_url().$content5['path'].$content5['filename'];?></td>
							    	<td><a href="../article/delete?act=download&filename=<?php echo $content5['filename'];?>" class="ico del">Delete</a></td>
							    </tr>
							    <?php endforeach; ?>
						    </table>
					    </div>
					    <!-- Table -->
					    
				    </div>
				    <!-- End Box -->

				    <!-- Box -->
				    <div class="box">
					    <!-- Box Head -->
					    <div class="box-head">
					    	<h2>Add New file</h2>
					    </div>
					    <!-- End Box Head -->
					
					    <form action="../article/addAction?act=download" method="post" enctype="multipart/form-data">
						
						    <!-- Form -->
						    <div class="form">
								    <p class="inline-field">
                    	                <label>上传文件</label>
                    	                <input type="file" name="file">
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
				    
			    </div>
			    <!-- End Content -->
			
			    <div class="cl">&nbsp;</div>			
		    </div>
		</div>
		<!-- Mains -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->
<div id="footer">
	<div class="shell">
		<span class="left">&copy; 2010 - CompanyName</span>
		<span class="right">
			Design by <a href="http://chocotemplates.com" target="_blank" title="The Sweetest CSS Templates WorldWide">Chocotemplates.com</a>
		</span>
	</div>
</div>
<!-- End Footer -->
	<script type="text/javascript" src="<?php echo base_url().'style/admin/' ?>js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'style/admin/' ?>js/admin_style.js"></script>
</body>
</html>