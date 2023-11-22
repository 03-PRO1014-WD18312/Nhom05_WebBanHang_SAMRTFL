<?php
require _WEB_PATH_ROOT . '/client/home/model/course.php';

?>


<hr>
<br>

<h3>
    CÁC KHÓA HỌC TẠI SMARTFL
</h3>

<br>

<div class="course_home">

    <?php
    if (!empty($allCourse)) {

        foreach ($allCourse as $value) {
            extract($value);
    ?>
            <div class="item_course">

                <img class="w-100 mb-2" src="<?php echo _WEB_HOST_TEMPLATE . '/client/assets/image/' . $image; ?>" alt="">

                <h6 class=""><?= $value['title'] ?></h6>

                <div class="sub_item_course">
                    <small>Giá niêm yết</small>
                    <small style="text-align: end;"><?= $value['price'] ?></small>
                    <h6>Giá gốc</h6>
                    <h6 style="text-align: end;"><?= $value['discount'] ?></h6>
                </div>

            </div>
    <?php
        }
    }
    ?>




</div>

<!-- --------------------------------- -->