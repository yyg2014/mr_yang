$(function(){
	
	//初始化
	var pageW = $(document).width();
	var pageH = $(document).height();
	
	//alert(pageW);
	//alert(pageH);
	//在a连接上添加点击事件，点击时让登陆层显示出来
	$("a").click(function(e){
		$("#login").show();
		$(".screen").show();
		//取消默认行为
		e.preventDefault();
		
		//计算盒子的浮动位置
		//找到水平居中位置
		var bleft = pageW/2-$("#login").width()/2;
		
		//找到垂直居中的位置
		var btop = pageH/2-$("#login").height()/2;
		
		$("#login").css({"left":bleft,"top":btop});
		
		//设置遮罩层的大小
		$(".screen").css({'width':pageW,"height":pageH});
		
		
	});
	
	//当点击关闭按钮，让这个层消失
	$("#close").click(function(){
		$("#login").hide();
		$(".screen").hide();
	});
	
	
	
	
	
	
	
	
	
	

	
})





