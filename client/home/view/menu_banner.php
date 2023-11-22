<?php

require _WEB_PATH_ROOT . '/client/home/model/menu_banner.php';


?>


<div class="menu_banner">
    <div class="">
        <div class="card menu_home my-auto">

            <ul class="list-group list-group-flush menu_home my-auto">
                <?php
                if (!empty($allCourseType)) {
                    foreach ($allCourseType as $value) {
                ?>
                        <a href="" class="list-group-item py-1 px-2 text-decoration-none text-dark"><?= $value['name'] ?></a>
                <?php
                    }
                }
                ?>

            </ul>

        </div>
    </div>

    <div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?php echo _WEB_HOST_TEMPLATE . '/client/assets/image/banner1.png'; ?>" class="d-block w-100 h-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo _WEB_HOST_TEMPLATE . '/client/assets/image/banner2.png'; ?>" class="d-block w-100 h-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo _WEB_HOST_TEMPLATE . '/client/assets/image/banner3.jpeg'; ?>" class="d-block w-100 h-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </div>


</div>