<?php
require_once 'connect.php';
// Nhận dữ liệu từ form
$LoaiThongTin = $_POST['LoaiThongTin'];
$HoVaTen = $_POST['HoVaTen'];
$SoDienThoai = $_POST['SoDienThoai'];
$Email= $_POST['Email'];
$address = $_POST['address'];
$TieuDe = $_POST['TieuDe'];
$note = $_POST['note'];

$id = $_POST['sid'];


$update_sql = "UPDATE tbl_lienhe SET LoaiThongTin='$LoaiThongTin', HoVaTen='$HoVaTen', SoDienThoai='$SoDienThoai', Email='$Email', address='$address',TieuDe='$TieuDe',
 note='$note' WHERE `uid`='$id'";
// echo $update_sql;exit;
// Kiểm tra và xử lý kết quả truy vấn
$result = mysqli_query($conn, $update_sql);
if ($result) {
    header("location: ../danhsach-lhe.php");
} else {
    echo "Có lỗi xảy ra: " . mysqli_error($conn);
}
?>
