<?php
// --- BAGIAN 1: INISIALISASI DAN KONEKSI ---
require_once '../php/db_connect.php';
require_once '../php/functions.php';

// Security check first
check_admin();

// --- BAGIAN 2: MEMPROSES FORM (POST REQUEST) ---
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

// --- BAGIAN 3: MENYIAPKAN DATA UNTUK TAMPILAN ---
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

// --- BAGIAN 4: SET VARIABEL UNTUK HEADER DAN INCLUDE ---
$page_title = 'Kelola Pengguna';
$current_page = 'users';
require_once 'templates/header.php';
?>

<div class="admin-header">
    <i class="fas fa-users text-blue-600"></i>
    <h2>Kelola Pengguna</h2>
</div>

<?php if($message): ?>
    <div class="mb-6 p-4 rounded-lg border-l-4 <?php echo $message_type === 'success' ? 'bg-green-50 border-green-500 text-green-800' : 'bg-red-50 border-red-500 text-red-800'; ?>">
        <div class="flex items-center gap-2">
            <i class="fas <?php echo $message_type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'; ?>"></i>
            <?php echo $message; ?>
        </div>
    </div>
<?php endif; ?>

<div class="admin-container mb-8">
    <h3 class="font-bold text-xl mb-6 flex items-center gap-2">
        <i class="fas fa-user-plus text-green-600"></i>
        Tambah Pengguna Baru
    </h3>
    <form method="POST" action="manage_users.php" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
            <input type="text" name="username" class="admin-input" required placeholder="Masukkan username">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
            <input type="password" name="password" class="admin-input" required placeholder="Masukkan password">
        </div>
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">Role</label>
            <select name="role" class="admin-input">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div>
            <button type="submit" name="add_user" class="admin-button admin-button-success w-full">
                <i class="fas fa-plus mr-2"></i>Tambah Pengguna
            </button>
        </div>
    </form>
</div>

<div class="admin-container">
    <h3 class="font-bold text-xl mb-6 flex items-center gap-2">
        <i class="fas fa-list text-gray-600"></i>
        Daftar Pengguna
    </h3>
    <div class="overflow-x-auto">
        <table class="admin-table">
            <thead>
                <tr>
                    <th class="sortable-header" data-type="string">
                        <i class="fas fa-user mr-2"></i>Username
                        <i class="fas fa-sort sort-arrow"></i>
                    </th>
                    <th class="sortable-header" data-type="string">
                        <i class="fas fa-shield-alt mr-2"></i>Role
                        <i class="fas fa-sort sort-arrow"></i>
                    </th>
                    <th class="text-center"><i class="fas fa-cogs mr-2"></i>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($user = $users_result->fetch_assoc()): ?>
                <tr>
                    <td class="font-semibold"><?php echo escape_html($user['username']); ?></td>
                    <td>
                        <span class="status-badge <?php echo $user['role'] === 'admin' ? 'status-badge-info' : 'status-badge-secondary'; ?>">
                            <?php echo escape_html(ucfirst($user['role'])); ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <?php if ($user['id'] != $_SESSION['user_id']): ?>
                        <form method="POST" action="manage_users.php" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');" class="inline-block">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <button type="submit" name="delete_user" class="admin-button admin-button-danger text-sm">
                                <i class="fas fa-trash mr-1"></i>Hapus
                            </button>
                        </form>
                        <?php else: ?>
                        <span class="text-gray-400 text-sm italic">Akun Anda</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'templates/footer.php'; ?>