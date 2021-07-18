<?php

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    require_once('../db_config.php');

    if (isset($_GET['getdata'])) {
        $sql = "SELECT * FROM attractions WHERE att_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['getdata']]);
        $row = $stmt->fetchObject();

        $sql = "SELECT img_id,img_file FROM images WHERE att_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['getdata']]);
        $images = $stmt->fetchAll();

        http_response_code(200);
        echo json_encode(['status' => 200, 'message' => "โหลดข้อมูลสถานที่ $row->att_name สำเร็จ", 'data' => $row, 'image' => $images]);
    } else {
        $sql = "SELECT att_id,att_name,att_type_name,att_image FROM attractions,attraction_types WHERE attractions.att_type_id=attraction_types.att_type_id ORDER BY att_created DESC";
        $stmt = $pdo->query($sql);
        $row = $stmt->fetchAll();

        echo json_encode(['status' => 200, 'message' => 'โหลดข้อมูลสถานที่ท่องเที่ยวสำเร็จ', 'data' => $row]);
    }
} else {
    http_response_code(405);
}
