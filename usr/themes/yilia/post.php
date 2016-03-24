<?php $this->need('header.php'); ?>
<div class="body-wrap">
    <article class="article article-type-post" itemscope itemprop="blogPost">
    <div class="article-meta">
        <a href="<?php $this->permalink() ?>" class="article-date">
            <time datetime="<?php $this->date('Y-m-d\TH:i:s.000\Z'); ?>" itemprop="datePublished"><?php $this->date('M j');?></time>
        </a>
    </div>
  <div class="article-inner">
    <input type="hidden" class="isFancy" />
    <header class="article-header">
      <h1 class="article-title" itemprop="name">
        <?php $this->title() ?>
      </h1>
    </header>
    <div class="article-info article-info-post">
        <div class="article-tag tagcloud">
            <?php echo yqctags($this);?>
        </div>
        <div class="article-category tagcloud">
            <?php $this->category(""); ?>
        </div>
    </div>
    <div class="clearfix"></div>
        <div class="article-entry" itemprop="articleBody">
            <?php $this->content(''); ?>
        </div>
    </div>
    <div class="qq_box">
        让学习成为一种习惯! 欢迎加入IT技术交流群213470752
        <a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=4312a8b3aaae6d87ef30798db32357f8b35c9c084c5c51f858d90a324ae4ed30">
            <img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="IT技术交流" title="IT技术交流">
        </a>
    </div>
    <nav id="article-nav">
        <?php thePrev($this);?>
        <?php theNext($this);?>
    </nav>
    </article>

<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
