<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once('../db_config.php');

    $sql = "SELECT adm_username FROM admins WHERE adm_username=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['adm_username']]);
    $row = $stmt->fetch(PDO::FETCH_OBJ);
    if (!empty($row)) {
        http_response_code(412);
        echo json_encode(['status' => 412, 'message' => "ชื่อผู้ใช้งาน $_POST[adm_username] ถูกใช้งานแล้ว กรุณาเปลี่ยนใหม่"]);
    } else {
        $password095 = password_hash($_POST['adm_password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO admins (adm_username,adm_password,adm_firstname,adm_lastname) VALUES (:username,:password,:firstname,:lastname)";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([
            'username' => $_POST['adm_username'],
            'password' => $password095,
            'firstname' => $_POST['adm_firstname'],
            'lastname' => $_POST['adm_lastname']
        ])) {
            http_response_code(200);
            echo json_encode(['status' => 200, 'message' => 'เพิ่มข้อมูลผู้ดูแลระบบสำเร็จ']);
        } else {
            http_response_code(412);
            echo json_encode(['status' => 412, 'message' => 'เพิ่มข้อมูลไม่สำเร็จ เนื่องจากข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง']);
        }
    }
} else {
    http_response_code(405);
}
