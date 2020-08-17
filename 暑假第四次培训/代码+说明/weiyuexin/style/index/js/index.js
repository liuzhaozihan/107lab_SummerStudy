// JavaScript Document
$(function(){
    
    /*设为首页、加入收藏*/
    $(".head .add .ul1 .shouye").click(function(){
        window.alert("浏览器不支持自动设为首页，请手动设置！！！");
    });
    $(".head .add .ul1 .shoucang").click(function(){
        window.alert("无法自动添加到收藏夹，请使用CTRL + D手动添加！！！");
    });


    /*下拉菜单*/
    $(".head .menu ul li ol").hide();
    $(".head .menu ul li").mouseover(function(){
        $(this).find("ol").show();
        $(this).siblings().find("ol").hide();
    });
    $(".head .menu ul li").mouseout(function(){
        $(".head .menu ul li ol").hide();
    });

    $(".menu ul li").mouseover(function(){
    	$(this).css("backgroundColor","#3C93ED");
        $(this).siblings().css("backgroundColor","#39A4DB");
    });
    $(".menu ul").mouseout(function(){
        $(".menu ul .first").css("backgroundColor","#3C93ED").siblings().css("backgroundColor","#39A4DB");
    });
    $(".menu ul li ol li").mouseout(function(){
    	$(this).css("backgroundColor","#39A4DB");
    });
    

    /*心理百科、心理保健、心理咨询*/
    $(".content .bottom .xinli .xinli_content ul> .baojian").hide();
    $(".content .bottom .xinli .xinli_content ul> .zixun").hide();
    $(".content .bottom .xinli .xinli_top ul> .baike").mouseover(function(){
        $(this).addClass("hover").siblings().removeClass("hover");
        $(".content .bottom .xinli .xinli_content ul> .baike").show();
        $(".content .bottom .xinli .xinli_content ul> .baojian").hide();
        $(".content .bottom .xinli .xinli_content ul> .zixun").hide();
    });
    $(".content .bottom .xinli .xinli_top ul> .baojian").mouseover(function(){
        $(this).addClass("hover").siblings().removeClass("hover");
        $(".content .bottom .xinli .xinli_content ul> .baike").hide();
        $(".content .bottom .xinli .xinli_content ul> .baojian").show();
        $(".content .bottom .xinli .xinli_content ul> .zixun").hide();
    });
    $(".content .bottom .xinli .xinli_top ul> .zixun").mouseover(function(){
        $(this).addClass("hover").siblings().removeClass("hover");
        $(".content .bottom .xinli .xinli_content ul> .baike").hide();
        $(".content .bottom .xinli .xinli_content ul> .baojian").hide();
        $(".content .bottom .xinli .xinli_content ul> .zixun").show();
    });

});