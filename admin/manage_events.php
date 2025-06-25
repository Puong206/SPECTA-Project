<?php
// Mengatur judul halaman dan halaman aktif untuk navigasi sidebar
$page_title = 'Kelola Acara';
$current_page = 'events';
require_once 'templates/header.php';

// Variabel untuk menyimpan pesan notifikasi hasil operasi
$message = '';
$message_type = '';

// Handle POST requests untuk Update acara
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    // Prepared statement untuk update data acara
    // Mencegah SQL injection dengan bind parameter
    $stmt = $conn->prepare("UPDATE events SET name = ?, description = ?, date = ?, price = ? WHERE id = ?");
    $stmt->bind_param("sssdi", $_POST['name'], $_POST['description'], $_POST['date'], $_POST['price'], $_POST['id']);
    
    // Eksekusi query dan set pesan hasil
    if($stmt->execute()) {
        $message = "Acara berhasil diperbarui!";
        $message_type = 'success';
    } else {
        $message = "Gagal memperbarui acara.";
        $message_type = 'error';
    }
    $stmt->close();
}

// Mengambil semua data acara untuk ditampilkan di tabel
// Diurutkan berdasarkan tanggal acara secara ascending
$events = $conn->query("SELECT * FROM events ORDER BY date ASC");
?>

<!-- Header halaman dengan icon dan judul -->
<div class="admin-header">
    <i class="fas fa-calendar-alt text-blue-600"></i>
    <h2>Kelola Acara</h2>
</div>
        
<?php if($message): ?>
    <!-- Menampilkan pesan notifikasi hasil operasi -->
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
        <i class="fas fa-edit text-green-600"></i>
        Edit Acara
    </h3>
    <div class="overflow-x-auto">
        <!-- Tabel untuk mengedit acara dengan fitur sorting -->
        <table class="admin-table">
            <thead>
                <tr>
                    <!-- Header tabel dengan kemampuan sorting -->
                    <th class="sortable-header" data-type="string">
                        <i class="fas fa-tag mr-2"></i>Nama Acara
                        <i class="fas fa-sort sort-arrow"></i>
                    </th>
                    <th class="sortable-header" data-type="string">
                        <i class="fas fa-align-left mr-2"></i>Deskripsi
                        <i class="fas fa-sort sort-arrow"></i>
                    </th>
                    <th class="sortable-header" data-type="date">
                        <i class="fas fa-calendar mr-2"></i>Tanggal
                        <i class="fas fa-sort sort-arrow"></i>
                    </th>
                    <th class="sortable-header" data-type="number">
                        <i class="fas fa-money-bill-wave mr-2"></i>Harga (Rp)
                        <i class="fas fa-sort sort-arrow"></i>
                    </th>
                    <th class="text-center"><i class="fas fa-save mr-2"></i>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($event = $events->fetch_assoc()): ?>
                <tr>
                    <!-- Form untuk setiap baris acara, memungkinkan edit inline -->
                    <form method="POST" action="">
                        <!-- Hidden input untuk menyimpan ID acara -->
                        <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
                        <td>
                            <!-- Input nama acara dengan validasi required -->
                            <input type="text" name="name" class="admin-input w-full" value="<?php echo escape_html($event['name']); ?>" required>
                        </td>
                        <td>
                            <!-- Textarea untuk deskripsi acara -->
                            <textarea name="description" class="admin-input w-full h-20 resize-none" required><?php echo escape_html($event['description']); ?></textarea>
                        </td>
                        <td>
                            <!-- Input tanggal dengan tipe date -->
                            <input type="date" name="date" class="admin-input w-full" value="<?php echo escape_html($event['date']); ?>" required>
                        </td>
                        <td>
                            <!-- Input harga dengan step 1000 (kelipatan ribuan) -->
                            <input type="number" name="price" class="admin-input w-32" step="1000" value="<?php echo escape_html($event['price']); ?>" required>
                        </td>
                        <td class="text-center">
                            <!-- Tombol update untuk menyimpan perubahan -->
                            <button type="submit" name="update" class="admin-button admin-button-primary">
                                <i class="fas fa-save mr-1"></i>Update
                            </button>
                        </td>
                    </form>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'templates/footer.php'; ?>