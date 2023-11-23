<br>
<?php 
   $body = getRequest('get');

   if(!empty($body['id'])){
   
       $id = $body['id'];
   
       $detailBook = getRow("SELECT b.*, t.name AS 't_name' FROM book AS b INNER JOIN book_type AS t ON b.book_type_id=t.id WHERE b.id='$id' AND b.status<>'0'");
   
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
    Chia sẻ: <a href="" class="btn btn-primary"><i class="fab fa-facebook-f mr-2"></i> Facebook</a> <a href="" class="btn btn-dark"><i class="fab fa-twitter mr-2"></i>Twitter</a>
</p>

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
        <p>Loại sách: <?php echo $detailBook['t_name'];?></p>
    </li>
    <!-- <li class="list-group-item px-3 text-center">
        <form action="" method="post" class=" d-inline-block w-75 mx-auto">
            <span class="btn btn-primary my-auto"><i class="fa fa-minus"></i></span>
            <input type="number" class="w-50 form-control my-auto d-inline-block">
            <span class="btn btn-primary my-auto"><i class="fa fa-plus"></i></span>
             </form>
    </li> -->
    <li class="list-group-item px-3 text-center">
        <a href="" class="btn btn-danger w-100">Mua ngay</a>
    </li>
    <li class="list-group-item px-3 text-center">
        <a href="" class="btn btn-success w-100">Thêm vào rỏ hàng</a>
    </li>
  </ul>
</div>


</div>

</div>

<hr>

<div>

<?php if(!empty($detailBook['content'])): ?>
<h3 class="text-primary">Thông tin về sách</h3>
<br>
<p><?php echo html_entity_decode($detailBook['content']);?> </p>
<?php endif; ?>


</div>

<?php 

$data = [
    'book_type' => $detailBook['book_type_id'],
    'book_id' => $detailBook['id']
];

view('book_like', 'client', 'book', $data);
?>