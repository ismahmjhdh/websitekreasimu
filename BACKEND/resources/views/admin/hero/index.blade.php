<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Hero Slide - Kreasimu</title>
    <link rel="stylesheet" href="{{ asset('css/admin-styles.css') }}">
    <style>
        .slide-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .slide-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: relative;
        }
        .slide-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .slide-card .actions {
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-delete {
            background: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
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
            <h3>Kelola Hero Slide Beranda</h3>
            <p>Tambahkan atau hapus gambar slide yang muncul di bagian paling atas beranda.</p>
        </div>

        <div class="form-section">
            <h4>Tambah Slide Baru</h4>
            <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Pilih Gambar (Rasio disarankan 16:9)</label>
                    <input type="file" name="image_file" required class="form-control">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px;">Judul Singkat (Opsional)</label>
                    <input type="text" name="title" class="form-control" placeholder="Contoh: Kegiatan Monitoring">
                </div>
                <button type="submit" class="btn" style="background: #28a745; color: white;">+ Simpan Slide</button>
            </form>
        </div>

        <h4>Daftar Slide Aktif</h4>
        <div class="slide-grid">
            @forelse ($slides as $slide)
                <div class="slide-card">
                    <img src="{{ asset($slide->image_path) }}" alt="{{ $slide->title }}">
                    <div class="actions">
                        <span>{{ $slide->title ?? 'Tanpa Judul' }}</span>
                        <form action="{{ route('admin.hero.delete', $slide->id) }}" method="POST" onsubmit="return confirm('Hapus slide ini?')">
                            @csrf
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>Belum ada slide. Silakan tambahkan slide baru.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
