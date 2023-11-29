<?php

require _WEB_PATH_ROOT . '/admin/statistics/model/book.php';
$count = 0;

?>
<div class="container_my">
    <a href="?module=statistics&action=charts">
        <h5>Biểu đồ thống kê</h5>
    </a>
    <table class="w-100">
        <thead>
            <tr>
                <th width="8%" class="board_th">STT</th>
                <th class="board_th" width="10%">Danh mục sách</th>
                <th class="board_th">Giá cao nhất</th>
                <th class="board_th">Giá thấp nhất</th>
                <th class="board_th">Số lượng sản phẩm</th>
                <th class="board_th">Số lượng đã bán</th>
                <th class="board_th">Doanh thu</th>
                <th class="board_th">Xem thêm</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $allcountBook_sold = 0;
            $allcountBook = 0;
            $allDoanhthu = 0;
            if (!empty($allBookType)) {
                foreach ($allBookType as $value) {
                    extract($value);
                    $count++;
            ?>
                    <tr>
                        <td class="board_td text-center"><?php echo $count; ?></td>
                        <td class="board_td text-center"><?= $name; ?></td>
                        <td class="board_td text-center">
                            <?php
                            if (!empty($Price_type)) {
                                foreach ($Price_type as $item) {
                                    if ($id == $item['book_type_id']) {
                                        echo $item['price_max'];
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td class="board_td text-center">
                            <?php
                            if (!empty($Price_type)) {
                                foreach ($Price_type as $item) {
                                    if ($id == $item['book_type_id']) {
                                        echo $item['price_min'];
                                    }
                                }
                            }
                            ?>
                        </td>
                        <td class="board_td text-center">
                            <?php
                            if (!empty($allBook)) {
                                $countB = 0;
                                foreach ($allBook as $item) {
                                    if ($id == $item['book_type_id']) {
                                        $countB += $item['quantity'];
                                    }
                                }
                                $allcountBook += $countB;
                                echo $countB;
                            }
                            ?>
                        </td>
                        <td class="board_td text-center">
                            <?php

                            if (!empty($countBookSold)) {
                                $sum = 0;
                                $price_book = 0;
                                foreach ($countBookSold as $cb) {
                                    if ($id == $cb["book_type_id"]) {
                                        $sum += $cb["sum"];
                                    }
                                }
                                $allcountBook_sold += $sum;
                                echo $sum;
                            }

                            ?>
                        </td>
                        <td class="board_td text-center">
                            <?php

                            // if (!empty($allDoanhthu)) {

                            //     echo $allDoanhthu;
                            // } else {
                            //     $allDoanhthu = 0;
                            //     echo $allDoanhthu;
                            // }
                            // $price = $sum * $cb['price'];
                            // $allDoanhthu += $price;
                            // echo $price;

                            ?>
                        </td>
                        <td class="board_td text-center">
                            <a href="?module=statistics&action=book_detail&id=<?php echo $id; ?>">Chi tiết</a>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo '<td colspan="7" class="text-center board_td text-danger">Không có dữ liệu</td>';
            }
            ?>
    </table>
    <hr>




    <table class="w-100">
        <tr>
            <th class="board_th">Tổng số sản phẩm ban đầu</th>
            <th class="board_th">Tổng số sản phẩm đã bán</th>
            <!-- <th class="board_th">Tổng doanh thu</th> -->
        </tr>
        <tr>
            <td width="33.3%" class="board_td text-center">
                <?php
                if (!empty($allcountBook)) {
                    echo $allcountBook;
                } else {
                    $allcountBook = 0;
                    echo $allcountBook;
                }
                ?>
            </td>
            <td width="33.3%" class="board_td text-center">
                <?php
                if (!empty($allcountBook_sold)) {
                    echo $allcountBook_sold;
                } else {
                    $allcountBook_sold = 0;
                    echo $allcountBook_sold;
                }
                ?>

            </td>
            <!-- <td width="33.3%" class="board_td text-center">
                    <?php
                    // if (!empty($allDoanhthu)) {
                    //     echo $allDoanhthu;
                    // } else {
                    //     $allDoanhthu = 0;
                    //     echo $allDoanhthu;
                    // }
                    ?>
                </td> -->
        </tr>
    </table>
</div>