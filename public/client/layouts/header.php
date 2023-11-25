<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE.'/client/assets/css/owl.carousel.min.css?ver='.rand(); ?>">
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE.'/client/assets/css/owl.theme.default.min.css?ver='.rand(); ?>">

    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE.'/client/assets/css/bootstrap.min.css?ver='.rand(); ?>">

    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATE.'/client/assets/css/main.css?ver='.rand(); ?>">

    <title><?php echo !empty($data['titlePage'])?$data['titlePage']:''; ?></title>

</head>

<?php

if(isLogin()){
    $user_id = isLogin()['user_id'];
    $dataUser = getRow("SELECT * FROM user WHERE id='$user_id'");
    define('_MY_DATA', $dataUser);
}

$body = getRequest('get');

if(!empty($body['module'])){
    $module = $body['module'];
}

if(!empty($body['action'])){
    $action = $body['action'];
}

?>

<body class="<?php echo (!empty($module) && !empty($action) && getActive(['cart']) && getAction(['email_course', 'pay_book', 'make_exam']))?'d-none':''; ?>">
<!-- <body class="d-none"> -->

<div class="<?php echo (!empty($module) && getActive('make_exam') && !getAction(['finish']))?'d-none':''; ?>">

    <header class="box_header padding_X">

        <h1 class="logo_header text-primary">SMART<span class="text-warning">FL</span> </h1>

        <form action="" method="get" class="search_header d-flex justify-content-around">
            <input type="text" class="form-control flex_center">
        </form>

        <div class="btn_header d-flex justify-content-around">
            <a href="" class="btn btn-secondary flex_center">
                Kích hoạt khóa học
            </a>
            <a href="" class="btn btn-primary flex_center">
                Làm bài thi
            </a>
            <a href="?module=profile&action=course" class="btn btn-warning flex_center">
                Vào học
            </a>
        </div>

        <div class="my_header d-flex justify-content-around">
            <a href="?module=cart" class="btn btn-outline-primary flex_center">
                <i class="fa fa-cart-plus"></i>
            </a>
            <?php if(!isLogin()): ?>
            <a href="?module=auth&action=login"  class="btn btn-outline-warning flex_center">
                <i class="fa fa-user-circle"></i>
            </a>
            <?php else: ?>
            <a href="?module=profile"  class="btn btn-outline-warning flex_center">
                <i class="fa fa-user-circle"></i>
            </a>
            <?php endif; ?>
        </div>

    </header>

    <div class="padding_X my-3 contact_header">
        <div>
            <a href="" class="text-decoration-none">Phone: <span class="text-warning ">0123456789</span></a>
            <a href="" class="ml-2 text-decoration-none">Email: <span class="text-warning">email@gmail.com</span></a>
        </div>
        <div class="" style="text-align: right;">
            <a href="" class="mx-2 text-danger"><i class="fab fa-youtube"></i></a>
            <a href="" class="mx-2"><i class="fab fa-facebook"></i></a>
            <a href="" class="mx-2"><i class="fab fa-twitter"></i></a>
        </div>
    </div>  

    <nav class="padding_X d-flex justify-content-around py-3 border-top">
        <a href="<?php echo _WEB_HOST_ROOT; ?>" class="font-weight-bold text-decoration-none">Trang chủ</a>
        <a href="<?php echo _WEB_HOST_ROOT; ?>" class="font-weight-bold text-decoration-none">Giới thiệu</a>
        <a href="<?php echo _WEB_HOST_ROOT; ?>" class="font-weight-bold text-decoration-none">Liên hệ</a>
        <a href="<?php echo _WEB_HOST_ROOT.'?module=course'; ?>" class="font-weight-bold text-decoration-none">Khóa học</a>
        <a href="<?php echo _WEB_HOST_ROOT.'?module=book'; ?>" class="font-weight-bold text-decoration-none">Sách</a>
        <a href="<?php echo _WEB_HOST_ROOT.'?module=exam'; ?>" class="font-weight-bold text-decoration-none">Thi Online</a>
        <a href="<?php echo _WEB_HOST_ROOT.'?module=blog'; ?>" class="font-weight-bold text-decoration-none">Bài viết</a>
        <a href="<?php echo _WEB_HOST_ROOT; ?>" class="font-weight-bold text-decoration-none">Vinh danh</a>
    </nav>


</div>





    
