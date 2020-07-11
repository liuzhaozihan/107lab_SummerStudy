$(function () { 
    var position = 0;
    var banner_turn = $(".banner_wrap");
    var banner_control = $(".Banner");
    var banner_btn = $(".banner_LR");
    var ico = $(".banner_ico");
    var ico_1 = $(".banner_ico li:eq(0)");
    var ico_2 = $(".banner_ico li:eq(1)");
    var ico_3 = $(".banner_ico li:eq(2)");
    var left = $(".btn_left");
    var right = $(".btn_right");


    ico_1.css("background-image"," linear-gradient(grey,black)");
    function icon1() {  
        banner_turn.animate({left:-0+"%"},450);
        $(".banner_ico li:eq(0)").css("background-image"," linear-gradient(grey,black)");
        $(".banner_ico li:eq(0)").siblings().css("background-image","linear-gradient(darkgrey,white)");
    }
    function icon2() {  
        banner_turn.animate({left:-99.99*1+"%"},450);
        $(".banner_ico li:eq(1)").css("background-image"," linear-gradient(grey,black)");
        $(".banner_ico li:eq(1)").siblings().css("background-image","linear-gradient(darkgrey,white)");
    }
    function icon3() {  
        banner_turn.animate({left:-99.99*2+"%"},450);
        $(".banner_ico li:eq(2)").css("background-image"," linear-gradient(grey,black)");
        $(".banner_ico li:eq(2)").siblings().css("background-image","linear-gradient(darkgrey,white)");
    }

    ico_1.click(function () {  
        icon1();
        position=0;
    })
    ico_2.click(function () {  
        icon2();
        position=1;
    })
    ico_3.click(function () {  
        icon3();
        position=2;
    })


    interval = setInterval(timeid,4000);
    banner_turn.mouseover(function () {  
        clearInterval(interval);
        banner_btn.fadeIn(300);
        ico.fadeIn(300);
    })
    banner_turn.mouseout(function () {  
        interval=setInterval(timeid,4000);
        banner_btn.css("display","none");
        ico.css("display","none")
    })
    banner_btn.mouseover(function () {  
        $(this).css("display","block");
        ico.css("display","block");
    })
    ico.mouseover(function () {  
        $(this).css("display","block");
        banner_btn.css("display","block");
    })
    
    function timeid(){
        position++;
        if(position==3){
            position=0
        }
        banner_turn.animate({left:-99.99*position+"%"},450);

        if(position==0){
            $(".banner_ico li:eq(0)").css("background-image","linear-gradient(grey,black)").siblings().css("background-image","linear-gradient(darkgrey,white)");
        }
        if(position==1){
            $(".banner_ico li:eq(1)").css("background-image","linear-gradient(grey,black)").siblings().css("background-image","linear-gradient(darkgrey,white)");
        }
        if(position==2){
            $(".banner_ico li:eq(2)").css("background-image","linear-gradient(grey,black)").siblings().css("background-image","linear-gradient(darkgrey,white)");
        }
    }
})