<?php

$myData = _MY_DATA;

$user_id = $myData['id'];

$allOrder = getRaw("SELECT arr_pro FROM order_pro WHERE user_id='$user_id'");

$arrIdPro = [];

$arrIdProDifferent = [];

$count = 0;

foreach ($allOrder as $key => $value) {
    $arrPro = json_decode($value['arr_pro'], true);
    foreach ($arrPro as $key => $pro) {
        $arrIdPro[] = $pro['id'];
    }
}

foreach ($arrIdPro as $key => $value) {
    if(!in_array($value, $arrIdProDifferent)){
        $arrIdProDifferent[] = $value;
    }
}

$msg = getFlashData('msg');
$type = getFlashData('type');
$errors = getFlashData('errors');
$old = getFlashData('old');
if(empty($old)){
    $old = $myData;
}

?>

<div class="profile_information bg-white border bra-10 p-3">

<?php getAlert($msg, $type); ?>

<h3>Các sách đã mua</h3>
<hr>

<table class="w-100">
    <thead>
        <tr>
            <th width="10%" class="board_th">STT</th>
            <th class="board_th">Thông tin</th>
            <th width="15%" class="board_th">Loại sách</th>
            <th width="15%" class="board_th">Giá</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(!empty($arrIdProDifferent)):
                foreach ($arrIdProDifferent as $key => $value):
                    $count++;
                    $id_book = $value;
                    $detailBook = getRow("SELECT b.*, t.name AS 't_name' FROM book AS b INNER JOIN book_type AS t ON b.book_type_id=t.id WHERE b.id='$id_book'");
        ?>
        <tr>
            <td class="board_td text-center"><?php echo $count; ?></td>
            <td class="board_td row mx-0">
                <img width="" class="col-3" src="<?php echo _WEB_HOST_IMAGE_CLIENT.'/'.$detailBook['image']; ?>" alt="">
                <div class="col-8 py-3">
                    <h4><?php echo $detailBook['title']; ?></h4>                   
                </div>
            </td>
            <td class="board_td text-center">
                 <p><?php echo $detailBook['t_name']; ?></p>
            </td>
            <td class="board_td text-center"><?php echo $detailBook['price']; ?> VND</td>
        </tr>
        <?php endforeach; else: ?>
            <td class="board_td text-center text-danger" colspan="5">Bạn chưa mua quyển sách nào</td>
        <?php endif; ?>
    </tbody>
</table>


</div>