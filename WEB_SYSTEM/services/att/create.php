<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once('../db_config.php');

    $sql = "SELECT att_name FROM attractions WHERE att_name=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['att_name']]);
    $row = $stmt->fetchAll();

    if (!empty($row)) {
        http_response_code(412);
        echo json_encode(['status' => 412, 'message' => "ชื่อสถานที่ $_POST[att_name] ถูกใช้งานแล้ว กรุณาเปลี่ยนใหม่"]);
    } else {

        $type = strrchr($_FILES['att_image']['name'], '.');
        $att_image = md5(microtime()) . $type;
        $save_target = "../../dist/img/attractions/" . $att_image;
        move_uploaded_file($_FILES['att_image']['tmp_name'], $save_target);

        $views = rand(999, 9999);

        $sql = "INSERT INTO attractions 
        (att_name,att_type_id,att_description,att_article,att_image,att_google_map,att_cost,att_convenience,att_restaurant,att_transfer,att_hotel,att_cafe,att_security,att_hospital,att_police,att_parking,att_views) 
        VALUES (:att_name,:att_type_id,:att_description,:att_article,:att_image,:att_google_map,:att_cost,:att_convenience,:att_restaurant,:att_transfer,:att_hotel,:att_cafe,:att_security,:att_hospital,:att_police,:att_parking,:att_views)";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([
            'att_name' => $_POST['att_name'],
            'att_type_id' => $_POST['att_type_id'],
            'att_description' => $_POST['att_description'],
            'att_article' => $_POST['att_article'],
            'att_image' => $att_image,
            'att_google_map' => $_POST['att_google_map'],
            'att_cost' => $_POST['att_cost'],
            'att_convenience' => $_POST['att_convenience'],
            'att_restaurant' => $_POST['att_restaurant'],
            'att_transfer' => $_POST['att_transfer'],
            'att_hotel' => $_POST['att_hotel'],
            'att_cafe' => $_POST['att_cafe'],
            'att_security' => $_POST['att_security'],
            'att_hospital' => $_POST['att_hospital'],
            'att_police' => $_POST['att_police'],
            'att_parking' => $_POST['att_parking'],
            'att_views' => $views
        ])) {

            $last_att_id = $pdo->lastInsertId();

            for ($i = 0; $i < count($_FILES['img_file']['name']); $i++) {
                $type = strrchr($_FILES['img_file']['name'][$i], '.');
                $img_file = md5(microtime()) . $type;
                $save_target = "../../dist/img/attractions/" . $img_file;
                move_uploaded_file($_FILES['img_file']['tmp_name'][$i], $save_target);

                $sql = "INSERT INTO images (img_file,att_id) VALUES(:img_file,:att_id)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['img_file' => $img_file, 'att_id' => $last_att_id]);
            }
            http_response_code(200);
            echo json_encode(['status' => 200, 'message' => 'เพิ่มข้อมูลสถานที่ท่องเที่ยวสำเร็จ']);
        } else {
            http_response_code(412);
            echo json_encode(['status' => 412, 'message' => 'เพิ่มข้อมูลไม่สำเร็จ เนื่องจากข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง']);
        }
    }
} else {
    http_response_code(405);
}
