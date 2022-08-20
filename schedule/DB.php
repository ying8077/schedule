<?php
$host     = "127.0.0.1:3306";
$DBName   = "work_schedule";
$UserName = "root";
$Password = "";
$DB_mysql = "mysql:host=$host;dbname=$DBName;charset=utf8";

try {
    $conn = new PDO($DB_mysql, $UserName, $Password);
    // echo "連線成功";dd
} catch (PDOException $e) {
    echo $e->getMessage();
}