<?php
/**
 * File: /php/functions.php
 * Berisi fungsi-fungsi umum yang akan digunakan di seluruh situs.
 */

/**
 * Fungsi untuk memeriksa status login pengguna
 * Jika pengguna belum login, akan diarahkan ke halaman login
 * @param string $redirect_page Halaman tujuan setelah login berhasil.
 */
function check_login($redirect_page = 'index.php') {
    // Memastikan session sudah dimulai (biasanya sudah dimulai di db_connect.php)
    if (!isset($_SESSION['user_id'])) {
        // Jika tidak ada session user_id, berarti belum login
        header("Location: login.php?redirect=" . urlencode($redirect_page));
        exit();
    }
}

/**
 * Fungsi untuk memverifikasi akses admin
 * Memastikan pengguna yang login memiliki peran sebagai admin
 */
function check_admin() {
    // Memeriksa apakah session user dan role tersedia
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
        // Jika tidak ada session sama sekali, redirect ke login
        header("Location: ../login.php?error=Anda harus login untuk mengakses halaman ini.");
        exit();
    }

    // Memeriksa apakah role pengguna adalah admin
    if ($_SESSION['role'] !== 'admin') {
        // Jika bukan admin, tolak akses
        header("Location: ../login.php?error=Hanya admin yang dapat mengakses halaman ini.");
        exit();
    }
}

/**
 * Fungsi untuk membersihkan output HTML dan mencegah serangan XSS
 * @param string $string Data yang ingin dibersihkan dan diamankan
 * @return string Data yang sudah aman untuk ditampilkan di HTML
 */
function escape_html($string) {
    // Mengkonversi karakter khusus HTML menjadi entitas HTML
    return htmlspecialchars($string, ENT_QUOTES,'UTF-8');
}

?>