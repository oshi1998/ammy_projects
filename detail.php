<?php
require_once('permissions/login_access.php');
require_once('permissions/detail_access.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Page</title>
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

        function loadAtt() {
            $.ajax({
                type: "get",
                url: "WEB_SYSTEM/services/att/read.php",
                data: {
                    "getdata": att_id095
                }
            }).done(function(res) {
                console.log(res);
                let data = res.data;
                let image = res.image;
                let html = "";

                if (data.att_cost == 1) {
                    att_cost = 'ค่าใช้จ่ายน้อยมาก (100-500 บาท)';
                } else if (data.att_cost == 2) {
                    att_cost = 'ค่าใช้จ่ายน้อย (1,000-500 บาท)';
                } else if (data.att_cost == 3) {
                    att_cost = 'ค่าใช้จ่ายปานกลาง (1,000-5,000 บาท)';
                } else {
                    att_cost = 'ค่าใช้จ่ายมาก (มากกว่า 5,000 บาท)';
                }

                if (data.att_convenience == 1) {
                    att_convenience = 'การเข้าถึงไม่สะดวก (ห่างจากถนนเส้นหลักมากกว่า 10 กม.)';
                } else if (data.att_convenience == 2) {
                    att_convenience = 'การเข้าถึงสะดวกน้อย (ห่างจากถนนเส้นหลัก 7-9 กม.)';
                } else if (data.att_convenience == 3) {
                    att_convenience = 'การเข้าถึงสะดวกปานกลาง (ห่างจากถนนเส้นหลัก 4-6 กม.)';
                } else {
                    att_convenience = 'การเข้าถึงสะดวกมาก (ห่างจากถนนเส้นหลัก 1-3 กม.)';
                }

                if (data.att_restaurant == 1) {
                    att_restaurant = 'มีร้านอาหารน้อยมาก (มี 1-2 ร้าน)';
                } else if (data.att_restaurant == 2) {
                    att_restaurant = 'มีร้านอาหารน้อย (มี 3-5 ร้าน)';
                } else if (data.att_restaurant == 3) {
                    att_restaurant = 'มีร้านอาหารปานกลาง (มี 7-9 ร้าน)';
                } else {
                    att_restaurant = 'มีร้านอาหารมาก (มี มากกว่า 10 ร้าน)';
                }

                if (data.att_transfer == 1) {
                    att_transfer = 'มีบริการรถรับส่งน้อยมาก (1-2 รอบ/วัน)';
                } else if (data.att_transfer == 2) {
                    att_transfer = 'มีบริการรถรับส่งน้อย (3-5 รอบ/วัน)';
                } else if (data.att_transfer == 3) {
                    att_transfer = 'มีบริการรถรับส่งปานกลาง (มี 7-9 รอบ/วัน';
                } else {
                    att_transfer = 'มีบริการรถรับส่งมาก (มากกว่า 10 รอบ/วัน)';
                }

                if (data.att_hotel == 1) {
                    att_hotel = 'มีที่พักโรงแรมน้อยมาก (1-2 ที่)';
                } else if (data.att_hotel == 2) {
                    att_hotel = 'มีบริการที่พักโรงแรมน้อย (มี 3-5 ที่)';
                } else if (data.att_hotel == 3) {
                    att_hotel = 'มีบริการที่พักโรงแรมปานกลาง (มี 7-9 ที่)';
                } else {
                    att_hotel = 'มีบริการที่พักโรงแรมมาก (มีมากกว่า 10 ที่)';
                }

                if (data.att_cafe == 1) {
                    att_cafe = 'มีร้านคาเฟ่น้อยมาก (มี 1-2 ร้าน)';
                } else if (data.att_cafe == 2) {
                    att_cafe = 'มีร้านคาเฟ่น้อย (มี 3-5 ร้าน)';
                } else if (data.att_cafe == 3) {
                    att_cafe = 'มีร้านคาเฟ่ปานกลาง (มี 7-9 ร้าน)';
                } else {
                    att_cafe = 'มีร้านคาเฟ่มาก (มีมากกว่า 10 ร้าน)';
                }

                if (data.att_security == 1) {
                    att_security = 'มีบริการด้านความปลอดภัยน้อยมาก (1-2 นาย)';
                } else if (data.att_security == 2) {
                    att_security = 'มีบริการด้านความปลอดภัยน้อย (ตำรวจท้องที่, รปภ. มากกว่า 3-5 นาย)';
                } else if (data.att_security == 3) {
                    att_security = 'มีบริการด้านความปลอดภัยปานกลาง (ตำรวจท้องที่, รปภ. มากกว่า 7-9 นาย)';
                } else {
                    att_security = 'มีบริการด้านความปลอดภัยมาก (ตำรวจท้องที่, รปภ. มากกว่า 10 นาย)';
                }

                if (data.att_hospital == 1) {
                    att_hospital = 'ไม่ใกล้โรงพยาบาล (ห่างจากจุดท่องเที่ยว 10 กม.)';
                } else if (data.att_hospital == 2) {
                    att_hospital = 'ใกล้โรงพยาบาลน้อย (ห่างจากจุดท่องเที่ยว 7-9 กม.)';
                } else if (data.att_hospital == 3) {
                    att_hospital = 'ใกล้โรงพยาบาลปานกลาง (ห่างจากจุดท่องเที่ยว 4-6 กม.)';
                } else {
                    att_hospital = 'ใกล้โรงพยาบาลมาก (ห่างจากจุดท่องเที่ยว 1-3 กม.)';
                }

                if (data.att_police == 1) {
                    att_police = 'ไม่ใกล้สถานีตำรวจ (ห่างจากจุดท่องเที่ยว 10 กม.)';
                } else if (data.att_police == 2) {
                    att_police = 'ใกล้สถานีตำรวจน้อย (ห่างจากจุดท่องเที่ยว 7-9 กม.)';
                } else if (data.att_police == 3) {
                    att_police = 'ใกล้สถานีตำรวจปานกลาง (ห่างจากจุดท่องเที่ยว 4-6 กม.)';
                } else {
                    att_police = 'ใกล้สถานีตำรวจมาก (ห่างจากจุดท่องเที่ยว 1-3 กม.)';
                }

                if (data.att_parking == 1) {
                    att_parking = 'มีที่จอดรถน้อยมาก (มี 1-2 คัน)';
                } else if (data.att_parking == 2) {
                    att_parking = 'มีที่จอดรถน้อย (จอดได้ 3-5 คัน)';
                } else if (data.att_parking == 3) {
                    att_parking = 'มีที่จอดรถปานกลาง (จอดได้ 7-9 คัน)';
                } else {
                    att_parking = 'มีที่จอดรถมาก (จอดได้มากกว่า 10 คัน)';
                }



                html = `
                <div class="col-lg-10 col-12">
                    <div class="single-blog-area text-center mb-100 wow fadeInUpBig" data-wow-delay="100ms" data-wow-duration="1s">
                        <div class="blog-thumbnail mb-100">
                            <img src="WEB_SYSTEM/dist/img/attractions/${data.att_image}" alt="">
                        </div>
                        <div class="blog-content">
                            <span></span>
                            <h2>${data.att_name} (ยอดผู้เข้าชม : ${data.att_views})</h2>
                            <a href="javascript:void(0)" class="post-date">${data.att_created}</a>
                            <a href="javascript:void(0)" class="post-author">นางสาว ธัญญารัตน์ โลตุฤทธิ์</a>
                            <p>${data.att_description}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-12">
                    <div class="single-blog-area text-center mb-100 wow fadeInUpBig" data-wow-delay="100ms" data-wow-duration="1s">
                        <div class="blog-content">
                            <span></span>
                            <h2>รายละเอียดสถานที่</h2>
                        </div>
                        <li>${att_convenience}</li>
                        <li>${att_cafe}</li>
                        <li>${att_parking}</li>
                        <li>${att_restaurant}</li>
                        <li>${att_hospital}</li>
                        <li>${att_security}</li>
                        <li>${att_cost}</li>
                        <li>${att_transfer}</li>
                        <li>${att_hotel}</li>       
                        <li>${att_police}</li>
                    </div>
                </div>
                <div class="col-lg-10 col-12">
                    <div class="single-blog-area text-center mb-100 wow fadeInUpBig" data-wow-delay="100ms" data-wow-duration="1s">
                        <div class="blog-content">
                            <span></span>
                            <h2>บทความ</h2>
                        </div>
                        ${data.att_article}
                    </div>
                </div>
                <div class="col-lg-10 col-12">
                    <div class="single-blog-area text-center mb-100 wow fadeInUpBig" data-wow-delay="100ms" data-wow-duration="1s">
                        <div class="blog-content">
                            <span></span>
                            <h2>แผนที่</h2>
                            <div class="map-responsive">
                                ${data.att_google_map}
                            </div>
                        </div>
                    </div>
                </div>`;

                html += '<div class="col-lg-10 col-12"><div class="row">';

                image.forEach(element => {
                    html += `
                        <div class="col-lg-4 col-12">
                            <div class="single-blog-area text-center mb-30 wow fadeInUpBig" data-wow-delay="100ms" data-wow-duration="1s">
                                <a href="WEB_SYSTEM/dist/img/attractions/${element.img_file}" class="blog-thumbnail">
                                    <img src="WEB_SYSTEM/dist/img/attractions/${element.img_file}" class="img-responsive fit-image" alt="">
                                </a>
                            </div>
                        </div>
                    `
                });

                html += "</div></div>";
                html += `
                
                `;

                $('#showDetail').html(html);
            }).fail(function(res) {
                console.log(res);
            });
        }

        function updateViews() {
            $.ajax({
                type: "post",
                url: "services/updateViews.php",
                data: {
                    "update_id": att_id095
                },
                success: function(res) {
                    console.log(res);
                }
            });
        }
    </script>
</head>

<body onload="loadWebsite(),loadAtt(),updateViews()">
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

    <!-- Blog Area Start -->
    <section class="blog-area section_padding_100 mt-100">
        <div class="container">
            <div class="row justify-content-center" id="showDetail">
            </div>
        </div>
    </section>
    <!-- Blog Area End -->

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