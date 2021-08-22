<?php

header("Content-Type:application/json");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once('connect.php');

    session_start();
    if (isset($_SESSION['OTHER_DATA'])) {
        unset($_SESSION['OTHER_DATA']);
    }

    $sql = "SELECT att_id,att_name,att_image,att_views FROM attractions 
        WHERE att_cost>=:cost
        AND att_convenience>=:convenience 
        AND att_restaurant>=:restaurant AND att_transfer>=:transfer AND att_hotel>=:hotel 
        AND att_cafe>=:cafe AND att_security>=:security AND att_hospital>=:hospital 
        AND att_police>=:police AND att_parking>=:parking
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

            $sql = "SELECT att_id,att_name,att_image,att_views FROM attractions ORDER BY att_convenience DESC";
            $stmt = $pdo->query($sql);
            $rows = $stmt->fetchAll();

            
            $_SESSION['TOPSIS_ACCESS'] = TRUE;
            $_SESSION['TOPSIS_DATA'] = $rows;

            http_response_code(200);
            echo json_encode(['status' => 200, 'message' => 'ค้นหาข้อมูลสำเร็จ!']);
        } else {

            foreach ($rows as $row) {
                $att_id[] = $row['att_id'];
            }

            $sql = "SELECT att_id,att_name,att_image,att_views FROM attractions 
            WHERE att_id NOT IN ('" . implode("', '", $att_id) . "')";
            $stmt = $pdo->query($sql);
            $rows2 = $stmt->fetchAll();

            
            $_SESSION['TOPSIS_ACCESS'] = TRUE;
            $_SESSION['TOPSIS_DATA'] = $rows;
            $_SESSION['OTHER_DATA'] = $rows2;

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
