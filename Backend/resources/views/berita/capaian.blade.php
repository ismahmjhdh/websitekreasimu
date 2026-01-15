<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KREASI - Capaian</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/public-pages.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header class="main-header">
        <div class="top-bar">
            <div class="logo">
                <img height="70" src="{{ asset('images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}"
                    alt="LOGO KREASI" class="kresi-logo">
            </div>
            <div class="search-box">
                <form method="GET" action="{{ route('capaian') }}">
                    <input type="text" name="search" placeholder="Cari..." value="{{ $search ?? '' }}">
                    <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="right-logos">
                <img height="70" src="{{ asset('images/FOTO BERANDA/dikdesmen.png') }}" alt="Logo Kemendikbud"
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

            
        </nav>
    </header>

    <main class="main-content galeri-detail-layout">

        <!-- Capaian Section -->
        <section class="galeri-section">
            <h2>CAPAIAN</h2>

            <!-- Navigation Button -->
            <div class="nav-buttons" style="display: flex; justify-content: center; margin: 30px 0;">
                <a href="{{ route('berita') }}" class="btn btn-nav">
                    <i class="fas fa-arrow-left"></i> KEMBALI KE BERITA
                </a>
            </div>

            <!-- Filter & Search Bar -->
            <div class="filter-bar">
                <div class="filter-group">
                    <label for="sort-order">Urutan:</label>
                    <select id="sort-order" name="sort" onchange="window.location.href='{{ route('capaian') }}?sort=' + this.value">
                        <option value="terbaru" {{ ($sort ?? 'terbaru') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                        <option value="terpopuler" {{ ($sort ?? '') == 'terpopuler' ? 'selected' : '' }}>Terpopuler</option>
                        <option value="abjad" {{ ($sort ?? '') == 'abjad' ? 'selected' : '' }}>A-Z</option>
                    </select>
                </div>
                
                <div class="search-materi-bar">
                    <form method="GET" action="{{ route('capaian') }}" style="display: flex; width: 100%;">
                        <input type="text" name="search" placeholder="Cari Capaian..." value="{{ $search ?? '' }}">
                        <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>

            <!-- Capaian Grid Display -->
            <div class="galeri-grid">
                @forelse($capaians as $capaian)
                    <div class="galeri-card">
                        @if($capaian->image_url)
                            <img src="{{ asset($capaian->image_url) }}" alt="{{ $capaian->title }}">
                        @else
                            <img src="{{ asset('images/placeholder.png') }}" alt="{{ $capaian->title }}">
                        @endif
                        <div class="galeri-body">
                            <span class="galeri-date">{{ $capaian->title }}</span>
                            <p>{{ Str::limit(strip_tags($capaian->content), 100) }}</p>
                            <a href="{{ route('berita.show', $capaian->id) }}" class="btn">Selengkapnya</a>
                        </div>
                    </div>
                @empty
                    <p style="text-align: center; padding: 40px; color: #999;">Belum ada capaian tersedia.</p>
                @endforelse
            </div>
        </section>
    </main>

    <!-- Footer -->
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