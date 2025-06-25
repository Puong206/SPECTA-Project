<?php
// File: /php/contact_process.php

// Memastikan form dikirim menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Mengambil dan membersihkan data dari form kontak
    $name = strip_tags(trim($_POST["name"]));                                    // Membersihkan nama dari tag HTML
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);          // Membersihkan dan sanitasi email
    $phone = strip_tags(trim($_POST["phone"]));                                 // Membersihkan nomor telepon
    $subject = strip_tags(trim($_POST["subject"]));                             // Membersihkan subjek pesan
    $message = strip_tags(trim($_POST["message"]));                             // Membersihkan isi pesan

    // Melakukan validasi dasar terhadap data yang diterima
    if (empty($name) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Jika ada data yang tidak valid atau kosong, redirect dengan status error
        header("Location: ../contact.php?status=error");
        exit;
    }

    // --- BAGIAN INI BISA DIGUNAKAN UNTUK MENGIRIM EMAIL OTOMATIS ---
    // Contoh implementasi pengiriman email:
    /*
    $recipient = "admin.itspecta@email.com"; // Email tujuan (admin)
    $email_subject = "Pesan Baru dari $name: $subject";
    $email_content = "Nama: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Telepon: $phone\n\n";
    $email_content .= "Pesan:\n$message\n";
    $email_headers = "From: $name <$email>";

    // Mengirim email menggunakan fungsi mail() PHP
    if (mail($recipient, $email_subject, $email_content, $email_headers)) {
        // Jika email berhasil dikirim
        header("Location: ../contact.php?status=success");
    } else {
        // Jika pengiriman email gagal
        header("Location: ../contact.php?status=error");
    }
    */
    
    // Untuk demonstrasi, selalu redirect dengan status sukses
    // (Hapus baris ini jika sudah mengaktifkan fungsi email di atas)
    header("Location: ../contact.php?status=success#contactForm");
    exit;

} else {
    // Jika file diakses langsung (bukan melalui POST), redirect ke halaman kontak
    header("Location: ../contact.php");
    exit;
}
?>