<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Kreasimu</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
        }

        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .navbar-logo {
            height: 50px;
            width: auto;
        }

        .navbar-left h2 {
            font-size: 24px;
            margin: 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            padding: 8px 16px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            transition: background 0.3s;
        }

        .navbar a:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .welcome {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .welcome h3 {
            color: #333;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #667eea;
        }

        .stat-card h4 {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .stat-card .number {
            font-size: 32px;
            font-weight: bold;
            color: #333;
        }

        .section {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .section h3 {
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #667eea;
        }

        .section a {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
            margin-right: 10px;
        }

        .section a:hover {
            background: #764ba2;
        }

        .item-list {
            list-style: none;
        }

        .item-list li {
            padding: 12px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .item-list li:last-child {
            border-bottom: none;
        }

        .item-title {
            color: #333;
            font-weight: 500;
        }

        .item-meta {
            color: #999;
            font-size: 12px;
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-published {
            background: #d4edda;
            color: #155724;
        }

        .badge-draft {
            background: #fff3cd;
            color: #856404;
        }
    </style>
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
