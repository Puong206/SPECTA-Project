<?php
// Menentukan judul halaman untuk ditampilkan di tag <title> pada header
$page_title = 'Profile';

// Memanggil file header, yang juga akan memulai sesi
require 'templates/header.php';
// Memanggil file koneksi database
require 'php/db_connect.php';

// Redirect jika belum login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$message = '';
$error = '';

// Handle form submission untuk update username
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    $username = trim($_POST['username']);
    
    // Validasi input
    if (empty($username)) {
        $error = 'Username harus diisi!';
    } elseif (strlen($username) < 3) {
        $error = 'Username minimal 3 karakter!';
    } else {
        // Cek apakah username sudah digunakan user lain
        $check_stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND id != ?");
        $check_stmt->bind_param("si", $username, $user_id);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        
        if ($check_result->num_rows > 0) {
            $error = 'Username sudah digunakan oleh user lain!';
        } else {
            // Update username
            $stmt = $conn->prepare("UPDATE users SET username = ? WHERE id = ?");
            $stmt->bind_param("si", $username, $user_id);
            
            if ($stmt->execute()) {
                $message = 'Profile berhasil diperbarui!';
                $_SESSION['username'] = $username; // Update session
            } else {
                $error = 'Gagal memperbarui profile!';
            }
            $stmt->close();
        }
        $check_stmt->close();
    }
}

// Handle form submission untuk update password
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validasi input
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $error = 'Semua field password harus diisi!';
    } elseif (strlen($new_password) < 6) {
        $error = 'Password baru minimal 6 karakter!';
    } elseif ($new_password !== $confirm_password) {
        $error = 'Konfirmasi password tidak cocok!';
    } else {
        // Cek password lama
        $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user_data = $result->fetch_assoc();
        $stmt->close();
        
        if ($user_data && hash('sha256', $current_password) === $user_data['password']) {
            // Update password
            $hashed_new_password = hash('sha256', $new_password);
            $update_stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $update_stmt->bind_param("si", $hashed_new_password, $user_id);
            
            if ($update_stmt->execute()) {
                $message = 'Password berhasil diubah!';
            } else {
                $error = 'Gagal mengubah password!';
            }
            $update_stmt->close();
        } else {
            $error = 'Password lama tidak benar!';
        }
    }
}

// Ambil data user
$stmt = $conn->prepare("SELECT username, role, created_at FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
    header("Location: logout.php");
    exit();
}
?>

<!-- Decorative elements -->
<div class="fixed w-full h-full top-0 left-0 pointer-events-none z-0">
  <div class="absolute top-20 left-[10%] w-40 h-40 bg-primary/10 rounded-full filter blur-3xl"></div>
  <div class="absolute bottom-20 right-[5%] w-60 h-60 bg-secondary/10 rounded-full filter blur-3xl"></div>
</div>

<!-- Header Section -->
<section class="relative py-20 px-4 sm:px-6 md:px-8 bg-gradient-to-br from-primary/10 via-white to-secondary/10">
  <div class="max-w-4xl mx-auto text-center">
    <div class="mb-8" data-aos="fade-up">
      <div class="w-24 h-24 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center mx-auto mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
      </div>
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-800 mb-4">Profile Saya</h1>
      <p class="text-gray-600 text-lg">Kelola informasi akun Anda</p>
    </div>
  </div>
</section>

<!-- Profile Content -->
<section class="py-16 px-4 sm:px-6 md:px-8 relative">
  <div class="max-w-4xl mx-auto">
    
    <!-- Alert Messages -->
    <?php if ($message): ?>
    <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-700 rounded-lg" data-aos="fade-down">
      <div class="flex items-center">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
        </svg>
        <?php echo htmlspecialchars($message); ?>
      </div>
    </div>
    <?php endif; ?>

    <?php if ($error): ?>
    <div class="mb-6 p-4 bg-red-100 border border-red-300 text-red-700 rounded-lg" data-aos="fade-down">
      <div class="flex items-center">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
        </svg>
        <?php echo htmlspecialchars($error); ?>
      </div>
    </div>
    <?php endif; ?>

    <div class="grid md:grid-cols-3 gap-8">
      
      <!-- Profile Info Card -->
      <div class="md:col-span-1" data-aos="fade-right">
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
          <div class="text-center mb-6">
            <div class="w-20 h-20 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center mx-auto mb-4">
              <span class="text-2xl font-bold text-white"><?php echo strtoupper(substr($user['username'], 0, 1)); ?></span>
            </div>
            <h3 class="text-xl font-bold text-gray-800"><?php echo htmlspecialchars($user['username']); ?></h3>
            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold <?php echo $user['role'] === 'admin' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800'; ?>">
              <?php echo ucfirst($user['role']); ?>
            </span>
          </div>
          
          <div class="space-y-3">
            <div class="flex items-center text-sm text-gray-600">
              <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
              </svg>
              Username: <?php echo htmlspecialchars($user['username']); ?>
            </div>
            
            <div class="flex items-center text-sm text-gray-600">
              <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              Role: <?php echo ucfirst($user['role']); ?>
            </div>
            
            <div class="flex items-center text-sm text-gray-600">
              <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4m-9 4h10l-1 7h-8l-1-7z"></path>
              </svg>
              Bergabung: <?php echo date('d M Y', strtotime($user['created_at'])); ?>
            </div>
          </div>

          <!-- Additional Info Notice -->
          <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
            <div class="flex items-start">
              <svg class="w-5 h-5 text-blue-400 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <div>
                <h4 class="text-sm font-semibold text-blue-900 mb-1">Informasi Profile</h4>
                <p class="text-xs text-blue-700">Anda dapat mengubah username dan password. Fitur profile lengkap akan tersedia dalam update mendatang.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit Profile Form -->
      <div class="md:col-span-2" data-aos="fade-left">
        <div class="space-y-8">
          
          <!-- Edit Username Card -->
          <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Username</h2>
            
            <form method="POST" class="space-y-6">
              <div>
                <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">Username *</label>
                <input 
                  type="text" 
                  id="username" 
                  name="username" 
                  value="<?php echo htmlspecialchars($user['username']); ?>"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300"
                  required
                  minlength="3"
                  placeholder="Masukkan username baru"
                >
                <p class="text-xs text-gray-500 mt-1">Username minimal 3 karakter dan harus unik</p>
              </div>
              
              <!-- Read-only fields -->
              <div class="grid sm:grid-cols-2 gap-6">
                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">Role</label>
                  <input 
                    type="text" 
                    value="<?php echo ucfirst($user['role']); ?>"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg text-gray-600 cursor-not-allowed"
                    readonly
                  >
                </div>
                
                <div>
                  <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Bergabung</label>
                  <input 
                    type="text" 
                    value="<?php echo date('d M Y', strtotime($user['created_at'])); ?>"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg text-gray-600 cursor-not-allowed"
                    readonly
                  >
                </div>
              </div>
              
              <div class="flex flex-col sm:flex-row gap-4 pt-6">
                <button 
                  type="submit" 
                  name="update_profile"
                  class="flex-1 bg-gradient-to-r from-primary to-primary/90 text-white font-semibold py-3 px-6 rounded-lg hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex items-center justify-center group"
                >
                  <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                  </svg>
                  Update Username
                </button>
                
                <a 
                  href="index.php" 
                  class="flex-1 bg-gray-100 text-gray-700 font-semibold py-3 px-6 rounded-lg hover:bg-gray-200 transition-all duration-300 flex items-center justify-center"
                >
                  <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                  </svg>
                  Kembali ke Beranda
                </a>
              </div>
            </form>
          </div>

          <!-- Change Password Card -->
          <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
            <div class="flex items-center mb-6">
              <svg class="w-6 h-6 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
              </svg>
              <h2 class="text-2xl font-bold text-gray-800">Ubah Password</h2>
            </div>
            
            <form method="POST" class="space-y-6" id="changePasswordForm">
              <div>
                <label for="current_password" class="block text-sm font-semibold text-gray-700 mb-2">Password Lama *</label>
                <div class="relative">
                  <input 
                    type="password" 
                    id="current_password" 
                    name="current_password" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 pr-12"
                    required
                    placeholder="Masukkan password lama"
                  >
                  <button 
                    type="button" 
                    onclick="togglePassword('current_password')"
                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
                  >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                  </button>
                </div>
              </div>
              
              <div class="grid sm:grid-cols-2 gap-6">
                <div>
                  <label for="new_password" class="block text-sm font-semibold text-gray-700 mb-2">Password Baru *</label>
                  <div class="relative">
                    <input 
                      type="password" 
                      id="new_password" 
                      name="new_password" 
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 pr-12"
                      required
                      minlength="6"
                      placeholder="Minimal 6 karakter"
                    >
                    <button 
                      type="button" 
                      onclick="togglePassword('new_password')"
                      class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                      </svg>
                    </button>
                  </div>
                </div>
                
                <div>
                  <label for="confirm_password" class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password *</label>
                  <div class="relative">
                    <input 
                      type="password" 
                      id="confirm_password" 
                      name="confirm_password" 
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300 pr-12"
                      required
                      placeholder="Ketik ulang password baru"
                    >
                    <button 
                      type="button" 
                      onclick="togglePassword('confirm_password')"
                      class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
                    >
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>

              <!-- Password Requirements -->
              <div class="bg-gray-50 rounded-lg p-4">
                <h4 class="text-sm font-semibold text-gray-700 mb-2">Persyaratan Password:</h4>
                <ul class="text-xs text-gray-600 space-y-1">
                  <li class="flex items-center">
                    <svg class="w-3 h-3 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Minimal 6 karakter
                  </li>
                  <li class="flex items-center">
                    <svg class="w-3 h-3 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Konfirmasi password harus sama
                  </li>
                </ul>
              </div>
              
              <div class="pt-6">
                <button 
                  type="submit" 
                  name="change_password"
                  class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold py-3 px-6 rounded-lg hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex items-center justify-center group"
                >
                  <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                  </svg>
                  Ubah Password
                </button>
              </div>
            </form>
          </div>

          <!-- Additional Features Coming Soon -->
          <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
              <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
              </svg>
              Fitur Mendatang
            </h3>
            <ul class="space-y-2 text-sm text-gray-600">
              <li class="flex items-center">
                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                Upload foto profile
              </li>
              <li class="flex items-center">
                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                Informasi kontak dan universitas
              </li>
              <li class="flex items-center">
                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                Riwayat pendaftaran acara
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Scripts -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  // Initialize AOS
  AOS.init({
    duration: 1000,
    once: true,
    offset: 100
  });

  // Toggle password visibility
  function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
    input.setAttribute('type', type);
  }

  // Password validation
  document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
    const newPassword = document.getElementById('new_password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    
    if (newPassword !== confirmPassword) {
      e.preventDefault();
      alert('Konfirmasi password tidak cocok!');
      return false;
    }
    
    if (newPassword.length < 6) {
      e.preventDefault();
      alert('Password baru minimal 6 karakter!');
      return false;
    }
  });

  // Auto-hide alert messages
  setTimeout(function() {
    const alerts = document.querySelectorAll('.bg-green-100, .bg-red-100');
    alerts.forEach(function(alert) {
      alert.style.transition = 'opacity 0.5s ease-out';
      alert.style.opacity = '0';
      setTimeout(function() {
        alert.remove();
      }, 500);
    });
  }, 3000);
</script>

<?php
// Menutup koneksi database
if (isset($conn)) {
    $conn->close();
}

// Memanggil file footer
require 'templates/footer.php';
?>
