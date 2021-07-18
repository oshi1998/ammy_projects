<?php

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    require_once('../db_config.php');

    if ($_SESSION['ADMIN_USERNAME'] == $_GET['usr_delete']) {
        http_response_code(412);
        echo json_encode(['status' => 412, 'message' => 'คุณไม่สามารถลบข้อมูลตัวเองได้']);
    } else {
        $sql = "DELETE FROM admins WHERE adm_username=?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$_GET['usr_delete']])) {
            http_response_code(200);
            echo json_encode(['status' => 200, 'message' => "ลบข้อมูล $_GET[usr_delete] สำเร็จ"]);
        } else {
            http_response_code(412);
            echo json_encode(['status' => 412, 'message' => 'ไม่สามารถลบข้อมูลได้']);
        }
    }
} else {
    http_response_code(405);
}
