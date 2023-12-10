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

// ... (Existing code for account management)


// Hàm để lấy danh sách sản phẩm
function getListHangHoa($connection) {
    $sql = "SELECT hanghoa.*, loaihang.Ten_loai FROM hanghoa JOIN loaihang ON hanghoa.Ma_loai = loaihang.Ma_loai";
    $result = mysqli_query($connection, $sql);
    

    echo "<h2>Danh sách hàng hóa:</h2>";
    echo "<div class='table-container'>";
    echo "<table>";
    echo "<thead><tr><th>ID</th><th>Tên hàng</th><th>Đơn giá</th><th>Mô tả</th><th>Loại hàng</th><th>Ảnh</th><th>Thao tác</th></tr></thead>";
    echo "<tbody>";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row["Ma_hang"]}</td>";
            echo "<td>{$row["ten_hang"]}</td>";
            echo "<td>{$row["don_Gia"]}</td>";
            echo "<td>{$row["mo_ta"]}</td>";
            echo "<td>{$row["Ten_loai"]}</td>";
            $anh=$row["duong_dan_anh"];
            echo "<td><img src='$anh' alt='Ảnh' width='200px'></td>";
            echo "<td>
                  <a class='btn edit' href='?action=edit&id={$row["Ma_hang"]}'>Sửa</a>
                  <a class='btn delete' href='?action=delete&id={$row["Ma_hang"]}'>Xóa</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Không có sản phẩm nào.</td></tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}

// Hàm để thêm sản phẩm mới
function themHangHoa($connection, $tenHang, $donGia, $moTa, $maLoai, $duongDanAnh) {
    $sql = "INSERT INTO hanghoa (ten_hang, don_Gia, mo_ta, Ma_loai, duong_dan_anh) 
            VALUES ('$tenHang', '$donGia', '$moTa', '$maLoai', '$duongDanAnh')";

    if (mysqli_query($connection, $sql)) {
        echo "<p class='success'>Thêm sản phẩm thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi thêm sản phẩm: " . mysqli_error($connection) . "</p>";
    }
}

// Hàm để sửa thông tin sản phẩm
function suaHangHoa($connection, $id, $tenHang, $donGia, $moTa, $maLoai, $duongDanAnh) {
    $sql = "UPDATE hanghoa 
            SET ten_hang='$tenHang', don_Gia='$donGia', mo_ta='$moTa', Ma_loai='$maLoai', duong_dan_anh='$duongDanAnh' 
            WHERE Ma_hang=$id";

    if (mysqli_query($connection, $sql)) {
        echo "<p class='success'>Cập nhật sản phẩm thành công!</p>";
       
    } else {
        echo "<p class='error'>Lỗi khi cập nhật sản phẩm: " . mysqli_error($connection) . "</p>";
    }

}




// Hàm để xóa sản phẩm
function xoaHangHoa($connection, $maHang) {
    $sql = "DELETE FROM hanghoa WHERE Ma_hang=$maHang";

    if (mysqli_query($connection, $sql)) {
        echo "<p class='success'>Xóa sản phẩm thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi xóa sản phẩm: " . mysqli_error($connection) . "</p>";
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
                echo "<h2>Sửa thông tin sản phẩm:</h2>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='action' value='update'>";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "Tên hàng: <input type='text' name='tenHang' required><br>";
                echo "Đơn giá: <input type='text' name='donGia' required><br>";
                echo "Mô tả: <textarea name='moTa' required></textarea><br>";
                echo "Loại hàng: 
                      <select name='maLoai' required>
                        <option value='1'>Adidas</option>
                        <!-- Add more options as needed -->
                      </select><br>";
                echo "Đường dẫn ảnh: <input type='text' name='duongDanAnh'><br>";
                echo "<input class='btn add' type='submit' value='Lưu'>";
                echo "</form>";
                // Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tenHang = $_POST['tenHang'];
    $donGia = $_POST['donGia'];
    $moTa = $_POST['moTa'];
    $maLoai = $_POST['maLoai'];
    $duongDanAnh = $_POST['duongDanAnh'];

    // Gọi hàm sửa hàng hóa
    suaHangHoa($connection, $id, $tenHang, $donGia, $moTa, $maLoai, $duongDanAnh);
}


                // Lấy thông tin sản phẩm để hiển thị trong form
                $result = mysqli_query($connection, "SELECT * FROM hanghoa WHERE Ma_hang=$id");
                $row = mysqli_fetch_assoc($result);

                if ($row) {
                    echo "<script>";
                    echo "document.getElementsByName('tenHang')[0].value = '{$row['ten_hang']}';";
                    echo "document.getElementsByName('donGia')[0].value = '{$row['don_Gia']}';";
                    echo "document.getElementsByName('moTa')[0].value = '{$row['mo_ta']}';";
                    echo "document.getElementsByName('maLoai')[0].value = '{$row['Ma_loai']}';";
                    echo "document.getElementsByName('duongDanAnh')[0].value = '{$row['duong_dan_anh']}';";
                    echo "document.getElementById('edit-form').style.display = 'block';";
                    echo "</script>";
                }

                echo "</div>";
            }
            break;

        case 'update':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $tenHang = $_POST['tenHang'];
                $donGia = $_POST['donGia'];
                $moTa = $_POST['moTa'];
                $maLoai = $_POST['maLoai'];
                $duongDanAnh = $_POST['duongDanAnh'];
                suaHangHoa($connection, $id, $tenHang, $donGia, $moTa, $maLoai, $duongDanAnh);
            }
            break;

        case 'delete':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                xoaHangHoa($connection, $id);
            }
            break;
    }
}

// Hiển thị form thêm mới
echo "<div class='form-container' id='add-form'>";
echo "<h2>Thêm mới hàng hóa:</h2>";
echo "<form method='post' action=''>";
echo "<input type='hidden' name='action' value='add'>";
echo "Tên hàng: <input type='text' name='tenHang' required><br>";
echo "Đơn giá: <input type='text' name='donGia' required><br>";
echo "Mô tả: <textarea name='moTa' required></textarea><br>";
echo "Loại hàng: 
      <select name='maLoai' required>
        <option value='1'>Adidas</option>
        <!-- Add more options as needed -->
      </select><br>";
echo "Đường dẫn ảnh: <input type='text' name='duongDanAnh'><br>";
echo "<input class='btn add' type='submit' value='Thêm'>";
echo "</form>";
echo "</div>";
echo '<a href="admin.php"><button>trang Admin</button></a>';
// Xử lý thêm mới
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $tenHang = $_POST['tenHang'];
    $donGia = $_POST['donGia'];
    $moTa = $_POST['moTa'];
    $maLoai = $_POST['maLoai'];
    $duongDanAnh = $_POST['duongDanAnh'];
    themHangHoa($connection, $tenHang, $donGia, $moTa, $maLoai, $duongDanAnh);
}



// Sử dụng hàm để lấy danh sách và hiển thị
getListHangHoa($connection);

// Đóng kết nối
mysqli_close($connection);
?>

<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 20px 300px 100px 300px;
    /* Adjusted padding for content alignment */
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

#edit-form {
    display: none;
}
</style>