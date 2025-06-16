<?php
$page_title = 'Dashboard';
$current_page = 'dashboard';
require_once 'templates/header.php';

// Mengambil data ringkas untuk ditampilkan di dashboard
$total_users = $conn->query("SELECT COUNT(id) as total FROM users")->fetch_assoc()['total'];
$total_events = $conn->query("SELECT COUNT(id) as total FROM events")->fetch_assoc()['total'];
$total_transactions = $conn->query("SELECT COUNT(id) as total FROM transactions")->fetch_assoc()['total'];
$pending_transactions = $conn->query("SELECT COUNT(id) as total FROM transactions WHERE status = 'pending'")->fetch_assoc()['total'];
?>

<!-- Header dengan gradient background -->
<div class="relative mb-8 p-8 rounded-2xl bg-gradient-to-br from-primary via-primary/90 to-primary/80 text-white overflow-hidden">
    <!-- Decorative elements -->
    <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/10 rounded-full filter blur-xl"></div>
    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-secondary/20 rounded-full filter blur-xl"></div>
    
    <div class="relative z-10">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                <i class="fas fa-tachometer-alt text-2xl"></i>
            </div>
            <div>
                <h1 class="text-4xl font-bold mb-2">Dashboard Admin</h1>
                <p class="text-white/80 text-lg">Selamat datang kembali, <?php echo escape_html($_SESSION['username']); ?>! 👋</p>
            </div>
        </div>
        <div class="flex items-center gap-2 text-white/70">
            <i class="fas fa-clock"></i>
            <span><?php echo date('l, d F Y'); ?></span>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Users Card -->
    <div class="admin-container card-hover group">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 font-medium mb-2">Total Pengguna</p>
                <p class="text-3xl font-bold text-gray-800"><?php echo $total_users; ?></p>
                <p class="text-sm text-green-600 mt-1">
                    <i class="fas fa-arrow-up mr-1"></i>Aktif
                </p>
            </div>
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-users text-2xl text-white"></i>
            </div>
        </div>
    </div>

    <!-- Total Events Card -->
    <div class="admin-container card-hover group">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 font-medium mb-2">Total Acara</p>
                <p class="text-3xl font-bold text-gray-800"><?php echo $total_events; ?></p>
                <p class="text-sm text-blue-600 mt-1">
                    <i class="fas fa-calendar mr-1"></i>Tersedia
                </p>
            </div>
            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-calendar-alt text-2xl text-white"></i>
            </div>
        </div>
    </div>

    <!-- Total Transactions Card -->
    <div class="admin-container card-hover group">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 font-medium mb-2">Total Transaksi</p>
                <p class="text-3xl font-bold text-gray-800"><?php echo $total_transactions; ?></p>
                <p class="text-sm text-purple-600 mt-1">
                    <i class="fas fa-chart-line mr-1"></i>Semua waktu
                </p>
            </div>
            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-file-invoice-dollar text-2xl text-white"></i>
            </div>
        </div>
    </div>

    <!-- Pending Transactions Card -->
    <div class="admin-container card-hover group">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 font-medium mb-2">Transaksi Pending</p>
                <p class="text-3xl font-bold text-gray-800"><?php echo $pending_transactions; ?></p>
                <p class="text-sm text-orange-600 mt-1">
                    <i class="fas fa-clock mr-1"></i>Menunggu persetujuan
                </p>
            </div>
            <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-hourglass-half text-2xl text-white"></i>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="admin-container mb-8">
    <div class="flex items-center gap-3 mb-6">
        <div class="w-10 h-10 bg-gradient-to-br from-secondary to-secondary/80 rounded-lg flex items-center justify-center">
            <i class="fas fa-bolt text-white"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-800">Aksi Cepat</h3>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="manage_events.php" class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-primary to-primary/90 p-6 text-white transition-all duration-300 hover:scale-105 hover:shadow-xl">
            <div class="absolute -top-10 -right-10 w-20 h-20 bg-white/10 rounded-full"></div>
            <div class="relative z-10">
                <i class="fas fa-calendar-alt text-2xl mb-3 block"></i>
                <h4 class="font-semibold text-lg mb-2">Kelola Acara</h4>
                <p class="text-white/80 text-sm">Edit informasi acara dan jadwal</p>
            </div>
        </a>
        
        <a href="manage_users.php" class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-green-600 to-green-700 p-6 text-white transition-all duration-300 hover:scale-105 hover:shadow-xl">
            <div class="absolute -top-10 -right-10 w-20 h-20 bg-white/10 rounded-full"></div>
            <div class="relative z-10">
                <i class="fas fa-users text-2xl mb-3 block"></i>
                <h4 class="font-semibold text-lg mb-2">Kelola Pengguna</h4>
                <p class="text-white/80 text-sm">Tambah, edit, atau hapus pengguna</p>
            </div>
        </a>
        
        <a href="manage_transactions.php" class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-orange-600 to-orange-700 p-6 text-white transition-all duration-300 hover:scale-105 hover:shadow-xl">
            <div class="absolute -top-10 -right-10 w-20 h-20 bg-white/10 rounded-full"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <i class="fas fa-file-invoice-dollar text-2xl mb-3 block"></i>
                    <h4 class="font-semibold text-lg mb-2">Kelola Transaksi</h4>
                    <p class="text-white/80 text-sm">Review dan approve transaksi</p>
                </div>
                <?php if($pending_transactions > 0): ?>
                <div class="bg-red-500 text-white text-xs px-2 py-1 rounded-full font-bold">
                    <?php echo $pending_transactions; ?>
                </div>
                <?php endif; ?>
            </div>
        </a>
    </div>
</div>

<!-- Recent Activity Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Recent Users -->
    <div class="admin-container">
        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
            <i class="fas fa-user-plus text-blue-600"></i>
            Pengguna Terbaru
        </h3>
        <?php
        $recent_users = $conn->query("SELECT username, role, id FROM users ORDER BY id DESC LIMIT 5");
        ?>
        <div class="space-y-3">
            <?php while($user = $recent_users->fetch_assoc()): ?>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-primary text-sm"></i>
                    </div>
                    <span class="font-medium"><?php echo escape_html($user['username']); ?></span>
                </div>
                <span class="text-xs px-2 py-1 rounded-full <?php echo $user['role'] === 'admin' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800'; ?>">
                    <?php echo ucfirst($user['role']); ?>
                </span>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Recent Transactions -->
    <div class="admin-container">
        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
            <i class="fas fa-clock text-orange-600"></i>
            Transaksi Terbaru
        </h3>
        <?php
        $recent_transactions = $conn->query("
            SELECT t.status, u.username, e.name as event_name, t.created_at 
            FROM transactions t 
            JOIN users u ON t.user_id = u.id 
            JOIN events e ON t.event_id = e.id 
            ORDER BY t.created_at DESC LIMIT 5
        ");
        ?>
        <div class="space-y-3">
            <?php while($trans = $recent_transactions->fetch_assoc()): ?>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                <div>
                    <p class="font-medium text-sm"><?php echo escape_html($trans['username']); ?></p>
                    <p class="text-xs text-gray-600"><?php echo escape_html($trans['event_name']); ?></p>
                </div>
                <div class="text-right">
                    <span class="text-xs px-2 py-1 rounded-full <?php echo $trans['status'] === 'approved' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'; ?>">
                        <?php echo ucfirst($trans['status']); ?>
                    </span>
                    <p class="text-xs text-gray-500 mt-1"><?php echo date('d/m/Y', strtotime($trans['created_at'])); ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<!-- Add AOS animations -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });
</script>

<?php require_once 'templates/footer.php'; ?>