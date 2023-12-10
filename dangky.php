<?php
require "connection.php"; // Kết nối đến cơ sở dữ liệu

$errors = [];
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xử lý dữ liệu khi form được submit
    $ho_ten = validate_input($_POST["ho_ten"]);
    $tai_khoan = validate_input($_POST["tai_khoan"]);
    $mat_khau = validate_input($_POST["mat_khau"]);
    $nhap_lai_mat_khau = validate_input($_POST["nhap_lai_mat_khau"]);
    $email = validate_input($_POST["email"]);
    $dia_chi = validate_input($_POST["dia_chi"]);
    $vai_tro = 0;

    // Kiểm tra các trường
    if (empty($ho_ten)) {
        $errors['ho_ten'] = "Họ và Tên không được để trống";
    }

    if (empty($tai_khoan)) {
        $errors['tai_khoan'] = "Tài khoản không được để trống";
    }

    if (empty($mat_khau)) {
        $errors['mat_khau'] = "Mật khẩu không được để trống";
    } elseif (strlen($mat_khau) < 6) {
        $errors['mat_khau'] = "Mật khẩu phải có ít nhất 6 ký tự";
    }

    if (empty($nhap_lai_mat_khau)) {
        $errors['nhap_lai_mat_khau'] = "Nhập lại mật khẩu không được để trống";
    } elseif ($nhap_lai_mat_khau !== $mat_khau) {
        $errors['nhap_lai_mat_khau'] = "Mật khẩu nhập lại không khớp";
    }

    if (empty($email)) {
        $errors['email'] = "Email không được để trống";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email không hợp lệ";
    }

    if (empty($dia_chi)) {
        $errors['dia_chi'] = "Địa chỉ không được để trống";
    }

    // Nếu không có lỗi, thực hiện đăng ký
    if (empty($errors)) {
        $sql = "INSERT INTO taikhoan (ho_ten, Tai_khoan, Mat_khau, Email, dia_chi, vai_tro) VALUES ('$ho_ten', '$tai_khoan', '$mat_khau', '$email', '$dia_chi', $vai_tro)";

        if ($connection->query($sql) === TRUE) {
            // Đăng ký thành công, hiển thị thông báo
            $success_message = "Đăng ký thành công!";
        } else {
            echo "Lỗi: " . $sql . "<br>" . $connection->error;
        }
    }
}

$connection->close();

function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/animate/animate.min.css">
    <link rel="stylesheet" href="plugins/fontawesome/all.css">
    <link rel="stylesheet" href="plugins/webfonts/font.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="plugins/uikit/uikit.min.css" />
    <style>
        .error {
            color: red;
        }

        .register-container {
            width: 500px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            background-color: #fff;
            margin: 100px auto;
            text-align: left;
        }

        .register-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .register-container form {
            text-align: left;
        }

        .register-container label {
            display: block;
            margin-bottom: 8px;
        }

        .register-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .register-container input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .register-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>

<div class="header">
    <a href="index.html" style="color: #ffffff;text-decoration: none;">MIỄN PHÍ VẬN CHUYỂN VỚI ĐƠN HÀNG NỘI THÀNH > 300K - ĐỔI TRẢ TRONG 30 NGÀY - ĐẢM BẢO CHẤT LƯỢNG</a>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" class="logo-top" alt="">
        </a>
        <div class="desk-menu collapse navbar-collapse justify-content-md-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="TRANGCHU.php">TRANG CHỦ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="SANPHAM.php">SẢN PHẨM</a>
                </li>
                <li class="nav-item lisanpham">
                    <a class="nav-link" href="detailproduct.html">DANH MỤC
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </a>
                    <ul class="sub_menu">
                        <li class="">
                            <a href="detailproduct.html" title="Sản phẩm - Style 1">
                                Sản phẩm - Style 1
                            </a>
                        </li>
                        <li class="">
                            <a href="detailproduct.html" title="Sản phẩm - Style 2">
                                Sản phẩm - Style 2
                            </a>
                        </li>
                        <li class="">
                            <a href="detailproduct.html" title="Sản phẩm - Style 3">
                                Sản phẩm - Style 3
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="introduce.html">GIỚI THIỆU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blog.html">BLOG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">LIÊN HỆ</a>
                </li>
            </ul>
        </div>
        <div id="offcanvas-flip1" uk-offcanvas="flip: true; overlay: true">
            <div class="uk-offcanvas-bar" style="background: white; width: 100%;">
                <!-- Offcanvas Content -->
            </div>
        </div>
        <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
            <div class="uk-offcanvas-bar" style="background: white; width: 350px;">
                <!-- Offcanvas Content -->
            </div>
        </div>
        <div id="offcanvas-flip2" uk-offcanvas="flip: true; overlay: true">
            <div class="uk-offcanvas-bar" style="background: white; width: 350px;">
                <!-- Offcanvas Content -->
            </div>
        </div>
        <div class="icon-ol">
            <a style="color: #272727" href="">
                <i class="fas fa-user-alt"></i>
            </a>
            <a href="#" class="" uk-toggle="target: #offcanvas-flip">
                <i class="fas fa-search" style="color: black"></i>
            </a>
            <a style="color: #272727" href="#" uk-toggle="target: #offcanvas-flip2">
                <i class="fas fa-shopping-cart"></i>
            </a>
            <button class="navbar-toggler" type="button" uk-toggle="target: #offcanvas-flip1" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</nav>

<div class="register-container">
    <h2>Đăng ký</h2>
    <?php
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Xử lý dữ liệu khi form được submit
        $ho_ten = validate_input($_POST["ho_ten"]);
        $tai_khoan = validate_input($_POST["tai_khoan"]);
        $mat_khau = validate_input($_POST["mat_khau"]);
        $nhap_lai_mat_khau = validate_input($_POST["nhap_lai_mat_khau"]);
        $email = validate_input($_POST["email"]);
        $dia_chi = validate_input($_POST["dia_chi"]);
        $vai_tro = 0;

        // Kiểm tra các trường
        if (empty($ho_ten)) {
            $errors['ho_ten'] = "Họ và Tên không được để trống";
        }

        if (empty($tai_khoan)) {
            $errors['tai_khoan'] = "Tài khoản không được để trống";
        }

        if (empty($mat_khau)) {
            $errors['mat_khau'] = "Mật khẩu không được để trống";
        } elseif (strlen($mat_khau) < 6) {
            $errors['mat_khau'] = "Mật khẩu phải có ít nhất 6 ký tự";
        }

        if (empty($nhap_lai_mat_khau)) {
            $errors['nhap_lai_mat_khau'] = "Nhập lại mật khẩu không được để trống";
        } elseif ($nhap_lai_mat_khau !== $mat_khau) {
            $errors['nhap_lai_mat_khau'] = "Mật khẩu nhập lại không khớp";
        }

        if (empty($email)) {
            $errors['email'] = "Email không được để trống";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email không hợp lệ";
        }

        if (empty($dia_chi)) {
            $errors['dia_chi'] = "Địa chỉ không được để trống";
        }
    }
    ?>

    <!-- Your HTML content here -->
    <?php if (!empty($success_message)) : ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php else : ?>
        <!-- Form đăng ký -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- Các trường và mã HTML của form ở đây -->
        </form>
    <?php endif; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="ho_ten">Họ và Tên:</label>
            <input type="text" class="form-control" name="ho_ten" required>
            <span class="error"><?php echo $errors['ho_ten'] ?? ''; ?></span>
        </div>

        <div class="form-group">
            <label for="tai_khoan">Tài khoản:</label>
            <input type="text" class="form-control" name="tai_khoan" required>
            <span class="error"><?php echo $errors['tai_khoan'] ?? ''; ?></span>
        </div>

        <div class="form-group">
            <label for="mat_khau">Mật khẩu:</label>
            <input type="password" class="form-control" name="mat_khau" required>
            <span class="error"><?php echo $errors['mat_khau'] ?? ''; ?></span>
        </div>

        <div class="form-group">
            <label for="nhap_lai_mat_khau">Nhập lại mật khẩu:</label>
            <input type="password" class="form-control" name="nhap_lai_mat_khau" required>
            <span class="error"><?php echo $errors['nhap_lai_mat_khau'] ?? ''; ?></span>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" required>
            <span class="error"><?php echo $errors['email'] ?? ''; ?></span>
        </div>

        <div class="form-group">
            <label for="dia_chi">Địa chỉ:</label>
            <input type="text" class="form-control" name="dia_chi" required>
            <span class="error"><?php echo $errors['dia_chi'] ?? ''; ?></span>
        </div>

        <input type="submit" class="btn btn-primary" value="Đăng ký">
       <a href="dangnhap.php">đăng nhập</a>
    </form>
</div>

</body>
</html>

