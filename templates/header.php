<?php
    // Memulai session di setiap halaman.
    // Jika db_connect.php sudah ada session_start(), baris ini bisa dihapus.
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta tags untuk charset, viewport, dan SEO -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="IT SPECTA - Event Tahunan Program Studi Teknologi Informasi UMY"/>
    
    <title>IT SPECTA - Prodi Teknologi Informasi UMY</title>

    <!-- CDN Tailwind CSS untuk styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      // Konfigurasi kustom Tailwind CSS
      tailwind.config = {
        theme: {
          extend: {
            // Palet warna kustom untuk tema website
            colors: {
              primary: "#093880",    // Biru tua untuk warna utama
              secondary: "#eb8317",  // Orange untuk warna sekunder
              accent: "#41c7c7",     // Cyan untuk aksen
              dark: "#0a1f33",       // Warna gelap
            },
            // Animasi kustom untuk efek visual
            animation: {
              fadeInDown: "fadeInDown 1.2s ease-out",
              fadeInUp: "fadeInUp 1.2s ease-out",
              fadeIn: "fadeIn 1s forwards",
              "pulse-slow": "pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite",
              float: "float 3s ease-in-out infinite",
              shimmer: "shimmer 2s linear infinite",
              "spin-slow": "spin 6s linear infinite",
            },
            // Definisi keyframes untuk animasi
            keyframes: {
              // Animasi fade in dari atas
              fadeInDown: {
                from: { opacity: "0", transform: "translateY(-30px)" },
                to: { opacity: "1", transform: "translateY(0)" },
              },
              // Animasi fade in dari bawah
              fadeInUp: {
                from: { opacity: "0", transform: "translateY(30px)" },
                to: { opacity: "1", transform: "translateY(0)" },
              },
              // Animasi fade in sederhana
              fadeIn: {
                to: { opacity: "1", transform: "translateY(0)" },
              },
              // Animasi mengambang
              float: {
                "0%, 100%": { transform: "translateY(0)" },
                "50%": { transform: "translateY(-10px)" },
              },
              // Animasi shimmer/berkilau
              shimmer: {
                "0%": { backgroundPosition: "-200% 0" },
                "100%": { backgroundPosition: "200% 0" },
              },
            },
            // Background image kustom
            backgroundImage: {
              "gradient-radial": "radial-gradient(var(--tw-gradient-stops))",
              // Efek noise/tekstur untuk background
              noise:
                "url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMDAiIGhlaWdodD0iMzAwIj4NCiAgPGZpbHRlciBpZD0ibm9pc2UiIHg9IjAiIHk9IjAiPg0KICAgIDxmZVR1cmJ1bGVuY2UgYmFzZUZyZXF1ZW5jeT0iLjc1IiBzdGl0Y2hUaWxlcz0ic3RpdGNoIiB0eXBlPSJmcmFjdGFsTm9pc2UiLz4NCiAgICA8ZmVDb2xvck1hdHJpeCB0eXBlPSJzYXR1cmF0ZSIgdmFsdWVzPSIwIi8+DQogIDwvZmlsdGVyPg0KICA8cmVjdCB3aWR0aD0iMzAwIiBoZWlnaHQ9IjMwMCIgZmlsdGVyPSJ1cmwoI25vaXNlKSIgb3BhY2l0eT0iMC4wOCIvPg0KPC9zdmc+Lg==')",
            },
          },
        },
      };
    </script>

    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <!-- Google Fonts untuk tipografi -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <!-- CSS kustom tambahan -->
    <link rel="stylesheet" href="assets/css/style.css" />

    <!-- Favicon website -->
    <link rel="icon" href="assets/images/logo.png" type="image/png" />

    <!-- Preload gambar logo untuk performa -->
    <link rel="preload" href="assets/images/Logo.png" as="image" />
    <style>
      /* Efek kaca/glass untuk navbar */
      .glass-effect {
          backdrop-filter: blur(10px);
          background: rgba(9, 56, 128, 0.85);
      }
      
      /* Kelas untuk efek bayangan teks */
      .text-shadow-sm {
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      .text-shadow-md {
        text-shadow: 0 4px 8px rgba(0, 0, 0, 0.12);
      }

      .text-shadow-lg {
        text-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
      }

      /* Efek outline untuk teks */
      .text-outline {
        -webkit-text-stroke: 1px rgba(255, 255, 255, 0.3);
      }

      /* Efek gradient untuk teks */
      .gradient-text {
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
      }

      /* Efek hover untuk kartu */
      .card-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      }

      .card-hover:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      }
    </style>
  </head>
  <body class="font-['Poppins'] text-gray-800 bg-gradient-to-br from-gray-50 to-gray-100 bg-noise overflow-x-hidden">
    <div class="min-h-screen relative overflow-hidden">
      <div class="h-full overflow-x-hidden relative z-10">
        <!-- Navbar dengan efek kaca dan posisi fixed -->
        <nav class="h-20 glass-effect flex justify-between items-center px-4 sm:px-8 md:px-12 fixed w-full top-0 z-50 shadow-lg">
          <!-- Logo IT SPECTA -->
          <a href="index.php">
              <img class="w-12 h-14 transition-transform duration-300 hover:scale-110" src="assets/images/Logo.png" alt="IT SPECTA Logo"/>
          </a>
          
          <!-- Menu navigasi untuk desktop -->
          <ul class="hidden md:flex items-center gap-4">
              <li><a href="index.php" class="text-white/90 font-semibold hover:text-white hover:bg-secondary/80 px-4 py-2 rounded-full transition-all">Home</a></li>
              <li><a href="seminar-nasional.php" class="text-white/90 font-semibold hover:text-white hover:bg-secondary/80 px-4 py-2 rounded-full transition-all">Seminar</a></li>
              <li><a href="fun-run.php" class="text-white/90 font-semibold hover:text-white hover:bg-secondary/80 px-4 py-2 rounded-full transition-all">Fun Run</a></li>
              <li><a href="about.php" class="text-white/90 font-semibold hover:text-white hover:bg-secondary/80 px-4 py-2 rounded-full transition-all">About</a></li>
              <li><a href="contact.php" class="text-white/90 font-semibold hover:text-white hover:bg-secondary/80 px-4 py-2 rounded-full transition-all">Contact</a></li>
          </ul>

          <!-- Tombol login/logout dan admin dashboard -->
          <div class="hidden md:flex items-center">
              <?php if (isset($_SESSION['user_id'])): ?>
                  <!-- Jika user adalah admin, tampilkan tombol dashboard -->
                  <?php if ($_SESSION['role'] === 'admin'): ?>
                      <a href="admin/dashboard.php" class="bg-green-500 text-white px-5 py-2 rounded-full font-semibold hover:bg-green-600 transition-all">Admin Dashboard</a>
                  <?php endif; ?>
                  <!-- Tombol logout untuk user yang sudah login -->
                  <a href="php/logout.php" class="ml-4 bg-red-500 text-white px-5 py-2 rounded-full font-semibold hover:bg-red-600 transition-all">Logout</a>
              <?php else: ?>
                  <!-- Tombol login untuk user yang belum login -->
                  <a href="login.php" class="bg-secondary text-white px-5 py-2 rounded-full font-semibold hover:bg-orange-600 transition-all">Login</a>
              <?php endif; ?>
          </div>
          
          <!-- Tombol hamburger untuk mobile -->
          <button class="md:hidden text-white text-2xl" onclick="toggleMobileMenu()">
              <i class="fas fa-bars"></i>
          </button>
        </nav>
        
        <!-- Menu mobile yang tersembunyi secara default -->
        <div id="mobile-menu" class="hidden md:hidden fixed top-20 left-0 w-full bg-primary/95 z-40 p-4">
             <ul class="flex flex-col items-center gap-4">
              <!-- Menu navigasi untuk mobile -->
              <li><a href="index.php" class="text-white font-semibold">Home</a></li>
              <li><a href="seminar-nasional.php" class="text-white font-semibold">Seminar</a></li>
              <li><a href="fun-run.php" class="text-white font-semibold">Fun Run</a></li>
              <li><a href="about.php" class="text-white font-semibold">About</a></li>
              <li><a href="contact.php" class="text-white font-semibold">Contact</a></li>
              <!-- Tombol login/logout untuk mobile -->
              <li class="mt-4 w-full">
                  <?php if (isset($_SESSION['user_id'])): ?>
                      <a href="php/logout.php" class="block text-center w-full bg-red-500 text-white px-5 py-2 rounded-full font-semibold">Logout</a>
                      <?php if ($_SESSION['role'] === 'admin'): ?>
                          <a href="admin/dashboard.php" class="block text-center mt-2 w-full bg-green-500 text-white px-5 py-2 rounded-full font-semibold">Admin</a>
                      <?php endif; ?>
                  <?php else: ?>
                      <a href="login.php" class="block text-center w-full bg-secondary text-white px-5 py-2 rounded-full font-semibold">Login</a>
                  <?php endif; ?>
              </li>
            </ul>
        </div>
