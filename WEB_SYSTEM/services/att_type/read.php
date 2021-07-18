<?php

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    require_once('../db_config.php');

    if (isset($_GET['getdata'])) {
        $sql = "SELECT * FROM attraction_types WHERE att_type_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['getdata']]);
        $row = $stmt->fetchObject();

        http_response_code(200);
        echo json_encode(['status' => 200, 'message' => "โหลดข้อมูลประเภท $row->att_type_name สำเร็จ", 'data' => $row]);
    } else {
        $sql = "SELECT * FROM attraction_types ORDER BY att_type_created DESC";
        $stmt = $pdo->query($sql);
        $row = $stmt->fetchAll();

        echo json_encode(['status' => 200, 'message' => 'โหลดข้อมูลประเภทสถานที่ท่องเที่ยวสำเร็จ', 'data' => $row]);
    }
} else {
    http_response_code(405);
}
