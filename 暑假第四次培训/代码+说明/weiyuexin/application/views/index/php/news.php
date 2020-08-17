<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>newslist-心理健康工作站-计算机与信息工程学院官网</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/index/' ?>css/public.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/index/' ?>css/news.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'style/index/' ?>css/footer.css">
	<script src="<?php echo base_url() . 'style/index/' ?>js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo base_url() . 'style/index/' ?>js/index.js"></script>
</head>
<body>
	<?php include("head.php"); ?>
	</div>
    <div class="content">
    	<div class="top">
    		<p>当前位置: 首页 &gt;&gt; 新闻公告</p>
    	</div>
    	<div class="bottom">
    		<div class="img">
    			<img src="<?php echo base_url() . 'style/index/' ?>images/newslist.jpg" alt="img">
    		</div>
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
                 <?php foreach($news as $v):  ?>
                    <tr>
                        <td><img src="<?php echo base_url() . 'style/index/' ?>images/list_icon.png ?>"></td>
                        <td class="title"><a href="<?php echo site_url('index/content/news_content/' . $v['id']) ?>"><?php echo msubstr($v['title'],0,25,1);?></a></td>
                        <td class="time"><?php echo date("Y年m月d日",$v['addtime']) ?></td> 
                    </tr>
                 <?php endforeach ?>
                </table>
                <!-- <div class="page">
                    <?php echo $links ?>
                </div> -->
    		</div>
    	</div>
    </div>
	<?php include("footer.php"); ?>
</body>
</html>