<br>
<?php 
   $body = getRequest('get');

   if(!empty($body['id'])){
   
       $id = $body['id'];
   
       $detailBook = getRow("SELECT * FROM book WHERE id='$id' AND `status`<>'1'");
   
       if(!empty($detailBook)){
   
       }else{
           setFlashData('msg', 'url này không tồn tại');
           setFlashData('type', 'danger');
           redirect("?module=book");
       }
   
   }else{
       setFlashData('msg', 'url này lỗi');
       setFlashData('type', 'danger');
       redirect("?module=book");
   }
   
?>
<div class="box_detail_book">

<img class="w-100" src="<?php echo _WEB_HOST_IMAGE_CLIENT.'/'.$detailBook['image']; ?>" alt="">

<div class="detail_book">

<h4> <?php echo $detailBook['title'];?></h4>
<hr>
<p> 
  <h6>Mô tả ngắn: </h6>  <?php echo html_entity_decode($detailBook['description']);?>
</p>
</div>


<div class="price_book">

<div class="card w-100" style="width: 18rem;">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
        <h6 class="text-center">THÔNG TIN THANH TOÁN</h6>
    </li>
    <li class="list-group-item px-3">
        <p>Giá bán: <?php echo $detailBook['price'];?> VND</p>
    </li>
    <li class="list-group-item px-3 text-center">
        <form action="" method="post" class=" d-inline-block w-75 mx-auto">
            <span class="btn btn-primary my-auto"><i class="fa fa-minus"></i></span>
            <input type="number" class="w-50 form-control my-auto d-inline-block">
            <span class="btn btn-primary my-auto"><i class="fa fa-plus"></i></span>
    </li>
    <li class="list-group-item px-3 text-center">

            <input type="submit" value="Thêm vào giỏ hàng" class="btn btn-danger">

        </form>
    </li>
  </ul>
</div>


</div>

</div>

<hr>

<div>
<h5>Thông tin về sách</h5>
<p><?php echo html_entity_decode($detailBook['content']);?> </p>



</div>