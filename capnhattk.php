<?php
include 'connection.php';
session_start();

// Kiểm tra cookie đăng nhập
if (!isset($_COOKIE["user_id"])) {
    header("Location: dangnhap.php");
    exit();
}

$user_id = $_COOKIE["user_id"];

// Truy vấn thông tin người dùng từ cơ sở dữ liệu
$query_user = "SELECT * FROM taikhoan WHERE MaTaiKhoan = '$user_id'";
$result_user = mysqli_query($connection, $query_user);

if (!$result_user || mysqli_num_rows($result_user) === 0) {
    die("Không tìm thấy thông tin người dùng.");
}

$user_data = mysqli_fetch_assoc($result_user);

// Xử lý cập nhật thông tin khi form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận thông tin từ form
    $new_fullname = $_POST['new_fullname'];
    $new_email = $_POST['new_email'];
    $new_address = $_POST['new_address'];

    // Cập nhật thông tin trong cơ sở dữ liệu
    $update_query = "UPDATE taikhoan SET ho_ten = ?, Email = ?, dia_chi = ? WHERE MaTaiKhoan = ?";
    $stmt = mysqli_prepare($connection, $update_query);

    if ($stmt === false) {
        die("Lỗi: " . mysqli_error($connection));
    }

    mysqli_stmt_bind_param($stmt, "sssi", $new_fullname, $new_email, $new_address, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Cập nhật lại thông tin người dùng sau khi cập nhật
    $query_user = "SELECT * FROM taikhoan WHERE MaTaiKhoan = '$user_id'";
    $result_user = mysqli_query($connection, $query_user);
    $user_data = mysqli_fetch_assoc($result_user);

    header("Location: taikhoanNguoiDung.php");
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Thông Tin Tài Khoản</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="form-container">
    <h2>Cập Nhật Thông Tin Tài Khoản</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="new_fullname">Họ và Tên:</label>
            <input type="text" class="form-control" name="new_fullname" value="<?= $user_data['ho_ten'] ?>" required>
        </div>

        <div class="form-group">
            <label for="new_email">Email:</label>
            <input type="email" class="form-control" name="new_email" value="<?= $user_data['Email']  ?>" required>
        </div>

        <div class="form-group">
            <label for="new_address">Địa Chỉ:</label>
            <input type="text" class="form-control" name="new_address" value="<?= $user_data['dia_chi'] ?>" required>
        </div>

        <input type="submit" class="btn btn-primary" value="Cập Nhật">
    </form>
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

.form-container {
    width: 400px;
    margin: 50px auto;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    background-color: #fff;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    box-sizing: border-box;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #0056b3;
}
</style>