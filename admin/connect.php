<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$dbname = "db_travel";

//Tạo ra 1 biến connect
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối không thành công". $conn->connect_error);
}
?>