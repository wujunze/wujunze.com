<!DOCTYPE HTML>
<!--[if lt IE 9]>
<html id="ie8" lang="zh-CN">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html lang="zh-CN">
<!--<![endif]-->
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="google-site-verification" content="ScmDBVL4m8_1FCWi0q1GowKId0hYzo3t10pCTkxiMwg" />
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!--[if lt IE 9]>
    <script src="<?php $this->options->adminUrl('js/html5shiv.js'); ?>"></script>
    <script src="<?php $this->options->adminUrl('js/respond.js'); ?>"></script>
    <![endif]-->

    <?php if ($this->options->siteIcon): ?>
    <link rel="Shortcut Icon" href="<?php $this->options->siteIcon() ?>" />
    <link rel="Bootmark" href="<?php $this->options->siteIcon() ?>" />
    <?php endif; ?>

    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/form.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/label.css'); ?>">    
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/zocial.css'); ?>">

    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/global.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/header.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/content.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/comments.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/mouse.css'); ?>">

<?php if ($this->options->bgImg): ?>
<style>
/* 自己用就放进外部css文件了, 为了能让php自定义, 只能放这里了 */
/* 如果提供背景, 就覆盖css/header.css里的默认背景 */
#description {
    background: url(<?php $this->options->bgImg() ?>);
    background-position-y: 10%;
    background-size: cover;
}
</style>
<?php endif; ?>

    <?php $this->header(); ?>
</head>

<body>
  
<div id="back-to-top" class="<?php $this->options->labelColor() ?>" data-scroll="body">
    <svg id="rocket" version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 64 64">
        <path fill="#CCCCCC" d="M42.057,37.732c0,0,4.139-25.58-9.78-36.207c-0.307-0.233-0.573-0.322-0.802-0.329
        c-0.227,0.002-0.493,0.083-0.796,0.311c-13.676,10.31-8.95,35.992-8.95,35.992c-10.18,8-7.703,9.151-1.894,23.262
        c1.108,2.693,3.048,2.06,3.926,0.115c0.877-1.943,2.815-6.232,2.815-6.232l11.029,0.128c0,0,2.035,4.334,2.959,6.298
        c0.922,1.965,2.877,2.644,3.924-0.024C49.974,47.064,52.423,45.969,42.057,37.732z M31.726,23.155
        c-2.546-0.03-4.633-2.118-4.664-4.665c-0.029-2.547,2.012-4.587,4.559-4.558c2.546,0.029,4.634,2.117,4.663,4.664
        C36.314,21.143,34.272,23.184,31.726,23.155z"></path>
    </svg>
</div>

<div class="navbar">
    <div class="container">
        <ul class="nav">
            <li><a<?php if($this->is('index')): ?> class="active"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
            <li><a<?php if($this->is('page', $pages->slug)): ?> class="active"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
        <div class="nav-right">
            <?php if (!empty($this->options->navbarMeta) && in_array('ShowSearch', $this->options->navbarMeta)): ?>
            <form class="search-form" method="post" action="./">
                <input type="text" name="s" class="search-input" placeholder="<?php _e('站内搜索'); ?>" />
            </form>
            <?php endif; ?>
            <ul class="nav">
                <?php if (!empty($this->options->navbarMeta) && in_array('ShowRSS', $this->options->navbarMeta)): ?>
                <li><a href="<?php $this->options->feedUrl(); ?>" class="zocial rss" target="_blank"></a></li>
                <?php endif; ?>
                <?php if (!empty($this->options->navbarMeta) && in_array('ShowEmail', $this->options->navbarMeta)): ?>
                <li><a href="mailto:<?php $this->author->mail(); ?>" class="zocial gmail" target="_blank"></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
  
<header id="description">
    <div id="site-header">
        <a class="site-title" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
    </div>
</header>

<div class="shadow"></div>

<div class="container" id="content">
    <div id="information" class="info block">
        <?php if ($this->options->headIcon): ?>
        <img class="avatar" src="<?php $this->options->headIcon() ?>" />
        <?php else: ?>
        <img class="avatar" src="<?php $this->options->themeUrl('images/head.png') ?>" />
        <?php endif; ?>
        <p class="description"><?php $this->options->description(); ?></p>
    </div>
    <div class="article-list">
