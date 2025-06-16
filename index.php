<?php
// Menentukan judul halaman untuk ditampilkan di tag <title> pada header
$page_title = 'Home';

// Memanggil file header, yang juga akan memulai sesi
require 'templates/header.php';
// Memanggil file koneksi database untuk digunakan jika ada data dinamis
require 'php/db_connect.php';
?>

<!-- Decorative elements -->
<div class="fixed w-full h-full top-0 left-0 pointer-events-none z-0">
  <div class="absolute top-20 left-[10%] w-40 h-40 bg-primary/10 rounded-full filter blur-3xl"></div>
  <div class="absolute bottom-20 right-[5%] w-60 h-60 bg-secondary/10 rounded-full filter blur-3xl"></div>
  <div class="absolute top-[40%] right-[30%] w-32 h-32 bg-accent/10 rounded-full filter blur-3xl"></div>
</div>

<!-- Header Section with Video Background -->
<header class="w-full h-screen relative overflow-hidden" data-aos="fade">
  <video
    class="absolute top-0 left-0 w-full h-full object-cover brightness-50 hover:brightness-70 transition-all duration-500"
    width="100%"
    loop
    autoplay
    muted
    playsinline
    preload="auto"
  >
    <source src="assets/videos/TEASER.mp4" type="video/mp4" />
  </video>

  <!-- Video overlay with pattern -->
  <div class="absolute top-0 left-0 w-full h-full bg-noise opacity-30"></div>

  <div class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white text-center z-10 bg-gradient-to-b from-black/50 via-black/30 to-transparent px-4">
    <div class="transform transition-all duration-700 hover:scale-105 max-w-4xl">
      <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold mb-4 drop-shadow-lg tracking-tight relative">
        <span class="text-outline text-white leading-tight block mb-2">WELCOME TO</span>
        <div class="relative">
          <span class="bg-gradient-to-r from-white via-secondary to-white gradient-text text-shadow-xl">IT SPECTA</span>
          <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-white/50 rounded-full"></div>
        </div>
      </h1>
      <p class="text-lg sm:text-xl md:text-2xl font-medium text-shadow-md max-w-2xl mx-auto mb-8">
        Experience the Future of Technology
      </p>
      <div class="mt-8">
        <a
          href="#about"
          class="px-6 sm:px-8 py-3 sm:py-4 bg-primary/80 hover:bg-primary border border-white/30 hover:border-white rounded-full text-white font-medium transition-all duration-300 hover:shadow-lg hover:-translate-y-1 inline-flex items-center group text-sm sm:text-base"
        >
          Explore Now
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-4 w-4 sm:h-5 sm:w-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-1"
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
        </a>
      </div>
    </div>
  </div>

  <!-- Floating scroll indicator -->
  <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      class="h-8 w-8 text-white opacity-70"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M19 14l-7 7m0 0l-7-7m7 7V3"
      />
    </svg>
  </div>
</header>

<!-- Hero Section with better visuals -->
<section
  id="about"
  class="relative py-0 sm:py-0 md:py-0 px-4 sm:px-6 md:px-8 mt-16 sm:mt-18 md:mt-20 bg-gradient-to-b from-white to-gray-50"
>
  <div
    class="absolute top-0 left-0 w-full h-20 bg-gradient-to-b from-white/50 to-transparent"
  ></div>

  <div class="max-w-6xl mx-auto relative">
    <div class="mb-12 sm:mb-16 text-center">
      <h2
        class="relative text-transparent bg-gradient-to-r from-primary via-primary/80 to-primary bg-clip-text text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 sm:mb-6 tracking-tight"
        data-aos="fade-up"
        data-aos-duration="1000"
      >
        IT SPECTA
      </h2>
      <p
        class="relative text-primary text-lg sm:text-xl font-bold mb-6 sm:mb-8"
        data-aos="fade-up"
        data-aos-duration="1000"
        data-aos-delay="100"
      >
        by Prodi Teknologi Informasi UMY
      </p>

      <div
        class="relative h-16 sm:h-20"
        data-aos="fade-up"
        data-aos-duration="1000"
        data-aos-delay="200"
      >
        <div
          class="absolute left-1/2 -translate-x-1/2 top-0 w-24 sm:w-32 h-1 bg-gradient-to-r from-transparent via-secondary to-transparent rounded-full"
        ></div>
        <div
          class="absolute left-1/2 -translate-x-1/2 top-4 sm:top-6 w-16 sm:w-20 h-1 bg-gradient-to-r from-transparent via-secondary to-transparent rounded-full"
        ></div>
        <div
          class="absolute left-1/2 -translate-x-1/2 top-8 sm:top-12 w-8 sm:w-12 h-1 bg-gradient-to-r from-transparent via-secondary to-transparent rounded-full"
        ></div>
      </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-8 sm:gap-10 items-center">
      <div
        class="relative group w-full lg:w-1/2"
        data-aos="fade-right"
        data-aos-duration="1200"
      >
        <div
          class="absolute -inset-1 bg-gradient-to-r from-primary to-secondary rounded-2xl blur opacity-30 group-hover:opacity-70 transition duration-1000 group-hover:duration-300"
        ></div>
        <div
          class="relative bg-white ring-1 ring-gray-200 rounded-2xl p-6 sm:p-8"
        >
          <div
            class="absolute -top-8 sm:-top-12 -right-8 sm:-right-12 w-16 h-16 sm:w-24 sm:h-24 rounded-full bg-secondary/10 flex items-center justify-center"
          >
            <div
              class="w-12 h-12 sm:w-16 sm:h-16 rounded-full bg-secondary/20 flex items-center justify-center animate-pulse-slow"
            >
              <div
                class="w-6 h-6 sm:w-8 sm:h-8 rounded-full bg-secondary/30"
              ></div>
            </div>
          </div>
          <h3 class="text-xl sm:text-2xl font-bold text-primary mb-4">
            About The Event
          </h3>
          <p class="text-gray-600 leading-relaxed text-sm sm:text-base">
            IT SPECTA is an annual celebration of innovation and
            technology by the Information Technology Department at UMY.
            Our event brings together students, professionals, and
            technology enthusiasts for a memorable experience that
            combines learning, competition, and fun.
          </p>
        </div>
      </div>

      <div
        class="w-full lg:w-1/2 grid grid-cols-2 gap-3 sm:gap-4"
        data-aos="fade-left"
        data-aos-duration="1200"
        data-aos-delay="300"
      >
        <div
          class="bg-white p-4 sm:p-6 rounded-xl shadow-md card-hover"
        >
          <div
            class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-primary/10 flex items-center justify-center mb-3 sm:mb-4"
          >
            <i
              class="fas fa-calendar text-primary text-sm sm:text-base"
            ></i>
          </div>
          <h3 class="font-semibold text-gray-800 text-sm sm:text-base">
            Seminar
          </h3>
          <p class="text-xs sm:text-sm text-gray-600 mt-1 sm:mt-2">
            Inspiring talks by industry experts
          </p>
        </div>
        <div
          class="bg-white p-4 sm:p-6 rounded-xl shadow-md card-hover"
        >
          <div
            class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-secondary/10 flex items-center justify-center mb-3 sm:mb-4"
          >
            <i
              class="fas fa-running text-secondary text-sm sm:text-base"
            ></i>
          </div>
          <h3 class="font-semibold text-gray-800 text-sm sm:text-base">
            Fun Run
          </h3>
          <p class="text-xs sm:text-sm text-gray-600 mt-1 sm:mt-2">
            5K run with excitement and prizes
          </p>
        </div>
        <div
          class="bg-white p-4 sm:p-6 rounded-xl shadow-md card-hover"
        >
          <div
            class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-accent/10 flex items-center justify-center mb-3 sm:mb-4"
          >
            <i
              class="fas fa-trophy text-accent text-sm sm:text-base"
            ></i>
          </div>
          <h3 class="font-semibold text-gray-800 text-sm sm:text-base">
            Competitions
          </h3>
          <p class="text-xs sm:text-sm text-gray-600 mt-1 sm:mt-2">
            Academic and non-academic contests
          </p>
        </div>
        <div
          class="bg-white p-4 sm:p-6 rounded-xl shadow-md card-hover"
        >
          <div
            class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-dark/10 flex items-center justify-center mb-3 sm:mb-4"
          >
            <i
              class="fas fa-laptop-code text-dark text-sm sm:text-base"
            ></i>
          </div>
          <h3 class="font-semibold text-gray-800 text-sm sm:text-base">
            Workshops
          </h3>
          <p class="text-xs sm:text-sm text-gray-600 mt-1 sm:mt-2">
            Hands-on experience with technologies
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Description Section with better design -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 relative overflow-hidden">
  <div
    class="absolute inset-0 bg-gradient-radial from-primary/5 to-transparent pointer-events-none"
  ></div>

  <div class="max-w-4xl mx-auto relative">
    <div class="text-center mb-8 sm:mb-10" data-aos="fade-up">
      <span
        class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold"
        >OUR VISION</span
      >
      <h2
        class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4"
      >
        The Spirit of IT SPECTA
      </h2>
    </div>

    <div
      class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-10 relative overflow-hidden group"
      data-aos="fade-up"
    >
      <!-- Decorative elements -->
      <div
        class="absolute -top-24 -right-24 w-48 h-48 rounded-full bg-secondary/10 group-hover:bg-secondary/20 transition-all duration-500"
      ></div>
      <div
        class="absolute -bottom-20 -left-20 w-40 h-40 rounded-full bg-primary/10 group-hover:bg-primary/20 transition-all duration-500"
      ></div>

      <div class="relative">
        <p
          class="text-gray-700 text-base sm:text-lg md:text-xl leading-relaxed"
        >
          IT Specta merupakan kegiatan tahunan Program Studi Teknologi
          Informasi UMY yang mana ini salah satu sebuah perayaan ulang
          tahun prodi. Didalamnya terdapat berbagai rangkaian acara,
          yaitu Opening Seminar Nasional, Lomba Akademik dan
          Non-akademik, dan yang terakhir ada Fun Run sekaligus closing.
        </p>

        <div
          class="mt-6 sm:mt-8 border-l-4 border-secondary pl-4 sm:pl-6 py-2"
        >
          <p class="italic text-gray-600 text-sm sm:text-base">
            "Celebrating innovation, fostering collaboration, and
            building the future of technology together."
          </p>
        </div>

        <div class="flex justify-center mt-6 sm:mt-8">
          <div
            class="flex items-center gap-2 sm:gap-3 bg-primary/5 hover:bg-primary/10 px-4 sm:px-5 py-2 sm:py-3 rounded-full transition-all duration-300 cursor-pointer group"
          >
            <div
              class="w-8 h-8 sm:w-10 sm:h-10 rounded-full overflow-hidden"
            >
              <img
                src="assets/images/Logo.png"
                alt="IT SPECTA Logo"
                class="w-full h-full object-cover"
              />
            </div>
            <div>
              <p class="text-primary font-semibold text-xs sm:text-sm">
                IT SPECTA 2025
              </p>
              <p class="text-gray-600 text-xs">
                Teknologi Informasi UMY
              </p>
            </div>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-4 w-4 sm:h-5 sm:w-5 text-primary transform transition-transform duration-300 group-hover:translate-x-1"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 5l7 7-7 7"
              />
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Seminar Nasional Section -->
<section
  id="semnas"
  class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 relative overflow-hidden"
>
  <!-- Background image -->
  <div
    class="absolute inset-0 bg-center bg-cover bg-no-repeat opacity-40 z-0"
    style="background-image: url('assets/images/SemNas Background.JPG')"
  ></div>

  <!-- Glassmorphism layers -->
  <div
    class="absolute inset-0 bg-gradient-to-br from-primary/20 via-white/10 to-secondary/20 backdrop-blur-sm z-10"
  ></div>
  <div class="absolute inset-0 bg-white/10 backdrop-blur-lg z-15"></div>

  <div
    class="w-full max-w-6xl mx-auto px-2 sm:px-4 md:px-5 py-6 sm:py-8 md:py-10 relative z-30"
  >
    <!-- Section header -->
    <div
      class="text-center mb-12 sm:mb-16"
      data-aos="fade-up"
      data-aos-duration="800"
    >
      <span
        class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider"
        >Event Highlight</span
      >

      <!-- Seminar Nasional Logo -->
      <div class="mt-6 mb-6 flex justify-center" data-aos-delay="100">
        <img
          src="assets/images/Logo SemNas.png"
          alt="Seminar Nasional"
          class="h-24 sm:h-32 md:h-40 object-contain transition-all duration-500 hover:scale-105"
        />
      </div>

      <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base">
        Expand your knowledge with industry experts discussing the
        latest tech trends
      </p>
    </div>

    <!-- Enhanced CTA button -->
    <div
      class="text-center mt-12"
      data-aos="fade-up"
      data-aos-delay="300"
    >
      <a
        href="seminar-nasional.php"
        class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-primary to-primary/90 text-white font-semibold rounded-full shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-1 group"
      >
        <span>Explore Seminar Details</span>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5 ml-2 transform transition-all duration-300 group-hover:translate-x-1"
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
      </a>
    </div>
  </div>
</section>

<!-- Fun Run Section -->
<section
  id="funrun"
  class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 relative overflow-hidden"
>
  <!-- Enhanced background with radial gradient -->
  <div
    class="absolute inset-0 bg-gradient-radial from-[#1B4599] to-[#1D1C52] opacity-95"
  ></div>

  <!-- Decorative background elements -->
  <div
    class="absolute inset-0 bg-gradient-to-br from-secondary/5 via-primary/3 to-secondary/[0.03] pointer-events-none"
  ></div>
  <div
    class="absolute top-0 left-0 w-80 h-80 bg-secondary/5 rounded-full filter blur-3xl opacity-70 animate-pulse-slow"
  ></div>
  <div
    class="absolute bottom-0 right-0 w-64 h-64 bg-primary/5 rounded-full filter blur-3xl opacity-70"
  ></div>

  <div
    class="w-full max-w-6xl mx-auto px-2 sm:px-4 md:px-5 py-6 sm:py-8 md:py-10 relative z-10"
  >
    <!-- Section header -->
    <div
      class="text-center mb-12 sm:mb-16"
      data-aos="fade-up"
      data-aos-duration="800"
    >
      <div class="inline-flex items-center gap-2 mb-6">
        <span
          class="bg-white/10 text-white px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider animate-pulse-slow"
          >Event Highlight</span
        >
        <span class="h-px w-10 bg-white/30"></span>
        <span class="text-xs text-white/70 font-medium uppercase"
          >5K Race</span
        >
      </div>

      <!-- Fun Run Logo -->
      <div class="mb-6 flex justify-center" data-aos-delay="100">
        <img
          src="assets/images/Logo FunRun.png"
          alt="Fun Run 5K"
          class="h-24 sm:h-32 md:h-40 object-contain transition-all duration-500 hover:scale-105"
        />
      </div>

      <p
        class="text-white/90 max-w-2xl mx-auto mt-4 text-sm sm:text-base"
      >
        Join our exhilarating 5K running event to celebrate fitness,
        community, and technology
      </p>
    </div>

    <!-- Enhanced CTA section -->
    <div
      class="text-center mt-12 sm:mt-16"
      data-aos="fade-up"
      data-aos-delay="300"
    >
      <div class="inline-block relative">
        <div
          class="absolute -inset-1 bg-gradient-to-r from-secondary to-secondary/80 rounded-full blur opacity-30 animate-pulse-slow"
        ></div>
        <a
          href="fun-run.php"
          class="relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-secondary to-secondary/90 text-white font-semibold rounded-full shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-1 group"
        >
          <span>Register Now</span>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5 ml-2 transform transition-all duration-300 group-hover:translate-x-1"
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
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Scripts -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="assets/js/script.js"></script>
<script>
  // Mobile menu toggle function
  function toggleMobileMenu() {
    const navMenu = document.querySelector(".nav-menu");
    navMenu.classList.toggle("active");
  }

  // Close mobile menu when clicking outside
  document.addEventListener("click", function (event) {
    const navMenu = document.querySelector(".nav-menu");
    const mobileMenuBtn = document.querySelector(".mobile-menu-btn");

    if (
      !navMenu.contains(event.target) &&
      !mobileMenuBtn.contains(event.target)
    ) {
      navMenu.classList.remove("active");
    }
  });

  // Close mobile menu when window is resized to desktop
  window.addEventListener("resize", function () {
    if (window.innerWidth >= 768) {
      document.querySelector(".nav-menu").classList.remove("active");
    }
  });

  // Initialize AOS
  AOS.init({
    duration: 1000,
    once: true,
    offset: 100
  });
</script>

<?php
// Menutup koneksi database
if (isset($conn)) {
    $conn->close();
}

// Memanggil file footer.
require 'templates/footer.php';
?>