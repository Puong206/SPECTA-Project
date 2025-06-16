<?php
// Start output buffering to prevent header issues
ob_start();

// Memastikan file ini dipanggil dari file lain yang sudah memuat koneksi db dan fungsi
if (!isset($conn)) {
    require_once '../php/db_connect.php';
}
if (!function_exists('check_admin')) {
    require_once '../php/functions.php';
}

// Security check: Hanya admin yang boleh mengakses
check_admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Admin Dashboard'; ?> - IT SPECTA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#093880",
              secondary: "#eb8317",
              accent: "#41c7c7",
              dark: "#0a1f33",
            },
            animation: {
              fadeInDown: "fadeInDown 1.2s ease-out",
              fadeInUp: "fadeInUp 1.2s ease-out",
              fadeIn: "fadeIn 1s forwards",
              "pulse-slow": "pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite",
              float: "float 3s ease-in-out infinite",
              shimmer: "shimmer 2s linear infinite",
              "spin-slow": "spin 6s linear infinite",
              slideIn: "slideIn 0.3s ease-out",
            },
            keyframes: {
              fadeInDown: {
                from: { opacity: "0", transform: "translateY(-30px)" },
                to: { opacity: "1", transform: "translateY(0)" },
              },
              fadeInUp: {
                from: { opacity: "0", transform: "translateY(30px)" },
                to: { opacity: "1", transform: "translateY(0)" },
              },
              fadeIn: {
                to: { opacity: "1", transform: "translateY(0)" },
              },
              float: {
                "0%, 100%": { transform: "translateY(0)" },
                "50%": { transform: "translateY(-10px)" },
              },
              shimmer: {
                "0%": { backgroundPosition: "-200% 0" },
                "100%": { backgroundPosition: "200% 0" },
              },
              slideIn: {
                "0%": { transform: "translateX(-100%)" },
                "100%": { transform: "translateX(0)" },
              },
            },
            backgroundImage: {
              "gradient-radial": "radial-gradient(var(--tw-gradient-stops))",
              noise:
                "url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMDAiIGhlaWdodD0iMzAwIj4NCiAgPGZpbHRlciBpZD0ibm9pc2UiIHg9IjAiIHk9IjAiPg0KICAgIDxmZVR1cmJ1bGVuY2UgYmFzZUZyZXF1ZW5jeT0iLjc1IiBzdGl0Y2hUaWxlcz0ic3RpdGNoIiB0eXBlPSJmcmFjdGFsTm9pc2UiLz4NCiAgICA8ZmVDb2xvck1hdHJpeCB0eXBlPSJzYXR1cmF0ZSIgdmFsdWVzPSIwIi8+DQogIDwvZmlsdGVyPg0KICA8cmVjdCB3aWR0aD0iMzAwIiBoZWlnaHQ9IjMwMCIgZmlsdGVyPSJ1cmwoI25vaXNlKSIgb3BhY2l0eT0iMC4wOCIvPg0KPC9zdmc+Lg==')",
            },
          },
        },
      };
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link rel="icon" href="../assets/images/logo.png" type="image/png" />
    <style>
        .glass-effect {
            backdrop-filter: blur(12px);
            background: rgba(9, 56, 128, 0.95);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-link {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 10px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
            overflow: hidden;
        }
        
        .sidebar-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 0;
            height: 100%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.1), transparent);
            transition: width 0.3s ease;
        }
        
        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            color: white;
        }
        
        .sidebar-link:hover::before {
            width: 100%;
        }
        
        .sidebar-link.active {
            background: linear-gradient(135deg, #eb8317, #d97706);
            color: white;
            font-weight: 600;
            box-shadow: 0 6px 20px rgba(235, 131, 23, 0.3);
        }
        
        .sidebar-link i {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }
        
        .admin-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 24px;
            margin-bottom: 24px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .admin-container:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }
        
        .admin-header {
            font-size: 28px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 2px solid #f3f4f6;
            padding-bottom: 16px;
        }
        
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-4px) scale(1.01);
            box-shadow: 0 16px 32px rgba(0, 0, 0, 0.1);
        }
        
        /* Admin Form Styling */
        .admin-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            background: white;
            transition: all 0.2s ease;
            font-size: 14px;
        }
        
        .admin-input:focus {
            outline: none;
            border-color: #093880;
            box-shadow: 0 0 0 3px rgba(9, 56, 128, 0.1);
            transform: scale(1.01);
        }
        
        /* Admin Button Styling */
        .admin-button {
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }
        
        .admin-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        
        .admin-button-primary {
            background: linear-gradient(135deg, #093880, #0f4c99);
            color: white;
        }
        
        .admin-button-success {
            background: linear-gradient(135deg, #059669, #10b981);
            color: white;
        }
        
        .admin-button-danger {
            background: linear-gradient(135deg, #dc2626, #ef4444);
            color: white;
        }
        
        .admin-button-warning {
            background: linear-gradient(135deg, #d97706, #f59e0b);
            color: white;
        }
        
        /* Admin Table Styling */
        .admin-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        
        .admin-table thead {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        }
        
        .admin-table th {
            padding: 16px 20px;
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            color: #374151;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 2px solid #e5e7eb;
        }
        
        .admin-table td {
            padding: 16px 20px;
            border-bottom: 1px solid #f3f4f6;
            font-size: 14px;
            color: #374151;
        }
        
        .admin-table tbody tr {
            transition: all 0.2s ease;
        }
        
        .admin-table tbody tr:hover {
            background: #f8fafc;
            transform: scale(1.005);
        }
        
        .admin-table tbody tr:last-child td {
            border-bottom: none;
        }
        
        /* Status Badge Styling */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        
        .status-badge-success {
            background: #dcfce7;
            color: #166534;
        }
        
        .status-badge-warning {
            background: #fef3c7;
            color: #92400e;
        }
        
        .status-badge-danger {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .status-badge-info {
            background: #dbeafe;
            color: #1e40af;
        }
        
        .status-badge-secondary {
            background: #f3f4f6;
            color: #374151;
        }
        
        /* Mobile menu button */
        .mobile-menu-btn {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            background: #093880;
            color: white;
            padding: 12px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }
            
            .sidebar {
                position: fixed;
                left: -100%;
                top: 0;
                z-index: 999;
                width: 280px;
                height: 100vh;
                transition: left 0.3s ease;
            }
            
            .sidebar.active {
                left: 0;
            }
            
            .main-content {
                margin-left: 0;
                padding: 80px 16px 16px;
            }
            
            .admin-table {
                font-size: 12px;
            }
            
            .admin-table th,
            .admin-table td {
                padding: 12px 8px;
            }
            
            .admin-container {
                margin-bottom: 16px;
                padding: 16px;
            }
            
            .admin-header {
                font-size: 24px;
                margin-bottom: 16px;
            }
        }
        
        /* Overlay for mobile */
        .mobile-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 998;
        }
        
        .mobile-overlay.active {
            display: block;
        }
        
        /* Table Sorting Styles */
        .sortable-header {
            cursor: pointer;
            user-select: none;
            position: relative;
            transition: all 0.2s ease;
        }
        
        .sortable-header:hover {
            background-color: rgba(9, 56, 128, 0.1);
        }
        
        .sort-arrow {
            margin-left: 8px;
            font-size: 10px;
            opacity: 0.5;
            transition: opacity 0.2s ease;
        }
        
        .sortable-header.asc .sort-arrow {
            opacity: 1;
            transform: rotate(0deg);
        }
        
        .sortable-header.desc .sort-arrow {
            opacity: 1;
            transform: rotate(180deg);
        }
        
        .sortable-header:not(.asc):not(.desc) .sort-arrow {
            opacity: 0.3;
        }
    </style>
</head>
<body class="font-['Poppins'] bg-gradient-to-br from-gray-50 via-blue-50/30 to-gray-100 bg-noise min-h-screen">
    <!-- Mobile menu button -->
    <button class="mobile-menu-btn" id="mobileMenuBtn">
        <i class="fas fa-bars text-lg"></i>
    </button>

    <!-- Mobile overlay -->
    <div class="mobile-overlay" id="mobileOverlay"></div>

    <!-- Decorative elements -->
    <div class="fixed w-full h-full top-0 left-0 pointer-events-none z-0">
        <div class="absolute top-20 left-[10%] w-40 h-40 bg-primary/5 rounded-full filter blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-[5%] w-60 h-60 bg-secondary/5 rounded-full filter blur-3xl animate-float"></div>
        <div class="absolute top-[40%] right-[30%] w-32 h-32 bg-accent/5 rounded-full filter blur-3xl animate-pulse-slow"></div>
    </div>

    <div class="min-h-screen flex relative z-10">
        <aside class="w-64 glass-effect text-white shadow-2xl relative sidebar">
            <!-- Gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-primary via-primary/95 to-primary/85"></div>
            
            <div class="p-6 relative z-10 h-full flex flex-col">
                <!-- Logo and title -->
                <div class="flex items-center gap-3 mb-8 pb-6 border-b border-white/20">
                    <img src="../assets/images/logo.png" alt="Logo" class="w-12 h-14 transition-transform duration-300 hover:scale-110 animate-float">
                    <div>
                        <h1 class="text-xl font-bold">IT SPECTA</h1>
                        <p class="text-xs text-white/70 font-medium">Admin Panel</p>
                    </div>
                </div>
                
                <!-- Navigation -->
                <nav class="space-y-3 flex-1">
                    <a href="dashboard.php" class="sidebar-link <?php echo (isset($current_page) && $current_page == 'dashboard') ? 'active' : ''; ?>">
                        <i class="fas fa-tachometer-alt fa-fw"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="manage_events.php" class="sidebar-link <?php echo (isset($current_page) && $current_page == 'events') ? 'active' : ''; ?>">
                        <i class="fas fa-calendar-alt fa-fw"></i>
                        <span>Kelola Acara</span>
                    </a>
                    <a href="manage_users.php" class="sidebar-link <?php echo (isset($current_page) && $current_page == 'users') ? 'active' : ''; ?>">
                        <i class="fas fa-users fa-fw"></i>
                        <span>Kelola Pengguna</span>
                    </a>
                    <a href="manage_transactions.php" class="sidebar-link <?php echo (isset($current_page) && $current_page == 'transactions') ? 'active' : ''; ?>">
                        <i class="fas fa-file-invoice-dollar fa-fw"></i>
                        <span>Kelola Transaksi</span>
                    </a>
                </nav>
                
                <!-- User info and logout -->
                <div class="border-t border-white/20 pt-6 mt-6">
                    <div class="flex items-center gap-3 mb-4 text-sm p-3 bg-white/10 rounded-lg">
                        <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <div class="font-semibold"><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Admin'; ?></div>
                            <div class="text-xs text-white/70">Administrator</div>
                        </div>
                    </div>
                    <a href="../php/logout.php" class="flex items-center gap-3 py-3 px-4 rounded-lg bg-red-600/80 hover:bg-red-600 transition-all duration-300 font-semibold w-full text-center">
                        <i class="fas fa-sign-out-alt fa-fw"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </aside>

        <main class="flex-1 p-8 overflow-x-hidden main-content">
            <div class="max-w-7xl mx-auto">
                <!-- Header will be completed in individual pages -->
