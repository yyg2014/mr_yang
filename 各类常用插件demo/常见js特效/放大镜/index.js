$(function(){

	//1.对小图设置鼠标移动事件
	$("#small").mousemove(function(e){
		
		
		//对小盒子区域设置移动
		var sleft = e.clientX-$(".small_img").offset().left-$("#small_area").width()/2;
		
		var stop = e.clientY-$(".small_img").offset().top-$("#small_area").height()/2;
		
		//判断临界点：
		if(sleft<=0){
			sleft = 0;
		}
		
		if(sleft>=$(".small_img").width()-$("#small_area").width()){
			sleft = $(".small_img").width()-$("#small_area").width();
		}
		
		if(stop<=0){
			stop = 0;
		}
		
		if(stop>=$(".small_img").height()-$("#small_area").height()){
			stop = $(".small_img").height()-$("#small_area").height();
		}
		
		//设置位移
		$("#small_area").css({"left":sleft+"px","top":stop+"px"});
		
		//获取两个图的比例
		var bl = $(".big_img").width()/$(".small_img").width();
		
		//设置大图的移动
		$(".big_img").css({"left":-sleft*bl+"px","top":-stop*bl+"px"})
		
		//alert(bl);
		
	});
	
	
	
	

	
})





