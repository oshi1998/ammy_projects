<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    header("Content-Type:application/json");
    require_once("connect.php");

    $sql = "SELECT * FROM members WHERE mem_username = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['username']]);
    $row = $stmt->fetch(PDO::FETCH_OBJ);

    if (!empty($row)) {
        if (password_verify($_POST['password'], $row->mem_password)) {

            session_start();
            
            $_SESSION['MEMBER_LOGIN'] = true;
            $_SESSION['MEMBER_USERNAME'] = $row->mem_username;
            http_response_code(200);
            echo json_encode(['status' => 200, 'message' => 'เข้าสู่ระบบสำเร็จ']);
        } else {
            http_response_code(401);
            echo json_encode(['status' => 401, 'message' => 'ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง']);
        }
    } else {
        http_response_code(401);
        echo json_encode(['status' => 401, 'message' => 'ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง']);
    }
} else {
    http_response_code(405);
}
