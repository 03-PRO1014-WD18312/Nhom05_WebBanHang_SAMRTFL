
<?php
$body = getRequest('get');

$count = 0;
$filter = '';
$urlFilter = '';

if(!empty($body['keywork'])){
    $keywork = $body['keywork'];
    $filter .= " WHERE `title` LIKE '%$keywork%' ";
}

if(!empty($body['book_type'])){
    $book_type = $body['book_type'];

    if(!empty($filter)){
        $filter .= " AND `book_type_id` = '$book_type' ";
    }else{
        $filter .= " WHERE `book_type_id` = '$book_type' ";        
    }
}

require _WEB_PATH_ROOT.'/client/book/model/lists.php';

?>


<div class="filter_course">

<form action="" method="get" class="mx-0 row py-3">

<input type="hidden" name="module" value="<?php echo $module; ?>">

<div class="form-group my-0 col-7">
    <input type="text" name="keywork" value="<?php echo !empty($keywork)?$keywork:''; ?>" class="form-control">
</div>

<div class="form-group my-0 col-3">
    <select name="book_type" class="form-control">
        <option value="">Chọn</option>
        <?php
            if(!empty($allBookType)):
                foreach ($allBookType as $key => $value):
        ?>
        <option <?php echo !empty($book_type) && $book_type == $value['id']?'selected':''; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name'].' - '.$value['id']; ?></option>
        <?php endforeach; endif; ?>
    </select>
</div>

<div class="form-group my-0 col-2">
    <input type="submit" value="Tìm" class="form-control btn btn-primary">
</div>

</form>

</div>

<br>
<?php 
if (!empty($allBook)):
?>

<div class="course_home">
<?php
    foreach ($allBook as $key => $value):
    ?>
<div class="item_course border">

<a href="<?php echo "?module=book&action=detail_book&id=".$value['id'];?>"><img class="w-75 mx-auto d-block mb-2" src="<?php echo _WEB_HOST_IMAGE_CLIENT.'/'.$value['image']; ?>" alt=""></a>

<h6><?php echo $value['title'];?></h6>

<div class="sub_item_course mt-3">
    <h6 style="text-align"><?php echo $value['price'];?>VND</h6>
</div>

</div>

<?php endforeach;
?>

</div>
<?php
    else:
?>
    <h2 class="text-center text-danger">Không có dữ liệu</h2>
<?php
endif;
?>