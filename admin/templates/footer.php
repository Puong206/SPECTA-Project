</div>
        </main>
    </div>

    <script>
        // Fungsi toggle menu mobile
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebar = document.querySelector('.sidebar');
        const mobileOverlay = document.getElementById('mobileOverlay');

        // Fungsi untuk membuka/menutup menu mobile
        function toggleMobileMenu() {
            sidebar.classList.toggle('active');
            mobileOverlay.classList.toggle('active');
        }

        // Event listener untuk tombol menu mobile
        mobileMenuBtn?.addEventListener('click', toggleMobileMenu);
        // Event listener untuk overlay (klik di luar sidebar untuk menutup)
        mobileOverlay?.addEventListener('click', toggleMobileMenu);

        // Fungsi sorting tabel yang dapat diurutkan
        document.querySelectorAll('.sortable-header').forEach(header => {
            header.addEventListener('click', function() {
                // Mendapatkan referensi tabel dan tbody
                const table = this.closest('table');
                const tbody = table.querySelector('tbody');
                const rows = Array.from(tbody.querySelectorAll('tr'));
                const columnIndex = Array.from(this.parentNode.children).indexOf(this);
                const dataType = this.getAttribute('data-type') || 'string';
                
                // Menghapus class sorting dari header lain
                table.querySelectorAll('.sortable-header').forEach(h => {
                    if (h !== this) {
                        h.classList.remove('asc', 'desc');
                    }
                });
                
                // Menentukan arah sorting (ascending/descending)
                let isAsc = !this.classList.contains('asc');
                this.classList.remove('asc', 'desc');
                this.classList.add(isAsc ? 'asc' : 'desc');
                
                // Mengurutkan baris berdasarkan konten kolom
                rows.sort((a, b) => {
                    const aVal = a.children[columnIndex].textContent.trim();
                    const bVal = b.children[columnIndex].textContent.trim();
                    
                    let comparison = 0;
                    // Sorting berdasarkan tipe data (number atau string)
                    if (dataType === 'number') {
                        comparison = parseFloat(aVal) - parseFloat(bVal);
                    } else {
                        comparison = aVal.localeCompare(bVal);
                    }
                    
                    // Mengembalikan hasil sorting sesuai arah (asc/desc)
                    return isAsc ? comparison : -comparison;
                });
                
                // Mengurutkan ulang baris di dalam tbody
                rows.forEach(row => tbody.appendChild(row));
            });
        });
    </script>
</body>
</html>
<?php
// Mengosongkan dan mengirim output buffer
ob_end_flush();
?>