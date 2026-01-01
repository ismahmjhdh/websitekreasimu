<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Kreasimu</title>
    <link rel="stylesheet" href="{{ asset('css/admin-styles.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <img src="{{ asset('images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}" alt="Logo Kreasimu" class="navbar-logo">
            <h2>Kreasimu Admin</h2>
        </div>
        <div>
            <span>{{ session('admin_name') }}</span>
            <a href="{{ route('admin.logout') }}">Logout</a>
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
            <div style="background: #d4edda; color: #155724; padding: 12px; margin-bottom: 20px; border-radius: 5px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="welcome">
            <h3>Selamat datang di Admin Panel Kreasimu! 👋</h3>
            <p>Kelola berita dan materi pembelajaran dengan mudah dari sini.</p>
        </div>

        <div class="stats">
            <div class="stat-card">
                <h4>Total Berita</h4>
                <div class="number">{{ $totalBerita }}</div>
            </div>
            <div class="stat-card">
                <h4>Total Materi</h4>
                <div class="number">{{ $totalMateri }}</div>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="section">
                <h3>Kelola Berita</h3>
                <p style="margin-bottom: 15px; color: #666;">Tambah, edit, atau hapus berita dan buletin</p>
                <a href="{{ route('admin.berita.index') }}">Lihat Semua Berita</a>
                <a href="{{ route('admin.berita.create') }}">+ Tambah Berita</a>

                @if (count($beritaTerbaru) > 0)
                    <h4 style="margin-top: 20px; color: #666;">Berita Terbaru</h4>
                    <ul class="item-list">
                        @foreach ($beritaTerbaru as $berita)
                            <li>
                                <div>
                                    <div class="item-title">{{ $berita->title }}</div>
                                    <div class="item-meta">{{ date('d M Y', strtotime($berita->created_at)) }}</div>
                                </div>
                                <span class="badge @if($berita->status === 'published') badge-published @else badge-draft @endif">
                                    {{ ucfirst($berita->status) }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="section">
                <h3>Kelola Materi</h3>
                <p style="margin-bottom: 15px; color: #666;">Tambah, edit, atau hapus materi pembelajaran</p>
                <a href="{{ route('admin.materi.index') }}">Lihat Semua Materi</a>
                <a href="{{ route('admin.materi.create') }}">+ Tambah Materi</a>

                @if (count($materiTerbaru) > 0)
                    <h4 style="margin-top: 20px; color: #666;">Materi Terbaru</h4>
                    <ul class="item-list">
                        @foreach ($materiTerbaru as $materi)
                            <li>
                                <div>
                                    <div class="item-title">{{ $materi->title }}</div>
                                    <div class="item-meta">{{ date('d M Y', strtotime($materi->created_at)) }}</div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="section">
                <h3>Kelola Galeri</h3>
                <p style="margin-bottom: 15px; color: #666;">Tambah atau hapus foto dari galeri</p>
                <a href="{{ route('admin.galeri.index') }}">Lihat Semua Foto</a>
                <a href="{{ route('admin.galeri.create') }}">+ Tambah Foto</a>
            </div>
