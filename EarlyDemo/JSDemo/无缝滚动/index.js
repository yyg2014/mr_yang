$(function(){

	//初始化
	var num = $(".images img").size();
	var size = num*$("img").width();
	
	//将图片层克隆一份，放在后边
	var images = $(".images").clone(true);
	images.insertAfter($(".images"));
	
	//设置一个计时器
	var s = setInterval(move,10);
	
	function move(){
		//找到临界点，当第二个层的第一张图片到达最左边，就恢复到初始状态
		if(parseInt($(".images").eq(0).css("margin-left"))<=-size){
			//将第一个层的margin-left设置为0，恢复到初始状态
			$(".images").eq(0).css("margin-left",0)
		}
	
		//将第一个层的margin-left不断递减
		$(".images").eq(0).css("margin-left","-=1px");
	}
	
	//当鼠标移入，将滚动停止
	
	$("#win").hover(function(){
		//清除计时器
		clearInterval(s);
	},function(){
		s = setInterval(move,10);
	});
	
	
	
	
	

	
})





