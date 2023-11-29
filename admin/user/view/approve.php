<?php

$body = getRequest('get');

if(!empty($body['id'])){
    $id = $body['id'];

    $detailUser = getRow("SELECT `status` FROM user WHERE id='$id'");

    if(!empty($detailUser)){
        
        if($detailUser['status'] == 0){
            $statusUpdate = update(
                'user',
                [
                    'status' => 1
                ],
                "id='$id'"
            );
        }
        if($detailUser['status'] == 1){
            $statusUpdate = update(
                'user',
                [
                    'status' => 0
                ],
                "id='$id'"
            );
        }

        if($statusUpdate){
            setFlashData('msg', 'Cập nhật thành công !!!');
            setFlashData('type', 'success');
        }else{
            setFlashData('msg', 'Lỗi hệ thống');
            setFlashData('type', 'danger');
        }

    }else{
        setFlashData('msg', 'url này không tồn tại');
        setFlashData('type', 'danger');
    }
}else{
    setFlashData('msg', 'url này lỗi');
    setFlashData('type', 'danger');
}

redirect($_SERVER['HTTP_REFERER']);



?>