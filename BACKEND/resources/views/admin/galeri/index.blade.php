<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Galeri - Admin Kreasimu</title>
    <link rel="stylesheet" href="{{ asset('css/admin-styles.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <img src="{{ asset('images/FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}" alt="Logo Kreasimu" class="navbar-logo">
            <h2>Kreasimu Admin</h2>
        </div>
        <div>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.logout') }}">Logout</a>
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="page-header">
            <h1>Kelola Galeri</h1>
            <a href="{{ route('admin.galeri.create') }}" class="btn-add">+ Tambah Foto</a>
        </div>

        <div class="filter-box">
            <form method="GET" action="{{ route('admin.galeri.index') }}">
                <div class="filter-group">
                    <input type="text" name="search" placeholder="Cari caption..." value="{{ $search }}">
                    <button type="submit">Cari</button>
                </div>
            </form>
        </div>

        @if (count($galeris) > 0)
            <div class="gallery-grid">
                @foreach ($galeris as $galeri)
                    <div class="gallery-item">
                        <img src="{{ asset($galeri->image_url) }}" alt="{{ $galeri->caption }}" class="gallery-image">
                        <div class="gallery-info">
                            <div class="gallery-caption">{{ $galeri->caption ?? 'Tanpa Caption' }}</div>
                            <div class="gallery-date">{{ date('d M Y', strtotime($galeri->created_at)) }}</div>
                            <div class="gallery-actions" style="display: flex; gap: 5px; flex-wrap: wrap;">
                                <a href="{{ route('admin.galeri.manage', $galeri->id) }}" class="btn-edit" style="flex: 1; text-align: center; text-decoration: none; font-size: 13px; background: #4a90e2; color: white; padding: 5px; border-radius: 4px;">Isi Galeri</a>
                                <form action="{{ route('admin.galeri.delete', $galeri->id) }}" method="POST" style="flex: 1;">
                                    @csrf
                                    <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pagination">
                {{ $galeris->links() }}
            </div>
        @else
            <div class="empty-state">
                <p>Tidak ada foto dalam galeri. <a href="{{ route('admin.galeri.create') }}" style="color: #667eea;">Tambah foto baru</a></p>
            </div>
        @endif
    </div>
</body>
</html>
