<?php
// File: logout.php
// Memulai session untuk mengakses data session
session_start();
// Menghapus semua variabel session
session_unset();
// Menghancurkan session yang aktif
session_destroy();
// Redirect pengguna kembali ke halaman utama
header("Location: /index.php");
exit();
?>