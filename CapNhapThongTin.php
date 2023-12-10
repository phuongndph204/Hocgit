<?php
// Bắt đầu phiên làm việc (session)
session_start();

// Kiểm tra xem biến session 'username' đã được thiết lập hay chưa
if (isset($_SESSION['username'])) {
    // Người dùng đã đăng nhập
    echo 'Chào mừng, ' . $_SESSION['username'] . '!';
    // Đặt các hoạt động khi đã đăng nhập ở đây
} else {
    // Người dùng chưa đăng nhập
    echo 'Vui lòng đăng nhập để truy cập nội dung.';
    // Hoặc chuyển hướng đến trang đăng nhập
    header("Location: login.php");
    exit(); // Đảm bảo không có mã lệnh nào chạy sau header
}
?>