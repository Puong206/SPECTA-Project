<?php
// Memanggil file koneksi dan fungsi
require_once '../php/db_connect.php';
require_once '../php/functions.php';

// Melindungi halaman ini hanya untuk admin
check_admin(); 

// Mengambil beberapa data ringkas untuk ditampilkan di dashboard
$total_users = $conn->query("SELECT COUNT(id) as total FROM users")->fetch_assoc()['total'];
$total_events = $conn->query("SELECT COUNT(id) as total FROM events")->fetch_assoc()['total'];
$total_transactions = $conn->query("SELECT COUNT(id) as total FROM transactions")->fetch_assoc()['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - IT SPECTA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex">
    <div class="w-64 bg-gray-800 text-white p-4 flex flex-col justify-between">
        <div>
            <h1 class="text-2xl font-bold mb-6 text-center">IT SPECTA</h1>
            <nav>
                <a href="dashboard.php" class="flex items-center gap-3 py-2.5 px-4 rounded bg-gray-700 font-semibold"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                <a href="manage_events.php" class="flex items-center gap-3 py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-calendar-alt"></i>Kelola Acara</a>
                <a href="manage_users.php" class="flex items-center gap-3 py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-users"></i>Kelola Pengguna</a>
            </nav>
        </div>
        <a href="../php/logout.php" class="flex items-center gap-3 py-2.5 px-4 rounded hover:bg-red-600 bg-red-500 mt-4"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>

    <div class="flex-1 p-10">
        <h2 class="text-3xl font-bold mb-2">Dashboard</h2>
        <p class="text-gray-600 mb-6">Selamat datang kembali, <?php echo escape_html($_SESSION['username']); ?>!</p>
        
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
                <i class="fas fa-users text-3xl text-blue-500"></i>
                <div>
                    <p class="text-gray-500">Total Pengguna</p>
                    <p class="text-2xl font-bold"><?php echo $total_users; ?></p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
                <i class="fas fa-calendar-alt text-3xl text-green-500"></i>
                <div>
                    <p class="text-gray-500">Total Acara</p>
                    <p class="text-2xl font-bold"><?php echo $total_events; ?></p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
                <i class="fas fa-file-invoice-dollar text-3xl text-yellow-500"></i>
                <div>
                    <p class="text-gray-500">Total Transaksi</p>
                    <p class="text-2xl font-bold"><?php echo $total_transactions; ?></p>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <h3 class="text-xl font-bold mb-4">Aksi Cepat</h3>
            <div class="flex gap-4">
                <a href="manage_events.php" class="bg-blue-600 text-white font-semibold py-3 px-5 rounded-lg hover:bg-blue-700 transition-all">
                    Kelola Acara &rarr;
                </a>
                <a href="manage_users.php" class="bg-green-600 text-white font-semibold py-3 px-5 rounded-lg hover:bg-green-700 transition-all">
                    Kelola Pengguna &rarr;
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>