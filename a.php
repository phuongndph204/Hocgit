<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tên loại hàng</title>
    <style>
        /* Thêm các kiểu CSS để làm đẹp giao diện */
        .checkbox-container {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        #submit-btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form method="post" action="SANPHAM2.php" target="_blank">
        <div class="checkbox-container">
            <?php
                require("connection.php");

                if ($connection->connect_error) {
                    die("Kết nối không thành công: " . $connection->connect_error);
                }

                $result = $connection->query("SELECT * FROM loaihang");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<label><input type='radio' name='loaihang[]' value='" . $row['Ma_loai'] . "'>" . $row['Ten_loai'] . "</label>";
                    }
                } else {
                    echo "Không có dữ liệu loại hàng.";
                }

        
            ?>
        </div>
        <button type="submit" id="submit-btn" target="_blank">Lọc</button>
    </form>
</body>
</html>
