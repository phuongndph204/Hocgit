

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <title>Trang quản lý của ADMIN</title>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/animate/animate.min.css">
    <link rel="stylesheet" href="plugins/fontawesome/all.css">
    <link rel="stylesheet" href="plugins/webfonts/font.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="plugins/uikit/uikit.min.css" />

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
            <a class="nav-link" href="SANPHAM.php">DANH SÁCH SẢN PHẨM</a>
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
      <div class="icon-o">
        <?php 

        ?>
         <?php
if (isset($_COOKIE["user_id"])) {
    // Nếu đã đăng nhập, hiển thị ảnh chứng minh
    echo '<div class="profile-image-container">
            <a href="taikhoanNguoiDung.php">
                <img src="img/dangnhap.jpg" alt="Chứng Minh" class="profile-image">
            </a>
          </div>';
} else {
    // Nếu chưa đăng nhập, hiển thị nút đăng nhập
    echo '<button class="login-button"><a href="dangnhap.php">Đăng Nhập</a></button>';
}
?>


        <a href="#" class="" uk-toggle="target: #offcanvas-flip"  name="TK"p>
          <i class="fas fa-search" style="color: black"></i>
        </a>
        <a style="color: #272727" href="#" uk-toggle="target: #offcanvas-flip2" name="Gio">
          <i class="fas fa-shopping-cart"></i>
        </a>
        <button class="navbar-toggler" type="button" uk-toggle="target: #offcanvas-flip1" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </nav>








<?php

require("connection.php");


if (isset($_COOKIE["user_id"])) {
    
    $id = $_COOKIE["user_id"];

    $sql = "SELECT * FROM taikhoan WHERE MaTaiKhoan = '$id'";
    $query = mysqli_query($connection, $sql);

    if ($query) {
        $user = mysqli_fetch_assoc($query);

        if ($user) {
            // Mã HTML của bạn để hiển thị thông tin người dùng
            echo '
            
            <div class="list">
                <div class="ban">
                    <h2>Thông Tin Tài Khoản</h2>
                    <p><b>Xin chào <font color="#008744">' . $user['ho_ten'] . '</font>! </b></p>
                </div>
                <div class="mainmenu">
                    <table style="display: inline-block; font-size: 14px;">
                        <tr>
                            <th colspan="1" style="border:1px solid black; text-align: center;">Mã đơn hàng</th>
                            <th colspan="1" style="border:1px solid black; text-align: center;">Tên người nhận</th>
                            <th colspan="1" style="border:1px solid black; text-align: center;">Ngày đặt</th>
                            <th colspan="1" style="border:1px solid black; text-align: center;">SĐT</th>
                            <th colspan="1" style="border:1px solid black; text-align: center;">Tổng tiền</th>
                            <th colspan="1" style="border:1px solid black; text-align: center;">Chi tiết đơn hàng</th>
                        </tr>';
                    $sql2 = "SELECT * FROM donhang  WHERE MaTaiKhoan = '$id'";
                    $dsdh = mysqli_query($connection, $sql2);
                    while ($dsdonhang = mysqli_fetch_array($dsdh)) {
                        echo '<tr>
                            <td style="border:1px solid black; text-align: center;">' . $dsdonhang['Ma_don_hang'] . '</td>
                            <td style="border:1px solid black; text-align: center;">' . $dsdonhang['ten_nguoi_nhan']. '</td>
                            <td style="border:1px solid black; text-align: center;">' . $dsdonhang['Ngay_dat']. '</td>
                            <td style="border:1px solid black; text-align: center;">' . $dsdonhang['sdt'] . '</td>
                            <td style="border:1px solid black; text-align: center;">' . $dsdonhang['tong_gia'] . '</td>
                            <td style="border:1px solid black; text-align: center;">
                                <a href="chitietdonhang.php">Nhấp vào xem</a>
                            </td>
                        </tr>';
                    }
                    if ($user['vai_tro'] == 1) {
                        echo'
                       <a href="admin.php" class="admin">Admin</a>';
                   }
                    echo '</table>';
                    echo '
                    <div class="info11">
                        <p style="margin: 10px 20px 10px 20px;"><b>Thông tin của tôi</b></p>
                        <p style="margin: 10px 20px 10px 20px;">Họ tên: ' . $user['ho_ten'] . '</p>
                        <p style="margin: 10px 20px 10px 20px;">Địa chỉ: ' . $user['dia_chi'] . '</p>
                        <p style="margin: 10px 20px 10px 20px;">Email: ' . $user['Email'] . '</p>
                        <p style="margin: 15px 20px 15px 20px;" class="aaa">
                            <a href="capnhattk.php?id='. $user['MaTaiKhoan'] . '" class="submit3"  ">
                                Cập nhật thông tin 

                            </a>
                        </p>

                       


                </div>
                    </div>
                    <div class="logout-button">
                    <a href="logout.php">Đăng xuất</a>
                </div>
                </div>';
        } else {
            echo "Không tìm thấy người dùng.";
        }
    } else {
        echo "Truy vấn thất bại: " . mysqli_error($connection);
    }
}

?>

<style>body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

#vien {
    background-color: #008744;
    padding: 10px;
    color: #ffffff;
}

.center {
    max-width: 1200px;
    margin: 0 auto;
}

#ban {
    font-size: 14px;
}

.list {
    max-width: 1200px;
    margin: 20px auto;
    background-color: #ffffff;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.ban {
    text-align: center;
}

.mainmenu {
    margin-top: 20px;
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #000;
    padding: 10px;
    text-align: center;
}

a {
    color: #008744;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.info11 {
    margin: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
    padding: 5px;
    
}
.aaa{
    padding: 5px;
}
.aaa{
    margin: 5px;
}

.submit3 {
    text-align: center;
    background-color: #008744;
    color: #ffffff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    display: inline-block;
    margin-top: 5px;
    margin-bottom: 5px;
    text-decoration: initial;
}

.submit3:hover {
    background-color: #005b2e;
}

<style>
  .profile-image-container {
    display: inline-block;
}

.profile-image {
    width: 25%; /* Kích thước ảnh nhỏ lại 1/4 */
    border-radius: 50%; /* Làm tròn ảnh */
    cursor: pointer; /* Biến con trỏ thành hình bàn tay khi di chuột qua */
    transition: transform 0.3s ease-in-out; /* Hiệu ứng chuyển động */
}

.profile-image:hover {
    transform: scale(1.1); /* Phóng to ảnh khi di chuột qua */
}

.login-button {
    /* Thêm các thuộc tính CSS cho nút đăng nhập theo ý muốn của bạn */
    padding: 10px;
    font-size: 14px;
    background-color: #007bff;
    color: #ffffff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.login-button:hover {
    background-color: #0056b3; /* Màu nền thay đổi khi di chuột qua */
}

.admin{
    color: red;
    font-size: 30px;
    margin: 10px auto;
    font-weight: bold;
}



</style>