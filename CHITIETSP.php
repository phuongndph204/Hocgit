<?php

include("header.php");
?>

<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $maHang = $_GET['id'];

    $sql = "SELECT * FROM hanghoa WHERE Ma_hang = $maHang";
    $result = mysqli_query($connection, $sql);

     // Truy vấn thông tin về các Size của sản phẩm
     $sql_sizes = "SELECT * FROM size ";
     $result_sizes = mysqli_query($connection, $sql_sizes);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['ten_hang']; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>



    <div class="container" id="main">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="name"><?php echo $row['ten_hang']; ?></h2>
                <p class="DG1"><strong class="DG">Đơn giá:</strong> <?php echo number_format($row['don_Gia']); ?> VND
                </p>
                <p class="MT"><strong>Mô tả:</strong> <?php echo $row['mo_ta']; ?></p>
                <!-- Hiển thị danh sách Size -->
                <label for="sizeSelect"><strong>Kích thước:</strong></label>
                <select id="sizeSelect" name="sizeSelect" class="form-control">
                    <?php
    while ($size_row = mysqli_fetch_assoc($result_sizes)) {
        echo "<option value='{$size_row['Size']}'>{$size_row['Size']}</option>";
    }
    ?>
                </select>


                <div id="comment-section" style="margin-top: 400px;">

                </div>

            </div>




            <div class="col-lg-4">
                <img id="product-image" src="<?php echo $row['duong_dan_anh']; ?>"
                    alt="<?php echo $row['ten_hang']; ?>">
                <!-- Nút thêm vào giỏ hàng -->
                <form method="post" action="cart_1.php">
                    <input type="hidden" name="product_id" value="<?= $row['Ma_hang'] ?>">
                    <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
                </form>


            </div>
        </div>


        <div class="container1">

            <h1 class="tieudebl">Bình luận</h1>
            <?php

              
// Thực hiện truy vấn để lấy các bình luận của sản phẩm
$product_id = $_GET['id'];  // Điều chỉnh cách bạn lấy ID sản phẩm từ URL
$query_comments = "SELECT binhluan.*, taikhoan.Tai_khoan FROM `binhluan` JOIN `taikhoan` ON binhluan.MaTaiKhoan = taikhoan.MaTaiKhoan WHERE `Ma_hang` = '$product_id'";
$result_comments = mysqli_query($connection, $query_comments);

// Hiển thị danh sách bình luận
while ($comment = mysqli_fetch_assoc($result_comments)) {
    echo '<div>';
    echo '<p class="ten">Người đăng: ' . $comment['Tai_khoan'] . '</p>';
    echo '<p>Bình luận: ' . $comment['ND_binh_luan'] . '</p>';
    echo '<p>Ngày đăng: ' . $comment['Ngy_dang'] . '</p>';
    echo '<br>';
    echo '</div>';
}


              ?>



            <div id="comment-form">

                <h4>Viết bình luận</h4>
                <form action="submit_comment.php" method="post">
                    <div class="form-group">
                        <label for="comment">Bình luận:</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                    </div>
                    <input type="hidden" name="product_id" value="<?= $maHang ?>">
                    <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                </form>


            </div>

</body>

</html>

<?php
    } else {
        echo "Không tìm thấy sản phẩm.";
    }
} else {
    echo "Mã sản phẩm không hợp lệ.";
}

mysqli_close($connection);
?>





<h2 class="SPLQ">Sản phẩm liên quan</h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6 col-6">
            <div class="product-block">
                <div class="product-img fade-box">
                    <a href="#" title="Adidas EQT Cushion ADV" class="img-resize">
                        <img src="images/shoes/800502_01_e92c3b2bb8764b52a791846d84a3a360_grande.jpg"
                            alt="Adidas EQT Cushion ADV" class="lazyloaded">
                        <img src="images/shoes/shoes fade 1.jpg" alt="Adidas EQT Cushion ADV" class="lazyloaded">
                    </a>

                </div>
                <div class="product-detail clearfix">
                    <div class="pro-text">
                        <a style="color: black;
                            font-size: 14px;text-decoration: none;" href="#" title="Adidas EQT Cushion ADV" inspiration
                            pack>
                            Adidas EQT Cushion ADV "North America"
                        </a>
                    </div>
                    <div class="pro-price">
                        <p class="">7,000,000₫</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6 col-6">
            <div class="product-block">
                <div class="product-img fade-box">
                    <a href="#" title="Adidas Nmd R1" class="img-resize">
                        <img src="images/shoes/201493_1_017364c87c3e4802a8cda5259e3d5a95_grande.jpg" alt="Adidas Nmd R1"
                            class="lazyloaded">
                        <img src="images/shoes/shoes fade 2.jpg" alt="Adidas Nmd R1" class="lazyloaded">
                    </a>

                </div>
                <div class="product-detail clearfix">
                    <div class="pro-text">
                        <a style="color: black;
                            font-size: 14px;text-decoration: none;" title="Adidas Nmd R1" href="">
                            Adidas Nmd R1 "Villa Exclusive"
                        </a>
                    </div>
                    <div class="pro-price">
                        <p class="">7,000,000₫</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6 col-6">
            <div class="product-block">
                <div class="product-img fade-box">
                    <a href="#" title="Adidas PW Solar HU NMD" class="img-resize">
                        <img src="images/shoes/805266_02_b8b2cdd1782246febf8879a44a7e5021_grande.jpg"
                            alt="Adidas PW Solar HU NMD" class="lazyloaded">
                        <img src="images/shoes/shoes fade 3.jpg" alt="Adidas PW Solar HU NMD" class="lazyloaded">
                    </a>

                </div>
                <div class="product-detail clearfix">
                    <div class="pro-text">
                        <a style="color: black;
                            font-size: 14px;text-decoration: none;" href="#" title="Adidas PW Solar HU NMD" inspiration
                            pack>
                            Adidas PW Solar HU NMD "Inspiration Pack"
                        </a>
                    </div>
                    <div class="pro-price">
                        <p class="">5,000,000₫</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6 col-6">
            <div class="product-block">
                <div class="product-img fade-box">
                    <a href="#" title="Adidas Ultraboost W" class="img-resize">
                        <img src="images/shoes/801432_01_b16d089f8bda434bacfe4620e8480be1_grande.jpg"
                            alt="Adidas Ultraboost W" class="lazyloaded">
                        <img src="images/shoes/shoes fade 4.jpg" alt="Adidas Ultraboost W" class="lazyloaded">
                    </a>

                </div>
                <div class="product-detail clearfix">
                    <div class="pro-text">
                        <a style="color: black;
                            font-size: 14px;text-decoration: none;" href="#" title="Adidas Ultraboost W" inspiration
                            pack>
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

</div>
</div>
</div>
</div>




</main>




<!--gallery-->

<?php  
include("footer.php")
?>

<style>
  .tieudebl{
    font-size: 50px;
    
  }
.ten {

    font-weight: bold;
}

.container1 {
    max-width: 1400px;
    width: 100%;
    margin: 0 90px;
}

/* Form container */
#comment-form {
    max-width: 900px;
    margin: 20px;
}

/* Comment container */
#comments {
    max-width: 900px;
    margin: 20px auto;
}


#main {
    margin-top: 80px;
}

.container {
    width: 80%;
    margin: auto;
}

#product-image {
    max-width: 100%;
    height: auto;
}

.col-lg-8 {
    margin-bottom: 20px;
}

#comment-section {
    margin-top: 400px;
}

#comment-form {
    margin-top: 20px;
}

.btn-success {
    background-color: #28a745;
    border: none;
}

.btn-success:hover {
    background-color: #218838;
}

.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.SPLQ {
    margin: 70px;
    text-align: center;
}

.row {
    margin: 50px;
    max-width: 1400px;
    text-align: center;
    margin-right: 100px;
}

.col-lg-8 {
    text-align: left;
}

.MT {
    font-size: 17px;
    max-width: 600px;
}


.DG {
    font-size: 27px;

}

.DG1 {
    font-size: 25px;

}

.name {
    font-size: 40px;
}


/* CSS cho <select> */
#sizeSelect {
    width: 150px;
    /* Độ rộng của dropdown */
    padding: 8px;
    margin-top: 5px;
    font-size: 16px;
}

/* Ẩn mũi tên mặc định của dropdown */
#sizeSelect::-ms-expand {
    display: none;
}

#sizeSelect {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: url('arrow-down.png') no-repeat right;
    /* Đường dẫn đến mũi tên hoặc thay bằng Unicode của mũi tên */
}
</style>