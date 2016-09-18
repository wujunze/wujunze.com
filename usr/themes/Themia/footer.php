<footer id="footer" class="main-content-wrap">
博客已萌萌哒运行<span id=span_dt_dt></span><br>
    <span class="copyrights">
&copy; 2016 jrotty 
 Power By <a  target="_blank"  href="http://typecho.org/">Typecho</a> 
 Loading time <?php timer_stop($this) ?>s
<?php if (!is_pjax()) { ?><?php $this->options->tongji(); ?><?php } ?></span><?php if($this->user->hasLogin()):?>  <a href="<?php $this->options->logoutUrl(); ?>" class="category-link" >out</a><?php endif;?></footer>

            </div> 


<?php if($this->is('post')): ?>


    <div id="bottom-bar" class="post-bottom-bar" <?php if ($this->fields->fm){ ?>data-behavior="3"<?php }else{ ?>
 <?php if ($this->fields->ys){ ?>data-behavior="<?php $this->fields->ys(); ?>"<?php }else{ ?>

data-behavior="<?php $this->options->css(); ?>"<?php };?><?php };?>>

            
            
              
                    <div class="post-actions-wrap">
    <nav>
        <ul class="post-actions post-action-nav">
            <li class="post-action"> 
              <?php thePrev($this); ?><i class="fa fa-angle-left"></i><span class="hide-xs hide-sm text-small icon-ml"><?php if ($this->options->cdl == '0'): ?>PREVIOUS  <?php endif; ?><?php if ($this->options->cdl == '1'): ?>前编<?php endif; ?><?php if ($this->options->cdl == '2'): ?>前一篇<?php endif; ?></span></a>
                
            </li>
 <li class="post-action">
                
            <?php theNext($this); ?><span class="hide-xs hide-sm text-small icon-mr"><?php if ($this->options->cdl == '0'): ?>NEXT<?php endif; ?><?php if ($this->options->cdl == '1'): ?>前编<?php endif; ?><?php if ($this->options->cdl == '2'): ?>后一篇<?php endif; ?></span>
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
            
            <a class="post-action-btn btn btn--default" href="#mulu">
            
                <i class="fa fa-list"></i>
            </a>
        </li>
    </ul>
</div>


                </div>

 <div id="share-options-bar" class="share-options-bar" <?php if ($this->fields->fm){ ?>data-behavior="3"<?php }else{ ?>
 <?php if ($this->fields->ys){ ?>data-behavior="<?php $this->fields->ys(); ?>"<?php }else{ ?>

data-behavior="<?php $this->options->css(); ?>"<?php };?><?php };?>>

                
    <ul class="share-options">
        <li class="share-option">
            <a class="share-option-btn" target="_blank" href="http://service.weibo.com/share/share.php?url=<?php $this->permalink() ?>/&appkey=<?php $this->options->title(); ?>/&title=<?php $this->title() ?>&pic=<?php showThumbnail($this); ?>">
                 <i class="fa fa-weibo"></i><span class="">Share on 新浪微博</span>
            </a>
        </li>
        
        <li class="share-option">
            <a class="share-option-btn" target="_blank" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php $this->permalink() ?>&title=<?php $this->title() ?>&site=<?php $this->options->title(); ?>/&pics=<?php showThumbnail($this); ?>">
                <i class="fa fa-qq"></i><span>Share on QQ空间</span>
            </a>
        </li><li class="share-option">
            <a class="share-option-btn" target="_blank" href="https://plus.google.com/share?url=<?php $this->permalink() ?>">
                <i class="fa fa-google-plus"></i><span>Share on Google</span>
            </a>
        </li>
    </ul>
</div>
<div id="share-options-mask" class="share-options-mask"></div>
       
<?php endif; ?>


 </div> </div>
        <div id="about">
    <div id="about-card">
        <div id="about-btn-close">
            <i class="fa fa-remove"></i>
        </div>   
<img id="about-card-picture" <?php if ($this->options->logoUrl){ ?>src="<?php $this->options->logoUrl();?>"<?php }else{ ?>src="<?php $this->options->themeUrl('image/avatar.jpg'); ?>"<?php };?>/>
        
            <h4 id="about-card-name">  <?php $this->author() ?></h4>
 <h5 id="about-card-bio"><p>
<?php $this->options->description() ?>
</p></h5>

  <h5 id="about-card-job">
                <i class="fa fa-briefcase"></i>
                <br/>
                未知

            </h5>
        
        
            <h5 id="about-card-location">
                <i class="fa fa-map-marker"></i>
                <br/>
                盛京
            </h5>
    
    </div>
</div>






     


<?php if ($this->options->bqg == '2'): ?>  <?php if($this->user->hasLogin()):?>

<?php else:?>
<script>
document.body.addEventListener('copy', function (e) {
    if (window.getSelection().toString() && window.getSelection().toString().length > 42) {
        setClipboardText(e);
     notie({
  type: 'info',
  text: '商业转载请联系作者获得授权，非商业转载请注明出处，谢谢合作。',
  autoHide: true
})
    }
}); 
function setClipboardText(event) {
    var clipboardData = event.clipboardData || window.clipboardData;
    if (clipboardData) {
        event.preventDefault();
 
        var htmlData = ''
            + '著作权归作者所有。<br>'
            + '商业转载请联系作者获得授权，非商业转载请注明出处。<br>'
            + '作者：<?php $this->author() ?><br>'
            + '链接：' + window.location.href + '<br>'
            + '来源：<?php $this->options->siteUrl(); ?><br><br>'
            + window.getSelection().toString();
        var textData = ''
            + '著作权归作者所有。\n'
            + '商业转载请联系作者获得授权，非商业转载请注明出处。\n'
            + '作者：<?php $this->author() ?>\n'
            + '链接：' + window.location.href + '\n'
            + '来源：<?php $this->options->siteUrl(); ?>\n\n'
            + window.getSelection().toString();
 
        clipboardData.setData('text/html', htmlData);
        clipboardData.setData('text/plain',textData);
    }
}

</script><?php endif;?><?php endif; ?>




<audio id="bgMusic" src="这里需要添加个音乐链接" loop="loop" ></audio>
 










<?php if (!empty($this->options->sidebarBlock) && in_array('kiana', $this->options->sidebarBlock)): ?>


<script type="text/javascript" src="<?php $this->options->themeUrl('bga.min.js'); ?>" ></script><?php endif; ?> 


 <div id="container" class="loaded">
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
    </div>


<div class="search_form">
        <form method="post" action="https://qqdie.com" class="sosuo" id="sosuo"> 
            <input class="search_key" name="s" autocomplete="off" placeholder="Enter search keywords..." type="text" value="" required="required">
<button type="submit" class="submit"><i class="fa fa-lg fa-search" id="bt"></i></button>
        </form>
        <span class="search_close"><i class="fa fa-close" id="close"></i></span>
    </div>


 <div id="cover"<?php if ($this->options->bgUrl){ ?>
style="background-color: black;background-image:url('<?php $this->options->bgUrl();?>');"
<?php }else{ ?>style="background-color: black;background-image:url('<?php $this->options->themeUrl('image/bg.jpg'); ?>');"<?php };?>></div>
   </body>




 <script src="<?php $this->options->themeUrl('js/jquery.js'); ?>" type="text/javascript"></script>
<script src="//cdn.bootcss.com/highlight.js/9.4.0/highlight.min.js"></script>
<script>
function hl(){
$(document).ready(function() {
  $('pre code').each(function(i, block) {
    hljs.highlightBlock(block);
  });
});
}
hl();
</script>
<script src="<?php $this->options->themeUrl('kz.js'); ?>" ></script>
<script src="<?php $this->options->themeUrl('js/jquery.fancybox.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('js/jquery.fancybox-thumbs.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('js/tranquilpeak.js'); ?>" type="text/javascript"></script>

<!--PANGU AUTO SPACE--><script src="<?php $this->options->themeUrl('js/pangu.min.js'); ?>"></script>
<script> pangu.spacingPage(); </script>
<!--PANGU AUTO SPACE END--><script src="<?php $this->options->themeUrl('js/blazy.min.js'); ?>"></script> <script>
        ;(function() {
            // Initialize
            var bLazy = new Blazy();
        })();
    </script>
<script src="<?php $this->options->themeUrl('pjax.js'); ?>" ></script><?php if (!is_pjax()) { ?><?php } ?>
<?php $this->footer(); ?>
</html>