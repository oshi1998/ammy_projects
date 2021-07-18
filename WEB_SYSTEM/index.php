<?php require_once('permissions/checkAdmin.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบจัดการข้อมูลหลังบ้าน</title>
    <!-- Icon -->
    <link rel="icon" href="dist/img/logo.png" type="image/x-icon" />
    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <script>
        function loadWebsite() {
            $.ajax({
                type: "get",
                url: "services/website/read.php",
                success: function(res) {
                    console.log(res);
                    document.getElementById('web_name').innerText = res.data['web_name'];
                }
            });
        }
    </script>
</head>

<body class="hold-transition login-page" onload="loadWebsite()" background="dist/img/loginBG.png">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h3"><b>เข้าสู่ระบบหลังบ้าน</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg" id="web_name"></p>

                <form id="loginForm">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.login-box -->


    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {

        $('#loginForm').submit(function(e) {

            e.preventDefault();

            $.ajax({
                type: "post",
                url: "services/auth/login.php",
                data: $(this).serialize()
            }).done(function(res) {
                window.location = 'pages/dashboard.php';
            }).fail(function(res) {
                swal({
                    title: "การเข้าสู่ระบบหลังบ้านล้มเหลว!",
                    text: "ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง",
                    icon: "error",
                });
            });
        });

    });
</script>