<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KREASI - Materi</title>
    <link rel="stylesheet" href="{{ asset('css/public-pages.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <!-- Header Section -->
    <header class="main-header">
        <div class="top-bar">
            <div class="logo">
                <img height="70" 
                     src="{{ asset('images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}" 
                     alt="LOGO KREASI" 
                     class="kresi-logo">
            </div>



            <div class="right-logos">
                <img height="70" 
                     src="{{ asset('images/FOTO BERANDA/dikdesmen.png') }}" 
                     alt="Logo Kemendikbud" 
                     class="kemendikbud-logo">
            </div>
        </div>

        <button class="hamburger-menu" id="hamburger">
            <i class="fas fa-bars"></i>
        </button>

        <nav class="main-nav" id="main-nav-menu">
            <a href="{{ route('beranda') }}" class="nav-item">BERANDA</a>

            <div class="nav-item has-dropdown">
                PROFILE <i class="fas fa-caret-right"></i>
                <div class="dropdown-content profile-dropdown">
                    <a href="{{ url('profile') }}">TENTANG</a>
                    <a href="{{ url('profile#tujuan') }}">TUJUAN</a>
                    <a href="{{ url('profile#program') }}">PROGRAM KREASI</a>
                    <a href="{{ url('profile#struktur') }}">STRUKTUR</a>
                </div>
            </div>

            <a href="{{ route('berita') }}" class="nav-item">BERITA</a>
            <a href="{{ route('materi') }}" class="nav-item active">MATERI</a>

            <div class="nav-item has-dropdown">
                GALERI <i class="fas fa-caret-right"></i>
                <div class="dropdown-content galeri-dropdown">
                    <a href="{{ route('galeri', ['type' => 'photo']) }}">FOTO KEGIATAN</a>
                    <a href="{{ route('galeri', ['type' => 'video']) }}">VIDEO KEGIATAN</a>
                </div>
            </div>

            <div class="auth-buttons">
                <button class="btn btn-id">ID</button>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content materi-layout">
        <h1 class="page-title">MATERI</h1>

        <!-- Alert Messages -->
        @if(session('error'))
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Search Bar -->
        <div class="search-materi-bar">
            <form method="GET" action="{{ route('materi') }}" style="display: flex; width: 100%;">
                <input type="text" name="search" placeholder="Cari Modul/Topik..." value="{{ $search ?? '' }}">
                <button type="submit" class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
        
        <!-- Featured Video -->
        <div class="materi-video">
            <iframe src="https://www.youtube.com/embed/SB0MskyMtDM" 
                    frameborder="0" 
                    allowfullscreen>
            </iframe>
        </div>

        <!-- Materi Section -->
        <section class="materi-section">
            <h2>MATERI PEMBELAJARAN</h2>

            @if($materis->count() > 0)
                <div class="materi-grid">
                    @foreach($materis as $materi)
                        <div class="materi-card" 
                             data-id="{{ $materi->id }}" 
                             data-title="{{ $materi->title }}" 
                             data-description="{{ Str::limit($materi->description, 100) }}"
                             onclick="prepareAndOpenModal(this)">
                            @if($materi->thumbnail_url)
                                <img src="{{ asset($materi->thumbnail_url) }}" alt="{{ $materi->title }}">
                            @elseif($materi->berita && $materi->berita->image_url)
                                <img src="{{ asset($materi->berita->image_url) }}" alt="{{ $materi->title }}">
                            @else
                                <img src="{{ asset('images/default-materi.jpg') }}" alt="{{ $materi->title }}">
                            @endif
                            <div class="materi-body">
                                <span class="materi-date">
                                    <i class="fas fa-calendar"></i> 
                                    {{ date('d F Y', strtotime($materi->created_at)) }}
                                </span>
                                <p>{{ $materi->title }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div style="text-align: center; padding: 60px 20px; background: #f9f9f9; border-radius: 10px;">
                    <i class="fas fa-folder-open" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i>
                    <h3 style="color: #999; margin-bottom: 10px;">Belum ada materi tersedia</h3>
                    @if($search)
                        <p style="color: #666;">Coba gunakan kata kunci yang berbeda</p>
                        <a href="{{ route('materi') }}" class="btn" style="margin-top: 15px;">
                            <i class="fas fa-arrow-left"></i> Kembali ke semua materi
                        </a>
                    @endif
                </div>
            @endif
        </section>
    </main>

    <!-- Password Modal -->
    <div id="passwordModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-lock"></i> Akses Materi</h2>
                <button class="close-modal" onclick="closePasswordModal()">&times;</button>
            </div>

            <form id="passwordForm" method="POST" action="">
                @csrf
                <div class="modal-body">
                    <div class="materi-info">
                        <h3 id="modalMateriTitle"></h3>
                        <p id="modalMateriDesc"></p>
                    </div>

                    <p><i class="fas fa-info-circle"></i> Materi ini dilindungi. Masukkan password untuk mengakses:</p>

                    <div class="password-group">
                        <input type="password" 
                               id="passwordInput" 
                               name="password" 
                               class="password-input" 
                               placeholder="Masukkan password..." 
                               required>
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-modal btn-cancel" onclick="closePasswordModal()">Batal</button>
                    <button type="submit" class="btn-modal btn-submit">
                        <i class="fas fa-unlock"></i> Akses Materi
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <h2>About Us</h2>
                <p>KREASI adalah pusat kolaborasi untuk memajukan 
                pendidikan anak Indonesia melalui </p>
                <p>inovasi dan akses materi berkualitas.</p>
            </div>

            <div class="footer-right">
                <h2>Contact Information</h2>
                <p class="subtitle">feel free to contact and reach us!</p>

                <div class="contact-item"><i class="fas fa-map-marker-alt"></i> Jl. Menteng Raya Nomor 62, RT.3/RW.9, Kb. Sirih, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10340</div>
                <div class="contact-item"><i class="fas fa-envelope"></i> kreasimu@muhammadiyah.id</div>

                <div class="social-icons">
                    <a href="https://www.instagram.com/kreasiketapang?igsh=Y2tnaWp1cDN3MXNk" target="_blank"><img src="{{ asset('images/FOOTER/Instagram.png') }}"></a>
                    <a href= "https://www.instagram.com/kreasikayongutara?igsh=ODdldjJiZXJtaXFl" target="_blank"><img src="{{ asset('images/FOOTER/Instagram.png') }}"></a>
                </div>
            </div>
        </div>

        <div class="logo-row">
            <img src="{{ asset('images/FOOTER/Tut wuri handayani1.png') }}">
            <img src="{{ asset('images/FOOTER/Kementerian_Agama_new_logo.png') }}">
            <img src="{{ asset('images/FOOTER/Logo_Kementerian_PPN-Bappenas_(2023).png') }}">
            <img src="{{ asset('images/FOOTER/Lambang_Daerah_Kab._Kayong_Utara.png') }}">
            <img src="{{ asset('images/FOOTER/GPE-removebg-preview.png') }}">
            <img src="{{ asset('images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}">
            <img src="{{ asset('images/FOOTER/Logo_SavetheChildren.png') }}">
            <img src="{{ asset('images/FOTO BERANDA/dikdesmen.png') }}">
        </div>
    </footer>

    <script src="{{ asset('js/scripts.js') }}"></script>
    
    <script>
        // Prepare and Open Password Modal
        function prepareAndOpenModal(element) {
            const materiId = element.getAttribute('data-id');
            const title = element.getAttribute('data-title');
            const description = element.getAttribute('data-description');
            
            openPasswordModal(materiId, title, description);
        }

        // Open Password Modal
        function openPasswordModal(materiId, title, description) {
            const modal = document.getElementById('passwordModal');
            const form = document.getElementById('passwordForm');
            const titleEl = document.getElementById('modalMateriTitle');
            const descEl = document.getElementById('modalMateriDesc');
            
            if (!modal || !form) return;
            
            // Set form action
            form.action = `/materi/${materiId}/verify`;
            
            // Set materi info
            titleEl.textContent = title;
            descEl.textContent = description;
            
            // Show modal
            modal.classList.add('active');
            
            // Focus on password input
            setTimeout(() => {
                const passwordInput = document.getElementById('passwordInput');
                if (passwordInput) passwordInput.focus();
            }, 300);
        }

        // Close Password Modal
        function closePasswordModal() {
            const modal = document.getElementById('passwordModal');
            modal.classList.remove('active');
            
            // Reset form
            document.getElementById('passwordForm').reset();
        }

        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('passwordModal');
            if (event.target === modal) {
                closePasswordModal();
            }
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closePasswordModal();
            }
        });

        // Auto-hide alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>

</body>
</html>