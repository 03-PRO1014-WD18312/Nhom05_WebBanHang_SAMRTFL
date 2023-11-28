<?php
require _WEB_PATH_ROOT . '/client/home/model/course.php';

?>


<hr>
<br>
<h3>
    Sản phẩm sách tại SMARTFL
</h3>

<br>

<div class="course_home">
    <?php
    foreach ($allBook as $key => $value) :
    ?>
        <div class="item_course border">

            <a href="<?php echo "?module=book&action=detail_book&id=" . $value['id']; ?>"><img class="w-75 mx-auto d-block mb-2" src="<?php echo _WEB_HOST_IMAGE_CLIENT . '/' . $value['image']; ?>" alt=""></a>

            <h6><a href="<?php echo "?module=book&action=detail_book&id=" . $value['id']; ?>" class="text-decoration-none"><?php echo $value['title']; ?></a></h6>
            <p>Loại: <?php echo $value['t_name']; ?></p>

            <div class=" mt-3">
                <h6 style="text-align: end;" class="text-warning"><?php echo $value['price']; ?> VND</h6>
            </div>

        </div>

    <?php endforeach;
    ?>

</div>
<hr>
<br>

<h3>
    CÁC KHÓA HỌC TẠI SMARTFL
</h3>

<br>

<div class="course_home">
    <?php
    foreach ($allCourse as $key => $value) :
    ?>
        <div class="item_course border">

            <a href="?module=course&action=detail_course&course_id=<?php echo $value['id']; ?>"><img class="w-100 mb-2" src="<?php echo _WEB_HOST_IMAGE_CLIENT . '/' . $value['image']; ?>" alt=""></a>

            <h6><a href="?module=course&action=detail_course&course_id=<?php echo $value['id']; ?>" class="text-decoration-none"><?php echo $value['title']; ?></a></h6>

            <div class="sub_item_course">
                <small></small>
                <small style="text-align: end;"><?php echo $value['price']; ?> VND</small>
                <p>Loại: <?php echo $value['t_name']; ?></p>
                <h6 style="text-align: end;"><?php echo $value['discount']; ?> VND</h6>
            </div>

        </div>
    <?php endforeach; ?>
</div>

<hr>
<br>




<h3>
    Bài kiểm tra
</h3>

<br>

<div class="course_home">

    <?php
    foreach ($allExam as $key => $value) :
    ?>

        <div class="item_course border">

            <a href="?module=exam&action=detail_exam&id=<?php echo $value['id']; ?>"><img class="w-100 mx-auto d-block mb-2" src="<?php echo _WEB_HOST_IMAGE_CLIENT . '/' . $value['image']; ?>" alt=""></a>

            <h6><a href="?module=exam&action=detail_exam&id=<?php echo $value['id']; ?>" class="text-decoration-none"><?php echo $value['title']; ?></a></h6>
            <p>Loại: <?php echo $value['t_name']; ?></p>

            <div class="sub_item_course mt-3">
                <p></p>
                <h6 style="text-align: right;" class="text-warning"><?php echo $value['price']; ?> VND</h6>
            </div>

        </div>

    <?php
    endforeach;
    ?>

</div>