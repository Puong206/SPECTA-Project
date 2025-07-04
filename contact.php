<?php 
    // Memanggil file header yang berisi bagian atas HTML dan navigasi
    require 'templates/header.php'; 
    
    // Periksa status dari URL untuk menampilkan notifikasi
    $status_message = '';
    $message_type = '';
    // Mengecek apakah parameter 'status' ada di URL
    if (isset($_GET['status'])) {
        // Jika status berhasil, set pesan sukses
        if ($_GET['status'] === 'success') {
            $status_message = 'Terima kasih! Pesan Anda telah berhasil terkirim.';
            $message_type = 'success';
        } else {
            // Jika status error, set pesan error
            $status_message = 'Maaf, terjadi kesalahan. Silakan coba lagi.';
            $message_type = 'error';
        }
    }
?>

<!-- Hero Section -->
<!-- Bagian hero dengan background gradient dan dekorasi -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 relative mt-16 sm:mt-18 md:mt-20 overflow-hidden">
  <!-- Background gradient radial yang diperkuat -->
  <div class="absolute inset-0 bg-gradient-radial from-[#1B4599] to-[#1D1C52] opacity-95"></div>
  
  <!-- Elemen dekoratif background -->
  <div class="absolute inset-0 bg-gradient-to-br from-secondary/5 via-primary/3 to-secondary/[0.03] pointer-events-none"></div>
  <!-- Lingkaran blur kiri atas dengan animasi pulse lambat -->
  <div class="absolute top-0 left-0 w-80 h-80 bg-secondary/5 rounded-full filter blur-3xl opacity-70 animate-pulse-slow"></div>
  <!-- Lingkaran blur kanan bawah -->
  <div class="absolute bottom-0 right-0 w-64 h-64 bg-primary/5 rounded-full filter blur-3xl opacity-70"></div>
  
  <!-- Container utama dengan z-index tinggi untuk konten -->
  <div class="w-full max-w-6xl mx-auto px-2 sm:px-4 md:px-5 py-6 sm:py-8 md:py-10 relative z-10">
    <!-- Header teks dengan animasi AOS fade-up -->
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up" data-aos-duration="800">
      <!-- Badge dengan background transparan putih -->
      <span class="bg-white/10 text-white px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Get In Touch</span>
      <!-- Judul utama dengan font size responsif -->
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4 mt-6">Contact Us</h1>
      <!-- Deskripsi dengan opacity untuk efek visual -->
      <p class="text-white/90 max-w-2xl mx-auto mt-4 text-sm sm:text-base">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
    </div>
  </div>
</section>

<!-- Contact Section -->
<!-- Bagian kontak utama dengan informasi dan form -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 relative">
  <!-- Container maksimal width dengan auto margin -->
  <div class="max-w-6xl mx-auto">
    <!-- Header section kontak -->
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <!-- Badge informasi kontak -->
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Contact Information</span>
      <!-- Judul section kontak -->
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Hubungi Kami</h2>
      <!-- Garis dekoratif horizontal -->
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>
      
    <!-- Grid layout untuk informasi kontak dan form -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-12">
      <!-- Contact Information -->
      <!-- Kolom informasi kontak dengan animasi fade-right -->
      <div class="space-y-6" data-aos="fade-right">
        <!-- Card informasi lokasi -->
        <div class="bg-white rounded-2xl shadow-md p-6 card-hover">
          <div class="flex items-start gap-4">
            <!-- Icon container dengan background primary -->
            <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
              <i class="fas fa-map-marker-alt text-primary text-lg"></i>
            </div>
            <!-- Konten informasi lokasi -->
            <div>
              <h3 class="text-lg font-semibold text-primary mb-2">Lokasi</h3>
              <p class="text-gray-700">Gedung Siti Walidah, F4 Lt.2<br>Kampus Terpadu UMY<br>JL. Brawijaya, Kasihan, Bantul<br>Yogyakarta 55183</p>
            </div>
          </div>
        </div>
        
        <!-- Card informasi telepon -->
        <div class="bg-white rounded-2xl shadow-md p-6 card-hover">
          <div class="flex items-start gap-4">
            <!-- Icon container dengan background secondary -->
            <div class="w-12 h-12 bg-secondary/10 rounded-full flex items-center justify-center flex-shrink-0">
              <i class="fas fa-phone-alt text-secondary text-lg"></i>
            </div>
            <!-- Konten informasi telepon -->
            <div>
              <h3 class="text-lg font-semibold text-primary mb-2">Telepon</h3>
              <p class="text-gray-700">+62 812-2937-4264 (Wildan)</p>
              <p class="text-gray-700">+62 857-0604-3234 (Admin IT Specta)</p>
            </div>
          </div>
        </div>
        
        <!-- Card informasi email -->
        <div class="bg-white rounded-2xl shadow-md p-6 card-hover">
          <div class="flex items-start gap-4">
            <!-- Icon container dengan background accent -->
            <div class="w-12 h-12 bg-accent/10 rounded-full flex items-center justify-center flex-shrink-0">
              <i class="fas fa-envelope text-accent text-lg"></i>
            </div>
            <!-- Konten informasi email -->
            <div>
              <h3 class="text-lg font-semibold text-primary mb-2">Email</h3>
              <p class="text-gray-700">itspecta8@gmail.com</p>
            </div>
          </div>
        </div>
        
        <!-- Card informasi jam kerja -->
        <div class="bg-white rounded-2xl shadow-md p-6 card-hover">
          <div class="flex items-start gap-4">
            <!-- Icon container dengan background dark -->
            <div class="w-12 h-12 bg-dark/10 rounded-full flex items-center justify-center flex-shrink-0">
              <i class="fas fa-clock text-dark text-lg"></i>
            </div>
            <!-- Konten informasi jam kerja -->
            <div>
              <h3 class="text-lg font-semibold text-primary mb-2">Jam Kerja</h3>
              <p class="text-gray-700">Senin - Jumat: 09:00 - 16:00</p>
              <p class="text-gray-700">Sabtu: 09:00 - 12:00</p>
            </div>
          </div>
        </div>
        
        <!-- Card social media -->
        <div class="bg-white rounded-2xl shadow-md p-6 card-hover">
          <!-- Judul social media -->
          <h3 class="text-lg font-semibold text-primary mb-4">Social Media</h3>
          <!-- Container link social media -->
          <div class="flex gap-4">
            <!-- Link Instagram dengan gradient background -->
            <a href="http://instagram.com/it_specta" class="w-12 h-12 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full flex items-center justify-center text-white hover:scale-110 transition-transform duration-300" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-instagram text-lg"></i>
            </a>
            <!-- Link TikTok dengan background hitam -->
            <a href="https://www.tiktok.com/@itspecta?_t=ZS-8x36eI5eblx&_r=1" class="w-12 h-12 bg-gray-900 rounded-full flex items-center justify-center text-white hover:scale-110 transition-transform duration-300" target="_blank" rel="noopener noreferrer">
              <i class="fab fa-tiktok text-lg"></i>
            </a>
          </div>
        </div>
      </div>
        
      <!-- Contact Form -->
      <!-- Kolom form kontak dengan animasi fade-left -->
      <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-10 card-hover" data-aos="fade-left">
        <!-- Judul form -->
        <h3 class="text-xl sm:text-2xl font-bold text-primary mb-6">Kirim Pesan</h3>
        
        <!-- Menampilkan pesan status jika ada -->
        <?php if ($status_message): ?>
            <!-- Alert box dengan styling kondisional berdasarkan tipe pesan -->
            <div class="p-4 mb-6 text-sm rounded-lg <?php echo $message_type === 'success' ? 'bg-green-100 text-green-700 border border-green-200' : 'bg-red-100 text-red-700 border border-red-200'; ?>">
                <?php echo $status_message; ?>
            </div>
        <?php endif; ?>

        <!-- Form kontak dengan method POST -->
        <form action="php/contact_process.php" method="POST" class="space-y-6">
          <!-- Field nama lengkap -->
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
            <input type="text" id="name" name="name" required class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300">
          </div>
          
          <!-- Field email -->
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input type="email" id="email" name="email" required class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300">
          </div>
          
          <!-- Field nomor telepon (opsional) -->
          <div>
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
            <input type="tel" id="phone" name="phone" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300">
          </div>
          
          <!-- Field subjek -->
          <div>
            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
            <input type="text" id="subject" name="subject" required class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300">
          </div>
          
          <!-- Field pesan dengan textarea -->
          <div>
            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
            <textarea id="message" name="message" rows="5" required class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-300 resize-none"></textarea>
          </div>
          
          <!-- Tombol submit dengan gradient background -->
          <button type="submit" class="w-full bg-gradient-to-r from-primary to-primary/90 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
            Kirim Pesan
          </button>
        </form>
      </div>
    </div>
  </div>
</section>
  
<!-- Map Section -->
<!-- Bagian peta lokasi dengan background gradient -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8 bg-gradient-to-b from-gray-50 to-white">
  <!-- Container dengan max width -->
  <div class="max-w-6xl mx-auto">
    <!-- Header section peta -->
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <!-- Badge find us -->
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">Find Us</span>
      <!-- Judul section peta -->
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Lokasi Kami</h2>
      <!-- Garis dekoratif -->
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>
      
    <!-- Container peta dengan shadow -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden" data-aos="fade-up">
      <!-- Embed Google Maps dengan parameter lokasi UMY -->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.92729348984!2d110.3213983153549!3d-7.797534679468973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a576574f558d9%3A0x4e6cf13a936b8505!2sUniversitas%20Muhammadiyah%20Yogyakarta!5e0!3m2!1sen!2sid!4v1623336522345!5m2!1sen!2sid" 
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</section>
  
<!-- FAQ Section -->
<!-- Bagian frequently asked questions -->
<section class="py-16 sm:py-20 md:py-24 px-4 sm:px-6 md:px-8">
  <!-- Container dengan max width -->
  <div class="max-w-6xl mx-auto">
    <!-- Header FAQ -->
    <div class="text-center mb-12 sm:mb-16" data-aos="fade-up">
      <!-- Badge FAQ -->
      <span class="bg-primary/10 text-primary px-3 sm:px-4 py-1 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider">FAQ</span>
      <!-- Judul FAQ -->
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mt-4 mb-6">Frequently Asked Questions</h2>
      <!-- Garis dekoratif -->
      <div class="h-1 w-16 sm:w-24 bg-secondary mx-auto rounded-full"></div>
    </div>
      
    <!-- Container FAQ items dengan max width -->
    <div class="max-w-3xl mx-auto space-y-4">
      <!-- FAQ item pertama -->
      <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden" data-aos="fade-up">
        <!-- Pertanyaan FAQ dengan cursor pointer -->
        <div class="faq-question bg-gray-50 p-6 cursor-pointer flex justify-between items-center hover:bg-gray-100 transition-colors duration-300">
          <h3 class="text-lg font-semibold text-gray-800">Apa itu IT SPECTA?</h3>
          <!-- Toggle icon untuk expand/collapse -->
          <span class="faq-toggle text-primary"><i class="fas fa-plus text-xl"></i></span>
        </div>
        <!-- Jawaban FAQ dengan animasi height -->
        <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300">
          <p class="p-6 text-gray-700 leading-relaxed">IT SPECTA adalah kegiatan tahunan Program Studi Teknologi Informasi UMY untuk merayakan ulang tahun prodi. Kegiatan ini terdiri dari seminar nasional, kompetisi akademik dan non-akademik, serta fun run.</p>
        </div>
      </div>
      
      <!-- FAQ item kedua -->
      <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden" data-aos="fade-up">
        <!-- Pertanyaan FAQ -->
        <div class="faq-question bg-gray-50 p-6 cursor-pointer flex justify-between items-center hover:bg-gray-100 transition-colors duration-300">
          <h3 class="text-lg font-semibold text-gray-800">Bagaimana cara mendaftar untuk Seminar Nasional?</h3>
          <!-- Toggle icon -->
          <span class="faq-toggle text-primary"><i class="fas fa-plus text-xl"></i></span>
        </div>
        <!-- Jawaban FAQ -->
        <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300">
           <p class="p-6 text-gray-700 leading-relaxed">Pendaftaran untuk Seminar Nasional dapat dilakukan melalui website resmi IT SPECTA. Silakan kunjungi halaman Seminar Nasional dan ikuti petunjuk pendaftaran yang tersedia. Pendaftaran akan dibuka mulai 1 Januari 2025.</p>
        </div>
      </div>
      
      <!-- FAQ item ketiga -->
      <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden" data-aos="fade-up">
        <!-- Pertanyaan FAQ -->
        <div class="faq-question bg-gray-50 p-6 cursor-pointer flex justify-between items-center hover:bg-gray-100 transition-colors duration-300">
          <h3 class="text-lg font-semibold text-gray-800">Apakah ada biaya untuk mengikuti Fun Run?</h3>
          <!-- Toggle icon -->
          <span class="faq-toggle text-primary"><i class="fas fa-plus text-xl"></i></span>
        </div>
        <!-- Jawaban FAQ -->
        <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300">
           <p class="p-6 text-gray-700 leading-relaxed">Ya, terdapat biaya pendaftaran untuk mengikuti Fun Run. Biaya untuk Early bird adalah Rp 150.000, sedangkan normal sale adalah Rp 180.000. Biaya ini sudah termasuk jersey, medali, dan merchandise lainnya.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CSS Styles -->
<style>
/* Hover effect untuk card */
.card-hover {
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Transformasi saat hover */
.card-hover:hover {
  transform: translateY(-8px) scale(1.02);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

/* Style untuk FAQ item yang aktif */
.faq-item.active .faq-question {
  background-color: rgba(9, 56, 128, 0.05);
}

/* Keyframe untuk animasi pulse lambat */
@keyframes pulse-slow {
  0%, 100% {
    opacity: 0.7;
  }
  50% {
    opacity: 0.9;
  }
}

/* Class untuk animasi pulse lambat */
.animate-pulse-slow {
  animation: pulse-slow 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}
</style>

<script>
// Event listener saat DOM selesai dimuat
document.addEventListener('DOMContentLoaded', function() {
  // FAQ functionality
  // Ambil semua elemen FAQ
  const faqItems = document.querySelectorAll('.faq-item');
  
  // Loop untuk setiap FAQ item
  faqItems.forEach(item => {
    // Ambil elemen pertanyaan
    const question = item.querySelector('.faq-question');
    
    // Event listener untuk klik pada pertanyaan
    question.addEventListener('click', () => {
      // Cek apakah item saat ini sedang aktif
      const currentlyActive = item.classList.contains('active');
      
      // Tutup semua FAQ items terlebih dahulu
      faqItems.forEach(otherItem => {
        // Hapus class active
        otherItem.classList.remove('active');
        // Reset max height jawaban
        otherItem.querySelector('.faq-answer').style.maxHeight = null;
        // Ubah icon menjadi plus
        otherItem.querySelector('.faq-toggle i').className = 'fas fa-plus';
      });
      
      // Jika item tidak aktif sebelumnya, buka
      if (!currentlyActive) {
        // Tambah class active
        item.classList.add('active');
        // Ambil elemen jawaban
        const answer = item.querySelector('.faq-answer');
        // Set max height sesuai scroll height
        answer.style.maxHeight = answer.scrollHeight + 'px';
        // Ubah icon menjadi minus
        item.querySelector('.faq-toggle i').className = 'fas fa-minus';
      }
    });
  });
});
</script>

<?php 
    // Memanggil file footer yang berisi penutup HTML.
    require 'templates/footer.php'; 
?>