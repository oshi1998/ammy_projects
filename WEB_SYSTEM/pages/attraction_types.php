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
    <title>จัดการข้อมูลประเภทสถานที่ท่องเที่ยว | ระบบจัดการข้อมูลหลังบ้าน</title>
    <!-- Icon -->
    <link rel="icon" href="../dist/img/logo.png" type="image/x-icon" />
    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                            <h1 class="m-0">จัดการข้อมูลประเภทสถานที่ท่องเที่ยว</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard.php">แดชบอร์ด</a></li>
                                <li class="breadcrumb-item active">ประเภทสถานที่ท่องเที่ยว</li>
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
                                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#createModal">
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
                                                <th>ชื่อประเภท</th>
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
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">แบบฟอร์มเพิ่มข้อมูลประเภทสถานที่ท่องเที่ยว</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="createForm">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="att_type_name">ชื่อประเภท</label>
                                <input type="text" class="form-control" name="att_type_name" id="att_type_name" autocomplete="off" required>
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
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">แบบฟอร์มอัพเดตข้อมูลประเภทสถานที่ท่องเที่ยว</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="updateForm">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="att_type_id">รหัสประเภท</label>
                                <input type="text" class="form-control" name="att_type_id" id="upd_att_type_id" autocomplete="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="att_type_name">ชื่อประเภท</label>
                                <input type="text" class="form-control" name="att_type_name" id="upd_att_type_name" autocomplete="off" required>
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
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        $.ajax({
            type: "get",
            url: "../services/att_type/read.php",
        }).done(function(res) {
            console.log(res);

            let data = res.data;
            let html;

            data.forEach(element => {
                html += `
                    <tr>
                        <td>${element.att_type_id}</td>
                        <td>${element.att_type_name}</td>
                        <td>
                            <button class="btn btn-primary btn-md editBtn" id="${element.att_type_id}">แก้ไข</button>
                            <button class="btn btn-danger btn-md deleteBtn" id="${element.att_type_id}">ลบ</button>
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


        $('#createForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "post",
                url: "../services/att_type/create.php",
                data: $(this).serialize()
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

        $('#databody').on('click', '.editBtn', function() {

            let att_type_id095 = $(this).attr('id');

            $.ajax({
                type: "get",
                url: "../services/att_type/read.php",
                data: {
                    "getdata": att_type_id095
                }
            }).done(function(res) {
                console.log(res);

                $('#upd_att_type_id').val(res.data['att_type_id']);
                $('#upd_att_type_name').val(res.data['att_type_name']);
                $('#updateModal').modal('show');
            }).fail(function(res) {
                console.log(res);
            });
        });

        $('#updateForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "post",
                url: "../services/att_type/update.php",
                data: $(this).serialize()
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

            let att_type_id095 = $(this).attr('id');

            swal({
                    title: "คุณต้องการลบข้อมูล " + att_type_id095 + "?",
                    text: "หากทำการลบไปแล้ว จะไม่สามารถกู้ข้อมูลคืนได้!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "get",
                            url: "../services/att_type/delete.php",
                            data: {
                                "id_delete": att_type_id095
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