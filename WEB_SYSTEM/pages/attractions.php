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
    <title>จัดการข้อมูลสถานที่ท่องเที่ยว | ระบบจัดการข้อมูลหลังบ้าน</title>
    <!-- Icon -->
    <link rel="icon" href="../dist/img/logo.png" type="image/x-icon" />
    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
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
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">จัดการข้อมูลสถานที่ท่องเที่ยว</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">แดชบอร์ด</a></li>
                                <li class="breadcrumb-item active">สถานที่ท่องเที่ยว</li>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <button type="button" class="btn btn-outline-success" id="createBtn" data-toggle="modal" data-target="#createModal">
                                            <i class="fas fa-plus"></i>
                                            <span>เพิ่มข้อมูล</span>
                                        </button>
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="dataTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>รหัส</th>
                                                <th>ประเภท</th>
                                                <th>ชื่อสถานที่</th>
                                                <th>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody id="databody">
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <div class="modal fade" id="createModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">แบบฟอร์มเพิ่มข้อมูลสถานที่ท่องเที่ยว</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="createForm" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="att_type_id">ประเภทสถานที่ท่องเที่ยว</label>
                                        <select class="form-control" name="att_type_id" id="att_type_id" required>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="att_name">ชื่อสถานที่</label>
                                        <input type="text" class="form-control" name="att_name" id="att_name" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="att_description">คำอธิบายสถานที่</label>
                                        <textarea class="form-control" name="att_description" id="att_description" autocomplete="off" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="att_article">บทความเกี่ยวกับสถานที่ท่องเที่ยว (คลิก <i class="fas fa-expand-arrows-alt"></i> ขยายหน้าจอเพื่อความสะดวก)</label>
                                        <textarea name="att_article" id="att_article"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="att_image">รูปภาพหลักสถานที่</label><br>
                                        <input class="form-control" type="file" name="att_image" id="att_image" accept="image/*" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="img_file">รูปภาพสถานที่อื่นๆ</label>
                                        <input class="form-control" type="file" name="img_file[]" id="img_file" accept="image/*" multiple required>
                                    </div>
                                    <div class="form-group">
                                        <label for="att_google_map">โค้ดแสดงแผนที่ Google Map</label>
                                        <textarea class="form-control" name="att_google_map" id="att_google_map"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="att_cost">ค่าใช้จ่ายสถานที่</label>
                                        <input type="number" class="form-control" name="att_cost" id="att_cost" min="500" autocomplete="off" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="att_convenience">การเข้าถึงสถานที่</label>
                                                <select class="form-control" name="att_convenience" id="att_convenience">
                                                    <option value="0">ไม่สะดวก</option>
                                                    <option value="1">สะดวก</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="att_restaurant">ร้านอาหารบริเวณสถานที่ท่องเที่ยว</label>
                                                <select class="form-control" name="att_restaurant" id="att_restaurant">
                                                    <option value="0">ไม่มี</option>
                                                    <option value="1">มี</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="att_transfer">บริการรถรับส่ง</label>
                                                <select class="form-control" name="att_transfer" id="att_transfer">
                                                    <option value="0">ไม่มี</option>
                                                    <option value="1">มี</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="att_hotel">บริการที่พักโรงแรม</label>
                                                <select class="form-control" name="att_hotel" id="att_hotel">
                                                    <option value="0">ไม่มี</option>
                                                    <option value="1">มี</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="att_cafe">มีร้านกาแฟ,คาเฟ่ บริเวณใกล้เคียง</label>
                                                <select class="form-control" name="att_cafe" id="att_cafe">
                                                    <option value="0">ไม่มี</option>
                                                    <option value="1">มี</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="att_security">บริการด้านความปลอดภัย</label>
                                                <select class="form-control" name="att_security" id="att_security">
                                                    <option value="0">ไม่มี</option>
                                                    <option value="1">มี</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="att_hospital">อยู่ใกล้โรงพยาบาล</label>
                                                <select class="form-control" name="att_hospital" id="att_hospital">
                                                    <option value="0">ไม่ใกล้</option>
                                                    <option value="1">ใกล้</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="att_police">อยู่ใกล้สถานีตำรวจ</label>
                                                <select class="form-control" name="att_police" id="att_police">
                                                    <option value="0">ไม่ใกล้</option>
                                                    <option value="1">ใกล้</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="att_parking">ที่จอดรถ</label>
                                                <select class="form-control" name="att_parking" id="att_parking">
                                                    <option value="0">ไม่มี</option>
                                                    <option value="1">มี</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="updateModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">แบบฟอร์มอัพเดตข้อมูลสถานที่ท่องเที่ยว</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateForm" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="att_id">รหัสสถานที่</label>
                                        <input type="text" class="form-control" name="att_id" id="upd_att_id" autocomplete="off" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="att_type_id">ประเภทสถานที่ท่องเที่ยว</label>
                                        <select class="form-control" name="att_type_id" id="upd_att_type_id" required>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="att_name">ชื่อสถานที่</label>
                                        <input type="text" class="form-control" name="att_name" id="upd_att_name" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="att_description">คำอธิบายสถานที่</label>
                                        <textarea class="form-control" name="att_description" id="upd_att_description" autocomplete="off" required></textarea>
                                    </div>
                                    <div class="form-group" id="show_upd_att_article">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="att_image">รูปภาพหลักสถานที่</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">ไฟล์รูปภาพเดิม</div>
                                            </div>
                                            <input class="form-control" type="text" name="att_old_image" id="att_old_image" readonly>
                                        </div>
                                        <input class="form-control" type="file" name="att_image" id="upd_att_image" accept="image/*">
                                    </div>
                                    <div class="form-group">
                                        <label for="img_file">รูปภาพสถานที่อื่นๆ</label><br>
                                        <div id="preview_other_img">
                                        </div>
                                        <input class="form-control" type="file" name="img_file[]" id="upd_img_file" accept="image/*" multiple>
                                        <div class="form-group">
                                            <label for="att_google_map">โค้ดแสดงแผนที่ Google Map</label>
                                            <textarea class="form-control" name="att_google_map" id="upd_att_google_map"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="att_cost">ค่าใช้จ่ายสถานที่</label>
                                            <input type="number" class="form-control" name="att_cost" id="upd_att_cost" min="500" autocomplete="off" required>
                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="att_convenience">การเข้าถึงสถานที่</label>
                                                    <select class="form-control" name="att_convenience" id="upd_att_convenience">
                                                        <option value="0">ไม่สะดวก</option>
                                                        <option value="1">สะดวก</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="att_restaurant">ร้านอาหารบริเวณสถานที่ท่องเที่ยว</label>
                                                    <select class="form-control" name="att_restaurant" id="upd_att_restaurant">
                                                        <option value="0">ไม่มี</option>
                                                        <option value="1">มี</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="att_transfer">บริการรถรับส่ง</label>
                                                    <select class="form-control" name="att_transfer" id="upd_att_transfer">
                                                        <option value="0">ไม่มี</option>
                                                        <option value="1">มี</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="att_hotel">บริการที่พักโรงแรม</label>
                                                    <select class="form-control" name="att_hotel" id="upd_att_hotel">
                                                        <option value="0">ไม่มี</option>
                                                        <option value="1">มี</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="att_cafe">มีร้านกาแฟ,คาเฟ่ บริเวณใกล้เคียง</label>
                                                    <select class="form-control" name="att_cafe" id="upd_att_cafe">
                                                        <option value="0">ไม่มี</option>
                                                        <option value="1">มี</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="att_security">บริการด้านความปลอดภัย</label>
                                                    <select class="form-control" name="att_security" id="upd_att_security">
                                                        <option value="0">ไม่มี</option>
                                                        <option value="1">มี</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="att_hospital">อยู่ใกล้โรงพยาบาล</label>
                                                    <select class="form-control" name="att_hospital" id="upd_att_hospital">
                                                        <option value="0">ไม่ใกล้</option>
                                                        <option value="1">ใกล้</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="att_police">อยู่ใกล้สถานีตำรวจ</label>
                                                    <select class="form-control" name="att_police" id="upd_att_police">
                                                        <option value="0">ไม่ใกล้</option>
                                                        <option value="1">ใกล้</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="att_parking">ที่จอดรถ</label>
                                                    <select class="form-control" name="att_parking" id="upd_att_parking">
                                                        <option value="0">ไม่มี</option>
                                                        <option value="1">มี</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                            </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Include footer file -->
        <?php include_once('layouts/footer.php') ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Summernote -->
    <script src="../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {

        $.ajax({
            type: "get",
            url: "../services/att/read.php",
        }).done(function(res) {
            console.log(res);

            let data = res.data;
            let html;

            data.forEach(element => {
                html += `
                    <tr>
                        <td>${element.att_id}</td>
                        <td>${element.att_type_name}</td>
                        <td>${element.att_name}</td>
                        <td>
                            <button class="btn btn-primary btn-md editBtn" id="${element.att_id}">แก้ไข</button>
                            <button class="btn btn-danger btn-md deleteBtn" id="${element.att_id}">ลบ</button>
                        </td>
                    </tr>
                    `
            });

            $('#databody').html(html);

            $('#dataTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

        }).fail(function(res) {
            console.log(res);
        });

        $('#createBtn').click(function() {

            $('#att_article').summernote({
                dialogsInBody: true,
            });

            $.ajax({
                type: "get",
                url: "../services/att_type/read.php",
            }).done(function(res) {
                console.log(res);
                let data = res.data;
                let html = "";

                html = '<option value="" selected disabled>---- กรุณาเลือกประเภทสถานที่ท่องเที่ยว ----</option>';

                data.forEach(element => {
                    html += `<option value="${element.att_type_id}">${element.att_type_name}</option>`
                });

                $('#att_type_id').html(html);
            }).fail(function(res) {
                console.log(res);
            });
        });


        $('#createForm').submit(function(e) {
            e.preventDefault();

            let fd = new FormData(this);
            console.log(fd);

            $.ajax({
                type: "post",
                url: "../services/att/create.php",
                data: fd,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(res) {
                console.log(res);
                swal({
                    title: "สำเร็จ!",
                    text: res.message,
                    icon: "success",
                }).then((action) => {
                    window.location.reload();
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

        $('#updateModal').on('hidden.bs.modal', function() {
            console.log('close...');
        });

        $('#databody').on('click', '.editBtn', function() {

            let att_id095 = $(this).attr('id');

            $('#show_upd_att_article').html("");
            $('#show_upd_att_article').html(`
            <label for="att_article">บทความเกี่ยวกับสถานที่ท่องเที่ยว (คลิก <i class="fas fa-expand-arrows-alt"></i> ขยายหน้าจอเพื่อความสะดวก)</label>
            <textarea name="att_article" id="upd_att_article"></textarea>
            `);

            $.ajax({
                type: "get",
                url: "../services/att/read.php",
                data: {
                    "getdata": att_id095
                }
            }).done(function(res) {

                console.log(res);

                $.ajax({
                    type: "get",
                    url: "../services/att_type/read.php",
                    success: function(type_res) {
                        let type_data = type_res.data;
                        let html = "";

                        type_data.forEach(element => {
                            html += `<option value="${element.att_type_id}">${element.att_type_name}</option>`
                        });

                        $('#upd_att_type_id').html(html);
                        $('#upd_att_type_id').val(res.data['att_type_id']);
                    }
                });
                $('#upd_att_id').val(res.data['att_id']);
                $('#upd_att_name').val(res.data['att_name']);
                $('#upd_att_description').val(res.data['att_description']);
                $('#upd_att_article').val(res.data['att_article']);
                $('#att_old_image').val(res.data['att_image']);
                $('#upd_att_google_map').val(res.data['att_google_map']);
                $('#upd_att_cost').val(res.data['att_cost']);
                $('#upd_att_convenience').val(res.data['att_convenience']);
                $('#upd_att_restaurant').val(res.data['att_restaurant']);
                $('#upd_att_transfer').val(res.data['att_transfer']);
                $('#upd_att_hotel').val(res.data['att_hotel']);
                $('#upd_att_cafe').val(res.data['att_cafe']);
                $('#upd_att_security').val(res.data['att_security']);
                $('#upd_att_hospital').val(res.data['att_hospital']);
                $('#upd_att_police').val(res.data['att_police']);
                $('#upd_att_parking').val(res.data['att_parking']);

                let images = res.image;
                let no = 1;
                html = "";
                images.forEach(element => {
                    html += `
                    <div class="input-group" id="img_old_file${element.img_id}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">ไฟล์รูปภาพเดิม ${no++}</div>
                        </div>
                        <input class="form-control" type="text" name="img_file${element.img_id}" id="img_file${element.img_id}" value="${element.img_file}" readonly>
                        <button type="button" class="btn btn-danger align-items-end remove_img_file" id="${element.img_id}" file="${element.img_file}">ลบ</button>
                     </div>
                     `
                });

                $('#preview_other_img').html(html);

                $('#upd_att_article').summernote({
                    dialogsInBody: true,
                });

                $('#updateModal').modal('show');
            }).fail(function(res) {
                console.log(res);
            });
        });

        $('#updateForm').on('click', '.remove_img_file', function() {

            let img_id095 = $(this).attr('id');
            let img_file095 = $(this).attr('file');

            swal({
                    title: "คุณต้องการลบรูปภาพนี้?",
                    text: "หากทำการลบไปแล้ว จะไม่สามารถกู้ข้อมูลคืนได้!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "get",
                            url: "../services/att/delete.php",
                            data: {
                                "img_delete": img_id095,
                                "img_file": img_file095
                            }
                        }).done(function(res) {
                            console.log(res);
                            $('#img_old_file' + img_id095).remove();
                            return;
                        }).fail(function(res) {
                            console.log(res);
                            swal({
                                title: "ล้มเหลว!",
                                text: res.responseJSON['message'],
                                icon: "error",
                            });
                        });
                    } else {
                        return;
                    }
                });
        });

        $('#updateForm').submit(function(e) {
            e.preventDefault();

            let fd = new FormData(this);

            $.ajax({
                type: "post",
                url: "../services/att/update.php",
                data: fd,
                cache: false,
                contentType: false,
                processData: false
            }).done(function(res) {
                console.log(res);
                swal({
                    title: "สำเร็จ!",
                    text: res.message,
                    icon: "success",
                }).then((action) => {
                    window.location.reload();
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

        $('#databody').on('click', '.deleteBtn', function() {

            let att_id095 = $(this).attr('id');

            swal({
                    title: "คุณต้องการลบข้อมูล " + att_id095 + "?",
                    text: "หากทำการลบไปแล้ว จะไม่สามารถกู้ข้อมูลคืนได้!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "get",
                            url: "../services/att/delete.php",
                            data: {
                                "id_delete": att_id095
                            }
                        }).done(function(res) {
                            console.log(res);
                            swal({
                                title: "สำเร็จ!",
                                text: res.message,
                                icon: "success",
                            }).then((action) => {
                                window.location.reload();
                            });
                        }).fail(function(res) {
                            console.log(res);
                            swal({
                                title: "ล้มเหลว!",
                                text: res.responseJSON['message'],
                                icon: "error",
                            });
                        });
                    } else {
                        return;
                    }
                });
        });
    });
</script>