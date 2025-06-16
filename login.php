<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - IT SPECTA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-gray-900">Login ke IT SPECTA</h1>
        
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="text-red-500 text-center">'.htmlspecialchars($_GET['error']).'</p>';
        }
        ?>

        <form action="login_process.php" method="POST">
            <div>
                <label for="username" class="text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" required
                       class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
            </div>
            <div class="mt-4">
                <label for="password" class="text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full px-3 py-2 mt-1 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-primary focus:border-primary">
            </div>
            <input type="hidden" name="redirect" value="<?php echo isset($_GET['redirect']) ? htmlspecialchars($_GET['redirect']) : ''; ?>">
            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Login
                </button>
            </div>
        </form>
    </div>
</body>
</html>