

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














 

  <title>Runner</title>
  <!-- Owl-Carousel -->
  <div class="owl-carousel owl-theme owl-carousel-setting">
    <div class="item"><img src="images/slideshow_1.jpg" class="d-block w-100" alt="..."></div>
    <div class="item"><img src="images/slideshow_2.jpg" class="d-block w-100" alt="..."></div>
</div>
 
  <!--Content-->
  <div class="content">
    <div class="container">
      <div class="hot_sp" style="padding-bottom: 10px;">
        <h2 style="text-align:center;padding-top: 10px">
          <a style="font-size: 28px;color: black;text-decoration: none" href="">Sản phẩm bán chạy</a>
        </h2>
        <div class="view-all" style="text-align:center;padding-top: -10px;">
          <a style="color: black;text-decoration: none" href="">Xem thêm</a>
        </div>
      </div>
    </div>
    <!--Product-->
    <div class="container" style="padding-bottom: 50px;">
     
      <iframe src="DSbanchay.php" width="1680" height="1600" frameborder="0"></iframe>

      
    </div>
    <section class="section wrapper-home-banner">
      <div class="container-fluid" style="padding-bottom: 50px;">
        <div class="row">
          <div class="col-xs-12 col-sm-4 home-banner-pd">
            <div class="block-banner-category">
              <a href="#" class="link-banner wrap-flex-align flex-column">
                <div class="fg-image fade-box">
                  <img class="lazyloaded" src="images/shoes/block_home_category1_grande.jpg" alt="Shoes">
                </div>
                <figcaption class="caption_banner site-animation">
                  <p>Bộ sưu tập</p>
                  <h2>
                    Đại sứ thương hiệu
                  </h2>
                </figcaption>
              </a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 home-banner-pd">
            <div class="block-banner-category">
              <a href="#" class="link-banner wrap-flex-align flex-column">
                <div class="fg-image fade-box">
                  <img class="lazyloaded" src="images/shoes/block_home_category2_grande.jpg" alt="Shoes">
                </div>
                <figcaption class="caption_banner site-animation">
                  <p>Bộ sưu tập</p>
                  <h2>
                    Thương hiệu
                  </h2>
                </figcaption>
              </a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 home-banner-pd">
            <div class="block-banner-category">
              <a href="#" class="link-banner wrap-flex-align flex-column">
                <div class="fg-image">
                  <img class="lazyloaded" src="images/shoes/block_home_category3_grande.jpg" alt="Shoes">
                </div>
                <figcaption class="caption_banner site-animation">
                  <p></p>
                  <h2>
                    Blog
                  </h2>
                </figcaption>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="content">
        <div class="container">
          <div class="hot_sp">
            <h2 style="text-align:center;">
              <a style="font-size: 28px;color: black;text-decoration: none" href="">Sản phẩm mới</a>
            </h2>
            <div class="view-all" style="text-align:center;">
              <a style="color: black;text-decoration: none" href="">Xem thêm</a>
            </div>
          </div>
        </div>
        <!--Product-->
      </div>
      <div class="container product" style="width: 100%;margin: auto;">
        <div class="owl-carousel owl-theme owl-product-setting">
          <div class="item">
            <div class="">
              <div class="product-block">
                <div class="product-img fade-box">
                  <a href="#" title="Adidas Ultraboost W" class="img-resize">
                    <img src="images/shoes/801432_01_b16d089f8bda434bacfe4620e8480be1_grande.jpg" alt="Adidas Ultraboost W"
                      class="lazyloaded">
                    <img src="images/shoes/shoes fade 4.jpg" alt="Adidas Ultraboost W" class="lazyloaded">
                  </a>
                 
                </div>
                <div class="product-detail clearfix">
                  <div class="pro-text">
                    <a style=" color: black;
                           font-size: 14px;text-decoration: none;" href="#" title="Adidas Ultraboost W" inspiration pack>
                      Adidas Ultraboost W
                    </a>
                  </div>
                  <div class="pro-price">
                    <p class="">5,300,000₫</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="">
              <div class="product-block">
                <div class="product-img fade-box">
                  <a href="#" title="Adidas Ultraboost W" class="img-resize">
                    <img src="images/shoes/801432_01_b16d089f8bda434bacfe4620e8480be1_grande.jpg" alt="Adidas Ultraboost W"
                      class="lazyloaded">
                    <img src="images/shoes/shoes fade 4.jpg" alt="Adidas Ultraboost W" class="lazyloaded">
                  </a>
                 
                </div>
                <div class="product-detail clearfix">
                  <div class="pro-text">
                    <a style=" color: black;
                           font-size: 14px;text-decoration: none;" href="#" title="Adidas Ultraboost W" inspiration pack>
                      Adidas Ultraboost W
                    </a>
                  </div>
                  <div class="pro-price">
                    <p class="">5,300,000₫</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="">
              <div class="product-block">
                <div class="product-img fade-box">
                  <a href="#" title="Adidas Ultraboost W" class="img-resize">
                    <img src="images/shoes/801432_01_b16d089f8bda434bacfe4620e8480be1_grande.jpg" alt="Adidas Ultraboost W"
                      class="lazyloaded">
                    <img src="images/shoes/shoes fade 4.jpg" alt="Adidas Ultraboost W" class="lazyloaded">
                  </a>
                 
                </div>
                <div class="product-detail clearfix">
                  <div class="pro-text">
                    <a style=" color: black;
                           font-size: 14px;text-decoration: none;" href="#" title="Adidas Ultraboost W" inspiration pack>
                      Adidas Ultraboost W
                    </a>
                  </div>
                  <div class="pro-price">
                    <p class="">5,300,000₫</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="">
              <div class="product-block">
                <div class="product-img fade-box">
                  <a href="#" title="Adidas Ultraboost W" class="img-resize">
                    <img src="images/shoes/801432_01_b16d089f8bda434bacfe4620e8480be1_grande.jpg" alt="Adidas Ultraboost W"
                      class="lazyloaded">
                    <img src="images/shoes/shoes fade 4.jpg" alt="Adidas Ultraboost W" class="lazyloaded">
                  </a>
                 
                </div>
                <div class="product-detail clearfix">
                  <div class="pro-text">
                    <a style=" color: black;
                           font-size: 14px;text-decoration: none;" href="#" title="Adidas Ultraboost W" inspiration pack>
                      Adidas Ultraboost W
                    </a>
                  </div>
                  <div class="pro-price">
                    <p class="">5,300,000₫</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="">
              <div class="product-block">
                <div class="product-img fade-box">
                  <a href="#" title="Adidas Ultraboost W" class="img-resize">
                    <img src="images/shoes/801432_01_b16d089f8bda434bacfe4620e8480be1_grande.jpg" alt="Adidas Ultraboost W"
                      class="lazyloaded">
                    <img src="images/shoes/shoes fade 4.jpg" alt="Adidas Ultraboost W" class="lazyloaded">
                  </a>
                 
                </div>
                <div class="product-detail clearfix">
                  <div class="pro-text">
                    <a style=" color: black;
                           font-size: 14px;text-decoration: none;" href="#" title="Adidas Ultraboost W" inspiration pack>
                      Adidas Ultraboost W
                    </a>
                  </div>
                  <div class="pro-price">
                    <p class="">5,300,000₫</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="">
              <div class="product-block">
                <div class="product-img fade-box">
                  <a href="#" title="Adidas Ultraboost W" class="img-resize">
                    <img src="images/shoes/801432_01_b16d089f8bda434bacfe4620e8480be1_grande.jpg" alt="Adidas Ultraboost W"
                      class="lazyloaded">
                    <img src="images/shoes/shoes fade 4.jpg" alt="Adidas Ultraboost W" class="lazyloaded">
                  </a>
                 
                </div>
                <div class="product-detail clearfix">
                  <div class="pro-text">
                    <a style=" color: black;
                           font-size: 14px;text-decoration: none;" href="#" title="Adidas Ultraboost W" inspiration pack>
                      Adidas Ultraboost W
                    </a>
                  </div>
                  <div class="pro-price">
                    <p class="">5,300,000₫</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
      </div>




      </div>
    </section>
    <section class="">
      <div class="content">
        <div class="container">
          <div class="hot_sp">
            <h2 style="text-align:center;padding-top: 10px">
              <a style="font-size: 28px;color: black;text-decoration: none" href="">Bài viết mới nhất</a>
            </h2>
            <br />
          </div>
        </div>
      </div>
      <!--New-->
      <div>

        <div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="post_item">
                <div class="post_featured">
                  <a href="#" title="Adidas EQT Cushion ADV">
                    <img class="img-resize" style="padding-bottom:15px;" src="images/shoes/new-1.jpg"
                      alt="Adidas Falcon nổi bật mùa Hè với phối màu color block">
                  </a>
                </div>
                <div class="pro-text">
                  <span class="post_info_item">

                    Thứ Ba 11,06,2019

                  </span>
                </div>
                <div class="pro-text">
                  <h3 class="post_title">
                    <a style=" color: black;
                                  font-size: 18px;text-decoration: none;" href="#" inspiration pack>
                      Adidas Falcon nổi bật mùa Hè với phối màu color block
                    </a>
                  </h3>
                </div>
                <div style="text-align:center; padding-bottom: 30px;">
                  <span>Cuối tháng 5, adidas Falcon đã cho ra mắt nhiều phối màu đón chào mùa Hè khiến giới trẻ yêu
                    thích không thôi. Tưởng chừng thương hiệu sẽ tiếp tục...</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="post_item">
                <div class="post_featured">
                  <a href="#" title="Adidas EQT Cushion ADV">
                    <img class="img-resize" style="padding-bottom:15px;" src="images/shoes/new-2.jpg"
                      alt="Saucony hồi sinh mẫu giày chạy bộ cổ điển của mình – Aya Runner">
                  </a>
                </div>
                <div class="pro-text">
                  <span class="post_info_item">

                    Thứ Ba 11,06,2019

                  </span>
                </div>
                <div class="pro-text">
                  <h3 class="post_title">
                    <a style=" color: black;
                                                  font-size: 18px;text-decoration: none;" href="#" inspiration pack>
                      Saucony hồi sinh mẫu giày chạy bộ cổ điển của mình – Aya Runner
                    </a>
                  </h3>
                </div>
                <div style="text-align:center; padding-bottom: 30px;">
                  <span>Là một trong những đôi giày chạy bộ tốt nhất vào những năm 1994, 1995, Saucony Aya Runner vừa có
                    màn trở lại
                    vô cùng ấn tượngCó vẻ như 2019...</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="post_item">
                <div class="post_featured">
                  <a href="#" title="Adidas EQT Cushion ADV">
                    <img class="img-resize" style="padding-bottom:15px;" src="images/shoes/new-3.jpg"
                      alt="Nike Vapormax Plus trở lại với sắc tím mộng mơ và thiết kế chuyển màu đẹp mắt">
                  </a>
                </div>
                <div class="pro-text">
                  <span class="post_info_item">

                    Thứ Ba 11,06,2019

                  </span>
                </div>
                <div class="pro-text">
                  <h3 class="post_title">
                    <a style=" color: black;
                                      font-size: 18px;text-decoration: none;" href="#" inspiration pack>
                      Nike Vapormax Plus trở lại với sắc tím mộng mơ và thiết kế chuyển màu đẹp mắt
                    </a>
                  </h3>
                </div>
                <div style="text-align:center; padding-bottom: 30px;">
                  <span>Là một trong những mẫu giày retro có nhiều phối màu gradient đẹp nhất từ trước đến này, Nike
                    Vapormax Plus vừa có màn trở lại bá đạo dành cho...</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  <script async defer crossorigin="anonymous" src="plugins/sdk.js"></script>
  <script src="plugins/jquery-3.4.1/jquery-3.4.1.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="plugins/bootstrap/popper.min.js"></script>
  <script src="plugins/bootstrap/bootstrap.min.js"></script>
  <script src="plugins/owl.carousel/owl.carousel.min.js"></script>
  <script src="js/home.js"></script>
  <script src="js/script.js"></script>
  <script src="plugins/uikit/uikit.min.js"></script>
  <script src="plugins/uikit/uikit-icons.min.js"></script>

  <?php
include("footer.php");


?>

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