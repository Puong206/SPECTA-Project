<?php
$page_title = 'Dashboard';
$current_page = 'dashboard';
require_once 'templates/header.php';

// Mengambil data ringkas untuk ditampilkan di dashboard
$total_users = $conn->query("SELECT COUNT(id) as total FROM users")->fetch_assoc()['total'];
$total_events = $conn->query("SELECT COUNT(id) as total FROM events")->fetch_assoc()['total'];
$total_transactions = $conn->query("SELECT COUNT(id) as total FROM transactions")->fetch_assoc()['total'];
?>

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

<div class="mt-8 bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-xl font-bold mb-4">Aksi Cepat</h3>
    <div class="flex gap-4">
        <a href="manage_events.php" class="bg-blue-600 text-white font-semibold py-3 px-5 rounded-lg hover:bg-blue-700 transition-all">
            Kelola Acara &rarr;
        </a>
        <a href="manage_users.php" class="bg-green-600 text-white font-semibold py-3 px-5 rounded-lg hover:bg-green-700 transition-all">
            Kelola Pengguna &rarr;
        </a>
        <a href="manage_transactions.php" class="bg-yellow-600 text-white font-semibold py-3 px-5 rounded-lg hover:bg-yellow-700 transition-all">
            Lihat Transaksi &rarr;
        </a>
    </div>
</div>

<?php require_once 'templates/footer.php'; ?>