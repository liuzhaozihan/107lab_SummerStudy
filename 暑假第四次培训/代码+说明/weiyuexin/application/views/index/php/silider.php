
<div class="swiper-container">
	<div class="swiper-wrapper">
        <?php foreach($slider as $v):  ?>
        <div class="swiper-slide"><a href="<?php echo $v['lianjie']?>" target="_black"><img src="<?php echo base_url('slider/' . $v['filename']) ?>" ></a></div>
        <?php endforeach ?>
	</div>

	<!-- 如果需要分页器 -->
	<div class="swiper-pagination"></div>

	<!-- 如果需要导航按钮 -->
	<div class="swiper-button-prev"></div>
	<div class="swiper-button-next"></div>
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
        	el: '.banner .swiper-pagination',
        	clickable :true,
        },

        // 前进后退按钮
        navigation: {
        	nextEl: '.banner .swiper-button-next',
        	prevEl: '.banner .swiper-button-prev',
        },
    })        
</script>
