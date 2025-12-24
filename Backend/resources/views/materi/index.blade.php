<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KREASI - Materi</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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

            <div class="search-box">
                <input type="text" placeholder="Cari...">
                <button class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
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
            <a href="{{ route('materi') }}" class="nav-item">MATERI</a>

            <div class="nav-item has-dropdown">
                GALERI <i class="fas fa-caret-right"></i>
                <div class="dropdown-content galeri-dropdown">
                    <a href="{{ url('galeri') }}">FOTO KEGIATAN</a>
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

        <!-- Search Bar -->
        <div class="search-materi-bar">
            <input type="text" placeholder="Cari Modul/Topik...">
            <button class="search-btn">
                <i class="fas fa-search"></i>
            </button>
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
            <h2>HEADLINE</h2>

            <!-- First Row of Cards -->
            <div class="materi-grid">
                <div class="materi-card">
                    <img src="{{ asset('images/gambar1.jpg') }}" 
                         alt="Kampanye Perlindungan Anak">
                    <div class="materi-body">
                        <span class="materi-date">10 Agustus 2025</span>
                        <p>Kampanye Perlindungan Anak</p>
                    </div>
                </div>

                <div class="materi-card">
                    <img src="{{ asset('images/gambar2.jpg') }}" 
                         alt="Monitoring Sekolah Mentubang">
                    <div class="materi-body">
                        <span class="materi-date">01 Oktober 2025</span>
                        <p>Monitoring Sekolah Mentubang</p>
                    </div>
                </div>

                <div class="materi-card">
                    <img src="{{ asset('images/gambar3.jpg') }}" 
                         alt="Kampanye Perlindungan Anak SD Negeri 12 Pelerang">
                    <div class="materi-body">
                        <span class="materi-date">11 November 2025</span>
                        <p>Kampanye Perlindungan Anak SD Negeri 12 Pelerang</p>
                    </div>
                </div>
            </div>

            <!-- Second Row of Cards -->
            <div class="materi-grid">
                <div class="materi-card">
                    <img src="{{ asset('images/gambar1.jpg') }}" 
                         alt="Kampanye Perlindungan Anak">
                    <div class="materi-body">
                        <span class="materi-date">10 Agustus 2025</span>
                        <p>Kampanye Perlindungan Anak</p>
                    </div>
                </div>

                <div class="materi-card">
                    <img src="{{ asset('images/gambar2.jpg') }}" 
                         alt="Monitoring Sekolah Mentubang">
                    <div class="materi-body">
                        <span class="materi-date">01 Oktober 2025</span>
                        <p>Monitoring Sekolah Mentubang</p>
                    </div>
                </div>

                <div class="materi-card">
                    <img src="{{ asset('images/gambar3.jpg') }}" 
                         alt="Kampanye Perlindungan Anak SD Negeri 12 Pelerang">
                    <div class="materi-body">
                        <span class="materi-date">11 November 2025</span>
                        <p>Kampanye Perlindungan Anak SD Negeri 12 Pelerang</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-content">
            <!-- About Section -->
            <div class="footer-left">
                <h2>About Us</h2>
                <p>KREASI adalah pusat kolaborasi untuk memajukan pendidikan anak Indonesia melalui inovasi dan akses materi berkualitas.</p>
            </div>

            <!-- Contact Section -->
            <div class="footer-right">
                <h2>Contact Information</h2>
                <p class="subtitle">feel free to contact and reach us!</p>

                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    Jalan Bangka IX Nomor 40A&B,<br>
                    Pela Mampang, Mampang Prapatan,<br>
                    Jakarta Selatan, DKI Jakarta 12720
                </div>

                <div class="contact-item">
                    <i class="fas fa-phone"></i> 
                    (+62) 217824415
                </div>

                <div class="contact-item">
                    <i class="fas fa-envelope"></i> 
                    Indonesia.KREASI@savethechildren.org
                </div>

                <!-- Social Media Links -->
                <div class="social-icons">
                    <a href="https://www.facebook.com/SaveChildrenID/" target="_blank">
                        <img src="{{ asset('images/FOOTER/Facebook_font_awesome.svg.png') }}" 
                             alt="Facebook">
                    </a>
                    <a href="https://www.instagram.com/savechildren_id" target="_blank">
                        <img src="{{ asset('images/FOOTER/Instagram.png') }}" 
                             alt="Instagram">
                    </a>
                    <a href="https://x.com/savechildren_id" target="_blank">
                        <img src="{{ asset('images/FOOTER/Twitter_X.png') }}" 
                             alt="Twitter X">
                    </a>
                    <a href="https://www.linkedin.com/company/savethechildren-indonesia/" target="_blank">
                        <img src="{{ asset('images/FOOTER/LinkedIn_logo_In-Black.svg.png') }}" 
                             alt="LinkedIn">
                    </a>
                    <a href="#">
                        <img src="{{ asset('images/FOOTER/Tiktok_icon.svg.png') }}" 
                             alt="TikTok">
                    </a>
                </div>
            </div>
        </div>

        <!-- Partner Logos -->
        <div class="logo-row">
            <img src="{{ asset('images/FOOTER/Tut wuri handayani1.png') }}" 
                 alt="Tut Wuri Handayani">
            <img src="{{ asset('images/FOOTER/Kementerian_Agama_new_logo.png') }}" 
                 alt="Kementerian Agama">
            <img src="{{ asset('images/FOOTER/Logo_Kementerian_PPN-Bappenas_(2023).png') }}" 
                 alt="Bappenas">
            <img src="{{ asset('images/FOOTER/Lambang_Daerah_Kab._Kayong_Utara.png') }}" 
                 alt="Kayong Utara">
            <img src="{{ asset('images/FOOTER/GPE-removebg-preview.png') }}" 
                 alt="GPE">
            <img src="{{ asset('images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}" 
                 alt="KREASI">
            <img src="{{ asset('images/FOOTER/Logo_SavetheChildren.png') }}" 
                 alt="Save the Children">
            <img src="{{ asset('images/FOTO BERANDA/dikdesmen.png') }}" 
                 alt="Dikdesmen">
        </div>
    </footer>

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>