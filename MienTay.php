<?php
    require_once 'admin/connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/Dulich.css">
    <link rel="stylesheet" href="style/mbstrap.js">
    <link rel="stylesheet" href="font/fontawesome-free-6.5.1-web/css/all.css">
    <link rel="stylesheet" href="font/fontawesome-free-6.5.1-web/js/all.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Travel with Cityzens</title>
</head>
<body>
<div class="container">
<!-- Phần menu -->
<div class="header-container">
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

<!-- Phần sản phẩm -->
<div class="product-details mt-4" style="margin-bottom: -100px;">
    <div class="left-column">
      <div class="BoLoc">
        <h3 style="font-weight: bold; color: #2d4271;">Bộ lọc tìm kiếm</h3>
        <span class="KhuVuc" style="margin-bottom: 25px; margin-top: 20px;">Miền Tây</span>
        <div class="DiemKhoiHanh" style="margin-bottom: 25px;">
          <span class="TieuDe" style="font-weight: bold; color: #2d4271;">Điểm khởi hành</span>
          <select class="form-select" aria-label="Default select example">
            <option selected>----Tất cả----</option>
            <option value="1">Hà Nội</option>
            <option value="2">Đà nẵng</option>
            <option value="3">TP Hồ Chí Minh</option>
            <option value="4">Quảng Ninh</option>
          </select>
        </div>

        <div class="SapXep" style="margin-bottom: 25px;">
          <span class="TieuDe"  style="font-weight: bold; color: #2d4271;">Sắp xếp theo</span>
          <select class="form-select" aria-label="Default select example">
            <option selected>----Chọn----</option>
            <option value="1">Theo giá từ thấp đến cao</option>
            <option value="2">Theo giá từ cao đến thấp</option>
          </select>
        </div>
        
        <div class="NgayKhoiHanh" style="margin-bottom: 25px;">
          <span class="TieuDe"  style="font-weight: bold; color: #2d4271;">Ngày khởi hành</span>
          <input type="date" class="form-control" id="birthdate" name="NgayKhoiHanh" >
        </div>
      </div>
    </div>

    
    <div class="right-column">
    <?php 
    // chọn vào bảng db
    $lietke_sql = "SELECT * FROM tbl_dulich WHERE mien ='Miền tây' ";
    //Thực thi câu lệnh
    $result = mysqli_query($conn,$lietke_sql);
    // Thông qua result và print
    while ($r = mysqli_fetch_assoc($result)){
    ?>
        <div class="note">
          <div class="card" style="width: 20rem">
                <img src="img/<?= $r['image']; ?>" class="card-img-top" alt="Sơn La - Mộc Châu">
                <div class="card-body">
                  <p style="font-size: 13px; font-family: Arial, Helvetica, sans-serif; margin-bottom: -1px;"><?=$r['Time'];?></p>
                  <a href="ThanhToan.html" class="no-underline">
                  <h5 class="card-title" name="" style="margin-top: 6px;"><?=$r ['TieuDe']; ?></h5>
                  </a>
                  <p class="card-text" style="margin-top: 20px; margin-bottom: -5px;">Nơi khởi hành : <span style="font-weight: bold; color: #2d4271;"><?=$r['NoiKhoiHanh']; ?></span> </p>
                  <span class="GiaTien" style="font-weight: bold; color: red; display: block; margin-top: 10px; margin-bottom: 10px;"><?=$r ['Gia']; ?> đ</span>
                  <a href="ThanhToan.php?uid=<?=$r['uid']; ?>"class="btn btn-danger" style="font-size: 14px;"><i class="fa-solid fa-cart-shopping" style="margin-right: 5px;"></i> Đặt ngay</a>
                  <a href="ThanhToan.php?uid=<?=$r['uid']; ?>" class="btn btn-outline-primary" style="font-size: 14px; margin-left: 75px;" >Xem chi tiết</a>
                </div>
              </div>        
            </div>
    <?php }?>
        <!-- <div class="note">
          <div class="card" style="width: 20rem">
            <img src="img/MienTay2.jpg" class="card-img-top" alt="Phú Quốc">
            <div class="card-body">
              <p style="font-size: 13px; font-family: Arial, Helvetica, sans-serif; margin-bottom: -1px;">18/01/2024 - 3N2Đ - Giờ đi: 17:05</p>
              <a href="MienTay2.html" class="no-underline">
              <h5 class="card-title" style="margin-top: 6px;">Phú Quốc: Dịch vụ vé máy bay + 2 đêm nghỉ dưỡng tại Khách sạn Wyndham Garden</h5>
              </a>
              <p class="card-text" style="margin-top: 25px; margin-bottom: -5px;">Nơi khởi hành : <span style="font-weight: bold; color: #2d4271;">TP Hồ Chí Minh</span> </p>
              <span class="GiaTien" style="font-weight: bold; color: red; display: block; margin-top: 10px; margin-bottom: 10px;">2.390.000 ₫</span>
              <a href="ThanhToan.html" class="btn btn-danger" style="font-size: 14px;"><i class="fa-solid fa-cart-shopping" style="margin-right: 5px;"></i> Đặt ngay</a>
              <a href="ThanhToan.html" class="btn btn-outline-primary" style="font-size: 14px; margin-left: 75px;" >Xem chi tiết</a>
            </div>
          </div> 
        </div>
        <div class="note">
          <div class="card" style="width: 20rem">
            <img src="img/MienTay3.jpg" class="card-img-top" alt="Phú Quốc">
            <div class="card-body">
              <p style="font-size: 13px; font-family: Arial, Helvetica, sans-serif; margin-bottom: -1px;">19/01/2024 - 5N4Đ - Giờ đi: 06:00</p>
              <a href="ThanhToan.html" class="no-underline">
              <h5 class="card-title" style="margin-top: 6px;">Phú Quốc: Thiên đường giải trí Vin Wonders - Vinpearl Safari - Hòn Thơm Nature Park - Cáp Treo Vượt Biển</h5>
              </a>
              <p class="card-text" style="margin-top: 25px; margin-bottom: -5px;">Nơi khởi hành : <span style="font-weight: bold; color: #2d4271;">Hà Nội</span> </p>
              <span class="GiaTien" style="font-weight: bold; color: red; display: block; margin-top: 10px; margin-bottom: 10px;">8.590.000 ₫</span>
              <a href="ThanhToan.html" class="btn btn-danger" style="font-size: 14px;"><i class="fa-solid fa-cart-shopping" style="margin-right: 5px;"></i> Đặt ngay</a>
              <a href="ThanhToan.html" class="btn btn-outline-primary" style="font-size: 14px; margin-left: 75px;" >Xem chi tiết</a>
            </div>
          </div>       
        </div>
        <div class="note">
          <div class="card" style="width: 20rem">
            <img src="img/MienTay4.jpg" class="card-img-top" alt="Đệ Nhất Tứ Đảo - United Center">
            <div class="card-body">
              <p style="font-size: 13px; font-family: Arial, Helvetica, sans-serif; margin-bottom: -1px;">22/01/2024 - 3N2Đ - Giờ đi: 17:05</p>
              <a href="ThanhToan.html" class="no-underline">
              <h5 class="card-title" style="margin-top: 6px;">Phú Quốc: Đệ Nhất Tứ Đảo - United Center - Bãi Sao - Một ngày tự do (Khách sạn 3 sao)</h5>
              </a>
              <p class="card-text" style="margin-top: 40px; margin-bottom: -5px;">Nơi khởi hành : <span style="font-weight: bold; color: #2d4271;">TP Hồ Chí Minh</span> </p>
              <span class="GiaTien" style="font-weight: bold; color: red; display: block; margin-top: 10px; margin-bottom: 10px;">2.690.000 ₫</span>
              <a href="ThanhToan.html" class="btn btn-danger" style="font-size: 14px;"><i class="fa-solid fa-cart-shopping" style="margin-right: 5px;"></i> Đặt ngay</a>
              <a href="ThanhToan.html" class="btn btn-outline-primary" style="font-size: 14px; margin-left: 75px;" >Xem chi tiết</a>
            </div>
          </div>       
        </div>
        <div class="note">
          <div class="card" style="width: 20rem">
            <img src="img/MienTay6.jpg" class="card-img-top" alt="Sapa - Bản Cát Cát">
            <div class="card-body">
              <p style="font-size: 13px; font-family: Arial, Helvetica, sans-serif; margin-bottom: -1px;">25/01/2024 - 5N4Đ - Giờ đi: 06:55</p>
              <a href="ThanhToan.html" class="no-underline">
              <h5 class="card-title" style="margin-top: 6px;">Đà Nẵng - Huế - Đầm Lập An - La Vang - Động Phong Nha & Thiên Đường - KDL Bà Nà - Cầu Vàng -Sơn Trà - Hội An - Đà Nẵng</h5>
              </a>
              <p class="card-text" style="margin-top: 20px; margin-bottom: -5px;">Nơi khởi hành : <span style="font-weight: bold; color: #2d4271;">TP Hồ Chí Minh</span> </p>
              <span class="GiaTien" style="font-weight: bold; color: red; display: block; margin-top: 10px; margin-bottom: 10px;">13.990.000 ₫</span>
              <a href="ThanhToan.html" class="btn btn-danger" style="font-size: 14px;"><i class="fa-solid fa-cart-shopping" style="margin-right: 5px;"></i> Đặt ngay</a>
              <a href="ThanhToan.html" class="btn btn-outline-primary" style="font-size: 14px; margin-left: 75px;" >Xem chi tiết</a>
            </div>
          </div>       
        </div>
        <div class="note">
          <div class="card" style="width: 20rem">
            <img src="img/MienTay5.jpg" class="card-img-top" alt="Sơn La - Mộc Châu">
            <div class="card-body">
              <p style="font-size: 13px; font-family: Arial, Helvetica, sans-serif; margin-bottom: -1px;">03/02/2024 - 4N3Đ - Giờ đi: 05:30</p>
              <a href="ThanhToan.html" class="no-underline">
              <h5 class="card-title" style="margin-top: 6px;">Miền Tây: Cần Thơ - Cà Mau - Đất Mũi - Bạc Liêu - Sóc Trăng - Trải Nghiệm Tuyến Cao Tốc Mới Nhất Của Miền Tây</h5>
              </a>
              <p class="card-text" style="margin-top: 40px; margin-bottom: -5px;">Nơi khởi hành : <span style="font-weight: bold; color: #2d4271;">Hà Nội</span> </p>
              <span class="GiaTien" style="font-weight: bold; color: red; display: block; margin-top: 10px; margin-bottom: 10px;">4.590.000 ₫</span>
              <a href="ThanhToan.html" class="btn btn-danger" style="font-size: 14px;"><i class="fa-solid fa-cart-shopping" style="margin-right: 5px;"></i> Đặt ngay</a>
              <a href="ThanhToan.html" class="btn btn-outline-primary" style="font-size: 14px; margin-left: 75px;" >Xem chi tiết</a>
            </div>
          </div>       
        </div> -->
    </div>
</div>
</div>
<div class="footer-container">
<div class="mt-4" style="margin-bottom: 200px;"></div>
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
