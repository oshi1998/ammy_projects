<?php

if(!isset($_GET['id'])){
    header("Location:place.php");
}else{
    echo "<script>var att_id095 = $_GET[id]</script>";
}