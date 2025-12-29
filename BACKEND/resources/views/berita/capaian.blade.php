<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KREASI - Capaian</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                    <a href="{{ route('galeri') }}">FOTO KEGIATAN</a>
                    <a href="{{ url('galeri') }}">VIDEO KEGIATAN</a>
                </div>
            </div>

            <div class="auth-buttons">
                <button class="btn btn-id">ID</button>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content berita-layout">
        <h1 class="page-title">CAPAIAN</h1>

        <!-- Navigation Button -->
        <div class="nav-buttons">
            <a href="{{ route('berita') }}" class="btn btn-nav">
                <i class="fas fa-arrow-left"></i> KEMBALI KE BERITA
            </a>
        </div>

        <!-- Filter & Search Bar -->
        <div class="filter-bar">
            <div class="filter-group">
                <label for="sort-order">Urutan:</label>
                <select id="sort-order" name="sort" onchange="window.location.href='{{ route('capaian') }}?sort=' + this.value + '{{ $search ? '&search=' . $search : '' }}'">
                    <option value="terbaru" {{ ($sort ?? 'terbaru') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                    <option value="terpopuler" {{ ($sort ?? '') == 'terpopuler' ? 'selected' : '' }}>Terpopuler</option>
                    <option value="abjad" {{ ($sort ?? '') == 'abjad' ? 'selected' : '' }}>A-Z</option>
                </select>
            </div>

            <div class="search-materi-bar">
                <form method="GET" action="{{ route('capaian') }}">
                    <input type="search" name="search" placeholder="Cari Capaian..." value="{{ $search ?? '' }}">
                    <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                </form>
            </div>

            @if($search)
                <a href="{{ route('capaian') }}" class="btn btn-reset">
                    <i class="fas fa-redo"></i> Reset
                </a>
            @endif
        </div>

        <!-- Search Result Info -->
        @if($search)
            <div class="search-info">
                <p>
                    <i class="fas fa-search"></i> Menampilkan hasil pencarian untuk:
                    <strong>"{{ $search }}"</strong>
                    ({{ $capaians->count() }} hasil ditemukan)
                </p>
            </div>
        @endif

        <!-- Capaian List -->
        <div class="capaian-list">
            <section class="capaian-section">
                @forelse($capaians as $capaian)
                    <div class="capaian-item">
                        <div class="capaian-content">
                            <h3>{{ $capaian->title }}</h3>
                            <p>{{ Str::limit(strip_tags($capaian->content), 200) }}</p>
                            <a href="{{ route('berita.show', $capaian->id) }}" class="btn">Selengkapnya</a>
                        </div>

                        @if($capaian->image_url)
                            <div class="capaian-img">
                                <img src="{{ asset($capaian->image_url) }}" alt="{{ $capaian->title }}">
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-trophy"></i>
                        <h3>Belum ada capaian tersedia</h3>
                        @if($search)
                            <p>Coba gunakan kata kunci yang berbeda</p>
                            <a href="{{ route('capaian') }}" class="btn">
                                <i class="fas fa-arrow-left"></i> Kembali ke semua capaian
                            </a>
                        @endif
                    </div>
                @endforelse
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <!-- Footer Left -->
            <div class="footer-left">
                <h2>About Us</h2>
                <p>KREASI adalah pusat kolaborasi untuk memajukan pendidikan anak Indonesia melalui inovasi dan akses materi berkualitas.</p>
            </div>

            <!-- Footer Right -->
            <div class="footer-right">
                <h2>Contact Information</h2>
                <p class="subtitle">feel free to contact and reach us!</p>

                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    Jalan Bangka IX Nomor 40A&B, Pela Mampang, Mampang Prapatan, Jakarta Selatan, DKI Jakarta 12720
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i> (+62) 217824415
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i> Indonesia.KREASI@savethechildren.org
                </div>

                <!-- Social Icons -->
                <div class="social-icons">
                    <a href="https://www.facebook.com/SaveChildrenID/" target="_blank">
                        <img src="{{ asset('images/FOOTER/Facebook_font_awesome.svg.png') }}" alt="Facebook">
                    </a>
                    <a href="https://www.instagram.com/savechildren_id" target="_blank">
                        <img src="{{ asset('images/FOOTER/Instagram.png') }}" alt="Instagram">
                    </a>
                    <a href="https://x.com/savechildren_id" target="_blank">
                        <img src="{{ asset('images/FOOTER/Twitter_X.png') }}" alt="Twitter X">
                    </a>
                    <a href="https://www.linkedin.com/company/savethechildren-indonesia/" target="_blank">
                        <img src="{{ asset('images/FOOTER/LinkedIn_logo_In-Black.svg.png') }}" alt="LinkedIn">
                    </a>
                    <a href="#" target="_blank">
                        <img src="{{ asset('images/FOOTER/Tiktok_icon.svg.png') }}" alt="TikTok">
                    </a>
                </div>
            </div>
        </div>

        <!-- Partner Logos -->
        <div class="logo-row">
            <img src="{{ asset('images/FOOTER/Tut wuri handayani1.png') }}" alt="Tut Wuri Handayani">
            <img src="{{ asset('images/FOOTER/Kementerian_Agama_new_logo.png') }}" alt="Kementerian Agama">
            <img src="{{ asset('images/FOOTER/Logo_Kementerian_PPN-Bappenas_(2023).png') }}" alt="Kementerian PPN">
            <img src="{{ asset('images/FOOTER/Lambang_Daerah_Kab._Kayong_Utara.png') }}" alt="Kayong Utara">
            <img src="{{ asset('images/FOOTER/GPE-removebg-preview.png') }}" alt="GPE">
            <img src="{{ asset('images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}" alt="KREASI">
            <img src="{{ asset('images/FOOTER/Logo_SavetheChildren.png') }}" alt="Save the Children">
            <img src="{{ asset('images/FOTO BERANDA/dikdesmen.png') }}" alt="Dikdesmen">
        </div>
    </footer>

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>