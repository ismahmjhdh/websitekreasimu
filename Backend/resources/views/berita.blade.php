<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KREASI - Berita</title>

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

            <a href="{{ route('berita') }}" class="nav-item active">BERITA</a>
            <a href="{{ route('materi') }}" class="nav-item">MATERI</a>

            <div class="nav-item has-dropdown">
                GALERI <i class="fas fa-caret-right"></i>
                <div class="dropdown-content galeri-dropdown">
                    <a href="{{ route('galeri') }}">FOTO KEGIATAN</a>
                 
                </div>
            </div>

            <div class="auth-buttons">
                <button class="btn btn-id">ID</button>
            </div>
        </nav>
    </header>

    <main class="main-content berita-layout">
        <h1 class="page-title">BERITA & ARTIKEL</h1>
        
        <div class="filter-bar">
            <div class="filter-group">
                <label for="sort-order">Urutan:</label>
                <select id="sort-order">
                    <option value="terbaru">Terbaru</option>
                    <option value="terpopuler">Terpopuler</option>
                    <option value="abjad">A-Z</option>
                </select>
            </div>
            
            <div class="filter-group">
                <label for="category-filter">Kategori:</label>
                <select id="category-filter">
                    <option value="semua">Semua</option>
                    <option value="berita">Berita</option>
                    <option value="buletin">Buletin</option>
                    <option value="praktik-baik">Praktik Baik</option>
                </select>
            </div>
            
            <div class="search-materi-bar">
                <input type="text" placeholder="Cari Berita...">
                <button class="search-btn"><i class="fas fa-search"></i></button>
            </div>
        </div>

        <div class="berita-list">
            <!-- ITEM -->
        <div class="berita-item">
            <div class="berita-img">
                <img src="IMG_8446.JPG" alt="Berita">
            </div>

            <div class="berita-content">
                <h3>Kampanye Perlindungan Anak SD Negeri 12 Pelerang</h3>
                <p>
                    Kampanye Perlindungan Anak SD Negeri 12 Pelerang adalah kegiatan
                    untuk meningkatkan kesadaran siswa, guru, dan orang tua tentang
                    pentingnya menjaga keamanan serta hak-hak anak di lingkungan sekolah.
                </p>
                <a href="#" class="btn">Selengkapnya</a>
            </div>
        </div>

        <!-- ITEM -->
        <div class="berita-item">
            <div class="berita-img">
                <img src="img/berita2.jpg" alt="Berita">
            </div>

            <div class="berita-content">
                <h3>Monitoring Sekolah Mentubang</h3>
                <p>
                    Monitoring Sekolah Mentubang merupakan kegiatan pemantauan
                    untuk menilai kondisi, kebutuhan, dan perkembangan sekolah.
                </p>
                <a href="#" class="btn">Selengkapnya</a>
            </div>
        </div>

        <!-- ITEM -->
        <div class="berita-item">
            <div class="berita-content">
                <h3>Kampanye Perlindungan Anak SD Negeri 12 Pelerang</h3>
                <p>
                    Kampanye Perlindungan Anak SD Negeri 12 Pelerang adalah kegiatan
                    untuk meningkatkan kesadaran siswa, guru, dan orang tua tentang
                    pentingnya menjaga keamanan serta hak-hak anak di lingkungan sekolah.
                </p>
                <a href="#" class="btn">Selengkapnya</a>
            </div>

            <div class="berita-img">
                <img src="IMG_8446.JPG" alt="Berita">
            </div>
        </div>

        <!-- ITEM -->
        <div class="berita-item">
            <div class="berita-content">
                <h3>Kampanye Perlindungan Anak SD Negeri 12 Pelerang</h3>
                <p>
                    Kampanye Perlindungan Anak SD Negeri 12 Pelerang adalah kegiatan
                    untuk meningkatkan kesadaran siswa, guru, dan orang tua tentang
                    pentingnya menjaga keamanan serta hak-hak anak di lingkungan sekolah.
                </p>
                <a href="#" class="btn">Selengkapnya</a>
            </div>
            
            <div class="berita-img">
                <img src="IMG_8446.JPG" alt="Berita">
            </div>
        </div>

    </main>

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
                <div class="contact-item"><i class="fas fa-envelope"></i> kreasimu@kreasimuhammadiyah.com</div>

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
            <img src="{{ asset('images/FOOTER/GKL4_Kabupaten Ketapang - Koleksilogo.com (2).png') }}">
            <img src="{{ asset('images/FOOTER/GPE-removebg-preview.png') }}">
            <img src="{{ asset('images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}">
            <img src="{{ asset('images/FOOTER/Logo_SavetheChildren.png') }}">
            <img src="{{ asset('images/FOTO BERANDA/dikdesmen.png') }}">
        </div>
    </footer>
    
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
