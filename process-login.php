<?php
require 'admin/connect.php';
    if(isset($_POST['username'])){
    // Nhận dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
      
    $sql = "SELECT * FROM tbl_user WHERE username = '$username'";
    $query = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($query);
    if(!$data){
        echo '<script>alert("Không tồn tại username trong hệ thống");</script>';
    }
    $password_check = $data['password'];
    if(!password_verify($password,$password_check)){
        echo '<script>alert("Sai mật khẩu");</script>';
    }else{
        $_SESSION['username'] = $data['username'];
        header('location: index.php');
    }
}
?>