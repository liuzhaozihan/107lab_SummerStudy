<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>心理健康工作站-计算机与信息工程学院官网</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/index/' ?>css/public.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/index/' ?>css/index.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/index/' ?>css/footer.css">
	<link rel="stylesheet" href="<?php echo base_url() . 'style/index/' ?>css/swiper-bundle.min.css">
	<script src="<?php echo base_url() . 'style/index/' ?>js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo base_url() . 'style/index/' ?>js/index.js"></script>
	<script src="<?php echo base_url() . 'style/index/' ?>js/swiper-bundle.min.js"></script>
</head>
<body>
	<div class="head">
		<div class="add">
			<ul class="ul1">
				<li class="li1 shouye">设为首页</li>
				<li class="li1">|</li>
				<li class="li1 shoucang">加入收藏</li>
				<li class="li2"><a href="<?php echo site_url() . '/admin/register' ?>">注册</a></li>
				<li class="li2"><a href="<?php echo site_url() . '/admin/login' ?>">登录</a></li>
			</ul>
		</div>
		<div class="logo">
			<a href="<?php echo site_url() . '/index/home/index' ?>"><img src="<?php echo base_url() . 'style/index/' ?>images/ICON.png"></a>
		</div>
		<div class="menu">
			<ul>
				<li class="first">
					<a href="">首页</a>
				</li>
				<li>
					<a href="<?php echo site_url() . '/index/home/jianjie' ?>">关于我们</a>
					<ol>
						<a href="<?php echo site_url() . '/index/home/jianjie' ?>"><li>中心简介</li></a>
						<a href=""><li>服务内容</li></a>
						<a href=""><li>师资队伍</li></a>
					</ol>
				</li>
				<li>
					<a href="<?php echo site_url() . '/index/home/news' ?>">新闻公告</a>
					<ol>
						<a href="<?php echo site_url() . '/index/home/news' ?>"><li>中心动态</li></a>
						<a href="<?php echo site_url() . '/index/home/news' ?>"><li>学院风采</li></a>
						<a href="<?php echo site_url() . '/index/home/news' ?>"><li>朋辈成长</li></a>
						<a href="<?php echo site_url() . '/index/home/news' ?>"><li>教师园地</li></a>
					</ol>
				</li>
				<li>
					<a href="">心理百科</a>
					<ol>
						<a href=""><li>心理常识</li></a>
						<a href=""><li>最新发现</li></a>
					</ol>
				</li>
				<li>
					<a href="">心理保健</a>
					<ol>
						<a href=""><li>情感美文</li></a>
						<a href=""><li>开心一刻</li></a>
					</ol>
				</li>
				<li>
					<a href="">心理咨询</a>
					<ol>
						<a href=""><li>资讯常识</li></a>
						<a href=""><li>药品指南</li></a>
					</ol>
				</li>
				<li>
					<a href="">心理测评</a>
					<ol>
						<a href=""><li>心灵普查</li></a>
						<a href=""><li>趣味检测</li></a>
						<a href=""><li>专业问卷</li></a>
					</ol>
				</li>
				<li>
					<a href="">专题活动</a>
				</li>
				<li>
					<a href="<?php echo site_url() . '/index/home/download' ?>">下载中心</a>
				</li>
				<li>
					<a href="<?php echo site_url() . '/index/home/liuyan' ?>">我要留言</a>
				</li>
			</ul>
		</div>
	</div>

    <!-- 轮播图 start -->
    <div class="banner">
	    <?php include("php/silider.php"); ?>
	</div>
	<!-- 轮播图 end -->

    <div class="content">
    	<div class="top">
    		<div class="img">
    			<?php include("php/silider_small.php"); ?>
    		</div>
    		<div class="news">
    			<div class="newsTop">
    				<p><a href="<?php echo site_url() . '/index/home/news' ?>">新闻公告</a></p>
    			</div>
    			<div class="newsContent">
    				<?php
                    function msubstr($str, $start=0, $length,$suffix=true,$charset="utf-8" )
                    {
                        $flag=0;
                        if(function_exists("mb_substr")){
                            $slice=mb_substr($str, $start, $length, $charset);
                            $flag=1;
                        }elseif(function_exists('iconv_substr')) {
                            $slice=iconv_substr($str,$start,$length,$charset);
                            $flag=1;
                        }
                        $re['utf-8']   = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef][x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";
                        $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";
                        $re['gbk']    = "/[x01-x7f]|[x81-xfe][x40-xfe]/";
                        $re['big5']   = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";
                        preg_match_all($re[$charset], $str, $match);
                        if($flag==1){
                            if($suffix) return $slice."...";
                            return $slice; 
                        }else{
                            $slice = join("",array_slice($match[0], $start, $length));
                            if($suffix) return $slice."...";
                            return $slice; 
                        }
                    }
                    ?>
                         <div class="newslist">
	            	         <table class="table">
	            		         <?php foreach($index_news as $v):  ?>
	            			         <tr>
	            				        <td><img src="<?php echo base_url() . 'style/index/' ?>images/list_icon.png ?>"></td>
	            				        <td class="title"><a href="<?php echo site_url('index/content/news_content/' . $v['id']) ?>"><?php echo msubstr($v['title'],0,25,1);?></a></td>
	            				        <td class="time" style="float: right;"><?php echo date("Y年m月d日",$v['addtime']) ?></td>
	            			         </tr>
	            		         <?php endforeach ?>
	            	         </table>
                         </div>
                   </div>
    		</div>
    	</div>
    	<div class="bottom">
    		<div class="jianjie">
    			<div class="jianjie_top">
    				<p><a href="<?php echo site_url() . '/index/home/jianjie' ?>">中心简介</a></p>
    			</div>
    			<div class="jianjie_content">
    				<p>&nbsp;&nbsp;计算机与信息工程学院心理健康教育工作站始建于2015年3月，在学院101办公室，占地面积50平方米。工作站领导小组由学院党委副书记、各年级辅导员、年级朋辈辅导员组成。工作站宗旨以增强学生的心理素质为目的，以普及心理健康知识...<a href="<?php echo site_url() . '/index/home/jianjie' ?>">详细</a></p>
    			</div>
    		</div>
    		<div class="xinli">
    			<div class="xinli_top">
    				<ul>
    					<li class="hover baike"><a href="<?php echo site_url() . '/index/home/baike' ?>">心理百科</a></li>
    					<li class="baojian"><a href="<?php echo site_url() . '/index/home/baojian' ?>">心理保健</a></li>
    					<li class="zixun"><a href="<?php echo site_url() . '/index/home/zixun' ?>">心理咨询</a></li>
    				</ul>
    			</div>
    			<div class="xinli_content">
    				<ul>
    					<li class="baike">
    						<table>
    							<?php foreach($index_baike as $v):  ?>
    								<tr>
    									<td><img src="<?php echo base_url() . 'style/index/' ?>images/list_tabicon.png ?>"></td>
    									<td><a href="<?php echo site_url('index/content/baike_content/' . $v['id']) ?>"><?php echo $v['title'] ?></a></td>
    								</tr>
    							<?php endforeach ?>
    						</table>
    					</li>
    					<li class="baojian">
    						<table>
    							<?php foreach($index_baojian as $v):  ?>
    								<tr>
    									<td><img src="<?php echo base_url() . 'style/index/' ?>images/list_tabicon.png ?>"></td>
    									<td><a href="<?php echo site_url('index/content/baojian_content/' . $v['id']) ?>"><?php echo $v['title'] ?></a></td>
    								</tr>
    							<?php endforeach ?>
    						</table>
    					</li>
    					<li class="zixun">
    						<table>
    							<?php foreach($index_zixun as $v):  ?>
    								<tr>
    									<td><img src="<?php echo base_url() . 'style/index/' ?>images/list_tabicon.png ?>"></td>
    									<td><a href="<?php echo site_url('index/content/zixun_content/' . $v['id']) ?>"><?php echo $v['title'] ?></a></td>
    								</tr>
    							<?php endforeach ?>
    						</table>
    					</li>
    				</ul>
    			</div>
    		</div>
    		<div class="download">
    			<div class="download_top">
    				<p><a href="<?php echo site_url() . '/index/home/download' ?>">下载中心</a></p>
    			</div>
    			<div class="download_content">
    				<table>
    					<?php foreach($index_download as $v):  ?>
    						<tr>
    							<td><img src="<?php echo base_url() . 'style/index/' ?>images/list_tabicon.png ?>"></td>
    							<td><a href="<?php echo base_url('uploads/' . $v['filename']) ?>"><?php echo msubstr($v['title'],0,15,1);?></a></td>  
    						</tr>
    					<?php endforeach ?>
    				</table>
    			</div>
    		</div>
    	</div>
    </div>

	<?php include('php/footer.php');  ?>
</body>
</html>