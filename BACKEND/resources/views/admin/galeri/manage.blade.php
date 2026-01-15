<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Galeri Content - Admin Kreasimu</title>
    <link rel="stylesheet" href="{{ asset('css/admin-styles.css') }}">
    <style>
        .image-manager-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .image-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            background: white;
        }
        .image-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .image-item .delete-overlay {
            position: absolute;
            top: 5px;
            right: 5px;
        }
        .image-item .order-badge {
            position: absolute;
            bottom: 5px;
            left: 5px;
            background: rgba(0,0,0,0.6);
            color: white;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 12px;
        }
        .upload-card {
            background: #f8f9fa;
            border: 2px dashed #dee2e6;
            padding: 30px;
            text-align: center;
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
            <a href="{{ route('admin.galeri.index') }}">Kembali ke Daftar</a>
            <a href="{{ route('admin.logout') }}">Logout</a>
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="page-header">
            <h1>Kelola Isi Galeri: {{ $galeri->caption ?? 'Tanpa Caption' }}</h1>
            <p>Tipe: {{ strtoupper($galeri->type) }} | Dibuat: {{ date('d M Y', strtotime($galeri->created_at)) }}</p>
        </div>

        @if($galeri->type == 'photo')
            <div class="upload-card">
                <h3>Tambah Foto ke Galeri ini</h3>
                <form action="{{ route('admin.galeri.add_images', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="images[]" multiple accept="image/*" required style="margin-bottom: 20px;">
                    <br>
                    <button type="submit" class="btn btn-submit">Unggah Foto-foto</button>
                </form>
            </div>

            <h3>Daftar Foto dalam Galeri ini</h3>
            <div class="image-manager-grid">
                @forelse($galeri->images as $image)
                    <div class="image-item">
                        <img src="{{ asset($image->image_path) }}" alt="">
                        <div class="order-badge">Urutan: {{ $image->order }}</div>
                        <div class="delete-overlay">
                            <form action="{{ route('admin.galeri.delete_image', $image->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-delete" style="padding: 5px; font-size: 12px;" onclick="return confirm('Hapus foto ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p style="grid-column: 1/-1; text-align: center; padding: 40px;">Belum ada foto dalam galeri ini.</p>
                @endforelse
            </div>
        @else
            <div class="section" style="background: white; padding: 30px; border-radius: 10px;">
                <h3>Detail Video</h3>
                <p><strong>YouTube URL:</strong> <a href="{{ $galeri->video_url }}" target="_blank">{{ $galeri->video_url }}</a></p>
                <div style="margin-top: 20px;">
                    <iframe width="100%" height="400" src="{{ $galeri->video_url }}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        @endif
    </div>
</body>
</html>
