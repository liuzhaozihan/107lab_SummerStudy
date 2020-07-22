$(document).ready(function(){

    $("#nav_style>li").mouseenter(function () {
        $(this).children("ul").show();
        $(this).css("background-color","#048EC1");
        });

   
    $("#nav_style>li").mouseleave(function () {
        $(this).children("ul").stop().hide();
        $(this).css("background-color","#1877B7");
        });

    
    $("#nav_style li ul li").hover(function () {
        $(this).css("background-color","#048EC1");
        
    }, function () {
        $(this).css("background-color","#1877B7");
        
    });
 /**
     * 轮播图
     */

    var imgOl = $(".banner_img ul");
    var imgLi = $(".banner_img ul li");
    var imgPoint = $(".banner_point ol li");
    var img = $(".banner_img img");
    var imgWidth = img.width();
    var imgLength = imgLi.length;
    var timeId = null;
    var banner_prev = $(".banner_prev");
    var banner_next = $(".banner_next");
    var _index = 0;   //用来控制图片
    var _index2 = 0;  //用来控制焦点
    var banner_timeId = null;

    //写轮播图执行滚动的方法
    function banner(){
        if(_index>=imgLength-1){
            imgLi.eq(0).css({
                'position':'relative',
                'left':imgLength*imgWidth
            });
            _index2=0;
        }else{
            _index2++;
        }
        _index++;

        imgOl.animate({left:-_index*imgWidth},300,function(){
            if(_index == 3){
                imgLi.eq(0).css('position','static');
                imgOl.css('left',0);
                _index = 0;
            }
        });
        //给下面的焦点加样式
        imgPoint.eq(_index2).addClass("point_current").siblings().removeClass('point_current');

    }
    // 点击焦点的方法
      function banner_click(){
        clearInterval(timeId);              //清除定时器    

        _index2 = $(this).index();
        _index = _index2;                   //将两个计数器同步

        imgPoint.eq(_index2).addClass("point_current").siblings().removeClass('point_current');
        imgOl.animate({left:-_index*imgWidth},500);
        timeId = setInterval(banner,4000);  //再重新打开定时器 
    }   

    clearInterval(timeId);     
    // 自动滚动的方法
    timeId = setInterval(banner,4000);
    // 点击焦点执滚动的执行
    imgPoint.click(banner_click);

    // 点击上一页
    banner_prev.click(function(){
        clearInterval(timeId);
        if(_index<=0){
            imgLi.eq(imgLength-1).css({
                'position':'relative',
                'left':-imgWidth*3
            });
            _index2 = imgLength-1;
        }else{
            _index2--;
        }
        _index--;
        imgOl.animate({left:-_index*imgWidth},500,function(){
            if(_index == -1){
                imgLi.eq(imgLength-1).css('position','static');
                imgOl.css('left',-2*imgWidth);
                _index = 2;
            }
            
        });
        //给下面的焦点加样式
        imgPoint.eq(_index2).addClass("point_current").siblings().removeClass('point_current');

        timeId = setInterval(banner,4000);
    });
    // 点击下一页
    banner_next.delay(300).click(function(){

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



    /**
     * tap标签页转换
     */
    var tap_title = $(".c_t_l_title ul li");
    var tap_content = $(".c_t_l_body ul");
    var tap_time = null;
    tap_title.hover(function(){

        tap_this = $(this);
        tap_time = setTimeout(function(){
            tap_index = tap_this.index();
            tap_this.addClass("current").siblings().removeClass("current");
            tap_content.eq(tap_index).fadeIn(500).siblings().hide();
        },200);
    },function(){
        clearTimeout(tap_time);
    });





    /**
     * 中间处小的图片切换
     */
    var content_img = $(".content_top_middle_big ul");
    var content_img_li = $(".content_top_middle_big ul li");
    var content_thumb = $(".content_top_middle_thumb ul li");
    var bigimg_index = 0;                                 //控制大图片的计数器
    var thumb_index = 0;                                  //控制小图片的计数器
    var img_width = $(".content_top_middle_big ul li img").width();
    var thumb_time = null;
    var contnet_img_info = $(".content_top_middle_info");
    var content_big_img = $(".content_top_middle_big ul li img");


   
    //自动轮播的方法
    function img_action(){

        if(thumb_index >= 3){
            content_img_li.eq(0).css({
                'position':'relative',
                'left':img_width*4
            });
            thumb_index = 0;
        }else{
            thumb_index++;
        }

        bigimg_index++;
    
        content_thumb.eq(thumb_index).addClass("thumb_current").siblings().removeClass("thumb_current");
        var imgAlt = content_big_img.eq(thumb_index).attr("alt");
        contnet_img_info.html(imgAlt);
        content_img.animate({left:-bigimg_index*img_width},200,function(){
            if(bigimg_index==4){
                content_img_li.eq(0).css( 'position','static');
                content_img.css("left",0)
                bigimg_index=0;
            }
        });

    }
    //自动开启定时器
    img_auto = setInterval(img_action,3000);

    //鼠标放上去就可以该表的方法
    content_thumb.hover(function(){

        thumb_index = $(this).index();
        bigimg_index = thumb_index;

        var thumb_this  = $(this);
        //设置延时响应
        thumb_time = setTimeout(() => {
            thumb_this.addClass("thumb_current").siblings().removeClass("thumb_current");
            var imgAlt = content_big_img.eq(bigimg_index).attr("alt");
            contnet_img_info.html(imgAlt);
            content_img.animate({
                left:-bigimg_index*img_width
            },200);
        }, 200);
        clearInterval(img_auto);
    },function(){
        clearTimeout(thumb_time);
        img_auto = setInterval(img_action,3000);
    });
//第二个轮播图
var l = $(".sbanner").width();
    var clone = $("#banner_style1 li").first().clone();
    $("#banner_style1").append(clone);
    var i = 0;


    $("#buttons  .buttons_style span").click(function () {
        var inde = $(this).index();
        i = inde;
        $("#banner_style1").stop().animate({
            left: inde * -l
        }, 500);
        $(this).addClass("on").siblings().removeClass("on");
        $(".text a").addClass("txtout").siblings().removeClass("txtout");

    });
    var size = $(".sbanner #banner_style1 li").length;
    console.log(size);

    function move() {
        if (i == size) {
            $("#banner_style1").css("left", 0);
            i = 1;
        }
        if (i == -1) {
            $("#banner_style1").css({
                left: -(size - 1) * l
            });
            i = size - 2;
        }
        $("#banner_style1").stop().animate({
            left: i * -l
        }, 500);
        if (i == size - 1) {
            $("#buttons .buttons_style span").eq(0).addClass("on").siblings().removeClass("on");
            $(".text a").eq(0).addClass("txtout").siblings().removeClass("txtout");
        } else {
            $("#buttons .buttons_style span").eq(i).addClass("on").siblings().removeClass("on");
            $(".text a").eq(i).addClass("txtout").siblings().removeClass("txtout");
        }
    };
    var t = setInterval(function () {
        i++;
        move();
    }, 2000);
    $(".sbanner").hover(function () {
        clearInterval(t);
    }, function () {
        t = setInterval(function () {
            i++;
            move();
        }, 2000);
    });
//小轮播结束

    $(".he1").mouseenter(function () {
        $(".hz1").show();
        });
    $(".he1").mouseleave(function () {
        $(".hz1").hide();
        });
	$(".he2").mouseenter(function () {
        $(".hz2").show();
        });
    $(".he2").mouseleave(function () {
        $(".hz2").hide();
        });
	$(".he3").mouseenter(function () {
        $(".hz3").show();
        });
    $(".he3").mouseleave(function () {
        $(".hz3").hide();
        });	


 });

  
 










































