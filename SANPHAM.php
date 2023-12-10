<?php
session_start();


include("header.php");
include("banner.php");


include 'connection.php';

// Lấy danh sách sản phẩm từ cơ sở dữ liệu
$query = "SELECT * FROM hanghoa";
$result = mysqli_query($connection, $query);

// Số sản phẩm trên mỗi trang
$products_per_page = 12;

// Xác định trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Tính toán giá trị OFFSET cho truy vấn SQL
$offset = ($page - 1) * $products_per_page;

// Lấy danh sách sản phẩm từ cơ sở dữ liệu với giá trị OFFSET
$query = "SELECT * FROM hanghoa LIMIT $offset, $products_per_page";
$result = mysqli_query($connection, $query);
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="plugins/animate/animate.min.css">

    <link rel="stylesheet" href="plugins/fontawesome/all.css">

    <link href="plugins/webfonts/font.css" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="plugins/uikit/uikit.min.css" />


    <title>Tất cả sản phẩm</title>

</head>

<body>


    <!-- ... (phần sidebar giữ nguyên) ... -->
    </div>
    </div>


    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12 sidebar-fix">
                <div class="wrap-filter">
                    <div class="box_sidebar">
                        <div class="block left-module">
                            <div class=" filter_xs">
                                <div class="group-menu">
                                    <div class="title_block d-block d-sm-none d-none d-sm-block d-md-none"
                                        data-toggle="collapse" href="#collapseExample1" role="button"
                                        aria-expanded="false" aria-controls="collapseExample1">
                                        Danh mục sản phẩm
                                        <span><i class="fa fa-angle-down" data-toggle="collapse"
                                                href="#collapseExample1" role="button" aria-expanded="false"
                                                aria-controls="collapseExample1"></i></span>
                                    </div>
                                    <div class="block_content layered-category collapse" id="collapseExample1">
                                        <div class="layered-content card card-body" style="border:0;padding:0">
                                            <ul class="menuList-links">
                                                <li class=""><a href="home.html" title="Trang chủ"><span>Trang
                                                            chủ</span></a></li>
                                                <li class=" active "><a href="product.html" title="Bộ sưu tập"><span>Bộ
                                                            sưu tập</span></a>
                                                </li>
                                                <li class="has-submenu level0 ">
                                                    <a title="Sản phẩm">Sản phẩm<span class="icon-plus-submenu"
                                                            data-toggle="collapse" href="#collapseExample" role="button"
                                                            aria-expanded="false"
                                                            aria-controls="collapseExample"></span></a>
                                                    <div class="collapse" id="collapseExample">
                                                        <div class="card card-body" style="border:0;padding-top:0;">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class=""><a href="introduce.html" title="Giới thiệu"><span>Giới
                                                            thiệu</span></a></li>
                                                <li class=""><a href="blog.html" title="Blog"><span>Blog</span></a></li>
                                                <li class=""><a href="contact.html" title="Liên hệ"><span>Liên
                                                            hệ</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="layered">
                                    <p class="title_block d-block d-sm-none d-none d-sm-block d-md-none"
                                        data-toggle="collapse" href="#collapseExample2" role="button"
                                        aria-expanded="false" aria-controls="collapseExample2">
                                        Bộ lọc sản phẩm
                                        <span><i class="fa fa-angle-down" data-toggle="collapse"
                                                href="#collapseExample2" role="button" aria-expanded="false"
                                                aria-controls="collapseExample2"></i></span>
                                    </p>
                                    <div class="block_content collapse" id="collapseExample2">
                                        <div class="group-filter card card-body" style="border:0;padding:0"
                                            aria-expanded="true">
                                            <div class="layered_subtitle dropdown-filter"><span>Giá sản phẩm</span><span
                                                    class="icon-control"><i class="fa fa-minus">

                                                    </i></span></div>
                                            <div class="layered-content bl-filter filter-brand">
                                                <ul class="check-box-list">
                                                    <li>
                                                        <input type="checkbox" id="data-brand-p1" value="Khác">
                                                        <label for="data-brand-p1">Khác</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="group-filter" aria-expanded="true">
                                            <div class="layered_subtitle dropdown-filter"><span>DANH MỤC</span><span
                                                    class="icon-control"><i class="fa fa-minus"></i></span></div>
                                            <div class="layered-content bl-filter filter-price">

                                                <div class="container" style="padding-bottom: 50px;">

                                                    <iframe src="a.php" width="200" height="200"
                                                        frameborder="0"  target="_blank"></iframe>


                                                </div>



                                            </div>
                                        </div>

                                        <div class="group-filter" aria-expanded="true">
                                            <div class="layered_subtitle dropdown-filter"><span>Màu sắc</span><span
                                                    class="icon-control"><i class="fa fa-minus"></i></span></div>
                                            <div class="layered-content filter-color s-filter">
                                                <ul class="check-box-list">
                                                    <li>
                                                        <input type="checkbox" id="data-color-p1">
                                                        <label for="data-color-p1"
                                                            style="background-color: #fb4727"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="data-color-p2">
                                                        <label for="data-color-p2"
                                                            style="background-color: #fdfaef"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="data-color-p3">
                                                        <label for="data-color-p3"
                                                            style="background-color: #3e3473"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="data-color-p4">
                                                        <label for="data-color-p4"
                                                            style="background-color: #ffffff"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="data-color-p5">
                                                        <label for="data-color-p5"
                                                            style="background-color: #75e2fb"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="data-color-p6">
                                                        <label for="data-color-p6"
                                                            style="background-color: #cecec8"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="data-color-p7">
                                                        <label for="data-color-p7"
                                                            style="background-color: #6daef4"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="data-color-p8">
                                                        <label for="data-color-p8"
                                                            style="background-color: #000000"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="data-color-p9">
                                                        <label for="data-color-p9"
                                                            style="background-color: #e2262a"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="data-color-p10">
                                                        <label for="data-color-p10"
                                                            style="background-color: #ee8aa1"></label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" id="data-color-p11">
                                                        <label for="data-color-p11"
                                                            style="background-color: #4a5250"></label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="group-filter" aria-expanded="true">
                                            <div class="layered_subtitle dropdown-filter"><span>Kích thước</span><span
                                                    class="icon-control"><i class="fa fa-minus"></i></span></div>
                                            <div class="layered-content filter-size s-filter">

                                                <ul class="check-box-list clearfix">

                                                    <li>
                                                        <input type="checkbox" id="data-size-p1">
                                                        <label for="data-size-p1">35</label>
                                                    </li>

                                                    <li>
                                                        <input type="checkbox" id="data-size-p2">
                                                        <label for="data-size-p2">36</label>
                                                    </li>

                                                    <li>
                                                        <input type="checkbox" id="data-size-p3">
                                                        <label for="data-size-p3">37</label>
                                                    </li>

                                                    <li>
                                                        <input type="checkbox" id="data-size-p4">
                                                        <label for="data-size-p4">38</label>
                                                    </li>

                                                    <li>
                                                        <input type="checkbox" id="data-size-p5">
                                                        <label for="data-size-p5">39</label>
                                                    </li>

                                                    <li>
                                                        <input type="checkbox" id="data-size-p6">
                                                        <label for="data-size-p6">40</label>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--List Prodct-->
            <div class="container">
                <div class="wrap-collection-title row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <h1 class="title">
                            Tất cả sản phẩm
                        </h1>
                        <div class="alert-no-filter"></div>
                    </div>
                </div>




                <div class="row">
                    <?php while ($row = mysqli_fetch_assoc($result)) :   $id = $row['Ma_hang'];?>
                    <div class="col-md-3 col-sm-6 col-xs-6 col-6 product-block">
                        <div class="product-img fade-box">
                            <img src="<?= $row['duong_dan_anh'] ?>" alt="<?= $row['ten_hang'] ?>" class="lazyloaded">
                        </div>
                        <div class="product-detail clearfix">
                            <div class="pro-text">
                                <a href="CHITIETSP.php?id= ' . $id . '"
                                    style="color: black; font-size: 14px; text-decoration: none;"
                                    title="<?= $row['ten_hang'] ?>">
                                    <?= $row['ten_hang'] ?>
                                </a>
                            </div>
                            <div class="pro-price">
                                <p class=""><?= number_format($row['don_Gia']) ?>₫</p>
                            </div>
                            <form method="post" action="cart_1.php">
                                <input type="hidden" name="product_id" value="<?= $row['Ma_hang'] ?>">
                                <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
                            </form>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <!-- Phân trang -->
            <div class="pagination">
                <?php
          // Lấy tổng số sản phẩm
          $total_products_query = "SELECT COUNT(*) as total FROM hanghoa";
          $total_products_result = mysqli_query($connection, $total_products_query);
          $total_products = mysqli_fetch_assoc($total_products_result)['total'];

          // Tính toán tổng số trang
          $total_pages = ceil($total_products / $products_per_page);

          
          for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='?page=$i'>$i</a>";
          }
          ?>
            </div>

            <script async defer crossorigin="anonymous" src="plugins/sdk.js"></script>
            <script src="plugins/jquery-3.4.1/jquery-3.4.1.min.js"></script>
            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
            <script src="plugins/bootstrap/popper.min.js"></script>
            <script src="plugins/bootstrap/bootstrap.min.js"></script>
            <script src="plugins/owl.carousel/owl.carousel.min.js"></script>
            <script src="plugins/uikit/uikit.min.js"></script>
            <script src="plugins/uikit/uikit-icons.min.js"></script>
</body>

</html>
<?php  
include("footer.php")
?>
<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
}

.row {}

.container {
    margin-top: 20px;
    max-width: 75%;
}

.product-block {
    margin-bottom: 20px;
}

.product-img img {
    width: 100%;
    height: auto;
}

.product-detail {
    padding: 10px;
}

.pro-text a {
    color: black;
    font-size: 14px;
    text-decoration: none;
}

.pro-price p {
    font-weight: bold;
}

.cart-container {
    max-width: 800px;
    margin: 0 auto;
}

.cart-header {
    background-color: #333;
    color: #fff;
    padding: 10px;
}

.cart-item {
    border-bottom: 1px solid #ccc;
    padding: 10px;
    display: flex;
    align-items: center;
}

.cart-item img {
    max-width: 80px;
    max-height: 80px;
    margin-right: 10px;
}

.cart-total {
    margin-top: 10px;
    text-align: right;
}

/* Add some styling to the "Thêm vào giỏ hàng" button */
button {
    background-color: #4caf50;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
}

button:hover {
    background-color: #45a049;
}

.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 100px;
    margin-left: 700px;
}

.pagination a {
    padding: 10px;
    margin: 0 5px;
    text-decoration: none;
    color: #007bff;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.pagination a:hover {
    background-color: #007bff;
    color: #fff;
}

.pagination .active {
    background-color: #007bff;
    color: #fff;
}
</style>