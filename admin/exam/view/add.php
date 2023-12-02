<?php

$group_id = _MY_DATA['id_group'];

if(!checkPermission($group_id, 'exam', 'add')){
    redirect(_WEB_HOST_ERORR."/permission.php");
}

require _WEB_PATH_ROOT.'/admin/exam/model/add.php';

if(is_Post()){

    $data = getRequest();
    $errors = [];

    if(empty($data['title'])){
        $errors['title'] = 'Vui lòng điền thông tin';
    }

    if(empty($data['time_open'])){
        $errors['time_open'] = 'Vui lòng điền thông tin';
    }else{
        $time_buy = getTypeTime($data['time_open']);
        if($time_buy){
            $errors['time_open'] = 'Thời gian mở phải lớn hơn thời gian hiện tại 1 phút';
        }
    }

    if(empty($data['time_close'])){
        $errors['time_close'] = 'Vui lòng điền thông tin';
    }else{
        $time_buy = getTypeTime($data['time_open'], $data['time_close']);
        if(empty($time_buy) || $time_buy == 'minute' || $time_buy == 'hour'){
            $errors['time_close'] = 'Thời gian đóng phải lớn hơn thời gian mở 1 ngày 1 phút';
        }
    }

    if(empty($data['time_start'])){
        $errors['time_start'] = 'Vui lòng điền thông tin';
    }else{
        $time_make = getTypeTime($data['time_close'], $data['time_start']);
        if(empty($time_make) || $time_make == 'minute' || $time_make == 'hour'){
            $errors['time_start'] = 'Thời gian làm phải lớn hơn thời gian đóng 1 ngày 1 phút';
        }
    }

    if(empty($data['time_make'])){
        $errors['time_make'] = 'Vui lòng điền thông tin';
    }else{
        if(!preg_match('~^[0-9]+$~', $data['time_make'])){
            $errors['time_make'] = 'Đây phải là số';
        }
    }

    if(empty($data['exam_type_id'])){
        $errors['exam_type_id'] = 'Vui lòng chọn dữ liệu';
    }

    if(empty($data['price'])){
        $errors['price'] = 'Vui lòng điền thông tin';
    }else{
        if(!preg_match('~^[0-9]+$~', $data['price'])){
            $errors['price'] = 'Đây phải là số';
        }
    }

    if(empty($errors)){

        $time_end = $data['time_make']*60;
        $time_end = strtotime($data['time_start']) + $time_end;

        $dataInsert = [
            'title' => $data['title'],
            'time_open' => $data['time_open'],
            'time_close' => $data['time_close'],
            'time_start' => $data['time_start'],
            'time_make' => $data['time_make'],
            'time_end' => $time_end,
            'exam_type_id' => $data['exam_type_id'],
            // 'description' => $data['description'],
            'price' => $data['price'],
            'create_at' => date('Y-m-d H:i:s'),
            'status' => 0,
            'author_id' => 1,
        ];

        if(!empty($_FILES['image']['name'])){
            $image = $_FILES['image'];
            $nameImage = time().'_'.$image['name'];
            $toFile =  _WEB_PATH_IMAGE_CLIENT.'/'.$nameImage;
            // chỉ xóa khi update
            // if(file_exists(_WEB_PATH_IMAGE_CLIENT.'/'.$detailCourse['image'])){
            // $statuLink = unlink(_WEB_PATH_IMAGE_CLIENT.'/'.$detailCourse['image']);
            // }            
            move_uploaded_file($image['tmp_name'], $toFile);
            $dataInsert['image'] = $nameImage;
        }

        if(insert('exam', $dataInsert)){
            setFlashData('msg', 'Thêm mới thành công !!!');
            setFlashData('type', 'success');
        }else{
            setFlashData('msg', 'Lỗi hệ thống !!!');
            setFlashData('type', 'danger');
        }

    }else{
        setFlashData('msg', 'Vui lòng kiểm tra form !!!');
        setFlashData('type', 'danger');
        setFlashData('errors', $errors);
        setFlashData('old', $data);
    }

redirect('?module=exam&action=add');

}

$msg = getFlashData('msg');
$type = getFlashData('type');
$errors = getFlashData('errors');
$old = getFlashData('old');

?>

<div class="container_my">

    <?php getAlert($msg, $type); ?>

    <form action="" method="post" class="row mx-0" enctype="multipart/form-data">

    <div class="form-group col-12">
    <label for="">Tiêu đề</label>
    <input type="text" name="title" value="<?php echo !empty($old['title'])?$old['title']:''; ?>" class="form-control">   
    <?php !empty($errors['title'])?formError($errors['title']):''; ?>
    </div>

    <div class="form-group col-12">
            <label for="">Ảnh</label>
            <input type="file" name="image" class="form-control"> 
            <!-- <?php echo !empty($errors['title'])?formError($errors['title']):''; ?> -->
    </div>

    <div class="form-group col-6">
    <label for="">Giờ mở bán</label>
    <input type="datetime-local" name="time_open" value="<?php echo !empty($old['time_open'])?$old['time_open']:''; ?>" class="form-control">   
    <?php !empty($errors['time_open'])?formError($errors['time_open']):''; ?>
    </div>

    <div class="form-group col-6">
    <label for="">Giờ bắt đầu làm</label>
    <input type="datetime-local" name="time_start" value="<?php echo !empty($old['time_start'])?$old['time_start']:''; ?>" class="form-control">   
    <?php !empty($errors['time_start'])?formError($errors['time_start']):''; ?>
    </div>

    <div class="form-group col-6">
    <label for="">Giờ đóng cửa</label>
    <input type="datetime-local" name="time_close" value="<?php echo !empty($old['time_close'])?$old['time_close']:''; ?>" class="form-control">   
    <?php !empty($errors['time_close'])?formError($errors['time_close']):''; ?>
    </div>

    <div class="form-group col-6">
    <label for="">Giờ làm bài (dự liệu là số phút)</label>
    <input type="text" name="time_make" value="<?php echo !empty($old['time_make'])?$old['time_make']:''; ?>" class="form-control">   
    <?php !empty($errors['time_make'])?formError($errors['time_make']):''; ?>
    </div>

    <div class="form-group col-6">
        <label for="">Chọn loại</label>
        <select class="form-control" name="exam_type_id" id="">
            <option value="">Chọn</option>
            <?php 
            if($allExamType):
                foreach ($allExamType as $key => $value):
            ?>
                <option <?php echo !empty($old['exam_type_id']) && $old['exam_type_id'] == $value['id']?'selected':''; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name'].' - '.$value['id']; ?></option>
            <?php endforeach;endif; ?>
        </select>
        <?php echo !empty($errors['exam_type_id'])?formError($errors['exam_type_id']):''; ?>
    </div>

    <div class="form-group col-6">
    <label for="">Giá bán</label>
    <input type="text" name="price" value="<?php echo !empty($old['price'])?$old['price']:''; ?>" class="form-control">   
    <?php !empty($errors['price'])?formError($errors['price']):''; ?>
    </div>

    <!-- <div class="form-group col-12">
    <label for="">Mô tả</label>
    <textarea name="description" id="" cols="30" rows="10" class="ckediter"><?php echo !empty($old['description'])?$old['description']:''; ?></textarea>
    <?php !empty($errors['description'])?formError($errors['description']):''; ?>
    </div> -->

    <div class="form-group col-12">
    <input type="submit" value="Thêm" class="form-control btn btn-primary">   
    </div>

    </form>

    <hr>

    <a href="?module=exam" class="btn btn-success">Danh sách</a>


</div>