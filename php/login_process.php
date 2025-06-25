<?php
// File: /php/login_process.php

// Memanggil file koneksi database, yang juga akan memulai sesi.
require 'db_connect.php';

// 1. Mengambil data username dan password dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Menentukan halaman tujuan setelah login berhasil
$redirect_url = !empty($_POST['redirect']) ? '../' . $_POST['redirect'] : '../index.php';

// 2. Validasi input dasar - memastikan username dan password tidak kosong
if (empty($username) || empty($password)) {
    // Redirect kembali ke login dengan pesan error jika ada field kosong
    header("Location: ../login.php?error=Username dan password harus diisi");
    exit();
}

// 3. Menyiapkan query untuk autentikasi user
// Menggunakan SHA2() untuk mencocokkan password yang sudah di-hash di database
$stmt = $conn->prepare("SELECT id, username, role FROM users WHERE username = ? AND password = SHA2(?, 256)");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

// 4. Memproses hasil autentikasi
if ($result->num_rows === 1) {
    // Login berhasil - user ditemukan di database
    $user = $result->fetch_assoc();

    // Membuat session untuk menyimpan data user yang login
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    // Mengarahkan user berdasarkan role/peran mereka
    if ($user['role'] === 'admin') {
        // Admin diarahkan ke dashboard admin
        header("Location: ../admin/dashboard.php");
    } else {
        // User biasa diarahkan ke halaman yang dituju
        header("Location: " . $redirect_url);
    }
    exit();

} else {
    // Login gagal - username atau password salah
    header("Location: ../login.php?error=Username atau password salah");
    exit();
}

// Membersihkan resource
$stmt->close();
$conn->close();
?>