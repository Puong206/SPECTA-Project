<?php
// File: /php/handle_transaction.php
// Menghubungkan ke database dan fungsi-fungsi bantuan
require 'db_connect.php';
require 'functions.php';

// Mengambil parameter dari URL
$event_id = isset($_GET['event_id']) ? (int)$_GET['event_id'] : 0;
$redirect_page = isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php';

// Memastikan user sudah login sebelum melakukan transaksi
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, redirect ke halaman login dengan parameter redirect
    header("Location: ../login.php?redirect=" . urlencode($redirect_page));
    exit();
}

// Melanjutkan proses transaksi jika user sudah login
$user_id = $_SESSION['user_id'];

// Mengambil informasi harga dari event yang dipilih
$stmt = $conn->prepare("SELECT price FROM events WHERE id = ?");
$stmt->bind_param("i", $event_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Event ditemukan, lanjutkan proses transaksi
    $event = $result->fetch_assoc();
    $amount = $event['price'];

    // Menyimpan transaksi baru ke database dengan status pending
    $insert_stmt = $conn->prepare("INSERT INTO transactions (user_id, event_id, amount, status) VALUES (?, ?, ?, 'pending')");
    $insert_stmt->bind_param("iid", $user_id, $event_id, $amount);
    $insert_stmt->execute();
    $insert_stmt->close();

    // Redirect ke halaman konfirmasi transaksi berhasil
    header("Location: ../transaction_success.php");
    exit();
} else {
    // Event tidak ditemukan, redirect kembali dengan pesan error
    header("Location: ../" . $redirect_page . "?error=Event tidak valid");
    exit();
}

// Membersihkan resource
$stmt->close();
$conn->close();
?>