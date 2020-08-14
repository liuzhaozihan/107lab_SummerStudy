/*
分类列表显示
 */
$(function(){
	var ali = $('#navigation ul li');
	var index = 0;
	var c_ul = $('.mains #main');
	ali.click(function(){
		index = $(this).index();
		ali.eq(index).children('a').addClass('active').parent('li').siblings().children('a').removeClass();
		c_ul.eq(index).fadeIn(200).siblings().fadeOut(200);
	});
});