<?php
// Menentukan judul halaman dan halaman aktif untuk sidebar
$page_title = 'Kelola Transaksi';
$current_page = 'transactions';

// Memanggil header admin yang sudah mencakup koneksi DB, functions, dan cek admin
require_once 'templates/header.php';

$message = '';
$message_type = '';

// --- LOGIKA UNTUK UPDATE DAN DELETE ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. LOGIKA UNTUK MENGHAPUS TRANSAKSI
    if (isset($_POST['delete_transaction'])) {
        $transaction_id = $_POST['transaction_id'];
        $stmt = $conn->prepare("DELETE FROM transactions WHERE id = ?");
        $stmt->bind_param("i", $transaction_id);
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
        $transaction_id = $_POST['transaction_id'];
        $stmt = $conn->prepare("UPDATE transactions SET status = 'approved' WHERE id = ?");
        $stmt->bind_param("i", $transaction_id);
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

<h2 class="text-3xl font-bold mb-6">Kelola Transaksi Pendaftaran</h2>
        
<?php if($message): ?>
    <div class="mb-4 p-3 rounded-lg <?php echo $message_type === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Username</th>
                    <th class="p-3 text-left">Acara</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Tanggal Daftar</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($transactions_result->num_rows > 0): ?>
                    <?php while($trans = $transactions_result->fetch_assoc()): ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3"><?php echo $trans['id']; ?></td>
                        <td class="p-3 font-medium"><?php echo escape_html($trans['username']); ?></td>
                        <td class="p-3"><?php echo escape_html($trans['event_name']); ?></td>
                        <td class="p-3">
                            <?php if ($trans['status'] == 'approved'): ?>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-200 text-green-800">Approved</span>
                            <?php else: ?>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-200 text-yellow-800">Pending</span>
                            <?php endif; ?>
                        </td>
                        <td class="p-3"><?php echo date('d M Y, H:i', strtotime($trans['created_at'])); ?></td>
                        <td class="p-3 flex items-center justify-center gap-2">
                            <?php if ($trans['status'] == 'pending'): ?>
                            <form method="POST" action="">
                                <input type="hidden" name="transaction_id" value="<?php echo $trans['id']; ?>">
                                <button type="submit" name="approve_transaction" class="text-green-600 hover:text-green-800 font-semibold text-sm" title="Setujui Transaksi">
                                    <i class="fas fa-check-circle"></i> Approve
                                </button>
                            </form>
                            <?php endif; ?>

                            <form method="POST" action="" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini? Ini tidak dapat dibatalkan.');">
                                <input type="hidden" name="transaction_id" value="<?php echo $trans['id']; ?>">
                                <button type="submit" name="delete_transaction" class="text-red-600 hover:text-red-800 font-semibold text-sm" title="Hapus Transaksi">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center p-4 text-gray-500">Belum ada data transaksi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'templates/footer.php'; ?>