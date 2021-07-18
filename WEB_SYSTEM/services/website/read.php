<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    require_once("../db_config.php");

    $sql = "SELECT * FROM website";

    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_OBJ);
    
    if(!empty($row)){
        http_response_code(200);
        echo json_encode(['status'=>200,'message'=>'โหลดข้อมูลเว็บไซต์สำเร็จ','data'=>$row]);
    }else{
        http_response_code(405);
    }
} else {
    http_response_code(405);
}