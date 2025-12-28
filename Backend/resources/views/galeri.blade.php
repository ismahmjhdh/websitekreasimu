<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KREASI - Galeri</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

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
                <button class="search-btn"><i class="fas fa-search"></i></button>
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
            <a href="{{ url('/') }}" class="nav-item">BERANDA</a>

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

            <div class="nav-item active has-dropdown">
                GALERI <i class="fas fa-caret-right"></i>
                <div class="dropdown-content galeri-dropdown">
                    <a href="{{ route('galeri') }}">FOTO KEGIATAN</a>
                    <a href="{{ url('galeri') }}">VIDEO KEGIATAN</a>
                    
                </div>
            </div>

            <div class="auth-buttons">
                <button class="btn btn-id">ID</button>
            </div>
        </nav>
    </header>

    <main class="main-content galeri-detail-layout">

       <!-- Materi Section -->
        <section class="galeri-section">
            <h2>GALERI</h2>

            <!-- First Row of Cards -->
            <div class="galeri-grid">
                <div class="galeri-card">
                    <img src="{{ asset('images/FOTO GALERI/21.7.25.JPG') }}"
                         alt="21.7.25">
                    <div class="galeri-body">
                        <span class="galeri-date">PEMBUKAAN DAN PENGARAHAN TEKNIS KELAS TAMBAHAN LITERASI DAN NUMERASI DI KABUPATEN KAYONG UTARA</span>
                        <p>SENIN 21 JULI 2025</p>
                    </div>
                </div>

                <div class="galeri-card">
                    <img src="{{ asset('images/FOTO GALERI/23.7.25.JPG') }}"
                         alt="23.7.25">
                    <div class="galeri-body">
                        <span class="galeri-date">PENGUATANKAPASITAS PENDIDIK DAN TENAGA KEPENDIDIKAN DALAM PENYUSUNAN KURIKULUM SATUAN PENDIDIKAN BERBASIS LITERASI NUMERASI DAN PENDIDIKAN PERUBAHAN IKLIM DI KABUPATEN KAYONG UTARA</span>
                        <p>RABU 23-25 JULI 2025</p>
                    </div>
                </div>

                <div class="galeri-card">
                    <img src="{{ asset('images/FOTO GALERI/28.7.25.JPG') }}"
                         alt="28.7.25">
                    <div class="galeri-body">
                        <span class="galeri-date">PENINGKATAN KAPASITAS GURU PAUD SIMPANG HILIR</span>
                        <p>SENIN 28 JULI 2025</p>
                    </div>
                </div>
            </div>

            <!-- Second Row of Cards -->
            <div class="galeri-grid">
                <div class="galeri-card">
                    <img src="{{ asset('images/FOTO GALERI/29.7.25.JPG') }}" 
                         alt="29.7.25">
                    <div class="galeri-body">
                        <span class="galeri-date">PELATIHANPROGRAM SAFE FAMILIES BAGIFASILITATOR SESI ORANG TUA DAN SESI ANAK DI TINGKAT SEKOLAHKABUPATEN KAYONG UTARA</span>
                        <p>Selasa 29 juli 2025</p>
                    </div>
                </div>

                <div class="galeri-card">
                    <img src="{{ asset('images/FOTO GALERI/selasa 29.7.25.JPG') }}" 
                         alt="selasa 19.7.25">
                    <div class="galeri-body">
                        <span class="galeri-date">WORKSHOP OPTIMALISASI DANA BOP UNTUK MENINGKATKAN KOMPETENSI GURU PAUD</span>
                        <p>Selasa 29 juli 2025</p>
                    </div>
                </div>

                <div class="galeri-card">
                    <img src="{{ asset('images/FOTO GALERI/4.8.25.JPG') }}"
                         alt="Kampanye Perlindungan Anak SD Negeri 12 Pelerang">
                    <div class="galeri-body">
                        <span class="galeri-date">LOKAKARYA PENERAPAN PEMBELAJARAN BERBASIS PROJEK YANG TERINTEGRASI DENGAN LINGKUNGAN DAN PERUBAHAN IKLIM DI KABUPATEN KAYONG UTARA</span>
                        <p>SENIN 4-5 AGUSTUS</p>
                    </div>
                </div>
            </div>
        </section>

        

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

                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i> Jalan Bangka IX Nomor 
                    40A&B,<br> Pela Mampang, Mampang Prapatan, Jakarta Selatan,
                    <br> DKI Jakarta 12720
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i> (+62) 217824415
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i> Indonesia.KREASI@savethechildren.org
                </div>

                <div class="social-icons">
                    <a href="https://www.facebook.com/SaveChildrenID/" target="_blank">
                        <img src="{{ asset('images/FOOTER/Facebook_font_awesome.svg.png') }}">
                    </a>
                    <a href="https://www.instagram.com/savechildren_id" target="_blank">
                        <img src="{{ asset('images/FOOTER/Instagram.png') }}">
                    </a>
                    <a href="https://x.com/savechildren_id" target="_blank">
                        <img src="{{ asset('images/FOOTER/Twitter_X.png') }}">
                    </a>
                    <a href="https://www.linkedin.com/company/savethechildren-indonesia/" target="_blank">
                        <img src="{{ asset('images/FOOTER/LinkedIn_logo_In-Black.svg.png') }}">
                    </a>
                    <a href="#" target="_blank">
                        <img src="{{ asset('images/FOOTER/Tiktok_icon.svg.png') }}">
                    </a>
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
</body>
</html>
