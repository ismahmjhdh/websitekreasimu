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
            @php
                // Provide defaults if galeri is not passed (for direct /galeri1 access)
                $galeri = $galeri ?? (object)['caption' => 'GALERI', 'image_url' => '', 'type' => 'photo', 'id' => 0];
                $type = $type ?? 'photo';
            @endphp

            <h1 class="page-title">DOKUMENTASI: {{ $galeri->caption ?? 'GALERI' }}</h1>

            @php
                $images = [];
                if (!empty($galeri->image_url)) {
                    $img = trim($galeri->image_url);
                    // JSON array stored
                    if (substr($img, 0, 1) === '[') {
                        $decoded = json_decode($img, true);
                        if (is_array($decoded)) {
                            $images = $decoded;
                        }
                    // comma-separated list
                    } elseif (strpos($img, ',') !== false) {
                        $parts = explode(',', $img);
                        foreach ($parts as $p) {
                            $p = trim($p);
                            if ($p !== '') $images[] = $p;
                        }
                    } else {
                        $images[] = $img;
                    }
                }
                if (empty($images)) {
                    $images[] = 'images/FOTO GALERI/21.7.25.jpg';
                }
            @endphp

            <div class="slideshow-container">
                <div class="slideshow">
                    @foreach($images as $index => $imgPath)
                        <div class="slide" data-index="{{ $index }}" style="display: {{ $index === 0 ? 'block' : 'none' }};">
                            <img src="{{ asset($imgPath) }}" alt="{{ $galeri->caption ?? 'Foto galeri' }}">
                        </div>
                    @endforeach
                </div>

                <button class="slide-btn prev" aria-label="Previous"><i class="fas fa-chevron-left"></i></button>
                <button class="slide-btn next" aria-label="Next"><i class="fas fa-chevron-right"></i></button>

                <div class="slide-counter">FOTO <span id="current-slide">1</span>/<span id="total-slides">{{ count($images) }}</span></div>
            </div>

            @if($galeri->id > 0)
                <a href="{{ route('galeri.downloadZip', ['type' => $type, 'id' => $galeri->id]) }}" class="unduh-btn">UNDUH FOTO (ZIP)</a>
            @else
                <a href="#" class="unduh-btn" style="opacity:0.5; cursor:not-allowed;">UNDUH FOTO (ZIP)</a>
            @endif

            <p style="text-align:center; margin-top:20px; font-style:italic;">Gunakan tombol panah di atas atau keyboard untuk melihat foto-foto kegiatan.</p>

            <style>
                .slideshow-container{max-width:900px;margin:20px auto;position:relative;text-align:center;overflow:hidden}
                .slideshow img{width:100%;height:auto;border-radius:8px;display:block;opacity:1 !important}
                .slide-btn{position:absolute;top:50%;transform:translateY(-50%);background:rgba(0,0,0,0.45);color:#fff;border:none;padding:0;display:flex;align-items:center;justify-content:center;width:48px;height:48px;border-radius:50%;cursor:pointer;z-index:20;box-shadow:0 4px 12px rgba(0,0,0,0.25)}
                .slide-btn svg,.slide-btn i{font-size:18px}
                .slide-btn:hover{background:rgba(0,0,0,0.6)}
                .slide-btn.prev{left:12px}
                .slide-btn.next{right:12px}
                .slide-counter{margin-top:10px;color:#333}

                /* Make sure buttons don't overlap image edges on small screens */
                @media (max-width:600px){
                    .slide-btn{width:40px;height:40px}
                    .slide-btn.prev{left:8px}
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

    
                        <script src="scripts.js"></script>

                        </body>

