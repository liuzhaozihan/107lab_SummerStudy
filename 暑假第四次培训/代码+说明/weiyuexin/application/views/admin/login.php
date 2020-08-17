<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>心理健康工作站后台管理页登录</title>

	<link rel="stylesheet" href="<?php echo base_url() . 'style/admin/' ?>css/login.css" />
	<script type="text/javascript" src="<?php echo base_url() . 'style/admin/' ?>js/jquery-3.3.1.min.js"></script>
</head>
<body>
	<form action="<?php echo site_url('admin/login/login_in') ?>" method="POST" id="login">
		<div class="login-box" id="demo">
			<div class="input-content">
				<div class="login_tit">
					<div>
						<i class="tit-bg left"></i>
						后台管理 · 登录页面
						<i class="tit-bg right"></i>
					</div>
					<p>Happy&nbsp;&nbsp;&nbsp;&nbsp;Everyday</p>
				</div>    
				<p class="p user_icon">
					<input type="text" placeholder="请输入管理员账号" class="login_txtbx" name="username">
				</p> 
				<p class="p pwd_icon">
					<input type="password" placeholder="请输入密码"  class="login_txtbx" name="password">
				</p>     	
				<div class="p val_icon">
					<div class="checkcode">
						<input type="text" id="J_codetext" placeholder="验证码"  maxlength="4" class="login_txtbx" name="captcha">
						<img src="<?php echo site_url('admin/login/code') ?>">
					</div>
				</div>      
				<div class="signup">
					<input type="submit" name="submit" value="登录" class="gv">
					<a class="gv" href="<?php echo site_url() . '/admin/register' ?>">注&nbsp;&nbsp;册</a>
				</div>
			</div>
			<div class="canvaszz"> </div>
			<canvas id="canvas"></canvas> 
		</div>
	</form>







	<script>
		//宇宙特效
		"use strict";
		var canvas = document.getElementById('canvas'),
		ctx = canvas.getContext('2d'),
		w = canvas.width = window.innerWidth,
		h = canvas.height = window.innerHeight,

		hue = 217,
		stars = [],
		count = 0,
		maxStars = 2500;//星星数量

		var canvas2 = document.createElement('canvas'),
		ctx2 = canvas2.getContext('2d');
		canvas2.width = 100;
		canvas2.height = 100;
		var half = canvas2.width / 2,
		gradient2 = ctx2.createRadialGradient(half, half, 0, half, half, half);
		gradient2.addColorStop(0.025, '#CCC');
		gradient2.addColorStop(0.1, 'hsl(' + hue + ', 61%, 33%)');
		gradient2.addColorStop(0.25, 'hsl(' + hue + ', 64%, 6%)');
		gradient2.addColorStop(1, 'transparent');

		ctx2.fillStyle = gradient2;
		ctx2.beginPath();
		ctx2.arc(half, half, half, 0, Math.PI * 2);
		ctx2.fill();

		// End cache

		function random(min, max) {
			if (arguments.length < 2) {
				max = min;
				min = 0;
			}

			if (min > max) {
				var hold = max;
				max = min;
				min = hold;
			}

			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

		function maxOrbit(x, y) {
			var max = Math.max(x, y),
			diameter = Math.round(Math.sqrt(max * max + max * max));
			return diameter / 2;
		  //星星移动范围，值越大范围越小，
		}

		var Star = function() {

			this.orbitRadius = random(maxOrbit(w, h));
			this.radius = random(60, this.orbitRadius) / 18; 
		    //星星大小
		    this.orbitX = w / 2;
		    this.orbitY = h / 2;
		    this.timePassed = random(0, maxStars);
		    this.speed = random(this.orbitRadius) / 500000; 
		    //星星移动速度
		    this.alpha = random(2, 10) / 10;
  
		    count++;
		    stars[count] = this;
		}

		Star.prototype.draw = function() {
			var x = Math.sin(this.timePassed) * this.orbitRadius + this.orbitX,
			y = Math.cos(this.timePassed) * this.orbitRadius + this.orbitY,
			twinkle = random(10);

			if (twinkle === 1 && this.alpha > 0) {
				this.alpha -= 0.05;
			} else if (twinkle === 2 && this.alpha < 1) {
				this.alpha += 0.05;
			}

			ctx.globalAlpha = this.alpha;
			ctx.drawImage(canvas2, x - this.radius / 2, y - this.radius / 2, this.radius, this.radius);
			this.timePassed += this.speed;
		}

		for (var i = 0; i < maxStars; i++) {
			new Star();
		}

		function animation() {
			ctx.globalCompositeOperation = 'source-over';
		    ctx.globalAlpha = 0.5; //尾巴
		    ctx.fillStyle = 'hsla(' + hue + ', 64%, 6%, 2)';
		    ctx.fillRect(0, 0, w, h)

		    ctx.globalCompositeOperation = 'lighter';
		    for (var i = 1, l = stars.length; i < l; i++) {
		  	  stars[i].draw();
		    };

		    window.requestAnimationFrame(animation);
		}

		animation();
    </script>
</body>
</html>