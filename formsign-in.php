
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="style/maindki.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style/mbstrap.js">
    <link rel="stylesheet" href="font/fontawesome-free-6.5.1-web/css/all.css">
    <link rel="stylesheet" href="font/fontawesome-free-6.5.1-web/js/all.js">
    <!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>Form Đăng Ký</title>
    <script>
        function validateForm() {
            // Lấy giá trị của các trường input
            let username = document.getElementById("username").value.trim();
            let password = document.getElementById("password").value.trim();
            let email = document.getElementById("email").value.trim();
            let fullname = document.getElementById("fullname").value.trim();
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
                document.getElementById("passwordError").innerHTML = "Mật khẩu phải  ít nhất 6 ký tự";
                isValid = false;
            } else {
                document.getElementById("passwordError").innerHTML = "";
            }

            if (email === "") {
                document.getElementById("emailError").innerHTML = "Email không được để trống";
                isValid = false;
            } else {
                let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    document.getElementById("emailError").innerHTML = "Email không hợp lệ";
                    isValid = false;
                } else {
                    document.getElementById("emailError").innerHTML = "";
                }
            }

            if (fullname === "") {
                document.getElementById("fullnameError").innerHTML = "Họ và tên không được để trống";
                isValid = false;
            } else if (fullname <= 3) {
                document.getElementById("fullnameError").innerHTML = "Họ và tên phải phải ít nhất 4 ký tự";
                isValid = false;
            } else {
                document.getElementById("fullnameError").innerHTML = "";
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
        <div class="container">
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
            
        <li><a href="formlogin.php"><i class="fa-solid fa-user" style="color: white; margin-top:3px"></i></a></li>
            <li><a href="log-out.php"><i class="fa-solid fa-right-from-bracket" style="color: white;"></i></a></li>

        </div>
        </div>
    </header>
 
    <div class="tieude-container">
        <h2 style="color: white;margin-top: 100px; font-weight: bold; margin-left: 100px;">Form Đăng Ký </h2>
    </div>
        <div class="container form-user" style="margin-top: 20px;">
        <form method="POST" action="process-user.php" onsubmit="return validateForm()">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <i class="fa-solid fa-user"></i>
                        <label for="username" style="color: white;">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="VD : Admin123">
                        <span id="usernameError" class="text-danger"style="background-color:white;"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <i class="fa-solid fa-lock"></i>
                        <label for="password" style="color: white;">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <span id="passwordError" class="text-danger" style="background-color:white;"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fullname"style="color: white;">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="VD : Vũ Tùng Dương">
                        <span id="fullnameError" class="text-danger"style="background-color:white;"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email"style="color: white;">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Admin123@gmail.com">
                        <span id="emailError" class="text-danger" style="background-color:white;"></span>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <span style="color: white;">Bạn đã có tài khoản?    
                        <a href="formlogin.html"  class="link-body-emphasis link-offset-2 link-underline-opacity-25 link-underline-opacity-75-hover" style="color: blue;">    
                        Đăng nhập ngay.</a>
                    </span>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary" name="dangky" >Đăng Ký</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="background-image"></div>

</body>

</html>