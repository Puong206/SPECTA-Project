<?php
// Mengatur judul halaman dan halaman aktif untuk navigasi sidebar
$page_title = 'Dashboard';
$current_page = 'dashboard';
require_once 'templates/header.php';

// Mengambil data ringkas untuk ditampilkan di dashboard
// Query untuk menghitung total pengguna yang terdaftar
$total_users = $conn->query("SELECT COUNT(id) as total FROM users")->fetch_assoc()['total'];

// Query untuk menghitung total acara yang tersedia
$total_events = $conn->query("SELECT COUNT(id) as total FROM events")->fetch_assoc()['total'];

// Query untuk menghitung total transaksi yang pernah dibuat
$total_transactions = $conn->query("SELECT COUNT(id) as total FROM transactions")->fetch_assoc()['total'];

// Query untuk menghitung transaksi yang masih menunggu persetujuan
$pending_transactions = $conn->query("SELECT COUNT(id) as total FROM transactions WHERE status = 'pending'")->fetch_assoc()['total'];

// Menghitung total pemasukan dari transaksi yang sudah disetujui
// Join dengan tabel events untuk mendapatkan harga tiket
$total_revenue_result = $conn->query("
    SELECT COALESCE(SUM(e.price), 0) as total_revenue 
    FROM transactions t 
    JOIN events e ON t.event_id = e.id 
    WHERE t.status = 'approved'
");
$total_revenue = $total_revenue_result->fetch_assoc()['total_revenue'];
?>

<!-- Header utama dashboard dengan desain gradient dan elemen dekoratif -->
<div class="relative mb-8 p-8 rounded-2xl bg-gradient-to-br from-primary via-primary/90 to-primary/80 text-white overflow-hidden">
    <!-- Elemen dekoratif untuk memberikan efek visual yang menarik -->
    <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/10 rounded-full filter blur-xl"></div>
    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-secondary/20 rounded-full filter blur-xl"></div>
    
    <!-- Konten utama header -->
    <div class="relative z-10">
        <!-- Informasi sambutan admin -->
        <div class="flex items-center gap-4 mb-4">
            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                <i class="fas fa-tachometer-alt text-2xl"></i>
            </div>
            <div>
                <h1 class="text-4xl font-bold mb-2">Dashboard Admin</h1>
                <!-- Menampilkan nama admin yang sedang login -->
                <p class="text-white/80 text-lg">Selamat datang kembali, <?php echo escape_html($_SESSION['username']); ?>! 👋</p>
            </div>
        </div>
        <!-- Menampilkan waktu saat ini yang akan diupdate secara real-time -->
        <div class="flex items-center gap-2 text-white/70">
            <i class="fas fa-clock"></i>
            <span id="current-datetime"><?php echo date('l, d F Y H:i:s'); ?></span>
        </div>
    </div>
</div>

<!-- Kartu statistik utama dalam grid responsif -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Kartu Total Pengguna -->
    <div class="admin-container card-hover group">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 font-medium mb-2">Total Pengguna</p>
                <!-- Menampilkan jumlah total pengguna -->
                <p class="text-3xl font-bold text-gray-800"><?php echo $total_users; ?></p>
                <p class="text-sm text-green-600 mt-1">
                    <i class="fas fa-arrow-up mr-1"></i>Aktif
                </p>
            </div>
            <!-- Icon dengan efek hover untuk visual yang menarik -->
            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <i class="fas fa-users text-2xl text-white"></i>
            </div>
        </div>
    </div>

    <!-- Kartu Total Acara -->
    <div class="admin-container card-hover group">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 font-medium mb-2">Total Acara</p>
                <!-- Menampilkan jumlah total acara yang tersedia -->
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

    <!-- Kartu Total Transaksi -->
    <div class="admin-container card-hover group">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 font-medium mb-2">Total Transaksi</p>
                <!-- Menampilkan jumlah total transaksi sepanjang waktu -->
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

    <!-- Kartu Transaksi Pending - Memerlukan perhatian admin -->
    <div class="admin-container card-hover group">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 font-medium mb-2">Transaksi Pending</p>
                <!-- Menampilkan jumlah transaksi yang menunggu persetujuan -->
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

<!-- Kartu Total Pemasukan - Informasi keuangan penting -->
<div class="admin-container card-hover group mb-6 bg-gradient-to-br from-emerald-50 to-emerald-100 border-2 border-emerald-200">
    <div class="flex items-center justify-between p-2">
        <div class="flex items-center gap-6">
            <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                <i class="fas fa-coins text-3xl text-white"></i>
            </div>
            <div>
                <p class="text-emerald-700 font-semibold mb-2 text-lg">💰 Total Pemasukan</p>
                <!-- Menampilkan total pendapatan dengan format rupiah -->
                <p class="text-5xl font-bold text-emerald-900 mb-2">Rp <?php echo number_format($total_revenue, 0, ',', '.'); ?></p>
                <p class="text-emerald-600 flex items-center gap-2">
                    <i class="fas fa-money-bill-wave"></i>
                    <span class="font-medium">Dari transaksi yang disetujui</span>
                    <!-- Menampilkan jumlah transaksi yang sudah disetujui -->
                    <span class="bg-emerald-200 text-emerald-800 px-2 py-1 rounded-full text-sm font-bold">
                        <?php 
                        // Query untuk menghitung transaksi yang sudah disetujui
                        $approved_count = $conn->query("SELECT COUNT(id) as total FROM transactions WHERE status = 'approved'")->fetch_assoc()['total'];
                        echo $approved_count; 
                        ?> transaksi
                    </span>
                </p>
            </div>
        </div>
        <!-- Informasi waktu update -->
        <div class="text-right">
            <div class="bg-emerald-600 text-white px-4 py-2 rounded-lg mb-2">
                <i class="fas fa-chart-line mr-2"></i>
                <span class="font-semibold">Revenue</span>
            </div>
            <p class="text-emerald-600 text-sm">
                <i class="fas fa-calendar mr-1"></i>
                Update: <?php echo date('d/m/Y H:i'); ?>
            </p>
        </div>
    </div>
</div>

<!-- Tombol aksi cepat untuk navigasi ke halaman utama -->
<div class="admin-container mb-6">
    <div class="flex items-center gap-3 mb-6">
        <div class="w-10 h-10 bg-gradient-to-br from-secondary to-secondary/80 rounded-lg flex items-center justify-center">
            <i class="fas fa-bolt text-white"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-800">Aksi Cepat</h3>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Tombol untuk mengelola acara -->
        <a href="manage_events.php" class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-primary to-primary/90 p-6 text-white transition-all duration-300 hover:scale-105 hover:shadow-xl">
            <div class="absolute -top-10 -right-10 w-20 h-20 bg-white/10 rounded-full"></div>
            <div class="relative z-10">
                <i class="fas fa-calendar-alt text-2xl mb-3 block"></i>
                <h4 class="font-semibold text-lg mb-2">Kelola Acara</h4>
                <p class="text-white/80 text-sm">Edit informasi acara dan jadwal</p>
            </div>
        </a>
        
        <!-- Tombol untuk mengelola pengguna -->
        <a href="manage_users.php" class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-green-600 to-green-700 p-6 text-white transition-all duration-300 hover:scale-105 hover:shadow-xl">
            <div class="absolute -top-10 -right-10 w-20 h-20 bg-white/10 rounded-full"></div>
            <div class="relative z-10">
                <i class="fas fa-users text-2xl mb-3 block"></i>
                <h4 class="font-semibold text-lg mb-2">Kelola Pengguna</h4>
                <p class="text-white/80 text-sm">Tambah, edit, atau hapus pengguna</p>
            </div>
        </a>
        
        <!-- Tombol untuk mengelola transaksi dengan badge notifikasi -->
        <a href="manage_transactions.php" class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-orange-600 to-orange-700 p-6 text-white transition-all duration-300 hover:scale-105 hover:shadow-xl">
            <div class="absolute -top-10 -right-10 w-20 h-20 bg-white/10 rounded-full"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <i class="fas fa-file-invoice-dollar text-2xl mb-3 block"></i>
                    <h4 class="font-semibold text-lg mb-2">Kelola Transaksi</h4>
                    <p class="text-white/80 text-sm">Review dan approve transaksi</p>
                </div>
                <!-- Badge notifikasi jika ada transaksi pending -->
                <?php if($pending_transactions > 0): ?>
                <div class="bg-red-500 text-white text-xs px-2 py-1 rounded-full font-bold">
                    <?php echo $pending_transactions; ?>
                </div>
                <?php endif; ?>
            </div>
        </a>
    </div>
</div>

<!-- Bagian aktivitas terbaru dalam layout grid -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Daftar pengguna yang baru mendaftar -->
    <div class="admin-container">
        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
            <i class="fas fa-user-plus text-blue-600"></i>
            Pengguna Terbaru
        </h3>
        <?php
        // Query untuk mengambil 5 pengguna terbaru berdasarkan ID
        $recent_users = $conn->query("SELECT username, role, id FROM users ORDER BY id DESC LIMIT 5");
        ?>
        <div class="space-y-3">
            <?php while($user = $recent_users->fetch_assoc()): ?>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                <div class="flex items-center gap-3">
                    <!-- Icon pengguna -->
                    <div class="w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-primary text-sm"></i>
                    </div>
                    <span class="font-medium"><?php echo escape_html($user['username']); ?></span>
                </div>
                <!-- Badge role dengan warna berbeda untuk admin dan user -->
                <span class="text-xs px-2 py-1 rounded-full <?php echo $user['role'] === 'admin' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800'; ?>">
                    <?php echo ucfirst($user['role']); ?>
                </span>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Daftar transaksi terbaru -->
    <div class="admin-container">
        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
            <i class="fas fa-clock text-orange-600"></i>
            Transaksi Terbaru
        </h3>
        <?php
        // Query untuk mengambil 5 transaksi terbaru dengan join ke tabel users dan events
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
                    <!-- Nama pengguna yang melakukan transaksi -->
                    <p class="font-medium text-sm"><?php echo escape_html($trans['username']); ?></p>
                    <!-- Nama acara yang didaftarkan -->
                    <p class="text-xs text-gray-600"><?php echo escape_html($trans['event_name']); ?></p>
                </div>
                <div class="text-right">
                    <!-- Badge status transaksi -->
                    <span class="text-xs px-2 py-1 rounded-full <?php echo $trans['status'] === 'approved' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'; ?>">
                        <?php echo ucfirst($trans['status']); ?>
                    </span>
                    <!-- Tanggal transaksi -->
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
    // Inisialisasi animasi AOS
    AOS.init({
        duration: 800,    // Durasi animasi 800ms
        once: true,       // Animasi hanya berjalan sekali
        offset: 100       // Offset 100px dari viewport
    });

    // Fungsi untuk mengupdate waktu secara real-time
    function updateDateTime() {
        const now = new Date();
        // Array nama hari dalam bahasa Indonesia
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        // Array nama bulan dalam bahasa Indonesia
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                       'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        
        // Mendapatkan komponen waktu
        const dayName = days[now.getDay()];
        const day = now.getDate().toString().padStart(2, '0');
        const month = months[now.getMonth()];
        const year = now.getFullYear();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        
        // Format waktu lengkap dalam bahasa Indonesia
        const formattedDateTime = `${dayName}, ${day} ${month} ${year} ${hours}:${minutes}:${seconds}`;
        document.getElementById('current-datetime').textContent = formattedDateTime;
    }
    
    // Update waktu setiap detik
    setInterval(updateDateTime, 1000);
    
    // Jalankan fungsi update waktu saat halaman dimuat
    updateDateTime();
</script>

<?php require_once 'templates/footer.php'; ?>