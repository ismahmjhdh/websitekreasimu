<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KREASI - Buletin</title>
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
                <form method="GET" action="{{ route('buletin') }}">
                    <input type="text" name="search" placeholder="Cari..." value="{{ $search ?? '' }}">
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

    <main class="main-content berita-layout">
        <h1 class="page-title">BULETIN</h1>

        <!-- Navigation Buttons -->
        <div class="nav-buttons">
            <a href="{{ route('berita') }}" class="btn btn-nav">
                <i class="fas fa-newspaper"></i> BERITA
            </a>
            <a href="{{ route('capaian') }}" class="btn btn-nav">
                <i class="fas fa-trophy"></i> CAPAIAN
            </a>
        </div>
        
        <div class="filter-bar">
            <div class="filter-group">
                <label for="sort-order">Urutan:</label>
                <select id="sort-order" name="sort" onchange="window.location.href='{{ route('buletin') }}?sort=' + this.value + '{{ $search ? '&search=' . $search : '' }}'">
                    <option value="terbaru" {{ ($sort ?? 'terbaru') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                    <option value="terpopuler" {{ ($sort ?? '') == 'terpopuler' ? 'selected' : '' }}>Terpopuler</option>
                    <option value="abjad" {{ ($sort ?? '') == 'abjad' ? 'selected' : '' }}>A-Z</option>
                </select>
            </div>
            
            <div class="search-materi-bar">
                <form method="GET" action="{{ route('buletin') }}" style="display: flex; width: 100%;">
                    <input type="search" name="search" placeholder="Cari Buletin..." value="{{ $search ?? '' }}">
                    <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                </form>
            </div>

            @if($search)
                <a href="{{ route('buletin') }}" class="btn btn-reset" style="margin-left: 10px;">
                    <i class="fas fa-redo"></i> Reset
                </a>
            @endif
        </div>

        @if($search)
            <div style="padding: 15px; background: #f0f0f0; margin-bottom: 20px; border-radius: 5px;">
                <p style="margin: 0; color: #666;">
                    <i class="fas fa-search"></i> Menampilkan hasil pencarian untuk: 
                    <strong>"{{ $search }}"</strong> 
                    ({{ $buletins->count() }} hasil ditemukan)
                </p>
            </div>
        @endif

        <div class="berita-list">
            @forelse($buletins as $buletin)
                <div class="berita-item">
                    @if($buletin->image_url)
                        <div class="berita-img">
                            <img src="{{ asset($buletin->image_url) }}" alt="{{ $buletin->title }}">
                        </div>
                    @endif

                    <div class="berita-content">
                        <span class="category-badge">
                            <i class="fas fa-file-pdf"></i> Buletin
                        </span>
                        
                        <h3>{{ $buletin->title }}</h3>
                        
                        <p>{{ Str::limit(strip_tags($buletin->content), 200) }}</p>
                        
                        @if($buletin->pdf_url)
                            <a href="{{ route('berita.download', $buletin->id) }}" class="btn">
                                <i class="fas fa-download"></i> Download PDF
                            </a>
                        @else
                            <a href="{{ route('berita.show', $buletin->id) }}" class="btn">
                                Selengkapnya <i class="fas fa-arrow-right"></i>
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <div style="text-align: center; padding: 60px 20px; background: #f9f9f9; border-radius: 10px;">
                    <i class="fas fa-file-pdf" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i>
                    <h3 style="color: #999; margin-bottom: 10px;">Tidak ada buletin ditemukan</h3>
                    @if($search)
                        <p style="color: #666;">Coba gunakan kata kunci yang berbeda</p>
                        <a href="{{ route('buletin') }}" class="btn" style="margin-top: 15px;">
                            <i class="fas fa-arrow-left"></i> Kembali ke semua buletin
                        </a>
                    @endif
                </div>
            @endforelse
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