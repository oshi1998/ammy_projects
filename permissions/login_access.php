<?php

session_start();

$request = $_SERVER['REQUEST_URI'];

if (isset($_SESSION['MEMBER_LOGIN']) && $_SESSION['MEMBER_LOGIN'] == TRUE) {
    if ($request == "/webdevelopment/ammy_projects/") {
        header("Location:home.php");
    }
} else {
    if ($request != "/webdevelopment/ammy_projects/") {
        header("Location:/webdevelopment/ammy_projects/");
    }
}
