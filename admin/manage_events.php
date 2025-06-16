<?php
require_once '../php/db_connect.php';
require_once '../php/functions.php';

check_admin();

$message = '';
$message_type = '';

// Handle POST requests untuk Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
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
}

// Mengambil semua data acara untuk ditampilkan
$events = $conn->query("SELECT * FROM events ORDER BY date ASC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Acara</title>
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
                <a href="manage_events.php" class="flex items-center gap-3 py-2.5 px-4 rounded bg-gray-700 font-semibold"><i class="fas fa-calendar-alt"></i>Kelola Acara</a>
                <a href="manage_users.php" class="flex items-center gap-3 py-2.5 px-4 rounded hover:bg-gray-700"><i class="fas fa-users"></i>Kelola Pengguna</a>
            </nav>
        </div>
        <a href="../php/logout.php" class="flex items-center gap-3 py-2.5 px-4 rounded hover:bg-red-600 bg-red-500 mt-4"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>

    <div class="flex-1 p-10">
        <h2 class="text-3xl font-bold mb-6">Kelola Acara</h2>
        
        <?php if($message): ?>
            <div class="<?php echo $message_type === 'success' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800'; ?> p-3 rounded-lg mb-4">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="font-bold text-xl mb-4">Daftar Acara</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-3 text-left">Nama</th>
                            <th class="p-3 text-left">Deskripsi</th>
                            <th class="p-3 text-left">Tanggal</th>
                            <th class="p-3 text-left">Harga (Rp)</th>
                            <th class="p-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($event = $events->fetch_assoc()): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <form method="POST" action="">
                                <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
                                <td class="p-2"><input type="text" name="name" class="w-full p-2 border rounded" value="<?php echo escape_html($event['name']); ?>"></td>
                                <td class="p-2"><textarea name="description" class="w-full p-2 border rounded h-24"><?php echo escape_html($event['description']); ?></textarea></td>
                                <td class="p-2"><input type="date" name="date" class="w-full p-2 border rounded" value="<?php echo escape_html($event['date']); ?>"></td>
                                <td class="p-2"><input type="number" name="price" class="w-32 p-2 border rounded" step="1000" value="<?php echo escape_html($event['price']); ?>"></td>
                                <td class="p-2">
                                    <button type="submit" name="update" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 font-semibold">Update</button>
                                </td>
                            </form>
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