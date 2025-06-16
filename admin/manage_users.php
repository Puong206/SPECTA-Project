<?php
$page_title = 'Kelola Pengguna';
$current_page = 'users';
require_once 'templates/header.php';

// --- BAGIAN 1: MEMPROSES FORM (POST REQUEST) ---
// Logika ini hanya berjalan jika ada form yang disubmit.
// Setelah selesai, ia akan selalu me-redirect.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // A. Proses Tambah User
    if (isset($_POST['add_user'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        try {
            $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, SHA2(?, 256), ?)");
            $stmt->bind_param("sss", $username, $password, $role);
            $stmt->execute();
            header('Location: manage_users.php?status=add_success');
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) { // Error duplikat
                header('Location: manage_users.php?status=add_duplicate&username=' . urlencode($username));
            } else {
                header('Location: manage_users.php?status=add_error');
            }
        } finally {
            if (isset($stmt)) $stmt->close();
        }
        exit(); // Penting: selalu exit setelah redirect
    }

    // B. Proses Hapus User
    if (isset($_POST['delete_user'])) {
        if ($_POST['user_id'] == $_SESSION['user_id']) {
            header('Location: manage_users.php?status=delete_self_error');
        } else {
            $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
            $stmt->bind_param("i", $_POST['user_id']);
            if($stmt->execute()) {
                header('Location: manage_users.php?status=delete_success');
            } else {
                header('Location: manage_users.php?status=delete_error');
            }
            if (isset($stmt)) $stmt->close();
        }
        exit(); // Penting: selalu exit setelah redirect
    }
}


// --- BAGIAN 2: MENAMPILKAN HALAMAN (GET REQUEST) ---

// Menyiapkan pesan notifikasi berdasarkan status dari URL
$message = '';
$message_type = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'add_success':
            $message = 'Pengguna baru berhasil ditambahkan!'; $message_type = 'success'; break;
        case 'add_duplicate':
            $username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';
            $message = "Gagal: Username '$username' sudah digunakan."; $message_type = 'error'; break;
        case 'delete_success':
            $message = 'Pengguna berhasil dihapus.'; $message_type = 'success'; break;
        case 'delete_self_error':
            $message = 'Error: Anda tidak dapat menghapus akun Anda sendiri.'; $message_type = 'error'; break;
        default:
            $message = 'Terjadi kesalahan.'; $message_type = 'error'; break;
    }
}

// Mengambil data pengguna dari database untuk ditampilkan di tabel
$users_result = $conn->query("SELECT id, username, role FROM users ORDER BY id ASC");
?>

<h2 class="text-3xl font-bold mb-6">Kelola Pengguna</h2>

<?php if($message): ?>
    <div class="mb-4 p-4 rounded-lg <?php echo $message_type === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<div class="bg-white p-6 rounded-lg shadow-md mb-8">
    <h3 class="font-bold text-xl mb-4">Tambah Pengguna Baru</h3>
    <form method="POST" action="manage_users.php" class="grid md:grid-cols-3 gap-4 items-end">
        <div>
            <label class="block text-sm font-medium">Username</label>
            <input type="text" name="username" class="mt-1 w-full p-2 border rounded" required>
        </div>
        <div>
            <label class="block text-sm font-medium">Password</label>
            <input type="password" name="password" class="mt-1 w-full p-2 border rounded" required>
        </div>
        <div>
            <label class="block text-sm font-medium">Role</label>
            <select name="role" class="mt-1 w-full p-2 border rounded">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div>
            <button type="submit" name="add_user" class="w-full bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 font-semibold">Tambah Pengguna</button>
        </div>
    </form>
</div>

<div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="font-bold text-xl mb-4">Daftar Pengguna</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Username</th>
                    <th class="p-3 text-left">Role</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($user = $users_result->fetch_assoc()): ?>
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3"><?php echo $user['id']; ?></td>
                    <td class="p-3 font-medium"><?php echo escape_html($user['username']); ?></td>
                    <td class="p-3">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full <?php echo $user['role'] === 'admin' ? 'bg-blue-200 text-blue-800' : 'bg-gray-200 text-gray-800'; ?>">
                            <?php echo escape_html(ucfirst($user['role'])); ?>
                        </span>
                    </td>
                    <td class="p-3 text-center">
                        <?php if ($user['id'] != $_SESSION['user_id']): ?>
                        <form method="POST" action="manage_users.php" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');" class="inline-block">
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