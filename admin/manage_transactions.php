<?php
// Menentukan judul halaman dan halaman aktif untuk sidebar
$page_title = 'Kelola Transaksi';
$current_page = 'transactions';

// Memanggil header admin yang sudah mencakup koneksi DB, functions, dan cek admin
require_once 'templates/header.php';

// Variabel untuk menyimpan pesan notifikasi
$message = '';
$message_type = '';

// --- LOGIKA UNTUK UPDATE DAN DELETE ---
// Memproses form yang dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. LOGIKA UNTUK MENGHAPUS TRANSAKSI
    if (isset($_POST['delete_transaction'])) {
        // Mengambil ID transaksi yang akan dihapus
        $transaction_id = $_POST['transaction_id'];
        
        // Prepared statement untuk mencegah SQL injection
        $stmt = $conn->prepare("DELETE FROM transactions WHERE id = ?");
        $stmt->bind_param("i", $transaction_id);
        
        // Eksekusi query dan cek hasil
        if ($stmt->execute()) {
            $message = "Transaksi berhasil dihapus.";
            $message_type = 'success';
        } else {
            $message = "Gagal menghapus transaksi.";
            $message_type = 'error';
        }
        $stmt->close();
    }

    // 2. LOGIKA UNTUK MENYETUJUI TRANSAKSI
    if (isset($_POST['approve_transaction'])) {
        // Mengambil ID transaksi yang akan disetujui
        $transaction_id = $_POST['transaction_id'];
        
        // Update status transaksi menjadi 'approved'
        $stmt = $conn->prepare("UPDATE transactions SET status = 'approved' WHERE id = ?");
        $stmt->bind_param("i", $transaction_id);
        
        // Eksekusi query dan cek hasil
        if ($stmt->execute()) {
            $message = "Status transaksi berhasil diubah menjadi 'Approved'.";
            $message_type = 'success';
        } else {
            $message = "Gagal menyetujui transaksi.";
            $message_type = 'error';
        }
        $stmt->close();
    }
}

// Mengambil semua data transaksi dengan JOIN untuk mendapatkan nama user dan nama event
// Query ini menggabungkan 3 tabel: transactions, users, dan events
$transactions_result = $conn->query("
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

<!-- Header halaman dengan icon dan judul -->
<div class="admin-header">
    <i class="fas fa-file-invoice-dollar text-blue-600"></i>
    <h2>Kelola Transaksi Pendaftaran</h2>
</div>
        
<?php if($message): ?>
    <!-- Menampilkan pesan notifikasi berdasarkan hasil operasi -->
    <div class="mb-6 p-4 rounded-lg border-l-4 <?php echo $message_type === 'success' ? 'bg-green-50 border-green-500 text-green-800' : 'bg-red-50 border-red-500 text-red-800'; ?>">
        <div class="flex items-center gap-2">
            <!-- Icon berbeda untuk success dan error -->
            <i class="fas <?php echo $message_type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'; ?>"></i>
            <?php echo $message; ?>
        </div>
    </div>
<?php endif; ?>

<div class="admin-container">
    <h3 class="font-bold text-xl mb-6 flex items-center gap-2">
        <i class="fas fa-list text-gray-600"></i>
        Daftar Transaksi
    </h3>
    <div class="overflow-x-auto">
        <!-- Tabel dengan sorting capability -->
        <table class="admin-table">
            <thead>
                <tr>
                    <!-- Header tabel dengan fitur sorting -->
                    <th class="sortable-header" data-type="string">
                        <i class="fas fa-user mr-2"></i>Username
                        <i class="fas fa-sort sort-arrow"></i>
                    </th>
                    <th class="sortable-header" data-type="string">
                        <i class="fas fa-calendar-alt mr-2"></i>Acara
                        <i class="fas fa-sort sort-arrow"></i>
                    </th>
                    <th class="sortable-header" data-type="string">
                        <i class="fas fa-info-circle mr-2"></i>Status
                        <i class="fas fa-sort sort-arrow"></i>
                    </th>
                    <th class="sortable-header" data-type="date">
                        <i class="fas fa-clock mr-2"></i>Tanggal Daftar
                        <i class="fas fa-sort sort-arrow"></i>
                    </th>
                    <th class="text-center"><i class="fas fa-cogs mr-2"></i>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($transactions_result->num_rows > 0): ?>
                    <?php while($trans = $transactions_result->fetch_assoc()): ?>
                    <tr>
                        <!-- Nama pengguna yang melakukan transaksi -->
                        <td class="font-semibold"><?php echo escape_html($trans['username']); ?></td>
                        <!-- Nama acara yang didaftarkan -->
                        <td><?php echo escape_html($trans['event_name']); ?></td>
                        <td>
                            <?php if ($trans['status'] == 'approved'): ?>
                                <!-- Badge hijau untuk status approved -->
                                <span class="status-badge status-badge-success">
                                    <i class="fas fa-check mr-1"></i>Approved
                                </span>
                            <?php else: ?>
                                <!-- Badge kuning untuk status pending -->
                                <span class="status-badge status-badge-warning">
                                    <i class="fas fa-clock mr-1"></i>Pending
                                </span>
                            <?php endif; ?>
                        </td>
                        <!-- Tanggal transaksi dengan format yang mudah dibaca -->
                        <td class="font-mono"><?php echo date('d M Y, H:i', strtotime($trans['created_at'])); ?></td>
                        <td class="text-center">
                            <div class="flex items-center justify-center gap-2">
                                <?php if ($trans['status'] == 'pending'): ?>
                                <!-- Tombol approve hanya ditampilkan untuk status pending -->
                                <form method="POST" action="" class="inline-block">
                                    <input type="hidden" name="transaction_id" value="<?php echo $trans['id']; ?>">
                                    <button type="submit" name="approve_transaction" class="admin-button admin-button-success text-sm" title="Setujui Transaksi">
                                        <i class="fas fa-check-circle mr-1"></i>Approve
                                    </button>
                                </form>
                                <?php endif; ?>

                                <!-- Tombol hapus dengan konfirmasi JavaScript -->
                                <form method="POST" action="" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini? Ini tidak dapat dibatalkan.');" class="inline-block">
                                    <input type="hidden" name="transaction_id" value="<?php echo $trans['id']; ?>">
                                    <button type="submit" name="delete_transaction" class="admin-button admin-button-danger text-sm" title="Hapus Transaksi">
                                        <i class="fas fa-trash mr-1"></i>Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <!-- Pesan jika tidak ada data transaksi -->
                    <tr>
                        <td colspan="5" class="text-center p-8 text-gray-500">
                            <i class="fas fa-inbox text-4xl mb-4 block"></i>
                            <p class="text-lg font-medium">Belum ada data transaksi.</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'templates/footer.php'; ?>