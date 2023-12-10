<?php
include("connection.php");
$query = "SELECT * FROM hanghoa LIMIT 12"; // Giả sử bạn muốn lấy 8 sản phẩm
$result = mysqli_query($connection, $query);

// Kiểm tra và hiển thị sản phẩm
if ($result) {
    echo '<div class="row">';

    // Lặp qua kết quả và hiển thị từng sản phẩm
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-md-3 col-sm-6 col-xs-6 col-6 product-block">';
        echo '<div class="product-img fade-box">';
        $id = $row['Ma_hang'];
        echo '<a target="_blank" href="CHITIETSP.php?id=' . $id . '" title="' . $row['ten_hang'] . '" class="img-resize">';
        
        echo '<img src="' . $row['duong_dan_anh'] . '" alt="' . $row['ten_hang'] . '" class="lazyloaded">';
        echo '</a>';
        echo '</div>';
        echo '<div class="product-detail clearfix">';
        echo '<div class="pro-text">';
        echo '<a style="color: black; font-size: 14px; text-decoration: none;" href="#" title="' . $row['ten_hang'] . '">' . $row['ten_hang'] . '</a>';
        echo '</div>';
        echo '<div class="pro-price">';
        echo '<p class="">' . number_format($row['don_Gia']) . '₫</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
} else {
    // Xử lý khi có lỗi truy vấn
    echo 'Lỗi truy vấn cơ sở dữ liệu: ' . mysqli_error($connection);
}

// Đóng kết nối cơ sở dữ liệu
mysqli_close($connection);
?>
 <style>
   /* Container cho các khối sản phẩm */
.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin: 20px auto; /* Căn lề trái và phải 300px, margin-top và margin-bottom 20px */
    max-width: 1500px; /* Đặt giá trị tối đa cho chiều rộng container */
}

/* Kiểu cho mỗi khối sản phẩm */
.product-block {
    border: 1px solid #e0e0e0;
    padding: 15px;
    margin: 10px;
    text-align: center;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
    flex: 1 0 22%; /* Tự động điều chỉnh kích thước khối sản phẩm */
    max-width: calc(22% - 20px); /* Tránh tràn khỏi container */
}

/* Hiệu ứng khi di chuột qua khối sản phẩm */
.product-block:hover {
    transform: translateY(-5px);
}

/* Kiểu cho hình ảnh */
.product-img img {
    max-width: 100%;
    height: auto;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Kiểu cho chi tiết sản phẩm */
.product-detail {
    margin-top: 10px;
}

/* Kiểu cho tên sản phẩm */
.pro-text a {
    color: #333;
    font-size: 16px;
    font-weight: bold;
    text-decoration: none;
    transition: color 0.3s ease-in-out;
}

/* Hiệu ứng khi di chuột qua tên sản phẩm */
.pro-text a:hover {
    color: #e44d26;
}

/* Kiểu cho giá */
.pro-price p {
    font-weight: bold;
    color: #e44d26;
    font-size: 18px;
    margin-top: 8px;
}

 </style>