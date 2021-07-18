<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once('../db_config.php');

    $sql = "SELECT att_type_name FROM attraction_types WHERE att_type_name=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['att_type_name']]);
    $row = $stmt->fetchAll();

    if (!empty($row)) {
        http_response_code(412);
        echo json_encode(['status' => 412, 'message' => "ชื่อประเภท $_POST[att_type_name] ถูกใช้งานแล้ว กรุณาเปลี่ยนใหม่"]);
    } else {

        $sql = "INSERT INTO attraction_types (att_type_name) VALUES (?)";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$_POST['att_type_name']])) {
            http_response_code(200);
            echo json_encode(['status' => 200, 'message' => 'เพิ่มข้อมูลประเภทสถานที่ท่องเที่ยวสำเร็จ']);
        } else {
            http_response_code(412);
            echo json_encode(['status' => 412, 'message' => 'เพิ่มข้อมูลไม่สำเร็จ เนื่องจากข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง']);
        }
    }
} else {
    http_response_code(405);
}
