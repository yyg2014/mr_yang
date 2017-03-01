$(function(){

	//初始化：
	$(".mark > li").hide();
	$(".mark > li").first().show();
	$(".num > li").first().css("color","#666");
	var inf = $(".mark > li:first img").attr("alt")
	$(".mark b").html(inf);

	//完成手动切换

	//1.对以下的小圆点做点击操作，完成图片的切换
	$(".num li").click(function(){
		$(".num li").css("color","#999");
		$(this).css("color","#666");
		
		//1.找到当前点击的li的索引
		var i = $(this).index();
		
		//2.让其他图片隐藏，尽让当前索引的图片显示出来
		$(".mark > li").hide();
		$(".mark > li").eq(i).show();
		var info = $(".mark > li:eq("+i+") img").get(0).alt;
		
		$(".mark b").html(info);
		
	});
	
	
	

	
})





