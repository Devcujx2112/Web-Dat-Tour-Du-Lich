<?php
require_once 'connect.php';
// Nhận dữ liệu từ form
$HoVaTen = $_POST['HoVaTen'];
$SoDienThoai = $_POST['SoDienThoai'];
$Email = $_POST['Email'];
$address= $_POST['address'];
$SoNguoiDi = $_POST['SoNguoiDi'];
$MaTour = $_POST['MaTour'];
$note = $_POST['note'];

$id = $_POST['sid'];


$update_sql = "UPDATE tbl_thanhtoan SET HoVaTen='$HoVaTen', SoDienThoai='$SoDienThoai', Email='$Email', address='$address',SoNguoiDi='$SoNguoiDi',
 note='$note' WHERE `uid`='$id'";
// echo $update_sql;exit;
// Kiểm tra và xử lý kết quả truy vấn
$result = mysqli_query($conn, $update_sql);
if ($result) {
    header("location: ../danhsach-ttoan.php");
} else {
    echo "Có lỗi xảy ra: " . mysqli_error($conn);
}
?>
