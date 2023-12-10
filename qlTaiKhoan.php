<?php
$connection = mysqli_connect('localhost', 'root', '', 'duan1');
mysqli_query($connection, "SET NAMES 'utf8'");
session_start();
if (!$connection) {
    exit('Kết nối không thành công!');
}
if (!isset($_COOKIE["user_id"])) {
    header("Location: dangnhap.php");
    exit();
}
// Hàm để lấy danh sách tài khoản
function getListTaiKhoan($connection) {
    $sql = "SELECT * FROM taikhoan";
    $result = mysqli_query($connection, $sql);

    echo "<h2>Danh sách tài khoản:</h2>";
    echo "<div class='table-container'>";
    echo "<table>";
    echo "<thead><tr><th>ID</th><th>Tài khoản</th><th>Họ tên</th><th>Thao tác</th></tr></thead>";
    echo "<tbody>";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row["MaTaiKhoan"]}</td>";
            echo "<td>{$row["Tai_khoan"]}</td>";
            echo "<td>{$row["ho_ten"]}</td>";
            echo "<td>
                  <a class='btn edit' href='?action=edit&id={$row["MaTaiKhoan"]}'>Sửa</a>
                  <a class='btn delete' href='?action=delete&id={$row["MaTaiKhoan"]}'>Xóa</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Không có tài khoản nào.</td></tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}

// Hàm để thêm tài khoản mới
function themTaiKhoan($connection, $taiKhoan, $matKhau, $hoTen, $email, $diaChi, $vaiTro) {
    $sql = "INSERT INTO taikhoan (Tai_khoan, Mat_khau, ho_ten, Email, dia_chi, vai_tro) 
            VALUES ('$taiKhoan', '$matKhau', '$hoTen', '$email', '$diaChi', '$vaiTro')";

    if (mysqli_query($connection, $sql)) {
        echo "<p class='success'>Thêm tài khoản thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi thêm tài khoản: " . mysqli_error($connection) . "</p>";
    }
}

// Hàm để sửa thông tin tài khoản
function suaTaiKhoan($connection, $maTaiKhoan, $hoTen, $email, $diaChi, $vaiTro) {
    $sql = "UPDATE taikhoan 
            SET ho_ten='$hoTen', Email='$email', dia_chi='$diaChi', vai_tro='$vaiTro' 
            WHERE MaTaiKhoan=$maTaiKhoan";

    if (mysqli_query($connection, $sql)) {
        echo "<p class='success'>Cập nhật tài khoản thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi cập nhật tài khoản: " . mysqli_error($connection) . "</p>";
    }
}

// Hàm để xóa tài khoản
function xoaTaiKhoan($connection, $maTaiKhoan) {
    $sql = "DELETE FROM taikhoan WHERE MaTaiKhoan=$maTaiKhoan";

    if (mysqli_query($connection, $sql)) {
        echo "<p class='success'>Xóa tài khoản thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi xóa tài khoản: " . mysqli_error($connection) . "</p>";
    }
}

// Xử lý các hành động
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'edit':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                // Hiển thị form sửa
                echo "<div class='form-container' id='edit-form'>";
                echo "<h2>Sửa thông tin tài khoản:</h2>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='action' value='update'>";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "Họ tên: <input type='text' name='hoTen' required><br>";
                echo "Email: <input type='email' name='email' required><br>";
                echo "Địa chỉ: <input type='text' name='diaChi'><br>";
                echo "Vai trò: <input type='text' name='vaiTro' required><br>";
                echo "<input class='btn add' type='submit' value='Lưu'>";
                echo "</form>";
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $hoTen = $_POST['hoTen'];
                    $email = $_POST['email'];
                    $diaChi = $_POST['diaChi'];
                    $vaiTro = $_POST['vaiTro'];
                    suaTaiKhoan($connection, $id, $hoTen, $email, $diaChi, $vaiTro);
                }

                // Lấy thông tin tài khoản để hiển thị trong form
                $result = mysqli_query($connection, "SELECT * FROM taikhoan WHERE MaTaiKhoan=$id");
                $row = mysqli_fetch_assoc($result);

                if ($row) {
                    echo "<script>";
                    echo "document.getElementsByName('hoTen')[0].value = '{$row['ho_ten']}';";
                    echo "document.getElementsByName('email')[0].value = '{$row['Email']}';";
                    echo "document.getElementsByName('diaChi')[0].value = '{$row['dia_chi']}';";
                    echo "document.getElementsByName('vaiTro')[0].value = '{$row['vai_tro']}';";
                    echo "document.getElementById('edit-form').style.display = 'block';";
                    echo "</script>";
                }

                echo "</div>";
            }
            break;

        case 'update':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $hoTen = $_POST['hoTen'];
                $email = $_POST['email'];
                $diaChi = $_POST['diaChi'];
                $vaiTro = $_POST['vaiTro'];
                suaTaiKhoan($connection, $id, $hoTen, $email, $diaChi, $vaiTro);
            }
            break;

        case 'delete':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                xoaTaiKhoan($connection, $id);
            }
            break;
    }
}

// Hiển thị form thêm mới
echo "<div class='form-container' id='add-form'>";
echo "<h2>Thêm mới tài khoản:</h2>";
echo "<form method='post' action=''>";
echo "<input type='hidden' name='action' value='add'>";
echo "Tài khoản: <input type='text' name='taiKhoan' required><br>";
echo "Mật khẩu: <input type='password' name='matKhau' required><br>";
echo "Họ tên: <input type='text' name='hoTen' required><br>";
echo "Email: <input type='email' name='email' required><br>";
echo "Địa chỉ: <input type='text' name='diaChi'><br>";
echo "Vai trò: <input type='text' name='vaiTro' required><br>";
echo "<input class='btn add' type='submit' value='Thêm'>";
echo "</form>";
echo "</div>";
echo '<a href="admin.php"><button>trang Admin</button></a>';
// Xử lý thêm mới
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $taiKhoan = $_POST['taiKhoan'];
    $matKhau = $_POST['matKhau'];
    $hoTen = $_POST['hoTen'];
    $email = $_POST['email'];
    $diaChi = $_POST['diaChi'];
    $vaiTro = $_POST['vaiTro'];
    themTaiKhoan($connection, $taiKhoan, $matKhau, $hoTen, $email, $diaChi, $vaiTro);
}

// Sử dụng hàm để lấy danh sách và hiển thị
getListTaiKhoan($connection);

// Đóng kết nối
mysqli_close($connection);
?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 20px 300px 100px 300px; /* Căn lề 2 bên trái phải mỗi bên tầm 500px, 2 bên dưới tầm 300px */
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
