<?php

require "connection.php";
// Kiểm tra đã đăng nhập chưa
if (!isset($_COOKIE["user_id"])) {
    header("Location: dangnhap.php");
    exit();
}

$user_id = $_COOKIE["user_id"];
$sql = "SELECT * FROM taikhoan WHERE MaTaiKhoan='$user_id'";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($query);

if ($row['vai_tro'] == 1) {
    ?>
    <div id="vien">
        <div class="center">
            <div id="ban">
                <a id="ba" href="/index.php">Trang chủ</a> > 
                <font color="#008744">Admin Panel</font>
            </div>
        </div>
    </div>  
    <div class="list"><a id="ba" href="qlHangHoa.php">> Quản lý Hàng Hóa</a></div>
    <div class="list"><a id="ba" href="qlyLoaiSP.php">> Quản lý loại Hàng Hóa</a></div>
    <div class="list"><a id="ba" href="qlBinhLuan.php">> Quản lý bình luận</a></div>
    <div class="list"><a id="ba" href="qlTaiKhoan.php">> Quản lý tài khoản</a></div>
    <div class="list"><a id="ba" href="qlDonHang.php">> Quản lý đơn hàng</a></div>
    <div class="list"><a id="ba" href="qlBienThe.php">> Quản lý Size</a></div>
    <div class="list"><a id="ba" href="TRANGCHU.php">> Xem Trang WEB</a></div>
<?php
} else {
    header("Location:TRANGCHU.php");
   
}
?>

<style>
    body {
    font-family: 'Helvetica Neue', Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
}

#vien {
    background-color: #343a40;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

.center {
    max-width: 1200px;
    margin: 0 auto;
}

#ban {
    font-size: 18px;
}

.list {
    margin: 15px 0;
}

#ba {
    color: #008744;
    text-decoration: none;
    font-weight: bold;
}

#ba:hover {
    text-decoration: underline;
}

/* Add a subtle box shadow to the list items for a modern touch */
.list {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
}

.list:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

</style>
