<?php

require _WEB_PATH_ROOT . '/admin/statistics/model/book.php';

$body = getRequest('get');

if(!empty($body['id'])){
    $id = $body['id'];
    $allBookBuy = getRaw("SELECT id FROM book WHERE book_type_id='$id'");
    $condition = "";
    foreach ($allBookBuy as $key => $value) {
        $book_id = $value['id'];
        if(!empty($condition)){
            $condition .= " OR c.book_id='$book_id' ";
        }else{
            $condition .= " WHERE c.book_id='$book_id' ";
        }
    }
    $allCartOrder = getRaw("SELECT c.*, b.title AS 'b_name', sum(c.quantity) AS 'sum_quantity' FROM cart_order AS c INNER JOIN book AS b ON c.book_id=b.id $condition GROUP BY c.book_id");
    $allCartOrderPrice = getRaw("SELECT c.* FROM cart_order AS c INNER JOIN book AS b ON c.book_id=b.id $condition");

}else{
    setFlashData('msg', 'url này lỗi');
    setFlashData('type', 'danger');
    redirect('?module=statistics&action=book');
}

$count = 0;
?>
<div class="container_my">

    <a href="?module=statistics&action=book">Quay lại</a>

    <table class="w-100">
        <thead>
            <tr>
                <th width="8%" class="board_th">STT</th>
                <th class="board_th" width="10%">Tên sách</th>
                <th class="board_th">Giá bán</th>
                <th class="board_th">Số lượng</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $body = getRequest('get');
            $id_bt = $_GET['id'];
            if (!empty($book_detail)) {
                foreach ($book_detail as $b) {
                    extract($b);
                    if ($id_bt == $id) {
                        $count++;
            ?>
                        <tr>
                            <td class="board_td text-center"><?php echo $count; ?></td>
                            <td class="board_td text-center"><?php echo $title ?></td>
                            <td class="board_td text-center"><?php echo $price; ?></td>
                            <td class="board_td text-center"><?php echo $quantity; ?></td>
                        </tr>
            <?php
                    }
                }
            } else {
                echo '<td colspan="7" class="text-center board_td text-danger">Không có dữ liệu</td>';
            }
            ?>
        </tbody>

    </table>

    <hr>

    <table class="w-100">
        <thead>
            <tr>
                <th width="5%" class="board_th text-center">STT</th>
                <th width="15%" class="board_th text-center">Tên sách</th>
                <th width="40%" class="board_th text-center">Đã bán</th>
                <th width="40%" class="board_th text-center">Doanh thu</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($allCartOrder)):
                $count = 0;
                foreach ($allCartOrder as $key => $value):
                    $price_buy = 0;
                    $count++;
                    foreach ($allCartOrderPrice as $k => $v) {
                        if($value['book_id'] == $v['book_id']){
                            $price_buy += $v['quantity']*$v['price'];
                        }
                    }

                 ?>

            <tr>
                <td class="board_td text-center"><?php echo $count; ?></td>
                <td class="board_td text-center"><?php echo $value['b_name']; ?></td>
                <td class="board_td text-center"><?php echo $value['sum_quantity']; ?></td>
                <td class="board_td text-center"><?php echo $price_buy; ?></td>
            </tr>
            <?php endforeach; else: ?>
                <tr><td class="board_td text-center text-danger " colspan="6">Không có dữ liệu</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>