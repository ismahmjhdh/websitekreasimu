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

        <button class="hamburger-menu" id="hamburger"><i class="fas fa-bars"></i></button>
        
        <nav class="main-nav" id="main-nav-menu">
            <a href="{{ url('/') }}" class="nav-item active">BERANDA</a>

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
                    <a href="{{ route('galeri', ['type' => 'photo']) }}">FOTO KEGIATAN</a>
                    <a href="{{ route('galeri', ['type' => 'video']) }}">VIDEO KEGIATAN</a>
                </div>
            </div>

            <div class="auth-buttons">
                <button class="btn btn-id">ID</button>
            </div>
        </nav>
    </header>

    <main class="main-content homepage-layout">
        <section class="hero-banner">
            <div class="slider">
                <div class="slides">
                    <div class="slide">
                            <img src="{{ asset('images/FOTO BERANDA/refleksi dan konitor 3 sep .JPG') }}">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('images/FOTO BERANDA/Monitoring Sekolah Mentuban 1.10.25.JPG') }}">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('images/FOTO BERANDA/meeting kreasi bersama lptk.JPG') }}">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('images/FOTO BERANDA/learning revitais 18.9.25.JPG') }}">
                    </div>
                    <div class="slide">
                        <img src="{{ asset('images/FOTO BERANDA/Kampanye Perlindungan Anak 10.9.25.jpeg') }}">
                    </div>
                </div>
            </div>
        </section>

        <section class="agenda-section">
            <h2>AGENDA TERBARU</h2>

            <div class="agenda-grid">
                <div class="agenda-card">
                    <img src="{{ asset('images/gambar1.jpg') }}" alt="">
                    <div class="agenda-body">
                        <span class="agenda-date">10 Agustus 2025</span>
                        <p>Kampanye Perlindungan Anak</p>
                    </div>
                </div>

                <div class="agenda-card">
                    <img src="{{ asset('images/gambar2.jpg') }}" alt="">
                    <div class="agenda-body">
                        <span class="agenda-date">01 Oktober 2025</span>
                        <p>Monitoring Sekolah Mentubang</p>
                    </div>
                </div>

                <div class="agenda-card">
                    <img src="{{ asset('images/gambar3.jpg') }}" alt="">
                    <div class="agenda-body">
                        <span class="agenda-date">11 November 2025</span>
                        <p>Kampanye Perlindungan Anak SD Negeri 12 Pelerang</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="map-section">
            <h2>LOKASI & INTERVENSI PROGRAM</h2>

            <div class="map-container">
                <div class="map-info-side">
                    <div class="info-box">
                        <h3>Tahun 2025:</h3>
                        <ul>
                            <li>3 Kecamatan</li>
                            <li>30 SD/MI</li>
                            <li>10 TK/RA</li>
                        </ul>
                    </div>

                    <div class="legend">
                        <div class="legend-item">
                            <span class="legend-color green"></span>
                            <span>3 Kecamatan Intervensi</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color red"></span>
                            <span>14 Kecamatan Yang Akan Terdampak</span>
                        </div>
                    </div>
                </div>

                <div class="map-display-area">
                    <div class="map-slider-wrapper">
                        <div class="map-slider-container" id="mapSliderContainer">
                            <img src="{{ asset('images/FOTO BERANDA/KETAPANG OK OK.png') }}" alt="Peta Ketapang" class="map-image">
                            <img src="{{ asset('images/FOTO BERANDA/PETA KAYONG UTARA.png') }}" alt="Peta Kayong Utara" class="map-image">
                            <img src="{{ asset('images/map3.png') }}" alt="Peta 3" class="map-image">
                        </div>
                    </div>
                    
                    <div class="map-controls">
                        <button class="map-arrow map-arrow-prev" id="mapPrevBtn"><i class="fas fa-chevron-left"></i></button>
                        <div class="map-indicators">
                            <span class="indicator active" data-index="0"></span>
                            <span class="indicator" data-index="1"></span>
                            <span class="indicator" data-index="2"></span>
                        </div>
                        <button class="map-arrow map-arrow-next" id="mapNextBtn"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-testimoni">
            <h2>TESTIMONI MITRA</h2>
            <div class="slider-testi">
                <div class="slider-track-testi">

                    @for ($i = 0; $i < 6; $i++)
                    <div class="card-testi">
                        <img src="{{ asset('images/FOTO BERANDA/312-3120300_default-profile-hd-png-download.png') }}" class="profile-testi">
                        <h3>Desta Saputra</h3>
                        <p>⭐⭐⭐⭐⭐</p>
                        <span>Bla bla la bal bal</span>
                    </div>
                    @endfor

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
</body>
</html>
