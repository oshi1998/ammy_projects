<?php

error_reporting(E_ALL);
date_default_timezone_set("Asia/Bangkok");

$host = "localhost";
$username = "root";
$password = "";
$db = "ammy_projects";

$pdo;
$dsn = "mysql:host=$host;dbname=$db;charset=utf8";
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
