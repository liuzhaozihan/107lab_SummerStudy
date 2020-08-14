<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>留言板-统战部</title>
		<link rel="stylesheet" href="css/new_file.css">
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/new_file.js"></script>
	</head>
	<body>
		<!-- 图片头部 -->
		<div class="head">
			<div class="backgroundimg">
				<img src="img/top-bj2.gif" alt="">
			</div>
			<div class="headconcent">
				<div class="settings">
					<span>设为首页</span>
					<span>|</span>
					<span>加入收藏</span>
				</div>
				<div class="searchbox covercss">
					<input class="search" placeholder="请输入搜索关键字" type="text">
					<input class="button" type="button" value="搜索">
				</div>
			</div>
		</div>
		<!-- 下拉菜单 -->
		<div class="navbardiv">
			<div class="navbar">
				<ul class="navfir">
					<li><a href="../start/start.html">首页</a>
					</li>
					<li><a href="">部门介绍</a>
						<ul class="navsec">
							<li><a href="">工作职责</a></li>
							<li><a href="">机构和人员</a></li>
							<li><a href="">领导小组</a></li>
						</ul>
					</li>
					<li><a href="">党派团体</a>
						<ul class="navsec">
							<li><a href="">民革河南大学支部</a></li>
							<li><a href="">民盟河南大学委员会</a></li>
							<li><a href="">民进河南大学总支委员会</a></li>
							<li><a href="">民建河南大学总支委员会</a></li>
							<li><a href="">农工党河南大学委员会</a></li>
							<li><a href="">九三学舍河南大学委员会</a></li>
							<li><a href="">河南大学台联</a></li>
							<li><a href="">河南大学侨联</a></li>
							<li><a href="">河南大学知联会</a></li>
							<li><a href="">河南大学留联会</a></li>
						</ul>
					</li>
					<li><a href="">人大政协</a>
						<ul class="navsec">
							<li><a href="">人大政协</a></li>
						</ul>
					</li>
					<li><a href="">建言献策</a>
						<ul class="navsec">
							<li><a href="">建言献策</a></li>
						</ul>
					</li>
					<li><a href="">政策法规</a>
						<ul class="navsec">
							<li><a href="">理论经纬</a></li>
							<li><a href="">学习资料</a></li>
							<li><a href="">会议纪要</a></li>
							<li><a href="">工作记事</a></li>
						</ul>
					</li>
					<li><a href="">民族宗教</a>
						<ul class="navsec">
							<li><a href="">民族工作</a></li>
							<li><a href="">宗教工作</a></li>
						</ul>
					</li>
					<li><a href="../download/download.html">下载专区</a>
						<ul class="navsec">
							<li><a href="../download/download.html" target="_self">资料下载</a></li>
						</ul>
					</li>
					<li><a href="">联系我们</a>
						<ul class="navsec">
							<li><a href="">留言板</a></li>
							<li><a href="">微博</a></li>
							<li><a href="">联系方式</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<!-- 中间部分 -->
		<div class="operationdiv">
			<div class="operation">
				<div class="leftbar">
					<div class="contacttips">
						<span>留言板</span>
						<div style="border-bottom:3px dashed rgb(153, 153, 153) ;"></div>
						<a href=""><span>留言板</span></a>
						<a href=""><span>微博</span></a>
						<a href=""><span>联系方式</span></a>
					</div>
					<div class="img">
						<span>校园风光</span>
						<div style="border-bottom:3px dashed rgb(153, 153, 153) ;"></div>
						<ul>
							<li><img src="img/nature2.jpg" alt=""></li>
							<li><img src="img/nature3.jpg" alt=""></li>
							<li><img src="img/nature4.jpg" alt=""></li>
						</ul>
					</div>
						<div class="morelinks">
						<span>相关连接</span>
						<div style="border-bottom:3px dashed rgb(153, 153, 153) ;"></div>
						<a href="http://www.zytzb.gov.cn/html/index.html"><span>中共中央统一战线工作部</span></a>
						<a href="http://www.rootinhenan.gov.cn/sitesources/rootinhenan/page_pc/index.html"><span>中共河南省委统战部</span></a>
						<a href="http://kf.rootinhenan.gov.cn/sitesources/kf/page_pc/index.html"><span>开封市统战部</span></a>
						<a href="http://www.henu.edu.cn/"><span>河南大学</span></a>
						<a href="http://tzb.henu.edu.cn/index/hdtzzz.htm"><span>“河大统战”杂志</span></a>
					</div>
				</div>
				<div class="messageboard">
					<div class="title">
						<div class="title">
							<div class="room">
								<img src="img/icon-index.png" alt="">
							</div>
							<span>当前位置 : </span>
							<a href="../start/start.html" class="start"><span>首页&nbsp;&nbsp;></span></a>
							<a href=""><span class="fordown">&nbsp;&nbsp;联系我们&nbsp;&nbsp; ></span></a>
							<a href=""><span class="down">&nbsp;&nbsp;留言板</span></a>
						</div>
						<div style="border-bottom:2px dashed rgb(153, 153, 153) ;"></div>
					</div>
					<div class="leavemessage">
						<form action="">
							<span class="goout">
								<span>用户名：</span><input type="text" name="username">
								<span>密码：</span><input type="password" name="userpassword">
							</span>
							<input type="checkbox" onclick="out()" class="anoy"><span>匿名发言</span><br>
							<span>标题：</span><input type="text" max="40">
							<span>*(标题限制40个字符以内)</span>
							<input type="submit">
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- 底部 -->
		<div class="foot">
			
		</div>
		<div class="information">
			<p>Copyright &copy; 2019 河南大学党委统战部 技术支持河南大学 <a href="#">107网站工作室</a> <a href="#">管理后台</a></p>
			<p>地址：中国 河南 开封.明伦街/金明大道 邮编：475001/475004 电话：0371-265666428</p>
		</div>
	</body>
</html>
