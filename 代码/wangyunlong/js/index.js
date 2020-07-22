$(function(){

	// var menuLi = $(".menu li")
	// var submenu = $(".submenu");
	// var submenuLi = $(".submenu li");

	// menuLi.mouseover(function(){

	// 	$(this).children(".submenu").children(".submenu li").animate({transform: "rotateY('90deg')"},200);
	// 	$(this).children(".submenu").children(".submenu li").delay($(this).children(".submenu").children(".submenu li").index());
	// })


	var imgOl = $(".banner_img ul");
	var imgLi = $(".banner_img ul li");
	var img = $(".banner_img img");
	var imgPoint = $(".banner_point ol li");
	var large_left = $(".large_left");
    var large_right = $(".large_right");
    var progressBar= $(".progressBar");
	var imgLength = imgLi.length;
	var imgWidth = img.width();
	var index1 = 0;
	var index2 = 0;
	var timeId = null;

	imgPoint.eq(0).addClass("point_current");
	progressBar.animate({width:imgWidth},4000,function(){
			progressBar.css('width',0);
	});

	function banner(){
		
		if(index1 >= imgLength-1){
			imgLi.eq(0).css({
				'position':'relative',
				'left':imgWidth*imgLength
			});
			index2=0;
		}else{
			index2++;
		}

		index1++;

		imgOl.animate({left:-index1*imgWidth},300,function(){
			if(index1 == imgLength){
				imgLi.eq(0).css('position','static');
				imgOl.css('left',0);
				index1 = 0;
			}
		})

		
		progressBar.animate({width:imgWidth},4000,function(){
			progressBar.css('width',0);
		});
		

		imgPoint.eq(index2).addClass("point_current").siblings().removeClass('point_current');
	};


	function point_click(){
		clearInterval(timeId);
		index2 = $(this).index();
		index1 = index2;

		imgPoint.eq(index2).addClass("point_current").siblings().removeClass('point_current');
		imgOl.animate({left:-index1*imgWidth},300);

		progressBar.stop();
		progressBar.css('width',0);
		progressBar.animate({width:imgWidth},4000,function(){
			progressBar.css('width',0);
		});
		
		timeId = setInterval(banner,4000);
	}

	

	timeId = setInterval(banner,4000);

	imgPoint.click(point_click);

	large_left.click(function(){
		clearInterval(timeId);
		if(index1<=0){
			imgLi.eq(imgLength-1).css({
				'position':'relative',
				'left':-imgLength*imgWidth
			})
			index2 = imgLength-1;
		}else{
			index2--;
		}

		index1--;

		imgOl.animate({left:-index1*imgWidth},500,function(){
			if(index1==-1){
				imgLi.eq(imgLength-1).css('position','static');
				imgOl.css('left',-imgWidth*(imgLength-1));
				index1=imgLength-1;
			}
		});

		imgPoint.eq(index2).addClass("point_current").siblings().removeClass("point_current");
		progressBar.stop();
		progressBar.css('width',0);
		progressBar.animate({width:imgWidth},4000,function(){
			progressBar.css('width',0);
		});
		
		timeId=setInterval(banner,4000);
	})


	large_right.click(function(){
		clearInterval(timeId);
		progressBar.stop();
		progressBar.css('width',0);
		banner();
		timeId = setInterval(banner,4000);
	})

	$(".banner").hover(function(){
		clearInterval(timeId);
		large_left.animate({opacity:1},300);
		large_right.animate({opacity:1},300);
		$(".banner_point").animate({opacity:1},300);
		progressBar.stop();
	},function(){
		clearInterval(timeId);
		timeId = setInterval(banner,4000);
		large_left.animate({opacity:0},300);
		large_right.animate({opacity:0},300);
		$(".banner_point").animate({opacity:0},300);
		progressBar.animate({width:imgWidth},4000,function(){
			progressBar.css('width',0);
		});
	});


	var newsLeftPoint = $(".newsLeftPoint ol li");
	var newsLeftImg = $(".newsLeftImg ul");
	var nLIWidth = $(".newsLeftImg ul li").width();
	var index3 = 0;
	var index4 = 0;
	var timeNewsLeft = null;
	newsLeftPoint.eq(0).css('background-color','#f00');
	function newsLeftImgFloat(){
		if(index3 >= 2){
			index3 = 0;
			index4 = 0;
		}else{
			index3++;
			index4++;
		}
		newsLeftImg.css('left', -index3*nLIWidth );
		newsLeftPoint.eq(index4).css('background-color','#f00');
		newsLeftPoint.eq(index4).siblings().css('background-color','#666');
		// alert(1);
	}

	timeNewsLeft = setInterval(newsLeftImgFloat,4000);

	function nLPClick(){
		clearInterval(timeNewsLeft);
		index4 = $(this).index();
		index3 = index4;
		newsLeftImg.css('left',-index3*nLIWidth);
		newsLeftPoint.eq(index4).css('background-color','#f00');
		newsLeftPoint.eq(index4).siblings().css('background-color','#666');
		timeNewsLeft = setInterval(newsLeftImgFloat,4000);
	}
	newsLeftPoint.click(nLPClick);



	$(".b_r_detail").mouseover(function(){
		$(this).children("div.hiddenTitle").animate({bottom:'2px'},200);
	})



});