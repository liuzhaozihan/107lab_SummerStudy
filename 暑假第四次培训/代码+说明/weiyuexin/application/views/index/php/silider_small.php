
<div class="swiper-container">
	<div class="swiper-wrapper">
		<div class="swiper-slide"><a href="https://github.com/" target="_black"><img src="<?php echo base_url() . 'style/index/' ?>images/news_image1.jpg"></a></div>
		<div class="swiper-slide"><a href="https://gitee.com/" target="_black"><img src="<?php echo base_url() . 'style/index/' ?>images/news_image2.jpg"></a></div>
	</div>

	<!-- 分页器 -->
	<div class="swiper-pagination"></div>
</div>
<script>        
	var mySwiper = new Swiper ('.swiper-container', {
        loop: true,       // 循环模式选项
        effect : 'fade',       //切换效果
        //自动滑动
        autoplay: true,
        autoplay: {
            	disableOnInteraction: false,
        },        
        // 分页器
        pagination: {
        	el: '.img .swiper-pagination',
        	clickable :true,
        },
    })        
</script>
