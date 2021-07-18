<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        ระบบจัดการข้อมูลหลังบ้าน จัดทำโดย นางสาว ธัญญารัตน์ โลตุฤทธิ์
    </div>
    <!-- Default to the left -->
    <strong>ลิขสิทธิ์ &copy; 2021 <a target="_blank" href="https://www.facebook.com/ammydrii">ธัญญารัตน์ โลตุฤทธิ์</a>.</strong> ขอสงวนลิขสิทธิ์.
</footer>

<script>
    function logOut() {
        $.ajax({
            type: "get",
            url: "../services/auth/logout.php",
            success: function(res) {
                console.log(res);
                window.location = '../index.php';
            }
        });
    }
</script>