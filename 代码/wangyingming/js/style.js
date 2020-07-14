$(document).ready(function () {
    // 下来菜单
    $(".nav_fir>li").mouseenter(function () {
        // var number = $(this).children(".nav_sec").children("li").length;
        $(this).children(".nav_sec").removeAttr('id','retotate')
        $(this).children(".nav_sec").attr('id','dorotate');
        // var counts = 0;
        // var mychangeli = setInterval(() => {
        //     $(this).children(".nav_sec").children("li").eq(counts).attr('id', 'dorotate');
        //     counts++;
        //     if (counts >= number) {
        //         clearInterval(mychangeli);
        //     }
        // }, 100);
    });

    // $(".nav_fir>li").mouseleave(function () {
    //     $(this).children(".nav_sec").children("li").removeAttr('id', 'dorotate');
    //     // $(this).children(".nav_sec").children("li").silbings().removeAttr('id', 'dorotate');
    //     // var number = $(this).children(".nav_sec").children("li").length;
    //     // var counts = 0;
    //     // var mychangeli = setInterval(() => {
    //     //     $(this).children(".nav_sec").children("li").eq(number - counts - 1).stop().slideUp(300).attr('id', 'redorotate');
    //     //     counts++;
    //     //     if (counts >= number) {
    //     //         clearInterval(mychangeli);
    //     //     }
    //     }, 50);
    // });
    $(".nav_fir>li").mouseleave(function(){
        $(this).children(".nav_sec").removeAttr('id','redorotate')
        $(this).children(".nav_sec").Attr('id','redorotate');
    });

   // 大的轮播图
    var ul_move = $(".banner_wrap .banner_img .img_li li").width();
    var loading_stand_width = ul_move ;
    var ul_obj = $(".banner_wrap .banner_img .img_li");
    var prev = $(".banner_wrap .prev");
    var next = $(".banner_wrap .next");
    var mybutton = $(".banner_wrap .button span");
    var bigi = 0;
    var smalli = 0;
    var loading = $(".banner_wrap .loading_tip");

    var automatical = null;

    function swarp(){
        loading_stand_width = ul_move ;
        ul_obj.css("margin-left",-ul_move * bigi);
        mybutton.eq(smalli).addClass("button_color_current")
        .removeClass("button_color_before")
        .siblings().removeClass("button_color_current")
        .addClass("button_color_before");
        loading.animate({width:loading_stand_width},3000,"swing");
    }
    function banner_auto(){
        if(bigi>=2)
        {
            bigi = 0;
            smalli = 0;
        }else{
            bigi++;
            smalli++;
        }
        swarp();
        loading.animate({width:0},3000,"swing");
    }
    function buttonclick(){
        clearInterval(automatical);
        smalli = $(this).index();
        bigi = smalli ;
        swarp();
        loading.animate({width:0},3000,"swing");
        automatical = setInterval(banner_auto,3000);
    }
    automatical = setInterval(banner_auto,3000);
    mybutton.click(buttonclick);

    prev.click(function(){
        clearInterval(automatical);
        if(bigi<=0)
        {
            bigi = 2 ;
            smalli = 2 ;
        }else{
            bigi--;
            smalli--;
        }
        swarp();
        loading.animate({width:0},3000,"swing");
        automatical = setInterval(banner_auto,3000);
    });
    next.click(function(){
        clearInterval(automatical);
        // alert("what'the matter?");
        if(bigi>=2)
        {
            bigi = 0;
            smalli = 0;
        }
        else
        {
            bigi++;
            smalli++
        }
        swarp();
        loading.animate({width:0},3000,"swing");
        automatical = setInterval(banner_auto,3000);
    });

    // 新闻动态轮播图
    var moveul = $(".news_content_left ul");
    var standmove = 322;
    var nowmove = 0;
    var judgecurrtentli = 0;
    var myli = $(".news_content_left .dots span");
    var news_banner = null;
    function movechange() {
        moveul.css("margin-left", -nowmove);
        myli.eq(judgecurrtentli).addClass("current_dot").removeClass("before_dot").siblings().removeClass("current_dot").addClass("before_dot");
    }
    function auto() {
        if (644 <= nowmove) {
            nowmove = 0;
            judgecurrtentli = 0;
        }
        else {
            nowmove += standmove;
            judgecurrtentli++;
        }
        movechange();
    }
    function dotclick() {
        clearInterval(news_banner);

        judgecurrtentli = $(this).index();
        nowmove = standmove * judgecurrtentli;

        movechange();
        news_banner = setInterval(auto,3000);
    }
    news_banner = setInterval(auto, 3000);
    myli.click(dotclick);
    



    //划入显示图片信息
    var hoverzone1 = $(".more_right .part1 .people") ;
    var showzone1 = $(".more_right .part1  .word");

    var hoverzone2 = $(".more_right .part2 .people") ;
    var showzone2 = $(".more_right .part2  .word");

    var hoverzone3 = $(".more_right .part3 .people") ;
    var showzone3 = $(".more_right .part3  .word");
    
    hoverzone1.mouseenter(function(){
        showzone1.stop().animate({top:"160px"},300,"swing");
    });
    hoverzone1.mouseleave(function(){
        showzone1.stop().animate({top:"200px"},300,"swing");
    });

    hoverzone2.mouseenter(function(){
        showzone2.stop().animate({top:"160px"},300,"swing");
    });
    hoverzone2.mouseleave(function(){
        showzone2.stop().animate({top:"200px"},300,"swing");
    });

    hoverzone3.mouseenter(function(){
        showzone3.stop().animate({top:"160px"},300,"swing");
    });
    hoverzone3.mouseleave(function(){
        showzone3.stop().animate({top:"200px"},300,"swing");
    });



});