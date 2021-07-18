<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once('../db_config.php');

    $sql = "UPDATE members SET mem_firstname=?,mem_lastname=?,mem_email=?,mem_phone=? WHERE mem_username=?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$_POST['mem_firstname'], $_POST['mem_lastname'], $_POST['mem_email'], $_POST['mem_phone'], $_POST['mem_username']])) {
        http_response_code(200);
        echo json_encode(['status' => 200, 'message' => "อัพเดตข้อมูล $_POST[mem_username] สำเร็จ"]);
    } else {
        http_response_code(412);
        echo json_encode(['status' => 412, 'message' => "อัพเดตข้อมูล $_POST[mem_username] ไม่สำเร็จ"]);
    }
} else {
    http_response_code(405);
}
