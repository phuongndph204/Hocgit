<?php
// logout.php
setcookie("user_id", "", time() - 36000, "/"); // Đặt thời gian hết hạn của cookie là quá khứ
header("Location: TRANGCHU.php");
exit();
?>