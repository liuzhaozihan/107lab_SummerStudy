$(function () {
    var p = 0;
    var warp = $('.banner2');
    var firstimg = $('.banner2 li').first().clone();

    $('.banner2').append(firstimg).width($('.banner2 li').length * 100 + '%');

    function change() {
        p++;
        if (p == $('.banner2 li').length) {
            p = 1;
            $('.banner2').css('left', '0px');
        };
        warp.stop().animate({
            left: -p * 100 + '%'
        }, 230);
        var q;
        if (p < 2)
            q = p + 1;
        else
            q = 1;
        showBtn(q);
    }

    $(".jumpBtn>li").click(function () {
        var i = $(this).attr("index");
        var q;
        if (p < 2)
            q = p + 1;
        else
            q = 1;
        var n = q - i;
        if (n > 0) {
            warp.stop().animate({
                left: -(q - n - 1) * 100 + '%'
            }, 230);
            q = q - n;
            if (q == 1)
                p = 2;
            else
                p = 1;
            showBtn(q);
        } else {
            for (var j = 0; j < -n; j++)
                change();
        }
    });

    function showBtn(q) {
        $(".jumpBtn>li").removeAttr("id");
        $(".jumpBtn>li").eq(q - 1).attr("id", "on");
    }

    var timer;

    function play() {
        timer = setInterval(change, 2300);
    }

    function stop() {
        clearInterval(timer);
    }
    $(".banner2,.jumpBtn").mouseover(function () {
        stop();
    });
    $(".banner2,.jumpBtn").mouseout(function () {
        play();
    });
    play();
})

$(function () {
    var ali = $('.tab_title ul li');
    var index = 0;
    var c_ul = $('.tab_ul ul');
    ali.hover(function () {
        index = $(this).index();
        ali.eq(index).addClass('tab_current').siblings().removeClass();
        c_ul.eq(index).fadeIn(200).siblings().fadeOut(200);
    });
});