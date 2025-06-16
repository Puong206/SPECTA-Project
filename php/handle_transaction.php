<?php
// File: /php/handle_transaction.php
require 'db_connect.php';
require 'functions.php'; // Panggil juga functions.php

$event_id = isset($_GET['event_id']) ? (int)$_GET['event_id'] : 0;
$redirect_page = isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php';

// Cek apakah user sudah login menggunakan fungsi dari functions.php
// Path redirect di sini juga perlu diperbaiki
if (!isset($_SESSION['user_id'])) {
    // Jika belum, arahkan ke halaman login di direktori root
    header("Location: ../login.php?redirect=" . urlencode($redirect_page));
    exit();
}

// Jika sudah login, proses transaksi
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

    // Arahkan ke halaman konfirmasi atau pembayaran di direktori root
    // === PERBAIKAN DI SINI ===
    header("Location: ../transaction_success.php");
    exit();
} else {
    // Event tidak ditemukan, arahkan kembali ke halaman sebelumnya di direktori root
    // === PERBAIKAN DI SINI ===
    header("Location: ../" . $redirect_page . "?error=Event tidak valid");
    exit();
}

$stmt->close();
$conn->close();
?>