
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="style/mbstrap.js">
    <link rel="stylesheet" href="font/fontawesome-free-6.5.1-web/css/all.css">
    <link rel="stylesheet" href="font/fontawesome-free-6.5.1-web/js/all.js">
        <!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous">
    <title>Login - Travel Cityzens</title>
    <link rel="stylesheet" href="style/login.css">
    <script>
        function validateForm() {
        // Lấy giá trị của các trường input
        let username = document.getElementById("username").value.trim();
        let password = document.getElementById("password").value.trim();
        // Biến để kiểm tra việc validate
        let isValid = true;
        // Kiểm tra từng trường
        if (username === "") {
            document.getElementById("usernameError").innerHTML = "Tên tài khoản không được để trống";
            isValid = false;
        } else if (username.length <= 5) {
            document.getElementById("usernameError").innerHTML = "Tên tài khoản phải ít nhất 6 ký tự";
            isValid = false;
        } else {
            document.getElementById("usernameError").innerHTML = "";
        }

        if (password === "") {
            document.getElementById("passwordError").innerHTML = "Mật khẩu không được để trống";
            isValid = false;
        } else if (password.length <= 5) {
            document.getElementById("passwordError").innerHTML = "Mật khẩu phải ít nhất 6 ký tự";
            isValid = false;
        } else {
            document.getElementById("passwordError").innerHTML = "";
        }
        // Nếu thông tin không hợp lệ, ngăn chặn việc submit form
        if (!isValid) {
            return false;
        }
    }
    </script>
</head>
<body>
<header>
       
    <div class="logo" style="margin-right:10px">
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
        <li><a href="" >Du lịch</a>
            <ul class="sub-menu">
              <li><a href="MienBac.php" >Miền Bắc</a></li>
              <li><a href="MienTrung.php">Miền Trung</a></li>
              <li><a href="MienDong.php">Miền Đông</a></li>
              <li><a href="MienTay.php">Miền Tây</a></li>
            </ul>
        </li>
        <li><a href="PhuongTien.php">Phương Tiện</a></li>
        <li><a href="KhachSan.php">Khách sạn</a></li>
        <li><a href="Lienhe.php">Liên hệ</a></li>
    </div>
    </div>
    <div class="dropdown">
      <li><a href="#!">Tài khoản
      <i class="fa fa-caret-down"></i>
      </a>
    <ul class="dropdown-submenu">
      <li><a href="formlogin.php">Đăng Nhập</a></li>
      <li><a href="formsign-in.php">Đăng Kí</a></li>
      <li><a href="log-out.php">Đăng Xuất</a></li>
    </ul>
    </li>
  </div>
    
</header>
<div class="PhanDangNhap">
<div class="tieude-container">
    <h2 style="color:#2d4271; margin-left: 70px;">Đăng Nhập </h2>
    </div>
<div class="container form-user text-center">
    <form method="POST" action="process-login.php" onsubmit="return validateForm()">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <i class="fa-solid fa-user" style="margin-bottom: -23px;"></i>
                    <label for="username" style="color: aliceblue;"></label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    <span id="usernameError" class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <i class="fa-solid fa-lock"style="margin-bottom: -25px;"></i>
                    <label for="inputPassword5" class="form-label" ></label>
                    <input type="password" id="password" class="form-control" name="password" aria-describedby="passwordHelpBlock" placeholder="Password">
                    <span id="passwordError" class="text-danger"></span> 
                </div>
            </div>
        </div>
        <span>Bạn chưa có tài khoản?    
            <a href="formsign-in.php" class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover" style="color: blue;">    
            Đăng kí ngay.</a>
        </span>
        <button type="submit" class="btn btn-primary"name="DangNhap" value="DangNhap" >Đăng Nhập</button>
        </form>
</div>
</div>
<div class="background-image"></div>
            
    
</body>
</html>