
<?php

$user_id = _MY_DATA['id'];

$body = getRequest('get');

if(!empty($body['course_id'])){
    $course_id = $body['course_id'];
}

?>

<div class="detail_course">

<div class="detail_course_content_left">

    <iframe width="100%" height="450px" src="https://www.youtube.com/embed/BWk_UdqQb9g?si=1eL2P7jb0A8GzEGP"></iframe>
        <!-- <iframe src="https://player.vimeo.com/video/886838377?h=de5afa6792" width="640" height="564" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe> -->

    <div class="p-3 my-3 bg-white border bra-10">
        Bạn sẽ học được gì
    </div>

    <div class="p-3 my-3 bg-white border bra-10">
        Giới thiệu khóa học
    </div>

    <div class="p-3 my-3 bg-white border bra-10">
        Nội dung khóa học
        <hr>
        <div class="ex_course">
            <p class="p-3 bg-primary ex_chapter btn m-0 d-block text-light bra-0">Bài 1</p>
            <ul class="m-0 ex_exercise">
                <li class="p-3 " style="border: 3px solid #ffc107;">111</li>
                <li class="p-3 " style="border: 3px solid #ffc107;">111</li>
            </ul>
        </div>

        <div class="ex_course">
            <p class="p-3 bg-primary btn ex_chapter m-0 d-block text-light bra-0">Bài 2</p>
            <ul class="m-0 ex_exercise">
                <li class="p-3 " style="border: 3px solid #ffc107;">222</li>
                <li class="p-3 " style="border: 3px solid #ffc107;">222</li>
            </ul>
        </div>

    </div>

</div>

<div class="detail_course_content_right">

    <div class="bg-white border p-3 bra-10">
        <h3>VẬT LÍ 10 (2024)</h3>
        <p>Giá khuyễn mãi: <i class="font-weight-bold text-danger">600.000 VND</i></p>
        <p>Giá gốc: <i>800.000 VND</i></p>
        <a href="" class="btn btn-primary d-block">Mua toàn bộ khóa học</a>
        <br>
        <p>Chương: 7 chương</p>
        <p>Giáo trình: 347+ video bài giảng video bài giảng</p>
        <p>Thời lượng: 85+ giờ học giờ học</p>
    </div>

        <br>

    <div class="bg-white border p-3 bra-10">
        <p>MÃ KÍCH HOẠT KHÓA HỌC</p>
        <form action="<?php echo _WEB_HOST_ROOT."/?module=course&action=active_course"; ?>" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
            <input type="text" class="form-control" name="token_active">
            <br>
            <button type="submit" class="btn btn-danger d-block">Kích hoại</button>
        </form>
    </div>

    <br>

    <div class="bg-white border p-3 bra-10">
        <h3>Các khóa học cùng loại</h3>
        <hr>
        <div class="course_kind">
            <img class="w-100" src="<?php echo _WEB_HOST_TEMPLATE.'/client/assets/image/course_kind.jpg'; ?>" alt="">
            <div class="ml-2">
                <p class="mb-0">Vật lý 11 (2020)</p>
                <br>
                <p class="mb-0">0đ</p>
            </div>
        </div>
        <div class="course_kind">
            <img class="w-100" src="<?php echo _WEB_HOST_TEMPLATE.'/client/assets/image/course_kind.jpg'; ?>" alt="">
            <div class="ml-2">
                <p class="mb-0">Vật lý 11 (2020)</p>
                <br>
                <p class="mb-0">0đ</p>
            </div>
        </div>
    </div>

</div>



</div>