<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once('../db_config.php');

    $sql = "SELECT (SELECT COUNT(adm_username) FROM admins) AS num_adm, (SELECT COUNT(mem_username) FROM members) AS num_mem, 
    (SELECT COUNT(att_type_id) FROM attraction_types) AS num_type, (SELECT COUNT(att_id) FROM attractions) AS num_att FROM dual";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchObject();

    http_response_code(200);
    echo json_encode(['status' => 200, 'message' => 'โหลดข้อมูลแดชบอร์ดสำเร็จ', 'data' => $rows]);
} else {
    http_response_code(405);
}
