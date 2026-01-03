<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $materi->title }} - Materi</title>
    <link rel="stylesheet" href="{{ asset('css/public-pages.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Header Section -->
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
            <a href="{{ route('materi') }}" class="nav-item active">MATERI</a>

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

    <!-- Main Content -->
    <main class="main-content">
        <div class="materi-detail-container">
            <a href="{{ route('materi') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i> Kembali ke Materi
            </a>

            <!-- Thumbnail -->
            @if($materi->thumbnail_url)
                <div style="margin-bottom: 20px; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">
                    <img src="{{ asset($materi->thumbnail_url) }}" alt="{{ $materi->title }}" style="width: 100%; max-height: 400px; object-fit: cover;">
                </div>
            @endif

            <!-- Header -->
            <div class="materi-header">
                <h1>{{ $materi->title }}</h1>
                <p>{{ Str::limit($materi->description, 150) }}</p>
                <div class="materi-meta">
                    <div class="materi-meta-item">
                        <i class="fas fa-calendar"></i>
                        <span>{{ date('d F Y', strtotime($materi->created_at)) }}</span>
                    </div>
                    <div class="materi-meta-item">
                        <i class="fas fa-file-pdf"></i>
                        <span>{{ $materi->files->count() }} File PDF</span>
                    </div>
                </div>
            </div>

            <!-- Description -->
            @if($materi->description)
                <div class="description-section">
                    <h2>Deskripsi Materi</h2>
                    <p>{{ $materi->description }}</p>
                </div>
            @endif

            <!-- Files -->
            <div class="files-section">
                <h2>
                    <i class="fas fa-folder-open"></i>
                    File Pembelajaran ({{ $materi->files->count() }} file)
                </h2>

                @if($materi->files && $materi->files->count() > 0)
                    <ul class="files-list">
                        @foreach($materi->files as $file)
                            <li class="file-item">
                                <div class="file-info">
                                    <div class="file-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </div>
                                    <div class="file-details">
                                        <div class="file-name">{{ $file->file_name }}</div>
                                        <div class="file-size">
                                            <i class="fas fa-database"></i>
                                            {{ formatBytes($file->file_size) }}
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('materi.download', ['materiId' => $materi->id, 'fileId' => $file->id]) }}" 
                                   class="download-btn">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="empty-files">
                        <i class="fas fa-inbox"></i>
                        <h3>Belum ada file</h3>
                        <p>Materi ini belum memiliki file pembelajaran</p>
                    </div>
                @endif
            </div>
        </div>
    </main>

    <!-- Footer Section -->
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
    <script>
        function formatBytes(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
        }
    </script>
</body>
</html>
