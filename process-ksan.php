<?php
require 'admin/connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ form
    $HoVaTen = $_POST['HoVaTen'];
    $SoDienThoai = $_POST['SoDienThoai'];
    $KhuVuc = $_POST['KhuVuc'];
    $SoPhong = $_POST['SoPhong'];
    $NgayThue = $_POST['NgayThue'];
    $NgayTra = $_POST['NgayTra'];
    $note = $_POST['note'];

    // $HoVaTen = $_POST['HoVaTen'];
    // if($HoVaTen==""){
    //     die(json_encode(["status" => "error", "msg" => "Họ và tên không được để trống"]));
    // }if($SoDienThoai){

    // }
    // $note = $_POST['note'];
    // if($note ==""){
    //     die(json_encode(["status" => "error", "msg" => "Trống "]));
    // }
    
    $sql = "INSERT INTO tbl_khachsan (HoVaTen, SoDienThoai, KhuVuc, SoPhong, NgayThue, NgayTra, note)
    VALUES ('$HoVaTen', '$SoDienThoai', '$KhuVuc', '$SoPhong', '$NgayThue', '$NgayTra', '$note')";
    if ($conn->query($sql) === TRUE) {
       echo "Thêm thành công";
      header("location: KhachSan.php");
    } else {
        echo "Lỗi thêm thất bại {$sql}".$conn->error;
    }
}
?>