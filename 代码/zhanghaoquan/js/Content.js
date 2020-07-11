$(function () {  
    var index = 0;
    var img_con = $(".img_cont_wrap");
    interval_2 = setInterval(timeid_2,2500);
    var img_ic1 =$(".img_cont_ico li:eq(0)");
    var img_ic2 =$(".img_cont_ico li:eq(1)");
    var img_ic3 =$(".img_cont_ico li:eq(2)");

    img_ic1.css("backgroundColor","#ff0000");

    function ic1() {  
        img_ic1.css("backgroundColor","#ff0000")
        .siblings().css("backgroundColor","#666");
    }
    function ic2() {  
        img_ic2.css("backgroundColor","#ff0000")
        .siblings().css("backgroundColor","#666");
    }
    function ic3() {  
        img_ic3.css("backgroundColor","#ff0000")
        .siblings().css("backgroundColor","#666");
    }
    $('.img_cont').mouseover(function () {  
        clearInterval(interval_2);
    })
    .mouseout(function () {  
        interval_2 = setInterval(timeid_2,2500);
    })
    img_ic1.click(function () {  
        index=0;
        img_con.animate({left:0},230);
        ic1();
    })
    img_ic2.click(function () {  
        index=1;
        img_con.animate({left:-310*1},230);
        ic2();
    })
    img_ic3.click(function () {  
        index=2;
        img_con.animate({left:-310*2},230);
        ic3();
    })
    function timeid_2() {  
        index++;
        if(index==3){
            index=0;
        }
        img_con.animate({left:-310*index},230);
        if(index==0){
            ic1();
        }
        if(index==1){
            ic2();
        }
        if(index==2){
            ic3();
        }
    }

    var span_li1 = $(".right_R span:eq(0)");
    var span_li2 = $(".right_R span:eq(1)");
    var span_li3 = $(".right_R span:eq(2)");
    
    $('.right_R img:eq(0)').mouseover(function () {  
        span_li1.css("bottom","0px");
    })
    .mouseout(function () {  
        span_li1.css("bottom","-40px");
    })
    $('.right_R img:eq(1)').mouseover(function () {  
        span_li2.css("bottom","0px");
    })
    .mouseout(function () {  
        span_li2.css("bottom","-40px");
    })
    $('.right_R img:eq(2)').mouseover(function () {  
        span_li3.css("bottom","0px");
    })
    .mouseout(function () {  
        span_li3.css("bottom","-40px");
    })

    $('.piclinks li:eq(3)').css("margin-right","0");
    
})