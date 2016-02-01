<?php

function themeConfig($form) {
    $bgImg = new Typecho_Widget_Helper_Form_Element_Text('bgImg', NULL, NULL, _t('首页背景图片地址'), _t('在这里填入一个图片URL地址, 作为首页背景图片, 默认使用images下的rainbow.png'));
    $form->addInput($bgImg);

    $headIcon = new Typecho_Widget_Helper_Form_Element_Text('headIcon', NULL, NULL, _t('首页头像地址'), _t('在这里填入一个图片URL地址, 作为首页头像, 默认使用images下的head.png'));
    $form->addInput($headIcon);

    $siteIcon = new Typecho_Widget_Helper_Form_Element_Text('siteIcon', NULL, NULL, _t('标题栏和书签栏Icon'), _t('在这里填入一个图片URL地址, 作为标题栏和书签栏Icon, 默认不显示'));
    $form->addInput($siteIcon);

    $labelColor = new Typecho_Widget_Helper_Form_Element_Select('labelColor', array(
        'red' => _t('红色'),
        'green' => _t('绿色'),
        'blue' => _t('蓝色'),
        'purple' => _t('紫色'),
        'orange' => _t('橙色'),
        'teal' => _t('青色'),
        'grey' => _t('灰色')
    ), 'red', _t('标签颜色'), _t('包括标签的颜色和每篇文章中的圆形日期的颜色'));
    $form->addInput($labelColor);

    $navbarMeta = new Typecho_Widget_Helper_Form_Element_Checkbox('navbarMeta', array(
        'ShowSearch' => _t('显示搜索框'),
        'ShowRSS' => _t('显示RSS订阅'),
        'ShowEmail' => _t('显示电子邮箱')),
    array('ShowSearch', 'ShowRSS', 'ShowEmail'), _t('导航栏显示'));
    $form->addInput($navbarMeta->multimode());

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', array(
        'ShowRecentPosts' => _t('显示最新文章'),
        'ShowRecentComments' => _t('显示最近回复'),
        'ShowFriend' => _t('显示友情链接(确保正确启用了Links插件)'),
        'ShowCategory' => _t('显示分类'),
        'ShowArchive' => _t('显示归档'),
        'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowFriend', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
}
