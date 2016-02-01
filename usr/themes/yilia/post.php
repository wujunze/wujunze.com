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
    <nav id="article-nav">
        <?php thePrev($this);?>
        <?php theNext($this);?>
    </nav>
    </article>

<?php if(!empty($this->options->ujian)): ?>
<!-- UJian Button BEGIN -->
<script type="text/javascript" src="http://v1.ujian.cc/code/ujian.js?type=slide&btn=3&fade=1&uid=<?php echo $this->options->ujian ?>"></script>
<!-- UJian Button END -->
<?php endif; ?>
<?php $this->need('comments.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
