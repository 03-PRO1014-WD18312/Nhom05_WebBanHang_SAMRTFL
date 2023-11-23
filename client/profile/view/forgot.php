
<?php

if(is_Post()){

    $user_id = _MY_DATA['id'];

    $data = getRequest();

    $errors = [];

    if(empty($data['password'])){
        $errors['password'] = "Vui lòng nhập dữ liệu";
    }else{
        if(strlen(trim($data['password'])) < 5){
            $errors['password'] = 'Mật khẩu không được dưới 5 kí tự';
        }
    }

    if(empty($data['confirm'])){
        $errors['confirm'] = "Vui lòng nhập thông tin";
    }else{
        if($data['password'] != $data['confirm']){
            $errors['confirm'] = "Mật khẩu không giống nhau";
        }
    }

    if(empty($errors)){

        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $dataUpdate = [
            'password' =>  $password,
            'update_at' => date('Y-m-d H-i-s'),
        ];

        if(update('user', $dataUpdate, "id='$user_id'")){
            setFlashData('msg', 'Đổi mật khẩu thành công');
            setFlashData('type', 'success');
        }else{
            setFlashData('msg', 'Lỗi hệ thống');
            setFlashData('type', 'danger');
        }

    }else{
        setFlashData('msg', 'Vui lòng kiểm tra form');
        setFlashData('type', 'danger');
        setFlashData('errors', $errors);
    }

    redirect('?module=profile&action=forgot');

}

$msg = getFlashData('msg');
$type = getFlashData('type');
$errors = getFlashData('errors');

?>


<div class="profile_information bg-white border bra-10 p-3">

<h3>Hãy nhập mật khẩu mới</h3>
<hr>

<?php getAlert($msg, $type); ?>

<form action="" method="post">

<div class="form-group">
    <label for="">Mật khẩu mới</label>
    <input type="text" name="password" class="form-control">
    <span class="text-danger"><?php echo !empty($errors['password'])?$errors['password']:''; ?></span>
</div>

<div class="form-group">
    <label for="">Nhập lại mật khẩu</label>
    <input type="text" name="confirm" class="form-control">
    <span class="text-danger"><?php echo !empty($errors['confirm'])?$errors['confirm']:''; ?></span>
</div>


<input type="submit" value="Cập nhật" class="btn btn-primary w-100">




</form>


</div>