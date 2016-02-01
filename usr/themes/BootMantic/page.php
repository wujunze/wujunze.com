<?php

    if (isset($_GET["action"]) && $_GET["action"] == "ajax_comments") {
        $this->need('comments.php');
    } else {
        if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');
        $this->need('header.php');
?>

<div class="main">
    <article class="block">
        <p class="title"><a href="<?php $this->permalink() ?>" target="_blank"><?php $this->title() ?></a></p>
        <div>
            <?php $this->content(); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
<?php } ?>
