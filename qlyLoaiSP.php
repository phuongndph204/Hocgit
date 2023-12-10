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

// ... (Existing code for account management and product management)

// Hàm để lấy danh sách loại hàng
function getListLoaiHang($connection) {
    $sql = "SELECT * FROM loaihang";
    $result = mysqli_query($connection, $sql);

    echo "<h2>Danh sách loại hàng:</h2>";
    echo "<div class='table-container'>";
    echo "<table>";
    echo "<thead><tr><th>ID</th><th>Tên loại</th><th>Thao tác</th></tr></thead>";
    echo "<tbody>";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row["Ma_loai"]}</td>";
            echo "<td>{$row["Ten_loai"]}</td>";
            echo "<td>
                  <a class='btn edit' href='?action=edit&id={$row["Ma_loai"]}'>Sửa</a>
                  <a class='btn delete' href='?action=delete&id={$row["Ma_loai"]}'>Xóa</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Không có loại hàng nào.</td></tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}

// Hàm để thêm loại hàng mới
function themLoaiHang($connection, $tenLoai) {
    $sql = "INSERT INTO loaihang (Ten_loai) VALUES ('$tenLoai')";

    if (mysqli_query($connection, $sql)) {
        echo "<p class='success'>Thêm loại hàng thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi thêm loại hàng: " . mysqli_error($connection) . "</p>";
    }
}

// Hàm để sửa thông tin loại hàng
function suaLoaiHang($connection, $maLoai, $tenLoai) {
    $sql = "UPDATE loaihang SET Ten_loai='$tenLoai' WHERE Ma_loai=$maLoai";

    if (mysqli_query($connection, $sql)) {
        echo "<p class='success'>Cập nhật loại hàng thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi cập nhật loại hàng: " . mysqli_error($connection) . "</p>";
    }
}

// Hàm để xóa loại hàng
function xoaLoaiHang($connection, $maLoai) {
    $sql = "DELETE FROM loaihang WHERE Ma_loai=$maLoai";

    if (mysqli_query($connection, $sql)) {
        echo "<p class='success'>Xóa loại hàng thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi xóa loại hàng: " . mysqli_error($connection) . "</p>";
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
                echo "<h2>Sửa thông tin loại hàng:</h2>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='action' value='update'>";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "Tên loại: <input type='text' name='tenLoai' required><br>";
                echo "<input class='btn add' type='submit' value='Lưu'>";
                echo "</form>";
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $tenLoai = $_POST['tenLoai'];
                    suaLoaiHang($connection, $id, $tenLoai);
                }

                // Lấy thông tin loại hàng để hiển thị trong form
                $result = mysqli_query($connection, "SELECT * FROM loaihang WHERE Ma_loai=$id");
                $row = mysqli_fetch_assoc($result);

                if ($row) {
                    echo "<script>";
                    echo "document.getElementsByName('tenLoai')[0].value = '{$row['Ten_loai']}';";
                    echo "document.getElementById('edit-form').style.display = 'block';";
                    echo "</script>";
                }

                echo "</div>";
            }
            break;

        case 'update':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $tenLoai = $_POST['tenLoai'];
                suaLoaiHang($connection, $id, $tenLoai);
            }
            break;

        case 'delete':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                xoaLoaiHang($connection, $id);
            }
            break;
    }
}

// Hiển thị form thêm mới
echo "<div class='form-container' id='add-form'>";
echo "<h2>Thêm mới loại hàng:</h2>";
echo "<form method='post' action=''>";
echo "<input type='hidden' name='action' value='add'>";
echo "Tên loại: <input type='text' name='tenLoai' required><br>";
echo "<input class='btn add' type='submit' value='Thêm'>";
echo "</form>";
echo "</div>";
echo '<a href="admin.php"><button>trang Admin</button></a>';
// Xử lý thêm mới
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $tenLoai = $_POST['tenLoai'];
    themLoaiHang($connection, $tenLoai);
}

// Sử dụng hàm để lấy danh sách và hiển thị
getListLoaiHang($connection);

// Đóng kết nối
mysqli_close($connection);
?>

<style>
    /* Existing styles */

    /* Add new styles for product category management */
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

    .form-container input,
    .form-container select,
    .form-container textarea {
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
