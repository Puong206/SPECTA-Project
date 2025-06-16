<?php
// File: admin_dashboard.php
require 'db_connect.php';

// Proteksi halaman admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php?error=Anda harus login sebagai admin");
    exit();
}

// Logika untuk menangani CRUD
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Proses Update
    if (isset($_POST['update_event'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $price = $_POST['price'];

        $stmt = $conn->prepare("UPDATE events SET name = ?, description = ?, date = ?, price = ? WHERE id = ?");
        $stmt->bind_param("sssdi", $name, $description, $date, $price, $id);
        if ($stmt->execute()) {
            $message = "Acara berhasil diperbarui!";
        } else {
            $message = "Gagal memperbarui acara: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Mengambil data acara untuk ditampilkan
$events_result = $conn->query("SELECT * FROM events");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - IT SPECTA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Admin Dashboard</h1>
            <a href="logout.php" class="px-4 py-2 font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700">Logout</a>
        </div>

        <?php if ($message): ?>
            <div class="mb-4 p-3 text-white <?php echo strpos($message, 'Gagal') !== false ? 'bg-red-500' : 'bg-green-500'; ?> rounded-lg">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <h2 class="text-2xl font-semibold mb-4">Kelola Acara</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4">Nama Acara</th>
                        <th class="py-2 px-4">Deskripsi</th>
                        <th class="py-2 px-4">Tanggal</th>
                        <th class="py-2 px-4">Harga</th>
                        <th class="py-2 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($event = $events_result->fetch_assoc()): ?>
                    <tr class="border-b">
                        <form action="admin_dashboard.php" method="POST">
                            <td class="py-2 px-4"><input type="text" name="name" value="<?php echo htmlspecialchars($event['name']); ?>" class="w-full p-1 border rounded"></td>
                            <td class="py-2 px-4"><textarea name="description" class="w-full p-1 border rounded"><?php echo htmlspecialchars($event['description']); ?></textarea></td>
                            <td class="py-2 px-4"><input type="date" name="date" value="<?php echo htmlspecialchars($event['date']); ?>" class="w-full p-1 border rounded"></td>
                            <td class="py-2 px-4"><input type="number" step="0.01" name="price" value="<?php echo htmlspecialchars($event['price']); ?>" class="w-full p-1 border rounded"></td>
                            <td class="py-2 px-4 text-center">
                                <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
                                <button type="submit" name="update_event" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
                            </td>
                        </form>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>
