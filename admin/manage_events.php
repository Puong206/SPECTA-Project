<?php
$page_title = 'Kelola Acara';
$current_page = 'events';
require_once 'templates/header.php';

$message = '';
$message_type = '';

// Handle POST requests untuk Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE events SET name = ?, description = ?, date = ?, price = ? WHERE id = ?");
    $stmt->bind_param("sssdi", $_POST['name'], $_POST['description'], $_POST['date'], $_POST['price'], $_POST['id']);
    if($stmt->execute()) {
        $message = "Acara berhasil diperbarui!";
        $message_type = 'success';
    } else {
        $message = "Gagal memperbarui acara.";
        $message_type = 'error';
    }
    $stmt->close();
}

// Mengambil semua data acara untuk ditampilkan
$events = $conn->query("SELECT * FROM events ORDER BY date ASC");
?>

<div class="admin-header">
    <i class="fas fa-calendar-alt text-blue-600"></i>
    <h2>Kelola Acara</h2>
</div>
        
<?php if($message): ?>
    <div class="mb-6 p-4 rounded-lg border-l-4 <?php echo $message_type === 'success' ? 'bg-green-50 border-green-500 text-green-800' : 'bg-red-50 border-red-500 text-red-800'; ?>">
        <div class="flex items-center gap-2">
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
        <table class="admin-table">
            <thead>
                <tr>
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
                    <form method="POST" action="">
                        <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
                        <td>
                            <input type="text" name="name" class="admin-input w-full" value="<?php echo escape_html($event['name']); ?>" required>
                        </td>
                        <td>
                            <textarea name="description" class="admin-input w-full h-20 resize-none" required><?php echo escape_html($event['description']); ?></textarea>
                        </td>
                        <td>
                            <input type="date" name="date" class="admin-input w-full" value="<?php echo escape_html($event['date']); ?>" required>
                        </td>
                        <td>
                            <input type="number" name="price" class="admin-input w-32" step="1000" value="<?php echo escape_html($event['price']); ?>" required>
                        </td>
                        <td class="text-center">
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