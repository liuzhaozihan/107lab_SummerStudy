/*下拉菜单*/

$(function () {
  $(".wrap>ul>li").mouseover(function () {
    $(this).children("ul").stop().slideDown(300).addClass('block');
  });
  $(".wrap>ul>li").mouseout(function () {
    $(this).children("ul").stop().slideUp(300).removeClass('block');
  });
});

/*大轮播图*/

var imgOl = $(".banner_img ul");
var imgLi = $(".banner_img ul li");
var imgPoint = $(".banner_point ol li");
var img = $(".banner_img img");
var imgWidth = img.width();
var imgLength = imgLi.length;
var timeId = null;
var banner_prev = $(".banner_prev");
var banner_next = $(".banner_next");
var _index = 0;
var _index2 = 0;
var banner_timeId = null;


function banner () {
  if (_index >= imgLength - 1) {
    imgLi.eq(0).css({
      'position': 'relative',
      'left': imgLength * imgWidth
    });
    _index2 = 0;
  } else {
    _index2++;
  }
  _index++;

  imgOl.animate({ left: -_index * imgWidth }, 300, function () {
    if (_index == 3) {
      imgLi.eq(0).css('position', 'static');
      imgOl.css('left', 0);
      _index = 0;
    }
  });

  imgPoint.eq(_index2).addClass("point_current").siblings().removeClass('point_current');

}

function banner_click () {
  clearInterval(timeId);

  _index2 = $(this).index();
  _index = _index2;

  imgPoint.eq(_index2).addClass("point_current").siblings().removeClass('point_current');
  imgOl.animate({ left: -_index * imgWidth }, 500);
  timeId = setInterval(banner, 4000);
}

clearInterval(timeId);
timeId = setInterval(banner, 4000);
imgPoint.click(banner_click);


banner_prev.click(function () {
  clearInterval(timeId);
  if (_index <= 0) {
    imgLi.eq(imgLength - 1).css({
      'position': 'relative',
      'left': -imgWidth * 3
    });
    _index2 = imgLength - 1;
  } else {
    _index2--;
  }
  _index--;
  imgOl.animate({ 'left': -_index * imgWidth }, 500, function () {
    if (_index == -1) {
      imgLi.eq(imgLength - 1).css('position', 'static');
      imgOl.css('left', -2 * imgWidth);
      _index = 2;
    }

  });

  imgPoint.eq(_index2).addClass("point_current").siblings().removeClass('point_current');

  timeId = setInterval(banner, 4000);
});

banner_next.click(function () {
  clearInterval(timeId);
  banner();
  timeId = setInterval(banner, 4000);
});

$(".banner").hover(function () {
  clearInterval(timeId);
}, function () {
  clearInterval(timeId);
  timeId = setInterval(banner, 4000);
});

$(function () {
  $(".banner").mouseover(function () {
    $(".banner_point").show();
  });
  $(".banner").mouseout(function () {
    $(".banner_point").hide();
  });
});

$(function () {
  $(".banner").mouseover(function () {
    $(".banner_next").show();
  });
  $(".banner").mouseout(function () {
    $(".banner_next").hide();
  });
});

$(function () {
  $(".banner").mouseover(function () {
    $(".banner_prev").show();
  });
  $(".banner").mouseout(function () {
    $(".banner_prev").hide();
  });
});


/*小轮播图*/

$(function () {
  var oul = $(".content_nav ul");
  var numLi = $(".content_nav ol li");
  var aliWidth = $(".content_nav ul li").eq(0).width();
  var _now = 0;

  numLi.click(function () {
    var index = $(this).index();
    _now = index;
    $(this).addClass("little_current").siblings().removeClass();
    oul.animate({ 'left': -aliWidth * index }, 10);
  });

  setInterval(function () {
    if (_now == 2) {
      _now = 0
    } else {
      _now++;
    }
    numLi.eq(_now).addClass("little_current").siblings().removeClass();
    oul.animate({ 'left': -aliWidth * _now }, 10);
  }, 4000);
});

$(function () {
  $(".item4").mouseover(function () {
    $('.item4 span').stop().slideDown(300)
  });
  $(".item4").mouseout(function () {
    $('.item4 span').stop().slideUp(300)
  });
});

$(function () {
  $(".item5").mouseover(function () {
    $('.item5 span').stop().slideDown(300)
  });
  $(".item5").mouseout(function () {
    $('.item5 span').stop().slideUp(300)
  });
});

$(function () {
  $(".item6").mouseover(function () {
    $('.item6 span').stop().slideDown(300)
  });
  $(".item6").mouseout(function () {
    $('.item6 span').stop().slideUp(300)
  });
});