<?php 
    // Memanggil file header yang berisi bagian atas HTML, navigasi, dan aset.
    require 'templates/header.php'; 
?>

<!-- Hero Section -->
<!-- Bagian hero dengan background gradient dan elemen dekoratif -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 relative mt-16 sm:mt-18 md:mt-20 overflow-hidden">
  <!-- Background gradient yang diperkuat dengan opacity -->
  <div class="absolute inset-0 bg-gradient-radial from-[#1B4599] to-[#1D1C52] opacity-95"></div>
  
  <!-- Elemen dekoratif background dengan gradient -->
  <div class="absolute inset-0 bg-gradient-to-br from-secondary/5 via-primary/3 to-secondary/[0.03] pointer-events-none"></div>
  <!-- Lingkaran blur di kiri atas dengan animasi pulse -->
  <div class="absolute top-0 left-0 w-80 h-80 bg-secondary/5 rounded-full filter blur-3xl opacity-70 animate-pulse-slow"></div>
  <!-- Lingkaran blur di kanan bawah -->
  <div class="absolute bottom-0 right-0 w-64 h-64 bg-primary/5 rounded-full filter blur-3xl opacity-70"></div>
  
  <!-- Container utama dengan z-index tinggi -->
  <div class="w-full max-w-6xl mx-auto px-2 sm:px-4 md:px-5 py-6 sm:py-8 md:py-10 relative z-10">
    <!-- Bagian teks judul dengan animasi AOS -->
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up" data-aos-duration="800">
      <!-- Badge dengan background transparan -->
      <span class="bg-white/10 text-white px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">About IT SPECTA</span>
      <!-- Judul utama dengan responsive font size -->
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4 mt-6">About Us</h1>
      <!-- Deskripsi singkat dengan opacity -->
      <p class="text-white/90 max-w-2xl mx-auto mt-4 text-sm sm:text-base">Learn more about IT SPECTA and our journey in technology innovation</p>
    </div>
  </div>
</section>

<!-- About Section -->
<!-- Bagian utama about dengan informasi tentang IT SPECTA -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 relative">
  <!-- Container maksimal dengan margin auto -->
  <div class="max-w-6xl mx-auto">
    <!-- Header section dengan animasi fade-up -->
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <!-- Badge dengan background primary -->
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Our Story</span>
      <!-- Judul section dengan margin -->
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Tentang IT SPECTA</h2>
      <!-- Garis dekoratif dengan background secondary -->
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>
      
    <!-- Layout flex untuk desktop dan kolom untuk mobile -->
    <div class="flex flex-col lg:flex-row gap-8 sm:gap-10 items-center mb-12">
      <!-- Container gambar dengan animasi fade-right -->
      <div class="w-full lg:w-1/2" data-aos="fade-right" data-aos-duration="1200">
        <!-- Card dengan shadow dan hover effect -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover">
          <!-- Logo IT SPECTA dengan object-contain -->
          <img src="assets/images/Logo.png" alt="IT SPECTA Event" class="w-full h-64 object-contain p-8" />
        </div>
      </div>
        
      <!-- Container teks dengan animasi fade-left -->
      <div class="w-full lg:w-1/2" data-aos="fade-left" data-aos-duration="1200">
        <!-- Card dengan elemen dekoratif dan hover effect -->
        <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-10 relative overflow-hidden group">
          <!-- Elemen dekoratif - lingkaran di kanan atas -->
          <div class="absolute -top-24 -right-24 w-48 h-48 rounded-full bg-secondary/10 group-hover:bg-secondary/20 transition-all duration-500"></div>
          <!-- Elemen dekoratif - lingkaran di kiri bawah -->
          <div class="absolute -bottom-20 -left-20 w-40 h-40 rounded-full bg-primary/10 group-hover:bg-primary/20 transition-all duration-500"></div>
          
          <!-- Konten teks dengan z-index relative -->
          <div class="relative">
            <!-- Paragraf pertama tentang IT SPECTA -->
            <p class="mb-5 text-base sm:text-lg leading-relaxed text-gray-700">
              IT SPECTA merupakan kegiatan tahunan yang diselenggarakan oleh Program Studi Teknologi Informasi Universitas Muhammadiyah Yogyakarta sebagai bentuk perayaan ulang tahun program studi.
            </p>

            <!-- Paragraf kedua tentang sejarah -->
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
    <!-- Bagian tujuan IT SPECTA dengan grid layout -->
    <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-10 relative overflow-hidden group" data-aos="fade-up">
      <!-- Konten dengan z-index relative -->
      <div class="relative">
        <!-- Judul tujuan dengan warna primary -->
        <h3 class="text-xl sm:text-2xl font-bold text-primary mb-6">Tujuan IT SPECTA</h3>
        <!-- Grid 2 kolom untuk desktop, 1 kolom untuk mobile -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Item tujuan pertama -->
          <div class="flex items-start gap-4">
            <!-- Icon container dengan background secondary -->
            <div class="w-10 h-10 bg-secondary/10 rounded-full flex items-center justify-center flex-shrink-0">
              <i class="fas fa-lightbulb text-secondary"></i>
            </div>
            <!-- Konten teks -->
            <div>
              <h4 class="font-semibold text-gray-800 mb-2">Kreativitas & Inovasi</h4>
              <p class="text-gray-600 text-sm">Mengembangkan kreativitas dan inovasi mahasiswa di bidang teknologi informasi</p>
            </div>
          </div>
          <!-- Item tujuan kedua -->
          <div class="flex items-start gap-4">
            <!-- Icon container dengan background accent -->
            <div class="w-10 h-10 bg-accent/10 rounded-full flex items-center justify-center flex-shrink-0">
              <i class="fas fa-network-wired text-accent"></i>
            </div>
            <!-- Konten teks -->
            <div>
              <h4 class="font-semibold text-gray-800 mb-2">Networking</h4>
              <p class="text-gray-600 text-sm">Memperluas jaringan dengan berbagai stakeholder di industri teknologi</p>
            </div>
          </div>
          <!-- Item tujuan ketiga -->
          <div class="flex items-start gap-4">
            <!-- Icon container dengan background primary -->
            <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
              <i class="fas fa-graduation-cap text-primary"></i>
            </div>
            <!-- Konten teks -->
            <div>
              <h4 class="font-semibold text-gray-800 mb-2">Aplikasi Ilmu</h4>
              <p class="text-gray-600 text-sm">Memberikan wadah bagi mahasiswa untuk mengaplikasikan ilmu yang diperoleh selama perkuliahan</p>
            </div>
          </div>
          <!-- Item tujuan keempat -->
          <div class="flex items-start gap-4">
            <!-- Icon container dengan background dark -->
            <div class="w-10 h-10 bg-dark/10 rounded-full flex items-center justify-center flex-shrink-0">
              <i class="fas fa-users text-dark"></i>
            </div>
            <!-- Konten teks -->
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
<!-- Bagian visi dan misi dengan background gradient -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 bg-gradient-to-b from-gray-50 to-white">
  <!-- Container dengan max width -->
  <div class="max-w-6xl mx-auto">
    <!-- Header section -->
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <!-- Badge vision mission -->
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Vision & Mission</span>
      <!-- Judul section -->
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Visi & Misi</h2>
      <!-- Garis dekoratif -->
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>

    <!-- Grid layout untuk visi dan misi -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-12">
      <!-- Card visi dengan animasi fade-right -->
      <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-10 text-center card-hover" data-aos="fade-right">
        <!-- Icon visi dengan background secondary -->
        <div class="w-16 h-16 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-6">
          <i class="fas fa-eye text-secondary text-2xl"></i>
        </div>
        <!-- Judul visi -->
        <h3 class="text-xl sm:text-2xl font-bold text-primary mb-4">Visi</h3>
        <!-- Konten visi -->
        <p class="text-base sm:text-lg leading-relaxed text-gray-700">
          Menjadikan IT SPECTA sebagai wadah pengembangan kreativitas
          dan inovasi mahasiswa teknologi informasi yang terkemuka di
          tingkat nasional.
        </p>
      </div>

      <!-- Card misi dengan animasi fade-left -->
      <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-10 text-center card-hover" data-aos="fade-left">
        <!-- Icon misi dengan background primary -->
        <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
          <i class="fas fa-flag text-primary text-2xl"></i>
        </div>
        <!-- Judul misi -->
        <h3 class="text-xl sm:text-2xl font-bold text-primary mb-4">Misi</h3>
        <!-- Konten misi dalam format list -->
        <div class="text-left">
          <!-- Item misi pertama -->
          <div class="flex items-start gap-3 mb-3">
            <i class="fas fa-check-circle text-secondary mt-1 flex-shrink-0"></i>
            <span class="text-sm sm:text-base text-gray-700">Menyelenggarakan kegiatan yang mendorong eksplorasi dan pengembangan potensi mahasiswa.</span>
          </div>
          <!-- Item misi kedua -->
          <div class="flex items-start gap-3 mb-3">
            <i class="fas fa-check-circle text-secondary mt-1 flex-shrink-0"></i>
            <span class="text-sm sm:text-base text-gray-700">Membangun jaringan kerjasama dengan berbagai stakeholder di bidang teknologi informasi.</span>
          </div>
          <!-- Item misi ketiga -->
          <div class="flex items-start gap-3 mb-3">
            <i class="fas fa-check-circle text-secondary mt-1 flex-shrink-0"></i>
            <span class="text-sm sm:text-base text-gray-700">Menghadirkan sarana pembelajaran yang inovatif dan menyenangkan bagi peserta.</span>
          </div>
          <!-- Item misi keempat -->
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
<!-- Bagian timeline jadwal acara IT SPECTA -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8">
  <!-- Container dengan max width -->
  <div class="max-w-6xl mx-auto">
    <!-- Header timeline -->
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <!-- Badge event schedule -->
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Event Schedule</span>
      <!-- Judul timeline -->
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Timeline IT SPECTA 2025</h2>
      <!-- Garis dekoratif -->
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>

    <!-- Container timeline items -->
    <div class="space-y-6">
      <!-- Timeline item 1 - Pendaftaran Seminar -->
      <div class="bg-white rounded-2xl shadow-md p-6 card-hover" data-aos="fade-right">
        <div class="flex items-start gap-4">
          <!-- Nomor urut dengan background secondary -->
          <div class="w-12 h-12 rounded-full bg-secondary flex items-center justify-center text-white text-lg font-bold flex-shrink-0">1</div>
          <div>
            <!-- Tanggal acara -->
            <div class="text-sm text-gray-500 mb-1">1 - 25 April 2025</div>
            <!-- Judul acara -->
            <h3 class="text-lg font-semibold mb-2 text-primary">Pendaftaran Seminar Nasional</h3>
            <!-- Deskripsi acara -->
            <p class="text-gray-700 leading-relaxed">Pembukaan pendaftaran peserta Seminar Nasional IT SPECTA 2025.</p>
          </div>
        </div>
      </div>

      <!-- Timeline item 2 - Seminar Nasional -->
      <div class="bg-white rounded-2xl shadow-md p-6 card-hover" data-aos="fade-left">
        <div class="flex items-start gap-4">
          <!-- Nomor urut -->
          <div class="w-12 h-12 rounded-full bg-secondary flex items-center justify-center text-white text-lg font-bold flex-shrink-0">2</div>
          <div>
            <!-- Tanggal acara -->
            <div class="text-sm text-gray-500 mb-1">26 April 2025</div>
            <!-- Judul acara -->
            <h3 class="text-lg font-semibold mb-2 text-primary">Seminar Nasional</h3>
            <!-- Deskripsi acara dengan tema -->
            <p class="text-gray-700 leading-relaxed">
              Pelaksanaan Seminar Nasional dengan tema "Manusia vs Mesin siapa yang akan bertahan di era AI".
            </p>
          </div>
        </div>
      </div>

      <!-- Timeline item 3 - Kompetisi Akademik -->
      <div class="bg-white rounded-2xl shadow-md p-6 card-hover" data-aos="fade-right">
        <div class="flex items-start gap-4">
          <!-- Nomor urut -->
          <div class="w-12 h-12 rounded-full bg-secondary flex items-center justify-center text-white text-lg font-bold flex-shrink-0">3</div>
          <div>
            <!-- Tanggal acara -->
            <div class="text-sm text-gray-500 mb-1">10 - 26 Mei 2025</div>
            <!-- Judul acara -->
            <h3 class="text-lg font-semibold mb-2 text-primary">Kompetisi Akademik</h3>
            <!-- Deskripsi acara -->
            <p class="text-gray-700 leading-relaxed">
              Rangkaian kompetisi dalam bidang pemrograman dan UI/UX.
            </p>
          </div>
        </div>
      </div>

      <!-- Timeline item 4 - Kompetisi Non-Akademik -->
      <div class="bg-white rounded-2xl shadow-md p-6 card-hover" data-aos="fade-right">
        <div class="flex items-start gap-4">
          <!-- Nomor urut -->
          <div class="w-12 h-12 rounded-full bg-secondary flex items-center justify-center text-white text-lg font-bold flex-shrink-0">4</div>
          <div>
            <!-- Tanggal acara -->
            <div class="text-sm text-gray-500 mb-1">26 april - 26 mei 2025</div>
            <!-- Judul acara -->
            <h3 class="text-lg font-semibold mb-2 text-primary">Kompetisi Non-Akademik</h3>
            <!-- Deskripsi acara -->
            <p class="text-gray-700 leading-relaxed">
              Rangkaian kompetisi olahraga dan e-sports.
            </p>
          </div>
        </div>
      </div>

      <!-- Timeline item 5 - Fun Run & Closing -->
      <div class="bg-white rounded-2xl shadow-md p-6 card-hover" data-aos="fade-left">
        <div class="flex items-start gap-4">
          <!-- Nomor urut -->
          <div class="w-12 h-12 rounded-full bg-secondary flex items-center justify-center text-white text-lg font-bold flex-shrink-0">5</div>
          <div>
            <!-- Tanggal acara -->
            <div class="text-sm text-gray-500 mb-1">26 Mei 2025</div>
            <!-- Judul acara -->
            <h3 class="text-lg font-semibold mb-2 text-primary">Fun Run & Closing Ceremony</h3>
            <!-- Deskripsi acara penutup -->
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
<!-- Bagian profil tim penyelenggara -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 bg-gradient-to-b from-gray-50 to-white">
  <!-- Container dengan max width -->
  <div class="max-w-6xl mx-auto">
    <!-- Header team section -->
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <!-- Badge our team -->
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Our Team</span>
      <!-- Judul team -->
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Meet Our Team</h2>
      <!-- Garis dekoratif -->
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>

    <!-- Deskripsi team -->
    <p class="text-center text-base sm:text-lg leading-relaxed mb-10 text-gray-600">
      IT SPECTA 2025 diselenggarakan oleh mahasiswa Program Studi
      Teknologi Informasi UMY yang tergabung dalam kepanitiaan
      berikut:
    </p>

    <!-- Grid layout untuk profil team -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
      <!-- Card profil Wildan - Ketua Pelaksana -->
      <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="100">
        <!-- Container foto dengan hover effect -->
        <div class="relative overflow-hidden">
          <img src="assets/images/fotowildan.JPG" alt="Wildan Zuhair Pratama" class="w-full h-80 object-cover object-top transition-all duration-500 group-hover:scale-105" />
        </div>
        <!-- Informasi profil -->
        <div class="p-8 text-center">
          <!-- Nama lengkap -->
          <h3 class="text-lg sm:text-xl font-semibold mb-3 text-primary">Wildan Zuhair</h3>
          <!-- Jabatan -->
          <p class="text-gray-600 mb-6">Ketua Pelaksana</p>
          <!-- Link Instagram -->
          <a href="http://instagram.com/wldnprtmaa_" class="inline-flex items-center justify-center w-10 h-10 bg-secondary/10 rounded-full text-secondary hover:bg-secondary hover:text-white transition-all duration-300" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>
      
      <!-- Card profil Nabil - Wakil Ketua -->
      <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="200">
        <!-- Container foto -->
        <div class="relative overflow-hidden">
          <img src="assets/images/fotonabil.JPG" alt="Nabil Nasruddin" class="w-full h-80 object-cover object-top transition-all duration-500 group-hover:scale-105" />
        </div>
        <!-- Informasi profil -->
        <div class="p-8 text-center">
          <!-- Nama lengkap -->
          <h3 class="text-lg sm:text-xl font-semibold mb-3 text-primary">Nabil Nasruddin</h3>
          <!-- Jabatan -->
          <p class="text-gray-600 mb-6">Wakil Ketua</p>
          <!-- Link Instagram -->
          <a href="http://instagram.com/nabill.udin" class="inline-flex items-center justify-center w-10 h-10 bg-secondary/10 rounded-full text-secondary hover:bg-secondary hover:text-white transition-all duration-300" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>

      <!-- Card profil Nabila - Bendahara -->
      <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="300">
        <!-- Container foto -->
        <div class="relative overflow-hidden">
          <img src="assets/images/fotonabila.JPG" alt="Nabila Affifah" class="w-full h-80 object-cover object-top transition-all duration-500 group-hover:scale-105" />
        </div>
        <!-- Informasi profil -->
        <div class="p-8 text-center">
          <!-- Nama lengkap -->
          <h3 class="text-lg sm:text-xl font-semibold mb-3 text-primary">Nabila Affifah</h3>
          <!-- Jabatan -->
          <p class="text-gray-600 mb-6">Bendahara</p>
          <!-- Link Instagram -->
          <a href="http://instagram.com/nbla_zs" class="inline-flex items-center justify-center w-10 h-10 bg-secondary/10 rounded-full text-secondary hover:bg-secondary hover:text-white transition-all duration-300" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>

      <!-- Card profil Shihwa - Sekretaris -->
      <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="400">
        <!-- Container foto -->
        <div class="relative overflow-hidden">
          <img src="assets/images/fotomoza2.JPG" alt="Shihwa Moza Kastela" class="w-full h-80 object-cover object-top transition-all duration-500 group-hover:scale-105" />
        </div>
        <!-- Informasi profil -->
        <div class="p-8 text-center">
          <!-- Nama lengkap -->
          <h3 class="text-lg sm:text-xl font-semibold mb-3 text-primary">Shihwa Moza Kastela</h3>
          <!-- Jabatan -->
          <p class="text-gray-600 mb-6">Sekretaris</p>
          <!-- Link Instagram -->
          <a href="http://instagram.com/syihwamoza" class="inline-flex items-center justify-center w-10 h-10 bg-secondary/10 rounded-full text-secondary hover:bg-secondary hover:text-white transition-all duration-300" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php 
    // Memanggil file footer yang berisi bagian bawah HTML dan penutup.
    require 'templates/footer.php'; 
?>