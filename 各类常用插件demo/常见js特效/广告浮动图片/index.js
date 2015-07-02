$(function(){
	
	//初始化
	var pageH = document.documentElement.clientHeight;
	var pageW = document.documentElement.clientWidth;
	
	//使用一个全局变量来定义方向
	var x = 1,y = 1;
	
	//1.要让盒子浮动起来
	
	//2.让盒子动态的修改left属性和top属性
	var s = setInterval(move,1);
	
	$(".box").hover(function(){
		//鼠标挪进，清除计时器
		clearInterval(s);
	},function(){
		//鼠标挪出，执行定时器
		s = setInterval(move,1);
	});
	
	function move(){
		//定义一个盒子要改变的left属性值的变量
		bleft = parseInt($(".box").css("left"));
		bleft = bleft+x;

		//定义一个top来获取之前的值，在再次基础上递加
		btop = parseInt($(".box").css("top"));
		btop = btop+y;

		//判断临界点
		if(btop>=pageH-$(".box").height() || btop<=0){
			y = -y;//改变方向
		}
		if(bleft>=pageW-$(".box").width() || bleft<=0){
			x = -x;//改变方向
		}

		//设置box的浮动的位置
		$(".box").css({"left":bleft,"top":btop})
		
	}
	
	
	
	
	
	
	
	
	
	

	
})





