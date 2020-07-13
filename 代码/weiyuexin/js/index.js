// JavaScript Document

$(function(){




	$(".header .head .search .button").click(function(){
		var name = $('.header .head .search .input').val();
		if(name == ""){
			window.alert("请输入检索内容！！！");
		}
	});



    //大轮播图
    var t=0;
    var first = $(".header .banner ul li").first().clone();
    $(".header .banner ul").append(first);
    var timer = setInterval(function(){
		t++;
		if(t==3){
			t=0;
			var first = $(".header .banner ul li").first().clone();
			$(".header .banner ul").append(first);
			$(".header .banner ul").animate({left :-300+'%'},1000,function(){
				first.remove();
				$(".header .banner ul").css({left :0});
			});
		};
		$(".header .banner ul").animate({left:-t*100+'%'},1000);
		$(".header .banner .spot ol li").eq(t).find('div').addClass('one');
		$(".header .banner .spot ol li").eq(t).siblings().find('div').removeClass('one');
	},5000);
	/*$(".header .banner").mouseover(function(){
		clearInterval(timer);
	});*/
	$(".header .banner .spot ol li").click(function(){
		t = $(this).index();
		$(".header .banner ul").animate({left:-t*100+'%'},1000);
		$(".header .banner .spot ol li").eq(t).find('div').addClass('one');
		$(".header .banner .spot ol li").eq(t).siblings().find('div').removeClass('one');
	});



	$(".header .banner .spot ol li").hide();
	$(".header .banner").mouseover(function(){
        $(".header .banner .spot ol li").show();
	});
	$(".header .banner").mouseout(function(){
        $(".header .banner .spot ol li").hide();
	});


	$(".header .banner .prevnext img").hide();
	$(".header .banner").mouseover(function(){
        $(".header .banner .prevnext img").show();
	});
	$(".header .banner").mouseout(function(){
        $(".header .banner .prevnext img").hide();
	});

    //next按钮
	$(".header .banner .prevnext .next").click(function(){
		t++;
		if(t==3){
			t=0;
			var first3 = $(".header .banner ul li").first().clone();
			$(".header .banner ul").append(first3);
			$(".header .banner ul").animate({left :-300+'%'},1000,function(){
				first3.remove();
				$(".header .banner ul").css({left :0});
			});
		};
		$(".header .banner ul").animate({left:-t*100+'%'},1000);
		$(".header .banner .spot ol li").eq(t).find('div').addClass('one');
		$(".header .banner .spot ol li").eq(t).siblings().find('div').removeClass('one');
	});
	//prev按钮
	$(".header .banner .prevnext .prev").click(function(){
		t--;
		if(t==-1){
			$(".header .banner ul").css({left:-300+'%'});
			t=2;
		}
		$(".header .banner ul").animate({left:-t*100+'%'},1000);
		$(".header .banner .spot ol li").eq(t).find('div').addClass('one');
		$(".header .banner .spot ol li").eq(t).siblings().find('div').removeClass('one');
	});



    //小轮播图
    var i=0;
	var first2= $(".content .news .newscontent .slider ul li").first().clone();
	$(".content .news .newscontent .slider ul").append(first2);
	var timer1=setInterval(function(){
		i++;
		if(i==3){
			i=0;
			var first2= $(".content .news .newscontent .slider ul li").first().clone();
			$(".content .news .newscontent .slider ul").append(first2);
			$(".content .news .newscontent .slider ul").animate({left:-300+'%'},function(){
				first2.remove();
				$(".content .news .newscontent .slider ul").css({left :0});
				$(".content .news .newscontent .slider .button ol li").eq(0).addClass("point").siblings().removeClass("point");
			});
		};
		$(".content .news .newscontent .slider ul").animate({left:-i*100+'%'});
		$(".content .news .newscontent .slider .button ol li").eq(i).addClass("point").siblings().removeClass("point");
	},3000);
    $(".content .news .newscontent .slider .button ol li").click(function(){
        i = $(this).index();
		$(".content .news .newscontent .slider ul").animate({left:-i*100+'%'});
		$(".content .news .newscontent .slider .button ol li").eq(i).addClass("point").siblings().removeClass("point");
    });





    //鼠标滑入图片时，显示标题
    $(".content .study .right .fengcairight img").mouseover(function(){
        $(".content .study .right .fengcairight div").animate({marginTop:'56.5%'},500);
    });
    $(".content .study .right .fengcairight img").mouseout(function(){
        $(".content .study .right .fengcairight div").animate({marginTop:'76%'},500);
    });
   
    $(".content .qianyan .right .xueshuright img").mouseover(function(){
        $(".content .qianyan .right .xueshuright div").animate({marginTop:'56.5%'},500);
    });
    $(".content .qianyan .right .xueshuright img").mouseout(function(){
        $(".content .qianyan .right .xueshuright div").animate({marginTop:'76%'},500);
    });

    $(".content .media .right .videoright img").mouseover(function(){
        $(".content .media .right .videoright div").animate({marginTop:'56.5%'},500);
    });
    $(".content .media .right .videoright img").mouseout(function(){
        $(".content .media .right .videoright div").animate({marginTop:'76%'},500);
    });




    //浮动音乐窗口
    var divTop = $(".music").css("top");
	var divLeft = $(".music").css("left");
	var windowHeight = $(window).height();//浏览器高度
    var windowWidth = $(window).width();//浏览器宽度
	var dirX = 1.5;
	var dirY = 1;
	$(window).resize(function(){
		var windowHeight = $(window).height();//浏览器高度
		var windowWidth = $(window).width();//浏览器宽度
	});
	var handler = setInterval(function(){
		var position = $(".music").position();
		var nextPosX = position.left + dirX;//下一个水平位置
        var nextPosY = position.top + dirY;//下一个垂直位置
		if (nextPosX <= 0 || nextPosX >= windowWidth - $(".music").width()){
			dirX = dirX * -1;//改变方向
			nextPosX = position.left + dirX;
		}
		if (nextPosY <= 0 || nextPosY >= windowHeight - $(".music").height()){
			dirY = dirY * -1;//改变方向
			nextPosY = position.top + dirY;
		}
		$(".music").css({ left: nextPosX + "px", top: nextPosY + "px" });//移动到下一个位置
	},10);
	$(".music").mouseover(function(){
		clearInterval(handler);
	});
	$(".music").mouseout(function(){
		handler = setInterval(function(){
			var position = $(".music").position();
			var nextPosX = position.left + dirX;//下一个水平位置
			var nextPosY = position.top + dirY;//下一个垂直位置
			if (nextPosX <= 0 || nextPosX >= windowWidth - $(".music").width()){
				dirX = dirX * -1;//改变方向
				nextPosX = position.left + dirX;
			}
			if (nextPosY <= 0 || nextPosY >= windowHeight - $(".music").height()){
				dirY = dirY * -1;//改变方向
				nextPosY = position.top + dirY;
			}
			$(".music").css({ left: nextPosX + "px", top: nextPosY + "px" });//移动到下一个位置
		},10);
	});


    $(".link2 .back").hide();

});