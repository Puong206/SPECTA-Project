<?php
// Memastikan file ini dipanggil dari file lain yang sudah memuat koneksi db dan fungsi
if (!isset($conn)) {
    require_once '../php/db_connect.php';
}
if (!function_exists('check_admin')) {
    require_once '../php/functions.php';
}

// Security check: Hanya admin yang boleh mengakses
check_admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($page_title) ? $page_title : 'Admin Dashboard'; ?> - IT SPECTA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="icon" href="../assets/images/logo.png" type="image/png" />
</head>
<body class="bg-gray-100">
<div class="min-h-screen flex">
    <aside class="w-64 bg-gray-800 text-white p-4 flex flex-col justify-between">
        <div>
            <h1 class="text-2xl font-bold mb-6 text-center">IT SPECTA ADMIN</h1>
            <nav>
                <a href="dashboard.php" class="flex items-center gap-3 py-2.5 px-4 rounded <?php echo $current_page == 'dashboard' ? 'bg-gray-700 font-semibold' : 'hover:bg-gray-700'; ?>"><i class="fas fa-tachometer-alt fa-fw"></i>Dashboard</a>
                <a href="manage_events.php" class="flex items-center gap-3 py-2.5 px-4 rounded <?php echo $current_page == 'events' ? 'bg-gray-700 font-semibold' : 'hover:bg-gray-700'; ?>"><i class="fas fa-calendar-alt fa-fw"></i>Kelola Acara</a>
                <a href="manage_users.php" class="flex items-center gap-3 py-2.5 px-4 rounded <?php echo $current_page == 'users' ? 'bg-gray-700 font-semibold' : 'hover:bg-gray-700'; ?>"><i class="fas fa-users fa-fw"></i>Kelola Pengguna</a>
                <a href="manage_transactions.php" class="flex items-center gap-3 py-2.5 px-4 rounded <?php echo $current_page == 'transactions' ? 'bg-gray-700 font-semibold' : 'hover:bg-gray-700'; ?>"><i class="fas fa-file-invoice-dollar fa-fw"></i>Kelola Transaksi</a>
            </nav>
        </div>
        <a href="../php/logout.php" class="flex items-center gap-3 py-2.5 px-4 rounded hover:bg-red-600 bg-red-500 mt-4"><i class="fas fa-sign-out-alt fa-fw"></i>Logout</a>
    </aside>

    <main class="flex-1 p-8 md:p-10">