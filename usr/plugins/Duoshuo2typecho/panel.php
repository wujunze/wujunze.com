<?php
include 'common.php';
include 'header.php';
include 'menu.php';
?>
    <div class="main">
        <div class="body container">
            <?php include 'page-title.php'; ?>
            <div class="clearfix" style="padding-left: 20px;">
                <ul class="typecho-option-tabs">
                </ul>
            </div>
            <div class="col-group typecho-page-main">
                <div class="row typecho-page-main" role="form">
                    <div class="col-mb-12 col-tb-8 col-tb-offset-2">
                        <form action="<?php $options->index('/action/Duoshuo2typecho'); ?>" method="post" enctype="multipart/form-data">
                            <ul class="typecho-option" id="typecho-option-item-seo_enabled-1">
                                <li>
                                    <label class="typecho-label">
                                        多说评论json文件 *</label>
                                    <span style="margin-bottom:5px">
                                            <input type="file" name="comment_json">
                                        </span>
                                    <p class="description">
                                        提示：json文件的获取你可以到<a href="http://www.duoshuo.com" target="_blank">多说网站</a>，打开「工具->导出数据」，勾选导出文章和评论，解压后上传export.json文件。</p>
                                </li>
                                <br>
                                <li>
                                    <label class="typecho-label">
                                        多说管理员昵称</label>
                                    <span style="margin-bottom:5px">
                                            <input type="text" name="admin_name">
                                        </span>
                                    <p class="description">
                                        你在多说评论里的昵称，方便在导入评论到typecho的时候区分是否是博主评论，可留空。</p>
                                </li>
                            </ul>
                            <ul class="typecho-option typecho-option-submit" id="typecho-option-item--3">
                                <li>
                                    <button type="submit" class="btn primary">
                                        开始导入</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include 'copyright.php';
include 'common-js.php';
include 'table-js.php';
?>
<?php include 'footer.php'; ?>