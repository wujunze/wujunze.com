<footer id="footer" xmlns="http://www.w3.org/1999/html">
      <div class="outer">
        <div id="footer-info">
          <div><SPAN id=span_dt_dt></SPAN></div>
          <br>
          <div class="footer-left">
            &copy;  <?php echo date('Y');?>  <a href="<?php $this->options->siteurl(); ?>"><?php $this->options->title(); ?></a>|<a href="" id="StranLink">繁体中文</a>|<a href="http://www.miitbeian.gov.cn/" rel="nofollow"  target="_blank">京ICP备16000939号</a>
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
    <SCRIPT language=javascript>
      function show_date_time(){
        window.setTimeout("show_date_time()", 1000);
        BirthDay=new Date("09/14/2015 00:00:00");//这个日期是可以修改的
        today=new Date();
        timeold=(today.getTime()-BirthDay.getTime());
        sectimeold=timeold/1000
        secondsold=Math.floor(sectimeold);
        msPerDay=24*60*60*1000
        e_daysold=timeold/msPerDay
        daysold=Math.floor(e_daysold);
        e_hrsold=(e_daysold-daysold)*24;
        hrsold=Math.floor(e_hrsold);
        e_minsold=(e_hrsold-hrsold)*60;
        minsold=Math.floor((e_hrsold-hrsold)*60);
        seconds=Math.floor((e_minsold-minsold)*60);
        span_dt_dt.innerHTML="博客已运行"+daysold+"天"+hrsold+"小时"+minsold+"分"+seconds+"秒";
      }
      show_date_time();
    </SCRIPT>

    <script src="<?php $this->options->themeUrl(); ?>js/require.min.js" type="text/javascript"></script>
  <script src="<?php $this->options->themeUrl(); ?>js/jquery.min.js" type="text/javascript"></script>
  <script src="<?php $this->options->themeUrl(); ?>js/main.js" type="text/javascript" ></script>
  <script src="<?php $this->options->themeUrl(); ?>js/number.js" type="text/javascript" ></script>
  <script src="<?php $this->options->themeUrl(); ?>js/jian-fan.js" type="text/javascript" ></script>
</div>
</body>
</html>
