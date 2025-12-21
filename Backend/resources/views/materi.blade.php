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

        <a href="{{ route('berita') }}" class="nav-item">BERITA</a>
        <a href="{{ route('materi') }}" class="nav-item">MATERI</a>

        <div class="nav-item has-dropdown">
                GALERI <i class="fas fa-caret-right"></i>
                <div class="dropdown-content galeri-dropdown">
                    <a href="{{ url('galeri') }}">FOTO KEGIATAN</a>
                    <a href="#">VIDEO</a>
                </div>
            </div>

        <div class="auth-buttons">
            <button class="btn btn-id">ID</button>
        </div>
    </nav>
</header>

<main class="main-content materi-layout">
    <h1 class="page-title">KATALOG MATERI PEMBELAJARAN</h1>

    <div class="filter-bar">
        <div class="filter-group">
            <label>Filter Jenjang</label>
            <span><input type="checkbox"> SD</span>
            <span><input type="checkbox"> SMP</span>
            <span><input type="checkbox"> SMA/K</span>
        </div>

        <div class="search-materi-bar">
            <input type="text" placeholder="Cari Modul/Topik...">
            <button class="search-btn"><i class="fas fa-search"></i></button>
        </div>
    </div>

    <div class="card-grid materi-grid">
        <div class="card materi-item">
            <h3>Modul 1: Literasi Digital Dasar</h3>
            <p>Jenjang: SD & SMP</p>
            <p>Deskripsi: Panduan bagi guru untuk mengenalkan konsep keamanan dan etika digital pada siswa.</p>
            <a href="#" class="detail-link">Lihat Detail <i class="fas fa-chevron-right"></i></a>
        </div>

        <div class="card materi-item">
            <h3>Modul 2: Berpikir Komputasional</h3>
            <p>Jenjang: SMP & SMA/K</p>
            <p>Deskripsi: Implementasi proyek-proyek sederhana untuk melatih logika dan pemecahan masalah.</p>
            <a href="#" class="detail-link">Lihat Detail <i class="fas fa-chevron-right"></i></a>
        </div>

        <div class="card materi-item">
            <h3>Modul 3: Desain Pembelajaran Inklusif</h3>
            <p>Jenjang: Umum</p>
            <p>Deskripsi: Prinsip-prinsip merancang kegiatan belajar yang mengakomodasi beragam kebutuhan siswa.</p>
            <a href="#" class="detail-link">Lihat Detail <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</main>

<footer class="footer">
    <div class="footer-content">

        <div class="footer-left">
            <h2>About Us</h2>
            <p>KREASI adalah pusat kolaborasi untuk memajukan
                pendidikan anak Indonesia melalui</p>
            <p>inovasi dan akses materi berkualitas.</p>
        </div>

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
                <a href="#">
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
