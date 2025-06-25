<?php
// Langkah 1: Panggil file koneksi database dan fungsi helper
require 'php/db_connect.php';
require 'php/functions.php';

// Langkah 2: Tentukan ID untuk acara ini (2 untuk Fun Run)
$event_id = 2;

// Langkah 3: Ambil data acara dari database menggunakan prepared statement
$stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
$stmt->bind_param("i", $event_id);
$stmt->execute();
$result = $stmt->get_result();
$fun_run = $result->fetch_assoc();

// Jika acara tidak ditemukan, hentikan eksekusi dengan pesan error
if (!$fun_run) {
    die("Acara tidak ditemukan.");
}

// Langkah 4: Panggil header setelah semua logika PHP selesai
require 'templates/header.php';
?>

<!-- Hero Section with dark theme -->
<!-- Section hero dengan tema gelap dan gradient -->
<section class="py-8 sm:py-12 md:py-16 px-4 sm:px-6 md:px-8 relative mt-16 sm:mt-18 md:mt-20 overflow-hidden">
  <!-- Enhanced background with radial gradient -->
  <!-- Background gradient radial yang diperkuat -->
  <div class="absolute inset-0 bg-gradient-radial from-[#1B4599] to-[#1D1C52] opacity-95"></div>
  
  <!-- Decorative background elements -->
  <!-- Elemen dekoratif background dengan gradient -->
  <div class="absolute inset-0 bg-gradient-to-br from-secondary/5 via-primary/3 to-secondary/[0.03] pointer-events-none"></div>
  <!-- Lingkaran blur animasi di kiri atas -->
  <div class="absolute top-0 left-0 w-80 h-80 bg-secondary/5 rounded-full filter blur-3xl opacity-70 animate-pulse-slow"></div>
  <!-- Lingkaran blur di kanan bawah -->
  <div class="absolute bottom-0 right-0 w-64 h-64 bg-primary/5 rounded-full filter blur-3xl opacity-70"></div>
  
  <!-- Decorative running tracks -->
  <!-- Garis dekoratif seperti track lari -->
  <div class="absolute left-0 right-0 h-1 bg-white/20 top-20 rounded-full"></div>
  <div class="absolute left-0 right-0 h-1 bg-white/20 bottom-20 rounded-full"></div>
  
  <!-- Container konten utama -->
  <div class="w-full max-w-6xl mx-auto px-2 sm:px-4 md:px-5 py-2 sm:py-4 md:py-6 relative z-10 top-5">
    <!-- Section header -->
    <!-- Header section dengan animasi AOS -->
    <div class="text-center mb-8 sm:mb-12" data-aos="fade-up" data-aos-duration="800">
      <!-- Badge container dengan garis dan teks -->
      <div class="inline-flex items-center gap-2 mb-6">
        <span class="bg-white/10 text-white px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider animate-pulse-slow">Event Highlight</span>
        <span class="h-px w-10 bg-white/30"></span>
        <span class="text-xs text-white/70 font-medium uppercase">5K Race</span>
      </div>
      
      <!-- Fun Run Logo -->
      <!-- Logo Fun Run dengan hover effect -->
      <div class="mb-6 flex justify-center" data-aos-delay="100">
        <img src="assets/images/Logo FunRun.png" alt="Fun Run 5K" class="h-24 sm:h-32 md:h-40 object-contain transition-all duration-500 hover:scale-105" />
      </div>
      
      <!-- Judul dari database dengan escape HTML -->
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4"><?php echo escape_html($fun_run['name']); ?></h1>
      <!-- Deskripsi dari database dengan escape HTML -->
      <p class="text-white/90 max-w-2xl mx-auto mt-4 text-sm sm:text-base"><?php echo escape_html($fun_run['description']); ?></p>
      <!-- Garis dekoratif dengan berbagai ukuran -->
      <div class="flex gap-2 justify-center mt-4" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
        <div class="h-1 w-3 bg-white/50 rounded-full"></div>
        <div class="h-1 w-12 bg-white rounded-full"></div>
        <div class="h-1 w-3 bg-white/50 rounded-full"></div>
      </div>
    </div>
  </div>
</section>

<!-- Event Info Section -->
<!-- Section informasi acara dengan background putih -->
<section class="py-8 sm:py-12 md:py-16 px-4 sm:px-6 md:px-8 relative">
  <div class="max-w-6xl mx-auto">
    <!-- Event highlights -->
    <!-- Sorotan acara dalam bentuk badge -->
    <div class="flex flex-wrap gap-3 sm:gap-4 md:gap-6 justify-center mb-12">
      <div class="flex items-center gap-2 sm:gap-3 bg-white backdrop-blur-sm px-3 sm:px-4 py-2 rounded-full shadow-sm text-sm sm:text-base border border-gray-200" data-aos="fade-up" data-aos-delay="150">
        <div class="w-6 h-6 sm:w-8 sm:h-8 rounded-full bg-primary/20 flex items-center justify-center text-primary text-xs sm:text-sm">
          <i class="fas fa-calendar"></i>
        </div>
        <span class="text-gray-800"><?php echo date('d F Y', strtotime($fun_run['date'])); ?></span>
      </div>
      <div class="flex items-center gap-2 sm:gap-3 bg-white backdrop-blur-sm px-3 sm:px-4 py-2 rounded-full shadow-sm text-sm sm:text-base border border-gray-200" data-aos="fade-up" data-aos-delay="200">
        <div class="w-6 h-6 sm:w-8 sm:h-8 rounded-full bg-secondary/20 flex items-center justify-center text-secondary text-xs sm:text-sm">
          <i class="fas fa-clock"></i>
        </div>
        <span class="text-gray-800">06.00 - 10.00 WIB</span>
      </div>
      <div class="flex items-center gap-2 sm:gap-3 bg-white backdrop-blur-sm px-3 sm:px-4 py-2 rounded-full shadow-sm text-sm sm:text-base border border-gray-200" data-aos="fade-up" data-aos-delay="250">
        <div class="w-6 h-6 sm:w-8 sm:h-8 rounded-full bg-accent/20 flex items-center justify-center text-accent text-xs sm:text-sm">
          <i class="fas fa-running"></i>
        </div>
        <span class="text-gray-800">5K Distance</span>
      </div>
    </div>

    <!-- About Section -->
    <!-- Section tentang acara dengan elemen dekoratif -->
    <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-10 relative overflow-hidden group mb-12" data-aos="fade-up">
      <!-- Decorative elements -->
      <!-- Elemen dekoratif di belakang teks -->
      <div class="absolute -top-24 -right-24 w-48 h-48 rounded-full bg-secondary/10 group-hover:bg-secondary/20 transition-all duration-500"></div>
      <div class="absolute -bottom-20 -left-20 w-40 h-40 rounded-full bg-primary/10 group-hover:bg-primary/20 transition-all duration-500"></div>
      
      <div class="relative">
        <!-- Judul tentang Fun Run -->
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-primary mb-6">Tentang Fun Run</h2>
        <!-- Deskripsi tentang Fun Run -->
        <p class="text-gray-700 text-base sm:text-lg leading-relaxed">
          Fun Run IT SPECTA 2025 adalah rangkaian acara penutup dari seluruh kegiatan IT SPECTA tahun ini. Acara lari santai berjarak 5K ini terbuka untuk umum dan bertujuan untuk mempromosikan gaya hidup sehat serta mempererat hubungan antar peserta dalam suasana yang menyenangkan.
        </p>
      </div>
    </div>

    <!-- Event Details Grid -->
    <!-- Grid untuk menampilkan detail acara seperti lokasi dan biaya -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-12">
      <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md card-hover">
        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-primary/10 flex items-center justify-center mb-3 sm:mb-4">
          <i class="fas fa-map-marker-alt text-primary text-sm sm:text-base"></i>
        </div>
        <h3 class="font-semibold text-gray-800 text-sm sm:text-base mb-2">Start/Finish</h3>
        <p class="text-xs sm:text-sm text-gray-600">Parkiran Gedung F4, Fakultas Teknik, UMY</p>
      </div>
      <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md card-hover">
        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-secondary/10 flex items-center justify-center mb-3 sm:mb-4">
          <i class="fas fa-ticket-alt text-secondary text-sm sm:text-base"></i>
        </div>
        <h3 class="font-semibold text-gray-800 text-sm sm:text-base mb-2">Biaya Early Bird</h3>
        <p class="text-xs sm:text-sm text-gray-600">Rp 150.000</p>
      </div>
      <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md card-hover">
        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-accent/10 flex items-center justify-center mb-3 sm:mb-4">
          <i class="fas fa-ticket-alt text-accent text-sm sm:text-base"></i>
        </div>
        <h3 class="font-semibold text-gray-800 text-sm sm:text-base mb-2">Biaya Normal</h3>
        <p class="text-xs sm:text-sm text-gray-600">Rp <?php echo number_format($fun_run['price'], 0, ',', '.'); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- Route Map Section -->
<!-- Section peta rute dengan background gradient -->
<section class="py-8 sm:py-12 md:py-16 px-4 sm:px-6 md:px-8 bg-gradient-to-b from-gray-50 to-white">
  <div class="max-w-6xl mx-auto">
    <!-- Judul section peta rute -->
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Race Route</span>
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Rute Lari</h2>
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>
    
    <!-- Gambar peta rute dengan fallback image -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8" data-aos="fade-up" data-aos-delay="100">
      <img src="assets/images/Rutefunrun.png" alt="Route Map" class="w-full h-auto object-contain" onerror="this.src='https://via.placeholder.com/800x400?text=Route+Map'" />
    </div>
    
    <!-- Deskripsi rute dengan elemen dekoratif -->
    <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-10 relative overflow-hidden group" data-aos="fade-up" data-aos-delay="200">
      <div class="relative">
        <p class="text-gray-700 text-base sm:text-lg leading-relaxed mb-4">
          Rute dimulai dari parkiran gedung F4 kemudian memutari kampus melalui lapangan basket, kemudian keluar melalui pintu utara, dan kemudian keluar mengelilingi jalanan di sekitar kampus dan kembali ke venue finish melalui pintu gerbang selatan UMY.
        </p>
        <p class="text-gray-700 text-base sm:text-lg leading-relaxed">
          Sepanjang rute akan disediakan 1 water station di kilo meter 2,5 untuk memastikan para peserta tetap terhidrasi selama kegiatan berlangsung.
        </p>
      </div>
    </div>
  </div>
</section>
  
<!-- Merchandise Section -->
<!-- Section merchandise dengan penjelasan dan grid produk -->
<section class="py-8 sm:py-12 md:py-16 px-4 sm:px-6 md:px-8" id="merchandise">
  <div class="max-w-6xl mx-auto">
    <!-- Judul section merchandise -->
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Exclusive Items</span>
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Merchandise</h2>
      <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base mb-6">Setiap peserta Fun Run akan mendapatkan merchandise eksklusif berikut ini:</p>
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>
    
    <!-- Enhanced merchandise display -->
    <!-- Tampilan merchandise dalam grid dengan efek hover -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 md:gap-8 px-2 sm:px-4">
      <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
        <div class="relative h-80 overflow-hidden bg-gray-50">
          <img class="w-full h-full object-contain transition-all duration-500 group-hover:scale-105" src="assets/images/Bag.png" alt="Drawstring Bag" />
        </div>
        <div class="p-6">
          <div class="text-primary text-lg sm:text-xl font-bold text-center">Drawstring Bag</div>
          <div class="text-gray-500 text-xs sm:text-sm mt-1 sm:mt-2 text-center">Lightweight and durable</div>
        </div>
      </div>

      <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="200">
        <div class="relative h-80 overflow-hidden bg-gray-50">
          <div class="w-full h-full grid grid-cols-2">
            <div class="overflow-hidden">
              <img class="w-full h-full object-contain transition-all duration-700 group-hover:opacity-0 p-2" src="assets/images/JerseyF.png" alt="Jersey Front" />
              <img class="w-full h-full object-contain transition-all duration-700 absolute top-0 left-0 opacity-0 group-hover:opacity-100 p-2" src="assets/images/JerseyB.png" alt="Jersey Back" />
            </div>
            <div class="overflow-hidden">
              <img class="w-full h-full object-contain transition-all duration-700 group-hover:opacity-0 p-2" src="assets/images/JerseyB.png" alt="Jersey Back" />
              <img class="w-full h-full object-contain transition-all duration-700 absolute top-0 right-0 opacity-0 group-hover:opacity-100 p-2" src="assets/images/JerseyF.png" alt="Jersey Front" />
            </div>
          </div>
        </div>
        <div class="p-6">
          <div class="text-primary text-lg sm:text-xl font-bold text-center">Race Jersey</div>
          <div class="text-gray-500 text-xs sm:text-sm mt-1 sm:mt-2 text-center">High-performance fabric</div>
        </div>
      </div>

      <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
        <div class="relative h-80 overflow-hidden bg-gray-50">
          <img class="w-full h-full object-contain transition-all duration-500 group-hover:scale-110 group-hover:rotate-12" src="assets/images/Medal.png" alt="Medal" />
        </div>
        <div class="p-6">
          <div class="text-primary text-lg sm:text-xl font-bold text-center">Finisher Medal</div>
          <div class="text-gray-500 text-xs sm:text-sm mt-1 sm:mt-2 text-center">Commemorative medal</div>
        </div>
      </div>

      <div class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="400">
        <div class="relative h-80 overflow-hidden bg-gray-50">
          <img class="w-full h-full object-contain transition-all duration-500 group-hover:scale-105" src="assets/images/BIB2.png" alt="BIB" />
        </div>
        <div class="p-6">
          <div class="text-primary text-lg sm:text-xl font-bold text-center">Race BIB</div>
          <div class="text-gray-500 text-xs sm:text-sm mt-1 sm:mt-2 text-center">Official race number</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Categories Section -->
<!-- Section kategori dengan background gradient -->
<section class="py-8 sm:py-12 md:py-16 px-4 sm:px-6 md:px-8 bg-gradient-to-b from-gray-50 to-white">
  <div class="max-w-6xl mx-auto">
    <!-- Judul section kategori -->
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Race Category</span>
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Kategori</h2>
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>
    
    <!-- Kategori umum untuk semua kalangan -->
    <div class="max-w-2xl mx-auto">
      <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="100">
        <div class="p-6 md:p-8 text-center">
          <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-users text-primary text-2xl"></i>
          </div>
          <h3 class="text-2xl sm:text-3xl font-bold text-primary mb-4">Umum</h3>
          <p class="text-gray-700 text-base sm:text-lg leading-relaxed">Funrun IT SPECTA 2025 hadir dengan kategori umum, yang mana funrun ini dapat diikuti oleh semua kalangan tanpa batasan usia dan gender.</p>
        </div>
      </div>
    </div>
  </div>
</section>
  
<!-- Registration Section -->
<!-- Section pendaftaran dengan background gradient -->
<section class="py-8 sm:py-12 md:py-16 px-4 sm:px-6 md:px-8 bg-gradient-to-b from-primary/5 to-transparent">
  <div class="max-w-6xl mx-auto">
    <!-- Judul section pendaftaran -->
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Join Us</span>
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Pendaftaran</h2>
      <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base mb-6">Segera daftarkan diri Anda untuk mengikuti Fun Run IT SPECTA 2025 dan nikmati keseruan lari bersama sambil mendapatkan merchandise eksklusif!</p>
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>
    
    <div class="max-w-4xl mx-auto">
      <!-- Langkah-langkah pendaftaran dalam grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
        <div class="bg-white p-6 rounded-xl shadow-md card-hover" data-aos="fade-right" data-aos-delay="100">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center font-bold text-lg">1</div>
            <h3 class="text-primary text-lg font-semibold">Kunjungi Situs Yesplis</h3>
          </div>
          <p class="text-gray-600">Cari Funrun ITSPECTA 2025 di browser anda</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md card-hover" data-aos="fade-right" data-aos-delay="150">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center font-bold text-lg">2</div>
            <h3 class="text-primary text-lg font-semibold">Isi Formulir Pendaftaran</h3>
          </div>
          <p class="text-gray-600">Lengkapi data diri pada formulir pendaftaran online</p>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow-md card-hover" data-aos="fade-right" data-aos-delay="200">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center font-bold text-lg">3</div>
            <h3 class="text-primary text-lg font-semibold">Lakukan Pembayaran</h3>
          </div>
          <p class="text-gray-600">Transfer biaya pendaftaran ke rekening yang tertera</p>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow-md card-hover" data-aos="fade-right" data-aos-delay="250">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center font-bold text-lg">4</div>
            <h3 class="text-primary text-lg font-semibold">Konfirmasi Pembayaran</h3>
          </div>
          <p class="text-gray-600">Kirim bukti pembayaran ke contact person</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md card-hover md:col-span-2" data-aos="fade-right" data-aos-delay="300">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center font-bold text-lg">5</div>
            <h3 class="text-primary text-lg font-semibold">Ambil Race Pack</h3>
          </div>
          <p class="text-gray-600">Ambil race pack di titik distribusi yang telah ditentukan</p>
        </div>
      </div
      
      <!-- CTA button dengan link ke handler transaksi -->
      <div class="text-center">
        <a href="php/handle_transaction.php?event_id=<?php echo $fun_run['id']; ?>&redirect=fun-run.php" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-primary to-primary/90 text-white font-semibold rounded-full shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-1 group">
          <span>Daftar Sekarang</span>
          <!-- SVG arrow dengan animasi group hover -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform transition-all duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
          </svg>
        </a>
      </div>
    </div>
  </div>
</section>
        
<?php
// Menutup statement dan koneksi database
$stmt->close();
$conn->close();

// Memanggil file footer untuk penutup struktur HTML.
require 'templates/footer.php';
?>