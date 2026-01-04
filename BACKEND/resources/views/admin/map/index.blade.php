<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Map - Kreasimu</title>
    <link rel="stylesheet" href="{{ asset('css/admin-styles.css') }}">
    <style>
        .map-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .map-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .map-card img {
            width: 100%;
            height: 200px;
            object-fit: contain;
            background: #f0f0f0;
        }
        .map-card .content {
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-section {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
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
            <a href="{{ route('admin.dashboard') }}" style="margin-right: 15px; color: white; text-decoration: none;">Dashboard</a>
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
            <h3>Kelola Map & Lokasi Intervensi</h3>
            <p>Kelola gambar peta yang muncul di bagian intervensi program.</p>
        </div>

        <div class="form-section">
            <h4>Tambah Map Baru</h4>
            <form action="{{ route('admin.map.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Pilih Gambar Map</label>
                    <input type="file" name="image_file" required class="form-control">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Judul Map</label>
                    <input type="text" name="title" required class="form-control" placeholder="Contoh: Peta Ketapang">
                </div>
                <button type="submit" class="btn" style="background: #28a745; color: white;">+ Simpan Map</button>
            </form>
        </div>

        <h4>Daftar Map Aktif</h4>
        <div class="map-grid">
            @forelse ($maps as $map)
                <div class="map-card">
                    <img src="{{ asset($map->image_path) }}" alt="{{ $map->title }}">
                    <div class="content">
                        <strong>{{ $map->title }}</strong>
                        <form action="{{ route('admin.map.delete', $map->id) }}" method="POST" onsubmit="return confirm('Hapus map ini?')">
                            @csrf
                            <button type="submit" class="btn" style="background: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>Belum ada map. Silakan tambahkan map baru.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
