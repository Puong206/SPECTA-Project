<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="IT SPECTA - Event Tahunan Program Studi Teknologi Informasi UMY"/>
    
    <title><?php echo isset($page_title) ? $page_title . ' - IT SPECTA UMY' : 'IT SPECTA - Prodi Teknologi Informasi UMY'; ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="icon" href="assets/images/logo.png" type="image/png" />
    </head>
<body class="font-['Poppins'] bg-gray-50">
    <nav class="bg-primary/90 backdrop-blur-sm shadow-lg fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex-shrink-0">
                    <a href="index.php">
                        <img class="h-14 w-auto" src="assets/images/Logo.png" alt="IT SPECTA Logo"/>
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="index.php" class="text-gray-300 hover:bg-secondary hover:text-white px-3 py-2 rounded-md font-medium">Home</a>
                        <a href="seminar-nasional.php" class="text-gray-300 hover:bg-secondary hover:text-white px-3 py-2 rounded-md font-medium">Seminar</a>
                        <a href="fun-run.php" class="text-gray-300 hover:bg-secondary hover:text-white px-3 py-2 rounded-md font-medium">Fun Run</a>
                        <a href="about.php" class="text-gray-300 hover:bg-secondary hover:text-white px-3 py-2 rounded-md font-medium">About</a>
                        <a href="contact.php" class="text-gray-300 hover:bg-secondary hover:text-white px-3 py-2 rounded-md font-medium">Contact</a>
                    </div>
                </div>
                <div class="hidden md:block">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <div class="flex items-center gap-4">
                            <?php if ($_SESSION['role'] === 'admin'): ?>
                                <a href="admin/dashboard.php" class="bg-green-500 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-600">Admin</a>
                            <?php endif; ?>
                            <a href="php/logout.php" class="bg-red-500 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-red-600">Logout</a>
                        </div>
                    <?php else: ?>
                        <a href="login.php" class="bg-secondary text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-orange-600">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <main class="pt-20"> ```

#### `/templates/footer.php`
```php
    </main>
    <footer class="bg-dark text-white py-12 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <img class="w-20 mx-auto mb-4" src="assets/images/Logo.png" alt="IT SPECTA Logo" />
            <h2 class="text-3xl font-bold">IT SPECTA</h2>
            <p class="text-gray-400">Teknologi Informasi UMY</p>
            <div class="flex justify-center gap-6 my-6">
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-whatsapp fa-2x"></i></a>
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram fa-2x"></i></a>
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-youtube fa-2x"></i></a>
            </div>
            <p class="text-gray-500 text-sm">© <?php echo date('Y'); ?> IT SPECTA. All rights reserved.</p>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 800 });
    </script>
</body>
</html>