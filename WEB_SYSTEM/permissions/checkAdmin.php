<?php

session_start();

$request = $_SERVER['REQUEST_URI'];

if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']==TRUE){
    if($request=="/webdevelopment/ammy_projects/WEB_SYSTEM/"){
        header("Location:pages/dashboard.php");
    }
}else{
    if($request!="/webdevelopment/ammy_projects/WEB_SYSTEM/"){
        header("Location:/webdevelopment/ammy_projects/WEB_SYSTEM/");
    }
}