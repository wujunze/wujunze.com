//————————————————————————————————————
//  Packaged PJAX By INLOJV 2015.01.09
//  页面、搜索、评论、评论分页 PJAX
//————————————————————————————————————

// ——————————————————————— AJAX-评论、搜索、分页 等
var ajx_main = '#blog' , // 要替换的主体id，改为你文章部分的容器
ajx_a = 'a[target!=_blank][pjax!=no][href!=#][href!=#duoshuo_thread][href!=#mulu][title!=Previous][title!=Next][rel!=nofollow]' , // a标签，自己添加排除规则
ajx_comt = 'comments' , // 整个评论区的id ,不加#
ajx_submit_form = '#bt' , // 提交按钮所在的表单
ajx_comtlist = '.comment-list' , // 评论列表id或class
ajx_comtpagenav = '.pagenav' , // 评论分页导航的id或class
ajx_comtpagenav_a = '.pagenav a' , // 评论分页导航的a标签
ajx_sform = '#sosuo' , // 搜索表单form标签
ajx_skey = '.search_key' ; // 搜索表单input标签内的id或class
function reload_func(){
cz();
kz();
GenerateContentList();
pangu.spacingPage(); 
var bLazy = new Blazy();
 if ( $('.ds-thread').length > 0 ) { 
if (typeof DUOSHUO !== 'undefined') DUOSHUO.EmbedThread('.ds-thread');
else 
$.getScript("//static.duoshuo.com/embed.js");
 }
  hl(); 
// 这里放置需要重载的JS或函数
}


$(function() {    
    a(); //pushState初始化执行一次
});
// 建立锚点函数，用于跳转后的滚动定位，使用这个主要是有侧栏评论带#号时能在请求后定位到该条评论的位置
function body_am(id) { 
    id = isNaN(id) ? $('#' + id).offset().top : id;
    $("body,html").animate({
        scrollTop: id
    }, 0);
    return false;
}
function to_am(url) { 
    var anchor = location.hash.indexOf('#'); // 用indexOf检查location.href中是否含有'#'号，如果没有则返回值为-1
    anchor = window.location.hash.substring(anchor + 1);
    body_am(anchor);
}
// 主页地址，用于下面的提交函数
var home_url = document.location.href.match(/\/\/([^\/]+)\//i)[0]; 
// 函数： 替换url，用于评论ajax提交
function replaceUrl(url, domain) {
    return url.replace(/\/\/([^\/]+)\//i, domain);
}
// 函数：从封装的Json获取
function getFormJson(frm) {
    var o = {};
    var a = $(frm).serializeArray();
    $.each(a,
        function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
        });
    return o;
}
// 函数：更新浏览器历史缓存（用于浏览器后退）
function l(){
    history.replaceState( // 刷新历史点保存的数据，给state填入正确的内容
    {    url: window.document.location.href,
        title: window.document.title,
        html: $(document).find(ajx_main).html(), // 抓取主体部分outerHTML用于呈现新的主体。也可以用这句 html: $(ajx_main).prop('outerHTML'),
    }, window.document.title, document.location.href);
}
// 函数：页面载入初始一次，解决Chrome浏览器初始载入时产生ajax效果的问题,并且监听前进后退事件
function a(){
    window.addEventListener( 'popstate', function( e ){  //监听浏览器后退事件
        if( e.state ){
            document.title = e.state.title;
            $(ajx_main).html( e.state.html ); //也可以用replaceWith ，最后这个html就是上面替换State后里面的html值   // 重载js
            window.load =  reload_func(); // 重载函数
        }
    });    
}
//函数：AJAX核心
function ajax(reqUrl, msg, method, data) {
    if (msg == 'pagelink' || msg == 'search') { // 页面、搜索
 $('.search_form');
        $('div#sos').prop('class', '');
 $('body').prop('class', '');
 $('div#container').prop('class', '');
    } else if ( msg == 'comment' ){ // 评论提交    
 $('div#container').prop('class', '');
    } else if ( msg == 'comtpagenav' ){ //  评论分页时
 $('div#container').prop('class', '');
    }
    $.ajax({
        url: reqUrl, 
        type: method,
        data: data,
        beforeSend : function () { //加载前操作 这个必须放在window.history.pushState()之前，否则会出现逻辑错误。    l(); //刷新历史点内容，这个必须放在window.history.pushState()之前，否则会出现逻辑错误。
        },
        success: function(data) {
            if (msg == 'pagelink' || msg == 'search') { // 又如果msg为 页面 或 搜索—— 【1】
                $(ajx_main).html($(data).find(ajx_main).html()) ; // 替换原#main的内容
 $('div#container').prop('class', 'loaded');
            } else if (msg == 'comment') { // 又如果msg为 评论回复——————————【2】 
                $('#' + ajx_comt).html($(data).find('#' + ajx_comt).html());//  评论列表滑出
 $('div#container').prop('class', 'loaded');
                $("body,html").animate({scrollTop:$('#'+ajx_comt).offset().top}, 900); // 定位返回评论ID顶部
            } else if (msg == 'comtpagenav') { // 又如果msg为 评论分页——【3】
                var content = $(data).find(ajx_main).html();
                var pagedstring = $(data).find(ajx_comtpagenav).html();
                $(ajx_main).html(content);
                $(ajx_comtpagenav).html(pagedstring);
                $(ajx_comtlist).fadeTo('normal',1); // 评论列表显示
                $(ajx_comtpagenav).fadeTo('normal',1); // 评论分页显示
                $("body,html").animate({scrollTop:$(ajx_comtlist).offset().top}, 600); 
            }
            document.title = $(data).filter("title").text(); // 浏览器标题变更
            if (msg != 'comment') { // —— 不为后退 也 不为评论回复时
                var state = { // 设置state参数
                    url: reqUrl,
                    title: $(data).filter("title").text(),
                    html: $(data).find(ajx_main).html(),
                };
                // 将当前url和历史url添加到浏览器当中，用于后退。里面三个值分别是: state, title, url
                window.history.pushState(state, $(data).filter("title").text(), reqUrl);
            }
        },
        complete: function() { // ajax完成后加载
            // 代码重载区
            if (msg == 'pagelink') { // 若msg为 页面链接
                to_am(reqUrl) ;// 定位到相应链接位置,这个必须放在window.history...之后执行，否则遇到带#号的链接，再点击其他链接地址栏就无法改变
            } 
            window.load =  reload_func(); // 重载函数
        },
        timeout: 5000, // 超时长度        
        error: function(request) { // 错误时的处理
            if (msg == msg == 'pagelink' || msg == 'search'){
                location.href = reqUrl;    //直接刷新跳转到请求的页面链接
            } else if (msg == 'comment') { // 若msg为评论回复
                alert($(request.responseText).filter("p").text()); // 弹出警告,这个是必需的，如果删除那么提交错误时就会打开空白页面
                $('#' + ajx_comt).fadeTo('normal',1); 
            } else if ( msg == 'comtpagenav' ) {
                $(ajx_comtlist).fadeTo('normal',1); // 警告后评论区显示
                $(ajx_comtpagenav).fadeTo('normal',1); // 警告后评论区显示
            } else {
                location.href = reqUrl; //页面错误时跳转到请求的页面
            }
        },
    });
}
//页面ajax
$('body').on("click",ajx_a,
function() {
    ajax($(this).attr("href"), 'pagelink');
    return false;
});
//评论ajax
$('body').on('submit',ajx_submit_form, 
function() {
    ajax(replaceUrl(this.action, home_url), 'comment', 'POST', getFormJson(this));
    return false;
});
//搜索ajax
$('body').on('submit',ajx_sform, 
function() {
    ajax(this.action + '?s=' + $(this).find(ajx_skey).val(), 'search'); 
    return false;
});
//评论分页ajax
$('body').on("click",ajx_comtpagenav_a,
function() {
    ajax($(this).attr("href"), 'comtpagenav');
    return false;
});