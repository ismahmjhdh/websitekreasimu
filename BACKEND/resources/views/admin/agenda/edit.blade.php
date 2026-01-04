<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Agenda - Kreasimu</title>
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
            <h3>Edit Agenda</h3>
            <p>Perbarui informasi agenda.</p>
        </div>

        <div class="section">
            <form action="{{ route('admin.agenda.update', $agenda->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold;">Judul Agenda</label>
                    <input type="text" name="title" value="{{ $agenda->title }}" required class="form-control">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold;">Tanggal</label>
                    <input type="date" name="date" value="{{ $agenda->date }}" required class="form-control">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold;">Gambar Agenda (Kosongkan jika tidak ingin mengubah)</label>
                    @if ($agenda->image_path)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset($agenda->image_path) }}" alt="" style="width: 200px; border-radius: 5px;">
                        </div>
                    @endif
                    <input type="file" name="image_file" class="form-control">
                    <small style="color: #666;">Format: JPG, PNG. Maksimal 5MB.</small>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold;">Deskripsi Singkat (Opsional)</label>
                    <textarea name="description" class="form-control" rows="4" style="width: 100%; padding: 10px;">{{ $agenda->description }}</textarea>
                </div>

                <div style="display: flex; gap: 10px;">
                    <button type="submit" class="btn" style="background: #28a745; color: white; border: none; padding: 10px 20px; cursor: pointer;">Update Agenda</button>
                    <a href="{{ route('admin.agenda.index') }}" class="btn" style="background: #6c757d; color: white; text-decoration: none; padding: 10px 20px;">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
