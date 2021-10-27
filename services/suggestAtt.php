<?php

require_once('connect.php');

$sql = "SELECT att_image,att_description,att_type_id,att_name,att_id,att_views FROM attractions ORDER BY att_views ASC LIMIT 5";
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll();

foreach ($rows as $row) {
    echo "<div class='row mt-15'>
    <div class='col-3'>
        <a href='detail.php?id=$row[att_id]'>
            <img src='WEB_SYSTEM/dist/img/attractions/$row[att_image]'>
        </a>
    </div>
    <div class='col-9'>
        <a href='detail.php?id=$row[att_id]'>
            <strong>$row[att_name]</strong>
        </a>
        <p>$row[att_description]</p>
    </div>
</div>";
}
