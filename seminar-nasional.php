<?php
// Langkah 1: Panggil koneksi database dan fungsi
require 'php/db_connect.php';
require 'php/functions.php';

// Langkah 2: Tentukan ID untuk acara ini (misalnya, 1 untuk Seminar Nasional)
$event_id = 1;

// Langkah 3: Ambil data acara dari database
$stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
$stmt->bind_param("i", $event_id);
$stmt->execute();
$result = $stmt->get_result();
$seminar = $result->fetch_assoc();

// Jika acara tidak ditemukan, hentikan eksekusi
if (!$seminar) {
    die("Acara tidak ditemukan.");
}

// Langkah 4: Panggil header setelah semua logika PHP selesai
require 'templates/header.php';
?>

<!-- Hero Section with glassmorphism -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 relative mt-16 sm:mt-18 md:mt-20 overflow-hidden">
  <!-- Background image -->
  <div class="absolute inset-0 bg-center bg-cover bg-no-repeat opacity-40 z-0" style="background-image: url('assets/images/SemNas Background.JPG');"></div>
  
  <!-- Glassmorphism layers -->
  <div class="absolute inset-0 bg-gradient-to-br from-primary/20 via-white/10 to-secondary/20 backdrop-blur-sm z-10"></div>
  <div class="absolute inset-0 bg-white/10 backdrop-blur-lg z-15"></div>
  
  <!-- Glass border and shadow effects -->
  <div class="absolute inset-0 border border-white/20 shadow-2xl z-20"></div>
  
  <!-- Decorative background elements with glass effect -->
  <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-primary/[0.03] pointer-events-none z-25"></div>
  <div class="absolute top-0 right-0 w-80 h-80 bg-primary/15 rounded-full filter blur-3xl opacity-70 backdrop-blur-sm z-25"></div>
  <div class="absolute bottom-0 left-0 w-64 h-64 bg-secondary/15 rounded-full filter blur-3xl opacity-70 backdrop-blur-sm z-25"></div>
  
  <!-- Additional glass elements -->
  <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-white/5 rounded-full filter blur-xl opacity-60 z-25"></div>
  <div class="absolute bottom-1/3 right-1/3 w-24 h-24 bg-white/5 rounded-full filter blur-xl opacity-60 z-25"></div>
  
  <div class="w-full max-w-6xl mx-auto px-2 sm:px-4 md:px-5 py-6 sm:py-8 md:py-10 relative z-30">
    <!-- Section header -->
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up" data-aos-duration="800">
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Event Highlight</span>
      
      <!-- Seminar Nasional Logo -->
      <div class="mt-6 mb-6 flex justify-center" data-aos-delay="100">
        <img src="assets/images/Logo SemNas.png" alt="Seminar Nasional" class="h-24 sm:h-32 md:h-40 object-contain transition-all duration-500 hover:scale-105" />
      </div>
      
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-800 mb-4">Seminar Nasional IT SPECTA 2025</h1>
      <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base">Expand your knowledge with industry experts discussing the latest tech trends</p>
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto mt-4 sm:mt-6 mb-2 rounded-full" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200"></div>
    </div>
  </div>
</section>

<!-- Event Info Section -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 relative">
  <div class="max-w-6xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-12">
      <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md card-hover">
        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-primary/10 flex items-center justify-center mb-3 sm:mb-4">
          <i class="fas fa-calendar text-primary text-sm sm:text-base"></i>
        </div>
        <h3 class="font-semibold text-gray-800 text-sm sm:text-base mb-2">Tanggal</h3>
        <p class="text-xs sm:text-sm text-gray-600"><?php echo $seminar ? date('d F Y', strtotime($seminar['date'])) : '26 April 2025'; ?></p>
      </div>
      <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md card-hover">
        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-secondary/10 flex items-center justify-center mb-3 sm:mb-4">
          <i class="fas fa-clock text-secondary text-sm sm:text-base"></i>
        </div>
        <h3 class="font-semibold text-gray-800 text-sm sm:text-base mb-2">Waktu</h3>
        <p class="text-xs sm:text-sm text-gray-600">08.00 - 12.00 WIB</p>
      </div>
      <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md card-hover">
        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-accent/10 flex items-center justify-center mb-3 sm:mb-4">
          <i class="fas fa-map-marker-alt text-accent text-sm sm:text-base"></i>
        </div>
        <h3 class="font-semibold text-gray-800 text-sm sm:text-base mb-2">Tempat</h3>
        <p class="text-xs sm:text-sm text-gray-600">Ruang Sidang lt 5, AR Fachrudin B, UMY</p>
      </div>
      <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md card-hover">
        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-dark/10 flex items-center justify-center mb-3 sm:mb-4">
          <i class="fas fa-ticket-alt text-dark text-sm sm:text-base"></i>
        </div>
        <h3 class="font-semibold text-gray-800 text-sm sm:text-base mb-2">Biaya</h3>
        <p class="text-xs sm:text-sm text-gray-600">Rp<?php echo $seminar ? number_format($seminar['price'], 0, ',', '.') : '25.000'; ?></p>
      </div>
    </div>

    <!-- About Section -->
    <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-10 relative overflow-hidden group" data-aos="fade-up">
      <!-- Decorative elements -->
      <div class="absolute -top-24 -right-24 w-48 h-48 rounded-full bg-secondary/10 group-hover:bg-secondary/20 transition-all duration-500"></div>
      <div class="absolute -bottom-20 -left-20 w-40 h-40 rounded-full bg-primary/10 group-hover:bg-primary/20 transition-all duration-500"></div>
      
      <div class="relative">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-primary mb-6">Tentang Seminar</h2>
        <p class="text-gray-700 text-base sm:text-lg leading-relaxed">
          Seminar Nasional IT SPECTA 2025 merupakan rangkaian acara pembuka dari seluruh kegiatan IT SPECTA tahun ini. Seminar ini akan menghadirkan pembicara-pembicara ternama di bidang teknologi informasi dan memberikan wawasan mengenai perkembangan teknologi terkini.
        </p>
      </div>
    </div>
  </div>
</section>
  
<!-- Speakers Section -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 bg-gradient-to-b from-gray-50 to-white">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Keynote Speaker</span>
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Pembicara</h2>
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>
    
    <div class="max-w-4xl mx-auto">
      <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover" data-aos="fade-up" data-aos-delay="100">
        <div class="flex flex-col md:flex-row">
          <div class="md:flex-shrink-0 flex justify-center p-6">
            <img class="h-48 w-48 object-cover rounded-xl" src="assets/images/pembicara.png" alt="Speaker" onerror="this.src='https://via.placeholder.com/300x300?text=Speaker+1'">
          </div>
          <div class="p-6 md:p-8 flex-1">
            <h3 class="text-2xl sm:text-3xl font-bold text-primary mb-2">Marcel Andrian Schevenco</h3>
            <p class="text-secondary font-semibold text-lg mb-4">Founder DataSorcerers</p>
            <p class="text-gray-700 text-base sm:text-lg leading-relaxed">Pakar Artificial Intelligence dan Machine Learning dengan pengalaman lebih dari 8 tahun di industri teknologi.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  
<!-- Merchandise Section -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8" id="merchandise">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Exclusive Items</span>
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Merchandise</h2>
      <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base mb-6">Dapatkan merchandise eksklusif Seminar Nasional IT SPECTA 2025 berikut ini:</p>
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>
    
    <!-- Enhanced merchandise carousel -->
    <div class="relative px-2 sm:px-4 md:px-10">
      <!-- Carousel container -->
      <div class="w-full overflow-x-auto pb-4 flex gap-4 sm:gap-6 md:gap-8 scroll-smooth relative snap-x snap-mandatory">
        <div class="swipe-item flex-none w-56 sm:w-64 md:w-72 snap-start snap-always">
          <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-lg hover:shadow-xl transition-all duration-500 h-full flex flex-col card-hover">
            <div class="overflow-hidden rounded-xl mb-4 sm:mb-6 flex-grow flex items-center justify-center bg-gray-50 relative group">
              <div class="absolute inset-0 bg-gradient-to-br from-primary/30 to-secondary/30 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
              <img class="h-48 sm:h-56 object-contain transition-all duration-500 group-hover:scale-110" src="assets/images/Workshirt.png" alt="Workshirt" />
            </div>
            <div class="text-primary text-lg sm:text-xl font-bold group-hover:text-secondary transition-colors duration-300 text-center">Workshirt</div>
            <div class="text-gray-500 text-xs sm:text-sm mt-1 sm:mt-2 text-center">Exclusive design for seminar participants</div>
          </div>
        </div>
        
        <div class="swipe-item flex-none w-56 sm:w-64 md:w-72 snap-start snap-always">
          <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-lg hover:shadow-xl transition-all duration-500 h-full flex flex-col card-hover">
            <div class="overflow-hidden rounded-xl mb-4 sm:mb-6 flex-grow flex items-center justify-center bg-gray-50 relative group">
              <div class="absolute inset-0 bg-gradient-to-br from-primary/30 to-secondary/30 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
              <img class="h-48 sm:h-56 object-contain transition-all duration-500 group-hover:scale-110" src="assets/images/Notebook.png" alt="Notebook" />
            </div>
            <div class="text-primary text-lg sm:text-xl font-bold group-hover:text-secondary transition-colors duration-300 text-center">Notebook</div>
            <div class="text-gray-500 text-xs sm:text-sm mt-1 sm:mt-2 text-center">Premium notebook for your ideas</div>
          </div>
        </div>
        
        <div class="swipe-item flex-none w-56 sm:w-64 md:w-72 snap-start snap-always">
          <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-lg hover:shadow-xl transition-all duration-500 h-full flex flex-col card-hover">
            <div class="overflow-hidden rounded-xl mb-4 sm:mb-6 flex-grow flex items-center justify-center bg-gray-50 relative group">
              <div class="absolute inset-0 bg-gradient-to-br from-primary/30 to-secondary/30 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
              <img class="h-48 sm:h-56 object-contain transition-all duration-500 group-hover:scale-110" src="assets/images/Tumblr.png" alt="Tumbler" />
            </div>
            <div class="text-primary text-lg sm:text-xl font-bold group-hover:text-secondary transition-colors duration-300 text-center">Tumbler</div>
            <div class="text-gray-500 text-xs sm:text-sm mt-1 sm:mt-2 text-center">Eco-friendly hydration companion</div>
          </div>
        </div>
        
        <div class="swipe-item flex-none w-56 sm:w-64 md:w-72 snap-start snap-always">
          <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-lg hover:shadow-xl transition-all duration-500 h-full flex flex-col card-hover">
            <div class="overflow-hidden rounded-xl mb-4 sm:mb-6 flex-grow flex items-center justify-center bg-gray-50 relative group">
              <div class="absolute inset-0 bg-gradient-to-br from-primary/30 to-secondary/30 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
              <img class="h-48 sm:h-56 object-contain transition-all duration-500 group-hover:scale-110" src="assets/images/Pulpen.png" alt="Pen" />
            </div>
            <div class="text-primary text-lg sm:text-xl font-bold group-hover:text-secondary transition-colors duration-300 text-center">Pen</div>
            <div class="text-gray-500 text-xs sm:text-sm mt-1 sm:mt-2 text-center">Smooth writing experience</div>
          </div>
        </div>
        
        <div class="swipe-item flex-none w-56 sm:w-64 md:w-72 snap-start snap-always">
          <div class="bg-white rounded-2xl p-4 sm:p-6 shadow-lg hover:shadow-xl transition-all duration-500 h-full flex flex-col card-hover">
            <div class="overflow-hidden rounded-xl mb-4 sm:mb-6 flex-grow flex items-center justify-center bg-gray-50 relative group">
              <div class="absolute inset-0 bg-gradient-to-br from-primary/30 to-secondary/30 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
              <img class="h-48 sm:h-56 object-contain transition-all duration-500 group-hover:scale-110" src="assets/images/Plakat.png" alt="Plakat" />
            </div>
            <div class="text-primary text-lg sm:text-xl font-bold group-hover:text-secondary transition-colors duration-300 text-center">Plakat</div>
            <div class="text-gray-500 text-xs sm:text-sm mt-1 sm:mt-2 text-center">Commemorative award for speakers</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  
<!-- Registration Section -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 bg-gradient-to-b from-primary/5 to-transparent">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Join Us</span>
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Pendaftaran</h2>
      <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base mb-6">Segera daftarkan diri Anda untuk mengikuti Seminar Nasional IT SPECTA 2025 dan dapatkan insight terkini tentang teknologi dari para pembicara terbaik di bidangnya!</p>
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>
    
    <div class="max-w-4xl mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
        <div class="bg-white p-6 rounded-xl shadow-md card-hover" data-aos="fade-right" data-aos-delay="100">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center font-bold text-lg">1</div>
            <h3 class="text-primary text-lg font-semibold">Kunjungi Link Pendaftaran</h3>
          </div>
          <p class="text-gray-600">Kunjungi Link Pendaftaran Seminar Nasional ITSPECTA 2025</p>
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
      </div>
      
      <div class="text-center">
        <a href="php/handle_transaction.php?event_id=<?php echo $seminar['id']; ?>&redirect=seminar-nasional.php" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-primary to-primary/90 text-white font-semibold rounded-full shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-1 group">
          <span>Daftar Sekarang</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform transition-all duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
          </svg>
        </a>
      </div>
    </div>
  </div>
</section>

<?php
// Menutup koneksi database
if (isset($stmt)) {
    $stmt->close();
}
if (isset($conn)) {
    $conn->close();
}

// Memanggil file footer.
require 'templates/footer.php';
?>