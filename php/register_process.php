<?php
// Menghubungkan ke database
require_once 'db_connect.php';

// Memastikan request menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil dan membersihkan data dari form registrasi
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // --- Proses Validasi Input ---
    $errors = [];

    // Validasi panjang username minimal
    if (strlen($username) < 3) {
        $errors[] = "Username minimal harus 3 karakter.";
    }
    // Validasi karakter yang diizinkan (opsional tapi disarankan)
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $errors[] = "Username hanya boleh mengandung huruf, angka, dan underscore (_).";
    }

    // Validasi field yang wajib diisi
    if (empty($password)) {
        $errors[] = "Password wajib diisi.";
    }

    // Validasi panjang password minimal
    if (strlen($password) < 6) {
        $errors[] = "Password minimal harus 6 karakter.";
    }

    // Validasi konfirmasi password
    if ($password !== $confirm_password) {
        $errors[] = "Konfirmasi password tidak cocok.";
    }

    // --- Cek keunikan username di database ---
    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $errors[] = "Username '" . htmlspecialchars($username) . "' sudah digunakan.";
        }
        $stmt->close();
    }

    // --- Proses pendaftaran jika semua validasi lolos ---
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, SHA2(?, 256), 'user')");
        $stmt->bind_param("ss", $username, $password);
        
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            header("Location: ../login.php?success=" . urlencode("Akun berhasil dibuat! Silakan login."));
            exit();
        } else {
            $errors[] = "Registrasi gagal. Silakan coba lagi.";
        }
        $stmt->close();
    }

    // --- Redirect kembali ke form registrasi jika ada error ---
    if (!empty($errors)) {
        $conn->close();
        header("Location: ../register.php?error=" . urlencode(implode(" ", array_unique($errors))));
        exit();
    }
} else {
    // Jika file diakses langsung, redirect
    header("Location: ../register.php");
    exit();
}
?>