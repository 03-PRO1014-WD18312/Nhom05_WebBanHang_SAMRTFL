
<?php

$allBook = getRaw("SELECT b.*, t.name AS 't_name' FROM book AS b INNER JOIN book_type AS t ON b.book_type_id=t.id WHERE b.id<>'$book_id' AND b.status<>'0' AND book_type_id='$book_type'");

if(!empty($allBook)):
?>

<hr>
<h2 class="text-warning">Các sản phẩm cùng loại</h2>
<br>
<div class="course_home">
<?php 
    foreach ($allBook as $key => $value):
?>
<div class="item_course border">

<a href="?module=book&action=detail_book&id=<?php echo $value['id']; ?>"><img width="60%" class=" mx-auto d-block mb-2" src="<?php echo _WEB_HOST_IMAGE_CLIENT.'/'.$value['image']; ?>" alt=""></a>
<hr>

<h6><?php echo $value['title']; ?></h6>
<p>Loại: <?php echo $value['t_name']; ?></p>

<div class=" mt-3">
    <p style="text-align: end;">Giá: <?php echo $value['price']; ?> VND</p>
</div>

</div>

<?php endforeach;?>
</div>
<?php endif; ?>
