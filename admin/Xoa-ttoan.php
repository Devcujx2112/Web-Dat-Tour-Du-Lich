<?php
require_once 'connect.php';

//Lấy giữ liệu của id cần xóa
$svid = $_GET['sid'];
//echo $id;
//connect

//Câu lệnh Sql
$xoa_sql = "DELETE FROM `tbl_thanhtoan` WHERE `uid` = '$svid'"; 
//Thực thi
$kq = mysqli_query($conn,$xoa_sql);
if($kq){
    header("location: ../DanhSach-ttoan.php");

}
//echo "<h1>Xóa thành công</h1>";
// Return Danhsach
?>