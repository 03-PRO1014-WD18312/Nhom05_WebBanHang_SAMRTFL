
<?php
$body = getRequest('get');

$count = 0;
$filter = '';
$urlFilter = '';

// if(!empty($body['keywork'])){
//     $keywork = $body['keywork'];
//     $filter .= " WHERE `title` LIKE '%$keywork%' ";
//     $urlFilter .= "&keywork=$keywork";
// }

// if(!empty($body['course_type'])){
//     $course_type = $body['course_type'];

//     if(!empty($filter)){
//         $filter .= " AND `course_type_id` = '$course_type' ";
//     }else{
//         $filter .= " WHERE `course_type_id` = '$course_type' ";        
//     }
//     $urlFilter .= "&course_type=$course_type";
// }

// if(!empty($body['author_id'])){
//     $author_id = $body['author_id'];

//     if(!empty($filter)){
//         $filter .= " AND `author_id` = '$author_id' ";
//     }else{
//         $filter .= " WHERE `author_id` = '$author_id' ";        
//     }
//     $urlFilter .= "&author_id=$author_id";
// }

require _WEB_PATH_ROOT.'/client/blog/model/lists.php';

?>


<div class="filter_course">

<form action="" method="get" class="mx-0 row py-3">

<input type="hidden" name="module" value="<?php echo $module; ?>">

<div class="form-group my-0 col-7">
    <input type="text" name="keywork" value="<?php echo !empty($keywork)?$keywork:''; ?>" class="form-control">
</div>

<div class="form-group my-0 col-3">
    <select name="course_type" class="form-control">
        <option value="">Chọn</option>
        <?php
            if(!empty($allBlogType)):
                foreach ($allBlogType as $key => $value):
        ?>
        <option <?php echo !empty($course_type) && $course_type == $value['id']?'selected':''; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name'].' - '.$value['id']; ?></option>
        <?php endforeach; endif; ?>
    </select>
</div>

<div class="form-group my-0 col-2">
    <input type="submit" value="Tìm" class="form-control btn btn-primary">
</div>

</form>

</div>

<br>


<div class="course_home">

<div class="item_course border">

<img class="w-100 mx-auto d-block mb-2" src="<?php echo _WEB_HOST_TEMPLATE.'/client/assets/image/book-1_1613616912.gif'; ?>" alt="">

<h6>6 lý do tại sao k2006-2007 khởi động sớm luôn và ngay???</h6>

<div class="sub_item_course mt-3">
    <p>Ngày đăng</p>
</div>

</div>

<div class="item_course border">

<img class="w-100 mx-auto d-block mb-2" src="<?php echo _WEB_HOST_TEMPLATE.'/client/assets/image/book-1_1613616912.gif'; ?>" alt="">

<h6>6 lý do tại sao k2006-2007 khởi động sớm luôn và ngay???</h6>

<div class="sub_item_course mt-3">
    <p>Ngày đăng</p>
</div>

</div>

<div class="item_course border">

<img class="w-100 mx-auto d-block mb-2" src="<?php echo _WEB_HOST_TEMPLATE.'/client/assets/image/book-1_1613616912.gif'; ?>" alt="">

<h6>6 lý do tại sao k2006-2007 khởi động sớm luôn và ngay???</h6>

<div class="sub_item_course mt-3">
    <p>Ngày đăng</p>
</div>

</div>


<div class="item_course border">

<img class="w-100 mx-auto d-block mb-2" src="<?php echo _WEB_HOST_TEMPLATE.'/client/assets/image/book-1_1613616912.gif'; ?>" alt="">

<h6>6 lý do tại sao k2006-2007 khởi động sớm luôn và ngay???</h6>

<div class="sub_item_course mt-3">
    <p>Ngày đăng</p>
</div>

</div>


</div>