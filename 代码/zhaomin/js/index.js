$(function(){
			$(".nav_list").mouseover(function(){
				$(this).children(".nav_list_child").show();
				$(this).children(".redm").show();
				$(this).css("background-color","#1c97d5")
			});
			$(".nav_list").mouseout(function(){
				$(this).children(".nav_list_child").hide();
				$(this).children(".redm").hide();
				$(this).css("background-color","#1877B7")
			});
			$(".nav li").mouseover(function(){
				$(this).children(".redm").show();
				$(this).css("background-color","#1c97d5")
			});
			$(".nav li").mouseout(function(){
				$(this).children(".redm").hide();
				$(this).css("background-color","#1877B7")
			});
			$(".nav_list a").mouseover(function(){
				$(this).css({
					"letter-spacing":"3px",
					"color":"#EB7347"
				});
			});
			$(".nav_list a").mouseout(function(){
				$(this).css({
					"letter-spacing":"1px",
					"color":"white"
				});
			});
			
	           var now1=0;
               var now2=0;
               var timeId;   
              $(".box2 li").eq(now1).css("background-color","#ff0000").siblings().css("background-color","#666666");
               
               $(".box2 li").click(function(){
               	   var index2=$(this).index();
               	   now1=index2;  
               	   now2=index2;
               	  $(".box2 li").eq(now1%3).css("background-color","#ff0000").siblings().css("background-color","#666666");
               	   $(".run").animate({"left":-310*index2},0);
               }); 
              function slider(){
               	     now1++;
               	     now2++;
               	     $(".box2 li").eq(now1%3).css("background-color","#ff0000").siblings().css("background-color","#666666");
               	      $(".run").animate({"left":-310*now2},1,function(){
               	         if(now1==3){
               	         	$(".run").css('left',0);
               	         	now2=0;
               	         	now1=0;
               	         }
               	         
               	      });
               	 }
               
                timeId = setInterval(slider,2400);
  
                $('.box2').mouseover(function(){
                	clearInterval(timeId);
                });
                $('.box2').mouseout(function(){
                	
                	timeId = setInterval(slider,2400);
                });
	  
	  $(".img3").mouseover(function(){
	  	    $(this).parent("a").siblings(".box6").delay(200).animate({"top":158},400);
	  });
	   $(".img3").mouseout(function(){
	  	    $(this).parent("a").siblings(".box6").delay(200).animate({"top":198},400);
	  });
	  
	  
		function move(){
			 $(".below a:not(.link_list a)").mouseover(function(){
			       $(this).css("color","#1877B7");
			  });
			   $(".below a:not(.link_list a)").mouseout(function(){
			  	   $(this).css("color","#000");
			  });	
		}
		setTimeout(move(),2000);

	  $(".below a:not(.link_list a)").mouseover(function(){
	  	   $(this).css("color","#1877B7");
	  });
	   $(".below a:not(.link_list a)").mouseout(function(){
	  	   $(this).css("color","#000");
	  });
	  
	 
	  $(".picture_run").mouseover(function(){
	  	$(".control").show();
	  	$(".control_list").show();
	  });
	 $(".control").mouseover(function(){
	  	$(".control").show();
	  	$(".control_list").show();
	  });
	  $(".picture_run").mouseout(function(){
	  	$(".control").hide();
	  	$(".control_list").hide();
	  });
	  
	  //大图轮播
	  var time1=0;
          $(".control_list li").eq(time1).children("div").css("background-color","rgba(0,0,0,0.6)");
	  function slider3(){
               	     	time1++;
               	     	time1=time1%3;
               	    $(".control_list li").eq(time1).children("div").css("background-color","rgba(0,0,0,0.6)");
               	    $(".control_list li").eq(time1).siblings("li").children("div").css("background-color","rgba(0,0,0,0.3)");
               	    $(".picture_run").animate({"top":-450*time1},0);
               	   
           	}
         timeId3 = setInterval(slider3,3000);
         
         $(".picture_run").mouseover(function(){
         	clearInterval(timeId3);
         });
         $(".control").mouseover(function(){
         	clearInterval(timeId3);
         	$(".control_list li").eq(time1).siblings("li").children("div").mouseover(function(){
         		$(this).css("background-color","rgba(0,0,0,0.6)");
         	});
         });
         $(".picture_run").mouseout(function(){
         	timeId3 = setInterval(slider3,3000);
         });
          $(".control").mouseout(function(){
         	timeId3 = setInterval(slider3,3000);
         	$(".control_list li").eq(time1).siblings("li").children("div").mouseout(function(){
         	$(this).css("background-color","rgba(0,0,0,0.3)");
         	});
         });
         //left
	     $('.control_left').click(function(){
        	time1--;
        	if(time1==-1){
        		time1=2;
        	}
        	$(".picture_run").animate({"top":-450*time1},0);
        	 $(".control_list li").eq(time1).children("div").css("background-color","rgba(0,0,0,0.6)");
             $(".control_list li").eq(time1).siblings("li").children("div").css("background-color","rgba(0,0,0,0.3)");
        });
        //right
        $('.control_right').click(function(){
        	time1++;
        	if(time1==3){
        		time1=0;
        	}
        	$(".picture_run").animate({"top":-450*time1},0);
        	 $(".control_list li").eq(time1).children("div").css("background-color","rgba(0,0,0,0.6)");
             $(".control_list li").eq(time1).siblings("li").children("div").css("background-color","rgba(0,0,0,0.3)");
        });
        //circle_click
        $(".control_list li").click(function(){
        	var index=$(this).index();
        	time1=index;
        	$(".picture_run").animate({"top":-450*time1},0);
        	 $(".control_list li").eq(time1).children("div").css("background-color","rgba(0,0,0,0.6)");
             $(".control_list li").eq(time1).siblings("li").children("div").css("background-color","rgba(0,0,0,0.3)");
        });
         
          
});
