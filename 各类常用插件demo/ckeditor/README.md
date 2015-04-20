######CKEditor Version 4.4.6 + CkFinder Version: 2.4.2######
###**ckeditor+ckfiner实现图片上传** 
------详细配置参考  “./说明.html”------


**统一说明**：
无特殊说明，以下所有操作均在ckeditor目录完成。       

1.在页面<head>中引入ckeditor ckfinder核心文件ckeditor.js、 ckfinder.js
   

     <script type="text/javascript" src="ckeditor/ckeditor.js"></script> 
     <script type="text/javascript" src="ckeditor/ckfinder/ckfinder.js"></script>

 


2.**添加Js代码 第一种方式 可以在你要替换的 文本域 下方 直接添加<script></script>标签 
并添加以下代码 注意文本域id** 
以下单引号中的路径仅供参考 要根据本机实际路径进行修改

> CKEDITOR.replace('文本域id',{**filebrowserBrowseUrl** :
>   './ckeditor/ckfinder/ckfinder.html', filebrowserImageBrowseUrl :
>   './ckeditor/ckfinder/ckfinder.html?Type=Images',
> **filebrowserFlashBrowseUrl** :
>   './ckeditor/ckfinder/ckfinder.html?Type=Flash', filebrowserUploadUrl :
>   './ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
> **filebrowserImageUploadUrl** :
>   './ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
> **filebrowserFlashUploadUrl** :
>   './ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'});
> });

 


3.**或者使用另一种方式调用 ckeditor/config.js里修改过如下配置** 

> CKEDITOR.editorConfig = function( config ) { 
> 	config.filebrowserBrowseUrl= '/ckfinder/ckfinder.html';
> //上传文件时浏览服务文件夹 										 	config.filebrowserImageBrowseUrl=
> '/ckfinder/ckfinder.html?Type=Images'; //上传图片时浏览服务文件夹 
> 	config.filebrowserFlashBrowseUrl=
> '/ckfinder/ckfinder.html?Type=Flash'; //上传Flash时浏览服务文件夹 
> 	config.filebrowserUploadUrl =
> '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
> //上传文件按钮(标签) config.filebrowserImageUploadUrl=
> '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
> //上传图片按钮(标签) config.filebrowserFlashUploadUrl=
> '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
> //上传Flash按钮(标签)

 }; 
**然后在前台html页面添加**
	<script type="text/javascript">
window.onload = function(){
editor = CKEDITOR.replace('文本域id'); 
} 
</script>


4.**/ckfinder/config.php修改如下配置** 

function CheckAuthentication() {
 	return true;//默认为false 
} 

**5.$baseUrl = '/userfiles/';** //指定上传图片文件的目录 最好放到根目录，方便访问 。也可以设置成url 例如 http://localhost/userfiles/，这样这个地址就会自动追加到上传图片的路径里，形成完整路径 


$baseDir = '/userfiles/'; //指定图片文件的访问目录 


**6.如果还想参与上传过程复杂处理 可以从** /ckfinder/core/connector/php/php5/CommandHandler/FileUpload.php 中修改 


