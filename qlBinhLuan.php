<?php
$connection = mysqli_connect('localhost', 'root', '', 'duan1');
mysqli_query($connection, "SET NAMES 'utf8'");
session_start();

// Kiểm tra kết nối
if (!$connection) {
    exit('Kết nối không thành công!');
}

// Kiểm tra đăng nhập
if (!isset($_COOKIE["user_id"])) {
    header("Location: dangnhap.php");
    exit();
}

// Hàm để lấy danh sách bình luận
function getListBinhLuan($connection) {
    $sql = "SELECT binhluan.*, taikhoan.Tai_khoan 
            FROM binhluan 
            INNER JOIN taikhoan ON binhluan.MaTaiKhoan = taikhoan.MaTaiKhoan
            ORDER BY Ngy_dang DESC"; // Sắp xếp theo NgayDang giảm dần

    $result = mysqli_query($connection, $sql);

    echo "<h2>Danh sách bình luận:</h2>";
    echo "<div class='table-container'>";
    echo "<table>";
    echo "<thead><tr><th>ID</th><th>Tài khoản</th><th>Nội dung</th><th>Ngày đăng</th><th>Thao tác</th></tr></thead>";
    echo "<tbody>";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row["Ma_binh_luan"]}</td>";
            echo "<td>{$row["Tai_khoan"]}</td>";
            echo "<td>{$row["ND_binh_luan"]}</td>";
            echo "<td>{$row["Ngy_dang"]}</td>";
            echo "<td>
                  <a class='btn delete' href='?action=delete&id={$row["Ma_binh_luan"]}'>Xóa</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Không có bình luận nào.</td></tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo '<a href="admin.php"><button>trang Admin</button></a>';
}



// Hàm để sửa thông tin bình luận
function suaBinhLuan($connection, $maBinhLuan, $noiDung, $nguoiBinhLuan) {
    $sql = "UPDATE binhluan 
            SET ND_binh_luan='$noiDung', Tai_khoan='$nguoiBinhLuan' 
            WHERE MaBinhLuan=$maBinhLuan";

    if (mysqli_query($connection, $sql)) {
        echo "<p class='success'>Cập nhật bình luận thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi cập nhật bình luận: " . mysqli_error($connection) . "</p>";
    }
}

// Hàm để xóa bình luận
function xoaBinhLuan($connection, $maBinhLuan) {
    $sql = "DELETE FROM binhluan WHERE Ma_binh_luan=$maBinhLuan";

    if (mysqli_query($connection, $sql)) {
        echo "<p class='success'>Xóa bình luận thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi xóa bình luận: " . mysqli_error($connection) . "</p>";
    }
}

// Xử lý các hành động
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        
        case 'delete':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                xoaBinhLuan($connection, $id);
            }
            break;
    }
}



// Sử dụng hàm để lấy danh sách và hiển thị
getListBinhLuan($connection);

// Đóng kết nối
mysqli_close($connection);
?>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 20px 300px 100px 300px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    .success,
    .error {
        margin-top: 10px;
        padding: 10px;
        border-radius: 5px;
    }

    .success {
        background-color: #d4edda;
        color: #155724;
    }

    .error {
        background-color: #f8d7da;
        color: #721c24;
    }

    .form-container,
    .table-container {
        margin-top: 20px;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-container h2,
    .table-container h2 {
        margin-bottom: 10px;
    }

    .form-container form {
        display: grid;
        grid-gap: 10px;
    }

    .form-container input {
        padding: 8px;
    }

    .btn {
        padding: 10px 15px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        color: #fff;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
    }

    .btn.add {
        background-color: #4caf50;
    }

    .btn.edit {
        background-color: #2196F3;
    }

    .btn.delete {
        background-color: #f44336;
    }

    @media only screen and (max-width: 600px) {
        body {
            padding: 0 10px;
        }
    }

    #edit-form {
        display: none;
    }
</style>
