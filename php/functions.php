<?php
/**
 * File: /php/functions.php
 * Berisi fungsi-fungsi umum yang akan digunakan di seluruh situs.
 */

/**
 * Memeriksa apakah pengguna sudah login atau belum.
 * Jika belum, akan mengarahkan pengguna ke halaman login.
 * * @param string $redirect_page Halaman tujuan setelah login berhasil.
 */
function check_login($redirect_page = 'index.php') {
    // Pastikan session sudah dimulai. File db_connect.php biasanya sudah memulainya.
    if (!isset($_SESSION['user_id'])) {
        // Jika tidak ada session user_id, redirect ke login
        header("Location: login.php?redirect=" . urlencode($redirect_page));
        exit();
    }
}

/**
 * Memeriksa apakah pengguna yang login adalah seorang admin.
 * Jika tidak login atau bukan admin, akan mengarahkan ke halaman login dengan pesan error.
 */
function check_admin() {
    // Pastikan session sudah dimulai.
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
        // Jika tidak ada session sama sekali
        header("Location: ../login.php?error=Anda harus login untuk mengakses halaman ini.");
        exit();
    }

    if ($_SESSION['role'] !== 'admin') {
        // Jika ada session, tapi rolenya bukan admin
        header("Location: ../login.php?error=Hanya admin yang dapat mengakses halaman ini.");
        exit();
    }
}

/**
 * Fungsi bantuan untuk membersihkan output HTML (mencegah XSS).
 * * @param string $string Data yang ingin dibersihkan.
 * @return string Data yang sudah aman untuk ditampilkan di HTML.
 */
function escape_html($string) {
    return htmlspecialchars($string, ENT_QUOTES,'UTF-8');
}

?>