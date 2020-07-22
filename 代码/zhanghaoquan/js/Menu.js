$(function () {  

    var First = $(".menu_part>li");
    var Second = $(".menu_part>li>ul>li");

    First.hover(function () {  
        $(this).children().stop().slideToggle(0);
    })
    $(".menu_part>li").mouseover(function () {  
        this.style.backgroundColor = "#1C97D5";
    })
    .mouseout(function () {  
        this.style.backgroundColor = "#1877B7";
    })

    Second.css("width","127px").css("height","54px").css("line-height","54px").css("font-size","18px");

    First.mouseover(function () {  
        this.style.backgroundColor = "#1C97D5";
        $(this).css("border-left","3px solid #C4302B");
    })
    .mouseout(function () {  
        this.style.backgroundColor = "#1877B7";
        $(this).css("border-left","3px solid #1877B7");
    })
    Second.mouseover(function () {  
        this.style.backgroundColor = "#1C97D5";
        $(this).css("border-left","3px solid #C4302B");
    })
    .mouseout(function () {  
        this.style.backgroundColor = "#1877B7";
        $(this).css("border-left","3px solid #1877B7");
    })

    $(".menu_part>li").mouseover(function () {  
        $(".select>li").css("transform","rotateY(0deg)");
    }).mouseout(function () {  
        $(".select>li").css("transform","rotateY(90deg)")
    })
})