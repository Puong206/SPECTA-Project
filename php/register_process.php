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

    // Validasi field yang wajib diisi
    if (empty($username) || empty($password)) {
        $errors[] = "Username dan password wajib diisi.";
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
        // Menyiapkan query untuk mengecek apakah username sudah ada
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Jika username sudah ada, tambahkan error
        if ($result->num_rows > 0) {
            $errors[] = "Username '" . htmlspecialchars($username) . "' sudah digunakan. Silakan pilih yang lain.";
        }
        $stmt->close();
    }

    // --- Proses pendaftaran jika semua validasi lolos ---
    if (empty($errors)) {
        // Menyimpan user baru ke database dengan password yang di-hash menggunakan SHA2
        $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, SHA2(?, 256), 'user')");
        $stmt->bind_param("ss", $username, $password);
        
        // Eksekusi query dan cek hasilnya
        if ($stmt->execute()) {
            // Tutup koneksi dan redirect ke halaman login dengan pesan sukses
            $stmt->close();
            $conn->close();
            header("Location: ../login.php?success=" . urlencode("Akun berhasil dibuat! Silakan login."));
            exit();
        } else {
            // Jika gagal menyimpan ke database
            $errors[] = "Registrasi gagal. Silakan coba lagi.";
        }
        $stmt->close();
    }

    // --- Redirect kembali ke form registrasi jika ada error ---
    if (!empty($errors)) {
        $conn->close();
        // Menggabungkan semua pesan error dan redirect dengan parameter error
        header("Location: ../register.php?error=" . urlencode(implode(" ", $errors)));
        exit();
    }
} else {
    // Jika file diakses langsung (bukan melalui POST), redirect ke halaman register
    header("Location: ../register.php");
    exit();
}
?>