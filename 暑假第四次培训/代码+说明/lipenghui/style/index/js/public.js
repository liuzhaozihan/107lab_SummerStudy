$(function () {
    $('.nav1 > li').hover(function () {
        $('.nav2').stop(false, true);
        if ($(this).index != 0)
            $('.nav1>li').eq(0).removeClass('choosed');
        $(this).children('.nav2').slideDown('slow');
    }, function () {
        $(this).children('.nav2').slideUp(100);
        $('.nav1>li').eq(0).addClass('choosed');
    });
})