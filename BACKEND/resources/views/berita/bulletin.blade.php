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

        <div class="berita-list">
            <!-- ITEM -->
        <div class="berita-item">
            <div class="berita-img">
                <img src="{{ asset('images/FOTO BERANDA/Kampanye Perlindungan Anak 10.9.25.jpeg') }}" alt="Berita">
            </div>

            <div class="berita-content">
                <h3>Guru Ketapang Beraksi: Sulap Keterbatasan Jadi Inovasi Lewat Ruang Kolaboratif KREASI</h3>
                <p>
                   Kreasi Ketapang Majelis Dikdasmen dan PNF PP Muhammadiyah sukses menggelar
                    lokakarya "Learning: Kelompok Kerja Guru (KKG) Tingkat Kabupaten" pada 31 Juli hingga
                    1 Agustus 2025 di Hotel Borneo, Ketapang. Kegiatan yang dihadiri oleh 39 pendidik ini
                    bukan sekadar pertemuan formalitas, melainkan sebuah ruang kolaboratif mendesak
                    untuk menjawab tantangan literasi dan numerasi yang masih rendah.
                </p>
                <a href="#" class="btn">Selengkapnya</a>
            </div>
        </div>

        <!-- ITEM -->
        <div class="berita-item">
            <div class="berita-img">
                <img src="{{ asset('images/FOTO BERITA/majelis dikdasmen 17.8.25.jpg') }}" alt="Berita">
            </div>

            <div class="berita-content">
                <h3>MAJELIS DIKDASMEN PNF PP MUHAMMADIYAH MENDAPATKAN PENGHARGAAN 
                    DARI BGTK KALIMANTAN BARAT</h3>
                <p>
                   Pada momen upacara peringatan HUT RI ke-80, Balai 
                   Guru dan Tenaga Kependidikan (BGTK) Provinsi 
                   Kalimantan Barat memberikan penghargaan kepada 
                   Majelis Dikdasmen PNF PP Muhammadiyah. 
                </p>
                <a href="#" class="btn">Selengkapnya</a>
            </div>
        </div>

        <!-- ITEM -->
        <div class="berita-item">
            <div class="berita-content">
                <h3>KREASI Kayong Utara Perkuat Unit Layanan Disabilitas</h3>
                <p>
                    KREASI Kayong Utara melakukan aktivasi penguatan Unit 
                    Layanan Disabilitas (ULD) di Bidang Pendidikan, sebagai 
                    bentuk komitmen bersama dalam mewujudkan pendidikan yang 
                    inklusif bagi semua anak, termasuk penyandang disabilitas 
                    di Sukadana pada Jumat (29/8/2025).
                </p>
                <a href="#" class="btn">Selengkapnya</a>
            </div>

            <div class="berita-img">
                <img src="{{ asset('images/FOTO BERITA/layanan disabilitas 29.8.25.JPG') }}" alt="Berita">
            </div>
        </div>

        <!-- ITEM -->
        <div class="berita-item">
            <div class="berita-content">
                <h3>Pertemuan Monitoring TPPK dan PATMB di Lingkungan Sekolah dan Masyarakat Kabupaten Kayong Utara</h3>
                <p>
                    Sukadana, Kamis, 4 September 2025, telah dilaksanakan 
                    Pertemuan Monitoring Tim Pencegahan dan Penanganan Kekerasan 
                    (TPPK) serta Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM) 
                    di lingkungan sekolah dan masyarakat Kabupaten Kayong Utara. 
                </p>
                <a href="#" class="btn">Selengkapnya</a>
            </div>
            
            <div class="berita-img">
                <img src="{{ asset('images/FOTO BERITA/monitoring tppk dan patmb 4.9.25.JPG') }}" alt="Berita">
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
