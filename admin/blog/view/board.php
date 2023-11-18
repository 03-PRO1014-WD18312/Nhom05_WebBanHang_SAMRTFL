
<?php

$body = getRequest('get');

$count = 0;
$filter = '';
$urlFilter = '';

if(!empty($body['keywork'])){
    $keywork = $body['keywork'];
    $filter .= " WHERE `title` LIKE '%$keywork%' ";
    $urlFilter .= "&keywork=$keywork";
}

if(!empty($body['blog_type'])){
    $blog_type = $body['blog_type'];

    if(!empty($filter)){
        $filter .= " AND `blog_type_id` = '$blog_type' ";
    }else{
        $filter .= " WHERE `blog_type_id` = '$blog_type' ";        
    }
    $urlFilter .= "&blog_type=$blog_type";
}

if(!empty($body['author_id'])){
    $author_id = $body['author_id'];

    if(!empty($filter)){
        $filter .= " AND `author_id` = '$author_id' ";
    }else{
        $filter .= " WHERE `author_id` = '$author_id' ";        
    }
    $urlFilter .= "&author_id=$author_id";
}

if(!empty($body['page'])){
    $page = $body['page'];
}else{
    $page = 1;
}

require _WEB_PATH_ROOT.'/admin/blog/model/board.php';

$msg = getFlashData('msg');
$type = getFlashData('type');

?>


<div class="container_my">
    <a href="?module=blog&action=add" class="btn btn-primary mb-3">Thêm <i class="fa fa-plus mx-1"></i></a>

    <?php getAlert($msg, $type); ?>

    <form action="" method="get" class="mx-0 row">

        <input type="hidden" name="module" value="blog">

        <div class="form-group col-4">
            <input type="text" name="keywork" value="<?php echo !empty($keywork)?$keywork:''; ?>" class="form-control">
        </div>

        <div class="form-group col-3">
            <select name="blog_type" class="form-control">
                <option value="">Chọn</option>
                <?php
                    if(!empty($allBlogType)):
                        foreach ($allBlogType as $key => $value):
                ?>
                <option <?php echo !empty($blog_type) && $blog_type == $value['id']?'selected':''; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name'].' - '.$value['id']; ?></option>
                <?php endforeach; endif; ?>
            </select>
        </div>

        <div class="form-group col-3">
            <select name="author_id" class="form-control">
                <option value="">Chọn</option>
                <?php
                    if(!empty($allAuthor)):
                        foreach ($allAuthor as $key => $value):
                ?>
                <option <?php echo !empty($author_id) && $author_id == $value['id']?'selected':''; ?> value="<?php echo $value['id']; ?>"><?php echo $value['fullname'].' - '.$value['email']; ?></option>
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
                <th width="10%" class="board_th">STT</th>
                <th class="board_th">Tiêu đề</th>
                <th class="board_th">Loại blog</th>
                <th class="board_th">Người đăng</th>
                <th class="board_th">Trạng thái</th>
                <th width="10%" class="board_th">Sửa</th>
                <th width="10%" class="board_th">Xóa</th>
            </tr>
        </thead>
        <tbody>
        <?php

        if(!empty($allBlog)):
        foreach ($allBlog as $key => $item): 
        extract($item);

        $count++;

        ?>

            <tr>
                <td class="board_td text-center"><?php echo $count; ?></td>
                <td class="board_td"><?php echo $title; ?></td>
                <td class="board_td text-center"><a href=""><?php echo $t_name; ?></a></td>
                <td class="board_td text-center"><a href=""><?php echo $u_name; ?></a></td>
                <td class="board_td text-center"><a href="?module=blog&action=approve&id=<?php echo $item['id']; ?>" class="btn btn-<?php echo $item['status']==1?'success':'danger'; ?>"><?php echo $item['status']==1?'Duyệt':'Chưa Duyệt'; ?></a></td>
                <td class="board_td text-center">
                    <a href="<?php echo '?module='.$module.'&action=fix&id='.$id; ?>" class="btn btn-warning"><i class="fa fa-wrench"></i></a>
                </td>
                <td class="board_td text-center">
                    <a href="" onclick="return confirm('bạn có chắc chắc muốn quá không !!!');" class="btn btn-danger"><i class="fa fa-trash-alt "></i></a>
                </td>
            </tr>

        <?php

        endforeach;
        else:
            echo '<td colspan="7" class="text-center board_td text-danger">Không có dữ liệu</td>';
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


