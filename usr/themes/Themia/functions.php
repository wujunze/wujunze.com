<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
define("Themia_Version", "自用版");
function themeConfig($form) {
  echo '<p style="font-size:16px;text-align:center;">感谢您使用TE响应式主题 :<font color="#4A89DC"> Themia</font><font color="#F40"> '.Themia_Version.'</font> ![<a href="http://qqdie.com/archives/with-the-help-of-themia-subject-to-update-the-manual" target="_blank">更新与帮助</a>]</p>';


 $SmiliesSetting = new Typecho_Widget_Helper_Form_Element_Checkbox('SmiliesSetting', array(
      'Showimg' => _t('缩略图固定')
      ),
   array('Showimg'), _t('缩略图设置'), _t('文章没有图片时会随机调用缩略图，开启此项可将没有图片的文章缩略图固定为一张'));
   $form->addInput($SmiliesSetting->multiMode());

  //网站LOGO
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('博主头像地址'), _t('logo头像地址，不填写默认内置头像，这个建议用正方形的图片√'));
    $form->addInput($logoUrl);

  //背景
    $bgUrl = new Typecho_Widget_Helper_Form_Element_Text('bgUrl', NULL, NULL, _t('背景图地址'), _t('背景图地址，不填写默认为内置的图片，这个建议用高清大图√'));
    $form->addInput($bgUrl);   

    $weibo = new Typecho_Widget_Helper_Form_Element_Text('weibo', NULL,'http://weibo.com/jinzeboke', _t('新浪微博地址'), _t('填写你的新浪微博主页地址到菜单目录中'));
    $form->addInput($weibo);

$Categories = new Typecho_Widget_Helper_Form_Element_Text('Categories', NULL,NULL, _t('Categories分类归档地址'), _t('新建独立页面，选择模板Categories，这里填入独立页面的完整地址'));
    $form->addInput($Categories);

$Archive = new Typecho_Widget_Helper_Form_Element_Text('Archive', NULL,NULL, _t('Archive时间归档地址'), _t('新建独立页面，选择模板Archive，这里填入独立页面的完整地址'));
    $form->addInput($Archive);

$links = new Typecho_Widget_Helper_Form_Element_Text('links', NULL,NULL, _t('links友情链接地址'), _t('新建独立页面，写上朋友的链接，作为友情链接页面，然后把页面地址填入这里'));
    $form->addInput($links);
$about = new Typecho_Widget_Helper_Form_Element_Text('about', NULL,NULL, _t('about链接地址'), _t('新建独立页面，写上关于自己的属性，然后把页面地址填入这里'));
    $form->addInput($about);
$css = new Typecho_Widget_Helper_Form_Element_Radio('css',
array(
'1' => _t('1.在大屏幕显示宽的SideBar，在中屏幕显示窄的SideBar，在小屏幕显示抽屉SideBar（宽）'),
'2' => _t('2.在大屏幕和中屏幕显示窄的SideBar，在小屏幕显示抽屉SideBar（窄）'),
'3' => _t('3.在所有屏幕显示抽屉SideBar（宽）'),
'4' => _t('4.在所有屏幕显示抽屉SideBar（窄）'),
),
'1',
_t('sidebar风格'), _t('这里的风格指的是网站整体风格，文章风格可通过自定义字段字段名ys和字段值来控制，实现对单独的一篇文章的风格重定义（字段值就是上边对应的数字，如风格3，就在文章字段名填入ys，字段值填入3即可），文章封面效果也是用自定义字段，字段名fm，字段值就是封面的图片地址，启动封面效果的文章风格会变更为3（优先级高）√')); 
$form->addInput($css->multiMode());


  $tf = new Typecho_Widget_Helper_Form_Element_Radio('tf', 
    array(
        'open' => _t('启用居中风格，使用默认方式截取缩略内容'),  
        'more' => _t('启用居中风格，并强制使用more语法截取缩略内容'), 
        'close' => _t('不启用')
        ), 
    'close', 
    _t('文章标题居中风格'), _t('默认不启用，启用后文章缩略图会关闭显示，并且文章标题，分类等信息居中'));
    $form->addInput($tf);

 //工具开关
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('kp' => _t('文章中加入跨屏浏览二维码，支付宝打赏，及文章版权声明')
,
	'bjq' => _t('文章内容增强，加入最后编辑时间'),
	'Showfull' => _t('手机浏览器强制全屏，仅限于uc和QQ浏览器')
,'Showcolor' => _t('手机谷歌浏览器状态栏颜色渲染为白色'),
	'kiana' => _t('kiana封印解除'),
	'simg' => _t('全局不显示文章缩略图')
,),
    array('Showcolor','bjq'), _t('工具开关'));
    $form->addInput($sidebarBlock->multiMode());

     $jsq = new Typecho_Widget_Helper_Form_Element_Radio('jsq',array('0' => _t('不显示文章浏览次数'),'1' => _t('非插件实现'),'2' => _t('绛木子TePostViews插件')),'0',_t('文章阅读次数显示方案（后一项需要自行安装对应插件）'),_t("在工具开关中，打开文章浏览次数，然后选择这里的方案，两款方案最终效果都一样<br>在不清除cookie或者cookie未过期的情况下不会重复计数<br>提示：非插件的方案和Hanny的Stat插件使用的是同一个数据，所以如果你曾经用的是Star插件，可以直接选择第一项，同时禁用Star插件，以免重复计数【不禁用的话，访问一次，计数器会加2】"));
  $form->addInput($jsq); 
 $cdl = new Typecho_Widget_Helper_Form_Element_Radio('cdl',array('0' => _t('English'),'1' => _t('日本語【渣翻译】
'),'2' => _t('中文')),'0',_t('界面语言设置'),_t("尽管英文逼格比较高，但是中文有中文的好处。此处默认是英文，因为我比较屌，所以有日文选项"));
    $form->addInput($cdl); 
    $bqg = new Typecho_Widget_Helper_Form_Element_Radio('bqg',array('1' => _t('不开启版权狗'),'2' => _t('开启版权声明')),'1',_t('版权声明'),_t("复制文章内容时，会出现版权声明提示，并且复制的内容自带版权声明。"));
    $form->addInput($bqg);  
    //文章首行缩进
     $page_suo = new Typecho_Widget_Helper_Form_Element_Radio('page_suo', 
    array(
        'display' => _t('post和page页面启用'),  
        'display1' => _t('仅post页面启用'),  
        'display2' => _t('仅page页面启用'),    
        'close' => _t('禁用')
        ), 
    'close', 
    _t('文章首行缩进'), _t('开启后，所有文章内容将自动缩进2em（两个中文汉字宽度）'));
    $form->addInput($page_suo);
 //建站时间
    $time = new Typecho_Widget_Helper_Form_Element_Text('time', NULL, '2015/06/06', _t('博客成立时间'), _t('此功能是摆设，事件需要在模板kz.js中修改'));
    $form->addInput($time);

   //统计代码
$tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL,'', _t('底部声明什么的'), _t('填入备案链接或者统计代码或者版权什么的'));
$form->addInput($tongji);



    $sticky_1 = new Typecho_Widget_Helper_Form_Element_Text('sticky_1',NULL, NULL,'置顶主题ID', '填写对应主题的 id 即可使某些分类的文章在置顶首页显示（例如 1）。');
    $sticky_1->input->setAttribute('class', 'mini');
    $form->addInput($sticky_1->addRule('isInteger', '请填入数字'));

    $sticky_2 = new Typecho_Widget_Helper_Form_Element_Text('sticky_2',NULL, NULL,'置顶主题ID', '填写对应主题的 id 即可使某些分类的文章在置顶首页显示（例如 1）。');
    $sticky_2->input->setAttribute('class', 'mini');
    $form->addInput($sticky_2->addRule('isInteger', '请填入数字'));

    $sticky_3 = new Typecho_Widget_Helper_Form_Element_Text('sticky_3',NULL, NULL,'置顶主题ID', '填写对应主题的 id 即可使某些分类的文章在置顶首页显示（例如 1）。');
    $sticky_3->input->setAttribute('class', 'mini');
$form->addInput($sticky_3->addRule('isInteger', '请填入数字'));
}

/**
 * 解析内容以实现附件加速
 * @access public
 * @param string $content 文章正文
 * @param Widget_Abstract_Contents $obj
 */
function parseContent($obj){
    $options = Typecho_Widget::widget('Widget_Options');
    if(!empty($options->src_add) && !empty($options->cdn_add)){
        $obj->content = str_ireplace($options->src_add,$options->cdn_add,$obj->content);
    }
    echo trim($obj->content);
}

function themeInit($archive)
{

 if ($archive->is('author')) {
 $archive->parameter->pageSize = 50; // 自定义条数
}
    if ($archive->is('single'))
    {
        $archive->content = image_class_replace($archive->content);
    }
}

function image_class_replace($content)
{

  $content = preg_replace('#<a(.*?) href="([^"]*/)?(([^"/]*)\.[^"]*)"(.*?)>#',
        '<a$1 href="$2$3"$5 target="_blank">', $content);


  $content = preg_replace('#<img(.*?)src="([^"]*/)?(([^"/]*)\.[^"]*)"([^>]*?)>\+#',
        '<div class="figure nocaption fig-100"><a class="fancybox" href="$2$3" title="" target="_blank" rel="external"><img$1 class="fig-img" src="$2$3" $5>
</a></div>', $content);






 $content = preg_replace('#<img(.*?)src="([^"]*/)?(([^"/]*)\.[^"]*)"([^>]*?)>\[(25|33|50|75|100)\](<br\s*/?>)?#',
'<div class="figure  nocaption  fig-$6"><a class="fancybox" href="$2$3" title="" target="_blank" rel="external"><img $1 class="fig-img" src="$2$3"  $5>
</a></div>', $content);
   






 $content = preg_replace('#<img(.*?)src="([^"]*/)?(([^"/]*)\.[^"]*)"([^>]*?)>\[(25|33|50|75|100)\|右\](<br\s*/?>)?#',
'<div class="figure nocaption right fig-$6"><a class="fancybox" href="$2$3" title="" target="_blank" rel="external"><img class="fig-img" src="$2$3"  $5>
</a></div>', $content);



$content = preg_replace('#\[t(:|：)(.*?)\]<br\s*/?>#',
        '<div class="image-gallery">
        <div class="image-gallery-metabar">
            <span>$2</span>
        </div>', $content);

$content = preg_replace('#<img(.*?)src="([^"]*/)?(([^"/]*)\.[^"]*)"([^>]*?)>上(<br\s*/?>)?#',
'<div class="image-gallery-photos image-gallery-photos--thumbnail"> <div class="photo-box">
                    <a class="photo-box-inner fancybox" rel="fancybox-thumb" data-fancybox-group="gallery-undefined" title="" href="$2$3" target="_blank" style="top: -168.5px;">
                        <img $1 class="photo" src="$2$3" itemprop="image" $5>
                    </a>
                </div>', $content);





$content = preg_replace('#<img(.*?)src="([^"]*/)?(([^"/]*)\.[^"]*)"([^>]*?)>左(<br\s*/?>)?#',
'<div class="photo-box">
                    <a class="photo-box-inner fancybox" rel="fancybox-thumb" data-fancybox-group="gallery-undefined" title="" href="$2$3" target="_blank" style="top: -31px;">
                        <img class="photo" src="$2$3" itemprop="image"$5>
                    </a>
                </div>', $content);


$content = preg_replace('#<img(.*?)src="([^"]*/)?(([^"/]*)\.[^"]*)"([^>]*?)>右(<br\s*/?>)?#',
'<div class="photo-box">
                    <a class="photo-box-inner fancybox" rel="fancybox-thumb" data-fancybox-group="gallery-undefined" title="" href="$2$3" target="_blank" style="left: -18.9582px; top: -2.5px;">
                        <img class="photo" src="$2$3" itemprop="image"$5 style="height: 328px; width: 584.916px;">
                    </a>
                </div>', $content);
$content = preg_replace('#<img(.*?)src="([^"]*/)?(([^"/]*)\.[^"]*)"([^>]*?)>\.<br\s*/?>#',
'<div class="photo-box">
                    <a class="photo-box-inner fancybox" rel="fancybox-thumb" data-fancybox-group="gallery-undefined" title="" href="$2$3" target="_blank" style="top: -2px; left: -0.333333px;">
                        <img class="photo" src="$2$3" itemprop="image"$5 style="height: 328px; width: 546.667px;">
                    </a>
                </div>', $content);

$content = preg_replace('#<img(.*?)src="([^"]*/)?(([^"/]*)\.[^"]*)"([^>]*?)>\-(<br\s*/?>)?#',
'<div class="photo-box">
                    <a class="photo-box-inner fancybox" rel="fancybox-thumb" data-fancybox-group="gallery-undefined" title="" href="$2$3" target="_blank" style="top: -2px; left: -0.333333px;">
                        <img class="photo" src="$2$3" itemprop="image"$5 style="height: 328px; width: 546.667px;">
                    </a>
                </div></div></div>', $content);
$content = preg_replace('#{(.*?)\|(.*?)}#',
        '<ruby>$1<rp> (</rp><rt>$2</rt><rp>) </rp></ruby>', $content);

    return $content;
}

if(Typecho_Widget::widget('Widget_Options')->jsq == '1'){	
			
		
function get_post_view($archive)
{
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
 $views = Typecho_Cookie::get('extend_contents_views');
        if(empty($views)){
            $views = array();
        }else{
            $views = explode(',', $views);
        }
if(!in_array($cid,$views)){
       $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
        }
    }
    echo $row['views'];
}
}

function timer_start() {
global $timestart;
$mtime = explode( ' ', microtime() );
$timestart = $mtime[1] + $mtime[0];
return true;
}
timer_start();
 
function timer_stop( $display = 0, $precision = 3 ) {
global $timestart, $timeend;
$mtime = explode( ' ', microtime() );
$timeend = $mtime[1] + $mtime[0];
$timetotal = $timeend - $timestart;
$r = number_format( $timetotal, $precision );
if ( $display )
echo $r;
return $r;
}

/** 输出文章缩略图 */
function showThumbnail($widget)
{ 
    // 当文章无图片时的默认缩略图
    $rand = rand(1,99); // 随机 1-99 张缩略图

    $random = $widget->widget('Widget_Options')->themeUrl . '/img/sj/' . $rand . '.jpg'; // 随机缩略图路径
if(!empty(Typecho_Widget::widget('Widget_Options')->SmiliesSetting) && in_array('Showimg', Typecho_Widget::widget('Widget_Options')->SmiliesSetting)){
  $random = $widget->widget('Widget_Options')->themeUrl . '/img/mr.png'; // 若只想要一张默认缩略图请删除本行开头的"//"
}
//$cai = $widget->widget('Widget_Options')->themeUrl . '/timthumb.php?src=';
$cai = '';
    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i'; 
  $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i';
    $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i';



if ($attach && $attach->isImage) {

$ctu = $attach->url.$cai;
    } 
else 


if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
$ctu = $thumbUrl[1][0].$cai;
    }

//如果是内联式markdown格式的图片
  else   if (preg_match_all($patternMD, $widget->content, $thumbUrl)) {
$ctu = $thumbUrl[1][0].$cai;
    }
    //如果是脚注式markdown格式的图片
    else if (preg_match_all($patternMDfoot, $widget->content, $thumbUrl)) {
$ctu = $thumbUrl[1][0].$cai;
    }

 else
if ($widget->tags) {
foreach ($widget->tags as $tag) {

    $ctu = 'usr/themes/Themia/img/tag/' . $tag['slug'] . '.jpg';

    if(is_file($ctu))
    {
$ctu = $widget->widget('Widget_Options')->themeUrl . '/img/tag/' . $tag['slug'] . '.jpg';
       
    }
    else

 {
       $ctu = $random;
    }
   

break;
}
}
else {
$ctu = $random;
}
echo $ctu;
}


function theNext($widget, $default = NULL)
{
$db = Typecho_Db::get();
$sql = $db->select()->from('table.contents')
->where('table.contents.created > ?', $widget->created)
->where('table.contents.status = ?', 'publish')
->where('table.contents.type = ?', $widget->type)
->where('table.contents.password IS NULL')
->order('table.contents.created', Typecho_Db::SORT_ASC)
->limit(1);
$content = $db->fetchRow($sql);

if ($content) {
$content = $widget->filter($content);
$link = '<a class="post-action-btn btn btn--default tooltip--top" href="' . $content['permalink'] . '"  data-tooltip="' . $content['title'] . '">';
echo $link;
} else {
$link = '<a class="post-action-btn btn btn--disabled" target="_blank">
';
echo $link;
}
}
 
/**
* 显示上一篇
*
* @access public
* @param string $default 如果没有下一篇,显示的默认文字
* @return void
*/
function thePrev($widget, $default = NULL)
{
$db = Typecho_Db::get();
$sql = $db->select()->from('table.contents')
->where('table.contents.created < ?', $widget->created)
->where('table.contents.status = ?', 'publish')
->where('table.contents.type = ?', $widget->type)
->where('table.contents.password IS NULL')
->order('table.contents.created', Typecho_Db::SORT_DESC)
->limit(1);
$content = $db->fetchRow($sql);
 
if ($content) {
$content = $widget->filter($content);
$link = '<a class="post-action-btn btn btn--default tooltip--top" href="' . $content['permalink'] . '"  data-tooltip="' . $content['title'] . '">';
echo $link;
} else {
$link = '<a class="post-action-btn btn btn--disabled" target="_blank">
';
echo $link;
}
}

function theme_random_posts(){
$defaults = array(
'number' => 6,
'before' => '<ul class="archive-posts">',
'after' => '</ul>',
'xformat' => '<li class="archive-post"> <a class="archive-post-title" href="{permalink}">{title}</a>
 </li>'
);
$db = Typecho_Db::get();
 
$sql = $db->select()->from('table.contents')
->where('status = ?','publish')
->where('type = ?', 'post')
->limit($defaults['number'])
->order('RAND()');
 
$result = $db->fetchAll($sql);
echo $defaults['before'];
foreach($result as $val){
$val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
echo str_replace(array('{permalink}', '{title}'),array($val['permalink'], $val['title']), $defaults['xformat']);
}
echo $defaults['after'];
}

function is_pjax()
{
    return (isset($_SERVER['HTTP_X_PJAX']) && $_SERVER['HTTP_X_PJAX'] == 'true');
}

?>