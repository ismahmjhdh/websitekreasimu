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

            <!-- Gallery Grid from Database -->
            <div class="galeri-grid">
                @forelse($galeris as $galeri)
                    <div class="galeri-card">
                        <img src="{{ asset($galeri->image_url) }}"
                             alt="{{ $galeri->caption }}">
                        <div class="galeri-body">
                            <span class="galeri-date">{{ $galeri->caption ?? 'Foto Kegiatan' }}</span>
                            <p>{{ date('d F Y', strtotime($galeri->created_at)) }}</p>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1/-1; text-align: center; padding: 40px; color: #666;">
                        <p>Belum ada foto dalam galeri. Silakan upload foto melalui admin panel.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($galeris->hasPages())
                <div style="display: flex; justify-content: center; margin-top: 40px; gap: 10px;">
                    {{ $galeris->links() }}
                </div>
            @endif
        </section>
                </div>
            </div>


        

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
