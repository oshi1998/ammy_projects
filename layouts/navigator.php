<header class="header-area <?php if ($_SERVER['REQUEST_URI'] != "/webdevelopment/ammy_projects/home.php") echo "bg-img" ?>" style="<?= ($_SERVER['REQUEST_URI'] != "/webdevelopment/ammy_projects/home.php") ? "background-image: url(dist/img/bg-img/5.jpg);" : "background-color: rgba(0, 0, 0, 0.5);" ?>">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 h-100">
                <div class="main-menu h-100">
                    <nav class="navbar h-100 navbar-expand-lg">
                        <!-- Logo Area  -->
                        <a class="navbar-brand" href="home.php">

                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#studioMenu" aria-controls="studioMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>

                        <div class="collapse navbar-collapse" id="studioMenu">
                            <!-- Menu Area Start  -->
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="home.php">หน้าหลัก <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php">เกี่ยวกับเรา <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="place.php">แนะนำสถานที่ท่องเที่ยว <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target=".contact-modal-lg">แบบฟอร์มตัดสินใจ TOPSIS <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['MEMBER_USERNAME'] ?></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="logOut()">ออกจากระบบ</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="contact-popup-form" id="contact-modal-lg">
    <div class="modal fade contact-modal-lg" tabindex="-1" role="dialog" aria-labelledby="contact-modal-lg" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="contact-heading-text text-center mb-30">
                                <span></span>
                                <h2>แบบฟอร์มสำหรับการตัดสินใจเลือกสถานที่ท่องเที่ยว (TOPSIS)</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact Form Area -->
                <div class="contact-form-area">
                    <div class="container-fluid">
                        <form id="topsisForm">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="att_convenience">การเข้าถึงสถานที่</label>
                                        <select class="form-control" name="att_convenience" id="att_convenience">
                                            <option value="1">ไม่สะดวก (ห่างจากถนนเส้นหลักมากกว่า 10 กม.)</option>
                                            <option value="2">สะดวกน้อย (ห่างจากถนนเส้นหลัก 7-9 กม.)</option>
                                            <option value="3">สะดวกปานกลาง (ห่างจากถนนเส้นหลัก 4-6 กม.)</option>
                                            <option value="4">สะดวกมาก (ห่างจากถนนเส้นหลัก 1-3 กม.)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="att_cafe">มีร้านกาแฟ,คาเฟ่ บริเวณใกล้เคียง</label>
                                        <select class="form-control" name="att_cafe" id="att_cafe">
                                            <option value="1">มีน้อยมาก (มี 1-2 ร้าน)</option>
                                            <option value="2">มีน้อย (มี 3-5 ร้าน)</option>
                                            <option value="3">มีปานกลาง (มี 7-9 ร้าน)</option>
                                            <option value="4">มีมาก (มีมากกว่า 10 ร้าน)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="att_parking">ที่จอดรถ</label>
                                        <select class="form-control" name="att_parking" id="att_parking">
                                            <option value="1">มีน้อยมาก (มี 1-2 คัน)</option>
                                            <option value="2">มีน้อย (จอดได้ 3-5 คัน)</option>
                                            <option value="3">มีปานกลาง (จอดได้ 7-9 คัน)</option>
                                            <option value="4">มีมาก (จอดได้มากกว่า 10 คัน)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="att_restaurant">ร้านอาหารบริเวณสถานที่ท่องเที่ยว</label>
                                        <select class="form-control" name="att_restaurant" id="att_restaurant">
                                            <option value="1">มีน้อยมาก (มี 1-2 ร้าน)</option>
                                            <option value="2">มีน้อย (มี 3-5 ร้าน)</option>
                                            <option value="3">มีปานกลาง (มี 7-9 ร้าน)</option>
                                            <option value="4">มีมาก (มี มากกว่า 10 ร้าน)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="att_hotel">บริการที่พักโรงแรม</label>
                                        <select class="form-control" name="att_hotel" id="att_hotel">
                                            <option value="1">มีน้อยมาก (1-2 ที่)</option>
                                            <option value="2">มีน้อย (มี 3-5 ที่)</option>
                                            <option value="3">มีปานกลาง (มี 7-9 ที่)</option>
                                            <option value="4">มีมาก (มีมากกว่า 10 ที่)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="att_security">บริการด้านความปลอดภัย</label>
                                        <select class="form-control" name="att_security" id="att_security">
                                            <option value="1">มีน้อยมาก (1-2 นาย)</option>
                                            <option value="2">มีน้อย (ตำรวจท้องที่, รปภ. มากกว่า 3-5 นาย)</option>
                                            <option value="3">มีปานกลาง (ตำรวจท้องที่, รปภ. มากกว่า 7-9 นาย)</option>
                                            <option value="4">มีมาก (ตำรวจท้องที่, รปภ. มากกว่า 10 นาย)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="att_cost">ค่าใช้จ่าย</label>
                                        <select class="form-control" name="att_cost">
                                            <option value="1">น้อยมาก (100-500 บาท)</option>
                                            <option value="2">น้อย (1,000-500 บาท)</option>
                                            <option value="3">ปานกลาง (1,000-5,000 บาท)</option>
                                            <option value="4">มาก (มากกว่า 5,000 บาท)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="att_transfer">บริการรถรับส่ง</label>
                                        <select class="form-control" name="att_transfer" id="att_transfer">
                                            <option value="1">มีน้อยมาก (1-2 รอบ/วัน)</option>
                                            <option value="2">มีน้อย (3-5 รอบ/วัน)</option>
                                            <option value="3">มีปานกลาง (มี 7-9 รอบ/วัน)</option>
                                            <option value="4">มีมาก (มากกว่า 10 รอบ/วัน)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="att_hospital">อยู่ใกล้โรงพยาบาล</label>
                                        <select class="form-control" name="att_hospital" id="att_hospital">
                                            <option value="1">ไม่ใกล้ (ห่างจากจุดท่องเที่ยว 10 กม.)</option>
                                            <option value="2">ใกล้น้อย (ห่างจากจุดท่องเที่ยว 7-9 กม.)</option>
                                            <option value="3">ใกล้ปานกลาง (ห่างจากจุดท่องเที่ยว 4-6 กม.)</option>
                                            <option value="4">ใกล้มาก (ห่างจากจุดท่องเที่ยว 1-3 กม.)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="att_police">อยู่ใกล้สถานีตำรวจ</label>
                                        <select class="form-control" name="att_police" id="att_police">
                                            <option value="1">ไม่ใกล้ (ห่างจากจุดท่องเที่ยว 10 กม.)</option>
                                            <option value="2">ใกล้น้อย (ห่างจากจุดท่องเที่ยว 7-9 กม.)</option>
                                            <option value="3">ใกล้ปานกลาง (ห่างจากจุดท่องเที่ยว 4-6 กม.)</option>
                                            <option value="4">ใกล้มาก (ห่างจากจุดท่องเที่ยว 1-3 กม.)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn studio-btn mt-3">
                                    <span>ค้นหาทันที</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function logOut() {
        $.ajax({
            type: "get",
            url: "services/logout.php",
            success: function(res) {
                console.log(res);
                window.location = 'index.php';
            }
        });
    }
</script>