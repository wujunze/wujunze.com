<?php $this->need('header.php'); ?> 






<?php if (isset($this->fields->fm)): ?>
<div class="post-header-cover <?php if($this->options->tf == 'open'||$this->options->tf == 'more'):?>
text-center<?php else: ?>text-left<?php endif; ?>" style="background-image:url('<?php $this->fields->fm(); ?>');" data-behavior="3">
            
              <div class="post-header main-content-wrap text-center">
    
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
    <a class="category-link" ><?php if($this->is('post')): ?><?php $this->category(',', true, '木有分类或者该分类已被删除'); ?><?php else: ?><?php $this->title() ?><?php endif;?></a> 
<?php if ($this->options->jsq == '0'): ?><?php else: ?>
  <span>read (<?php if ($this->options->jsq == '1'): ?><?php get_post_view($this) ?><?php endif; ?><?php if ($this->options->jsq == '2'): ?><?php $this->viewsNum(); ?><?php endif; ?>)</span> 
<?php endif; ?>
           <?php if($this->user->hasLogin()):?>

  <a href="<?php $this->options->adminUrl(); ?>write-<?php if($this->is('post')): ?>post<?php else: ?>page<?php endif;?>.php?cid=<?php echo $this->cid;?>" class="category-link"  target="_blank">编辑</a>
<?php endif;?>

</div>
</div> </div><?php endif; ?>



   <div id="main" <?php if ($this->fields->fm){ ?>data-behavior="3" class="hasCover                         hasCoverMetaOut"<?php }else{ ?>
 <?php if ($this->fields->ys){ ?>data-behavior="<?php $this->fields->ys(); ?>"<?php }else{ ?>data-behavior="<?php $this->options->css(); ?>"<?php };?>class="hasCoverMetaIn"<?php };?> >



<article class="post" itemscope itemType="http://schema.org/BlogPosting">
    
<?php if (isset($this->fields->fm)): ?><?php else: ?>
<div class="post-header main-content-wrap <?php if($this->options->tf == 'open'||$this->options->tf == 'more'):?>
text-center<?php else: ?>text-left<?php endif; ?>">
    
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
        
    <a class="category-link" ><?php if($this->is('post')): ?><?php $this->category(',', true, '木有分类或者该分类已被删除'); ?><?php else: ?><?php $this->title() ?><?php endif;?></a> 
         <?php if ($this->options->jsq == '0'): ?><?php else: ?>
  <span>read (<?php if ($this->options->jsq == '1'): ?><?php get_post_view($this) ?><?php endif; ?><?php if ($this->options->jsq == '2'): ?><?php $this->viewsNum(); ?><?php endif; ?>)</span> 
<?php endif; ?>
      <?php if($this->user->hasLogin()):?>
  <a href="<?php $this->options->adminUrl(); ?>write-<?php if($this->is('post')): ?>post<?php else: ?>page<?php endif;?>.php?cid=<?php echo $this->cid;?>" class="category-link"  target="_blank">编辑</a>
<?php endif;?>



</div>

</div>
<?php endif; ?>    
 <div class="post-content markdown" itemprop="articleBody">
        <div class="main-content-wrap" id="yl">

<?php if (isset($this->fields->li)): ?>
<style>
li.fen{
    display: block;
}
@media only screen and (min-width:1024px){
li.fen{
  float: left;
    width: 364px;
   white-space:nowrap; 
    text-overflow: ellipsis;
    overflow: hidden;
}
}
</style>
<?php endif; ?> 
<?php if($this->is('post')): ?><tree id="mulu"></tree>

<?php endif; ?>

 <?php echo $str = preg_replace('#static.iwch.me#','static-2.iwch.me',$this->content);?>


    </div>
</div>












    <div class="post-footer main-content-wrap">


<?php if($this->is('post')): ?>

 <?php if (!empty($this->options->sidebarBlock) && in_array('kp', $this->options->sidebarBlock)): ?>


<div style=" text-align: center;">  

    <div id="QR" style="display: none;">
      
        <div id="wechat" style="display: inline-block;    padding-right: 7px;">
         <img id="wechat_qr" src="<?php $this->options->themeUrl('image/wx.jpg'); ?>" alt="jrotty WeChat Pay" >
          <p>微信打赏</p>
        </div>
        <div id="alipay" style="display: inline-block;    padding-left: 7px;"><img id="alipay_qr" src="<?php $this->options->themeUrl('image/tb.jpg'); ?>" alt="jrotty Alipay">
          <p>支付宝打赏</p>
        </div>
    
    </div>


  <div id="ew" style="display: block;">
      
        
    <div id="erweima" style="display: inline-block">

<img id="erwei_qr" src="https://pan.baidu.com/share/qrcode?w=143&amp;h=143&amp;url=<?php $this->permalink() ?>"/>
 <p>扫描二维码，在手机上阅读！</p>
 </div>
    </div>


<!--
<a class="btn-like tag tag--primary tag--small t-link" data-cid="<?php $this->cid();?>" data-num="<?php $this->likesNum();?>"><i class="fa fa-heart-o"></i> 赞 | <span class="post-likes-num"><?php $this->likesNum();?></span></a>

-->
  <a id="rewardButton" disable="enable" onclick="var qr = document.getElementById('QR'); var ds = document.getElementById('ew');if (qr.style.display === 'block'){qr.style.display='none';ds.style.display='block'}else{ds.style.display='none';qr.style.display='block'}" class="tag tag--primary tag--small t-link"  target="_blank">
   赏
    </a>

  </div>


<?php endif; ?>

 <div class="post-footer-tags">
<?php if (!empty($this->options->sidebarBlock) && in_array('bjq', $this->options->sidebarBlock)): ?>
<div style="float:right">最后由<a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>编辑于<?php echo gmdate('Y/m/d', $this->modified + Typecho_Widget::widget('Widget_Options')->timezone); ?> 

</div> <?php endif; ?> 
              <span class="text-color-light text-small"><?php if ($this->options->cdl == '0'): ?>TAGGED IN<?php endif; ?><?php if ($this->options->cdl == '1'): ?>文章ラベル：<?php endif; ?><?php if ($this->options->cdl == '2'): ?>文章标签：<?php endif; ?></span><br/>


<nav class="tag tag--primary tag--small t-link" style=" display: inline-block;"> 
<?php if(  count($this->tags) == 0 ): ?>
<?php $this->category('</nav><nav class="tag tag--primary tag--small t-link" style=" display: inline-block;">', true, '木有分类或者该分类已被删除'); ?>
<?php else: ?>
<?php if ($this->options->cdl == '0'): ?><?php $this->tags('</nav><nav class="tag tag--primary tag--small t-link" style=" display: inline-block;">', true, ' <sx>none</sx>'); ?><?php endif; ?><?php if ($this->options->cdl == '1'): ?><?php $this->tags('</nav><nav class="tag tag--primary tag--small t-link" style=" display: inline-block;">', true, ' <sx>無</sx>'); ?><?php endif; ?><?php if ($this->options->cdl == '2'): ?><?php $this->tags('</nav><nav class="tag tag--primary tag--small t-link" style=" display: inline-block;">', true, ' <sx>无标签</sx>'); ?><?php endif; ?>
<?php endif; ?>
</nav>

            </div> <?php endif;?>

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
            <a class="post-action-btn btn btn--default btn-open-shareoptions"  href="#btn-open-shareoptions" pjax="no">
                <i class="fa fa-share-alt"></i>
            </a>
        </li>

   <li class="post-action hide-xs">
<a class="post-action-btn btn btn--default" target="_blank" data-tooltip="分享至Google"  href="https://plus.google.com/share?url=<?php $this->permalink() ?>">
                <i class="fa fa-google-plus"></i>
            </a>

        </li>
       
   <li class="post-action hide-xs">
           <a class="post-action-btn btn btn--default tooltip--top" target="_blank" data-tooltip="分享至QQ空间" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php $this->permalink() ?>&title=<?php $this->title() ?>&site=<?php $this->options->title(); ?>/&pics=<?php showThumbnail($this); ?>">
                <i class="fa fa-qq"></i>
            </a>
        </li>
     
     

         <li class="post-action hide-xs">
            <a class="post-action-btn btn btn--default" target="_blank" data-tooltip="分享至新浪微博" href="http://service.weibo.com/share/share.php?url=<?php $this->permalink() ?>/&appkey=<?php $this->options->title(); ?>/&title=<?php $this->title() ?>&pic=<?php showThumbnail($this); ?>">
                <i class="fa fa-weibo"></i>
            </a>
        </li>

        
            <li class="post-action">
                <a class="post-action-btn btn btn--default" href="#duoshuo_thread">
                    <i class="fa fa-comment-o"></i>
                </a>
            </li>
        
        <li class="post-action">
            <?php if($this->is('post')): ?>
<a class="post-action-btn btn btn--default" href="#mulu">
            
                <i class="fa fa-list"></i>
            </a><?php else: ?>
                <a class="post-action-btn btn btn--default"  href="#" onclick="gotoTop();return false;">
            
               <i class="fa fa-arrow-up"></i>
            </a>

<?php endif;?>
        </li>
    </ul>
</div>
<div id="duoshuo_thread">
    <?php $this->need('comments.php'); ?>

</div>
        
    </div>
</article>


                    

	<?php $this->need('footer.php'); ?>