<?php
/**
 * 多说评论导入typecho插件
 *
 * @package Duoshuo2typecho
 * @author 大袋鼠
 * @version 1.0.0
 * @link https://muguang.me/
 */
class Duoshuo2typecho_Plugin implements Typecho_Plugin_Interface
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
        try {
            Duoshuo2typecho_Plugin::addTableField();
            $result = '启用成功，请进入 "<a href="extending.php?panel=Duoshuo2typecho%2Fpanel.php">控制台 > 多说评论导入Typecho</a>" 进行进一步操作';
        } catch (Typecho_Db_Exception $e) {
            $code = $e->getCode();
            if ('42S21' == $code || 1050 == $code || 1062 == $code || 1060 == $code) {
                $result = '启用成功，请进入 "<a href="extending.php?panel=Duoshuo2typecho%2Fpanel.php">控制台 > 多说评论导入Typecho</a>" 进行进一步操作';
            } else {
                throw new Typecho_Plugin_Exception(_t('插件启用失败，数据库操作时发生了一些问题'.$code));
            }
        }
        Helper::addAction('Duoshuo2typecho', 'Duoshuo2typecho_Action');
        Helper::addPanel(1, 'Duoshuo2typecho/panel.php', '多说评论导入Typecho', '多说评论导入Typecho', 'administrator');
        return _t($result);
    }

    /**
     * 为typecho评论表增加字段
     */
    public static function addTableField()
    {
        $db = Typecho_Db::get();
        $db->query("ALTER TABLE  `".$db->getPrefix()."comments` ADD  `post_id` BIGINT( 64 ) NOT NULL DEFAULT  '0' AFTER  `cid`;", Typecho_Db::WRITE);
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {
        Helper::removeAction('Duoshuo2typecho');
        Helper::removePanel(1, 'Duoshuo2typecho/panel.php');
    }

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

}
