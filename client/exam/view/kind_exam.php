<?php


$allExam = getRaw("SELECT e.*, t.name AS 't_name' FROM exam AS e INNER JOIN exam_type AS t ON e.exam_type_id=t.id WHERE e.id<>'$exam_id' AND e.status<>'0' AND exam_type_id='$exam_type'");

if(!empty($allExam)):

?>

<hr>
<br>

<h3>Các đề thi cùng loại</h3>
<br>

<div class="owl-carousel owl-theme">

    <?php foreach ($allExam as $key => $value): ?>
    <div class="item">
    <div class="item_exam">

    <a href="?module=exam&action=detail_exam&id=<?php echo $value['id']; ?>"><img class="w-100 mb-2" src="<?php echo _WEB_HOST_IMAGE_CLIENT.'/'.$value['image']; ?>" alt=""></a>

    <h6><a href="?module=exam&action=detail_exam&id=<?php echo $value['id']; ?>" class="text-decoration-none"><?php echo $value['title']; ?></a></h6>
    <p>Loại: <?php echo $value['t_name']; ?></p>

    <div class="sub_item_exam">
        <small></small>
        <p class="mb-0"></p>
        <span class="mb-0" style="text-align: end;"><?php echo $value['price']; ?> VND</span>
    </div>

    </div>
    </div>
    <?php endforeach; ?>

</div>
<?php endif; ?>