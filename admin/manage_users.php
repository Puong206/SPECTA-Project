<?php
require_once '../php/db_connect.php';
require_once '../php/functions.php';

check_admin();

$message = '';
$message_type = '';

// Handle POST requests for Create dan Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CREATE User
    if (isset($_POST['add_user'])) {
        $username = $_POST['username'];
        $password = $_POST['password']; // Password akan di-hash oleh MySQL
        $role = $_POST['role'];

        if (!empty($username) && !empty($password)) {
            $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, SHA2(?, 256), ?)");
            $stmt->bind_param("sss", $username, $password, $role);
            if ($stmt->execute()) {
                $message = "Pengguna baru berhasil ditambahkan!";
                $message_type = 'success';
            } else {
                $message = "Gagal menambahkan pengguna. Username mungkin sudah ada.";
                $message_type = 'error';
            }
            $stmt->close();
        } else {
            $message = "Username dan password tidak boleh kosong.";
            $message_type = 'error';
        }
    }

    // DELETE User
    if (isset($_POST['delete_user'])) {
        $user_id = $_POST['user_id'];
        // Keamanan: Admin tidak bisa menghapus akunnya sendiri
        if ($user_id == $_SESSION['user_id']) {
            $message = "Anda tidak dapat menghapus akun Anda sendiri.";
            $message_type = 'error';
        } else {
            $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
            $stmt->bind_param("i", $user_id);
            if ($stmt->execute()) {
                $message = "Pengguna berhasil dihapus.";
                $message_type = 'success';
            } else {
                $message = "Gagal menghapus pengguna.";
                $message_type = 'error';
            }
            $stmt->close();
        }
    }
}

// READ all users for display
$users = $conn->query("SELECT id, username, role, created_at FROM users ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex">
    <div class="w-64 bg-gray-800 text-white p-4 flex flex-col justify-between">
        <div>
            <h1 class="text-2xl font-bold mb-6 text-center">IT SPECTA</h1>
            <nav>
                <a href="dashboard.php" class="flex items-center gap-3 py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                <a href="manage_events.php" class="flex items-center gap-3 py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-calendar-alt"></i>Kelola Acara</a>
                <a href="manage_users.php" class="flex items-center gap-3 py-2.5 px-4 rounded bg-gray-700 font-semibold"><i class="fas fa-users"></i>Kelola Pengguna</a>
            </nav>
        </div>
        <a href="../php/logout.php" class="flex items-center gap-3 py-2.5 px-4 rounded hover:bg-red-600 bg-red-500 mt-4"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>

    <div class="flex-1 p-10">
        <h2 class="text-3xl font-bold mb-6">Kelola Pengguna</h2>

        <?php if($message): ?>
            <div class="<?php echo $message_type === 'success' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800'; ?> p-3 rounded-lg mb-4">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h3 class="font-bold text-xl mb-4">Tambah Pengguna Baru</h3>
            <form method="POST" action="" class="grid md:grid-cols-3 gap-4 items-end">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" id="username" class="mt-1 w-full p-2 border rounded" required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" class="mt-1 w-full p-2 border rounded" required>
                </div>
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role" id="role" class="mt-1 w-full p-2 border rounded">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="md:col-span-3">
                     <button type="submit" name="add_user" class="w-full md:w-auto bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 font-semibold">Tambah Pengguna</button>
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
                            <th class="p-3 text-left">Tanggal Daftar</th>
                            <th class="p-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($user = $users->fetch_assoc()): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3"><?php echo $user['id']; ?></td>
                            <td class="p-3 font-medium"><?php echo escape_html($user['username']); ?></td>
                            <td class="p-3">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full <?php echo $user['role'] === 'admin' ? 'bg-blue-200 text-blue-800' : 'bg-gray-200 text-gray-800'; ?>">
                                    <?php echo escape_html($user['role']); ?>
                                </span>
                            </td>
                            <td class="p-3"><?php echo date('d M Y, H:i', strtotime($user['created_at'])); ?></td>
                            <td class="p-3">
                                <?php if ($user['id'] != $_SESSION['user_id']): // Tombol hapus tidak muncul untuk diri sendiri ?>
                                <form method="POST" action="" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
                                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                    <button type="submit" name="delete_user" class="text-red-600 hover:text-red-800 font-semibold">Hapus</button>
                                </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>