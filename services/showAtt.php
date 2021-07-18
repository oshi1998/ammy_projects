<?php

require_once('connect.php');

$sql = "SELECT att_image,att_type_id,att_name,att_id,att_views FROM attractions ORDER BY att_type_id ASC";
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll();

foreach ($rows as $row) {
    echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3 column_single_gallery_item $row[att_type_id]'>
        <h3 class='text-center'>$row[att_name]</h3>
        <img src='WEB_SYSTEM/dist/img/attractions/$row[att_image]' class='img-responsive fit-image' alt=''>
        <div class='hover_overlay'>
            <a class='gallery_img text-center' href='detail.php?id=$row[att_id]'>
                <i class='fa fa-eye'></i><br>
                <span>$row[att_views]</span>
            </a>
        </div>
    </div>";
}
