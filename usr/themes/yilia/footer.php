
    <footer id="footer">
      <div class="outer">
        <div id="footer-info">
          <div class="footer-left">
            &copy;  <?php echo date('Y');?>  <a href="<?php $this->options->siteurl(); ?>"><?php $this->options->title(); ?></a>|<a href="http://www.miitbeian.gov.cn/" rel="nofollow"  target="_blank">京ICP备16000939号</a>
          </div>
          <div class="footer-right">
            <a href="http://typecho.org/" target="_blank">Typecho</a>  Theme <a href="https://github.com/wujunze/wujunze.com.git" target="_blank">Yilia</a> by Wujunze
          </div>
        </div>
      </div>
    </footer>
  </div>
  <script>
  var yiliaConfig = {
		fancybox: true,
		mathjax: undefined,
		animate: true,
		isHome: <?php echo $this->is('index')?'true':'false'; ?>,
		isPost: <?php echo $this->is('post')?'true':'false'; ?>,
		isArchive: <?php echo $this->is('archive')?'true':'false'; ?>,
		isTag: false,
		isCategory: false,
		open_in_new: false,
		prettify: true,
		base_url: "<?php $this->options->themeUrl();?>"
	}</script>
  <script src="<?php $this->options->themeUrl(); ?>js/require.min.js" type="text/javascript"></script>
  <script src="<?php $this->options->themeUrl(); ?>js/jquery.min.js" type="text/javascript"></script>
  <script src="<?php $this->options->themeUrl(); ?>js/main.js" type="text/javascript" ></script>
</div>
</body>
</html>
