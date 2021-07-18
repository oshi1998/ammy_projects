<?php require_once('permissions/login_access.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Ammy Thanyarat095">

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
                $('#about_title').text(res.data['web_name']);
                $('.about-me-thumb').html('<img src=WEB_SYSTEM/dist/img/'+res.data['web_logo']+' style="width: 200px;height:200px">')
                $('#showDesc').text(res.data['web_description']);
                $('#showMail').text(res.data['web_email']);
                $('#showPhone').text(res.data['web_phone']);
                $('title').text(res.data['web_name']);
                $('meta[name=description]').attr('content', res.data['web_description']);
                $('meta[name=keywords]').attr('content', res.data['web_keywords']);
                $('link[rel=icon]').attr('href','WEB_SYSTEM/dist/img/'+res.data['web_logo']);
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

    <!-- About Me Area Start -->
    <section class="about-me-area mt-100 section_padding_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 text-center">
                    <div class="about-me-thumb">
                        
                    </div>
                </div>
                <div class="col-10">
                    <div class="about-content mt-100 mb-100 text-center">
                        <span></span>
                        <h2 id="about_title"></h2>
                        <p id="showDesc">
                        </p>
                    </div>
                </div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.1s">
                                <i class="fa fa-user fa-lg"></i>
                                <h5>ผู้จัดทำ</h5>
                                <p>นางสาว ธัญญารัตน์ โลตุฤทธิ์</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.4s">
                                <i class="fa fa-mail-reply fa-lg"></i>
                                <h5>อีเมล</h5>
                                <p id="showMail"></p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="single-service-area section_padding_0_100 text-center wow fadeInUp" data-wow-delay="0.9s">
                                <i class="fa fa-phone fa-lg"></i>
                                <h5>เบอร์โทร</h5>
                                <p id="showPhone"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Me Area End -->

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