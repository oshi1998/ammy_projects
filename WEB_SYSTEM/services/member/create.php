<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once('../db_config.php');

    if (str_contains($_POST['mem_username'], 'admin') || str_contains($_POST['mem_username'], 'owner') || str_contains($_POST['mem_username'], 'founder')) {
        http_response_code(412);
        echo json_encode(['status' => 412, 'message' => "ไม่สามารถใช้ชื่อ $_POST[mem_username] ได้ กรุณาเปลี่ยนใหม่"]);
    } else {
        $sql = "SELECT mem_username FROM members WHERE mem_username=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['mem_username']]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        if (!empty($row)) {
            http_response_code(412);
            echo json_encode(['status' => 412, 'message' => "ชื่อผู้ใช้งาน $_POST[mem_username] ถูกใช้งานแล้ว กรุณาเปลี่ยนใหม่"]);
        } else {
            $password095 = password_hash($_POST['mem_password'], PASSWORD_DEFAULT);

            $sql = "INSERT INTO members (mem_username,mem_password,mem_firstname,mem_lastname,mem_email,mem_phone) VALUES (:username,:password,:firstname,:lastname,:email,:phone)";
            $stmt = $pdo->prepare($sql);

            if ($stmt->execute([
                'username' => $_POST['mem_username'],
                'password' => $password095,
                'firstname' => $_POST['mem_firstname'],
                'lastname' => $_POST['mem_lastname'],
                'email' => $_POST['mem_email'],
                'phone' => $_POST['mem_phone']
            ])) {
                http_response_code(200);
                echo json_encode(['status' => 200, 'message' => 'เพิ่มข้อมูลสมาชิกสำเร็จ']);
            } else {
                http_response_code(412);
                echo json_encode(['status' => 412, 'message' => 'เพิ่มข้อมูลไม่สำเร็จ เนื่องจากข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง']);
            }
        }
    }
} else {
    http_response_code(405);
}
