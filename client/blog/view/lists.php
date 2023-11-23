<?php

$body = getRequest('get');

$count = 0;
$filter = '';
$urlFilter = '';

if(!empty($body['keywork'])){
    $keywork = $body['keywork'];
    $filter .= " AND `title` LIKE '%$keywork%' ";
    $urlFilter .= "&keywork=$keywork";
}

if(!empty($body['blog_type'])){
    $blog_type = $body['blog_type'];
    $filter .= " AND `blog_type_id` = '$blog_type' ";
    $urlFilter .= "&blog_type=$blog_type";
}

require _WEB_PATH_ROOT . '/client/blog/model/lists.php';

?>


<div class="filter_course">

    <form action="" method="get" class="mx-0 row py-3">

        <input type="hidden" name="module" value="<?php echo $module; ?>">

        <div class="form-group my-0 col-7">
            <input type="text" name="keywork" value="<?php echo !empty($keywork) ? $keywork : ''; ?>" class="form-control">
        </div>

        <div class="form-group my-0 col-3">
            <select name="blog_type" class="form-control">
                <option value="">Chọn</option>
                <?php
                if (!empty($allBlogType)) :
                    foreach ($allBlogType as $key => $value) :
                ?>
                        <option <?php echo !empty($blog_type) && $blog_type == $value['id'] ? 'selected' : ''; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name'] . ' - ' . $value['id']; ?></option>
                <?php endforeach;
                endif; ?>
            </select>
        </div>

        <div class="form-group my-0 col-2">
            <input type="submit" value="Tìm" class="form-control btn btn-primary">
        </div>

    </form>

</div>

<br>


<div class="course_home">
    <?php
    if (!empty($allBlog)) {
        foreach ($allBlog as $value) {
            extract($value);
    ?>
            <div class="item_course border">

                <a href="?module=blog&action=detail_blog&id=<?= $id ?>">
                    <img class="w-100 mx-auto d-block mb-2" src="<?php echo _WEB_HOST_TEMPLATE . '/client/assets/image/' . $image; ?>" alt="">
                </a>
                <h6><a href="?module=blog&action=detail_blog&id=<?= $id ?>" class="text-decoration-none"><?= $title ?></a></h6>
                <p>Loại: <?php echo $value['t_name']; ?></p>

                <div class="mt-3" style="text-align: end;">
                    <p>Ngày đăng: <?= getTimeFormat($create_at, 'Y-m-d') ?></p>
                </div>

            </div>
    <?php
        }
    }
    ?>
</div>
        
<?php if(empty($allBlog)) echo '<h3 class="text-center text-danger">Không có dữ liệu</h3>'; ?>
