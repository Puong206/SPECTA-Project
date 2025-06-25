<?php
// --- BAGIAN 1: INISIALISASI DAN KONEKSI ---
// Memanggil file koneksi database
require_once '../php/db_connect.php';
// Memanggil file functions yang berisi helper functions
require_once '../php/functions.php';

// Security check: memastikan user yang login adalah admin
// Jika bukan admin, akan redirect ke halaman login
check_admin();

// --- BAGIAN 2: MEMPROSES FORM (POST REQUEST) ---
// Logika ini hanya berjalan jika ada form yang disubmit.
// Setelah selesai, ia akan selalu me-redirect untuk mencegah double submission.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // A. Proses Tambah User Baru
    if (isset($_POST['add_user'])) {
        // Mengambil data dari form
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        try {
            // Prepared statement untuk insert user baru
            // Password di-hash menggunakan SHA2 dengan salt 256 bit
            $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, SHA2(?, 256), ?)");
            $stmt->bind_param("sss", $username, $password, $role);
            $stmt->execute();
            // Redirect dengan status success
            header('Location: manage_users.php?status=add_success');
        } catch (mysqli_sql_exception $e) {
            // Handle error duplicate username (error code 1062)
            if ($e->getCode() == 1062) {
                header('Location: manage_users.php?status=add_duplicate&username=' . urlencode($username));
            } else {
                header('Location: manage_users.php?status=add_error');
            }
        } finally {
            // Tutup prepared statement jika ada
            if (isset($stmt)) $stmt->close();
        }
        exit(); // Penting: selalu exit setelah redirect
    }

    // B. Proses Edit User Existing
    if (isset($_POST['edit_user'])) {
        // Mengambil data dari form edit
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        try {
            if (!empty($password)) {
                // Update username dan password jika password diisi
                $stmt = $conn->prepare("UPDATE users SET username = ?, password = SHA2(?, 256) WHERE id = ?");
                $stmt->bind_param("ssi", $username, $password, $user_id);
            } else {
                // Update hanya username jika password kosong
                $stmt = $conn->prepare("UPDATE users SET username = ? WHERE id = ?");
                $stmt->bind_param("si", $username, $user_id);
            }
            $stmt->execute();
            header('Location: manage_users.php?status=edit_success');
        } catch (mysqli_sql_exception $e) {
            // Handle error duplicate username
            if ($e->getCode() == 1062) {
                header('Location: manage_users.php?status=edit_duplicate&username=' . urlencode($username));
            } else {
                header('Location: manage_users.php?status=edit_error');
            }
        } finally {
            if (isset($stmt)) $stmt->close();
        }
        exit();
    }

    // C. Proses Hapus User
    if (isset($_POST['delete_user'])) {
        // Cek apakah user mencoba menghapus akun sendiri (tidak diizinkan)
        if ($_POST['user_id'] == $_SESSION['user_id']) {
            header('Location: manage_users.php?status=delete_self_error');
        } else {
            // Hapus user dengan prepared statement
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
// Menyiapkan pesan notifikasi berdasarkan status dari URL parameter
$message = '';
$message_type = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'add_success':
            $message = 'Pengguna baru berhasil ditambahkan!'; $message_type = 'success'; break;
        case 'add_duplicate':
            // Mengambil username dari URL parameter untuk pesan error yang spesifik
            $username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';
            $message = "Gagal: Username '$username' sudah digunakan."; $message_type = 'error'; break;
        case 'edit_success':
            $message = 'Data pengguna berhasil diperbarui!'; $message_type = 'success'; break;
        case 'edit_duplicate':
            $username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';
            $message = "Gagal: Username '$username' sudah digunakan."; $message_type = 'error'; break;
        case 'edit_error':
            $message = 'Gagal memperbarui data pengguna.'; $message_type = 'error'; break;
        case 'delete_success':
            $message = 'Pengguna berhasil dihapus.'; $message_type = 'success'; break;
        case 'delete_self_error':
            $message = 'Error: Anda tidak dapat menghapus akun Anda sendiri.'; $message_type = 'error'; break;
        default:
            $message = 'Terjadi kesalahan.'; $message_type = 'error'; break;
    }
}

// Mengambil data pengguna dari database untuk ditampilkan di tabel
// Diurutkan berdasarkan ID secara ascending
$users_result = $conn->query("SELECT id, username, role FROM users ORDER BY id ASC");

// --- BAGIAN 4: SET VARIABEL UNTUK HEADER DAN INCLUDE ---
// Variabel yang dibutuhkan oleh header template
$page_title = 'Kelola Pengguna';
$current_page = 'users';
require_once 'templates/header.php';
?>

<!-- Header halaman dengan icon dan judul -->
<div class="admin-header">
    <i class="fas fa-users text-blue-600"></i>
    <h2>Kelola Pengguna</h2>
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

<!-- Form untuk menambah pengguna baru -->
<div class="admin-container mb-8">
    <h3 class="font-bold text-xl mb-6 flex items-center gap-2">
        <i class="fas fa-user-plus text-green-600"></i>
        Tambah Pengguna Baru
    </h3>
    <!-- Form dengan layout grid responsif -->
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
            <!-- Dropdown untuk memilih role user -->
            <select name="role" class="admin-input">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div>
            <!-- Tombol submit untuk tambah user -->
            <button type="submit" name="add_user" class="admin-button admin-button-success w-full">
                <i class="fas fa-plus mr-2"></i>Tambah Pengguna
            </button>
        </div>
    </form>
</div>

<!-- Tabel daftar pengguna -->
<div class="admin-container">
    <h3 class="font-bold text-xl mb-6 flex items-center gap-2">
        <i class="fas fa-list text-gray-600"></i>
        Daftar Pengguna
    </h3>
    
    <div class="overflow-x-auto">
        <!-- Tabel dengan fitur sorting -->
        <table class="admin-table">
            <thead>
                <tr>
                    <!-- Header tabel dengan kemampuan sorting -->
                    <th class="sortable-header" data-type="string">
                        <i class="fas fa-user mr-2"></i>Username
                        <i class="fas fa-sort sort-arrow"></i>
                    </th>
                    <th class="sortable-header" data-type="string">
                        <i class="fas fa-shield-alt mr-2"></i>Role
                        <i class="fas fa-sort sort-arrow"></i>
                    </th>
                    <th class="text-center">
                        <i class="fas fa-cogs mr-2"></i>Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php while($user = $users_result->fetch_assoc()): ?>
                <tr>
                    <td class="font-semibold">
                        <!-- Menampilkan username dengan escape HTML untuk keamanan -->
                        <?php echo escape_html($user['username']); ?>
                    </td>
                    <td>
                        <!-- Badge role dengan warna berbeda untuk admin dan user -->
                        <span class="status-badge <?php echo $user['role'] === 'admin' ? 'status-badge-info' : 'status-badge-secondary'; ?>">
                            <?php echo escape_html(ucfirst($user['role'])); ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <div class="flex gap-2 justify-center items-center">
                            <!-- Tombol Edit -->
                            <button onclick="openEditModal(<?php echo $user['id']; ?>, '<?php echo escape_html($user['username']); ?>')" 
                                    class="admin-button admin-button-primary text-sm">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </button>
                            
                            <!-- Tombol Delete atau Label Akun Sendiri -->
                            <?php if ($user['id'] != $_SESSION['user_id']): ?>
                                <!-- Tombol hapus hanya ditampilkan jika bukan akun sendiri -->
                                <button onclick="openDeleteModal(<?php echo $user['id']; ?>, '<?php echo escape_html($user['username']); ?>')" 
                                        class="admin-button admin-button-danger text-sm">
                                    <i class="fas fa-trash mr-1"></i>Hapus
                                </button>
                            <?php else: ?>
                                <!-- Label khusus untuk akun admin yang sedang login -->
                                <span class="text-gray-400 text-sm italic px-3 py-1">
                                    <i class="fas fa-user-circle mr-1"></i>Akun Anda
                                </span>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Footer tabel dengan informasi total pengguna -->
    <div class="mt-4 text-sm text-gray-600 flex items-center gap-2">
        <i class="fas fa-info-circle"></i>
        <span>Total <?php echo $users_result->num_rows; ?> pengguna terdaftar</span>
    </div>
</div>

<!-- Modal untuk Edit User -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
        <div class="p-6">
            <!-- Header modal -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-900">Edit Pengguna</h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <!-- Form edit user -->
            <form method="POST" action="manage_users.php" id="editForm">
                <!-- Hidden input untuk menyimpan user ID -->
                <input type="hidden" name="user_id" id="editUserId">
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                    <input type="text" name="username" id="editUsername" class="admin-input" required>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Password Baru</label>
                    <input type="password" name="password" id="editPassword" class="admin-input" 
                           placeholder="Kosongkan jika tidak ingin mengubah password">
                    <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password</p>
                </div>
                <!-- Tombol aksi modal -->
                <div class="flex gap-2 justify-end">
                    <button type="button" onclick="closeEditModal()" class="admin-button admin-button-secondary">
                        Batal
                    </button>
                    <button type="submit" name="edit_user" class="admin-button admin-button-primary">
                        <i class="fas fa-save mr-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
        <div class="p-6">
            <!-- Header modal dengan icon peringatan -->
            <div class="flex items-center gap-3 mb-4">
                <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Konfirmasi Hapus</h3>
                    <p class="text-sm text-gray-600">Tindakan ini tidak dapat dibatalkan</p>
                </div>
            </div>
            
            <!-- Konten peringatan -->
            <div class="mb-6">
                <p class="text-gray-700">
                    Apakah Anda yakin ingin menghapus pengguna <strong id="deleteUsername" class="text-red-600"></strong>?
                </p>
                <!-- Box peringatan tambahan -->
                <div class="mt-3 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <div class="flex items-start gap-2">
                        <i class="fas fa-info-circle text-yellow-600 mt-0.5"></i>
                        <div class="text-sm text-yellow-800">
                            <p class="font-semibold">Peringatan:</p>
                            <p>Data pengguna akan dihapus secara permanen dan tidak dapat dipulihkan.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Tombol aksi -->
            <div class="flex gap-3 justify-end">
                <button type="button" onclick="closeDeleteModal()" 
                        class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200 font-medium">
                    <i class="fas fa-times mr-2"></i>Batal
                </button>
                <!-- Form hapus user -->
                <form method="POST" action="manage_users.php" id="deleteForm" class="inline-block">
                    <input type="hidden" name="user_id" id="deleteUserId">
                    <button type="submit" name="delete_user" 
                            class="px-4 py-2 text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors duration-200 font-medium">
                        <i class="fas fa-trash mr-2"></i>Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Fungsi untuk membuka modal edit dengan data user
function openEditModal(userId, username) {
    document.getElementById('editUserId').value = userId;
    document.getElementById('editUsername').value = username;
    document.getElementById('editPassword').value = '';
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editModal').classList.add('flex');
}

// Fungsi untuk menutup modal edit
function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
    document.getElementById('editModal').classList.remove('flex');
}

// Menutup modal edit ketika klik di luar modal
document.getElementById('editModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeEditModal();
    }
});

// Fungsi untuk membuka modal konfirmasi hapus
function openDeleteModal(userId, username) {
    document.getElementById('deleteUserId').value = userId;
    document.getElementById('deleteUsername').textContent = username;
    document.getElementById('deleteModal').classList.remove('hidden');
    document.getElementById('deleteModal').classList.add('flex');
}

// Fungsi untuk menutup modal konfirmasi hapus
function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    document.getElementById('deleteModal').classList.remove('flex');
}

// Menutup modal hapus ketika klik di luar modal
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});

// Menutup semua modal dengan tombol Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeEditModal();
        closeDeleteModal();
    }
});
</script>

<?php require_once 'templates/footer.php'; ?>