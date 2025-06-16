<?php 
    // Memanggil file header
    require 'templates/header.php'; 
    
    // Periksa status dari URL untuk menampilkan notifikasi
    $status_message = '';
    $message_type = '';
    if (isset($_GET['status'])) {
        if ($_GET['status'] === 'success') {
            $status_message = 'Terima kasih! Pesan Anda telah berhasil terkirim.';
            $message_type = 'success';
        } else {
            $status_message = 'Maaf, terjadi kesalahan. Silakan coba lagi.';
            $message_type = 'error';
        }
    }
?>

<section class="py-24 px-4 relative mt-20 overflow-hidden bg-gradient-radial from-[#1B4599] to-[#1D1C52]">
  <div class="w-full max-w-6xl mx-auto py-10 relative z-10 text-center" data-aos="fade-up">
    <span class="bg-white/10 text-white px-4 py-1 rounded-full text-sm font-semibold uppercase">Get In Touch</span>
    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4 mt-6">Contact Us</h1>
    <p class="text-white/90 max-w-2xl mx-auto">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
  </div>
</section>

<section class="py-20 px-4 relative">
  <div class="max-w-6xl mx-auto">
    <div class="text-center mb-16" data-aos="fade-up">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Hubungi Kami</h2>
      <div class="h-1 w-24 bg-secondary mx-auto mt-4 rounded-full"></div>
    </div>
        
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      <div class="space-y-6" data-aos="fade-right">
        <div class="bg-white rounded-2xl shadow-md p-6 flex items-start gap-4">
            <i class="fas fa-map-marker-alt text-primary text-2xl mt-1"></i>
            <div>
                <h3 class="text-lg font-semibold text-primary mb-1">Lokasi</h3>
                <p class="text-gray-700">Gedung Siti Walidah, F4 Lt.2 Kampus Terpadu UMY<br>JL. Brawijaya, Kasihan, Bantul, Yogyakarta 55183</p>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-md p-6 flex items-start gap-4">
            <i class="fas fa-phone-alt text-primary text-2xl mt-1"></i>
            <div>
                <h3 class="text-lg font-semibold text-primary mb-1">Telepon</h3>
                <p class="text-gray-700">+62 812-2937-4264 (Wildan)</p>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-md p-6 flex items-start gap-4">
            <i class="fas fa-envelope text-primary text-2xl mt-1"></i>
            <div>
                <h3 class="text-lg font-semibold text-primary mb-1">Email</h3>
                <p class="text-gray-700">itspecta8@gmail.com</p>
            </div>
        </div>
      </div>
          
      <div class="bg-white rounded-2xl shadow-xl p-8" data-aos="fade-left" id="contactForm">
        <h3 class="text-2xl font-bold text-primary mb-6">Kirim Pesan</h3>
        
        <?php if ($status_message): ?>
            <div class="p-4 mb-4 text-sm rounded-lg <?php echo $message_type === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
                <?php echo $status_message; ?>
            </div>
        <?php endif; ?>

        <form action="php/contact_process.php" method="POST" class="space-y-6">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
            <input type="text" id="name" name="name" required class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary">
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input type="email" id="email" name="email" required class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary">
          </div>
          <div>
            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
            <input type="text" id="subject" name="subject" required class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary">
          </div>
          <div>
            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
            <textarea id="message" name="message" rows="5" required class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary resize-none"></textarea>
          </div>
          <button type="submit" class="w-full bg-primary text-white font-semibold py-3 rounded-lg shadow-md hover:bg-primary/90 transition-all">
            Kirim Pesan
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

<?php 
    // Memanggil file footer.
    require 'templates/footer.php'; 
?>