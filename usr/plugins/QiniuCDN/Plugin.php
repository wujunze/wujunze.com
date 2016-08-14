<?php
/**
 * 七牛镜像加速,暂时只支持图片加速。
 * @package QiniuCDN
 * @author YoungZhao
 * @version 1.0.1
 * @link http://www.typechodev.com
 *
 */
class QiniuCDN_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,激活失败,直接抛出异常
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {    
        Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('QiniuCDN_Plugin', 'qiniucdn');//针对内容处理
        Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('QiniuCDN_Plugin', 'qiniucdn');//针对摘要处理

        return _t('QiniuCDN 启用成功');
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){
    }

    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        $options = Typecho_Widget::widget('Widget_Options');
        //配置信息
        $baddress = new Typecho_Widget_Helper_Form_Element_Text('bad', NULL, NULL, _t('替换前地址'), _t('即你的附件存放地址，如http://www.yourblog.com/usr/uploads/'));
        $form->addInput($baddress);
        $aaddress = new Typecho_Widget_Helper_Form_Element_Text('aad', NULL, NULL, _t('替换后'), _t('即你的七牛云存储域名，如http://*.qiniudn.com/usr/uploads/'));
        $form->addInput($aaddress);
    }

    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form)
    {
    }

    /**
     * 高亮处理器
     * @access public
     * @param string $content 文章正文
     * @param Widget_Abstract_Contents $opt 
     */
    public static function qiniucdn($content, $opt)
    {
        $options = Typecho_Widget::widget('Widget_Options');
        $config = $options->plugin('QiniuCDN');
        $beforeadd = $config->bad;
        $afteradd = $config->aad;
        $result = str_ireplace($beforeadd,$afteradd,$content);
        return trim($result);
    }

}