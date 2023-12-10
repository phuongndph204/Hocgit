<?php
include 'connection.php';
session_start();
// Kiểm tra xem đã đăng nhập chưa sử dụng cookies
if (isset($_COOKIE["user_id"])) {
    $user_id = $_COOKIE["user_id"];
} else {
    // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
    header("location:dangnhap.php");
    exit();
}

// Kiểm tra xem có sản phẩm trong giỏ hàng không
if (empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

// Lấy thông tin sản phẩm từ giỏ hàng
$cart_items = $_SESSION['cart'];
$query_cart_items = "SELECT * FROM hanghoa WHERE Ma_hang IN (" . implode(",", $cart_items) . ")";
$result_cart_items = mysqli_query($connection, $query_cart_items);

// Tính tổng giá trị đơn hàng
$total_price = 0;
while ($item = mysqli_fetch_assoc($result_cart_items)) {
    $total_price += $item['don_Gia'];
}

// Xử lý đặt hàng khi người dùng xác nhận
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận thông tin từ form
    $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
    $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
    $sdt = $_POST['sdt'];
    $ghi_chu = $_POST['ghi_chu'];
    $ngay_dat = date("Y-m-d H:i:s");
    $ma_trang_thai = 1; // Mặc định là "Đang đóng hàng"

    // Kiểm tra xem biến $_POST['ma_van_chuyen'] có tồn tại không
    $ma_van_chuyen = isset($_POST['ma_van_chuyen']) ? $_POST['ma_van_chuyen'] : null;

    // Kiểm tra nếu $ma_van_chuyen không tồn tại hoặc là null
    if ($ma_van_chuyen === null) {
        die("Lỗi: Vui lòng chọn dịch vụ vận chuyển.");
    }

    // Insert thông tin đơn hàng vào cơ sở dữ liệu
    $insert_query = "INSERT INTO donhang (ten_nguoi_nhan, Dia_chi_nguoi_nhan, sdt, ghi_chu, ngay_dat, tong_gia, Ma_trang_thai, Ma_van_chuyen, MaTaiKhoan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $insert_query);

    // Kiểm tra nếu có lỗi khi chuẩn bị câu lệnh SQL
    if ($stmt === false) {
        die("Câu lệnh SQL không hợp lệ: " . mysqli_error($connection));
    }

    // Liên kết các tham số với câu lệnh SQL
    mysqli_stmt_bind_param($stmt, "ssssdsiii", $ten_nguoi_nhan, $dia_chi_nguoi_nhan, $sdt, $ghi_chu, $ngay_dat, $total_price, $ma_trang_thai, $ma_van_chuyen, $user_id);

    // Thực thi câu lệnh SQL
    mysqli_stmt_execute($stmt);

    // Kiểm tra nếu có lỗi khi thực thi câu lệnh SQL
    if (mysqli_stmt_errno($stmt) !== 0) {
        die("Lỗi khi thực thi câu lệnh SQL: " . mysqli_stmt_error($stmt));
    }

    // Lấy ID đơn hàng vừa được tạo
    $donhang_id = mysqli_insert_id($connection);

    // Đóng câu lệnh SQL
    mysqli_stmt_close($stmt);

    // Xóa giỏ hàng sau khi đặt hàng thành công
    unset($_SESSION['cart']);
    $_SESSION['order_success'] = true;

    // Chuyển hướng sau khi đặt hàng thành công
    header("Location: taikhoanNguoiDung.php");
    exit();
}
?>
