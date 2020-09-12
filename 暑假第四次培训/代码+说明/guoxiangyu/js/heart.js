$(document).ready(function(){
    $(".nav ul>li").mouseenter(function(){
        $(this).children("ol").show();
    });
    $(".nav ul>li").mouseleave(function(){
        $(this).children("ol").hide();
    });
    /*bottom选项卡*/
    var ali = $('.m_title ul li');
	var index = 0;
	var c_ul = $('.m_ul ul');
	ali.hover(function(){
		index = $(this).index();
		ali.eq(index).addClass('m_current').siblings().removeClass();
		c_ul.eq(index).fadeIn(180).siblings().fadeOut(180);
	});  
});