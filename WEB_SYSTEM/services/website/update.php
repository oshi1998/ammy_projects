<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once("../db_config.php");

    if(empty($_FILES['web_logo']['name'])){
        $web_logo = $_POST['web_old_logo'];
    }else{
        $type = strrchr($_FILES['web_logo']['name'],'.');
        $web_logo = "logo".$type;
        $save_target = "../../dist/img/".$web_logo;
        move_uploaded_file($_FILES['web_logo']['tmp_name'],$save_target);
    }

    $sql = "UPDATE website SET web_name=?,web_description=?,web_keywords=?,web_phone=?,web_email=?,web_logo=?";

    $stmt = $pdo->prepare($sql);
    if($stmt->execute([$_POST['web_name'],$_POST['web_description'],$_POST['web_keywords'],$_POST['web_phone'],$_POST['web_email'],$web_logo])){
        http_response_code(200);
        echo json_encode(['status'=>200,'message'=>'อัพเดตข้อมูลเว็บไซต์สำเร็จ']);
    }else{
        http_response_code(412);
    }

} else {
    http_response_code(405);
}