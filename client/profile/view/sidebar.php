
<?php




?>

<div class="sidebar_profile">

<div class="sidebar_img bg-primary p-2">
<img class="w-25 rounded-circle" src="<?php echo _WEB_HOST_IMAGE_CLIENT.'/'._MY_DATA['image']; ?>" alt="">
<h5 class="d-inline-block my-auto text-light"><?php echo isLogin()?_MY_DATA['fullname']:''; ?></h5>
</div>

<ul class="sidebar_nav bg-white">
    <a href="?module=profile" class="p-2 d-block border text-decoration-none">Thông tin người dùng</a>
    <a href="?module=profile&action=book" class="p-2 d-block border text-decoration-none">Các sách đã mua</a>
    <a href="?module=profile&action=course" class="p-2 d-block border text-decoration-none">Các khóa học đã mua</a>
    <a href="?module=profile&action=exam" class="p-2 d-block border text-decoration-none">Điểm các bài kiểm tra</a>
    <a href="?module=profile&action=change_password" class="p-2 d-block border text-decoration-none">Đổi mật khẩu</a>
    <a href="?module=auth&action=logout" class="p-2 d-block border text-decoration-none">Đăng xuất</a>
</ul>

</div>