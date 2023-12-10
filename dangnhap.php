
<?php
session_start();
require "connection.php";

// Kiểm tra kết nối
if ($connection->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $connection->connect_error);
}

// Xử lý đăng nhập khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Truy vấn SQL để kiểm tra thông tin đăng nhập và vai trò
    $sql = "SELECT * FROM taikhoan WHERE Tai_khoan='$username' AND Mat_khau='$password'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        setcookie("user_id", $row['MaTaiKhoan'], time() + 36000, "/");

        if ($row['vai_tro'] == 1) {
            header("Location:admin.php"); // Chuyển hướng đến trang admin
            exit(); 
        } else {
          
            $userId = $row['MaTaiKhoan']; // Lấy giá trị ID từ cơ sở dữ liệu
            header("Location: TRANGCHU.php?id=$userId"); // Chuyển hướng đến trang tài khoản với ID
        }
    } else {
        // Đăng nhập thất bại
        $error = "Thông tin đăng nhập không chính xác.";
    }
}

$connection->close();
?>

<!-- Form đăng nhập HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/animate/animate.min.css">
    <link rel="stylesheet" href="plugins/fontawesome/all.css">
    <link rel="stylesheet" href="plugins/webfonts/font.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="plugins/uikit/uikit.min.css" />


    <style>
       

       .login-container {
            width: 500px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            background-color: #fff;
            margin: 100px auto; /* Căn giữa theo chiều ngang */
            text-align: left;
           
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container form {
            text-align: left;
        }

        .login-container label {
            display: block;
            margin-bottom: 8px;
        }

        .login-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .login-container input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .login-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    


  



  <div class="header">
    <a style="color: #ffffff;text-decoration: none;" href="index.html">MIỄN PHÍ VẬN CHUYỂN VỚI ĐƠN HÀNG NỘI THÀNH > 300K - ĐỔI TRẢ TRONG 30 NGÀY - ĐẢM BẢO CHẤT LƯỢNG</a>
  </div>

  <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <img src="images/logo.png" class="logo-top" alt="">
      </a>
      <div class="desk-menu collapse navbar-collapse justify-content-md-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="TRANGCHU.php">TRANG CHỦ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="SANPHAM.php">SẢN PHẨM</a>
          </li>
          <li class="nav-item lisanpham">
            <a class="nav-link" href="detailproduct.html">DANH MỤC
              <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </a>
            <ul class="sub_menu">
              <li class="">
                <a href="detailproduct.html" title="Sản phẩm - Style 1"> 
                  Sản phẩm - Style 1
                </a>
              </li>
              <li class="">
                <a href="detailproduct.html" title="Sản phẩm - Style 2"> 
                  Sản phẩm - Style 2
                </a>
              </li>
              <li class="">
                <a href="detailproduct.html" title="Sản phẩm - Style 3"> 
                  Sản phẩm - Style 3
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="introduce.html">GIỚI THIỆU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.html">BLOG</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">LIÊN HỆ</a>
          </li>
        </ul>
      </div>
      <div id="offcanvas-flip1" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar" style="background: white; width: 100%;">
          <!-- Offcanvas Content -->
        </div>
      </div>
      <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar" style="background: white; width: 350px;">
          <!-- Offcanvas Content -->
        </div>
      </div>
      <div id="offcanvas-flip2" uk-offcanvas="flip: true; overlay: true">
        <div class="uk-offcanvas-bar" style="background: white; width: 350px;">
          <!-- Offcanvas Content -->
        </div>
      </div>
      <div class="icon-ol">
        <a style="color: #272727" href="">
          <i class="fas fa-user-alt"></i>
        </a>
        <a href="#" class="" uk-toggle="target: #offcanvas-flip">
          <i class="fas fa-search" style="color: black"></i>
        </a>
        <a style="color: #272727" href="#" uk-toggle="target: #offcanvas-flip2">
          <i class="fas fa-shopping-cart"></i>
        </a>
        <button class="navbar-toggler" type="button" uk-toggle="target: #offcanvas-flip1" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </nav>



  <div class="login-container">
        <h2>Đăng nhập</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Tài khoản:</label>
                <input type="text" class="form-control" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <input type="submit" class="btn btn-primary" value="Đăng nhập">
            <a href="dangky.php">đăng Ký</a>;
        </form>
        

        <?php
        // Hiển thị thông báo lỗi nếu có
        if (isset($error)) {
            echo "<p class='error-message'>$error</p>";
        }
        ?>
    </div>

</body>
</html>
