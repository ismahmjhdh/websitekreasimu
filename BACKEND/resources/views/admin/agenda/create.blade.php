<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Agenda - Kreasimu</title>
    <link rel="stylesheet" href="{{ asset('css/admin-styles.css') }}">
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
        <div class="welcome">
            <h3>Tambah Agenda Baru</h3>
            <p>Masukkan detail agenda baru untuk ditampilkan di beranda.</p>
        </div>

        <div class="section">
            <form action="{{ route('admin.agenda.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold;">Judul Agenda</label>
                    <input type="text" name="title" required class="form-control" placeholder="Contoh: Monitoring Akhir Tahun">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold;">Tanggal</label>
                    <input type="date" name="date" required class="form-control">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold;">Gambar Agenda</label>
                    <input type="file" name="image_file" required class="form-control">
                    <small style="color: #666;">Format: JPG, PNG. Maksimal 5MB.</small>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold;">Deskripsi Singkat (Opsional)</label>
                    <textarea name="description" class="form-control" rows="4" style="width: 100%; padding: 10px;" placeholder="Penjelasan singkat mengenai agenda..."></textarea>
                </div>

                <div style="display: flex; gap: 10px;">
                    <button type="submit" class="btn" style="background: #28a745; color: white; border: none; padding: 10px 20px; cursor: pointer;">Simpan Agenda</button>
                    <a href="{{ route('admin.agenda.index') }}" class="btn" style="background: #6c757d; color: white; text-decoration: none; padding: 10px 20px;">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
