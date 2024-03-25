<?php
require "connect.php";
if(!isset($_SESSION['username'])){
  header("location: formlogin.php");
  if(!isset($_SESSION['username'])){
    header('Location: formlogin.php');
  }else{
    $query = mysqli_query($conn, "SELECT * FROM `tbl_user` WHERE `username` = '" . $_SESSION['username'] . "'");
    $data = mysqli_fetch_assoc($query);
    if(isset($data) && $data['level'] != 1){
      header('Location: index.php');
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách</title>
    <link rel="stylesheet" href="../style/Dulich.css">
    <link rel="stylesheet" href="style/mbstrap.js">
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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $TieuDe = $_POST['TieuDe'];
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $dir = "../img/" . $image;
        $Time = $_POST['Time'];
        $NoiKhoiHanh = $_POST['NoiKhoiHanh'];
        $Gia = $_POST['Gia'];
        $mien = $_POST['mien'];
        $MaTour = $_POST['MaTour'];
        move_uploaded_file($image_tmp, $dir);
        $sql = "INSERT INTO tbl_dulich(TieuDe,image,Time,NoiKhoiHanh,Gia,mien,MaTour)"
            . "VALUES('$TieuDe','$image','$Time','$NoiKhoiHanh','$Gia','$mien','$MaTour')";
        $query = mysqli_query($conn, $sql);
        if($query){
            header("location: ../DanhSach-dlich.php");
           
        }

    }

    ?>

    <div class="card-body">
        <div class="container">
            <div class="row col-lg-12">
                <form method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="title">Tiêu Đề</label>
                        <input type="text" name="TieuDe" id="" class="form-control" placeholder=""
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="" class="form-control" placeholder=""
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="intro">Thời gian</label>
                        <input type="text" name="Time" id="" class="form-control" placeholder=""
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="detail">Nơi khởi hành</label>
                        <input type="text" name="NoiKhoiHanh" id="" class="form-control" placeholder=""
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="status">Giá tour</label>
                        <input type="text" name="Gia" id="" class="form-control" placeholder=""
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="status">Tên Miền</label>
                        <input type="text" name="mien" id="" class="form-control" placeholder=""
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="status">Mã Tour</label>
                        <input type="text" name="MaTour" id="" class="form-control" placeholder=""
                            aria-describedby="helpId">
                    </div>
                    <button class="btn btn-primary" name="submit" type="submit"> THÊM </button>
                    
                </form>
            </div>
        </div>
    </div>


    <!-- Footer -->

    <footer class="bg-body-tertiary text-center" style="margin-top:100px">
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

</body>

</html>