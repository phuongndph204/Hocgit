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

// Hàm để lấy danh sách biến thể
function getListBienThe($connection) {
    $sql = "SELECT * FROM size";
    $result = mysqli_query($connection, $sql);

    echo "<h2>Danh sách biến thể:</h2>";
    echo "<div class='table-container'>";
    echo "<table>";
    echo "<thead><tr><th>Mã Size</th><th>Size</th><th>Thao tác</th></tr></thead>";
    echo "<tbody>";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row["Ma_Size"]}</td>";
            echo "<td>{$row["Size"]}</td>";
            echo "<td>
                  <a class='btn edit' href='?action=edit&id={$row["Ma_Size"]}'>Sửa</a>
                  <a class='btn delete' href='?action=delete&id={$row["Ma_Size"]}'>Xóa</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Không có biến thể nào.</td></tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
}

// Hàm để thêm biến thể mới
function themBienThe($connection, $size) {
    $sql = "INSERT INTO size (Size) VALUES ('$size')";

    if (mysqli_query($connection, $sql)) {
        echo "<p class='success'>Thêm biến thể thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi thêm biến thể: " . mysqli_error($connection) . "</p>";
    }
}

// Hàm để sửa thông tin biến thể
function suaBienThe($connection, $maSize, $size) {
    $sql = "UPDATE size SET Size='$size' WHERE Ma_Size=$maSize";

    if (mysqli_query($connection, $sql)) {
        echo "<p class='success'>Cập nhật biến thể thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi cập nhật biến thể: " . mysqli_error($connection) . "</p>";
    }
}

// Hàm để xóa biến thể
function xoaBienThe($connection, $maSize) {
    $sql = "DELETE FROM size WHERE Ma_Size=$maSize";

    if (mysqli_query($connection, $sql)) {
        echo "<p class='success'>Xóa biến thể thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi xóa biến thể: " . mysqli_error($connection) . "</p>";
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
                echo "<h2>Sửa thông tin biến thể:</h2>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='action' value='update'>";
                echo "<input type='hidden' name='id' value='$id'>";
                echo "Size: <input type='text' name='size' required><br>";
                echo "<input class='btn add' type='submit' value='Lưu'>";
                echo "</form>";
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $size = $_POST['size'];
                    suaBienThe($connection, $id, $size);
                }

                // Lấy thông tin biến thể để hiển thị trong form
                $result = mysqli_query($connection, "SELECT * FROM size WHERE Ma_Size=$id");
                $row = mysqli_fetch_assoc($result);

                if ($row) {
                    echo "<script>";
                    echo "document.getElementsByName('size')[0].value = '{$row['Size']}';";
                    echo "document.getElementById('edit-form').style.display = 'block';";
                    echo "</script>";
                }

                echo "</div>";
              
            }
            break;

        case 'update':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $size = $_POST['size'];
                suaBienThe($connection, $id, $size);
            }
            break;

        case 'delete':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                xoaBienThe($connection, $id);
            }
            break;
    }
}

// Hiển thị form thêm mới
echo "<div class='form-container' id='add-form'>";
echo "<h2>Thêm mới biến thể:</h2>";
echo "<form method='post' action=''>";
echo "<input type='hidden' name='action' value='add'>";
echo "Size: <input type='text' name='size' required><br>";
echo "<input class='btn add' type='submit' value='Thêm'>";
echo "</form>";
echo "</div>";
echo '<a href="admin.php"><button>trang Admin</button></a>';
// Xử lý thêm mới
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $size = $_POST['size'];
    themBienThe($connection, $size);
}

// Sử dụng hàm để lấy danh sách và hiển thị
getListBienThe($connection);

// Đóng kết nối
mysqli_close($connection);
?>

<style>
    /* Thêm vào phần CSS hiện tại */
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
