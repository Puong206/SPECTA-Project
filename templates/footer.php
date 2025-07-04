<!-- Footer dengan gradient background dan informasi kontak -->
<footer class="bg-gradient-to-br from-secondary to-[#d9700c] text-white relative w-full py-12 px-4">
          <div class="max-w-5xl mx-auto text-center">
            <!-- Logo IT SPECTA di footer -->
            <img class="w-20 mx-auto transition-transform duration-300 hover:scale-110" src="assets/images/Logo.png" alt="IT SPECTA Logo"/>
            <!-- Judul utama -->
            <h2 class="text-4xl font-bold my-4">IT SPECTA</h2>
            <p class="text-xl font-bold mb-6">For more information:</p>

            <!-- Kontainer untuk link media sosial -->
            <div class="flex justify-center items-center gap-10 mb-8">
              <!-- Link WhatsApp -->
              <a href="#" class="flex flex-col items-center hover:text-gray-200">
                <img class="w-10 mb-2" src="assets/images/WA.png" alt="WhatsApp"/>
                <span>0812-3456-7890</span>
              </a>
              <!-- Link Instagram -->
              <a href="#" class="flex flex-col items-center hover:text-gray-200">
                <img class="w-10 mb-2" src="assets/images/IG.png" alt="Instagram"/>
                <span>@it_specta</span>
              </a>
              <!-- Link YouTube -->
              <a href="#" class="flex flex-col items-center hover:text-gray-200">
                <img class="w-10 mb-2" src="assets/images/YT.png" alt="YouTube"/>
                <span>IT SPECTA UMY</span>
              </a>
            </div>

            <!-- Alamat kampus -->
            <p class="max-w-xl mx-auto my-8">
              Gedung Siti Walidah, F4 Lt.2 Kampus Terpadu UMY<br />
              JL. Brawijaya, Kasihan, Bantul, Yogyakarta 55183
            </p>
          </div>
        </footer>
      </div>
    </div>

    <!-- Library AOS (Animate On Scroll) untuk animasi -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!-- JavaScript kustom -->
    <script src="assets/js/script.js"></script>
    <script>
      // Inisialisasi AOS dengan opsi once: true (animasi hanya sekali)
      AOS.init({ once: true });

      // Fungsi untuk toggle menu mobile
      function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
      }
    </script>
  </body>
</html>