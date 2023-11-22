<?php
$body = getRequest('get');

if (!empty($body['id'])) {

    $id = $body['id'];

    $detailBlog = getRow("SELECT * FROM blog WHERE id='$id' AND `status`<>'1'");

    if (!empty($detailBlog)) {
    } else {
        setFlashData('msg', 'url này không tồn tại');
        setFlashData('type', 'danger');
        redirect("?module=blog");
    }
} else {
    setFlashData('msg', 'url này lỗi');
    setFlashData('type', 'danger');
    redirect("?module=blog");
}
?>
<div class="container_my padding_X py-3">
    <h2 class="text-center text-primary"><?= $detailBlog['title'] ?></h2>
    <hr>
    <div class="">
        <?php
        echo html_entity_decode($detailBlog['content']);
        ?>

    </div>


</div>