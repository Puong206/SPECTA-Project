<?php
// File: handle_transaction.php
require 'db_connect.php';

$event_id = isset($_GET['event_id']) ? (int)$_GET['event_id'] : 0;
$redirect_page = isset($_GET['redirect']) ? $_GET['redirect'] : 'index.html';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika belum, arahkan ke halaman login dengan parameter redirect
    header("Location: login.php?redirect=" . urlencode($redirect_page));
    exit();
}

// Jika sudah login, proses transaksi (logika ini bisa dikembangkan lebih lanjut)
$user_id = $_SESSION['user_id'];

// Ambil harga dari event
$stmt = $conn->prepare("SELECT price FROM events WHERE id = ?");
$stmt->bind_param("i", $event_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $event = $result->fetch_assoc();
    $amount = $event['price'];

    // Masukkan ke tabel transaksi
    $insert_stmt = $conn->prepare("INSERT INTO transactions (user_id, event_id, amount, status) VALUES (?, ?, ?, 'pending')");
    $insert_stmt->bind_param("iid", $user_id, $event_id, $amount);
    $insert_stmt->execute();
    $insert_stmt->close();

    // Arahkan ke halaman konfirmasi atau pembayaran
    header("Location: transaction_success.php");
    exit();
} else {
    // Event tidak ditemukan
    header("Location: " . $redirect_page . "?error=Event tidak valid");
    exit();
}

$stmt->close();
$conn->close();
?>