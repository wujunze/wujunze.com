<?php
/**
 * 读者墙
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>


    <?php if (isset($this->options->plugins['activated']['Avatars'])) : ?>
        <li id="reader">
            <h3>Readers</h3>
            <ul>
                <li>
                    <?php Avatars_Plugin::output('span','mostactive'); ?>
                </li>
            </ul>
        </li>
    <?php endif; ?>
    <?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>
