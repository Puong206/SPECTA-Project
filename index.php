<?php 
    // Memanggil file header yang berisi bagian atas HTML, navigasi, dan aset.
    require 'templates/header.php'; 
?>

<header class="w-full h-screen relative overflow-hidden">
  <video
    class="absolute top-0 left-0 w-full h-full object-cover brightness-50 hover:brightness-70 transition-all duration-500"
    loop
    autoplay
    muted
    playsinline
    preload="auto"
  >
    <source src="assets/videos/TEASER.mp4" type="video/mp4" />
  </video>

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
        <a href="#about" class="px-6 sm:px-8 py-3 sm:py-4 bg-primary/80 hover:bg-primary border border-white/30 hover:border-white rounded-full text-white font-medium transition-all duration-300 hover:shadow-lg hover:-translate-y-1 inline-flex items-center group text-sm sm:text-base">
          Explore Now
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
          </svg>
        </a>
      </div>
    </div>
  </div>

  <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
    </svg>
  </div>
</header>

<section id="about" class="relative py-24 px-4 bg-gradient-to-b from-white to-gray-50">
  <div class="max-w-6xl mx-auto relative">
    <div class="mb-16 text-center">
      <h2 class="relative text-transparent bg-gradient-to-r from-primary via-primary/80 to-primary bg-clip-text text-5xl lg:text-6xl font-extrabold mb-6 tracking-tight">
        IT SPECTA
      </h2>
      <p class="relative text-primary text-xl font-bold mb-8">
        by Prodi Teknologi Informasi UMY
      </p>
    </div>

    <div class="flex flex-col lg:flex-row gap-10 items-center">
        </div>
  </div>
</section>

<section class="py-24 px-4 relative overflow-hidden">
    </section>

<section id="semnas" class="py-24 px-4 relative overflow-hidden">
  <div class="absolute inset-0 bg-center bg-cover bg-no-repeat opacity-40 z-0" style="background-image: url('assets/images/SemNas Background.JPG')"></div>
  
  <div class="w-full max-w-6xl mx-auto relative z-30">
      <img src="assets/images/Logo SemNas.png" alt="Seminar Nasional" class="h-32 md:h-40 mx-auto mb-6 transition-all duration-500 hover:scale-105"/>
      </div>
</section>

<section id="funrun" class="py-24 px-4 relative overflow-hidden bg-gradient-radial from-[#1B4599] to-[#1D1C52]">
    <div class="w-full max-w-6xl mx-auto relative z-10">
        <img src="assets/images/Logo FunRun.png" alt="Fun Run 5K" class="h-32 md:h-40 mx-auto mb-6 transition-all duration-500 hover:scale-105"/>
        </div>
</section>

<?php 
    // Memanggil file footer yang berisi bagian bawah HTML dan skrip.
    require 'templates/footer.php'; 
?>