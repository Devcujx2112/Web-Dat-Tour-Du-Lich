<?php
require "admin/connect.php";

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- GOOGLE FONT -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
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
      document.getElementById("logoLink").addEventListener("click", function () {
        // Di chuyển sang trang index.html
        window.location.href = "index.php";
      });
    </script>
    <?php
    if (isset($_SESSION['username'])) {
      $query = mysqli_query($conn, "SELECT * FROM `tbl_user` WHERE `username` = '" . $_SESSION['username'] . "'");
      $data = mysqli_fetch_assoc($query);
    }

    ?>
    <div class="menu">

      <?php
      if (isset($data) && $data['level'] == 1) { 
        ?>
        <li><a href="DanhSach-dlich.php">Du Lịch</a></li>
        <li><a href="DanhSach-ttoan.php">Thanh Toán</a></li>
        <li><a href="DanhSach-ptien.php">Phương Tiện</a></li>
        <li><a href="DanhSach-ksan.php">Khách Sạn</a></li>
        <li><a href="DanhSach-lhe.php">Liên hệ</a></li>

        <?php
      } else {
        ?>
        <li><a href="">Du lịch</a>
          <ul class="sub-menu" name="ten_mien">
            <li value="mbac"><a href="MienBac.php">Miền Bắc</a></li>
            <li value="mtrung"><a href="MienTrung.php">Miền Trung</a></li>
            <li value="mdong"><a href="MienDong.php">Miền Đông</a></li>
            <li value="mtay"><a href="MienTay.php">Miền Tây</a></li>
          </ul>
        </li>
        <li><a href="PhuongTien.php">Phương Tiện</a></li>
        <li><a href="KhachSan.php">Khách sạn</a></li>
        <li><a href="Lienhe.php">Liên hệ</a></li>
      <?php
      }
      ?>
    </div>
    <div class="orther">
      <li><a href="admin/Sua-tk.php" class="nametk" style=" background-color: #f2f2f2;color: #2d4271;font-weight: bold; text-decoration: none;padding:5px;  border-radius: 10px;">
        <?php 
          if (!isset($_SESSION['username'])) {
            echo "No account";
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
  <section id="Slider">
    <div class="aspect-ratio-169">
      <img src="img/france2.jpg">
      <img src="img/rome1.jpg">
      <img src="img/france1.jpg">
    </div>
    <div class="dot-container">
      <div class="dot active"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
  </section>
  <!-- Bài viết -->
  <div class="container">
    <div class="container mt-4">
      <h2 class="text-start mb-4 custom-heading">Bài viết mới nhất</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <img src="img/sanpham1.jpg" class="card-img-top" alt="img du lịch Phú Quốc">
            <div class="card-body">
              <h5 class="card-title" style="color:#2d4271;">Phú Quốc - Thiên đường giải trí Vinwonder</h5>
              <p class="card-text">Công viên chủ đề hàng đầu châu Á gồm 6 phân khu với rất nhiều hoạt động vui chơi,
                trải nghiệm và các chương trình biểu diễn nghệ thuật đỉnh cao…</p>
              <a href="blog.html" class="btn btn-outline-primary">Tham quan</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="img/spham2.webp" class="card-img-top" alt="Du lịch Nha Trang">
            <div class="card-body">
              <h5 class="card-title" style="color:#2d4271;">Nha Trang - Biển Nhũ Tiên</h5>
              <p class="card-text">Nha Trang với khí hậu ôn hòa, biển xanh trong quanh năm cùng những điểm vui chơi bậc
                nhất luôn thu hút du khách gần xa...</p>
              <a href="blog.html" class="btn btn-outline-primary">Tham quan</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="img/spham3.webp" class="card-img-top" alt="Du thuyền Hạ Long">
            <div class="card-body">
              <h5 class="card-title" style="color:#2d4271;">Nghỉ Dưỡng Du Thuyền Hạ Long Cao Cấp</h5>
              <p class="card-text">Chuỗi du thuyền sở hữu hệ thống cabin sang trọng, tiện nghi cùng nhà hàng cao cấp,
                Sundeck 360 độ bể sục Jacuzzi ngoài trời, quầy bar và phòng Spa.</p>
              <a href="blog.html" class="btn btn-outline-primary">Tham quan</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-4">
      <h2 class="text-start mb-4 custom-heading">Ưu đãi trong tháng</h2>
      <!-- Ưu đãi đặc biệt -->
      <section class="special-offers mt-4">
        <div class="container">
          <div class="offer-card">
            <div class="row">
              <div class="col-md-4">
                <div class="card mb-3">
                  <img src="img/combo1.webp" class="img-fluid rounded-start" alt="Combo Phú Quốc"
                    style="width: 398.39px; height: 234.84px;">
                </div>
              </div>
              <div class="col-md-6">
                <div class="card-body-p2">
                  <p class="card-title tag">Vé máy bay + Khách sạn </p>
                  <h5 class="card-title tieude">
                    <a href="#" class="custom-link" title="Wyndham Grand Phú Quốc">
                      Wyndham Grand Phú Quốc (Vinoasis) 5 sao: Vé máy bay khứ hồi + Phòng Standard + Ăn sáng + Khám phá
                      Vinpearl Safari + VinWonders + Đón tiễn sân bay theo lịch của khách sạn
                    </a>
                  </h5>
                  <p class="card-text" style="margin-top: 10px;">
                    <i class="fas fa-star" style="color: gold;"></i>
                    <i class="fas fa-star" style="color: gold;"></i>
                    <i class="fas fa-star" style="color: gold;"></i>
                    <i class="fas fa-star" style="color: gold;"></i>
                    <i class="fas fa-star" style="color: gold;"></i>
                  </p>
                  <p class="card-text"><small class="text-body-secondary">Phú Quốc: Dịch vụ vé máy bay + 2 đêm nghỉ
                      dưỡng tại Wyndham Grand Phú Quốc (Vinoasis) 5 sao (Đã bao gồm Ăn sáng, Khám phá Vinpearl Safari +
                      VinWonders + dịch vụ đón tiễn sân bay Phú Quốc theo lịch khách sạn)</small></p>
                </div>
              </div>
              <div class="col-md-2 vertical-line">
                <div class="card-body-p3 d-flex flex-column justify-content-between">
                  <p class="card-text" style="margin-top: 50px;"> Giá chỉ từ :</p>
                  <span class="Giatien" style="background-color: #dd4b39; color: aliceblue;">7.550.000 ₫</span>
                  <div class="d-flex justify-content-between" style="margin-top: 10px;">
                    <a href="ThanhToan.html" class="btn btn-outline-primary"
                      style="margin: -10px; margin-bottom: 20px; margin-top: 30px;">Ngày khác</a>
                    <a href="ThanhToan.html" class="btn btn-outline-primary"
                      style="margin-top: 30px; margin-bottom: 20px;">Đặt ngay</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>

      <div class="mt-4" style="margin-bottom: 30px;"></div>

      <section class="special-offers mt-4">
        <div class="container">
          <div class="offer-card">
            <div class="row">
              <div class="col-md-4">
                <div class="card mb-3">
                  <img src="img/combo2.jpg" class="img-fluid rounded-start" alt="Combo Hạ Long"
                    style="width: 398.39px; height: 234.84px;">
                </div>
              </div>
              <div class="col-md-6">
                <div class="card-body-p2">
                  <p class="card-title tag">Vé máy bay + Khách sạn </p>
                  <h5 class="card-title tieude">
                    <a href="#" class="custom-link" title="Hạ Long">
                      Hà Nội - Bái Đính - Khu Du Lịch Tràng An - Bái Đính - Hạ Long - Yên Tử
                    </a>
                  </h5>
                  <p class="card-text" style="margin-top: 10px;">
                    <i class="fas fa-star" style="color: gold;"></i>
                    <i class="fas fa-star" style="color: gold;"></i>
                    <i class="fas fa-star" style="color: gold;"></i>
                    <i class="fas fa-star" style="color: gold;"></i>
                    <i class="fas fa-star" style="color: gold;"></i>
                  </p>
                  <p class="card-text"><small class="text-body-secondary">Vùng đất thiêng Yên Tử: Quý khách lên cáp treo
                      du ngoạn thắng cảnh thiên nhiên Đông Yên Tử (chi phí cáp treo tự túc), nơi còn lưu giữ nhiều di
                      tích lịch sử mệnh danh “Đất tổ Phật giáo Việt Nam”, chiêm bái chùa Một Mái, chùa Hoa Yên – nơi tu
                      hành của phật hoàng Trần Nhân Tông khai sinh ra dòng mới Thiền Phái Trúc Lâm, nằm trên lưng chừng
                      núi ở độ cao 516m.</small></p>
                </div>
              </div>
              <div class="col-md-2 col-sm-4 vertical-line">
                <div class="card-body-p3 d-flex flex-column justify-content-between">
                  <p class="card-text" style="margin-top: 30px;"> Giá chỉ từ :</p>
                  <span class="Giatien" style="background-color: #dd4b39; color: aliceblue;">8.790.000 ₫</span>
                  <div class="d-flex justify-content-between" style="margin-top: 10px;">
                    <a href="ThanhToan.html" class="btn btn-outline-primary"
                      style="margin: -10px; margin-bottom: 20px; margin-top: 50px;">Ngày khác</a>
                    <a href="ThanhToan.html" class="btn btn-outline-primary"
                      style="margin-top: 50px; margin-bottom: 20px;">Đặt ngay</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>

      <div class="mt-4" style="margin-bottom: 30px;"></div>

      <section class="special-offers mt-4">
        <div class="container">
          <div class="offer-card">
            <div class="row">
              <div class="col-md-4">
                <div class="card mb-3">
                  <img src="img/combo3.webp" class="img-fluid rounded-start" alt="Combo Phú Quốc"
                    style="width: 398.39px; height: 234.84px;">
                </div>
              </div>
              <div class="col-md-6">
                <div class="card-body-p2">
                  <p class="card-title tag">Vé máy bay + Khách sạn </p>
                  <h5 class="card-title tieude">
                    <a href="#" class="custom-link" title="Miền tây">
                      Miền Tây: Cần Thơ - Cà Mau - Đất Mũi - Bạc Liêu - Sóc Trăng - Trải Nghiệm Tuyến Cao Tốc Mới Nhất
                      Của Miền Tây (Tham quan vườn trái cây) </a>
                  </h5>
                  <p class="card-text" style="margin-top: 10px;">
                    <i class="fas fa-star" style="color: gold;"></i>
                    <i class="fas fa-star" style="color: gold;"></i>
                    <i class="fas fa-star" style="color: gold;"></i>
                    <i class="fas fa-star" style="color: gold;"></i>
                    <i class="fas fa-star" style="color: gold;"></i>
                  </p>
                  <p class="card-text"><small class="text-body-secondary">Chương trình đi Đất Mũi bằng xe, nếu Quý khách
                      có nhu cầu đi từ Năm Căn ra Đất Mũi bằng cano, vui lòng báo cho nhân viên tư vấn Vietravel ngay
                      khi đăng ký và thanh toán tiền phí cano cùng phí thuê thêm một hướng dẫn viên đi theo.</small></p>
                </div>
              </div>
              <div class="col-md-2 vertical-line">
                <div class="card-body-p3 d-flex flex-column justify-content-between">
                  <p class="card-text" style="margin-top: 50px;"> Giá chỉ từ :</p>
                  <span class="Giatien" style="background-color: #dd4b39; color: aliceblue;">4.290.000 ₫</span>
                  <div class="d-flex justify-content-between" style="margin-top: 10px;">
                    <a href="ThanhToan.html" class="btn btn-outline-primary"
                      style="margin: -10px; margin-bottom: 20px; margin-top: 20px;">Ngày khác</a>
                    <a href="ThanhToan.html" class="btn btn-outline-primary"
                      style="margin-top: 20px; margin-bottom: 20px;">Đặt ngay</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>
    </div>

    <div class="mt-4" style="margin-bottom: 50px;"></div>

  </div>
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
</body>
<script>
  const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
  const imgContainer = document.querySelector('.aspect-ratio-169')
  const dotItem = document.querySelectorAll(".dot")
  let imgNuber = imgPosition.length
  let index = 0
  // console.log(imgPosition)
  imgPosition.forEach(function (image, index) {
    image.style.left = index * 100 + "%";
    dotItem[index].addEventListener("click", function () {
      slider(index)
    })
  })
  function imgSlide() {
    index++;
    console.log(index)
    if (index >= imgNuber) { index = 0 }
    slider(index)
  }
  function slider(index) {
    imgContainer.style.left = "-" + index * 100 + "%"
    //Chọn tất cả các dot
    const dotActive = document.querySelector('.active')
    //Remove các dot đã đi qua
    dotActive.classList.remove("active")
    dotItem[index].classList.add("active")
  }
  setInterval(imgSlide, 5000)

</script>

</html>