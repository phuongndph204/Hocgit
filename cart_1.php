<?php
include 'connection.php';

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Thêm sản phẩm vào giỏ hàng
    if (isset($_POST['add_to_cart'])) {
        $product_id = $_POST['product_id'];
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        array_push($_SESSION['cart'], $product_id);
    }

    // Xóa sản phẩm khỏi giỏ hàng
    if (isset($_POST['remove_from_cart'])) {
        $product_id = $_POST['product_id'];
        if (($key = array_search($product_id, $_SESSION['cart'])) !== false) {
            unset($_SESSION['cart'][$key]);
        }
    }

    // Chuyển hướng sau khi xử lý dữ liệu
    header("Location: cart.php");
    exit();
}
?>