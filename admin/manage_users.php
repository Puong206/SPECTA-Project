<?php
$page_title = 'Kelola Pengguna';
$current_page = 'users';
require_once 'templates/header.php';

$message = '';
$message_type = '';

// Logika untuk Create dan Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_user'])) {
        $stmt = $conn->prepare("INSERT INTO users (username, password, role, full_name, position, photo_path) VALUES (?, SHA2(?, 256), ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $_POST['username'], $_POST['password'], $_POST['role'], $_POST['full_name'], $_POST['position'], $_POST['photo_path']);
        if ($stmt->execute()) {
            $message = "Pengguna baru berhasil ditambahkan!"; $message_type = 'success';
        } else {
            $message = "Gagal: Username mungkin sudah ada."; $message_type = 'error';
        }
        $stmt->close();
    } elseif (isset($_POST['delete_user'])) {
        if ($_POST['user_id'] == $_SESSION['user_id']) {
            $message = "Error: Anda tidak dapat menghapus akun Anda sendiri."; $message_type = 'error';
        } else {
            $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
            $stmt->bind_param("i", $_POST['user_id']);
            if($stmt->execute()) {
                $message = "Pengguna berhasil dihapus."; $message_type = 'success';
            } else {
                $message = "Gagal menghapus pengguna."; $message_type = 'error';
            }
            $stmt->close();
        }
    }
}

$users = $conn->query("SELECT id, username, role, created_at FROM users ORDER BY created_at DESC");
?>

<h2 class="text-3xl font-bold mb-6">Kelola Pengguna</h2>

<?php if($message): ?>
    <div class="mb-4 p-3 rounded-lg <?php echo $message_type === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<div class="bg-white p-6 rounded-lg shadow-md mb-8">
    <h3 class="font-bold text-xl mb-4">Tambah Pengguna Baru</h3>
    <form method="POST" action="" class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
        <div>
            <label class="block text-sm font-medium">Username</label>
            <input type="text" name="username" class="mt-1 w-full p-2 border rounded" required>
        </div>
        <div>
            <label class="block text-sm font-medium">Password</label>
            <input type="password" name="password" class="mt-1 w-full p-2 border rounded" required>
        </div>
        <div>
            <label class="block text-sm font-medium">Nama Lengkap</label>
            <input type="text" name="full_name" class="mt-1 w-full p-2 border rounded">
        </div>
        <div>
            <label class="block text-sm font-medium">Jabatan</label>
            <input type="text" name="position" class="mt-1 w-full p-2 border rounded">
        </div>
        <div>
            <label class="block text-sm font-medium">Path Foto (e.g., assets/images/foto.jpg)</label>
            <input type="text" name="photo_path" class="mt-1 w-full p-2 border rounded">
        </div>
        <div>
            <label class="block text-sm font-medium">Role</label>
            <select name="role" class="mt-1 w-full p-2 border rounded">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="lg:col-span-2">
             <button type="submit" name="add_user" class="w-full bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 font-semibold">Tambah Pengguna</button>
        </div>
    </form>
</div>

<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Username</th>
                    <th class="p-3 text-left">Role</th>
                    <th class="p-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($user = $users->fetch_assoc()): ?>
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3"><?php echo $user['id']; ?></td>
                    <td class="p-3 font-medium"><?php echo escape_html($user['username']); ?></td>
                    <td class="p-3"><span class="px-2 py-1 text-xs font-semibold rounded-full <?php echo $user['role'] === 'admin' ? 'bg-blue-200 text-blue-800' : 'bg-gray-200 text-gray-800'; ?>"><?php echo escape_html($user['role']); ?></span></td>
                    <td class="p-3">
                        <?php if ($user['id'] != $_SESSION['user_id']): ?>
                        <form method="POST" action="" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <button type="submit" name="delete_user" class="text-red-600 hover:text-red-800 font-semibold text-sm">Hapus</button>
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'templates/footer.php'; ?>