<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KREASI - Profile</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}" type="image/x-icon">

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



        <div class="right-logos">
            <img height="70"
                 src="{{ asset('images/FOTO BERANDA/dikdesmen.png') }}"
                 alt="Logo Kemendikbud"
                 class="kemendikbud-logo">
        </div>
    </div>

    <button class="hamburger-menu" id="hamburger" aria-label="Toggle navigation menu">
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
                <a href="{{ route('galeri', ['type' => 'photo']) }}">FOTO KEGIATAN</a>
                <a href="{{ route('galeri', ['type' => 'video']) }}">VIDEO KEGIATAN</a>
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
    <img src="{{ asset('images/FOTO BERANDA/dikdesmen.png') }}" alt="Logo Dikdasmen">
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
             alt="Logo KREASI"
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
        KREASI bertujuan untuk meningkatkan kualitas pendidikan di Indonesia dengan memperkuat pengajaran, 
        pembelajaran, dan pengembangan siswa. KREASI melalui Agen Hibahnya, Save the Children Australia dan 
        Save the Children Indonesia sebagai perwakilan di Indonesia, ditunjuk oleh Kementerian Pendidikan Dasar 
        dan Menengah (Kemen Dikdasmen) dan Kementerian Agama (Kemenag), dengan dukungan dari Mitra Pendidikan 
        Indonesia (MPI), sebuah konsorsium yang terdiri dari 17 organisasi pemangku kepentingan pendidikan 
        internasional dan lokal. Program KREASI selaras dengan tujuan pendidikan nasional Indonesia yang 
        menekankan proses pembelajaran esensial dan fleksibel yang disesuaikan dengan minat, bakat, dan kebutuhan 
        setiap siswa, dengan fokus pada pendidikan holistik, relevan, dan berkelanjutan.
    </p>
</section>

<!-- PROGRAM -->
<section id="program" class="profile-section split-kreasi">
    <div class="split-left">
        <div class="image-container">
            <img src="{{ asset('images/FOTO PROFILE/IMG_8446.JPG') }}" alt="Program KREASI">
            <div class="overlay-text">
                <h2>PROGRAM<br>KREASI</h2>
            </div>
        </div>
    </div>

    <div class="split-right">
        <div class="split-box">
            <p>
                Program KREASI di Provinsi Kalimantan Barat bekerja di dua (2) kabupaten yaitu Kabupaten 
                Ketapang dan Kabupaten Kayong Utara dengan Mitra Pelaksana Lokal adalah Majelis Dikdasmen 
                dan PNF Pimpinan Pusat Muhammadiyah. Sasaran program KREASI adalah sekolah di tingkat 
                Pendidikan Anak Usia Dini (PAUD) dan Raudhatul Athfal (RA) serta Sekolah Dasar (SD) dan 
                Madrasah Ibtidaiyah (MI).
            </p>
        </div>
    </div>
</section>

<!-- GOALS -->
<section id="goals" class="profile-section goals-kreasi">
    <h2><span class="red-goals">GOALS</span> PROGRAM KREASI</h2>
    <p>
        Peningkatan pencapaian keterampilan dasar <span class="red-goals">
        (Literasi, Numerasi, Pendidikan Karakter)</span> 
        untuk siswa TK/RA dan SD/MI Indonesia
    </p>
    
    <div class="flip-card">
        <div class="flip-inner">
            <!-- DEPAN (biru) -->
            <div class="flip-front">
                <h3>Kurikulum dan Asessmen</h3>
            </div>

            <!-- BELAKANG (hijau) -->
            <div class="flip-back">
                <p>
                    Kebijakan dan praktik untuk kurikulum materi pembelajaran dan 
                    penilaian keterampilan dasar prasekolah dan sekolah dasar yang 
                    merata di tingkat nasional dan sub-nasional.
                </p>
            </div>
        </div>  
    </div>

    <div class="flip-card">
        <div class="flip-inner">
            <!-- DEPAN (biru) -->
            <div class="flip-front">
                <h3>Praktik Pembelajaran</h3>
            </div>

            <!-- BELAKANG (hijau) -->
            <div class="flip-back">
                <p>
                    Kebijakan dan praktik yang ditingkatkan untuk pengajaran keterampilan 
                    dasar yang merata di daerah target
                </p>
            </div>
        </div>
    </div>  

    <div class="flip-card">
        <div class="flip-inner">
            <!-- DEPAN (biru) -->
            <div class="flip-front">
                <h3>Kepemimpinan Pendidikan</h3>
            </div>

            <!-- BELAKANG (hijau) -->
            <div class="flip-back">
                <p>
                    Kebijakan dan praktik yang ditingkatkan untuk kepemimpinan pengajaran 
                    dan pembelajaran yang adil dan efektif di daerah yang di targetkan
                </p>
            </div>
        </div>
    </div>  

    <div class="flip-card">
        <div class="flip-inner">
            <!-- DEPAN (biru) -->
            <div class="flip-front">
                <h3>Perlindungan Anak</h3>
            </div>

            <!-- BELAKANG (hijau) -->
            <div class="flip-back">
                <p>
                    Kebijakan dan praktik yang lebih baik untuk perlindungan 
                    anak yang adil dan pencegahan kekerasan di daerah yang di 
                    targetkan
                </p>
            </div>
        </div>
    </div> 

    <div class="static-card">
        <h3>Kesetaraan gender, disabilitas, inklusi sosial (GEDSI)</h3>
    </div>

    <div class="static-card">
        <h3>Perubahan iklim adaptasi dan mitigasi (Climate Change)</h3>
    </div>
</section>

<!-- STRUKTUR -->
<section id="struktur" class="profile-section struktur-organisasi">
    <h2>STRUKTUR ORGANISASI KREASI</h2> 
    
    <div class="struktur-btn-container">
        <button class="struktur-btn-card struktur-btn-red" onclick="showStruktur(1)">
            <h3>Pimpinan Pusat</h3>
        </button>
        <button class="struktur-btn-card struktur-btn-red" onclick="showStruktur(2)">
            <h3>Tim Pelaksana Program</h3>
        </button>
    </div>
    

    <div id="struktur1" class="struktur">
        <div class="struktur-container">
            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/pak didik.png') }}" class="img-pop-tim" alt="Julni Rhamawan">
                <h3 class="nama">Didik Suhardi, Ph.D.</h3>
                <p class="jabatan">Pengarah KREASI<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>

            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/pak khairul.png') }}" class="img-pop-tim" alt="Julni Rhamawan">
                <h3 class="nama">Muhammad Khoirul Huda, M.Pd.</h3>
                <p class="jabatan">Pengarah KREASI<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>

            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/pak kusuma.png') }}" class="img-pop-tim" alt="Julni Rhamawan">
                <h3 class="nama"> Ir. Ananto Kusuma Seta, M.Sc., Ph.D.</h3>
                <p class="jabatan">Pengarah KREASI<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>
        </div>

        <div class="struktur-container">
            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/pak gufron.png') }}" class="img-pop-tim" alt="Julni Rhamawan">
                <h3 class="nama">Dr. Gufron Amirullah M, Pd</h3>
                <p class="jabatan">Direktur KREASI<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>
            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/bu dein.png') }}" class="img-pop-tim" alt="Julni Rhamawan">
                <h3 class="nama">Dr. Dien Nurmarina Malik, M.A.</h3>
                <p class="jabatan">Penjamin Mutu KREASI<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>

            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/pak sofyan.png') }}" class="img-pop-tim" alt="Julni Rhamawan">
                <h3 class="nama">Muhammad Sofyan, M.T.</h3>
                <p class="jabatan">Finance Manager KREASI<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>

        </div>

         <div class="struktur-container">
            
            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/pak fauzi.png') }}" class="img-pop-tim" alt="Julni Rhamawan">
                <h3 class="nama">Fazhar Restu Fauzi, S.Kom. , M.M.</h3>
                <p class="jabatan">Human Resources Development KREASI<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>

        <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/pak dendi.png') }}" class="img-pop-tim" alt="Julni Rhamawan">
                <h3 class="nama">Dr. Dendi Wijaya Saputra, M.Pd</h3>
                <p class="jabatan">Safeguarding Focal Point dan Logistik Pusat KREASI<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>

        </div>
    </div>

    <div id="struktur2" class="struktur">
        <!-- PROGRAM MANAGER -->
        <div class="struktur-container">
            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/Julni Rhamawan.png') }}" class="img-pop-tim" alt="Julni Rhamawan">
                <h3 class="nama">Julni Rhamawan</h3>
                <p class="jabatan">Program Manager KREASI<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>
        </div>

        <!-- kabupaten ketapang -->
        <div class="struktur-container">
            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/3.png') }}" class="img-pop-tim" alt="Santoso Setio">
                <h3 class="nama">Santoso Setio</h3>
                <p class="jabatan">Coordinator Project Kreasi Ketapang<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>

            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/4.png') }}" class="img-pop-tim" alt="Sujiman">
                <h3 class="nama">Sujiman</h3>
                <p class="jabatan">MEAL Officer Kreasi Ketapang<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>

            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/5.png') }}" class="img-pop-tim" alt="Syarif Syamsurrizal">
                <h3 class="nama">Syarif Syamsurrizal</h3>
                <p class="jabatan">Advocacy Officer Kreasi Ketapang<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>

            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/6.png') }}" class="img-pop-tim" alt="Jainal Abidin">
                <h3 class="nama">Jainal Abidin</h3>
                <p class="jabatan">Basic Education Kreasi Ketapang<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>  
        </div>

        <div class="struktur-container">
            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/11.png') }}" class="img-pop-tim" alt="Ilma Karmila">
                <h3 class="nama">Ilma Karmila</h3>
                <p class="jabatan">Early Childhood<br>Education Development Kreasi Ketapang<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>

            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/8.png') }}" class="img-pop-tim" alt="Afriyandi Nur Huda">
                <h3 class="nama">Afriyandi Nur Huda</h3>
                <p class="jabatan">Communications & Media Officer Kreasi Ketapang<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>

            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/10.png') }}" class="img-pop-tim" alt="Nur Malina Indah Putri">
                <h3 class="nama">Nur Malina<br>Indah Putri</h3>
                <p class="jabatan">Finance Officer Kreasi Ketapang<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>

            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/7.png') }}" class="img-pop-tim" alt="Heri Setiawan">
                <h3 class="nama">Heri Setiawan</h3>
                <p class="jabatan">Logistic Officer Kreasi Ketapang<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>
        </div>

        <div class="struktur-container">
            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/9.png') }}" class="img-pop-tim" alt="Siti Mauliani">
                <h3 class="nama">Siti Mauliani</h3>
                <p class="jabatan">Child Protection Officer Kreasi Ketapang<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>
        </div>
        <!-- kabupaten kayong utara-->
        <div class="struktur-container">
            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/Anti Angraini.png') }}" class="img-pop-tim" alt="Anti Angraini">
                <h3 class="nama">Anti Angraini</h3>
                <p class="jabatan">Coordinator Project Kreasi Kayong Utara<br> Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>

            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/Rezky Farnanda.png') }}" class="img-pop-tim" alt="Rezky Farnanda">
                <h3 class="nama">Rezky Farnanda</h3>
                <p class="jabatan">MEAL Officer Kreasi Kayong Utara<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>
            

            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/Hengki Hayatullah.png') }}" class="img-pop-tim" alt="Hengki Hayatullah">
                <h3 class="nama">Hengki Hayatullah</h3>
                <p class="jabatan">Advocacy & Campaign Kreasi Kayong Utara<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>

            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/Muhammad Agus Tarmizi.png') }}" class="img-pop-tim" alt="Muhammad Agus Tarmizi">
                <h3 class="nama">Muhammad Agus Tarmizi</h3>
                <p class="jabatan">Basic Education Kreasi Kayong Utara<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>
        </div>
       
        
        <!-- communication media-->
        <div class="struktur-container">
            

            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/Rinda Andri Gunawan.png') }}" class="img-pop-tim" alt="Rinda Andri Gunawan">
                <h3 class="nama">Rinda Andri Gunawan</h3>
                <p class="jabatan">Communication & Media Kreasi Kayong Utara<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>
            
            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/Mutiara Aulia Az-Zahra.png') }}" class="img-pop-tim" alt="Mutiara Aulia Az-Zahra">
                <h3 class="nama">Mutiara Aulia Az-Zahra</h3>
                <p class="jabatan">Finance Officer Kreasi Kayong Utara<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>

            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/Anisah Agustina.png') }}" class="img-pop-tim" alt="Anisah Agustina">
                <h3 class="nama">Anisah Agustina</h3>
                <p class="jabatan">Child Protection & Gedsi Kreasi Kayong Utara<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>
        
            <div class="card-struktur">
                <img src="{{ asset('images/Foto Struktur organisasi/Sidik Puji Nugroho.png') }}" class="img-pop-tim" alt="Sidik Puji Nugroho">
                <h3 class="nama">Sidik Puji Nugroho</h3>
                <p class="jabatan">Logistik Kreasi Kayong Utara<br>Majelis Dikdasmen PNF PP Muhammadiyah</p>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-left">
            <h2>About Us</h2>
            <p>KREASI adalah pusat kolaborasi untuk memajukan 
            pendidikan anak Indonesia melalui</p>
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
function showStruktur(strukturNumber) {
    // Sembunyikan semua struktur
    const allStruktur = document.querySelectorAll('.struktur');
    allStruktur.forEach(struktur => {
        struktur.classList.remove('active');
    });
    
    // Hapus class active dari semua button
    const allButtons = document.querySelectorAll('.struktur-btn-card');
    allButtons.forEach(button => {
        button.classList.remove('active');
    });
    
    // Tampilkan struktur yang dipilih
    const selectedStruktur = document.getElementById('struktur' + strukturNumber);
    if (selectedStruktur) {
        selectedStruktur.classList.add('active');
    }
    
    // Tambahkan class active ke button yang diklik
    const buttons = document.querySelectorAll('.struktur-btn-card');
    if (buttons[strukturNumber - 1]) {
        buttons[strukturNumber - 1].classList.add('active');
    }
}

// Set initial state: hide all struktur on page load
document.addEventListener('DOMContentLoaded', function() {
    // Semua struktur dimulai dalam keadaan tersembunyi
    // Tunggu user klik button untuk menampilkannya
});
</script>
</body>
</html>