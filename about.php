<?php 
    // Memanggil file header yang berisi bagian atas HTML, navigasi, dan aset.
    require 'templates/header.php'; 
?>

<!-- Hero Section -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 relative mt-16 sm:mt-18 md:mt-20 overflow-hidden">
  <!-- Enhanced background with radial gradient -->
  <div class="absolute inset-0 bg-gradient-radial from-[#1B4599] to-[#1D1C52] opacity-95"></div>
  
  <!-- Decorative background elements -->
  <div class="absolute inset-0 bg-gradient-to-br from-secondary/5 via-primary/3 to-secondary/[0.03] pointer-events-none"></div>
  <div class="absolute top-0 left-0 w-80 h-80 bg-secondary/5 rounded-full filter blur-3xl opacity-70 animate-pulse-slow"></div>
  <div class="absolute bottom-0 right-0 w-64 h-64 bg-primary/5 rounded-full filter blur-3xl opacity-70"></div>
  
  <div class="w-full max-w-6xl mx-auto px-2 sm:px-4 md:px-5 py-6 sm:py-8 md:py-10 relative z-10">
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up" data-aos-duration="800">
      <span class="bg-white/10 text-white px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">About IT SPECTA</span>
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4 mt-6">About Us</h1>
      <p class="text-white/90 max-w-2xl mx-auto mt-4 text-sm sm:text-base">Learn more about IT SPECTA and our journey in technology innovation</p>
    </div>
  </div>
</section>

<!-- About Section -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 relative">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Our Story</span>
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Tentang IT SPECTA</h2>
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>
      
    <div class="flex flex-col lg:flex-row gap-8 sm:gap-10 items-center mb-12">
      <div class="w-full lg:w-1/2" data-aos="fade-right" data-aos-duration="1200">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover">
          <img src="assets/images/Logo.png" alt="IT SPECTA Event" class="w-full h-64 object-contain p-8" />
        </div>
      </div>
        
      <div class="w-full lg:w-1/2" data-aos="fade-left" data-aos-duration="1200">
        <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-10 relative overflow-hidden group">
          <!-- Decorative elements -->
          <div class="absolute -top-24 -right-24 w-48 h-48 rounded-full bg-secondary/10 group-hover:bg-secondary/20 transition-all duration-500"></div>
          <div class="absolute -bottom-20 -left-20 w-40 h-40 rounded-full bg-primary/10 group-hover:bg-primary/20 transition-all duration-500"></div>
          
          <div class="relative">
            <p class="mb-5 text-base sm:text-lg leading-relaxed text-gray-700">
              IT SPECTA merupakan kegiatan tahunan yang diselenggarakan oleh Program Studi Teknologi Informasi Universitas Muhammadiyah Yogyakarta sebagai bentuk perayaan ulang tahun program studi.
            </p>

            <p class="mb-5 text-base sm:text-lg leading-relaxed text-gray-700">
              Pertama kali diselenggarakan pada tahun 2018, IT SPECTA
              telah menjadi ajang yang dinantikan oleh mahasiswa dan
              civitas akademika UMY, serta masyarakat umum yang memiliki
              minat di bidang teknologi informasi.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Goals Section -->
    <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-10 relative overflow-hidden group" data-aos="fade-up">
      <div class="relative">
        <h3 class="text-xl sm:text-2xl font-bold text-primary mb-6">Tujuan IT SPECTA</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div class="flex items-start gap-4">
            <div class="w-10 h-10 bg-secondary/10 rounded-full flex items-center justify-center flex-shrink-0">
              <i class="fas fa-lightbulb text-secondary"></i>
            </div>
            <div>
              <h4 class="font-semibold text-gray-800 mb-2">Kreativitas & Inovasi</h4>
              <p class="text-gray-600 text-sm">Mengembangkan kreativitas dan inovasi mahasiswa di bidang teknologi informasi</p>
            </div>
          </div>
          <div class="flex items-start gap-4">
            <div class="w-10 h-10 bg-accent/10 rounded-full flex items-center justify-center flex-shrink-0">
              <i class="fas fa-network-wired text-accent"></i>
            </div>
            <div>
              <h4 class="font-semibold text-gray-800 mb-2">Networking</h4>
              <p class="text-gray-600 text-sm">Memperluas jaringan dengan berbagai stakeholder di industri teknologi</p>
            </div>
          </div>
          <div class="flex items-start gap-4">
            <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
              <i class="fas fa-graduation-cap text-primary"></i>
            </div>
            <div>
              <h4 class="font-semibold text-gray-800 mb-2">Aplikasi Ilmu</h4>
              <p class="text-gray-600 text-sm">Memberikan wadah bagi mahasiswa untuk mengaplikasikan ilmu yang diperoleh selama perkuliahan</p>
            </div>
          </div>
          <div class="flex items-start gap-4">
            <div class="w-10 h-10 bg-dark/10 rounded-full flex items-center justify-center flex-shrink-0">
              <i class="fas fa-users text-dark"></i>
            </div>
            <div>
              <h4 class="font-semibold text-gray-800 mb-2">Kolaborasi</h4>
              <p class="text-gray-600 text-sm">Membangun kebersamaan dan semangat kolaborasi antar mahasiswa</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Vision Mission Section -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 bg-gradient-to-b from-gray-50 to-white">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Vision & Mission</span>
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Visi & Misi</h2>
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-12">
      <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-10 text-center card-hover" data-aos="fade-right">
        <div class="w-16 h-16 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-6">
          <i class="fas fa-eye text-secondary text-2xl"></i>
        </div>
        <h3 class="text-xl sm:text-2xl font-bold text-primary mb-4">Visi</h3>
        <p class="text-base sm:text-lg leading-relaxed text-gray-700">
          Menjadikan IT SPECTA sebagai wadah pengembangan kreativitas
          dan inovasi mahasiswa teknologi informasi yang terkemuka di
          tingkat nasional.
        </p>
      </div>

      <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-10 text-center card-hover" data-aos="fade-left">
        <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
          <i class="fas fa-flag text-primary text-2xl"></i>
        </div>
        <h3 class="text-xl sm:text-2xl font-bold text-primary mb-4">Misi</h3>
        <div class="text-left">
          <div class="flex items-start gap-3 mb-3">
            <i class="fas fa-check-circle text-secondary mt-1 flex-shrink-0"></i>
            <span class="text-sm sm:text-base text-gray-700">Menyelenggarakan kegiatan yang mendorong eksplorasi dan pengembangan potensi mahasiswa.</span>
          </div>
          <div class="flex items-start gap-3 mb-3">
            <i class="fas fa-check-circle text-secondary mt-1 flex-shrink-0"></i>
            <span class="text-sm sm:text-base text-gray-700">Membangun jaringan kerjasama dengan berbagai stakeholder di bidang teknologi informasi.</span>
          </div>
          <div class="flex items-start gap-3 mb-3">
            <i class="fas fa-check-circle text-secondary mt-1 flex-shrink-0"></i>
            <span class="text-sm sm:text-base text-gray-700">Menghadirkan sarana pembelajaran yang inovatif dan menyenangkan bagi peserta.</span>
          </div>
          <div class="flex items-start gap-3">
            <i class="fas fa-check-circle text-secondary mt-1 flex-shrink-0"></i>
            <span class="text-sm sm:text-base text-gray-700">Mempromosikan nilai-nilai kebersamaan, sportivitas, dan kolaborasi.</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Timeline Section -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Event Schedule</span>
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Timeline IT SPECTA 2025</h2>
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>

    <div class="space-y-6">
      <div class="bg-white rounded-2xl shadow-md p-6 card-hover" data-aos="fade-right">
        <div class="flex items-start gap-4">
          <div class="w-12 h-12 rounded-full bg-secondary flex items-center justify-center text-white text-lg font-bold flex-shrink-0">1</div>
          <div>
            <div class="text-sm text-gray-500 mb-1">1 - 25 April 2025</div>
            <h3 class="text-lg font-semibold mb-2 text-primary">Pendaftaran Seminar Nasional</h3>
            <p class="text-gray-700 leading-relaxed">Pembukaan pendaftaran peserta Seminar Nasional IT SPECTA 2025.</p>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-2xl shadow-md p-6 card-hover" data-aos="fade-left">
        <div class="flex items-start gap-4">
          <div class="w-12 h-12 rounded-full bg-secondary flex items-center justify-center text-white text-lg font-bold flex-shrink-0">2</div>
          <div>
            <div class="text-sm text-gray-500 mb-1">26 April 2025</div>
            <h3 class="text-lg font-semibold mb-2 text-primary">Seminar Nasional</h3>
            <p class="text-gray-700 leading-relaxed">
              Pelaksanaan Seminar Nasional dengan tema "Manusia vs Mesin siapa yang akan bertahan di era AI".
            </p>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-2xl shadow-md p-6 card-hover" data-aos="fade-right">
        <div class="flex items-start gap-4">
          <div class="w-12 h-12 rounded-full bg-secondary flex items-center justify-center text-white text-lg font-bold flex-shrink-0">3</div>
          <div>
            <div class="text-sm text-gray-500 mb-1">10 - 26 Mei 2025</div>
            <h3 class="text-lg font-semibold mb-2 text-primary">Kompetisi Akademik</h3>
            <p class="text-gray-700 leading-relaxed">
              Rangkaian kompetisi dalam bidang pemrograman dan UI/UX.
            </p>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-2xl shadow-md p-6 card-hover" data-aos="fade-right">
        <div class="flex items-start gap-4">
          <div class="w-12 h-12 rounded-full bg-secondary flex items-center justify-center text-white text-lg font-bold flex-shrink-0">4</div>
          <div>
            <div class="text-sm text-gray-500 mb-1">26 april - 26 mei 2025</div>
            <h3 class="text-lg font-semibold mb-2 text-primary">Kompetisi Non-Akademik</h3>
            <p class="text-gray-700 leading-relaxed">
              Rangkaian kompetisi olahraga dan e-sports.
            </p>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-2xl shadow-md p-6 card-hover" data-aos="fade-left">
        <div class="flex items-start gap-4">
          <div class="w-12 h-12 rounded-full bg-secondary flex items-center justify-center text-white text-lg font-bold flex-shrink-0">5</div>
          <div>
            <div class="text-sm text-gray-500 mb-1">26 Mei 2025</div>
            <h3 class="text-lg font-semibold mb-2 text-primary">Fun Run & Closing Ceremony</h3>
            <p class="text-gray-700 leading-relaxed">
              Kegiatan Fun Run sejauh 5K yang diikuti dengan pengumuman pemenang kompetisi dan penutupan IT SPECTA 2025.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Team Section -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 bg-gradient-to-b from-gray-50 to-white">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Our Team</span>
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Meet Our Team</h2>
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>

    <p class="text-center text-base sm:text-lg leading-relaxed mb-10 text-gray-600">
      IT SPECTA 2025 diselenggarakan oleh mahasiswa Program Studi
      Teknologi Informasi UMY yang tergabung dalam kepanitiaan
      berikut:
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
      <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="100">
        <div class="relative overflow-hidden">
          <img src="assets/images/fotowildan.JPG" alt="Wildan Zuhair Pratama" class="w-full h-80 object-cover object-top transition-all duration-500 group-hover:scale-105" />
        </div>
        <div class="p-8 text-center">
          <h3 class="text-lg sm:text-xl font-semibold mb-3 text-primary">Wildan Zuhair</h3>
          <p class="text-gray-600 mb-6">Ketua Pelaksana</p>
          <a href="http://instagram.com/wldnprtmaa_" class="inline-flex items-center justify-center w-10 h-10 bg-secondary/10 rounded-full text-secondary hover:bg-secondary hover:text-white transition-all duration-300" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>
      
      <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="200">
        <div class="relative overflow-hidden">
          <img src="assets/images/fotonabil.JPG" alt="Nabil Nasruddin" class="w-full h-80 object-cover object-top transition-all duration-500 group-hover:scale-105" />
        </div>
        <div class="p-8 text-center">
          <h3 class="text-lg sm:text-xl font-semibold mb-3 text-primary">Nabil Nasruddin</h3>
          <p class="text-gray-600 mb-6">Wakil Ketua</p>
          <a href="http://instagram.com/nabill.udin" class="inline-flex items-center justify-center w-10 h-10 bg-secondary/10 rounded-full text-secondary hover:bg-secondary hover:text-white transition-all duration-300" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>

      <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="300">
        <div class="relative overflow-hidden">
          <img src="assets/images/fotonabila.JPG" alt="Nabila Affifah" class="w-full h-80 object-cover object-top transition-all duration-500 group-hover:scale-105" />
        </div>
        <div class="p-8 text-center">
          <h3 class="text-lg sm:text-xl font-semibold mb-3 text-primary">Nabila Affifah</h3>
          <p class="text-gray-600 mb-6">Bendahara</p>
          <a href="http://instagram.com/nbla_zs" class="inline-flex items-center justify-center w-10 h-10 bg-secondary/10 rounded-full text-secondary hover:bg-secondary hover:text-white transition-all duration-300" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>

      <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="400">
        <div class="relative overflow-hidden">
          <img src="assets/images/fotomoza2.JPG" alt="Shihwa Moza Kastela" class="w-full h-80 object-cover object-top transition-all duration-500 group-hover:scale-105" />
        </div>
        <div class="p-8 text-center">
          <h3 class="text-lg sm:text-xl font-semibold mb-3 text-primary">Shihwa Moza Kastela</h3>
          <p class="text-gray-600 mb-6">Sekretaris</p>
          <a href="http://instagram.com/syihwamoza" class="inline-flex items-center justify-center w-10 h-10 bg-secondary/10 rounded-full text-secondary hover:bg-secondary hover:text-white transition-all duration-300" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
    // Memanggil file footer.
    require 'templates/footer.php'; 
?>