    </div>
</div>

<footer>
    <div class="container">
        <p>
            &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
            <?php _e(' '); ?>
            <?php _e('由 <a href="http://www.wujunze.com" target="_blank">WuJunze</a> 强力驱动'); ?>
            <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256659855'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1256659855%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
        </p>
    </div>
</footer>

<?php $this->footer(); ?>
<script src="<?php $this->options->adminUrl('js/jquery.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/script.js'); ?>"></script>
    </body>
</html>
