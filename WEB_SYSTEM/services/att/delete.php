<?php

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    require_once('../db_config.php');

    if (isset($_GET['img_delete'])) {

        $delete_location = "../../dist/img/attractions/" . $_GET['img_file'];
        unlink($delete_location);

        $sql = "DELETE FROM images WHERE img_id=?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$_GET['img_delete']])) {
            http_response_code(200);
            echo json_encode(['status' => 200, 'message' => "ลบรูปภาพ $_GET[img_delete] สำเร็จ"]);
        } else {
            http_response_code(412);
            echo json_encode(['status' => 412, 'message' => 'ไม่สามารถลบรูปภาพได้']);
        }
    } else {

        $sql = "SELECT img_file FROM images WHERE att_id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['id_delete']]);
        $images = $stmt->fetchAll();

        foreach ($images as $image) {
            $delete_location = "../../dist/img/attractions/" . $image['img_file'];
            unlink($delete_location);
        }

        $sql = "SELECT att_image FROM attractions WHERE att_id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['id_delete']]);
        $att_image = $stmt->fetchObject()->att_image;
        $delete_location = "../../dist/img/attractions/" . $att_image;
        unlink($delete_location);

        $sql = "DELETE FROM images WHERE att_id=?";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$_GET['id_delete']])) {
            $sql = "DELETE FROM attractions WHERE att_id=?";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$_GET['id_delete']])) {
                http_response_code(200);
                echo json_encode(['status' => 200, 'message' => "ลบข้อมูล $_GET[id_delete] สำเร็จ"]);
            } else {
                http_response_code(412);
                echo json_encode(['status' => 412, 'message' => 'ไม่สามารถลบข้อมูลได้']);
            }
        } else {
            http_response_code(412);
            echo json_encode(['status' => 412, 'message' => 'ไม่สามารถลบข้อมูลได้']);
        }
    }
} else {
    http_response_code(405);
}
