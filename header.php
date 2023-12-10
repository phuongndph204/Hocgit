
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
          <li class="nav-item ">
            <a class="nav-link" href="TRANGCHU.php">TRANG CHỦ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="SANPHAM.php">SẢN PHẨM</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="GioiThieu.php">GIỚI THIỆU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blogel.php">BLOG</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="lienhe.php">LIÊN HỆ</a>
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
          <i class="fas fa-search" style="color: black"></i> Tìm Kiếm
        </a>

        

        <a style="color: #272727" href="cart.php"  name="Gio">
           Giỏ Hàng
        </a>
        <button class="navbar-toggler" type="button" uk-toggle="target: #offcanvas-flip1" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </nav>






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

</style>