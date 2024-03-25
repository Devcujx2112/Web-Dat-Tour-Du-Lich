<?php
require 'admin/connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pw = password_hash($password,PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    
    
    $sql = "INSERT INTO tbl_user (fullname, email, username, password)
    VALUES ('$fullname', '$email', '$username', '$pw')";
    if ($conn->query($sql) === TRUE) {
       echo "Thêm thành công";
      header("location: formlogin.php");
    } else {
        echo "Lỗi thêm thất bại {$sql}".$conn->error;
    }
}
?>