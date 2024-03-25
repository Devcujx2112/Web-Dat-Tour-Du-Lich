<?php
    require_once 'admin/connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/mbstrap.js">
    <link rel="stylesheet" href="font/fontawesome-free-6.5.1-web/css/all.css">
    <link rel="stylesheet" href="font/fontawesome-free-6.5.1-web/js/all.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Travel with Cityzens</title>
</head>
<body>
<!-- Phần menu -->
<header>
    <div class="logo">
        <a href="index.php" id="logoLink"><img src="img/logo-light.png" alt="logo"></a>
    </div>
    <script>
      // Sử dụng JavaScript để thêm sự kiện "click" cho logo
      document.getElementById("logoLink").addEventListener("click", function() {
          // Di chuyển sang trang index.html
          window.location.href = "index.php";
      });
  </script>
    <div class="menu" >
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
<!--------------------------Phan 2------------------------>
<div class="slider">
  
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/xe.jpg" class="d-block w-100" alt="...">
              </div>
            <div class="carousel-item">
                <img src="img/xe3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
    </div>
</div>

<div class="p-3">
  <form id="form" action="process-ptien.php" method="post">
    <div class="container">
      <div class="Thong-Tin-Nguoi-Dat">
        <h3 style="color:#2d4271; font-weight: bold; margin-top: 30px; margin-bottom: 15px;">Thông tin khách hàng</h3>
        <div class="d-flex mb-1">
        <div class="input-group mb-1">
          <div class="input-group-text" style="width: 123.54px; height: 37.6px;">
            <i class="fa-solid fa-user" style=" margin-right: 5px;"></i>
            <span>Họ và tên</span>
          </div>
          <input type="text" class="form-control" id="validationTooltip01" name="HoVaTen" placeholder="VD: Vũ Tùng Dương" required>
        <div class="valid-tooltip">
        Looks good!
    </div>
        </div>
        <div class="input-group mb-1">
          <div class="input-group-text">
            <i class="fa-solid fa-phone" style=" margin-right: 5px;"></i>
            <span>Số điện thoại</span>
          </div>
          <input type="text" class="form-control" id="validationTooltip01" name="SoDienThoai" required>
        <div class="valid-tooltip">
       Looks good!
     </div>
        </div>
      </div>
      </div>
      <div class="form-dich-vu">
        <h3 style="color:#2d4271; font-weight: bold; margin-top: 30px; margin-bottom: 15px;">Thông tin dịch vụ</h3>
        <div class="input-group d-flex mb-1">
          <div class="input-group-text"style="width: 123.54px; height: 37.6px;">
            <i class="fa-solid fa-house" style=" margin-right: 5px;"></i>
            <span>Khu vực</span>
          </div>
            <select class="form-select form-control" name="KhuVuc">
              <option value="hanoi">Hà Nội</option>
              <option value="hocchiminh">TP Hồ Chí Minh</option>
              <option value="quangninh">Quảng Ninh</option>
              <option value="danang">Đà nẵng</option>
            </select>
        </div>
        <div class="input-group mb-1">
          <div class="input-group-text"style="width: 123.54px; height: 37.6px;">
            <i class="fa-solid fa-location-dot" style=" margin-right: 5px;"></i>
            <span>Điểm đón</span>
          </div>
            <input type="text" name="DiemDon" class="form-control" placeholder="VD: Mỹ Đình...">
        </div>
        <div class="input-group mb-1">
          <div class="input-group-text"style="width: 123.54px; height: 37.6px;">
            <i class="fa-solid fa-car" style=" margin-right: 5px;"></i>
            <span>Dịch vụ</span>
          </div>
            <select class="form-select form-control" name="LoaiXe">
              <option value="xe4cho">Xe 4 chỗ - Xe hợp đồng</option>
              <option value="xe7cho">Xe 7 chỗ - Xe hợp đồng</option>
              <option value="xe16cho">Xe 16 chỗ - Xe hợp đồng</option>
            </select>
        </div>
        <div class="input-group mb-1">
          <div class="input-group-text"style="width: 123.54px; height: 37.6px;">
            <i class="fa-solid fa-map" style=" margin-right: 5px;"></i>
            <span>Điểm đến</span>
          </div>
            <input type="text" name="DiemDen" class="form-control" placeholder="VD: Cầu Giấy...">
        </div>
        <div class="input-group mb-1">
          <div class="input-group-text"style="width: 123.54px; height: 37.6px;">
            <i class="fa-solid fa-pen-to-square" style=" margin-right: 5px;"></i>
            <span>Gói thuê</span>
          </div>
            <select class="form-select form-control" name="GoiThue">
              <option value="1chieu">Gói đi 1 chiều</option>
              <option value="2chieu">Gói đi 2 chiều</option>
            </select>
        </div>
        <div class="input-group mb-1" style="display: flex;">
          <span class="input-group-text">
            <i class="fas fa-calendar-check fa-fw" style=" margin-right: 5px;"></i>
            Ngày thuê
          </span>
          <input type="date" class="form-control" name="NgayThue">
        </div>
      </div>
      <button type="submit" class="btn btn-success" style="margin-top: 20px;" name="btn-pocess">Đặt ngay</button>
    </div>
    </form>
</div>

</div>
<!-- Footer -->
    <footer class="bg-body-tertiary text-center">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
          <!-- Section: media -->
          <section class="mb-4">
            <a
            data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #3b5998;"
              href="https://www.facebook.com/profile.php?id=100025377165179&locale=vi_VN"
              role="button"
              ><i class="fab fa-facebook-f"></i
            ></a>
      
            <!-- Twitter -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #55acee;"
              href="#!"
              role="button"
              ><i class="fab fa-twitter"></i
            ></a>
      
            <!-- Google -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #dd4b39;"
              href="#!"
              role="button"
              ><i class="fab fa-google"></i
            ></a>
      
            <!-- Instagram -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #ac2bac;"
              href="https://www.instagram.com/devcujx/"
              role="button"
              ><i class="fab fa-instagram"></i
            ></a>
      
            <!-- Linkedin -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #0082ca;"
              href="#!"
              role="button"
              ><i class="fab fa-linkedin-in"></i
            ></a>
            <!-- Github -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating m-1"
              style="background-color: #333333;"
              href="https://github.com/Devcujx"
              role="button"
              ><i class="fab fa-github"></i
            ></a>
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
                <i class="fas fa-gem me-3" style="color: #0082ca;"></i>Devcujx - Cityzens</h6>
              <img src="img/Manchester_City_F12C_logo.svg.png" >
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
</body>
    
</html>