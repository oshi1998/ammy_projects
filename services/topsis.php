<?php

header("Content-Type:application/json");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once('connect.php');

    $sql = "SELECT att_id,att_name,att_image,att_views FROM attractions 
        WHERE att_cost>=:cost
        OR att_convenience>=:convenience 
        OR att_restaurant>=:restaurant OR att_transfer>=:transfer OR att_hotel>=:hotel 
        OR att_cafe>=:cafe OR att_security>=:security OR att_hospital>=:hospital 
        OR att_police>=:police OR att_parking>=:parking
        ORDER BY att_convenience DESC";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([
        'cost' => $_POST['att_cost'],
        'convenience' => $_POST['att_convenience'],
        'restaurant' => $_POST['att_restaurant'],
        'transfer' => $_POST['att_transfer'],
        'hotel' => $_POST['att_hotel'],
        'cafe' => $_POST['att_cafe'],
        'security' => $_POST['att_security'],
        'hospital' => $_POST['att_hospital'],
        'police' => $_POST['att_police'],
        'parking' => $_POST['att_parking']
    ])) {
        $rows = $stmt->fetchAll();
        if (empty($rows)) {
            http_response_code(412);
            echo json_encode(['status' => 412, 'message' => 'ไม่พบข้อมูล สถานที่ตามที่คุณต้องการ!']);
        } else {

            session_start();

            $_SESSION['TOPSIS_ACCESS'] = TRUE;
            $_SESSION['TOPSIS_DATA'] = $rows;

            http_response_code(200);
            echo json_encode(['status' => 200, 'message' => 'ค้นหาข้อมูลสำเร็จ!']);
        }
    } else {
        http_response_code(412);
        echo json_encode(['status' => 412, 'message' => 'ค้นหาข้อมูลสถานที่ท่องเที่ยวไม่สำเร็จ!']);
    }
} else {
    http_response_code(405);
}
