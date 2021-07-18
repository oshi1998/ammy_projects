<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
    require_once('../db_config.php');

    unset($_SESSION['ADMIN_LOGIN']);
    unset($_SESSION['ADMIN_USERNAME']);

    http_response_code(200);
    echo json_encode(['status'=>200,'message'=>'ออกจากระบบสำเร็จ']);
}