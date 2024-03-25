<?php
require_once 'connect.php';
// Nhận dữ liệu từ form
$HoVaTen = $_POST['HoVaTen'];
$SoDienThoai = $_POST['SoDienThoai'];
$KhuVuc = $_POST['KhuVuc'];
$SoPhong= $_POST['SoPhong'];
$NgayThue = $_POST['NgayThue'];
$NgayTra = $_POST['NgayTra'];
$note = $_POST['note'];

$id = $_POST['sid'];


$update_sql = "UPDATE tbl_khachsan SET HoVaTen='$HoVaTen', SoDienThoai='$SoDienThoai', KhuVuc='$KhuVuc', SoPhong='$SoPhong', NgayThue='$NgayThue', NgayTra='$NgayTra', note='$note' WHERE `uid`='$id'";
// echo $update_sql;exit;
// Kiểm tra và xử lý kết quả truy vấn
$result = mysqli_query($conn, $update_sql);
if ($result) {
    header("location: ../danhsach-ksan.php");
} else {
    echo "Có lỗi xảy ra: " . mysqli_error($conn);
}
?>
