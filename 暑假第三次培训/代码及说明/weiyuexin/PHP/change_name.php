<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="icon" href="../images/校徽.jpg" type="image/gif" >
		<title>更改管理员昵称</title>
		<link rel="stylesheet" href="../css/login.css">
		<script src="../js/jquery-3.3.1.min.js"></script>
		<script src="../js/index.js"></script>
	</head>
	<body>
		<div class="login">
			<?php
		  		$username = $_GET['username'];

		 	?>
			<div class="title">
				<h1 style="font-size: 28px;">更改管理员昵称</h1>
			</div>
			<form action="change_namecheck.php" method="post">
				<input type="hidden" name="username1" value="<?php  echo $username ; ?>">
				<div class="username">
					<input type="text" name="username2" placeholder="请输入新昵称" id="username">
				</div>
				<div class="button">
					<input type="submit"  value ="确认更改" name="submit">
				</div>
			</form>
		</div>
		<div class="footer">
			<br><br><br>
			<p>Copyright © 2019 河南大学党委统战部 技术支持<span>河南大学 </span><span>107网站工作室</span><span> 管理后台</span></p>
			<p>地址：中国 河南 开封.明伦街/金明大道 邮编：475001/475004 电话：0371-265666428</p>
		</div>
	</body>
</html>