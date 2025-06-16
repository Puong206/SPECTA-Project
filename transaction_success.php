<?php 
    // Set judul halaman untuk ditampilkan di header
    $page_title = 'Pendaftaran Berhasil';

    // Memanggil file header
    require 'templates/header.php'; 
?>

<div class="flex items-center justify-center min-h-[60vh] bg-gray-100">
    <div class="text-center p-10 bg-white rounded-lg shadow-xl max-w-lg mx-auto" data-aos="zoom-in">
        <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-green-100 mb-6">
            <i class="fas fa-check text-green-600 text-5xl"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 mb-3">Pendaftaran Berhasil!</h1>
        <p class="text-gray-600 text-lg leading-relaxed mb-8">
            Terima kasih telah mendaftar. Data Anda telah kami catat. Silakan lakukan proses selanjutnya jika ada instruksi lebih lanjut.
        </p>
        <a href="index.php" class="inline-block px-8 py-3 bg-primary text-white font-semibold rounded-lg shadow-md hover:bg-primary/90 transition-all">
            Kembali ke Beranda
        </a>
    </div>
</div>


<?php 
    // Memanggil file footer.
    require 'templates/footer.php'; 
?>