<?php 
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="<?php echo base_url().'style/admin/' ?>css/login.css"/>
	<title>登录</title>
	</head>
<body>
	<div class="left_img">
		<img src="<?php echo base_url().'style/admin/' ?>images/firefox_left.png" width="100%"/>
	</div>
	<div id="login_content">
		<div class="title"><h2>欢迎登录心理健康工作站后台</h2></div>
		<form class="form1" method="post" action="<?php echo site_url().'/admin/login/loginAction'?>">
			<label class="input-placeholder"><input type='text' name='login_name' id="username" class="username" placeholder="请输入用户名" /></label><br/>
			<label class="input-placeholder"><input type='password' name='login_pw' id="password" class="password" placeholder="请输入密码" /></label><br/>
			<label class="input-placeholder">
				<input type="text" name="captcha" id="captcha" placeholder="请输入验证码" />
				<img src="<?php echo base_url().'style/admin/' ?>images/captcha.php"  onclick="this.src='<?php echo base_url().'style/admin/' ?>images/captcha.php?' + Math.random();" width="105" height="36">
			</label>
			<div style="clear:both;"></div>
    	    <div class="login_option">
    	    	<input type="submit" value="立即登录" class="j_login" data-tj-key="b_login_click"/>
    	    </div>
		</form>
	</div>
	<div class="right_img">
    	<img src="<?php echo base_url().'style/admin/' ?>images/firefox_right.png" width="100%"/>
    </div>
</body>
</html>