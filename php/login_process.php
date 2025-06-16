<?php
// File: /php/login_process.php

// Memanggil file koneksi database, yang juga akan memulai sesi.
require 'db_connect.php';

// 1. Ambil data dari form yang dikirim oleh login.php
$username = $_POST['username'];
$password = $_POST['password'];

// Ambil URL redirect (halaman tujuan setelah login), defaultnya adalah index.php
$redirect_url = !empty($_POST['redirect']) ? '../' . $_POST['redirect'] : '../index.php';


// 2. Validasi dasar
if (empty($username) || empty($password)) {
    // Jika username atau password kosong, kembalikan ke halaman login dengan pesan error
    header("Location: ../login.php?error=Username dan password harus diisi");
    exit();
}


// 3. Persiapkan query untuk memeriksa ke database
// Menggunakan SHA2() untuk mencocokkan password yang sudah di-hash di database
$stmt = $conn->prepare("SELECT id, username, role FROM users WHERE username = ? AND password = SHA2(?, 256)");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();


// 4. Proses hasil query
if ($result->num_rows === 1) {
    // Jika user ditemukan (login berhasil)
    $user = $result->fetch_assoc();

    // Buat session untuk menandai bahwa pengguna sudah login
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    // Arahkan (redirect) pengguna berdasarkan perannya (role)
    if ($user['role'] === 'admin') {
        header("Location: ../admin/dashboard.php"); // Arahkan admin ke dashboard
    } else {
        header("Location: " . $redirect_url); // Arahkan user biasa ke halaman yang dituju
    }
    exit();

} else {
    // Jika user tidak ditemukan (login gagal)
    // Kembalikan ke halaman login dengan pesan error
    header("Location: ../login.php?error=Username atau password salah");
    exit();
}

// Tutup statement dan koneksi
$stmt->close();
$conn->close();
?>