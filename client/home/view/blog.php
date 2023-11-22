<style>
    a {
        text-decoration: none;
        color: black;
    }
</style>

<?php

require _WEB_PATH_ROOT . '/client/home/model/blog.php';

?>

<hr>

<br>

<h3 class="">Tin tức</h3>

<br>
<div class="box_blog_home">
    <?php
    if (!empty($allBlog)) {
        foreach ($allBlog as $value) {
            extract($value);

    ?>
            <div class="item_blog">
                <img class="w-100 bra-10" src="<?php echo _WEB_HOST_TEMPLATE . '/client/assets/image/' . $image; ?>" alt="">
                <a href="">
                    <h5 class="mx-2"><?= $value['title'] ?></h5>
                </a>
            </div>
    <?php
        }
    }
    ?>

    <!-- <a href="" class="ml-auto w-100">Xem thêm tin tức >></a> -->

</div>