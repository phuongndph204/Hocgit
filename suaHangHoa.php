<?php 


    $sql = "UPDATE hanghoa 
            SET ten_hang='$tenHang', don_Gia='$donGia', mo_ta='$moTa', Ma_loai='$maLoai', duong_dan_anh='$duongDanAnh' 
            WHERE Ma_hang=$id";

    if (mysqli_query($connection, $sql)) {
        echo "<p class='success'>Cập nhật sản phẩm thành công!</p>";
    } else {
        echo "<p class='error'>Lỗi khi cập nhật sản phẩm: " . mysqli_error($connection) . "</p>";
    }

?>