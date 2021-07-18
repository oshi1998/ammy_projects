<?php if (!isset($_GET['register'])) require_once('permissions/login_access.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยินดีต้อนรับ</title>

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Ammy Thanyarat095">

    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--===============================================================================================-->
    <link rel="icon" href="">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/css/util.css" />
    <link rel="stylesheet" type="text/css" href="dist/css/main.css" />
    <!--===============================================================================================-->

    <script>
        function loadWebsite() {
            $.ajax({
                type: "get",
                url: "WEB_SYSTEM/services/website/read.php"
            }).done(function(res) {
                //console.log(res);
                $('.login100-form-title').text(res.data['web_name']);
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

<body style="background-color: #666666" onload="loadWebsite()">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <?php if (!isset($_GET['register'])) : ?>
                    <form id="loginForm" class="login100-form validate-form">
                        <span class="login100-form-title p-b-43"></span>

                        <div class="wrap-input100 validate-input" data-validate="กรุณากรอกชื่อผู้ใช้งาน">
                            <input class="input100" type="text" name="username" />
                            <span class="focus-input100"></span>
                            <span class="label-input100">ชื่อผู้ใช้งาน</span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="กรุณากรอกรหัสผ่าน">
                            <input class="input100" type="password" name="password" />
                            <span class="focus-input100"></span>
                            <span class="label-input100">รหัสผ่าน</span>
                        </div>

                        <div class="container-login100-form-btn p-t-3">
                            <button class="login100-form-btn">เข้าสู่ระบบ</button>
                        </div>
                        <div class="text-center p-t-46 p-b-20">
                            <a href="?register" class="txt2">ไม่ได้เป็นสมาชิก? ลงทะเบียนใช้งานคลิก</a>
                        </div>
                    </form>
                <?php else : ?>
                    <form id="registerForm" class="login100-form validate-form">
                        <span class="login100-form-title p-b-43"></span>

                        <div class="wrap-input100 validate-input" data-validate="กรุณากรอกชื่อผู้ใช้งาน">
                            <input class="input100" type="text" name="mem_username" />
                            <span class="focus-input100"></span>
                            <span class="label-input100">ชื่อผู้ใช้งาน</span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="กรุณากรอกชื่อจริง">
                            <input class="input100" type="text" name="mem_firstname" />
                            <span class="focus-input100"></span>
                            <span class="label-input100">ชื่อจริง</span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="กรุณากรอกนามสกุล">
                            <input class="input100" type="text" name="mem_lastname" />
                            <span class="focus-input100"></span>
                            <span class="label-input100">นามสกุล</span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="กรุณากรอกรหัสผ่าน">
                            <input class="input100" type="password" name="mem_password" />
                            <span class="focus-input100"></span>
                            <span class="label-input100">รหัสผ่าน</span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="กรุณากรอกอีเมล: ex@abc.xyz">
                            <input class="input100" type="email" name="mem_email" />
                            <span class="focus-input100"></span>
                            <span class="label-input100">อีเมล</span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="กรุณากรอกเบอร์โทร">
                            <input class="input100" type="text" pattern="\d*" minlength="10" maxlength="10" name="mem_phone" />
                            <span class="focus-input100"></span>
                            <span class="label-input100">เบอร์โทร</span>
                        </div>

                        <div class="container-login100-form-btn p-t-3">
                            <button class="login100-form-btn">ลงทะเบียน</button>
                        </div>
                        <div class="text-center p-t-46 p-b-20">
                            <a href="index.php" class="txt2">กลับไปหน้าล็อกอิน</a>
                        </div>
                    </form>
                <?php endif ?>
                <div class="login100-more" style="background-image: url('dist/img//bg-img/1.jpg')"></div>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="dist/js/main.js"></script>


    <script>
        $('#registerForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "post",
                url: "services/register.php",
                data: $(this).serialize()
            }).done(function(res) {
                console.log(res);
                swal({
                    title: "สำเร็จ!",
                    text: res.message,
                    icon: "success",
                }).then((action) => {
                    window.location = 'home.php';
                });
            }).fail(function(res) {
                console.log(res);
                swal({
                    title: "ล้มเหลว!",
                    text: res.responseJSON['message'],
                    icon: "error",
                });
            });
        });

        $('#loginForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "post",
                url: "services/login.php",
                data: $(this).serialize()
            }).done(function(res) {
                console.log(res);
                window.location = 'home.php';
            }).fail(function(res) {
                console.log(res);
                swal({
                    title: "ล้มเหลว!",
                    text: res.responseJSON['message'],
                    icon: "error",
                });
            });
        });
    </script>
</body>

</html>