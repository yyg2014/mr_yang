$(function(){

	setInterval(function(){
		//将第一个li的margin-left减小
		$("li:first").animate({'margin-left':'-200px'},1000,function(){
			//将第一个li插入到最后一个li后边
			//此时第二个li变成第一个li
			$("li:first").css("margin-left",0).insertAfter($("li:last"));
		})
		
	},3000);
	
	
	
	
	

	
	
	
	
	
	
})





