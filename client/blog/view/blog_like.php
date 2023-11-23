
<?php

$allBlog = getRaw("SELECT b.*, t.name AS 't_name' FROM blog AS b INNER JOIN blog_type AS t ON b.blog_type_id=t.id WHERE b.id<>'$blog_id' AND `status`<>'0' AND blog_type_id='$blog_type'");

if(!empty($allBlog)):
?>

<hr>
<h2 class="text-warning">Các sản phẩm cùng loại</h2>
<br>
<div class="course_home">
<?php 
    foreach ($allBlog as $key => $value):
?>
<div class="item_course border">

<a href="?module=blog&action=detail_blog&id=<?php echo $value['id']; ?>"><img width="100%" class=" mx-auto d-block mb-2" src="<?php echo _WEB_HOST_IMAGE_CLIENT.'/'.$value['image']; ?>" alt=""></a>
<hr>

<h6><a href="?module=blog&action=detail_blog&id=<?php echo $value['id']; ?>" class="text-decoration-none"><?php echo $value['title']; ?></a></h6>
<p>Loại: <?php echo $value['t_name']; ?></p>

<div class=" mt-3">
    <p style="text-align: end;">Ngày đăng: <?php echo getTimeFormat($value['create_at'], 'Y-m-d'); ?></p>
</div>

</div>

<?php endforeach;?>
</div>
<?php endif; ?>
