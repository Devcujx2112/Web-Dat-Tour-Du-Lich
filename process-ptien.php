<?php
require 'admin/connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ form
    $HoVaTen = $_POST['HoVaTen'];
    $SoDienThoai = $_POST['SoDienThoai'];
    $KhuVuc = $_POST['KhuVuc'];
    $DiemDon = $_POST['DiemDon'];
    $LoaiXe = $_POST['LoaiXe'];
    $DiemDen = $_POST['DiemDen'];
    $GoiThue = $_POST['GoiThue'];
    $NgayThue = $_POST['NgayThue'];
    
    $sql = "INSERT INTO tbl_phuongtien (HoVaTen, SoDienThoai, KhuVuc, DiemDon, LoaiXe, DiemDen, GoiThue, NgayThue)
    VALUES ('$HoVaTen', '$SoDienThoai', '$KhuVuc', '$DiemDon', '$LoaiXe', '$DiemDen', '$GoiThue', '$NgayThue')";
    if ($conn->query($sql) === TRUE) {
       echo "Thêm thành công";
      header("location: PhuongTien.php");
    } else {
        echo "Lỗi thêm thất bại {$sql}".$conn->error;
    }
}
?>