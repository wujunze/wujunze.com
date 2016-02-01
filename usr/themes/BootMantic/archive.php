<?php $this->need('header.php'); ?>

<div class="main">
    <div class="category block">
        <p class="ui ribbon label <?php $this->options->labelColor() ?>"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?>
        </p>
    </div>
    <?php if ($this->have()): ?>
        <?php while($this->next()): ?>
        <article class="block post">
            <span class="round-date <?php $this->options->labelColor() ?>">
                <span class="month"><?php $this->date('m月'); ?></span>
                <span class="day"><?php $this->date('d'); ?></span>
            </span>
            <h2 class="title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
            <div class="article-content <?php $this->options->labelColor() ?>">
                <?php $this->content('阅读全文 >>'); ?>
            </div>
        </article>
        <?php endwhile; ?>
    <?php else: ?>
        <article class="block">
            <h2 class="header"><?php _e('没有找到内容'); ?></h2>
        </article>
    <?php endif; ?>

    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
