<?php
require_once 'connect.php';
// Nhận dữ liệu từ form
$HoVaTen = $_POST['HoVaTen'];
$SoDienThoai = $_POST['SoDienThoai'];
$KhuVuc = $_POST['KhuVuc'];
$DiemDon= $_POST['DiemDon'];
$LoaiXe = $_POST['LoaiXe'];
$DiemDen = $_POST['DiemDen'];
$GoiThue = $_POST['GoiThue'];
$NgayThue = $_POST['NgayThue'];

$id = $_POST['sid'];


$update_sql = "UPDATE tbl_phuongtien SET HoVaTen='$HoVaTen', SoDienThoai='$SoDienThoai', KhuVuc='$KhuVuc', DiemDon='$DiemDon',LoaiXe='$LoaiXe',
 LoaiXe='$LoaiXe', DiemDen='$DiemDen',GoiThue='$GoiThue',NgayThue='$NgayThue' WHERE `uid`='$id'";
// echo $update_sql;exit;
// Kiểm tra và xử lý kết quả truy vấn
$result = mysqli_query($conn, $update_sql);
if ($result) {
    header("location: ../danhsach-ptien.php");
} else {
    echo "Có lỗi xảy ra: " . mysqli_error($conn);
}
?>
