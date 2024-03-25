<?php
require 'admin/connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ form
    $HoVaTen = $_POST['HoVaTen'];
    $Email = $_POST['Email'];
    $SoDienThoai = $_POST['SoDienThoai'];
    $address = $_POST['address'];
    $SoNguoiDi = $_POST['SoNguoiDi'];
    $MaTour = $_POST['MaTour'];
    $note = $_POST['note'];
    
    $sql = "INSERT INTO tbl_thanhtoan (HoVaTen, Email, SoDienThoai, address, SoNguoiDi, MaTour, note)
    VALUES ('$HoVaTen', '$Email', '$SoDienThoai', '$address', '$SoNguoiDi', '$MaTour', '$note')";
    if ($conn->query($sql) === TRUE) {
       echo "Thêm thành công";
      header("location: ThanhToan.php");
    } else {
        echo "Lỗi thêm thất bại {$sql}".$conn->error;
    }
}
?>