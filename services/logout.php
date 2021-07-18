<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){

    session_start();

    unset($_SESSION['MEMBER_LOGIN']);
    unset($_SESSION['MEMBER_USERNAME']);

    http_response_code(200);
    echo json_encode(['status'=>200,'message'=>'ออกจากระบบสำเร็จ']);
}