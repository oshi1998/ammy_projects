<?php

header("Content-Type:application/json");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once('connect.php');

    if ($_POST['att_cost_min'] > $_POST['att_cost_max']) {
        http_response_code(412);
        echo json_encode(['status' => 412, 'message' => 'ค่าใช้จ่ายต่ำสุด มีค่ามากกว่า ค่าใช้จ่ายสูงสุด กรุณาเลือกใหม่!']);
    } else {
        $sql = "SELECT att_id,att_name,att_image FROM attractions 
        WHERE (att_cost BETWEEN :cost_min AND :cost_max) AND att_convenience=:convenience 
        AND att_restaurant=:restaurant AND att_transfer=:transfer AND att_hotel=:hotel 
        AND att_cafe=:cafe AND att_security=:security AND att_hospital=:hospital 
        AND att_police=:police AND att_parking=:parking";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([
            'cost_min' => $_POST['att_cost_min'],
            'cost_max' => $_POST['att_cost_max'],
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
    }
} else {
    http_response_code(405);
}
