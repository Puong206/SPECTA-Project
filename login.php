<?php
// Menentukan judul halaman untuk ditampilkan di tag <title> pada header
$page_title = 'Login';

// Memanggil file header, yang juga akan memulai sesi PHP
require 'templates/header.php';
?>

<!-- Decorative elements -->
<!-- Elemen dekoratif dengan posisi fixed dan blur effect -->
<div class="fixed w-full h-full top-0 left-0 pointer-events-none z-0">
  <!-- Lingkaran blur di kiri atas -->
  <div class="absolute top-20 left-[10%] w-40 h-40 bg-primary/10 rounded-full filter blur-3xl"></div>
  <!-- Lingkaran blur di kanan bawah -->
  <div class="absolute bottom-20 right-[5%] w-60 h-60 bg-secondary/10 rounded-full filter blur-3xl"></div>
  <!-- Lingkaran blur di tengah kanan -->
  <div class="absolute top-[40%] right-[30%] w-32 h-32 bg-accent/10 rounded-full filter blur-3xl"></div>
</div>

<!-- Login Section -->
<!-- Section login dengan layout centered -->
<section class="min-h-screen flex items-center justify-center py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 relative overflow-hidden">
  <!-- Background gradient overlay -->
  <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-white/10 to-secondary/5 pointer-events-none"></div>
  
  <!-- Container form dengan max width -->
  <div class="max-w-md w-full relative z-10">
    <!-- Header -->
    <!-- Header section dengan logo dan judul -->
    <div class="text-center mb-8" data-aos="fade-up">
      <!-- Container logo -->
      <div class="mb-6 flex justify-center">
        <img
          src="assets/images/Logo.png"
          alt="IT SPECTA Logo"
          class="h-16 sm:h-20 object-contain transition-all duration-500 hover:scale-105"
        />
      </div>
      <!-- Judul dengan gradient text -->
      <h1 class="text-transparent bg-gradient-to-r from-primary via-primary/80 to-primary bg-clip-text text-2xl sm:text-3xl font-extrabold mb-2 tracking-tight">
        Welcome Back
      </h1>
      <!-- Subtitle -->
      <p class="text-gray-600 text-sm sm:text-base">
        Login to access IT SPECTA
      </p>
    </div>

    <!-- Login Form Card -->
    <!-- Card form login dengan gradient border effect -->
    <div class="relative group" data-aos="fade-up" data-aos-delay="200">
      <!-- Gradient background effect -->
      <!-- Background gradient dengan blur dan opacity -->
      <div class="absolute -inset-1 bg-gradient-to-r from-primary to-secondary rounded-2xl blur opacity-30 group-hover:opacity-70 transition duration-1000 group-hover:duration-300"></div>
      
      <!-- Card utama dengan background putih -->
      <div class="relative bg-white ring-1 ring-gray-200 rounded-2xl p-6 sm:p-8 shadow-xl">
        <!-- Decorative elements -->
        <!-- Elemen dekoratif di sudut kanan atas -->
        <div class="absolute -top-8 -right-8 w-16 h-16 rounded-full bg-secondary/10 flex items-center justify-center">
          <div class="w-10 h-10 rounded-full bg-secondary/20 flex items-center justify-center animate-pulse-slow">
            <div class="w-5 h-5 rounded-full bg-secondary/30"></div>
          </div>
        </div>

        <!-- Error message -->
        <!-- Menampilkan pesan error jika ada -->
        <?php if (isset($_GET['error'])): ?>
          <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
            <p class="text-red-600 text-sm text-center"><?php echo htmlspecialchars($_GET['error']); ?></p>
          </div>
        <?php endif; ?>

        <!-- Login form -->
        <!-- Form login dengan spacing -->
        <form action="php/login_process.php" method="POST" class="space-y-6">
          <!-- Field username -->
          <div>
            <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">
              Username
            </label>
            <input 
              type="text" 
              name="username" 
              id="username" 
              required
              class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300"
              placeholder="Enter your username"
            />
          </div>

          <!-- Field password -->
          <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
              Password
            </label>
            <input 
              type="password" 
              name="password" 
              id="password" 
              required
              class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300"
              placeholder="Enter your password"
            />
          </div>

          <!-- Hidden field untuk redirect -->
          <input type="hidden" name="redirect" value="<?php echo isset($_GET['redirect']) ? htmlspecialchars($_GET['redirect']) : ''; ?>">

          <!-- Tombol login dengan gradient dan hover effects -->
          <button 
            type="submit" 
            class="w-full px-6 py-3 bg-gradient-to-r from-primary to-primary/90 text-white font-semibold rounded-xl shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary group"
          >
            <!-- Konten tombol dengan icon -->
            <span class="flex items-center justify-center">
              Login
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 ml-2 transform transition-transform duration-300 group-hover:translate-x-1"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M14 5l7 7m0 0l-7 7m7-7H3"
                />
              </svg>
            </span>
          </button>
        </form>

        <!-- Additional links -->
        <!-- Link tambahan untuk register dan kembali -->
        <div class="mt-6 space-y-4">
          <!-- Register link -->
          <!-- Link ke halaman register -->
          <div class="text-center">
            <p class="text-sm text-gray-600 mb-3">
              Don't have an account?
            </p>
            <a 
              href="register.php" 
              class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-secondary to-secondary/90 text-white font-semibold rounded-xl shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-1 group"
            >
              <!-- Icon user -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 mr-2 transform transition-transform duration-300 group-hover:scale-110"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"
                />
              </svg>
              Create Account
            </a>
          </div>
          
          <!-- Back to home link -->
          <!-- Link kembali ke beranda -->
          <div class="text-center pt-2 border-t border-gray-200">
            <a 
              href="index.php" 
              class="inline-flex items-center text-sm text-gray-600 hover:text-primary transition-all duration-300 group"
            >
              <!-- Icon panah kiri -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-4 w-4 mr-1 transform transition-transform duration-300 group-hover:-translate-x-1"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M10 19l-7-7m0 0l7-7m-7 7h18"
                />
              </svg>
              Back to Home
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- IT SPECTA branding -->
    <!-- Branding IT SPECTA di bagian bawah -->
    <div class="mt-8 text-center" data-aos="fade-up" data-aos-delay="400">
      <div class="flex items-center justify-center gap-2 bg-primary/5 hover:bg-primary/10 px-4 py-2 rounded-full transition-all duration-300 cursor-pointer group inline-flex">
        <!-- Logo kecil -->
        <div class="w-8 h-8 rounded-full overflow-hidden">
          <img
            src="assets/images/Logo.png"
            alt="IT SPECTA Logo"
            class="w-full h-full object-cover"
          />
        </div>
        <!-- Info IT SPECTA -->
        <div>
          <p class="text-primary font-semibold text-sm">IT SPECTA 2025</p>
          <p class="text-gray-600 text-xs">Teknologi Informasi UMY</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Scripts -->
<!-- Load library AOS untuk animasi -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<!-- Load script kustom -->
<script src="assets/js/script.js"></script>
<script>
  // Initialize AOS dengan konfigurasi
  AOS.init({
    duration: 1000,   // Durasi animasi 1 detik
    once: true,       // Animasi hanya sekali
    offset: 100       // Offset untuk trigger animasi
  });
</script>

<?php
// Memanggil file footer untuk penutup struktur HTML
require 'templates/footer.php';
?>