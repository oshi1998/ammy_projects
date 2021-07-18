<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once('../db_config.php');

    $sql = "SELECT att_type_name FROM attraction_types WHERE att_type_name=? AND att_type_id NOT IN (?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['att_type_name'], $_POST['att_type_id']]);
    $row = $stmt->fetchAll();

    if (!empty($row)) {
        http_response_code(412);
        echo json_encode(['status' => 412, 'message' => "ชื่อประเภท $_POST[att_type_name] ถูกใช้งานแล้ว กรุณาเปลี่ยนใหม่"]);
    } else {
        $sql = "UPDATE attraction_types SET att_type_name=? WHERE att_type_id=?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$_POST['att_type_name'], $_POST['att_type_id']])) {
            http_response_code(200);
            echo json_encode(['status' => 200, 'message' => "อัพเดตข้อมูล $_POST[att_type_name] สำเร็จ"]);
        } else {
            http_response_code(412);
            echo json_encode(['status' => 412, 'message' => "อัพเดตข้อมูล $_POST[att_type_name] ไม่สำเร็จ"]);
        }
    }
} else {
    http_response_code(405);
}
