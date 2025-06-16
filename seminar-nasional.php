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

<section class="py-24 px-4 relative mt-20 overflow-hidden">
  <div class="absolute inset-0 bg-center bg-cover bg-no-repeat opacity-40 z-0" style="background-image: url('assets/images/SemNas Background.JPG');"></div>
  <div class="absolute inset-0 bg-gradient-to-br from-primary/20 via-white/10 to-secondary/20 backdrop-blur-sm z-10"></div>
  <div class="absolute inset-0 bg-white/10 backdrop-blur-lg z-15"></div>
  
  <div class="w-full max-w-6xl mx-auto py-10 relative z-30">
    <div class="text-center" data-aos="fade-up">
      <span class="bg-primary/10 text-primary px-4 py-1 rounded-full text-sm font-semibold uppercase">Event Highlight</span>
      
      <div class="mt-6 mb-6 flex justify-center">
        <img src="assets/images/Logo SemNas.png" alt="Seminar Nasional" class="h-32 md:h-40 object-contain transition-all duration-500 hover:scale-105" />
      </div>
      
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-800 mb-4"><?php echo escape_html($seminar['name']); ?></h1>
      <p class="text-gray-600 max-w-2xl mx-auto"><?php echo escape_html($seminar['description']); ?></p>
      <div class="h-1 w-24 bg-secondary mx-auto mt-6 rounded-full"></div>
    </div>
  </div>
</section>

<section class="py-20 px-4 relative">
  <div class="max-w-6xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
      <div class="bg-white p-6 rounded-xl shadow-md card-hover text-center">
        <div class="w-12 h-12 mx-auto rounded-full bg-primary/10 flex items-center justify-center mb-3">
          <i class="fas fa-calendar text-primary text-xl"></i>
        </div>
        <h3 class="font-semibold text-gray-800 mb-1">Tanggal</h3>
        <p class="text-gray-600"><?php echo date('d F Y', strtotime($seminar['date'])); ?></p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow-md card-hover text-center">
        <div class="w-12 h-12 mx-auto rounded-full bg-secondary/10 flex items-center justify-center mb-3">
          <i class="fas fa-clock text-secondary text-xl"></i>
        </div>
        <h3 class="font-semibold text-gray-800 mb-1">Waktu</h3>
        <p class="text-gray-600">08.00 - 12.00 WIB</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow-md card-hover text-center">
        <div class="w-12 h-12 mx-auto rounded-full bg-accent/10 flex items-center justify-center mb-3">
          <i class="fas fa-map-marker-alt text-accent text-xl"></i>
        </div>
        <h3 class="font-semibold text-gray-800 mb-1">Tempat</h3>
        <p class="text-gray-600">Ruang Sidang lt 5, AR Fachrudin B, UMY</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow-md card-hover text-center">
        <div class="w-12 h-12 mx-auto rounded-full bg-dark/10 flex items-center justify-center mb-3">
          <i class="fas fa-ticket-alt text-dark text-xl"></i>
        </div>
        <h3 class="font-semibold text-gray-800 mb-1">Biaya</h3>
        <p class="text-gray-600">Rp <?php echo number_format($seminar['price'], 0, ',', '.'); ?></p>
      </div>
    </div>
  </div>
</section>
      
<section class="py-20 px-4 bg-gray-50">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Pembicara Utama</h2>
        <div class="h-1 w-24 bg-secondary mx-auto rounded-full mb-12"></div>
        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden card-hover" data-aos="fade-up">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:flex-shrink-0 p-6">
                    <img class="h-48 w-48 object-cover rounded-full" src="assets/images/pembicara.png" alt="Speaker">
                </div>
                <div class="p-6 md:p-8 text-left">
                    <h3 class="text-2xl font-bold text-primary mb-1">Marcel Andrian Schevenco</h3>
                    <p class="text-secondary font-semibold text-lg mb-4">Founder DataSorcerers</p>
                    <p class="text-gray-700 leading-relaxed">Pakar Artificial Intelligence dan Machine Learning dengan pengalaman lebih dari 8 tahun di industri teknologi.</p>
                </div>
            </div>
        </div>
    </div>
</section>
      
<section class="py-20 px-4" id="merchandise">
    </section>
      
<section class="py-20 px-4 bg-gray-50">
  <div class="max-w-6xl mx-auto text-center">
    <h2 class="text-3xl font-bold text-gray-800 mt-4 mb-6">Pendaftaran Seminar</h2>
    <p class="text-gray-600 max-w-2xl mx-auto mb-12">Segera daftarkan diri Anda dan dapatkan insight terkini tentang teknologi dari para pembicara terbaik di bidangnya!</p>
    
    <a href="php/handle_transaction.php?event_id=<?php echo $seminar['id']; ?>&redirect=seminar-nasional.php" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-primary to-primary/90 text-white font-semibold rounded-full shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-1 group">
      <span>Daftar Sekarang (Rp <?php echo number_format($seminar['price'], 0, ',', '.'); ?>)</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform transition-all duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
      </svg>
    </a>
  </div>
</section>

<?php
// Menutup koneksi database dan memanggil footer
$stmt->close();
$conn->close();
require 'templates/footer.php'; 
?>