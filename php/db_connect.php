<?php
// File: db_connect.php
// Konfigurasi koneksi database
$servername = "localhost";         // Server database (biasanya localhost untuk development)
$username = "root";               // Username database MySQL
$password = "";                   // Password database MySQL (kosong untuk XAMPP default)
$dbname = "itspecta_db";         // Nama database yang digunakan

// Membuat koneksi baru ke database MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa apakah koneksi berhasil atau gagal
if ($conn->connect_error) {
  // Jika koneksi gagal, hentikan eksekusi dan tampilkan pesan error
  die("Connection failed: " . $conn->connect_error);
}

// Memulai session untuk manajemen login/logout di seluruh aplikasi
session_start();
?>