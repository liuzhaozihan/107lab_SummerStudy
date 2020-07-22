$(function(){
	    //导航栏
	        $(".nav-show").mouseover(function () {
                $(this).children("ol").stop().show();
            });//鼠标移入下拉菜单出现
            $(".nav-show").mouseout(function () {
                $(this).children("ol").stop().hide();
            });//鼠标移出下拉菜单隐藏
            $('.nav-show ol li,.nav-show a').mouseover(function(){
            	$(this).css({"border-left":"2px solid red","background":"#1c97d5"})
            });//鼠标进入左边框变红
            $('.nav-show ol li,.nav-show a').mouseout(function(){
            	$(this).css({"border-left":"","background":""})
            });//鼠标移出恢复


        //图片介绍    
            $(".content-4-1").hover(function (){
                $(".content-4-12>span").slideDown();
            },function (){
                $(".content-4-12>span").slideUp();
            });//鼠标进入文字滑出，鼠标出去文字消失
            $(".content-4-2").hover(function (){
                $(".content-4-22>span").slideDown();
            },function (){
                $(".content-4-22>span").slideUp();
            });//鼠标进入文字滑出，鼠标出去文字消失
            $(".content-4-3").hover(function (){
                $(".content-4-32>span").slideDown();
            },function (){
                $(".content-4-32>span").slideUp();
            });//鼠标进入文字滑出，鼠标出去文字消失

        //小轮播图
	        var oul=$('.picture ul');//获取ul
            var ali=$('.picture ul li');//获取ul的li
            var numli=$('.picture ol li');//获取ol的li
            var aliwidth=$('.picture ul li').eq(0).width();//获取宽度
            var _now=0;//数字样式计数器
            var _now1=0;//图片运动距离计数器
            var timeid=null;

            numli.click(function(){
             	var index=$(this).index();//索引
             	_now=index;//同步
             	_now1=index;//同步
             	$(this).addClass('current').siblings().removeClass();//称为current其他的去除
             	oul.animate({'left':-aliwidth*index},500);
            }); //点击让图片与数字一同变化
            function slider(){
             	if(_now==numli.size()-1){
             		ali.eq(0).css({'position':'relative','left':oul.width()
             	});//把第一张图片定位到最后一张，同时留有li的位置
             		_now=0;
             	}else{
             	_now++;//还原
                }
                _now1++;
             	numli.eq(_now).addClass('current').siblings().removeClass();
             	oul.animate({'left':-aliwidth*_now1},500,function(){
                  if(_now==0){
             		ali.eq(0).css({'position':'static'})//去掉relative属性
             		oul.css('left','0');//li还原回来
             		_now1=0;//还原
             	  }
             	});
             }
            timeid=setInterval(slider,1500);
            $('.picture').mouseover(function(){
             	clearInterval(timeid);
            });//鼠标移上去图片停止
            $('.picture').mouseout(function(){
             	timeid=setInterval(slider,1500);
             });//鼠标移出图片回复滚动



        //大轮播图
            $(".banner").hover(function (){
                $(".banner>.banner-prev,.banner>.banner-after,.banner>.banner-point").show();
            },function (){
                $(".banner>.banner-prev,.banner>.banner-after,.banner>.banner-point").hide();
            });//鼠标进入指示出现，鼠标移开指示消失
            var imgul = $(".banner-img ul");
            var imgli = $(".banner-img ul li");
            var imgpoint = $(".banner-point ol li");
            var img = $(".banner-img img");
            var imgWidth = img.width();
            var imgLength = imgli.length;
            var timeId = null;
            var banner_prev = $(".banner-prev");
            var banner_after = $(".banner-after");
            var index = 0;   //索引
            var index2 = 0;  //索引
            var banner_timeId = null;

            //图片滚动
            function banner(){
                if(index>=imgLength-1){
                    imgli.eq(0).css({'position':'relative','left':imgLength*imgWidth});
                    index2=0;
                }else{
                    index2++;
                }
                index++;

                imgul.animate({left:-index*imgWidth},300,function(){
                    if(index == 3){
                        imgli.eq(0).css('position','static');
                        imgul.css('left',0);
                        index = 0;
                    }
                });
            //改变索引样式
                imgpoint.eq(index2).addClass("point-current").siblings().removeClass('point-current');

            }
            //点击索引
            function banner_click(){
                clearInterval(timeId);//清除定时器    
                index2 = $(this).index();
                index = index2;//将两个计数器同步

                imgpoint.eq(index2).addClass("point-current").siblings().removeClass('point-current');
                imgul.animate({left:-index*imgWidth},500);
                timeId = setInterval(banner,4000);  //再重新打开定时器 
            }   

            clearInterval(timeId);     
            // 自动轮播
            timeId = setInterval(banner,4000);
            imgpoint.click(banner_click);

            // 点击上一页
            banner_prev.click(function(){
                clearInterval(timeId);
                if(index<=0){
                    imgli.eq(imgLength-1).css({'position':'relative', 'left':-imgWidth*3});
                    index2 = imgLength-1;
                }else{
                    index2--;
                }
                index--;
                imgul.animate({left:-index*imgWidth},500,function(){
                if(index == -1){
                    imgli.eq(imgLength-1).css('position','static');
                    imgul.css('left',-2*imgWidth);
                    index = 2;
                }
            
            });

            imgpoint.eq(index2).addClass("point-current").siblings().removeClass('point-current');
 
            timeId = setInterval(banner,4000);
            });
            // 点击下一页
            banner_after.delay(300).click(function(){

            clearInterval(timeId);
            banner();
            timeId = setInterval(banner,4000);
            });
            //当鼠标移到轮播图上时会停止，移开后继续滚动
            $(".banner").hover(function(){
                clearInterval(timeId);
            },function(){
            clearInterval(timeId);
            timeId = setInterval(banner,4000);  
            });


            //改变文字颜色
            $('.content-1-3,.content-2-2 ul li a,.content-3 ul li').mouseover(function(){
            	$(this).css("color","#1877b7")
            });
             $('.content-1-3,.content-2-2 ul li a,.content-3 ul li').mouseout(function(){
            	$(this).css("color","")
            });
       
});