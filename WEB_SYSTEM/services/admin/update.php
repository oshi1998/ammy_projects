<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once('../db_config.php');

    $sql = "UPDATE admins SET adm_firstname=?,adm_lastname=? WHERE adm_username=?";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute([$_POST['adm_firstname'], $_POST['adm_lastname'], $_POST['adm_username']])){
        http_response_code(200);
        echo json_encode(['status'=>200,'message'=>"อัพเดตข้อมูล $_POST[adm_username] สำเร็จ"]);
    }else{
        http_response_code(412);
        echo json_encode(['status'=>412,'message'=>"อัพเดตข้อมูล $_POST[adm_username] ไม่สำเร็จ"]);
    }
} else {
    http_response_code(405);
}
