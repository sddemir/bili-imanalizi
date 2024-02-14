<?php
// Oturumu başlat
session_start();

// Tüm oturum değişkenlerini kaldır
$_SESSION = array();

// Oturumu sonlandır
session_destroy();

// Giriş sayfasına yönlendir
header("Location: login.php");
exit();
?>
