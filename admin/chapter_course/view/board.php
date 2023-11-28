

<?php


$body = getRequest('get');

if(!empty($body['page'])){
    $page = $body['page'];
}else{
    $page = 1;
}

$count = 0;
$filter = '';
$urlFilter = '';

if(!empty($body['keywork'])){
    $keywork = $body['keywork'];
    $filter .= " AND ct.name LIKE '%$keywork%' ";
    $urlFilter .= "&keywork=$keywork";
}


if(!empty($body['id'])){
    $id = $body['id'];
    require _WEB_PATH_ROOT.'/admin/chapter_course/model/board.php';

    if(!empty($detailCourse)){
        
    }else{
        setFlashData('msg', 'url này không tồn tại');
        setFlashData('type', 'danger');
        redirect('?module=course');
    }
}else{
    setFlashData('msg', 'url này lỗi');
    setFlashData('type', 'danger');
    redirect('?module=course');
}




// $msg = getFlashData('msg');
// $type = getFlashData('type');

?>


<div class="container_double">

    <div>
        <?php
            if(!empty($body['view'])){
                $view = $body['view'];
            }else{  
                $view = 'add';
            }
            view($view, 'admin', $module, ['id'=>$id]);
        ?>
    </div>

    <div>

    <h5>Danh sách chương</h5>
    <hr>
    <form action="" method="get" class="mx-0 row">

        <input type="hidden" name="module" value="<?php echo $module; ?>">

        <div class="form-group col-10">
            <input type="text" name="keywork" value="<?php echo !empty($keywork)?$keywork:''; ?>" class="form-control">
        </div>

        <div class="form-group col-2">
            <input type="submit" value="Tìm" class="form-control btn btn-primary">
        </div>

        <input type="hidden" name="id" value="<?php echo $id; ?>">


    </form>

    <table class="w-100">
        <thead>
            <tr>
                <th width="5%" class="board_th">STT</th>
                <th width="" class="board_th">Tên</th>
                <th width="5%" class="board_th">Sửa</th>
                <th width="5%" class="board_th">Xóa</th>
            </tr>
        </thead>
        <tbody>
        <?php

        if(!empty($allChapterCourse)):
        foreach ($allChapterCourse as $key => $item): 

        $count++;

        ?>

            <tr>
                <td class="board_td text-center"><?php echo $count; ?></td>
                <td class="board_td text-center"><a href="?module=exercise_course&chapter_id=<?php echo $id; ?>"><?php echo $item['name']; ?></a></td>
                <td class="board_td text-center">
                    <a href="<?php echo '?module='.$module.'&view=fix&id='.$id.'&chapter_id='.$item['id']; ?>" class="btn btn-warning"><i class="fa fa-wrench"></i></a>
                </td>
                <td class="board_td text-center">
                    <a href="" onclick="return confirm('bạn có chắc chắc muốn quá không !!!');" class="btn btn-danger"><i class="fa fa-trash-alt "></i></a>
                </td>
            </tr>

        <?php

        endforeach;
        else:
            echo '<td colspan="10" class="text-center board_td text-danger">Không có dữ liệu</td>';
        endif;

        ?>
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
        <a class="page-link" href="<?php echo "?module=$module$urlFilter&page=$back&id=$id"; ?>" aria-label="Previous">
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

        <li class="page-item <?php echo $page==$i?'active':''; ?>"><a class="page-link" href="<?php echo "?module=$module$urlFilter&page=$i&id=$id"; ?>"><?php echo $i; ?></a></li>

<?php

        endfor;

?>

        <li class="page-item d-<?php echo $page==$totalPage?'none':'block'; ?>">
        <a class="page-link" href="<?php echo "?module=$module$urlFilter&page=$next&id=$id"; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
        </li>
    </ul>
    </nav>

<?php endif; ?>    

    </div>

    

</div>


