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
                $('link[rel=icon]').attr('href', 'WEB_SYSTEM/dist/img/' + res.data['web_logo']);
            }).fail(function(res) {
                console.log(res);
            });
        }
    </script>
</head>

<body onload="loadWebsite(),loadGoogleMaps()">
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


                <div class="carousel-item h-100 bg-img active" style="background-image: url(dist/img/bg-img/2.jpg);">
                    <div class="carousel-content h-100">
                        <div class="card" style="margin-left:300px">
                            <div class="card-body">
                                <h1>1. พระบรมธาตุนาดูน</h1>
                                <p>
                                    พระบรมธาตุนาดูน เป็นปูชนียสถานที่สร้างขึ้นเพื่อความเป็นสิริมงคลของภาคอีสาน <br>
                                    และเป็นที่สักการะบูชาของชาวบ้าน จำลองแบบจากสถูปสำริดที่บรรจุพระบรมสารีริกธาตุ <br>
                                    โดยฐานเป็นแบบศิลปะแบบทวาราวดี ตกแต่งด้วยลวดลายลวดบัวสวยงาม รอบๆ องค์พระบรมธาตุนาดูน <br>
                                    ยังเต็มไปด้วยพรรณไม้ต่างๆ ร่มรื่นของ สถาบันวิจัยรุกขเวช
                                </p>
                                <div class="float-right">
                                    <a href="detail.php?id=17" class="btn btn-info">รายละเอียดเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item h-100 bg-img" style="background-image: url(dist/img/bg-img/1.jpg);">
                    <div class="carousel-content h-100">
                        <div class="card" style="margin-left:300px">
                            <div class="card-body">
                                <h1>2. สะพานไม้แกดำ</h1>
                                <p>
                                    ท่ามกลางบึงบัวและพืชน้ำสีเขียวและความหลากทางธรรมชาติ <br>
                                    ถือว่าเป็นสะพานสุด Unseen อีกแห่งหนึ่ง ที่ควรค่า <br>
                                    แห่งการเดินทางมาเช็คอิน ณ มหาสารคาม
                                </p>
                                <div class="float-right">
                                    <a href="detail.php?id=19" class="btn btn-info">รายละเอียดเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="carousel-item h-100 bg-img" style="background-image: url(dist/img/bg-img/13.jpg);">
                    <div class="carousel-content h-100">
                        <div class="card" style="margin-left:300px">
                            <div class="card-body">
                                <h1>3. วัดป่าวังน้ำเย็น</h1>
                                <p>
                                    วัดป่าวังน้ำเย็น หรือ วัดพุทธวนาราม วัดดัง มหาสารคาม ที่ตั้งอยู่ในอำเภอเมืองมหาสารคาม <br>
                                    สร้างขึ้นโดย พระอาจารย์ สุริยันต์ โฆสปัญโญ พระเกจิอาจารย์ชื่อดัง ศิษย์ของ หลวงปู่คำพันธ์ โฆสปัญโญ <br>
                                    เพื่อเป็นศูนย์รวมจิตใจของพุทธศาสนิกชน
                                </p>
                                <div class="float-right">
                                    <a href="detail.php?id=26" class="btn btn-info">รายละเอียดเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(dist/img/bg-img/4.jpg);">
                    <div class="carousel-content h-100">
                        <div class="card" style="margin-left:300px">
                            <div class="card-body">
                                <h1>4. วัดหนองหูลิง</h1>
                                <p>
                                    วัดหนองหูลิง เป็นวัดเก่าแก่ที่สร้างขึ้นในปี พ.ศ.2476 เป็นวัดที่มีความสวยงาม และโดดเด่นคือ <br>
                                    อุโบสถรูปทรงเรืออนันตนาคราช ออกแบบโดยท่านเจ้าอาวาส พระครูบวรธรรมปคุณ ซึ่งมีรูปทรงแตกต่าง <br>
                                    ไปจากอุโบสถของวัดอื่นๆ ในมหาสารคาม คือ เป็นอุโบสถรูปเรือ หมายถึง เรือบุญ
                                </p>
                                <div class="float-right">
                                    <a href="detail.php?id=27" class="btn btn-info">รายละเอียดเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(dist/img/bg-img/5.jpeg);">
                    <div class="carousel-content h-100">
                        <div class="card" style="margin-left:300px">
                            <div class="card-body">
                                <h1>5. กู่สันตรัตน์</h1>
                                <p>
                                    กู่สันตรัตน์ โบราณสถานซึ่งสร้างขึ้นสมัยพระเจ้าชัยวรมันที่ 7 ประมาณพุทธศตวรรษที่ 18 <br>
                                    ด้วยหินทรายในแบบศิลปะขอมบายน เป็นลักษณะของโรคยาศาล ซึ่งยังคงอยู่ในสภาพค่อนข้างสมบูรณ์และสวยงาม
                                </p>
                                <div class="float-right">
                                    <a href="detail.php?id=22" class="btn btn-info">รายละเอียดเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="carousel-item h-100 bg-img" style="background-image: url(dist/img/bg-img/6.jpg);">
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
                </div> -->
            </div>
            <!-- Carousel Indicators -->
            <a class="carousel-control-prev" href="#welcomeSlider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#welcomeSlider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!-- <ol class="carousel-indicators">
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
            </ol> -->
        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->

    <div class="container-fluid mt-50">

        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        แผนที่สถานที่ท่องเที่ยว
                    </div>
                    <div class="card-body">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d245219.27917254457!2d103.17437731136629!3d16.192076577468914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z4Liq4LiW4Liy4LiZ4LiX4Li14LmI4LiX4LmI4Lit4LiH4LmA4LiX4Li14LmI4Lii4Lin4Liq4Liy4Lij4LiE4Liy4Lih!5e0!3m2!1sth!2sth!4v1635371613644!5m2!1sth!2sth" width="100%" height="760" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        สถานที่แนะนำ
                    </div>
                    <div class="card-body">
                        <?php require_once('services/suggestAtt.php') ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-50">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        ร้านอาหาร,คาเฟ่ ยอดฮิต แนะนำ!
                    </div>
                    <div class="card-body">
                        <div class="row mt-15">
                            <div class="col-3">
                                <img src="dist/img/res & cafe/01.jpg">
                            </div>
                            <div class="col-9">
                                <strong>คาเฟ่ กทม. @มหาสารคาม</strong>
                                <p>อาหารอร่อย ราคาเหมาะสม ที่จอดรถกว้างขวาง พนักงานต้อนรับเป็นมิตร</p>
                                <p>ถ. แจ้งสนิท ตำบล ตลาด อำเภอเมืองมหาสารคาม มหาสารคาม 44000</p>
                            </div>
                        </div>
                        <div class="row mt-15">
                            <div class="col-3">
                                <img src="dist/img/res & cafe/02.jpg">
                            </div>
                            <div class="col-9">
                                <strong>ร้านอาหาร ฟิลด์ชายน์ คาเฟ่</strong>
                                <p>บรรยากาศสบายๆ แต่ควรมาช่วงเย็น เพราะกลางวันอากาศร้อน ส่วนเรื่องอาหารก็อร่อยใช้ได้ เครื่องดื่มก็อร่อย และที่สำคัญอยู่ใกล้เมืองมหาสารคาม</p>
                                <p>เลขที่ 33/4 บ้านนางใย (คุ้มวัดอุทัยทิศ2) ตลาด ชานเมือง เมือง มหาสารคาม 44000</p>
                            </div>
                        </div>
                        <div class="row mt-15">
                            <div class="col-3">
                                <img src="dist/img/res & cafe/03.jpg">
                            </div>
                            <div class="col-9">
                                <strong>5th Avenue cafe maha sarakham</strong>
                                <p>บรรยากาศดี ของหวานอร่อย ของคาวก็อร่อย ไม่แพงมาก กำลังดี เป็นที่ Hangout ที่นึงในเมืองสารคามที่แนะนำ</p>
                                <p>ตำบล ตลาด อำเภอเมืองมหาสารคาม มหาสารคาม 44000</p>
                            </div>
                        </div>
                        <div class="row mt-15">
                            <div class="col-3">
                                <img src="dist/img/res & cafe/04.jpg">
                            </div>
                            <div class="col-9">
                                <strong>MACAFF Coffee</strong>
                                <p>ร้านไม่ใหญ่ หาง่ายเดินทางสะดวกสบาย ไม่ค่อยมีที่จอดรถ ภายในร้านสะอาดดี ห้องน้ำสะอาด แอร์เย็นสบาย มีเพลงฟัง มีไวไฟและปลั๊กไฟให้ มอคค่าอร่อยดีราคาไม่แพง ไม่ค่อยมีเค้ก รวมๆแล้วดีต่อใจ มาแล้วอยากมาอีก</p>
                                <p>ถนนถีนานนท์ ตำบล ตลาด อำเภอเมืองมหาสารคาม มหาสารคาม 44000</p>
                            </div>
                        </div>
                        <div class="row mt-15">
                            <div class="col-3">
                                <img src="dist/img/res & cafe/05.jpg">
                            </div>
                            <div class="col-9">
                                <strong>Arte'cafe</strong>
                                <p>บรรยากาศแบบสบายๆ จิบกาแฟ กินขนม นั่งคุยกันเบาๆ</p>
                                <p>208 ตำบล ตลาด อำเภอเมืองมหาสารคาม มหาสารคาม 44000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        แผนที่ร้านอาหาร,คาเฟ่
                    </div>
                    <div class="card-body">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d30653.945169293576!2d103.29064543433022!3d16.18219080693416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z4Lij4LmJ4Liy4LiZ4Lit4Liy4Lir4Liy4LijLOC4hOC4suC5gOC4n-C5iCDguKrguLLguKPguITguLLguKE!5e0!3m2!1sth!2sth!4v1635375184544!5m2!1sth!2sth" width="100%" height="760" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <br><br><br>
    </div>

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