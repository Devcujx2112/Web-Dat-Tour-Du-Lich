<?php
require 'admin/connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ form
    $LoaiThongTin = $_POST['LoaiThongTin'];
    $HoVaTen = $_POST['HoVaTen'];
    $SoDienThoai = $_POST['SoDienThoai'];
    $Email = $_POST['Email'];
    $address = $_POST['address'];
    $TieuDe = $_POST['TieuDe'];
    $note = $_POST['note'];
    
    $sql = "INSERT INTO tbl_lienhe (LoaiThongtin,HoVaTen, SoDienThoai, Email, address, TieuDe, note)
    VALUES ('$LoaiThongTin','$HoVaTen', '$SoDienThoai', '$Email', '$address', '$TieuDe', '$note')";
    if ($conn->query($sql) === TRUE) {
       echo "Thêm thành công";
      header("location: Lienhe.php");
    } else {
        echo "Lỗi thêm thất bại {$sql}".$conn->error;
    }
}
?>