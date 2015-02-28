######瀑布流DEMO######
来源:网络搜索<br/>
Demo文件组成<br/>
1.文件夹:<br/>
　　(1).Image : 存放示例图片<br/>
　　(2).Js :    存放jQuery以及瀑布流js文件<br/>

2.文件:<br/>
　　(1).Data.php : Ajax请求文件<br/>cd ww
　　(2).Index.html: demo演示页面<br/>
加载jQuery<br/>

//<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script><br/>

加载瀑布流js文件<br/>
//<script type="text/javascript" src="js/jquery.windswaterflow.js"></script><br/>
在页面中设置相关参数<br/>
/*
<script type="text/javascript">
    $(document).ready(function() {
        $(".container").windswaterflow({
            itemSelector: '.pin',
            loadSelector: '#loading',
            noSelector: '#noshow',
            //图片模板
            boxTemplate: '<div class="pin hide"><a href="{href}"><div class="img"><img src="{img}" alt="" /></div></a><div class="title">{title}</div><div class="like btn">喜欢</div><div class="comments btn">评论</div></div>',
            //图片div宽度
            columnWidth: 210,
            //图片x轴间距
            marginWidth: 14,
            //图片y轴间距
            marginHeight: 16,
            //ajax页面路径
            ajaxServer: 'data.php',
            //图片数量参数
            boxParam: 'num',
            //分页参数
            pageParam: 'page',
            //设置最大加载页数 0:不限制
            maxPage:0,
            //是否显示html页面默认图片 true :显示加载图片 false :显示页面默认图片
            init: true,
            //默认加载图片数量
            initBoxNumber: 20,
            //是否开启瀑布流 
            scroll: true,
            //每次加载的图片数量
            scrollBoxNumber: 10,
            callback: function() {
                $(".pin").mouseover(function() {
                    $(this).find(".btn").show();
                }).mouseout(function() {
                    $(this).find('.btn').hide();
                });
            }
        });
    });
</script>
*/