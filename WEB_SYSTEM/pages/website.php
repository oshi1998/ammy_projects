<?php require_once('../permissions/checkAdmin.php'); ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ตั้งค่าเว็บไซต์ | ระบบจัดการข้อมูลหลังบ้าน</title>
    <!-- Icon -->
    <link rel="icon" href="../dist/img/logo.png" type="image/x-icon" />
    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Include Navigator file -->
        <?php include_once('layouts/navigator.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <form id="websiteForm" enctype="multipart/form-data">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">ตั้งค่าเว็บไซต์ <button type="submit" class="btn btn-success btn-sm">บันทึกข้อมูล</button></h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="dashboard.php">แดชบอร์ด</a></li>
                                    <li class="breadcrumb-item active">ตั้งค่าเว็บไซต์</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="web_name">ชื่อเว็บไซต์</label>
                                            <input type="text" class="form-control" name="web_name" id="web_name" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="web_description">คำอธิบายเกี่ยวกับเว็บไซต์</label>
                                            <textarea class="form-control" name="web_description" id="web_description" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="web_keywords">คำค้นหาเว็บไซต์ (keyword1,keyword2,keyword3 เป็นต้น)</label>
                                            <textarea class="form-control" name="web_keywords" id="web_keywords" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="web_phone">เบอร์โทรศัพท์</label>
                                            <input type="text" class="form-control" name="web_phone" id="web_phone" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="web_email">อีเมล</label>
                                            <input type="text" class="form-control" name="web_email" id="web_email" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="web_logo">โลโก้</label><br>
                                            <img id="web_logo_preview" class="img-size-64">
                                            <input name="web_old_logo" id="web_old_logo" hidden>
                                            <input type="file" class="form-control" name="web_logo" id="web_logo" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </form>
        </div>
        <!-- /.content-wrapper -->

        <!-- Include footer file -->
        <?php include_once('layouts/footer.php') ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        $.ajax({
            type: "get",
            url: "../services/website/read.php",
        }).done(function(res) {
            console.log(res);
            $('#web_name').val(res.data['web_name']);
            $('#web_description').val(res.data['web_description']);
            $('#web_keywords').val(res.data['web_keywords']);
            $('#web_phone').val(res.data['web_phone']);
            $('#web_email').val(res.data['web_email']);
            $('#web_logo_preview').prop('src', '../dist/img/' + res.data['web_logo']);
            $('#web_old_logo').val(res.data['web_logo']);
        }).fail(function(res) {
            console.log(res);
        });

        $('#web_logo').change(function() {

            var file = $(this).get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#web_logo_preview").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }

        });

        $('#websiteForm').submit(function(e) {
            e.preventDefault();

            let fd = new FormData(this);
            console.log(fd);

            $.ajax({
                type: "post",
                url: "../services/website/update.php",
                data: fd,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(res) {
                console.log(res)
                swal({
                    title: "สำเร็จ!",
                    text: "อัพเดตข้อมูลเว็บไซต์สำเร็จ",
                    icon: "success",
                }).then((action) => {
                    window.location.reload();
                });
            }).fail(function(res) {
                console.log(res)
            });
        });
    });
</script>