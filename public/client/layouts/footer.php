



<footer class="box_footer">


<div class="footer_end py-3 text-light padding_X" style="background-color: #222;">
    <p class="m-0">© Website đào tạo học sinh người làm SMARTFL - SĐT: 0123456789 - Khóa học trực tuyến giúp bạn phát triển bản thân</p>
</div>

</footer>


</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="<?php echo _WEB_HOST_TEMPLATE.'/client/assets/js/owl.carousel.min.js?ver='.rand(); ?>"></script>

<script>

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

</script>

<script>

<?php

$body = getRequest('get');

if(!empty($body['make_exam'])){
    $make_exam = $body['make_exam'];
        require _WEB_PATH_ROOT.'/client/make_exam/model/make.php';
    if(!empty($detailMakeExam)){
        
    }
}

if(!empty($detailMakeExam)):

?>

let time_start_exam = <?php echo strtotime($detailExam['time_start']); ?>

let time_over_exam = <?php echo $detailExam['time_end']; ?>

let time_now_exam = <?php echo strtotime(date('Y-m-d H:i:s')); ?>

<?php endif; ?>

</script>

<script src="<?php echo _WEB_HOST_TEMPLATE.'/client/assets/js/bootstrap.min.js?ver='.rand(); ?>"></script>

<script src="<?php echo _WEB_HOST_TEMPLATE.'/client/assets/js/app.js?ver='.rand(); ?>"></script>


</html>