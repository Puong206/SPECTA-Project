<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data yang relevan dari form
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // --- Validasi ---
    $errors = [];

    if (empty($username) || empty($password)) {
        $errors[] = "Username dan password wajib diisi.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password minimal harus 6 karakter.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Konfirmasi password tidak cocok.";
    }

    // --- Cek jika username sudah ada ---
    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $errors[] = "Username '" . htmlspecialchars($username) . "' sudah digunakan. Silakan pilih yang lain.";
        }
        $stmt->close();
    }

    // --- Jika tidak ada error, masukkan ke database ---
    if (empty($errors)) {
        // PERBAIKAN: Menggunakan SHA2 agar sama dengan sistem login dan admin
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

    // --- Jika ada error, kembali ke halaman register dengan pesan error ---
    if (!empty($errors)) {
        $conn->close();
        header("Location: ../register.php?error=" . urlencode(implode(" ", $errors)));
        exit();
    }
} else {
    // Jika file diakses langsung, redirect
    header("Location: ../register.php");
    exit();
}
?>