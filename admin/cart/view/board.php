<?php

$group_id = _MY_DATA['id_group'];

if(!checkPermission($group_id, 'order', 'lists')){
    redirect(_WEB_HOST_ERORR.'/permission.php');
}

$body = getRequest('get');

$count = 0;
$filter = '';
$urlFilter = '';

if(!empty($body['keywork'])){
    $keywork = $body['keywork'];
    $filter .= " WHERE `code_order` LIKE '%$keywork%' ";
    $urlFilter .= "&keywork=$keywork";
}

if(!empty($body['user_id'])){
    $user_id = $body['user_id'];

    if(!empty($filter)){
        $filter .= " AND `user_id` = '$user_id' ";
    }else{
        $filter .= " WHERE `user_id` = '$user_id' ";        
    }
    $urlFilter .= "&user_id=$user_id";
}

if(!empty($body['page'])){
    $page = $body['page'];
}else{
    $page = 1;
}

require _WEB_PATH_ROOT.'/admin/cart/model/board.php';

$count = 0;


$msg = getFlashData('msg');
$type = getFlashData('type');

?>

<div class="container_my">


<p class="text-center mb-3">Sơ đồ trạng thái đơn hàng</p>

<div class="alert alert-light d-flex justify-content-around" style="border: 2px solid #007bff;" role="alert">
    <span class="btn btn-warning">Đơn mới</span>
    <span class="d-flex align-items-center font-weight-bolder">====></span>
    <span class="btn btn-info">Đang xử lí</span>
    <span class="d-flex align-items-center font-weight-bolder">====></span>
    <span class="btn btn-primary">Đang giao</span>
    <span class="d-flex align-items-center font-weight-bolder">====></span>
    <span class="btn btn-success">Đã giao</span>
</div>

<hr>

<?php getAlert($msg, $type); ?>

<form action="" method="get" class="mx-0 row">

<input type="hidden" name="module" value="cart">

<div class="form-group col-7">
    <input type="text" name="keywork" value="<?php echo !empty($keywork)?$keywork:''; ?>" class="form-control">
</div>

<div class="form-group col-3">
    <select name="user_id" class="form-control">
        <option value="">Chọn</option>
        <?php
            if(!empty($allAuthor)):
                foreach ($allAuthor as $key => $value):
        ?>
        <option <?php echo !empty($user_id) && $user_id == $value['id']?'selected':''; ?> value="<?php echo $value['id']; ?>"><?php echo $value['fullname'].' - '.$value['email']; ?></option>
        <?php endforeach; endif; ?>
    </select>
</div>

<div class="form-group col-2">
    <input type="submit" value="Tìm" class="form-control btn btn-primary">
</div>

</form>

    <table class="w-100">
        <thead>
            <tr>
                <th width="5%" class="board_th">STT</th>
                <th width="15%" class="board_th">Mã đơn hàng</th>
                <th class="board_th">Thông tin khách</th>
                <th class="board_th">Tổng giá</th>
                <th width="10%" class="board_th">Thanh toán</th>
                <th width="10%" class="board_th">Trạng thái</th>
                <?php if(checkPermission($group_id, 'order', 'detail')): ?>
                <th width="5%" class="board_th">Chi tiết</th>
                <?php endif; ?>
                <?php if(checkPermission($group_id, 'order', 'delete')): ?>
                <th width="5%" class="board_th">Xóa</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(!empty($allOrder)):
                    foreach ($allOrder as $key => $value):
                        $count++;
                        $textStatus = '';
                        $colorStatus = '';
                        if($value['status'] == 0){
                            $textStatus = 'Đã hủy';
                            $colorStatus = 'danger';
                        }elseif($value['status'] == 1){
                            $textStatus = 'Đơn mới';
                            $colorStatus = 'warning';
                        }elseif($value['status'] == 2){
                            $textStatus = 'Đang xử lí';
                            $colorStatus = 'info';
                        }elseif($value['status'] == 3){
                            $textStatus = 'Đang giao';
                            $colorStatus = 'primary';
                        }elseif($value['status'] == 4){
                            $textStatus = 'Đã giao';
                            $colorStatus = 'success';
                        }
            ?>
            <tr>
                <td class="board_td text-center"><?php echo $count; ?></td>
                <td class="board_td">
                    <p><?php echo $value['code_order']; ?></p>
                    <p>
                        Phương thức: 
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
                    </p>
                </td>

                <td class="board_td">
                    <p>Tên: <?php echo $value['fullname']; ?></p>
                    <p>Email: <?php echo $value['email']; ?></p>
                    <p>Số điện thoại: <?php echo $value['phone']; ?></p>
                    <p>Địa chỉ: <?php echo $value['address']; ?></p>
                </td>
                <td class="board_td text-center"><?php echo !empty($value['total'])?$value['total']:'0'; ?> VND</td>
                <td class="board_td text-center">
                    <?php if($value['status_pay']): ?>
                        <span href="" class="text-success">Đã thanh toán</span>
                    <?php elseif(true): ?>
                        <span href="" class="text-danger">Chưa thanh toán</span>
                    <?php endif; ?>
                </td>
                <td class="board_td text-center">
                        <span class="text-<?php echo $colorStatus; ?>"><?php echo $textStatus; ?></span>
                </td>
                <?php if(checkPermission($group_id, 'order', 'detail')): ?>
                <td class="board_td text-center">
                    <a href="?module=cart&action=detail_order&id=<?php echo $value['id']; ?>"  class="btn btn-success"><i class="fa fa-shopping-cart"></i></a>
                </td>
                <?php endif; ?>
                <?php if(checkPermission($group_id, 'order', 'delete')): ?>
                <td class="board_td text-center">
                    <a href="" onclick="return confirm('bạn có chắc chắc muốn quá không !!!');" class="btn btn-danger"><i class="fa fa-trash-alt "></i></a>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; else: ?>
                <td class="board_td text-center text-danger" colspan="10">Không có đơn hàng nào</td>
            <?php endif; ?>
        </tbody>
    </table>

<br>

    <?php
    if(!empty($totalPage) && $totalPage > 1 ):

        $back = $page-1;
        if($back < 1){
            $back = 1;
        }
        $next = $page+1;
        if($next > $totalPage){
            $next = $totalPage;
        }

?>    

    <nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item d-<?php echo $page==1?'none':'block'; ?>">
        <a class="page-link" href="<?php echo "?module=$module$urlFilter&page=$back"; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
        </li>

<?php

        $pageS = $page-2;
        if($pageS < 1){
            $pageS = 1;
        }
        $pageE = $page+2;
        if($pageE > $totalPage){
            $pageE = $totalPage;
        }    

        for ($i=$pageS; $i <= $pageE; $i++):

?>

        <li class="page-item <?php echo $page==$i?'active':''; ?>"><a class="page-link" href="<?php echo "?module=$module$urlFilter&page=$i"; ?>"><?php echo $i; ?></a></li>

<?php

        endfor;

?>

        <li class="page-item d-<?php echo $page==$totalPage?'none':'block'; ?>">
        <a class="page-link" href="<?php echo "?module=$module$urlFilter&page=$next"; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
        </li>
    </ul>
    </nav>

<?php endif; ?>    


</div>