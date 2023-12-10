<?php
include 'connection.php';
session_start();
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="cart-container">
            <div class="cart-header">
                <h2>Giỏ hàng của bạn</h2>
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
                    <div class="cart-item">
                        <img src="<?= $product['duong_dan_anh'] ?>" alt="<?= $product['ten_hang'] ?>">
                        <span><?= $product['ten_hang'] ?></span>
                        <p>Giá: <?= number_format($product['don_Gia']) ?>₫</p>
                        <!-- Thêm nút xóa -->
                        <form method="post" action="cart_1.php">
                            <input type="hidden" name="product_id" value="<?= $product['Ma_hang'] ?>">
                            <button type="submit" name="remove_from_cart" class="remove-button">Xóa</button>
                        </form>
                    </div>
                <?php endforeach; ?>
                <div class="cart-total">
                    <p>Tổng cộng: <?= number_format($total_price) ?>₫</p>
                </div>
                <div class="cart-actions">
                    <a href="thanhtoan.php">Thanh toán</a>
                    <a href="SANPHAM.php">Tiếp tục mua hàng</a>
                </div>
            <?php else : ?>
                <p class="cart-empty">Giỏ hàng của bạn đang trống.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>


</html>
<style>
    .container {
        margin: 30px 200px;
        max-width: 70%;
    }

    .cart-item {
        border-bottom: 1px solid #ccc;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .cart-item img {
        max-width: 80px;
        max-height: 80px;
        margin-right: 10px;
        border-radius: 5px;
    }

    .cart-item span {
        flex-grow: 1;
    }

    .cart-item p {
        margin-left: 10px;
        margin-right: 30px;
    }

    .remove-button {
        background-color: #ff3333;
        color: white;
        padding: 5px 10px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
    }

    .remove-button:hover {
        background-color: #cc0000;
    }

    .cart-actions {
        margin-top: 20px;
    }

    .cart-actions a {
        padding: 10px;
        margin-right: 10px;
        background-color: #4caf50;
        color: white;
        border: none;
        text-decoration: none;
        cursor: pointer;
        border-radius: 4px;
    }

    .cart-actions a:hover {
        background-color: #45a049;
    }

    .cart-empty {
        font-weight: bold;
    }
</style>
