<?php

$body = getRequest('get');

if(!empty($body['id'])){
    $order_id = $body['id'];
    $myData = _MY_DATA;
    $id = $myData['id'];
    $detailCart = getRow("SELECT * FROM order_pro WHERE id='$order_id' AND user_id='$id'");
    if(!empty($detailCart)){
        $arrPro = json_decode($detailCart['arr_pro'], true);
    }else{
        setFlashData('msg', 'url này không tồn tại');
        setFlashData('type', 'danger');
        redirect("?module=profile&action=order");
    }
}else{
    setFlashData('msg', 'url này lỗi');
    setFlashData('type', 'danger');
    redirect("?module=profile&action=order");
}

$count = 0;
$totalPrice = 0;

$msg = getFlashData('msg');
$type = getFlashData('type');

?>

<div class="profile_information bg-white border bra-10 p-3">

<?php getAlert($msg, $type); ?>

<h3>Đơn hàng - <?php echo $detailCart['code_order']; ?></h3>
<hr>

<table class="w-100">
    <thead>
        <tr>
            <th width="5%" class="board_th">STT</th>
            <th width="" class="board_th">Thông tin</th>
            <th width="15%" class="board_th">Số lượng</th>
            <th width="15%" class="board_th">Tổng giá</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($arrPro as $key => $value): 
                $count++;
                $book_id = $value['id'];
                $detailBook = getRow("SELECT * FROM book WHERE id='$book_id'");
                if(!empty($detailBook)):
                $sumPrice = $value['price']*$value['quantity']; 
                $totalPrice += $sumPrice;
        ?>
            <tr>
                <td class="board_td text-center"><?php echo $count; ?></td>
                <td class="board_td d-flex flex-row bd-highlight">
                    <img width="20%" src="<?php echo _WEB_HOST_IMAGE_CLIENT.'/'.$detailBook['image']; ?>" alt="">
                    <div class="py-4">
                        <h6>Tên: <?php echo $detailBook['title']; ?></h6>
                        <p>Giá mua: <?php echo $value['price']; ?> VND</p>
                    </div>
                </td>
                <td class="board_td text-center"><?php echo $value['quantity']; ?></td>
                <td class="board_td text-center"><?php echo $sumPrice; ?> VND</td>
            </tr>
        <?php endif; endforeach; ?>
    </tbody>
</table>
<br>
<h3 class="text-primary" style="text-align: end;">Giá trị: <?php echo $totalPrice; ?> VND</h3>
<a href="?module=profile&action=order" class="btn btn-success">Danh sách đơn hàng</a>

</div>