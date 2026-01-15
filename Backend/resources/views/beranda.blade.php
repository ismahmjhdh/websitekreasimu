<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KREASI - Beranda</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}" type="image/x-icon">
</head>
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
                <input type="text" id="searchInput" placeholder="Cari..." autocomplete="off">
                <button class="search-btn"><i class="fas fa-search"></i></button>
                <div id="searchResults" class="search-results"></div>
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

            
        </nav>
    </header>

    <main class="main-content homepage-layout">
        <section class="hero-banner">
            <div class="slider">
                <div class="slides">
                    @forelse ($slides as $slide)
                        <div class="slide">
                            <img src="{{ asset($slide->image_path) }}" alt="{{ $slide->title }}">
                        </div>
                    @empty
                        <div class="slide">
                            <img src="{{ asset('images/FOTO BERANDA/refleksi dan konitor 3 sep .JPG') }}">
                        </div>
                        <div class="slide">
                            <img src="{{ asset('images/FOTO BERANDA/Monitoring Sekolah Mentuban 1.10.25.JPG') }}">
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="agenda-section">
            <h2>AGENDA TERBARU</h2>

            <div class="agenda-grid">
                @forelse ($agendas as $agenda)
                    <div class="agenda-card">
                        <img src="{{ asset($agenda->image_path) }}" alt="{{ $agenda->title }}">
                        <div class="agenda-body">
                            <span class="agenda-date">{{ \Carbon\Carbon::parse($agenda->date)->translatedFormat('d F Y') }}</span>
                            <p>{{ $agenda->title }}</p>
                        </div>
                    </div>
                @empty
                    <p style="text-align: center; grid-column: 1/-1;">Belum ada agenda terbaru.</p>
                @endforelse
            </div>
        </section>

        <section class="map-section">
            
            <h2>LOKASI & INTERVENSI PROGRAM</h2>

            <div class="map-container-full">
                <button class="map-arrow-large map-arrow-prev-large" id="mapPrevBtnLarge"><i class="fas fa-chevron-left"></i></button>

                

                <div class="map-slider-large-wrapper">
                    <div class="map-slider-large-container" id="mapSliderContainerLarge">
                        @forelse ($maps as $map)
                            <img src="{{ Str::startsWith($map->image_path, 'data:') ? $map->image_path : asset($map->image_path) }}" alt="{{ $map->title }}" class="map-image-large">
                        @empty
                            <img src="{{ url('images/FOTO BERANDA/KETAPANG OK OK.png') }}" alt="Peta Ketapang" class="map-image-large">
                            <img src="{{ url('images/FOTO BERANDA/PETA KAYONG UTARA.png') }}" alt="Peta Kayong Utara" class="map-image-large">
                        @endforelse
                    </div>
                </div>

                <button class="map-arrow-large map-arrow-next-large" id="mapNextBtnLarge"><i class="fas fa-chevron-right"></i></button>
            </div>
        </section>

        <section class="section-testimoni">
            <h2>TESTIMONI MITRA</h2>
            <div class="slider-testi">
                <div class="slider-track-testi">

                    @foreach ($testimonis as $testimoni)
                    <div class="card-testi">
                        @if($testimoni->image_path)
                            <img src="{{ asset($testimoni->image_path) }}" class="profile-testi" alt="{{ $testimoni->name }}" onerror="this.onerror=null;this.src='{{ asset('images/FOTO BERANDA/312-3120300_default-profile-hd-png-download.png') }}';">
                        @else
                            <img src="{{ asset('images/FOTO BERANDA/312-3120300_default-profile-hd-png-download.png') }}" class="profile-testi" alt="Default Profile">
                        @endif
                        <h3>{{ $testimoni->name }}</h3>
                        <p class="rating">{{ str_repeat('⭐', $testimoni->rating) }}</p>
                        <span>"{{ $testimoni->content }}"</span>
                    </div>
                    @endforeach
                    @if($testimonis->isEmpty())
                        <div class="card-testi">
                            <p>Belum ada testimoni.</p>
                        </div>
                    @endif

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
                <div class="contact-item"><i class="fas fa-envelope"></i> kreasimu@kreasimuhammadiyah.com</div>

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
            <img src="{{ asset('images/FOOTER/GKL4_Kabupaten Ketapang - Koleksilogo.com (2).png') }}">
            <img src="{{ asset('images/FOOTER/GPE-removebg-preview.png') }}">
            <img src="{{ asset('images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}">
            <img src="{{ asset('images/FOOTER/Logo_SavetheChildren.png') }}">
            <img src="{{ asset('images/FOTO BERANDA/dikdesmen.png') }}">
        </div>
    </footer>

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const searchResults = document.getElementById('searchResults');
            let timeout = null;

            searchInput.addEventListener('input', function() {
                clearTimeout(timeout);
                const query = this.value;

                if (query.length < 2) {
                    searchResults.style.display = 'none';
                    return;
                }

                timeout = setTimeout(() => {
                    fetch(`{{ route('api.search') }}?query=${encodeURIComponent(query)}`)
                        .then(response => response.json())
                        .then(data => {
                            searchResults.innerHTML = '';
                            if (data.length > 0) {
                                data.forEach(item => {
                                    const a = document.createElement('a');
                                    a.href = item.url;
                                    a.className = 'search-result-item';
                                    a.innerHTML = `
                                        <strong>${item.title}</strong>
                                        <div class="type">${item.type}</div>
                                    `;
                                    searchResults.appendChild(a);
                                });
                                searchResults.style.display = 'block';
                            } else {
                                searchResults.innerHTML = '<div class="search-result-item" style="cursor: default;">Tidak ada hasil ditemukan</div>';
                                searchResults.style.display = 'block';
                            }
                        })
                        .catch(err => {
                            console.error('Error searching:', err);
                        });
                }, 300); // Debounce 300ms
            });

            // Close when clicking outside
            document.addEventListener('click', function(e) {
                if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                    searchResults.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
