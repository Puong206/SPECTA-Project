<?php 
    // Set variabel judul halaman untuk ditampilkan di header
    $page_title = 'Pendaftaran Berhasil';

    // Memanggil file header yang berisi struktur HTML bagian atas
    require 'templates/header.php'; 
?>

<!-- Container utama dengan gradient background dan centering content -->
<div class="min-h-[80vh] bg-gradient-to-br from-green-50 via-white to-blue-50 flex items-center justify-center py-8 px-4 mt-16">
    <!-- Container card dengan width maksimal -->
    <div class="relative max-w-xl w-full">
        <!-- Background decoration dengan rotasi dan opacity -->
        <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-blue-500 rounded-3xl transform rotate-3 opacity-10"></div>
        
        <!-- Main card -->
        <!-- Card utama dengan shadow, padding responsif, dan animasi AOS -->
        <div class="relative bg-white rounded-3xl shadow-2xl p-6 md:p-8 text-center border border-gray-100" data-aos="zoom-in" data-aos-duration="1000">
            <!-- Success animation container -->
            <!-- Container untuk animasi sukses -->
            <div class="relative mx-auto mb-6">
                <!-- Animated circles -->
                <!-- Lingkaran dengan animasi ping untuk efek visual -->
                <div class="absolute inset-0 rounded-full bg-green-100 animate-ping opacity-75 h-24 w-24 mx-auto"></div>
                <!-- Lingkaran utama dengan gradient dan shadow -->
                <div class="relative flex items-center justify-center h-24 w-24 rounded-full bg-gradient-to-r from-green-400 to-green-600 mx-auto shadow-lg">
                    <!-- Icon checkmark dengan animasi bounce -->
                    <i class="fas fa-check text-white text-4xl animate-bounce"></i>
                </div>
                <!-- Floating particles -->
                <!-- Partikel mengambang dengan posisi absolut dan animasi -->
                <div class="absolute top-0 left-0 w-3 h-3 bg-green-300 rounded-full animate-float opacity-60"></div>
                <div class="absolute top-6 right-2 w-2 h-2 bg-blue-300 rounded-full animate-float-delayed opacity-60"></div>
                <div class="absolute bottom-2 left-6 w-2 h-2 bg-yellow-300 rounded-full animate-float opacity-60"></div>
            </div>

            <!-- Content -->
            <!-- Konten utama dengan spacing -->
            <div class="space-y-4">
                <!-- Judul utama dengan gradient text -->
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent mb-3">
                    Pendaftaran Berhasil!
                </h1>
                
                <!-- Garis dekoratif dengan gradient -->
                <div class="w-20 h-1 bg-gradient-to-r from-green-400 to-blue-500 rounded-full mx-auto"></div>
                
                <!-- Pesan konfirmasi dengan styling responsif -->
                <p class="text-gray-600 text-base md:text-lg leading-relaxed max-w-md mx-auto">
                    Selamat! Data pendaftaran Anda telah berhasil disimpan. Kami akan menghubungi Anda segera untuk proses selanjutnya.
                </p>

                <!-- Additional info cards -->
                <!-- Grid untuk kartu informasi tambahan -->
                <div class="grid md:grid-cols-2 gap-3 mt-6">
                    <!-- Card email konfirmasi -->
                    <div class="bg-green-50 rounded-lg p-3 border border-green-100">
                        <!-- Icon email -->
                        <i class="fas fa-envelope text-green-600 text-xl mb-1"></i>
                        <!-- Teks informasi -->
                        <p class="text-xs text-green-700 font-medium">Email konfirmasi telah dikirim</p>
                    </div>
                    <!-- Card waktu proses -->
                    <div class="bg-blue-50 rounded-lg p-3 border border-blue-100">
                        <!-- Icon clock -->
                        <i class="fas fa-clock text-blue-600 text-xl mb-1"></i>
                        <!-- Teks informasi -->
                        <p class="text-xs text-blue-700 font-medium">Proses dalam 24 jam</p>
                    </div>
                </div>

                <!-- Action buttons -->
                <!-- Container untuk tombol aksi -->
                <div class="flex flex-col sm:flex-row gap-3 justify-center mt-6">
                    <!-- Tombol kembali ke beranda dengan hover effects -->
                    <a href="index.php" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-lg shadow-lg hover:from-green-600 hover:to-green-700 transform hover:scale-105 transition-all duration-300">
                        <!-- Icon home -->
                        <i class="fas fa-home mr-2"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Bottom decoration -->
        <!-- Dekorasi bagian bawah dengan link support -->
        <div class="text-center mt-4">
            <p class="text-gray-500 text-sm">
                Butuh bantuan? <a href="#" class="text-green-600 hover:text-green-700 font-medium">Hubungi Support</a>
            </p>
        </div>
    </div>
</div>

<!-- Custom animations -->
<!-- CSS kustom untuk animasi -->
<style>
/* Keyframe untuk animasi float */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

/* Keyframe untuk animasi float dengan delay */
@keyframes float-delayed {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
}

/* Class untuk animasi float */
.animate-float {
    animation: float 3s ease-in-out infinite;
}

/* Class untuk animasi float dengan delay */
.animate-float-delayed {
    animation: float-delayed 3s ease-in-out infinite 1s;
}
</style>

<?php 
    // Memanggil file footer yang berisi penutup struktur HTML.
    require 'templates/footer.php'; 
?>