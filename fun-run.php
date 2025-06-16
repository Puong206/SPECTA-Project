<?php
// Langkah 1: Panggil koneksi database dan fungsi
require 'php/db_connect.php';
require 'php/functions.php';

// Langkah 2: Tentukan ID untuk acara ini (misalnya, 2 untuk Fun Run)
$event_id = 2;

// Langkah 3: Ambil data acara dari database
$stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
$stmt->bind_param("i", $event_id);
$stmt->execute();
$result = $stmt->get_result();
$fun_run = $result->fetch_assoc();

// Jika acara tidak ditemukan, hentikan eksekusi
if (!$fun_run) {
    die("Acara tidak ditemukan.");
}

// Langkah 4: Panggil header setelah semua logika PHP selesai
require 'templates/header.php';
?>

<section class="py-24 px-4 relative mt-20 overflow-hidden">
  <div class="absolute inset-0 bg-gradient-radial from-[#1B4599] to-[#1D1C52] opacity-95"></div>
  <div class="absolute inset-0 bg-gradient-to-br from-secondary/5 via-primary/3 to-secondary/[0.03] pointer-events-none"></div>
  
  <div class="w-full max-w-6xl mx-auto py-10 relative z-10 text-center" data-aos="fade-up">
    <div class="mb-6 flex justify-center">
      <img src="assets/images/Logo FunRun.png" alt="Fun Run 5K" class="h-32 md:h-40 object-contain transition-all duration-500 hover:scale-105" />
    </div>
    
    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4"><?php echo escape_html($fun_run['name']); ?></h1>
    <p class="text-white/90 max-w-2xl mx-auto text-lg"><?php echo escape_html($fun_run['description']); ?></p>
  </div>
</section>

<section class="py-20 px-4 relative">
  <div class="max-w-6xl mx-auto">
    <div class="bg-white rounded-2xl shadow-xl p-8 md:p-10 mb-12" data-aos="fade-up">
        <h2 class="text-3xl md:text-4xl font-bold text-primary mb-6 text-center">Detail Acara</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-center">
            <div class="info-item">
                <i class="fas fa-calendar text-secondary text-3xl mb-3"></i>
                <h3 class="font-semibold text-lg mb-1">Tanggal</h3>
                <p class="text-gray-600"><?php echo date('d F Y', strtotime($fun_run['date'])); ?></p>
            </div>
            <div class="info-item">
                <i class="fas fa-clock text-secondary text-3xl mb-3"></i>
                <h3 class="font-semibold text-lg mb-1">Waktu</h3>
                <p class="text-gray-600">06.00 - 10.00 WIB</p>
            </div>
             <div class="info-item">
                <i class="fas fa-ticket-alt text-secondary text-3xl mb-3"></i>
                <h3 class="font-semibold text-lg mb-1">Biaya Pendaftaran</h3>
                <p class="text-gray-600">Rp <?php echo number_format($fun_run['price'], 0, ',', '.'); ?></p>
            </div>
        </div>
    </div>
  </div>
</section>

<section class="py-20 px-4 bg-gray-50">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-12" data-aos="fade-up">
      <h2 class="text-3xl font-bold text-gray-800">Rute Lari 5K</h2>
      <div class="h-1 w-24 bg-secondary mx-auto mt-4 rounded-full"></div>
    </div>
    
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8" data-aos="fade-up">
      <img src="assets/images/Rutefunrun.png" alt="Route Map" class="w-full h-auto object-contain" />
    </div>
  </div>
</section>
      
<section class="py-20 px-4" id="merchandise">
    </section>
      
<section class="py-20 px-4 bg-gray-50">
  <div class="max-w-4xl mx-auto text-center">
    <h2 class="text-3xl font-bold text-gray-800 mt-4 mb-6">Siap Berlari Bersama Kami?</h2>
    <p class="text-gray-600 max-w-2xl mx-auto mb-12">Segera daftarkan diri Anda dan jadilah bagian dari keseruan IT SPECTA Fun Run 2025!</p>
    
    <a href="php/handle_transaction.php?event_id=<?php echo $fun_run['id']; ?>&redirect=fun-run.php" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-secondary to-orange-500 text-white font-bold text-lg rounded-full shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
      <span>Daftar Fun Run Sekarang!</span>
      <i class="fas fa-arrow-right ml-3 transform transition-transform group-hover:translate-x-1"></i>
    </a>
  </div>
</section>

<?php
// Menutup koneksi database dan memanggil footer
$stmt->close();
$conn->close();
require 'templates/footer.php'; 
?>