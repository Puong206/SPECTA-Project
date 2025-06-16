<?php
require_once '../php/db_connect.php';
require_once '../php/functions.php';

check_admin();

// Mengambil semua data transaksi dengan join untuk mendapatkan nama user dan nama event
$transactions = $conn->query("
    SELECT 
        transactions.id, 
        users.username, 
        events.name as event_name, 
        transactions.amount, 
        transactions.status,
        transactions.created_at
    FROM transactions
    JOIN users ON transactions.user_id = users.id
    JOIN events ON transactions.event_id = events.id
    ORDER BY transactions.created_at DESC
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex">
    <div class="w-64 bg-gray-800 text-white p-4">
        <h1 class="text-2xl font-bold mb-6 text-center">IT SPECTA</h1>
        <nav>
            <a href="dashboard.php" class="flex items-center gap-3 py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
            <a href="manage_events.php" class="flex items-center gap-3 py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-calendar-alt"></i>Kelola Acara</a>
            <a href="manage_users.php" class="flex items-center gap-3 py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-users"></i>Kelola Pengguna</a>
            <a href="manage_transactions.php" class="flex items-center gap-3 py-2.5 px-4 rounded bg-gray-700 font-semibold"><i class="fas fa-file-invoice-dollar"></i>Kelola Transaksi</a>
            <a href="../php/logout.php" class="flex items-center gap-3 py-2.5 px-4 rounded hover:bg-red-600 bg-red-500 mt-4"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </nav>
    </div>

    <div class="flex-1 p-10">
        <h2 class="text-3xl font-bold mb-6">Kelola Transaksi Pendaftaran</h2>
        
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-3 text-left">ID Trans.</th>
                            <th class="p-3 text-left">Username</th>
                            <th class="p-3 text-left">Acara</th>
                            <th class="p-3 text-left">Jumlah</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($trans = $transactions->fetch_assoc()): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3"><?php echo $trans['id']; ?></td>
                            <td class="p-3 font-medium"><?php echo escape_html($trans['username']); ?></td>
                            <td class="p-3"><?php echo escape_html($trans['event_name']); ?></td>
                            <td class="p-3">Rp <?php echo number_format($trans['amount']); ?></td>
                            <td class="p-3"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-200 text-yellow-800"><?php echo escape_html($trans['status']); ?></span></td>
                            <td class="p-3"><?php echo date('d M Y, H:i', strtotime($trans['created_at'])); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>