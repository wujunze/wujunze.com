function GenerateContentList()
{
 var mainContent = $('#mulu');
 var h1_list = $('#yl h1');　　//如果你的章节标题不是h1,只需要将这里的h1换掉即可
  var h2_list = $('#yl h2');
 if(mainContent.length < 1)
  return;
  
 if(h1_list.length>0)
 {
  var content = '';
  content += '';
  content += '<h2 id="table-of-contents">目录</h2>';
  content += '<ol class="toc">';
  for(var i=0; i<h1_list.length; i++)
  {
   var go_to_top = '<a name="_label' + i + '"></a>';
   $(h1_list[i]).before(go_to_top);
    
   var h2_list = $(h1_list[i]).nextAll("h2");
   var li2_content = '';
   for(var j=0; j<h2_list.length; j++)
   {
    var tmp = $(h2_list[j]).prevAll('h1').first();
    if(!tmp.is(h1_list[i]))
     break;
    var li2_anchor = '<a pjax="no" name="_label' + i + '_' + j + '"></a>';
    $(h2_list[j]).before(li2_anchor);
    li2_content += '<li class="toc-item toc-level-' + i + '_' + j + '"><a pjax="no" class="toc-link" href="#_label' + i + '_' + j + '"><span class="toc-text">' + $(h2_list[j]).text() + '</span></a></li>';
   }
    
   var li1_content = '';
   if(li2_content.length > 0)
    li1_content = '<li class="toc-item toc-level-' + i + '"><a pjax="no" class="toc-link" href="#_label' + i + '"><span class="toc-text">' + $(h1_list[i]).text() + '</span></a></li><ol class="toc-child">' + li2_content + '</ol>';
   else
    li1_content = '<li class="toc-item toc-level-' + i + '"><a  pjax="no" class="toc-link" href="#_label' + i + '"><span class="toc-text">' + $(h1_list[i]).text() + '</span></a></li>';
   content += li1_content;
  }
if($('#mulu').length != 0 )
  {
   $($('#mulu')[0]).prepend(content);
  }
 } else{

if(h1_list.length==0&&h2_list.length>0)
 {
  var content = '';
  content += '';
  content += '<h2 id="table-of-contents">目录</h2>';
  content += '<ol class="toc">';
  for(var i=0; i<h2_list.length; i++)
  {
   var go_to_top = '<a  pjax="no" name="_label' + i + '"></a>';
   $(h2_list[i]).before(go_to_top);
    
   var h3_list = $(h2_list[i]).nextAll("h3");
   var li3_content = '';
   for(var j=0; j<h3_list.length; j++)
   {
    var tmp = $(h3_list[j]).prevAll('h2').first();
    if(!tmp.is(h2_list[i]))
     break;
    var li3_anchor = '<a  pjax="no" name="_label' + i + '_' + j + '"></a>';
    $(h3_list[j]).before(li3_anchor);
    li3_content += '<li class="toc-item toc-level-' + i + '_' + j + '"><a pjax="no" class="toc-link" href="#_label' + i + '_' + j + '"><span class="toc-text">' + $(h3_list[j]).text() + '</span></a></li>';
   }
    
   var li2_content = '';
   if(li3_content.length > 0)
    li2_content = '<li class="toc-item toc-level-' + i + '"><a pjax="no" class="toc-link" href="#_label' + i + '"><span class="toc-text">' + $(h2_list[i]).text() + '</span></a></li><ol class="toc-child">' + li3_content + '</ol>';
   else
    li2_content = '<li class="toc-item toc-level-' + i + '"><a pjax="no" class="toc-link" href="#_label' + i + '"><span class="toc-text">' + $(h2_list[i]).text() + '</span></a></li>';
   content += li2_content;
  }
if($('#mulu').length != 0 )
  {
   $($('#mulu')[0]).prepend(content);
  }
 } 
}
}
 GenerateContentList();




function kz(){
$('.postShorten-title a').each(function(){
		$(this).click(function(){
			myloadoriginal = this.text;
			$(this).text('少女正在祈祷中...');
			var myload = this;
			setTimeout(function() { $(myload).text(myloadoriginal); }, 2011);

		});
	});






//搜索
$("a#sou").click(function () {
 $('body').prop('class', 'search_bg');
    $('.search_form');
    $('div#sos').prop('class', 'sb');
    $(".search_key").focus();
    $(".search_close").click(function () {
        $('.search_form');
        $('div#sos').prop('class', '');
 $('body').prop('class', '');
    });
});

$("li#sou").click(function () {
 $('body').prop('class', 'search_bg');
    $('.search_form');
    $('div#sos').prop('class', 'sb');
    $(".search_key").focus();
    $(".search_close").click(function () {
        $('.search_form');
        $('div#sos').prop('class', '');
 $('body').prop('class', '');
    });
});


$('#yl ul li').each(function(){
  $(this).addClass('fen')
})  


var music = document.getElementById("bgMusic");
$("#audioBtn").click(function(){
	if(music.paused){music.play();
}else
if(music.ended){music.play();}
else{music.pause();}
});


};
kz();

function show_date_time(){window.setTimeout("show_date_time()",1e3);var BirthDay=new Date("6/6/2015 18:18:00"),today=new Date,timeold=today.getTime()-BirthDay.getTime(),msPerDay=864e5,e_daysold=timeold/msPerDay,daysold=Math.floor(e_daysold),e_hrsold=24*(e_daysold-daysold),hrsold=Math.floor(e_hrsold),e_minsold=60*(e_hrsold-hrsold),minsold=Math.floor(60*(e_hrsold-hrsold)),seconds=Math.floor(60*(e_minsold-minsold));span_dt_dt.innerHTML=daysold+"天"+hrsold+"小时"+minsold+"分"+seconds+"秒"}
show_date_time();
/**
* JavaScript脚本实现回到页面顶部示例
* @param acceleration 速度
* @param stime 时间间隔 (毫秒)
**/
function gotoTop(acceleration,stime) {
   acceleration = acceleration || 0.1;
   stime = stime || 10;
   var x1 = 0;
   var y1 = 0;
   var x2 = 0;
   var y2 = 0;
   var x3 = 0;
   var y3 = 0; 
   if (document.documentElement) {
       x1 = document.documentElement.scrollLeft || 0;
       y1 = document.documentElement.scrollTop || 0;
   }
   if (document.body) {
       x2 = document.body.scrollLeft || 0;
       y2 = document.body.scrollTop || 0;
   }
   var x3 = window.scrollX || 0;
   var y3 = window.scrollY || 0;
 
   // 滚动条到页面顶部的水平距离
   var x = Math.max(x1, Math.max(x2, x3));
   // 滚动条到页面顶部的垂直距离
   var y = Math.max(y1, Math.max(y2, y3));
 
   // 滚动距离 = 目前距离 / 速度, 因为距离原来越小, 速度是大于 1 的数, 所以滚动距离会越来越小
   var speeding = 1 + acceleration;
   window.scrollTo(Math.floor(x / speeding), Math.floor(y / speeding));
 
   // 如果距离不为零, 继续调用函数
   if(x > 0 || y > 0) {
       var run = "gotoTop(" + acceleration + ", " + stime + ")";
       window.setTimeout(run, stime);
   }
   

}
  
