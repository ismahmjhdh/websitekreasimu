<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KREASI - Galeri Detail</title>
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
            $galeri = $galeri ?? (object)['caption' => 'NAMA KEGIATAN', 'image_url' => '', 'type' => 'photo', 'id' => 0];
            $type = $type ?? 'photo';
        @endphp

        <h1 class="galeri-title">{{ $galeri->caption ?? 'NAMA KEGIATAN' }}</h1>

        <div class="galeri-detail-container">
            @if($galeri->type == 'video' && $galeri->video_url)
                <div class="video-detail-wrapper" style="width: 100%; max-width: 900px; margin: 0 auto;">
                    @php
                        $videoUrl = $galeri->video_url;
                        if (strpos($videoUrl, 'watch?v=') !== false) {
                            $videoUrl = str_replace('watch?v=', 'embed/', $videoUrl);
                        } elseif (strpos($videoUrl, 'youtu.be/') !== false) {
                            $videoUrl = str_replace('youtu.be/', 'www.youtube.com/embed/', $videoUrl);
                        }
                    @endphp
                    <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                        <iframe src="{{ $videoUrl }}" 
                                frameborder="0" 
                                allowfullscreen
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                        </iframe>
                    </div>
                    <div style="margin-top: 20px; text-align: center;">
                        <p style="color: #666;">{{ date('d F Y', strtotime($galeri->created_at)) }}</p>
                    </div>
                </div>
            @else
                <div class="galeri-header">
                    <div class="galeri-label">FOTO <span id="galeri-current">1</span></div>
                    <div class="galeri-counter-badge"><span id="galeri-current-badge">1</span>/<span id="galeri-total">{{ $galeri->images->count() ?: 1 }}</span></div>
                </div>

                <div class="galeri-viewer-container">
                    @if($galeri->images->count() > 1)
                        <button class="galeri-arrow galeri-arrow-prev" id="galeriPrevBtn" aria-label="Previous">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                    @endif

                    <div class="galeri-image-wrapper">
                        <div class="galeri-image-slider" id="galeriImageSlider">
                            @forelse($galeri->images as $index => $img)
                                <div class="galeri-image-item" data-index="{{ $index }}">
                                    <img src="{{ asset($img->image_path) }}" alt="{{ $galeri->caption }}">
                                </div>
                            @empty
                                <div class="galeri-image-item" data-index="0">
                                    <img src="{{ asset($galeri->image_url) }}" alt="{{ $galeri->caption }}">
                                </div>
                            @endforelse
                        </div>
                    </div>

                    @if($galeri->images->count() > 1)
                        <button class="galeri-arrow galeri-arrow-next" id="galeriNextBtn" aria-label="Next">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    @endif
                </div>
            @endif

            <div class="galeri-actions" style="margin-top: 30px; display: flex; justify-content: center; gap: 20px;">
                <a href="{{ route('galeri', ['type' => $galeri->type]) }}" class="unduh-btn" style="background: #6c757d;">KEMBALI</a>
                @if($galeri->type == 'photo')
                    {{-- Assuming there might be a download feature later --}}
                    {{-- <a href="#" class="unduh-btn">UNDUH ZIP</a> --}}
                @endif
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

