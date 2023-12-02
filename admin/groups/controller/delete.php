<?php

$id_group = _MY_DATA['id_group'];

if(empty(checkPermission($id_group, 'group', 'delete'))){
    redirect(_WEB_HOST_ERORR.'/permission.php');
}

$body = getRequest('get');

if(!empty($body['id'])){
    $id = $body['id'];
    $detailGroup = getRow("SELECT id FROM groups WHERE id='$id'");
    if(!empty($detailGroup)){

    }else{
        setFlashData('msg', 'Url này không tồn tại !!!');
        setFlashData('type', 'danger');
    }
}else{
    setFlashData('msg', 'url này lỗi !!!');
    setFlashData('type', 'danger');
}

redirect($_SERVER['HTTP_REFERER']);

?>