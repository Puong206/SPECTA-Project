<?php
// Menentukan judul halaman
$page_title = 'Register';
// Memanggil header
require 'templates/header.php';
?>

<section class="min-h-screen flex items-center justify-center py-12 px-4 relative">
  <div class="max-w-md w-full z-10">
    <div class="text-center mb-8" data-aos="fade-up">
      <a href="index.php"><img src="assets/images/Logo.png" alt="IT SPECTA Logo" class="h-20 mx-auto mb-4"/></a>
      <h1 class="text-3xl font-extrabold text-primary">Join IT SPECTA</h1>
      <p class="text-gray-600">Buat akun untuk mendaftar di acara kami.</p>
    </div>

    <div class="relative" data-aos="fade-up" data-aos-delay="200">
      <div class="relative bg-white rounded-2xl p-8 shadow-xl">
        
        <?php if (isset($_GET['success'])): ?>
          <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg text-center"><?php echo htmlspecialchars($_GET['success']); ?></div>
        <?php endif; ?>
        <?php if (isset($_GET['error'])): ?>
          <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg text-center"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>

        <form action="php/register_process.php" method="POST" class="space-y-6">
          <div>
            <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
            <input type="text" name="username" id="username" required class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-secondary" placeholder="e.g., johndoe">
          </div>
          <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
            <input type="password" name="password" id="password" required class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-secondary" placeholder="Minimal 6 karakter">
          </div>
          <div>
            <label for="confirm_password" class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" required class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-secondary" placeholder="Ulangi password">
          </div>
          
          <button type="submit" class="w-full px-6 py-3 bg-secondary text-white font-semibold rounded-xl shadow-md hover:bg-secondary/90 transition-all">
            Create Account
          </button>
        </form>

        <div class="mt-6 text-center">
          <p class="text-sm text-gray-600">
            Sudah punya akun? <a href="login.php" class="font-semibold text-primary hover:underline">Login di sini</a>.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');

        form.addEventListener('submit', function(e) {
            if (password.value !== confirmPassword.value) {
                e.preventDefault(); // Mencegah form dikirim
                alert('Konfirmasi password tidak cocok!');
            }
        });
    });
</script>

<?php
// Memanggil file footer
require 'templates/footer.php';
?>