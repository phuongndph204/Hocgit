<?php
$connection = mysqli_connect('localhost', 'root', '', 'duan1');
mysqli_query($connection, "SET NAMES 'utf8'");

if (!$connection) {
    exit('Kết nối không thành công!');
}
if (!isset($_COOKIE["user_id"])) {
    header("Location: dangnhap.php");
    exit();
}

// ... (Existing code for account management)

// Function to get the list of orders
function getListDonHang($connection) {
    $sql = "SELECT donhang.*, trangthai.ten_trang_thai, vanchuyen.ten_van_chuyen, taikhoan.ho_ten 
            FROM donhang 
            JOIN trangthai ON donhang.Ma_trang_thai = trangthai.Ma_trang_thai
            JOIN vanchuyen ON donhang.Ma_van_chuyen = vanchuyen.Ma_van_chuyen
            JOIN taikhoan ON donhang.MaTaiKhoan = taikhoan.MaTaiKhoan";
    $result = mysqli_query($connection, $sql);

    echo "<h2>Danh sách đơn hàng:</h2>";
    echo "<div class='table-container'>";
    echo "<table>";
    echo "<thead><tr><th>ID</th><th>Người đặt</th><th>Ngày đặt</th><th>Tên người nhận</th><th>Trạng thái</th><th>Vận chuyển</th><th>Ghi chú</th><th>Thao tác</th></tr></thead>";
    echo "<tbody>";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["Ma_don_hang"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["ho_ten"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Ngay_dat"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["ten_nguoi_nhan"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["ten_trang_thai"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["ten_van_chuyen"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Ghi_chu"]) . "</td>";
            echo "<td>
                  <a class='btn edit' href='?action=edit&id=" . htmlspecialchars($row["Ma_don_hang"]) . "'>Sửa</a>
                  <a class='btn delete' href='?action=delete&id=" . htmlspecialchars($row["Ma_don_hang"]) . "'>Xóa</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'>Không có đơn hàng nào.</td></tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}

// Function to add a new order
function themDonHang($connection, $maKhach, $ngayDat, $tenNguoiNhan, $maTrangThai, $maVanChuyen, $ghiChu) {
    $sql = "INSERT INTO donhang (Ma_khach, Ngay_dat, ten_nguoi_nhan, Ma_trang_thai, Ma_van_chuyen, Ghi_chu) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 'isssis', $maKhach, $ngayDat, $tenNguoiNhan, $maTrangThai, $maVanChuyen, $ghiChu);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($stmt) {
        echo "<p class='success'>Thêm đơn hàng thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi thêm đơn hàng: " . mysqli_error($connection) . "</p>";
    }
}

// Function to update an existing order
function suaDonHang($connection, $maDonHang, $maKhach, $ngayDat, $tenNguoiNhan, $maTrangThai, $maVanChuyen, $ghiChu) {
    $sql = "UPDATE donhang 
            SET Ma_khach=?, Ngay_dat=?, ten_nguoi_nhan=?, 
                Ma_trang_thai=?, Ma_van_chuyen=?, Ghi_chu=? 
            WHERE Ma_don_hang=?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 'isssisi', $maKhach, $ngayDat, $tenNguoiNhan, $maTrangThai, $maVanChuyen, $ghiChu, $maDonHang);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($stmt) {
        echo "<p class='success'>Cập nhật đơn hàng thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi cập nhật đơn hàng: " . mysqli_error($connection) . "</p>";
    }
}

// Function to delete an order
function xoaDonHang($connection, $maDonHang) {
    $sql = "DELETE FROM donhang WHERE Ma_don_hang=?";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $maDonHang);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($stmt) {
        echo "<p class='success'>Xóa đơn hàng thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi xóa đơn hàng: " . mysqli_error($connection) . "</p>";
    }
}

// Handling actions
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'edit':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                // Display edit form
                echo "<div class='form-container' id='edit-form'>";
                echo "<h2>Sửa thông tin đơn hàng:</h2>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='action' value='update'>";
                echo "<input type='hidden' name='id' value='" . htmlspecialchars($id) . "'>";
                echo "Người đặt: <select name='maKhach' required>";
                $sqlKhachHang = "SELECT * FROM taikhoan";
                $resultKhachHang = mysqli_query($connection, $sqlKhachHang);
                while ($rowKhachHang = mysqli_fetch_array($resultKhachHang)) {
                    echo "<option value='" . htmlspecialchars($rowKhachHang["MaTaiKhoan"]) . "'>" . htmlspecialchars($rowKhachHang["ho_ten"]) . "</option>";
                }
                echo "</select><br>";
                echo "Ngày đặt: <input type='date' name='ngayDat' required><br>";
                echo "Tên người nhận: <input type='text' name='tenNguoiNhan' required><br>";
                echo "Trạng thái: 
                      <select name='maTrangThai' required>
                        <option value='1'>Đã đặt hàng</option>
                        <!-- Add more options as needed -->
                      </select><br>";
                echo "Vận chuyển: 
                      <select name='maVanChuyen' required>
                        <option value='1'>Giao hàng nhanh</option>
                        <!-- Add more options as needed -->
                      </select><br>";
                echo "Ghi chú: <textarea name='ghiChu'></textarea><br>";
                echo "<input class='btn add' type='submit' value='Lưu'>";
                echo "</form>";

                // Get order information to display in the form
                $result = mysqli_query($connection, "SELECT * FROM donhang WHERE Ma_don_hang='" . htmlspecialchars($id) . "'");
                $row = mysqli_fetch_array($result);

                if ($row) {
                    echo "<script>";
                    echo "document.getElementsByName('maKhach')[0].value = '" . htmlspecialchars($row['Ma_khach']) . "';";
                    echo "document.getElementsByName('ngayDat')[0].value = '" . htmlspecialchars($row['Ngay_dat']) . "';";
                    echo "document.getElementsByName('tenNguoiNhan')[0].value = '" . htmlspecialchars($row['ten_nguoi_nhan']) . "';";
                    echo "document.getElementsByName('maTrangThai')[0].value = '" . htmlspecialchars($row['Ma_trang_thai']) . "';";
                    echo "document.getElementsByName('maVanChuyen')[0].value = '" . htmlspecialchars($row['Ma_van_chuyen']) . "';";
                    echo "document.getElementsByName('ghiChu')[0].value = '" . htmlspecialchars($row['Ghi_chu']) . "';";
                    echo "document.getElementById('edit-form').style.display = 'block';";
                    echo "</script>";
                }

                echo "</div>";
            }
            break;

        case 'update':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $maKhach = $_POST['maKhach'];
                $ngayDat = $_POST['ngayDat'];
                $tenNguoiNhan = $_POST['tenNguoiNhan'];
                $maTrangThai = $_POST['maTrangThai'];
                $maVanChuyen = $_POST['maVanChuyen'];
                $ghiChu = $_POST['ghiChu'];
                suaDonHang($connection, $id, $maKhach, $ngayDat, $tenNguoiNhan, $maTrangThai, $maVanChuyen, $ghiChu);
            }
            break;

        case 'delete':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                xoaDonHang($connection, $id);
            }
            break;
    }
}

// Display the form for adding a new order
echo "<div class='form-container' id='add-order-form'>";
echo "<h2>Thêm mới đơn hàng:</h2>";
echo "<form method='post' action=''>";
echo "<input type='hidden' name='action' value='addOrder'>";
echo "Người đặt: <select name='maKhach' required>";
$sqlKhachHang = "SELECT * FROM taikhoan";
$resultKhachHang = mysqli_query($connection, $sqlKhachHang);
while ($rowKhachHang = mysqli_fetch_array($resultKhachHang)) {
    echo "<option value='" . htmlspecialchars($rowKhachHang["MaTaiKhoan"]) . "'>" . htmlspecialchars($rowKhachHang["ho_ten"]) . "</option>";
}
echo "</select><br>";
echo "Ngày đặt: <input type='date' name='ngayDat' required><br>";
echo "Tên người nhận: <input type='text' name='tenNguoiNhan' required><br>";
echo "Trạng thái: 
      <select name='maTrangThai' required>
        <option value='1'>Đã đặt hàng</option>
        <!-- Add more options as needed -->
      </select><br>";
echo "Vận chuyển: 
      <select name='maVanChuyen' required>
        <option value='1'>Giao hàng nhanh</option>
        <!-- Add more options as needed -->
      </select><br>";
echo "Ghi chú: <textarea name='ghiChu'></textarea><br>";
echo "<input class='btn add' type='submit' value='Thêm'>";
echo "</form>";
echo "</div>";
echo '<a href="admin.php"><button>trang Admin</button></a>';
// Use the function to get the list and display
getListDonHang($connection);

// Close the connection
mysqli_close($connection);
?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 20px 300px 100px 300px; /* Adjusted padding for content alignment */
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

    #edit-form,
    #add-order-form {
        display: none;
    }
</style>
