<?php
require_once('permissions/login_access.php');
require_once('permissions/show_topsis_access.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Topsis Page</title>


    <!-- Favicon  -->
    <link rel="icon" href="">
    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="dist/css/core-style.css">
    <link rel="stylesheet" href="dist/css/style.css">
    <!-- Responsive CSS -->
    <link href="dist/css/responsive.css" rel="stylesheet">

    <script>
        function loadWebsite() {
            $.ajax({
                type: "get",
                url: "WEB_SYSTEM/services/website/read.php"
            }).done(function(res) {
                //console.log(res);
                $('title').text(res.data['web_name']);
                $('meta[name=description]').attr('content', res.data['web_description']);
                $('meta[name=keywords]').attr('content', res.data['web_keywords']);
                $('link[rel=icon]').attr('href', 'WEB_SYSTEM/dist/img/' + res.data['web_logo']);
            }).fail(function(res) {
                console.log(res);
            });
        }
    </script>
</head>

<body onload="loadWebsite()">
    <!-- Preloader -->
    <div id="preloader">
        <div class="showbox">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Gradient Background Overlay -->
    <div class="gradient-background-overlay"></div>

    <!-- Include Navigator -->
    <?php include('layouts/navigator.php'); ?>
    <!-- End Include Navigator -->

    <!-- Project Area Start -->
    <div class="gallery_area clearfix">
        <div class="container-fluid clearfix">
            <div class="gallery_menu">
                <div class="portfolio-menu">
                    <h1>สถานที่ท่องเที่ยว ในจังหวัดมหาสารคาม ที่ใกล้เคียงความต้องการของคุณมากที่สุด (TOPSIS)</h1>
                </div>
            </div>
            <?php $no = 1; ?>
            <div class="row portfolio-column">
                <?php foreach ($_SESSION['TOPSIS_DATA'] as $row) { ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 column_single_gallery_item">
                        <h3 class='text-center'><?= $no++ . '.' . $row['att_name']; ?></h3>
                        <img src="WEB_SYSTEM/dist/img/attractions/<?= $row['att_image'] ?>" class="img-responsive fit-image" alt="">
                        <div class="hover_overlay">
                            <a class="gallery_img text-center" href="detail.php?id=<?= $row['att_id'] ?>">
                                <i class="fa fa-eye"></i><br>
                                <span><?= $row['att_views'] ?></span>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            
            <?php if (isset($_SESSION['OTHER_DATA']) && !empty($_SESSION['OTHER_DATA'])) : ?>
                <div class="gallery_menu">
                    <div class="portfolio-menu">
                        <h1>สถานที่ท่องเที่ยว ในจังหวัดมหาสารคาม อื่นๆ ที่คุณอาจสนใจ</h1>
                    </div>
                </div>
                <?php $no = 1; ?>
                <div class="row portfolio-column">
                    <?php foreach ($_SESSION['OTHER_DATA'] as $row) { ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 column_single_gallery_item">
                            <h3 class='text-center'><?= $no++ . '.' . $row['att_name']; ?></h3>
                            <img src="WEB_SYSTEM/dist/img/attractions/<?= $row['att_image'] ?>" class="img-responsive fit-image" alt="">
                            <div class="hover_overlay">
                                <a class="gallery_img text-center" href="detail.php?id=<?= $row['att_id'] ?>">
                                    <i class="fa fa-eye"></i><br>
                                    <span><?= $row['att_views'] ?></span>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php endif ?>
        </div>
    </div>
    <!-- Project Area End -->



    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="dist/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="dist/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="dist/js/plugins.js"></script>
    <!-- Active js -->
    <script src="dist/js/active.js"></script>
    <!-- Topsis js -->
    <script src="topsis.js"></script>
</body>

</html>