<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KREASI - Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <header class="main-header">
        <div class="top-bar">
            <div class="logo">
                <img height="70" src="{{ asset('images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}"alt="LOGO KREASI" class="kresi-logo">
            </div>
            <div class="search-box">
                <input type="text" placeholder="Cari...">
                <button class="search-btn"><i class="fas fa-search"></i></button>
            </div>
            <div class="right-logos">
                <img height="70" src="{{ asset('images/FOTO BERANDA/dikdesmen.png') }}" alt="Logo Kemendikbud" class="kemendikbud-logo">
            </div>
        </div>

        <button class="hamburger-menu" id="hamburger"><i class="fas fa-bars"></i></button>
        
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
                    <a href="{{ route('galeri', ['type' => 'photo']) }}">FOTO KEGIATAN</a>
                    <a href="{{ route('galeri', ['type' => 'video']) }}">VIDEO KEGIATAN</a>
                </div>
            </div>

            <div class="auth-buttons">
                <button class="btn btn-id">ID</button>
            </div>
        </nav>
    </header>

    <main class="main-content galeri-detail-layout">

<main class="main-content galeri-detail-layout">
        <h1 class="page-title">DOKUMENTASI: WORKSHOP KURIKULUM ADAPTIF</h1>

        <div class="galeri-counter">FOTO 1/10</div>

        <div class="galeri-viewer">
            <span class="arrow prev-arrow"><i class="fas fa-chevron-left"></i></span>
            
            <div class="galeri-image"></div>
            
            <span class="arrow next-arrow"><i class="fas fa-chevron-right"></i></span>
        </div>

        <a href="#" class="unduh-btn">UNDUH FOTO (ZIP)</a>
        
        <p style="text-align:center; margin-top:20px; font-style:italic;">Gunakan tombol panah di atas untuk melihat foto-foto kegiatan.</p>
    </main>



     <footer class="main-footer">
        <div class="footer-container">
            <div class="footer-left">
                <h3>About Us</h3>
                <p>KREASI adalah pusat kolaborasi untuk memajukan pendidikan anak Indonesia melalui inovasi dan akses materi berkualitas.</p>
            </div>
            <div class="footer-right">
                <h3>Contact Information</h3>
                <div class="contact-item"><i class="fas fa-map-marker-alt"></i> Jalan Bangka IX Nomor 40A&B, Pela Mampang, Mampang Prapatan, Jakarta Selatan, DKI Jakarta 12720</div>
                <div class="contact-item"><i class="fas fa-phone"></i>  (+62) 217824415 </div>
                <div class="contact-item"><i class="fas fa-envelope"></i> Indonesia.KREASI@savethechildren.org</div>
            </div>
        </div>
    </footer>
    
    <script src="scripts.js"></script>

    </body>
   
