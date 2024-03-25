<?php
  require "admin/connect.php";
  if(!isset($_SESSION['username'])){
    header("location: formlogin.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/ThanhToan.css">
  <link rel="stylesheet" href="style/mbstrap.js">
  <link rel="stylesheet" href="font/fontawesome-free-6.5.1-web/css/all.css">
  <link rel="stylesheet" href="font/fontawesome-free-6.5.1-web/js/all.js">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        <a href="index.php" id="logoLink"><img src="img/logo-light.png" alt="logo"></a>
      </div>
      <script>
        // Sử dụng JavaScript để thêm sự kiện "click" cho logo
        document.getElementById("logoLink").addEventListener("click", function () {
          // Di chuyển sang trang index.html
          window.location.href = "index.php";
        });
      </script>
      <div class="menu">
        <li><a href="">Du lịch</a>
          <ul class="sub-menu">
            <li><a href="MienBac.php">Miền Bắc</a></li>
            <li><a href="MienTrung.php">Miền Trung</a></li>
            <li><a href="MienDong.php">Miền Đông</a></li>
            <li><a href="MienTay.php">Miền Tây</a></li>
          </ul>
        </li>
        <li><a href="PhuongTien.php">Phương Tiện</a></li>
        <li><a href="KhachSan.php">Khách sạn</a></li>
        <li><a href="Lienhe.php">Liên hệ</a></li>
      </div>
      <div class="orther">
      <li><a href="admin/Sua-tk.php" class="nametk" style=" background-color: #f2f2f2;color: #2d4271;font-weight: bold; text-decoration: none;padding:5px;  border-radius: 10px;">
        <?php 
          if (!isset($_SESSION['username'])) {
            echo "";
          } else{
            echo $_SESSION['username'];
          }
        ?>
        </a>
      </li>
      <li><a href="formlogin.php"><i class="fa-solid fa-user" style="color: white; margin-top:3px"></i></a></li>
        <li><a href="log-out.php"><i class="fa-solid fa-right-from-bracket" style="color: white;"></i></a></li>

      </div>
    </header>
  </div>
  <!-- --------------Phần checked------------------>
  <div class="booking-tour" style="margin-top: 100px;">
    <section class="check-head">
      <div class="container" style="background-color:whitesmoke; padding-top: 15px;">
        <div class="row">
          <ul class="head col-12">
            <li class="checked" style="color: blue;">1. Nhập thông tin</li>
            <li class="checked"><i class="fa-solid fa-arrow-right"></i></li>
            <li>2. Thanh toán</li>
          </ul>
        </div>
      </div>
    </section>
    <!-- ---------------Thông tin tour------------- -->
    <section class="Check-Thongtin">
      <div class="container">
        <div class="row">
          <div class="col-12 top" style="margin-top:30px;">
            <?php
            $id = $_GET['uid'];
            // chọn vào bảng db
            $lietke_sql = "SELECT * FROM tbl_dulich WHERE `uid` ='$id' ";
            //Thực thi câu lệnh
            $result = mysqli_query($conn, $lietke_sql);
            // Thông qua result và print
            while ($r = mysqli_fetch_assoc($result)) {
              ?>
              <div class="Thongtin-tour" style="display: flex; align-items: center; background-color:#f2f2f2;">
                <div class="tour-img" style="width: 30rem">
                  <img src="img/<?= $r['image']; ?>" class="card-img-top" height="300px">
                </div>
                <div class="content-tour" style="margin-left: 60px; margin-top: -60px;">
                  <div class="star">
                    <p class="card-text" style="margin-top: 10px;">
                      <i class="fas fa-star" style="color: gold;"></i>
                      <i class="fas fa-star" style="color: gold;"></i>
                      <i class="fas fa-star" style="color: gold;"></i>
                      <i class="fas fa-star" style="color: gold;"></i>
                      <i class="fas fa-star" style="color: gold;"></i>
                    </p>
                  </div>
                  <div class="TieuDe">
                    <h5 class="card-title" name="TieuDe"
                      style="margin-top: 6px; font-weight: bold; color:#2d4271; margin-bottom:5px">
                      <?= $r['TieuDe']; ?>
                    </h5>
                  </div>
                  <div class="ghichu">
                    <div class="thoi-gian">
                      <p style="margin-bottom: -1px;" margin-bottom:5px <?=$r['Time'] ?>>
                        
                      </p>
                      <div class="noikhoihanh">
                        <p class="card-text" style="margin-top: 20px; margin-bottom: 5px;font-weight:bold;">Nơi khởi hành : <span
                            style="font-weight: bold; color: #2d4271;" ><?=$r['NoiKhoiHanh'] ?></span></p>
                      </div>
                      <div class="MaTour">
                        <p class="card-text" style="margin-top: 20px; margin-bottom: 5px;font-weight:bold;">Mã Tour : <span style="color:#2d4271;font-weight:bold;"><?=$r['MaTour'] ?></span></p>
                      </div>
                    </div>
                    <div class="tenmien">
                      <p style="margin-bottom:10px;font-weight:bold;">Miền : <span style="color:#2d4271;font-weight:bold;"><?=$r['mien'] ?></span></p>
                      
                    </div>
                    <div class="gia-ca">
                      <p style="margin-top: 10px; font-weight:bold; ">
                      Giá Tour :  <span style="background-color:red; color:white;padding:10px;border-radius:10px"><?=$r['Gia'] ?>đ</span></p>
                    </div>
                  </div>
                </div>


                <?php
            }
            ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-12 left" style="margin-top:30px;">
            <form id="form" action="process-ttoan.php" method="post" style="background-color:white;margin-left:50px">
              <h2 class="d-none d-lg-block" style="color:#2d4271; font-weight: bold;">Tổng quan về chuyến đi</h2>
              <h3 style="color:#2d4271; font-weight: bold; font-size: 18px;">Thông tin liên lạc</h3>
              <div class="customer-contact mb-3">
                <div class="row">
                  <div class="col-md-6">
                    <div class="Hovaten">
                      <label>Họ và tên</label>
                      <input type="text" class="form-control" name="HoVaTen" placeholder="VD : Vũ Tùng Dương">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="email">
                      <label>Email</label>
                      <input type="email" class="form-control" id="Email" name="Email" placeholder="Admin123@gmail.com">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="sdt">
                      <label>Số điện thoại</label>
                      <input type="number" class="form-control" name="SoDienThoai">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="address">
                      <label>Địa chỉ</label>
                      <input type="text" class="form-control" name="address">
                    </div>
                  </div>
                </div>

              </div>
              <div class="HanhKhach">
                <h3 style="color:#2d4271; font-weight: bold;font-size: 18px;">Hành Khách và chuyến đi</h3>
                <div class="row">
                  <div class="col-md-6">
                    <div class="NguoiLon">
                      <label>Số người đi</label>
                      <input type="number" class="form-control" name="SoNguoiDi">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="MaTour">
                      <label>Mã Tour</label>
                      <input type="text" class="form-control" name="MaTour">
                    </div>
                  </div>
                </div>

              </div>
              <div class="Luu-y">
                <div class="Luu-y-trai">
                  <span>Người lớn sinh trước ngày<b
                      style="color: #2d4271; font-weight: bold; margin-left: 5px;">10/02/2012</b></span>
                  <br>
                  <span>Trẻ nhỏ sinh từ<b
                      style="color: #2d4271; font-weight: bold; margin-right: 5px; margin-left: 5px;">11/02/2019</b>đến<b
                      style="color: #2d4271; font-weight: bold;margin-left: 5px;">10/02/2022</b></span>
                </div>
                <div class="Luu-y-phai" style="margin-right: -40px;">
                  <span>Trẻ em sinh từ<b
                      style="color: #2d4271; font-weight: bold;margin-left: 5px;margin-right: 5px; ">11/02/2012</b>đến<b
                      style="color: #2d4271; font-weight: bold;margin-left: 5px;">10/02/2019</b></span>
                  <br>
                  <span>Em bé sinh từ<b
                      style="color: #2d4271; font-weight: bold;margin-right: 5px; margin-left: 5px; ">11/02/2022</b>đến<b
                      style="color: #2d4271; font-weight: bold; margin-left: 5px;">12/02/2024</b></span>
                </div>
              </div>
              <div class="loi-nhan" style="margin-top: 30px;">
                <h3 style="font-size: 18px;">Lời nhắn cho chúng tôi</h3>
                <div class="ghi-chu">
                  <p>Ghi chú thêm</p>
                  <textarea class="form-control" name="note" cols="20" rows="5"></textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-danger" style="margin-top:20px;">Đặt ngay</button>
            </form>
          </div>
          <div class="col-md-4 col-12 right" style="padding-top:30px;">
            <div class="group-lienhe" style="background-color:#f2f2f2;padding:30px;  border-radius: 20px;">
              <label>Quý khách cần hỗ trợ?</label>
              <div class="lien-he">
                <a class="phone" href="https://chat.zalo.me/" target="_blank">
                  <i class="fa-solid fa-phone" style="margin-right: 5px; margin-left: 20px;"></i>
                  <p style="font-size: 14px;">Goi miễn phí <br>qua internet</p>
                </a>
                <a class="message" href="https://www.messenger.com/t/7995249897213622/" target="_blank">
                  <i class="fa-solid fa-message" style="margin-right: 5px; margin-left: 20px;"></i>
                  <p style=" font-size: 14px;">Gửi yêu cầu<br> hỗ trợ ngay</p>
                </a>
              </div>
            </div>

          </div>
        </div>
        </div>

      </div>
    </section>



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
          <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!"
            role="button"><i class="fab fa-twitter"></i></a>

          <!-- Google -->
          <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #dd4b39;" href="#!"
            role="button"><i class="fab fa-google"></i></a>

          <!-- Instagram -->
          <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;"
            href="https://www.instagram.com/devcujx/" role="button"><i class="fab fa-instagram"></i></a>

          <!-- Linkedin -->
          <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!"
            role="button"><i class="fab fa-linkedin-in"></i></a>
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
              <img src="img/Manchester_City_F12C_logo.svg.png">
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