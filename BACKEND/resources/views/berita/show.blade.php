<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->title }} - KREASI</title>
    <link rel="stylesheet" href="{{ asset('css/public-pages.css') }}">

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
                <form method="GET" action="{{ route('berita') }}">
                    <input type="text" name="search" placeholder="Cari...">
                    <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                </form>
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
                    <a href="#">VIDEO</a>
                </div>
            </div>

            
        </nav>
    </header>

    <main class="main-content">
        <div class="detail-container">
            <a href="{{ route('berita') }}" class="back-link">
                <i class="fas fa-arrow-left"></i> Kembali ke Berita
            </a>

            <article class="detail-header">
                <span class="category-badge category-{{ $berita->category }}">
                    @if($berita->category == 'berita')
                        <i class="fas fa-newspaper"></i>
                    @elseif($berita->category == 'buletin')
                        <i class="fas fa-book"></i>
                    @elseif($berita->category == 'praktik-baik')
                        <i class="fas fa-star"></i>
                    @endif
                    {{ ucwords(str_replace('-', ' ', $berita->category)) }}
                </span>

                <h1 class="detail-title">{{ $berita->title }}</h1>

                <div class="detail-meta">
                    <span>
                        <i class="fas fa-calendar"></i>
                        {{ date('d F Y', strtotime($berita->created_at)) }}
                    </span>
                    <span>
                        <i class="fas fa-user"></i>
                        Admin KREASI
                    </span>
                </div>
            </article>

            @if($berita->image_url)
                <img src="{{ asset($berita->image_url) }}" 
                     alt="{{ $berita->title }}" 
                     class="detail-image">
            @endif

            @if($berita->youtube_link)
                <div class="detail-video">
                    <iframe src="{{ $berita->youtube_link }}" 
                            allowfullscreen>
                    </iframe>
                </div>
            @endif

            @if($berita->video_url)
                <div class="detail-video">
                    <video controls style="width: 100%;">
                        <source src="{{ asset($berita->video_url) }}" type="video/mp4">
                        Browser Anda tidak mendukung video tag.
                    </video>
                </div>
            @endif

            <div class="detail-content">
                {!! nl2br(e($berita->content)) !!}
            </div>

            <div class="share-section">
                <h3 class="share-title">Bagikan Artikel Ini:</h3>
                <div class="share-buttons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                       target="_blank" 
                       class="share-btn share-facebook">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($berita->title) }}" 
                       target="_blank" 
                       class="share-btn share-twitter">
                        <i class="fab fa-twitter"></i> Twitter
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($berita->title . ' ' . url()->current()) }}" 
                       target="_blank" 
                       class="share-btn share-whatsapp">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                </div>
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


