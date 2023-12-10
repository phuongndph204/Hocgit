<?php
require "ktDangNhap.php";
$mod = "panel";
if(isset($_GET["mod"]))
    $mod = $_GET["mod"];
    

switch ($mod) {
    case 'panel': 
        include "../adminpanel/panel.php";
        break;
    default:
        include "../error.php";
        break;
}

?>