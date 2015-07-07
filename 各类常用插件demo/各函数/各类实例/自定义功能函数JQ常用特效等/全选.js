$(function(){

	//全选
	$(":checkbox[name=all]").change(function(){
		//获取全选按钮的状态
		all = $(this).get(0).checked;
		//循环更改以下复选框的所有的状态为全选按钮的状态
		for(var i=0;i<$(":checkbox[name!=all]").size();i++){
			//通过DOM对象来对其checked属性进行修改
			$(":checkbox[name!=all]").get(i).checked = all;
		}
	});
	
	//反选
	$("button").click(function(){
		//找到复选框的状态
		for(var i=0;i<$(":checkbox[name!=all]").size();i++){
			//通过DOM对象来对其checked属性进行修改
			s = $(":checkbox[name!=all]").get(i).checked;
			//修改当前状态为反向状态
			$(":checkbox[name!=all]").get(i).checked = !s;
		}
	});
	
	
})





