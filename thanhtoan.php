<?php
session_start();
include 'connection.php';
// Kiểm tra xem đã đăng nhập chưa sử dụng cookies
if (isset($_COOKIE["user_id"])) {
    $user_id =$_COOKIE["user_id"];
} else {
    header("Location: dangnhap.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="checkout-container">
            <div class="checkout-header">
                <h2>Xác nhận thanh toán</h2>
            </div>
            <?php if (!empty($_SESSION['cart'])) : ?>
                <?php
                $total_price = 0;
                foreach ($_SESSION['cart'] as $product_id) :
                    $query_product = "SELECT * FROM hanghoa WHERE Ma_hang = $product_id";
                    $result_product = mysqli_query($connection, $query_product);
                    $product = mysqli_fetch_assoc($result_product);
                    $total_price += $product['don_Gia'];
                ?>
                    <div class="checkout-item">
                        <img src="<?= $product['duong_dan_anh'] ?>" alt="<?= $product['ten_hang'] ?>">
                        <span><?= $product['ten_hang']?></span>
                        <p>Giá: <?= number_format($product['don_Gia'])?>₫</p>
                    </div>
                <?php endforeach; ?>
                <div class="total-price">
                    <p>Tổng cộng: <?= number_format($total_price) ?>₫</p>
                </div>
                <div class="checkout-form">
                    <form method="post" action="thanhtoan_xuly.php">
                        <!-- Thêm các trường thông tin đơn hàng và xác nhận thanh toán -->
                        <!-- Ví dụ: -->
                        <label for="ten_nguoi_nhan">Tên người nhận:</label>
                        <input type="text" name="ten_nguoi_nhan" required>

                        <label for="dia_chi_nguoi_nhan">Địa chỉ người nhận:</label>
                        <input type="text" name="dia_chi_nguoi_nhan" required>

                        <label for="sdt">Số điện thoại:</label>
                        <input type="text" name="sdt" required>

                        <label for="ghi_chu">Ghi chú:</label>
                        <textarea name="ghi_chu"></textarea>

                        <label for="ma_van_chuyen">Chọn dịch vụ vận chuyển:</label>
                        <select name="ma_van_chuyen">
                            <option value="1">Dịch vụ vận chuyển 1</option>
                            <option value="2">Dịch vụ vận chuyển 2</option>
                            <!-- Thêm các option khác nếu có -->
                        </select>

                        <button type="submit">Xác nhận đặt hàng</button>
                    </form>
                </div>
            <?php else : ?>
                <p class="cart-empty">Giỏ hàng của bạn đang trống.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>

<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    width: 80%;
    margin: auto;
    overflow: hidden;
}

.checkout-container {
    background: #fff;
    margin: 2% 0;
    padding: 2%;
    border: #e0e0e0 1px solid;
}

.checkout-header h2 {
    color: #333;
}

.checkout-summary h3 {
    color: #333;
}

.checkout-item img {
    width: 50px;
    height: auto;
    margin-right: 10px;
}

.checkout-item span {
    font-weight: bold;
}

.total-price p {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

.checkout-form label {
    display: block;
    margin: 10px 0;
    color: #333;
}

.checkout-form input,
.checkout-form textarea,
.checkout-form select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.checkout-form button {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.checkout-form button:hover {
    background-color: #45a049;
}

</style>