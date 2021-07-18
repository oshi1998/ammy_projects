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

    <!-- ***** Welcome Area Start ***** -->
    <section class="welcome-area">
        <div class="carousel h-100 slide" data-ride="carousel" id="welcomeSlider">
            <!-- Carousel Inner -->
            <div class="carousel-inner h-100">

                <div class="carousel-item h-100 bg-img active" style="background-image: url(dist/img/bg-img/1.jpg);">
                    <div class="carousel-content h-100">
                    </div>
                </div>

                <div class="carousel-item h-100 bg-img" style="background-image: url(dist/img/bg-img/2.jpg);">
                    <div class="carousel-content h-100">
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(dist/img/bg-img/3.jpg);">
                    <div class="carousel-content h-100">
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(dist/img/bg-img/4.jpeg);">
                    <div class="carousel-content h-100">
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(dist/img/bg-img/5.jpg);">
                    <div class="carousel-content h-100">
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(dist/img/bg-img/6.jpg);">
                    <div class="carousel-content h-100">
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(dist/img/bg-img/7.jpg);">
                    <div class="carousel-content h-100">
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(dist/img/bg-img/8.jpg);">
                    <div class="carousel-content h-100">
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(dist/img/bg-img/9.jpg);">
                    <div class="carousel-content h-100">
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(dist/img/bg-img/10.jpg);">
                    <div class="carousel-content h-100">
                    </div>
                </div>
            </div>
            <!-- Carousel Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#welcomeSlider" data-slide-to="0" class="active bg-img" style="background-image: url(dist/img/bg-img/1.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="1" class="bg-img" style="background-image: url(dist/img/bg-img/2.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="2" class="bg-img" style="background-image: url(dist/img/bg-img/3.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="3" class="bg-img" style="background-image: url(dist/img/bg-img/4.jpeg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="4" class="bg-img" style="background-image: url(dist/img/bg-img/5.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="5" class="bg-img" style="background-image: url(dist/img/bg-img/6.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="6" class="bg-img" style="background-image: url(dist/img/bg-img/7.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="7" class="bg-img" style="background-image: url(dist/img/bg-img/8.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="8" class="bg-img" style="background-image: url(dist/img/bg-img/9.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="9" class="bg-img" style="background-image: url(dist/img/bg-img/10.jpg);"></li>
            </ol>
        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->

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