<?php if($this->is('post')||$this->is('page')): ?> 


 <nav id="sidebar" <?php if ($this->fields->fm){ ?>data-behavior="3"<?php }else{ ?>
 <?php if ($this->fields->ys){ ?>data-behavior="<?php $this->fields->ys(); ?>"<?php }else{ ?>

data-behavior="<?php $this->options->css(); ?>"<?php };?><?php };?>>

<?php else: ?>
 <nav id="sidebar" data-behavior="<?php $this->options->css(); ?>" >
<?php endif; ?> 





 
<div class="sidebar-profile">
            

<a href="/#about" pjax="no">
                    <img class="sidebar-profile-picture" style="-moz-opacity:0.86; opacity:0.86;" <?php if ($this->options->logoUrl){ ?>src="<?php $this->options->logoUrl();?>"<?php }else{ ?>src="<?php $this->options->themeUrl('image/avatar.jpg'); ?>"<?php };?>/> </a>
        <span class="sidebar-profile-name"><?php $this->options->title(); ?></span> 

        </div>
    
    
        <ul class="sidebar-buttons">
        
            <li class="sidebar-button">
                
                    <a  class="sidebar-button-link " href="<?php $this->options->siteUrl(); ?>" >
                
                   <i class="sidebar-button-icon fa fa-lg fa-circle-thin"></i>
                    <span class="sidebar-button-desc"><?php if ($this->options->cdl == '0'): ?>Home<?php endif; ?><?php if ($this->options->cdl == '1'): ?>トップページ<?php endif; ?><?php if ($this->options->cdl == '2'): ?>主页<?php endif; ?></span>
                </a>
        </li>
        
            <li class="sidebar-button">
                
                    <a class="sidebar-button-link "
                         href="<?php $this->options->Categories();?>"
                   
                    >
                
                    <i class="sidebar-button-icon fa fa-lg fa-bookmark"></i>
                    <span class="sidebar-button-desc"><?php if ($this->options->cdl == '0'): ?>Categories<?php endif; ?><?php if ($this->options->cdl == '1'): ?>分類<?php endif; ?><?php if ($this->options->cdl == '2'): ?>分类归档<?php endif; ?>
</span>
                </a>
        </li>
        
            <li class="sidebar-button">
                
                    <a  class="sidebar-button-link "
                         href="<?php $this->options->Archive();?>"
                   
                    >
                
                   <i class="sidebar-button-icon fa fa-lg fa-calendar"></i>
                    <span class="sidebar-button-desc"><?php if ($this->options->cdl == '0'): ?>Archive<?php endif; ?><?php if ($this->options->cdl == '1'): ?>ファイリング<?php endif; ?><?php if ($this->options->cdl == '2'): ?>时间归档<?php endif; ?></span>
                </a>
        </li>
        
          

  <li class="sidebar-button" id="sou">
           

                    <a  class="sidebar-button-link st-search-show-outputs" 
 pjax="no" >
                
                    <i class="sidebar-button-icon fa fa-lg fa-search" ></i>
                     <span class="sidebar-button-desc"><?php if ($this->options->cdl == '0'): ?>Search<?php endif; ?><?php if ($this->options->cdl == '1'): ?>検索<?php endif; ?><?php if ($this->options->cdl == '2'): ?>搜索<?php endif; ?>
</span>
                </a>
 
        </li>






   
            <li class="sidebar-button">
                
                    <a  class="sidebar-button-link "
                         href="<?php $this->options->about();?>"
           
                    >
                
                   <i class="sidebar-button-icon fa fa-lg fa-book"></i>
                    <span class="sidebar-button-desc"><?php if ($this->options->cdl == '0'): ?>About<?php endif; ?><?php if ($this->options->cdl == '1'): ?>わたし<?php endif; ?><?php if ($this->options->cdl == '2'): ?>关于<?php endif; ?></span>
                </a>
        </li>
        
 
    </ul>
    
        <ul class="sidebar-buttons">
 
         
                   <li class="sidebar-button">
                
                    <a  class="sidebar-button-link " href="<?php $this->options->weibo();?>" target="_blank" >
                
                    <i class="sidebar-button-icon fa fa-lg fa-weibo"></i>
                    <span class="sidebar-button-desc"><?php if ($this->options->cdl == '0'): ?>Weibo<?php endif; ?><?php if ($this->options->cdl == '1'): ?>ミニブログ<?php endif; ?><?php if ($this->options->cdl == '2'): ?>微博<?php endif; ?></span>
                </a>
        </li>

<li class="sidebar-button">
                
                    <a class="sidebar-button-link " href="<?php $this->options->links();?>" >
                <i class="sidebar-button-icon fa fa-lg fa-at"></i>
                    <span class="sidebar-button-desc"><?php if ($this->options->cdl == '0'): ?>Links<?php endif; ?><?php if ($this->options->cdl == '1'): ?>友达<?php endif; ?><?php if ($this->options->cdl == '2'): ?>友链<?php endif; ?></span>
                </a>
        </li>
    </ul>


</nav>  
<div class="sidebar_wo" id="leimu">
<img src="<?php $this->options->themeUrl('image/a.png'); ?>" alt="雷姆_b.png" onmouseover="this.src='<?php $this->options->themeUrl('image/b.png'); ?>'" onmouseout="this.src='<?php $this->options->themeUrl('image/a.png'); ?>'" id="audioBtn">

</div>