<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Testimoni - Kreasimu</title>
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
        @if (session('success'))
            <div style="background: #d4edda; color: #155724; padding: 12px; margin-bottom: 20px; border-radius: 5px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="welcome">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h3>Kelola Testimoni</h3>
                    <p>Kelola testimoni mitra yang muncul di halaman beranda.</p>
                </div>
                <a href="{{ route('admin.testimoni.create') }}" class="btn" style="background: #28a745; color: white; text-decoration: none;">+ Tambah Testimoni</a>
            </div>
        </div>

        <div class="section">
            <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr style="background: #f8f9fa;">
                        <th style="padding: 12px; border-bottom: 2px solid #dee2e6; text-align: left;">Gambar</th>
                        <th style="padding: 12px; border-bottom: 2px solid #dee2e6; text-align: left;">Nama</th>
                        <th style="padding: 12px; border-bottom: 2px solid #dee2e6; text-align: left;">Konten</th>
                        <th style="padding: 12px; border-bottom: 2px solid #dee2e6; text-align: left;">Rating</th>
                        <th style="padding: 12px; border-bottom: 2px solid #dee2e6; text-align: left;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($testimonis as $testimoni)
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">
                                @if($testimoni->image_path)
                                    <img src="{{ asset($testimoni->image_path) }}" alt="" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;">
                                @else
                                    <div style="width: 60px; height: 60px; border-radius: 50%; background: #eee; display: flex; align-items: center; justify-content: center;">No Image</div>
                                @endif
                            </td>
                            <td style="padding: 12px; border-bottom: 1px solid #dee2e6; font-weight: bold;">{{ $testimoni->name }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #dee2e6; max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $testimoni->content }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #dee2e6;">{{ $testimoni->rating }} / 5</td>
                            <td style="padding: 12px; border-bottom: 1px solid #dee2e6; white-space: nowrap;">
                                <div style="display: flex; gap: 10px;">
                                    <a href="{{ route('admin.testimoni.edit', $testimoni->id) }}" class="btn" style="background: #ffc107; color: #000; text-decoration: none; padding: 5px 10px; font-size: 14px;">Edit</a>
                                    <form action="{{ route('admin.testimoni.delete', $testimoni->id) }}" method="POST" onsubmit="return confirm('Hapus testimoni ini?')">
                                        @csrf
                                        <button type="submit" class="btn" style="background: #dc3545; color: white; border: none; padding: 5px 10px; font-size: 14px; cursor: pointer;">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding: 20px; text-align: center;">Belum ada testimoni.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
