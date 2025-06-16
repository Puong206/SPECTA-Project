<?php
// Menentukan judul halaman untuk ditampilkan di tag <title> pada header
$page_title = 'Login';

// Memanggil file header, yang juga akan memulai sesi
require 'templates/header.php';
?>

<!-- Decorative elements -->
<div class="fixed w-full h-full top-0 left-0 pointer-events-none z-0">
  <div class="absolute top-20 left-[10%] w-40 h-40 bg-primary/10 rounded-full filter blur-3xl"></div>
  <div class="absolute bottom-20 right-[5%] w-60 h-60 bg-secondary/10 rounded-full filter blur-3xl"></div>
  <div class="absolute top-[40%] right-[30%] w-32 h-32 bg-accent/10 rounded-full filter blur-3xl"></div>
</div>

<!-- Login Section -->
<section class="min-h-screen flex items-center justify-center py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 relative overflow-hidden">
  <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-white/10 to-secondary/5 pointer-events-none"></div>
  
  <div class="max-w-md w-full relative z-10">
    <!-- Header -->
    <div class="text-center mb-8" data-aos="fade-up">
      <div class="mb-6 flex justify-center">
        <img
          src="assets/images/Logo.png"
          alt="IT SPECTA Logo"
          class="h-16 sm:h-20 object-contain transition-all duration-500 hover:scale-105"
        />
      </div>
      <h1 class="text-transparent bg-gradient-to-r from-primary via-primary/80 to-primary bg-clip-text text-2xl sm:text-3xl font-extrabold mb-2 tracking-tight">
        Welcome Back
      </h1>
      <p class="text-gray-600 text-sm sm:text-base">
        Login to access IT SPECTA
      </p>
    </div>

    <!-- Login Form Card -->
    <div class="relative group" data-aos="fade-up" data-aos-delay="200">
      <!-- Gradient background effect -->
      <div class="absolute -inset-1 bg-gradient-to-r from-primary to-secondary rounded-2xl blur opacity-30 group-hover:opacity-70 transition duration-1000 group-hover:duration-300"></div>
      
      <div class="relative bg-white ring-1 ring-gray-200 rounded-2xl p-6 sm:p-8 shadow-xl">
        <!-- Decorative elements -->
        <div class="absolute -top-8 -right-8 w-16 h-16 rounded-full bg-secondary/10 flex items-center justify-center">
          <div class="w-10 h-10 rounded-full bg-secondary/20 flex items-center justify-center animate-pulse-slow">
            <div class="w-5 h-5 rounded-full bg-secondary/30"></div>
          </div>
        </div>

        <!-- Error message -->
        <?php if (isset($_GET['error'])): ?>
          <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
            <p class="text-red-600 text-sm text-center"><?php echo htmlspecialchars($_GET['error']); ?></p>
          </div>
        <?php endif; ?>

        <!-- Login form -->
        <form action="php/login_process.php" method="POST" class="space-y-6">
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

          <input type="hidden" name="redirect" value="<?php echo isset($_GET['redirect']) ? htmlspecialchars($_GET['redirect']) : ''; ?>">

          <button 
            type="submit" 
            class="w-full px-6 py-3 bg-gradient-to-r from-primary to-primary/90 text-white font-semibold rounded-xl shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary group"
          >
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
        <div class="mt-6 space-y-4">
          <!-- Register link -->
          <div class="text-center">
            <p class="text-sm text-gray-600 mb-3">
              Don't have an account?
            </p>
            <a 
              href="register.php" 
              class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-secondary to-secondary/90 text-white font-semibold rounded-xl shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-1 group"
            >
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
          <div class="text-center pt-2 border-t border-gray-200">
            <a 
              href="index.php" 
              class="inline-flex items-center text-sm text-gray-600 hover:text-primary transition-all duration-300 group"
            >
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
    <div class="mt-8 text-center" data-aos="fade-up" data-aos-delay="400">
      <div class="flex items-center justify-center gap-2 bg-primary/5 hover:bg-primary/10 px-4 py-2 rounded-full transition-all duration-300 cursor-pointer group inline-flex">
        <div class="w-8 h-8 rounded-full overflow-hidden">
          <img
            src="assets/images/Logo.png"
            alt="IT SPECTA Logo"
            class="w-full h-full object-cover"
          />
        </div>
        <div>
          <p class="text-primary font-semibold text-sm">IT SPECTA 2025</p>
          <p class="text-gray-600 text-xs">Teknologi Informasi UMY</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Scripts -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="assets/js/script.js"></script>
<script>
  // Initialize AOS
  AOS.init({
    duration: 1000,
    once: true,
    offset: 100
  });
</script>

<?php
// Memanggil file footer
require 'templates/footer.php';
?>