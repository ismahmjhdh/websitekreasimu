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
                    <a href="{{ url('galeri') }}">VIDEO KEGIATAN</a>
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
                <input type="search" placeholder="Cari Berita...">
                <button class="search-btn"><i class="fas fa-search"></i></button>
            </div>
        </div>

        <div class="capaian-list">
          <section class="capaian-section">
            <h2>CAPAIAN</h2>

             <div class="capaian-grid">
                <div class="capaian-card">
                    <img src="{{ asset('images/FOTO BERITA/Sang Mahkota Di Tepian Sungai Pawan.jpg') }}"
                         alt="Sang Nahkoda Di Tepian Sungai Pawan" >
                    <div class="capaian-body">
                        <span class="capaian-date">Sang Nahkoda Di Tepian Sungai Pawan</span>
                        <p>Mari Kita Mengenal Sang Nahkoda Di Tepian Sungai Pawan, Sosok 
                        Pemimpin Yang Gigihmengarahkan Sekolahnya Melewati Arus Tantangan. 
                        </p>
                    </div>
                </div>

                <div class="capaian-grid">
                <div class="capaian-card">
                    <img src="{{ asset('images/FOTO BERITA/Merawat Budi Pekerti Di Bumi Ale-Ale.jpg') }}"
                         alt="Merawat Budi Pekerti Di Bumi Ale-Ale">
                    <div class="capaian-body">
                        <span class="capaian-date">Merawat Budi Pekerti Di Bumi Ale-Ale</span>
                        <p>Lebih Dari Sekadar Akademik, Pendidikan Adalah Tentang Karakter. Melalui 
                            Merawat Budi Pekerti Di Bumi Ale-Ale, Kitaakan Menyaksikan Bagaimana 
                             Para Guru Menanamkan Nilai-Nilai Luhur Dan Etika Kepada Para Siswa. 
                        </p>
                    </div>
                </div>

                <div class="capaian-grid">
                <div class="capaian-card">
                    <img src="{{ asset('images/FOTO BERITA/Merawat Logika Di Tengah Keterbatasan.jpg') }}"
                         alt="Merawat Logika Di Tengah Keterbatasan">
                    <div class="capaian-body">
                        <span class="capaian-date">Merawat Logika Di Tengah Keterbatasan</span>
                        <p>Keterbatasan Bukanlah Penghalang Bagi Kreativitas. Merawat Logika Di 
                             Tengah Keterbatasan Akan Membawa Kita Melihat Bagaimana Para Guru Di 
                             Kabupaten Ketapang Berinovasi Mengajarkan Matematika Dan Banyak Lagi. 
                        </p>
                    </div>
                </div>

                <div class="capaian-grid">
                <div class="capaian-card">
                    <img src="{{ asset('images/FOTO BERITA/Guru Di Garis Depan Literasi.jpg') }}"
                         alt="Guru Di Garis Depan Literasi">
                    <div class="capaian-body">
                        <span class="capaian-date">Guru Di Garis Depan Literasi</span>
                        <p>Di Balik Setiap Buku Yang Dibaca Dan Tulisan Yang Dibuat, Ada Perjuangan 
                             Seorang Guru. Guru Di Garis Depan Literasi Adalah Kisah Tentang Mereka 
                             Yang Berdedikasi Membangun Fondasi Membaca Dan Berpikir Kritis. 
                        </p>
                    </div>
                </div>

                <div class="capaian-grid">
                <div class="capaian-card">
                    <img src="{{ asset('images/FOTO BERITA/Membangun Sekolah Tanpa Kekerasan.jpg') }}"
                         alt="Membangun Sekolah Tanpa Kekerasan">
                    <div class="capaian-body">
                        <span class="capaian-date">Membangun Sekolah Tanpa Kekerasan</span>
                        <p>Apa Yang Terjadi Ketika Seluruh Elemen Sekolah Bersatumelawan Kekerasan? 
                            Membangun Sekolah Tanpa Kekerasanakan Menunjukkan Kepada Kita 
                            Sebuah Inisiatif Luar Biasa. 
                        </p>
                    </div>
                </div>
                
        </section>


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
