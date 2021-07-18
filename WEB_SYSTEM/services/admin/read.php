<?php

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    require_once('../db_config.php');

    if (isset($_GET['getdata'])) {
        $sql = "SELECT * FROM admins WHERE adm_username = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['getdata']]);
        $row = $stmt->fetchObject();

        http_response_code(200);
        echo json_encode(['status' => 200, 'message' => "โหลดข้อมูลผู้ใช้งาน $_GET[getdata] สำเร็จ", 'data' => $row]);
    } else {
        $sql = "SELECT * FROM admins ORDER BY adm_created DESC";
        $stmt = $pdo->query($sql);
        $row = $stmt->fetchAll();

        echo json_encode(['status' => 200, 'message' => 'โหลดข้อมูลผู้ดูแลระบบสำเร็จ', 'data' => $row]);
    }
} else {
    http_response_code(405);
}
