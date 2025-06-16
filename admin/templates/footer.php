</div>
        </main>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebar = document.querySelector('.sidebar');
        const mobileOverlay = document.getElementById('mobileOverlay');

        function toggleMobileMenu() {
            sidebar.classList.toggle('active');
            mobileOverlay.classList.toggle('active');
        }

        mobileMenuBtn?.addEventListener('click', toggleMobileMenu);
        mobileOverlay?.addEventListener('click', toggleMobileMenu);

        // Table sorting functionality
        document.querySelectorAll('.sortable-header').forEach(header => {
            header.addEventListener('click', function() {
                const table = this.closest('table');
                const tbody = table.querySelector('tbody');
                const rows = Array.from(tbody.querySelectorAll('tr'));
                const columnIndex = Array.from(this.parentNode.children).indexOf(this);
                const dataType = this.getAttribute('data-type') || 'string';
                
                // Remove sorting classes from other headers
                table.querySelectorAll('.sortable-header').forEach(h => {
                    if (h !== this) {
                        h.classList.remove('asc', 'desc');
                    }
                });
                
                // Determine sort direction
                let isAsc = !this.classList.contains('asc');
                this.classList.remove('asc', 'desc');
                this.classList.add(isAsc ? 'asc' : 'desc');
                
                // Sort rows
                rows.sort((a, b) => {
                    const aVal = a.children[columnIndex].textContent.trim();
                    const bVal = b.children[columnIndex].textContent.trim();
                    
                    let comparison = 0;
                    if (dataType === 'number') {
                        comparison = parseFloat(aVal) - parseFloat(bVal);
                    } else {
                        comparison = aVal.localeCompare(bVal);
                    }
                    
                    return isAsc ? comparison : -comparison;
                });
                
                // Reorder rows in tbody
                rows.forEach(row => tbody.appendChild(row));
            });
        });
    </script>
</body>
</html>
<?php
// Flush the output buffer
ob_end_flush();
?>