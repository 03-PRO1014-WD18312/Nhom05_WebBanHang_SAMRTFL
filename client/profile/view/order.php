<?php

$myData = _MY_DATA;
$id = $myData['id'];

$allOrder = getRaw("SELECT * FROM order_pro WHERE user_id='$id'");

$count = 0;

$msg = getFlashData('msg');
$type = getFlashData('type');

?>

<div class="profile_information bg-white border bra-10 p-3">

<?php getAlert($msg, $type); ?>

<h3>Các đơn hàng</h3>
<hr>
<p class="text-center mb-3">Sơ đồ trạng thái đơn hàng</p>

<div class="alert alert-primary d-flex justify-content-around" role="alert">
    <span class="btn btn-danger">Chưa duyệt</span>
    <span class="d-flex align-items-center font-weight-bolder">====></span>
    <span class="btn btn-warning">Duyệt</span>
    <span class="d-flex align-items-center font-weight-bolder">====></span>
    <span class="btn btn-info">Đang giao</span>
    <span class="d-flex align-items-center font-weight-bolder">====></span>
    <span class="btn btn-success">Đã giao</span>
</div>

<table class="w-100">
    <thead>
        <tr>
            <th width="5%" class="board_th">STT</th>
            <th width="" class="board_th">Thông tin</th>
            <th width="15%" class="board_th">Phương thức thanh toán</th>
            <th width="15%" class="board_th">Thanh toán</th>
            <th width="15%" class="board_th">Trạng thái</th>
            <th width="5%" class="board_th">Chi tiết</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if(!empty($allOrder)):
                foreach ($allOrder as $key => $value):
                    $count++;
        ?>
        <tr>
            <td class="board_td text-center"><?php echo $count; ?></td>
            <td class="board_td">
                <h6><?php echo $value['code_order']; ?></h6>
                <p>Người nhận: <?php echo $value['fullname']; ?></p>
                <p>Số email: <?php echo $value['email']; ?></p>
                <p>Số điện thoại: <?php echo $value['phone']; ?></p>
                <p>Địa chỉ: <?php echo $value['address']; ?></p>
                <p>Tổng giá: <?php echo $value['total']; ?> VND</p>
                <p>Ngày mua: <?php echo getTimeFormat($value['create_at'], 'Y-m-d'); ?></p>
            </td>
            <td class="board_td text-center">
            <?php if($value['pay_type'] == 'cash'): ?>
                    <a href="" class="">Tiền mặt</a>
                <?php elseif($value['pay_type'] == 'cash_online'): ?>
                    <a href="" class="">Chuyển khoản</a>
                <?php elseif($value['pay_type'] == 'momo'): ?>
                    <a href="" class="">MOMO</a>
                <?php elseif($value['pay_type'] == 'vnpay'): ?>
                    <a href="" class="">VN PAY</a>
                <?php elseif($value['pay_type'] == 'paypal'): ?>
                    <a href="" class="">PayPal</a>
                <?php endif; ?>
            </td>
            <td class="board_td">
                <?php if(!empty($value['status_pay'])): ?>
                    <span class="btn btn-success">Đã thanh toán</span>
                <?php else: ?>
                    <span class="btn btn-danger">Chưa thanh toán</span>
                <?php endif; ?>
            </td>
            <td class="board_td text-center">
                <?php if($value['status'] == 1): ?>
                    <a href="" class="btn btn-danger">Chưa duyệt</a>
                <?php elseif($value['status'] == 2): ?>
                    <a href="" class="btn btn-warning">Duyệt</a>
                <?php elseif($value['status'] == 3): ?>
                    <a href="" class="btn btn-info">Đang giao</a>
                <?php elseif($value['status'] == 4): ?>
                    <a href="" class="btn btn-success">Đã giao</a>
                <?php endif; ?>
            </td>
            <td class="board_td text-center"><a href="?module=profile&action=detail_order&id=<?php echo $value['id']; ?>" class="btn btn-success"><i class="fa fa-shopping-cart"></i></a></td>
        </tr>
        <?php endforeach; else: ?>
            <tr><td class="board_td text-center text-danger" colspan="8">Không có đơn hàng nào</td></tr>
        <?php endif; ?>
    </tbody>
</table>


</div>