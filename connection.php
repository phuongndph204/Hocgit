<?php
$connection = mysqli_connect('localhost', 'root','', 'duan1');
mysqli_query($connection, "SET NAMES 'utf8'");

if (!$connection) {
    exit('Kết nối không thành công!');
}
?>
