<?php
/**
 * 用GeSHi高亮库解析代码内容
 * 
 * @package CodeBox
 * @author jKey
 * @version 0.1.1
 * @link http://typecho.jkey.lu/
 */
class CodeBox_Plugin implements Typecho_Plugin_Interface
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
		Typecho_Plugin::factory('Widget_Archive')->header = array('CodeBox_Plugin', 'addheader');
		Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('CodeBox_Plugin', 'parse');
		Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('CodeBox_Plugin', 'parse');
		Typecho_Plugin::factory('Widget_Abstract_Comments')->contentEx = array('CodeBox_Plugin', 'parse');
	}

	/**
	 * 禁用插件方法,如果禁用失败,直接抛出异常
	 * 
	 * @static
	 * @access public
	 * @return void
	 * @throws Typecho_Plugin_Exception
	 */
	public static function deactivate(){}

	/**
	 * 获取插件配置面板
	 * 
	 * @access public
	 * @param Typecho_Widget_Helper_Form $form 配置面板
	 * @return void
	 */
	public static function config(Typecho_Widget_Helper_Form $form){}

	/**
	 * 个人用户的配置面板
	 * 
	 * @access public
	 * @param Typecho_Widget_Helper_Form $form
	 * @return void
	 */
	public static function personalConfig(Typecho_Widget_Helper_Form $form){}

	/**
	 * 添加 codebox.css 到 <head> 中
	 * 
	 * @access public
	 */
	public static function addheader()
	{
		echo '<link rel="stylesheet" type="text/css" href="' . Helper::options()->pluginUrl . '/CodeBox/css/codebox.css" />' . "\n";
		// echo '<script type="text/javascript" src="' . Helper::options()->pluginUrl . '/CodeBox/js/codebox.js"></script>' . "\n";
	}

	/**
	 * 添加行号
	 * 
	 * @access public
	 * @param string $code 代码
	 * @param int $start 行号开始值
	 * @return string
	 */
	public static function codebox_line_numbers ($code, $start)
	{
		$line_count = count(explode("\n", $code));
		$output = '<pre>';
		for ($i = 0; $i < $line_count; $i ++) {
			$output .= ($start + $i) . "\n";
		}
		$output .= '</pre>';
		return $output;
	}

	/**
	 * 解析
	 * 
	 * @access public
	 * @param array $matches 解析值
	 * @return string
	 */
	public static function parseCallback($matches)
	{
		$param = trim($matches[2]);
		$source = '';
		$line = 1;
		$language = 'text';

		$map = array(
			'html'              =>  'html4strict',
			'js'                =>  'javascript',
			'as'                =>  'actionscript',
			'as3'               =>  'actionscript3'
		);

		if (!class_exists('GeSHi', false)) {
			require_once 'CodeBox/geshi/geshi.php';
		}

		if (!empty($param)) {
			if (preg_match("/(class|lang|language)=[\"']([\w-]*)[\"']/i", $param, $out)) {
					$language = trim($out[2]) == '' ? $language : trim($out[2]);
			}
			
			if (preg_match("/line=[\"'](\d*|n)[\"']/i", $param, $out)) {
				$line = trim($out[1]) == '' ? $line : trim($out[1]);
			}

			if (isset($map[$language])) {
				$language = $map[$language];
			}
		}

		$geshi = new GeSHi(trim($matches[3]), ucfirst($language));
		$geshi->enable_keyword_links(false);
		$source = $geshi->parse_code();

		$output = "\n";

		$output .= '<div class="codebox">';
		$output .= '<table><tr><td class="line_numbers">';
		$output .= CodeBox_Plugin::codebox_line_numbers(trim($matches[3]), $line);
		$output .= '</td><td class="code">';
		$output .= $source;
		$output .= "</td></tr></table></div>\n";

		return $output;
	}

	/**
	 * 插件实现方法
	 * 
	 * @access public
	 * @return void
	 */
	public static function parse($text, $widget, $lastResult)
	{
		$text = empty($lastResult) ? $text : $lastResult;

		if ($widget instanceof Widget_Archive || $widget instanceof Widget_Abstract_Comments) {
			return preg_replace_callback("/\s*<(code|pre)(\s*[^>]*)>(.*?)<\/\\1>\s*/si", array('CodeBox_Plugin', 'parseCallback'), $text);
//			return preg_replace_callback("/\s*<(code|pre)(?:lang=[\"']([\w-]*)[\"']|line=[\"'](\d*|n)[\"']|\s)+>(.*)<\/\\1>\s*/siU", array('CodeBox_Plugin', 'parseCallback'), $text);
		} else {
			return $text;
		}
	}
}
