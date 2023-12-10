<?php

if (!isset($_COOKIE["user_id"])) {
    header("Location: dangnhap.php");
    exit();
  }
include 'connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST['comment'];
    $product_id = $_POST['product_id'];
    $user_id =$_COOKIE["user_id"];  // Điều chỉnh dựa trên cách bạn quản lý phiên đăng nhập

    // Thực hiện truy vấn để chèn bình luận vào cơ sở dữ liệu
    $query = "INSERT INTO `binhluan` (`ND_binh_luan`, `Ngy_dang`, `MaTaiKhoan`, `Ma_hang`) VALUES ('$comment', NOW(), '$user_id', '$product_id')";
    mysqli_query($connection, $query);
   

    // Chuyển hướng hoặc thực hiện các hành động khác sau khi thêm bình luận
    header("Location: CHITIETSP.php?id=$product_id");
    exit();
}
?>

