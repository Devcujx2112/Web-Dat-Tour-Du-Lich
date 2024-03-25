<?php
    require "admin/connect.php";
    if(!isset($_SESSION['username'])){
      header('Location: formlogin.php');
    }else{
      $query = mysqli_query($conn, "SELECT * FROM `tbl_user` WHERE `username` = '" . $_SESSION['username'] . "'");
      $data = mysqli_fetch_assoc($query);
      if(isset($data) && $data['level'] != 1){
        header('Location: index.php');
      }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách</title>
    <link rel="stylesheet" href="style/mbstrap.js">
    <link rel="stylesheet" href="font/fontawesome-free-6.5.1-web/css/all.css">
    <link rel="stylesheet" href="font/fontawesome-free-6.5.1-web/js/all.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- file css -->
  <link rel="stylesheet"href="style/ThanhToan.css">
</head>
<body>
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
        <li><a href="DanhSach-dlich.php">Du Lịch</a></li>
        <li><a href="DanhSach-ttoan.php">Thanh Toán</a></li>
        <li><a href="DanhSach-ptien.php">Phương Tiện</a></li>
        <li><a href="DanhSach-ksan.php">Khách Sạn</a></li>
        <li><a href="DanhSach-lhe.php">Liên hệ</a></li>
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
  <div class="container" style="padding-top: 100px;">
    <h2 style="color:#2d4271; font-weight: bold;">Danh sách thanh toán</h2>
    <br>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th>Họ Và Tên</th>
      <th>Số Điện Thoại</th>
      <th>Email</th>
      <th>Địa Chỉ</th>
      <th>Số Người đi</th>
      <th>note</th>
      <th>Mã Tour</th>
      <th>Chức Năng</th>

    </tr>
  </thead>
  <tbody>
  <?php 
    // chọn vào bảng db
    $lietke_sql = "SELECT * FROM tbl_thanhtoan order by HoVaTen, Email";
    //Thực thi câu lệnh
    $result = mysqli_query($conn,$lietke_sql);
    // Thông qua result và print
    while ($r = mysqli_fetch_assoc($result)){
    ?>
      <tr>
        <td><?php echo $r['HoVaTen'];?></td>
        <td><?php echo $r['SoDienThoai'];?></td>
        <td><?php echo $r['Email'];?></td>
        <td><?php echo $r['address'];?></td>       
        <td><?php echo $r['SoNguoiDi'];?></td>
        <td><?php echo $r['note'];?></td>
        <td><?php echo $r['MaTour'];?></td>
      
      <td><a href="admin/Sua-ttoan.php?sid=<?= $r['uid'];?>" class ="btn btn-warning">Sửa</a>      
        <a onclick="return confirm('Bạn có muốn xóa thông tin người này không?');" href="admin/Xoa-ttoan.php?sid=<?=$r['uid'];?>" class="btn btn-danger">Xóa</a>
      </tr>
  <?php
    }
  ?>
    </tbody>
    </table>
      </div>
      
 
<!-- Footer -->

    <footer class="bg-body-tertiary text-center" style="margin-top:100px">
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
    </footer>

</body>
</html>

