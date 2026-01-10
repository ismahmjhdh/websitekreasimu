<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Testimoni - Kreasimu</title>
    <link rel="stylesheet" href="{{ asset('css/admin-styles.css') }}">
    <style>
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-control { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        .btn-submit { background: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
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
        <div style="background: white; padding: 30px; border-radius: 8px; max-width: 800px; margin: 0 auto; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2>Tambah Testimoni Baru</h2>
                <a href="{{ route('admin.testimoni.index') }}" style="text-decoration: none; color: #6c757d;">&larr; Kembali</a>
            </div>

            @if ($errors->any())
                <div style="background: #f8d7da; color: #721c24; padding: 12px; margin-bottom: 20px; border-radius: 5px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.testimoni.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="name">Nama Mitra</label>
                    <input type="text" id="name" name="name" class="form-control" required placeholder="Contoh: Desta Saputra">
                </div>

                <div class="form-group">
                    <label for="rating">Rating (1-5)</label>
                    <input type="number" id="rating" name="rating" class="form-control" min="1" max="5" value="5" required>
                </div>

                <div class="form-group">
                    <label for="content">Isi Testimoni</label>
                    <textarea id="content" name="content" class="form-control" rows="5" required placeholder="Tuliskan testimoni di sini..."></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Foto Profil (Optional)</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*">
                    <small style="color: #666;">Format: JPG, PNG, GIF. Maks: 2MB.</small>
                </div>

                <div style="text-align: right;">
                    <button type="submit" class="btn-submit">Simpan Testimoni</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
