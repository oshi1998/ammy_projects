<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    header("Content-Type:application/json");
    require_once('connect.php');

    $sql = "UPDATE attractions SET att_views=att_views+1 WHERE att_id=?";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute([$_POST['update_id']])){
        http_response_code(200);
        echo json_encode(['status'=>200,'message'=>'อัพเดตยอดผู้เข้าชมสำเร็จ']);
    }else{
        http_response_code(412);
        echo json_encode(['status'=>412,'message'=>'อัพเดตยอดผู้เข้าชมไม่สำเร็จ']);
    }
}else{
    http_response_code(405);
}