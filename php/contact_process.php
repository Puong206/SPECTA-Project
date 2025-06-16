<?php
// File: /php/contact_process.php

// Periksa apakah data dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil dan bersihkan data dari form
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $subject = strip_tags(trim($_POST["subject"]));
    $message = strip_tags(trim($_POST["message"]));

    // Validasi dasar
    if (empty($name) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Jika ada data yang tidak valid, redirect kembali dengan pesan error
        header("Location: ../contact.php?status=error");
        exit;
    }

    // --- DI SINI ANDA BISA MENAMBAHKAN LOGIKA PENGIRIMAN EMAIL ---
    // Contoh sederhana:
    /*
    $recipient = "admin.itspecta@email.com"; // Ganti dengan email admin Anda
    $email_subject = "Pesan Baru dari $name: $subject";
    $email_content = "Nama: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Telepon: $phone\n\n";
    $email_content .= "Pesan:\n$message\n";
    $email_headers = "From: $name <$email>";

    // Kirim email
    if (mail($recipient, $email_subject, $email_content, $email_headers)) {
        // Jika berhasil, redirect dengan status sukses
        header("Location: ../contact.php?status=success");
    } else {
        // Jika gagal, redirect dengan status error
        header("Location: ../contact.php?status=error");
    }
    */
    
    // Untuk tujuan demonstrasi sekarang, kita akan selalu redirect dengan status sukses.
    // Hapus baris di bawah ini jika Anda sudah mengaktifkan fungsi email di atas.
    header("Location: ../contact.php?status=success#contactForm");
    exit;

} else {
    // Jika file diakses langsung, redirect ke halaman kontak
    header("Location: ../contact.php");
    exit;
}
?>