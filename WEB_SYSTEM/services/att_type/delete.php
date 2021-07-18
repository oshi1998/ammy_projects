<?php

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    require_once('../db_config.php');

    $sql = "DELETE FROM attraction_types WHERE att_type_id=?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$_GET['id_delete']])) {
        http_response_code(200);
        echo json_encode(['status' => 200, 'message' => "ลบข้อมูล $_GET[id_delete] สำเร็จ"]);
    } else {
        http_response_code(412);
        echo json_encode(['status' => 412, 'message' => 'ไม่สามารถลบข้อมูลได้ เนื่องจากประเภทสถานที่นี้ มีข้อมูลสถานที่อยู่']);
    }
} else {
    http_response_code(405);
}
