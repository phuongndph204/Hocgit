<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "duan1";

// Tạo kết nối
$connection = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($connection->connect_error) {
    die("Kết nối không thành công: " . $connection->connect_error);
}

// Đặt bảng kết nối về UTF-8
mysqli_query($connection, "SET NAMES 'utf8'");

// Kiểm tra xem cookie có tồn tại không
if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];

    // Truy vấn dữ liệu từ bảng chitietdonhang với điều kiện MaTaiKhoan
    $query = "SELECT * FROM chitietdonhang WHERE MaTaiKhoan = $user_id";
    
    $result = $connection->query($query);

    // Kiểm tra kết quả truy vấn
    if ($result) {
        echo "<h2>Thông tin chi tiết đơn hàng của bạn:</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Số lượng</th>
                    <th>Tổng giá</th>
                    <th>Mã hàng</th>
                    <th>Mã Size</th>
                    <th>Mã giỏ</th>
                    <th>Mã Tài khoản</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['so_luong']}</td>
                    <td>{$row['Tong_gia']}</td>
                    <td>{$row['Ma_hang']}</td>
                    <td>{$row['Ma_Size']}</td>
                    <td>{$row['Ma_gio']}</td>
                    <td>{$row['MaTaiKhoan']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "Lỗi truy vấn: " . $connection->error;
    }
} else {
    echo "Cookie 'user_id' không tồn tại.";
}

// Đóng kết nối
$connection->close();
?>
