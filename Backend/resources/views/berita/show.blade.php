<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->title }} - KREASI</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        .detail-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 30px;
            color: #666;
            text-decoration: none;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #333;
        }

        .detail-header {
            margin-bottom: 30px;
        }

        .detail-title {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .detail-meta {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            color: #999;
            font-size: 14px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 2px solid #eee;
        }

        .detail-meta span {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .category-badge {
            display: inline-block;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .category-berita {
            background: #e3f2fd;
            color: #1976d2;
        }

        .category-buletin {
            background: #fff3e0;
            color: #f57c00;
        }

        .category-praktik-baik {
            background: #e8f5e9;
            color: #388e3c;
        }

        .detail-image {
            width: 100%;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .detail-video {
            margin-bottom: 30px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .detail-video iframe {
            width: 100%;
            height: 500px;
            border: none;
        }

        .detail-content {
            line-height: 1.8;
            font-size: 17px;
            color: #333;
        }

        .detail-content p {
            margin-bottom: 20px;
        }

        .share-section {
            margin-top: 50px;
            padding-top: 30px;
            border-top: 2px solid #eee;
        }

        .share-title {
            font-size: 16px;
            color: #666;
            margin-bottom: 15px;
        }

        .share-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .share-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s;
        }

        .share-facebook {
            background: #1877f2;
            color: white;
        }

        .share-twitter {
            background: #1da1f2;
            color: white;
        }

        .share-whatsapp {
            background: #25d366;
            color: white;
        }

        .share-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        @media (max-width: 768px) {
            .detail-title {
                font-size: 28px;
            }

            .detail-video iframe {
                height: 300px;
            }

            .detail-content {
                font-size: 16px;
            }
        }
    </style>
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

            <div class="auth-buttons">
                <button class="btn btn-id">ID</button>
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


