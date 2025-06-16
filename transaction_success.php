<?php 
    // Set judul halaman untuk ditampilkan di header
    $page_title = 'Pendaftaran Berhasil';

    // Memanggil file header
    require 'templates/header.php'; 
?>

<div class="min-h-[80vh] bg-gradient-to-br from-green-50 via-white to-blue-50 flex items-center justify-center py-8 px-4 mt-16">
    <div class="relative max-w-xl w-full">
        <!-- Background decoration -->
        <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-blue-500 rounded-3xl transform rotate-3 opacity-10"></div>
        
        <!-- Main card -->
        <div class="relative bg-white rounded-3xl shadow-2xl p-6 md:p-8 text-center border border-gray-100" data-aos="zoom-in" data-aos-duration="1000">
            <!-- Success animation container -->
            <div class="relative mx-auto mb-6">
                <!-- Animated circles -->
                <div class="absolute inset-0 rounded-full bg-green-100 animate-ping opacity-75 h-24 w-24 mx-auto"></div>
                <div class="relative flex items-center justify-center h-24 w-24 rounded-full bg-gradient-to-r from-green-400 to-green-600 mx-auto shadow-lg">
                    <i class="fas fa-check text-white text-4xl animate-bounce"></i>
                </div>
                <!-- Floating particles -->
                <div class="absolute top-0 left-0 w-3 h-3 bg-green-300 rounded-full animate-float opacity-60"></div>
                <div class="absolute top-6 right-2 w-2 h-2 bg-blue-300 rounded-full animate-float-delayed opacity-60"></div>
                <div class="absolute bottom-2 left-6 w-2 h-2 bg-yellow-300 rounded-full animate-float opacity-60"></div>
            </div>

            <!-- Content -->
            <div class="space-y-4">
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent mb-3">
                    Pendaftaran Berhasil!
                </h1>
                
                <div class="w-20 h-1 bg-gradient-to-r from-green-400 to-blue-500 rounded-full mx-auto"></div>
                
                <p class="text-gray-600 text-base md:text-lg leading-relaxed max-w-md mx-auto">
                    Selamat! Data pendaftaran Anda telah berhasil disimpan. Kami akan menghubungi Anda segera untuk proses selanjutnya.
                </p>

                <!-- Additional info cards -->
                <div class="grid md:grid-cols-2 gap-3 mt-6">
                    <div class="bg-green-50 rounded-lg p-3 border border-green-100">
                        <i class="fas fa-envelope text-green-600 text-xl mb-1"></i>
                        <p class="text-xs text-green-700 font-medium">Email konfirmasi telah dikirim</p>
                    </div>
                    <div class="bg-blue-50 rounded-lg p-3 border border-blue-100">
                        <i class="fas fa-clock text-blue-600 text-xl mb-1"></i>
                        <p class="text-xs text-blue-700 font-medium">Proses dalam 24 jam</p>
                    </div>
                </div>

                <!-- Action buttons -->
                <div class="flex flex-col sm:flex-row gap-3 justify-center mt-6">
                    <a href="index.php" class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-lg shadow-lg hover:from-green-600 hover:to-green-700 transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-home mr-2"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Bottom decoration -->
        <div class="text-center mt-4">
            <p class="text-gray-500 text-sm">
                Butuh bantuan? <a href="#" class="text-green-600 hover:text-green-700 font-medium">Hubungi Support</a>
            </p>
        </div>
    </div>
</div>

<!-- Custom animations -->
<style>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

@keyframes float-delayed {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

.animate-float-delayed {
    animation: float-delayed 3s ease-in-out infinite 1s;
}
</style>

<?php 
    // Memanggil file footer.
    require 'templates/footer.php'; 
?>