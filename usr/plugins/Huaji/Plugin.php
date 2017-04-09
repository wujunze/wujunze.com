<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 滑来滑去的滑小稽。
 * 
 * @package 滑稽滑稽滑
 * @author journey.ad
 * @version 0.1
 * @link https://imjad.cn
 */
class Huaji_Plugin implements Typecho_Plugin_Interface
{
	/**
	 * 激活插件方法,如果激活失败,直接抛出异常
	 * 
	 * @access public
	 * @return void
	 * @throws Typecho_Plugin_Exception
	 */
	public static function activate()
	{
		Typecho_Plugin::factory('Widget_Archive')->header = array('Huaji_Plugin','header');
		Typecho_Plugin::factory('Widget_Archive')->footer = array('Huaji_Plugin','footer');
	}
	
	/**
	 * 禁用插件方法,如果禁用失败,直接抛出异常
	 * 
	 * @static
	 * @access public
	 * @return void
	 * @throws Typecho_Plugin_Exception
	 */
	public static function deactivate() {}
	
	/**
	 * 获取插件配置面板
	 * 
	 * @access public
	 * @param Typecho_Widget_Helper_Form $form 配置面板
	 * @return void
	 */
	public static function config(Typecho_Widget_Helper_Form $form)
	{
	    echo '滑来滑去的滑小稽。<br/>原作者：<a href="http://blog.thkira.com/" target="_blank">兰陵</a>';
	    $jquery = new Typecho_Widget_Helper_Form_Element_Radio(
        'jquery', array('0'=> '手动加载', '1'=> '自动加载'), 0, 'jQuery',
            '“<b>手动加载</b>”需要你手动加载jQuery，若选择“<b>自动加载</b>”，插件会自动加载jQuery，版本为1.9.1。');
        $form->addInput($jquery);
	    $show = new Typecho_Widget_Helper_Form_Element_Radio(
        'show', array('1'=> '一直显示', '2'=> '失去焦点时显示', '0'=> '不显示'), 1, '显示',
            '“<b>一直显示</b>”被选中时，滑稽会一直出现，若选择“<b>失去焦点时显示</b>”，滑稽仅当网页失去焦点时才会出现。');
        $form->addInput($show);
		$url = new Typecho_Widget_Helper_Form_Element_Text('url', NULL, '', _t('自定义图片'), _t('请输入自定义图片地址，默认为滑稽。'));
        $form->addInput($url);
	}
	/**
	 * 个人用户的配置面板
	 * 
	 * @access public
	 * @param Typecho_Widget_Helper_Form $form
	 * @return void
	 */
	public static function personalConfig(Typecho_Widget_Helper_Form $form) {}
	/**
	 * 输出头部css
	 * 
     * @access public
	 * @return void
	 */
    public static function header(){
        if(Typecho_Widget::widget('Widget_Options')->Plugin('Huaji')->show != '1'){$display = 'display: none;';}
		if(Typecho_Widget::widget('Widget_Options')->Plugin('Huaji')->jquery == '1'){
			echo '<script src="//lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js"></script>';
		}
	    echo '<style type="text/css">#wsj{'.$display.'position: absolute;z-index: 999;left: -158px;top: 350px;}@media screen and (max-width: 700px){#wsj{display: none;}}body{overflow-x:hidden;}</style>';
        }
	/**
	 * 输出底部
	 *
     * @access public
	 * @return void
	 */
    public static function footer(){
		$options = Typecho_Widget::widget('Widget_Options')->plugin('Huaji'); 
		if ($options->url == ""){
		    $imgUrl = 'data:image/png;base64,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';
		} else {
		    $imgUrl = $options->url;
		}
		
		if($options->show =='1'){
			$type = '$("#wsj").css("display", "block");';
		} else if($options->show =='2'){
			$type = '$(window).focus(function() {$("#wsj").css("display","none");});$(window).blur(function() {$("#wsj").css("display","block");});';
        } else{
			$type = '$("#wsj").css("display", "none");';
        }
        
		echo '<script type="text/javascript"> var wsjimg=new Image();wsjimg.src="'.$imgUrl.'";wsjimg.id="wsj";wsjimg.onload=function(){document.body.appendChild(wsjimg);window.setTimeout("wsja()",1000);window.setInterval("wsja()",4000)};function wsja(){if(parseInt($("#wsj").css("left"),10)<0){$("#wsj").css({"top":window.scrollY+250+"px","transform":"scalex(1)","transition":"all 0s"});$("#wsj").css({left:"1920px",top:window.scrollY+50+"px","transition":"all 1.0s"})}if(parseInt($("#wsj").css("left"),10)>=1920){$("#wsj").css({"top":window.scrollY+250+"px","transform":"scalex(-1)","transition":"all 0s"});$("#wsj").css({left:"-158px",top:window.scrollY+50+"px","transition":"all 1.0s"})}};'.$type.'</script>';
	}
}
