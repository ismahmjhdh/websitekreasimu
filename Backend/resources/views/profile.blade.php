<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KREASI - Profile</title>

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
        <a href="{{ route('beranda') }}" class="nav-item">BERANDA</a>

        <div class="nav-item active has-dropdown">
            PROFILE <i class="fas fa-caret-right"></i>
            <div class="dropdown-content profile-dropdown">
                <a href="#tentang">TENTANG</a>
                <a href="#tujuan">TUJUAN</a>
                <a href="#program">PROGRAM KREASI</a>
                <a href="#struktur">STRUKTUR</a>
            </div>
        </div>

        <a href="{{ route('berita') }}" class="nav-item">BERITA</a>
        <a href="{{ route('materi') }}" class="nav-item">MATERI</a>

        <div class="nav-item has-dropdown">
            GALERI <i class="fas fa-caret-right"></i>
            <div class="dropdown-content galeri-dropdown">
                <a href="#">FOTO KEGIATAN</a>
                <a href="#">VIDEO</a>
            </div>
        </div>

        <div class="auth-buttons">
            <button class="btn btn-id">ID</button>
        </div>
    </nav>
</header>

<!-- ABOUT -->
<section id="tentang" class="profile-section about-hero">
    <div class="container">
        <img src="{{ asset('images/FOTO PROFILE/kappframework-VphNwN(1)(1).png') }}" alt="Foto About Us">
    </div>

    <div class="overlay">
        <div class="text">
            <a href="#kreasi" class="about-scroll">ABOUT US</a>
        </div>
    </div>
</section>

<!-- DIKDASMEN -->
<section id="dikdasmen" class="profile-section">
    <img src="{{ asset('images/FOTO BERANDA/dikdesmen.png') }}">
    <div class="logo-box">
        <p>
            Majelis Pendidikan Dasar Menengah dan Pendidikan Nonformal Pimpinan
            Pusat Muhammadiyah sebagai lembaga mitra lokal bekerja sama dengan
            Save the Children menyelenggarakan Program Kolaborasi Edukasi Untuk
            Anak Indonesia (KREASI) yang berfokus pada penguatan literasi,
            numerasi, dan karakter murid.
        </p>
    </div>
</section>

<!-- KREASI -->
<section id="kreasi" class="profile-section kreasi">
    <div class="left">
        <img src="{{ asset('images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}"
             class="logo-kreasi">
    </div>

    <div class="right">
        <p>
            (Kolaborasi untuk Edukasi Anak Indonesia) merupakan program yang
            didanai oleh Global Partnership for Education (GPE) dan dikembangkan
            bersama Kementerian Pendidikan Dasar dan Menengah & Kementerian Agama.
        </p>
    </div>
</section>

<!-- TUJUAN -->
<section id="tujuan" class="profile-section tujuan-box">
    <h2>TUJUAN</h2>
    <p>
        KREASI bertujuan meningkatkan kualitas pendidikan Indonesia melalui
        pembelajaran esensial, holistik, relevan, dan berkelanjutan.
    </p>
</section>

<!-- PROGRAM -->
<section id="program" class="profile-section split-kreasi">
    <div class="split-left">
        <div class="image-container">
            <img src="{{ asset('images/FOTO PROFILE/IMG_8446.JPG') }}">
            <div class="overlay-text">
                <h2>PROGRAM<br>KREASI</h2>
            </div>
        </div>
    </div>

    <div class="split-right">
        <div class="split-box">
            <p>
                Program kolaboratif bersama Global Partnership for Education (GPE)
                dan Mitra Pendidikan Indonesia (MPI).
            </p>
        </div>
    </div>
</section>

<!-- STRUKTUR -->
<section id="struktur" class="profile-section">
    <h2>TIM PROGRAM KREASI<br>KABUPATEN KETAPANG</h2>

    <div class="struktur-container">
        <div class="card-struktur">
            <img src="{{ asset('images/Foto Struktur organisasi/2.png') }}">
            <h3>Julni Rhamawan</h3>
            <p>Program Manager</p>
        </div>

        <div class="card-struktur">
            <img src="{{ asset('images/Foto Struktur organisasi/3.png') }}">
            <h3>Santoso Setio</h3>
            <p>Program Coordinator</p>
        </div>
    </div>

    <div class="struktur-container">
    <div class="card-struktur">
        <img src="{{ asset('images/Foto Struktur organisasi/5.png') }}" class="img-pop-tim" alt="struktur">
        <h3 class="nama">Syarif Syamsurrizal</h3>
        <p class="jabatan">Advocacy Officer
        <br>KREASI Kabupaten Ketapang</p>
    </div>

    <div class="card-struktur">
        <img src="{{ asset('images/Foto Struktur organisasi/6.png') }}" class="img-pop-tim" alt="struktur">
        <h3 class="nama">Jainal Abidin</h3>
        <p class="jabatan">Basic Education
        <br>KREASI Kabupaten Ketapang</p>
    </div>

    <div class="card-struktur">
        <img src="{{ asset('images/Foto Struktur organisasi/11.png') }}" class="img-pop-tim" alt="struktur">
        <h3 class="nama">Ilma Karmila</h3>
        <p class="jabatan">Early Childhood <br>Education Development
        <br>KREASI Kabupaten Ketapang</p>
    </div>

    <div class="card-struktur">
        <img src="{{ asset('images/Foto Struktur organisasi/9.png') }}" class="img-pop-tim" alt="struktur">
        <h3 class="nama">Siti Mauliani</h3>
        <p class="jabatan">Child Protection Officer
        <br>KREASI Kabupaten Ketapang</p>
    </div>
</div>

<div class="struktur-container">
    <div class="card-struktur">
        <img src="{{ asset('images/Foto Struktur organisasi/4.png') }}" class="img-pop-tim" alt="struktur">
        <h3 class="nama">Sujiman</h3>
        <p class="jabatan">Monitoring, Evaluation, <br>Accountability & Learning Officer
        <br>KREASI Kabupaten Ketapang</p>
    </div>

    <div class="card-struktur">
        <img src="{{ asset('images/Foto Struktur organisasi/8.png') }}" class="img-pop-tim" alt="struktur">
        <h3 class="nama">Afriyandi Nur Huda</h3>
        <p class="jabatan">Communcitions & Media Officer
        <br>KREASI Kabupaten Ketapang</p>
    </div>

    <div class="card-struktur">
        <img src="{{ asset('images/Foto Struktur organisasi/7.png') }}" class="img-pop-tim" alt="struktur">
        <h3 class="nama">Heri Setiawan</h3>
        <p class="jabatan">Logistic Officer
        <br>KREASI Kabupaten Ketapang</p>
    </div>

    <div class="card-struktur">
        <img src="{{ asset('images/Foto Struktur organisasi/10.png') }}" class="img-pop-tim" alt="struktur">
        <h3 class="nama">Nur Malina <br>Indah Putri</h3>
        <p class="jabatan">Finance Officer
        <br>KREASI Kabupaten Ketapang</p>
    </div>
</div>

</section>

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

  <!-- Logo Bar -->
  <div class="logo-row">
    <img src="{{ asset('images/FOOTER/Tut wuri handayani1.png') }}" alt="">
    <img src="{{ asset('images/FOOTER/Kementerian_Agama_new_logo.png') }}" alt="">
    <img src="{{ asset('images/FOOTER/Logo_Kementerian_PPN-Bappenas_(2023).png') }}" alt="">
    <img src="{{ asset('images/FOOTER/Lambang_Daerah_Kab._Kayong_Utara.png') }}" alt="">
    <img src="{{ asset('images/FOOTER/GPE-removebg-preview.png') }}" alt="">
    <img src="{{ asset('images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}" alt="">
    <img src="{{ asset('images/FOOTER/Logo_SavetheChildren.png') }}" alt="">
    <img src="{{ asset('images/FOTO BERANDA/dikdesmen.png') }}" alt="">
  </div>
</footer>

<script src="{{ asset('scripts.js') }}"></script>
</body>
</html>

