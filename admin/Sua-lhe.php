
<?php
//Lấy id
$id = $_GET['sid'];
//Connect
require_once 'connect.php';
if(!isset($_SESSION['username'])){
    header('Location: formlogin.php');
  }else{
    $query = mysqli_query($conn, "SELECT * FROM `tbl_user` WHERE `username` = '" . $_SESSION['username'] . "'");
    $data = mysqli_fetch_assoc($query);
    if(isset($data) && $data['level'] != 1){
      header('Location: index.php');
    }
  }

//Lấy thông tin sql
$edit_sql = "SELECT * FROM `tbl_lienhe` WHERE `uid` = '$id'";

//Trả về kết quả
$result = mysqli_query($conn, $edit_sql);
$row = mysqli_fetch_assoc($result);

$city = isset($_POST['LoaiThongTin']) ? $_POST['LoaiThongTin'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/ThanhToan.css">
    <link rel="stylesheet" href="../style/mbstrap.js">
    <link rel="stylesheet" href="font/fontawesome-free-6.5.1-web/css/all.css">
    <link rel="stylesheet" href="font/fontawesome-free-6.5.1-web/js/all.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>Travel with Cityzens</title>
</head>

<body>
    <!-- Phần menu -->
    <div class="header-container">
        <header>
            <div class="logo">
                <a href="../index.php" id="logoLink"><img src="../img/logo-light.png" alt="logo"></a>
            </div>
            <script>
                // Sử dụng JavaScript để thêm sự kiện "click" cho logo
                document.getElementById("logoLink").addEventListener("click", function () {
                    // Di chuyển sang trang index.html
                    window.location.href = "../index.php";
                });
            </script>
            <div class="menu">
            <li><a href="../DanhSach-dlich.php">Du Lịch</a></li>
        <li><a href="../DanhSach-ttoan.php">Thanh Toán</a></li>
        <li><a href="../DanhSach-ptien.php">Phương Tiện</a></li>
        <li><a href="../DanhSach-ksan.php">Khách Sạn</a></li>
        <li><a href="../DanhSach-lhe.php">Liên hệ</a></li>
      </div>
      <div class="orther">
      <li><a href="#" class="nametk" style=" background-color: #f2f2f2;color: #2d4271;font-weight: bold; text-decoration: none;padding:5px;  border-radius: 10px;">
        <?php 
          if (!isset($_SESSION['username'])) {
            echo "";
          } else{
            echo $_SESSION['username'];
          }
        ?>
        </a>
      </li>
      <li><a href="../formlogin.php"><i class="fa-solid fa-user" style="color: white; margin-top:3px"></i></a></li>
        <li><a href="../log-out.php"><i class="fa-solid fa-right-from-bracket" style="color: white;"></i></a></li>
        </header>
    </div>


    <div class="container" style="margin-top: 150px;">
        <div class="row">
            <!-- Cột đầu tiên chiếm một nửa trang -->\
            <div class="col-md-8 col-12 left" style="margin-left: -50px;">
                <h3 style="color: #2d4271;">Liên hệ với chúng tôi</h3>
                <form id="form" action="update-lhe.php" method="post">
                    <input type="hidden" name="sid" value="<?php echo $id; ?>" id="">
                    <div class="loaidichvu">
                        <label>Loại thông tin</label>
                        <select class="form-select" aria-label="Default select example" style="margin-bottom: 20px;"
                            name="LoaiThongTin">
                            <option selected>---Tất cả---</option>
                            <option value="DuLich" <?= $row['LoaiThongTin'] == "DuLich" ? 'selected' : ''; ?>>Du Lịch
                            </option>
                            <option value="ChamSocKhachHang" <?= $row['LoaiThongTin'] == "ChamSocKhacHang" ? 'selected' : ''; ?>>Chăm sóc khách hàng</option>
                            <option value="Khac" <?= $row['LoaiThongTin'] == "Khac" ? 'selected' : ''; ?>>Khác</option>
                        </select>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col">
                            <div class="form-group">
                                <label for="username">Họ tên của bạn</label>
                                <input type="text" class="form-control" id="username" name="HoVaTen" value="<?php echo htmlspecialchars($row['HoVaTen'], ENT_QUOTES, 'UTF-8'); ?>">
                                <span id="usernameError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="phoneNumber">Số điện thoại</label>
                                <input type="text" class="form-control" name="SoDienThoai"
                                    value="<?php echo $row['SoDienThoai'] ?>">
                                <span id="phoneNumberError" class="text-danger"></span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email </label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="Email" value="<?php echo $row['Email'] ?>">
                    </div>
                    <div class="form-group" style="margin-bottom: 10px;">
                        <label for="username">Địa chỉ</label>
                        <input type="text" class="form-control" id="username" name="address"
                            value="<?php echo $row['address'] ?>">
                        <span id="usernameError" class="text-danger"></span>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;">
                        <label for="username">Tiêu đề</label>
                        <input type="text" class="form-control" id="username" name="TieuDe"
                            value="<?php echo $row['TieuDe'] ?>">
                        <span id="usernameError" class="text-danger"></span>
                    </div>

                    <div class="mb-3" style="margin-bottom: 10px;">
                        <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            name="note"><?php echo $row['note'] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi đi</button>
                </form>
            </div>


            <!-- Cột thứ hai chiếm một nửa trang -->
            <div class="col-md-4 col-12 right" style="margin-left: 20px;">
                <div class="thongtin" style="background-color: #f0f0f0; margin-right: -100px; margin-bottom: 20px;">
                    <h4 style="color: #2d4271;">Chi Nhánh</h4>
                    <h4 style="color: #2d4271;">Trụ sở chính</h4>
                    <ul>
                        <li><i class="fa-solid fa-location-dot" style="margin-right: 10px;"></i>Tu Hoàng - Nam Từ Liêm -
                            Hà Nội</li>
                        <li><i class="fa-solid fa-phone" style="margin-right: 10px;"></i>+84 647 034 65</li>
                        <li><i class="fa-solid fa-envelope" style="margin-right: 10px;"></i>20213443@eaut.edu.vn</li>
                        <li><i class="fa-brands fa-facebook" style="margin-right: 10px;"></i><a
                                href="https://www.facebook.com/profile.php?id=100025377165179&locale=vi_VN"
                                style="color: black;">Facebook</a></li>
                        <li><i class="fa-brands fa-square-instagram" style="margin-right: 10px;"></i><a
                                href="https://www.instagram.com/devcujx/" style="color: black;"> Instagram</a> </li>
                    </ul>
                </div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.511621464298!2d105.72839327538772!3d21.05221858060302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345459c08fbfb9%3A0x47fb207d9906f9f9!2zMzUgUC5UdSBIb8OgbmcsIFR1IEhvw6BuZywgVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1705459076658!5m2!1svi!2s"
                    width="400" height="325" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>

    </div>


    <div class="footer-container" style="margin-top: -100px;">
        <div class="mt-4" style="margin-bottom: 200px;"></div>
        <!-- Footer -->
        <footer class="bg-body-tertiary text-center">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: media -->
                <section class="mb-4">
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #3b5998;"
                        href="https://www.facebook.com/profile.php?id=100025377165179&locale=vi_VN" role="button"><i
                            class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #55acee;"
                        href="#!" role="button"><i class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #dd4b39;"
                        href="#!" role="button"><i class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;"
                        href="https://www.instagram.com/devcujx/" role="button"><i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #0082ca;"
                        href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                    <!-- Github -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #333333;"
                        href="https://github.com/Devcujx" role="button"><i class="fab fa-github"></i></a>
                </section>
            </div>

            <!-- Section: Form -->
            <section class="">
                <form action="">
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center">
                        <!--Grid column-->
                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>Đăng ký để nhận thông tin mới nhất</strong>
                            </p>
                        </div>
                        <!--Grid column-->
                        <div class="col-md-5 col-12">
                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="email" id="form5Example24" class="form-control" />
                                <label class="form-label" for="form5Example24">Email address</label>
                            </div>
                        </div>

                        <!--Grid column-->
                        <div class="col-auto">
                            <!-- Submit button -->
                            <button data-mdb-ripple-init type="submit" class="btn btn-outline-primary">Đăng kí</button>
                        </div>
                    </div>
                </form>
            </section>
            <!-- Section: Form -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4" style="color: #55acee;">
                                <i class="fas fa-gem me-3" style="color: #0082ca;"></i>Devcujx - Cityzens
                            </h6>
                            <img src="../img/Manchester_City_F12C_logo.svg.png">
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Công cụ
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">HTML</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">CSS</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">PHP</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">JavaScrip</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Hỗ trợ
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Cài đặt</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Liên lạc</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Giỏ hàng</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Trợ giúp</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Liên lạc</h6>
                            <p><i class="fas fa-home me-3"></i>Hà nội - Nam Từ Liêm - Phố nhổn</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                20213443@eaut.edu.vn
                            </p>
                            <p><i class="fas fa-phone me-3"></i> + 84 647 033 65</p>
                            <p><i class="fas fa-print me-3"></i> + 84 992 233 33</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
        </footer>
    </div>
</body>

</html>