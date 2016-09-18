<?php 
/**
 * other
 * 
 * @package custom 
 * 
 */
 $this->need('header.php'); 
?>  


<?php if (isset($this->fields->fm)): ?>
<div class="post-header-cover
                    text-left
                    " style="background-image:url('<?php $this->fields->fm(); ?>');" data-behavior="3">
            
              <div class="post-header main-content-wrap text-left">
    
           <?php if (isset($this->fields->l)): ?><h1 itemprop="headline">
       <a class="link" href="<?php $this->fields->l(); ?>" target="_blank" itemprop="url"><?php $this->title() ?></a>
        </h1>

<?php else: ?>
          <h1 class="post-title" itemprop="headline">  <?php $this->title() ?>    </h1><?php endif; ?>
    <div class="post-meta">
    <time itemprop="datePublished" content="<?php $this->date('Y-m-j  H:i:s'); ?>">
	
		 <?php $this->date('M d,Y'); ?>
    	
    </time>
  	
        <span>in </span>
  <a class="category-link" > <?php $this->title() ?></a> <span>lang </span>
            <a class="category-link"    id="translateLink" href="javascript:translatePage();">繁</a> 
            <?php if ($this->options->jsq == '0'): ?><?php else: ?>
  <span>read (<?php if ($this->options->jsq == '1'): ?><?php get_post_view($this) ?><?php endif; ?><?php if ($this->options->jsq == '2'): ?><?php $this->viewsNum(); ?><?php endif; ?>)</span> 
<?php endif; ?>
<?php if($this->user->hasLogin()):?>
  <a href="<?php $this->options->adminUrl(); ?>write-page.php?cid=<?php echo $this->cid;?>" class="category-link"  target="_blank">编辑</a>
<?php endif;?>
</div>
</div> </div><?php endif; ?>



   <div id="main" <?php if ($this->fields->fm){ ?>data-behavior="3"<?php }else{ ?>
 <?php if ($this->fields->ys){ ?>data-behavior="<?php $this->fields->ys(); ?>"<?php }else{ ?>

data-behavior="<?php $this->options->css(); ?>"<?php };?><?php };?>
                 class="
                        hasCoverMetaIn
                        ">



<article class="post" itemscope itemType="http://schema.org/BlogPosting">
    
<?php if (isset($this->fields->fm)): ?><?php else: ?>
<div class="post-header main-content-wrap text-left">
    
         <?php if (isset($this->fields->l)): ?><h1 itemprop="headline">
       <a class="link" href="<?php $this->fields->l(); ?>" target="_blank" itemprop="url"><?php $this->title() ?></a>
        </h1>

<?php else: ?>
          <h1 class="post-title" itemprop="headline">  <?php $this->title() ?>    </h1><?php endif; ?>
    
    <div class="post-meta">
    <time itemprop="datePublished" content="<?php $this->date('Y-m-j  H:i:s'); ?>">
	
		 <?php $this->date('M d,Y'); ?>
    	
    </time>

        <span>in </span>
        
    <a class="category-link" > <?php $this->title() ?></a> <span>lang </span>
            <a class="category-link"    id="translateLink" href="javascript:translatePage();">繁</a> 
 <?php if ($this->options->jsq == '0'): ?><?php else: ?>
  <span>read (<?php if ($this->options->jsq == '1'): ?><?php get_post_view($this) ?><?php endif; ?><?php if ($this->options->jsq == '2'): ?><?php $this->viewsNum(); ?><?php endif; ?>)</span> 
<?php endif; ?>     
<?php if($this->user->hasLogin()):?>
  <a href="<?php $this->options->adminUrl(); ?>write-page.php?cid=<?php echo $this->cid;?>" class="category-link"  target="_blank">编辑</a>
<?php endif;?>
    
</div>
</div>
<?php endif; ?>    
        
    
    <div class="post-content markdown" itemprop="articleBody">
        <div class="main-content-wrap">
<strong>
统计：</strong>

<div  class="archive box" >

 自<?php $this->options->time(); ?>博客建立以来，截至北京时间 <?php
date_default_timezone_set(PRC);
 echo date('Y 年 m 月 d 日 H 时 i 分 s 秒');?>在已设定的 <strong><?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?><?php $stat->categoriesNum() ?></strong> 个分类
和 <strong><?php $stat->publishedPagesNum() ?></strong> 个页面中，
共发布了 <strong><?php $stat->publishedPostsNum() ?></strong> 篇文章，并至少收到了 <strong><?php $stat->publishedCommentsNum() ?></strong> 条相关评论。

</div>
<strong>分类：</strong><div  class="archive box" >
        <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>

        <?php $this->widget('Widget_Metas_Category_List')
->parse('  <a class="category category--small category--primary" href="{permalink}" data-category="{name}">{name}({count})</a> '); ?>
        </div><?php if($this->is('page', $pages->slug)): ?>
<strong>页面：</strong><div  class="archive box" >
          <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
  <a class="category category--small category--primary" href="<?php $pages->permalink(); ?>" data-category="<?php $pages->title(); ?>"><?php $pages->title(); ?></a> 

<?php endwhile; ?>





        </div><?php endif; ?>
<strong>
随机文章：</strong><div  class="archive box" > <?php theme_random_posts();?></div>
<strong>标签：</strong><div  class="archive box" >
<?php Typecho_Widget::widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true))->to($tags); ?>

<?php if($tags->have()): ?>

    <?php while ($tags->next()): ?>

    <a href="<?php $tags->permalink();?>" class="category category--small category--primary" data-category="<?php $tags->name(); ?>">

       <?php $tags->name(); ?></a>

<?php endwhile; ?>

<?php endif; ?></div>


<strong>
60天评论最多10篇文章：</strong>
<?php
function rmcp($days = 30,$num = 5){
$defaults = array(
'before' => '<div  class="archive box" ><ul class="archive-posts">',
'after' => '</ul></div>',
'xformat' => '<li class="archive-post"><a class="archive-post-title"  href="{permalink}">{title}</a><span class="subcolor">：{commentsNum}</span></li>'
);
 
$time = time() - (24 * 60 * 60 * $days);
$db = Typecho_Db::get();
$sql = $db->select()->from('table.contents')
->where('created >= ?', $time)
->where('type = ?', 'post')
->limit($num)
->order('commentsNum',Typecho_Db::SORT_DESC);
$result = $db->fetchAll($sql);
echo $defaults['before'];
foreach($result as $val){
$val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
echo str_replace(array('{permalink}', '{title}', '{commentsNum}'), array($val['permalink'], $val['title'], $val['commentsNum']), $defaults['xformat']);
}
echo $defaults['after'];
}
?>

<?php rmcp(60,10);?>










 <?php $this->content(); ?>


        </div>
    </div>
    <div class="post-footer main-content-wrap">
           <div class="post-footer-tags"> </div>
        <div class="post-actions-wrap">
    <nav>
        <ul class="post-actions post-action-nav">
            <li class="post-action">
        <?php thePrev($this); ?> <i class="fa fa-angle-left"></i><span class="hide-xs hide-sm text-small icon-ml"><?php if ($this->options->cdl == '0'): ?>PREVIOUS  <?php endif; ?><?php if ($this->options->cdl == '1'): ?>前编<?php endif; ?><?php if ($this->options->cdl == '2'): ?>前一篇<?php endif; ?></span></a>
            
          
            </li>
            <li class="post-action">
                          <?php theNext($this); ?><span class="hide-xs hide-sm text-small icon-mr"><?php if ($this->options->cdl == '0'): ?>NEXT<?php endif; ?><?php if ($this->options->cdl == '1'): ?>后编<?php endif; ?><?php if ($this->options->cdl == '2'): ?>后一篇<?php endif; ?></span>
                    <i class="fa fa-angle-right"></i></a>
                 </li>
        </ul>
    </nav>
      <ul class="post-actions post-action-share">
        <li class="post-action hide-lg hide-md hide-sm">
            <a class="post-action-btn btn btn--default btn-open-shareoptions"  href="#btn-open-shareoptions">
                <i class="fa fa-share-alt"></i>
            </a>
        </li>
   <li class="post-action hide-xs">
           <a class="post-action-btn btn btn--default tooltip--top" target="new" data-tooltip="分享至QQ空间" href="http://www.jiathis.com/send/?webid=qzone&amp;appkey=&amp;uid=2038027&amp;url=<?php $this->permalink() ?>&amp;title=<?php $this->title() ?>">
                <i class="fa fa-qq"></i>
            </a>
        </li>
        <li class="post-action hide-xs">
            <a class="post-action-btn btn btn--default tooltip--top" target="new" data-tooltip="分享至人人网" href="http://www.jiathis.com/send/?webid=renren&amp;appkey=&amp;uid=2038027&amp;url=<?php $this->permalink() ?>&amp;title=<?php $this->title() ?>">
                <i class="fa fa-renren"></i>
            </a>
        </li>
       
     

         <li class="post-action hide-xs">
            <a class="post-action-btn btn btn--default" target="new" data-tooltip="分享至新浪微博" href="http://www.jiathis.com/send/?webid=tsina&amp;appkey=&amp;uid=2038027&amp;url=<?php $this->permalink() ?>&amp;title=<?php $this->title() ?>">
                <i class="fa fa-weibo"></i>
            </a>
        </li>

        
            <li class="post-action">
                <a class="post-action-btn btn btn--default" href="#disqus_thread">
                    <i class="fa fa-comment-o"></i>
                </a>
            </li>
        
        <li class="post-action">
            
                <a class="post-action-btn btn btn--default"  href="#" onclick="gotoTop();return false;">
            
               <i class="fa fa-arrow-up"></i>
            </a>
        </li>
    </ul>
</div>
<div id="disqus_thread">
     <?php $this->need('comments.php'); ?>
</div>
        
    </div>
</article>


                    

	<?php $this->need('footer.php'); ?>