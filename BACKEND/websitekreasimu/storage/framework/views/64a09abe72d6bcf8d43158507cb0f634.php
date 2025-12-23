<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KREASI - Beranda</title>

    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header class="main-header">
        <div class="top-bar">
            <div class="logo">
                <img height="70" src="<?php echo e(asset (path: 'images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png')); ?>"alt="LOGO KREASI" class="kresi-logo">
            </div>
            <div class="search-box">
                <input type="text" placeholder="Cari...">
                <button class="search-btn"><i class="fas fa-search"></i></button>
            </div>
            <div class="right-logos">
                <img height="70" src="<?php echo e(asset (path: 'images/FOTO BERANDA/dikdesmen.png')); ?>" alt="Logo Kemendikbud" class="kemendikbud-logo">
            </div>
        </div>

        <button class="hamburger-menu" id="hamburger"><i class="fas fa-bars"></i></button>
        
        <nav class="main-nav" id="main-nav-menu">
            <a href="BERANDA.html" class="nav-item active">BERANDA</a>
            <div class="nav-item has-dropdown">PROFILE <i class="fas fa-caret-right"></i>
                <div class="dropdown-content profile-dropdown">
                    <a href="profile.html">TENTANG</a>
                    <a href="profile.html#tujuan">TUJUAN</a>
                    <a href="profile.html#program">PROGRAM KREASI</a>
                    <a href="profile.html#struktur">STRUKTUR</a>
                </div>
            </div>
            <a href="berita.html" class="nav-item">BERITA</a>
            <a href="materi.html" class="nav-item">MATERI</a>
            <div class="nav-item has-dropdown">GALERI <i class="fas fa-caret-right"></i>
                <div class="dropdown-content galeri-dropdown">
                    <a href="galeri.html">FOTO KEGIATAN</a>
                    <a href="#">VIDEO</a>
                </div>
            </div>
            <div class="auth-buttons">
                <button class="btn btn-id">ID</button>
            </div>
        </nav>
    </header>

    <main class="main-content homepage-layout">
        <section class="hero-banner">
            <div class="slider">
                 <div class="slides">
                <div class="slide"> <img src="<?php echo e(asset (path: 'images/FOTO BERANDA/Kampanye Perlindungan Anak 10.9.25.jpegn')); ?> "></div>
                <div class="slide"> <img src="<?php echo e(asset (path: 'images/FOTO BERANDA/Monitoring Sekolah Mentuban 1.10.25.JPG')); ?>"></div>
                <div class="slide"> <img src="<?php echo e(asset (path: 'images/FOTO BERANDA/meeting kreasi bersama lptk.JPG')); ?>"></div>
                <div class="slide"> <img src="<?php echo e(asset (path: 'images/FOTO BERANDA/learning revitais 18.9.25.JPG')); ?>"></div>
                <div class="slide"> <img src="<?php echo e(asset (path: 'images/FOTO BERANDA/refleksi dan konitor 3 sep .JPG')); ?>"></div>
            </div>
            </div>
        </section>

        <section class="agenda-section">
  <h2>AGENDA TERBARU</h2>

  <div class="agenda-grid">
    <div class="agenda-card">
      <img src="<?php echo e(asset (path :'images/FOTO BERANDA/gambar1.jpg')); ?>" alt="">
      <div class="agenda-body">
        <span class="agenda-date">10 Agustus 2025</span>
        <p>Kampanye Perlindungan Anak</p>
      </div>
    </div>

    <div class="agenda-card">
      <img src="<?php echo e(asset (path :'images/FOTO BERANDA/gambar2.jpg')); ?>" alt="">
      <div class="agenda-body">
        <span class="agenda-date">01 Oktober 2025</span>
        <p>Monitoring Sekolah Mentubang</p>
      </div>
    </div>

    <div class="agenda-card">
      <img src="<?php echo e(asset (path :'images/FOTO BERANDA/gambar3.jpg')); ?>" alt="">
      <div class="agenda-body">
        <span class="agenda-date">11 November 2025</span>
        <p>Kampanye Perlindungan Anak SD Negeri 12 Pelerang</p>
      </div>
    </div>
  </div>
</section>


       <section class="map-section">
  <h2>LOKASI & INTERVENSI PROGRAM</h2>

  <div class="map-wrapper">
    
    <!-- PANAH KIRI -->
    <button class="arrow left" onclick="prevMap()">&#10094;</button>

    <!-- KONTEN -->
    <div class="map-content">
      
      <!-- KIRI -->
      <div class="map-info">
        <div class="info-box">
          <h3>Tahun 2025:</h3>
          <ul>
            <li>3 Kecamatan</li>
            <li>30 SD/MI</li>
            <li>10 TK/RA</li>
          </ul>
        </div>

        <div class="legend">
          <div><span class="green"></span> 3 Kecamatan Intervensi</div>
          <div><span class="red"></span> 14 Kecamatan Yang Akan Terdampak</div>
        </div>
      </div>

      <!-- KANAN (SLIDER MAP) -->
      <div class="map-slider">
        <div class="map-track" id="mapTrack">
          <img src="<?php echo e(asset (path: 'images/FOTO BERANDA/KETAPANG OK OK.png')); ?>" alt="peta ketapang">
          <img src="<?php echo e(asset (path: 'images/FOTO BERANDA/PETA KAYONG UTARA.png')); ?>" alt="peta kayong">
          <img src="<?php echo e(asset (path: 'map3.png')); ?>" alt="Map 3">
        </div>
      </div>

    </div>

    <!-- PANAH KANAN -->
    <button class="arrow right" onclick="nextMap()">&#10095;</button>

  </div>
</section>


        <section class="section-testimoni">
            <h2>TESTIMONI MITRA</h2>
            <div class="slider-testi">
            <div class="slider-track-testi">
      
      <!-- Card 1 -->
      <div class="card-testi">
        <img src="<?php echo e(asset (path: 'images/FOTO BERANDA\312-3120300_default-profile-hd-png-download.png')); ?>" alt="Foto" class="profile-testi">
        <h3>Desta Saputra</h3>
        <p>⭐⭐⭐⭐⭐</p>
        <span>Bla bla la bal bal</span>
      </div>

      <!-- Card 2 -->
      <div class="card-testi">
        <img src="<?php echo e(asset (path: 'images/FOTO BERANDA\312-3120300_default-profile-hd-png-download.png')); ?>" alt="Foto" class="profile-testi">
        <h3>Desta Saputra</h3>
        <p>⭐⭐⭐⭐⭐</p>
        <span>Bla bla la bal bal</span>
      </div>

      <!-- Card 3 -->
      <div class="card-testi">
        <img src="<?php echo e(asset (path: 'images/FOTO BERANDA\312-3120300_default-profile-hd-png-download.png')); ?>" alt="Foto" class="profile-testi">
        <h3>Desta Saputra</h3>
        <p>⭐⭐⭐⭐⭐</p>
        <span>Bla bla la bal bal</span>
      </div>

      <!-- DUPLIKASI UNTUK LOOP INFINITE -->
      <div class="card-testi">
        <img src="<?php echo e(asset (path: 'images/FOTO BERANDA\312-3120300_default-profile-hd-png-download.png')); ?>" class="profile-testi">
        <h3>Desta Saputra</h3>
        <p>⭐⭐⭐⭐⭐</p>
        <span>Bla bla la bal bal</span>
      </div>

      <div class="card-testi">
        <img src="<?php echo e(asset (path: 'images/FOTO BERANDA\312-3120300_default-profile-hd-png-download.png')); ?>" class="profile-testi">
        <h3>Desta Saputra</h3>
        <p>⭐⭐⭐⭐⭐</p>
        <span>Bla bla la bal bal</span>
      </div>

      <div class="card-testi">
        <img src="<?php echo e(asset (path: 'images/FOTO BERANDA\312-3120300_default-profile-hd-png-download.png')); ?>" class="profile-testi">
        <h3>Desta Saputra</h3>
        <p>⭐⭐⭐⭐⭐</p>
        <span>Bla bla la bal bal</span>
      </div>

        </div>
        </div>
        </section>
    </main>

    <footer class="footer">
  <div class="footer-content">

    <!-- About Us -->
    <div class="footer-left">
      <h2>About Us</h2>
      <p>KREASI adalah pusat kolaborasi untuk memajukan 
        pendidikan anak Indonesia melalui </p>
      <p>inovasi dan akses materi berkualitas.</p>
    </div>

    <!-- Contact Information -->
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
        <a href="https://www.facebook.com/SaveChildrenID/" target="_blank"> <img src="<?php echo e(asset (path: 'images/FOOTER\Facebook_font_awesome.svg.png')); ?>"> </a>
        <a href="https://www.instagram.com/savechildren_id" target="_blank"> <img src="<?php echo e(asset (path: 'images/FOOTER\Instagram.png')); ?>"></a>
        <a href="https://x.com/savechildren_id" target="_blank"> <img src="<?php echo e(asset (path: 'images/FOOTER\Twitter_X.png')); ?>"></a>
        <a href="https://www.linkedin.com/company/savethechildren-indonesia/" target="_blank"> <img src="<?php echo e(asset (path: 'images/FOOTER\LinkedIn_logo_In-Black.svg.png')); ?>"></a>
        <a href="#" target="_blank"> <img src="FOOTER\Tiktok_icon.svg.png"></a>
      </div>
    </div>
  </div>

  <!-- Logo Bar -->
  <div class="logo-row">
    <img src="<?php echo e(asset (path: 'images/FOOTER\Tut wuri handayani.png')); ?>" alt="">
    <img src="<?php echo e(asset (path: 'images/FOOTER\Kementerian_Agama_new_logo.png')); ?>" alt="">
    <img src="<?php echo e(asset (path: 'images/FOOTER\Logo_Kementerian_PPN-Bappenas_(2023).png')); ?>" alt="">
    <img src="<?php echo e(asset (path: 'images/FOOTER\Lambang_Daerah_Kab._Kayong_Utara.png')); ?>" alt="">
    <img src="<?php echo e(asset (path: 'images/FOOTER\GPE.png')); ?>" alt="">
    <img src="<?php echo e(asset (path: 'images/FOTO BERANDA\KREASI-SYMBOL_KREASI--768x416.png')); ?>" alt="">
    <img src="<?php echo e(asset (path: 'images/FOOTER\Logo_SavetheChildren.png')); ?>" alt="">
    <img src="<?php echo e(asset (path: 'images/FOTO BERANDA\dikdesmen.png')); ?>" alt="">
  </div>
</footer>
    
    <script src="js/scripts.js"></script>
</body>

</html><?php /**PATH I:\File Ismah\GitHub\websitekreasimu\BACKEND\websitekreasimu\resources\views/beranda.blade.php ENDPATH**/ ?>