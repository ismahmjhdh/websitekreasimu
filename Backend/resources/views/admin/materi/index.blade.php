<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Materi - Admin Kreasimu</title>
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
            <h1>Kelola Materi</h1>
            <a href="{{ route('admin.materi.create') }}" class="btn-add">+ Tambah Materi</a>
        </div>

        <div class="filter-box">
            <form method="GET" action="{{ route('admin.materi.index') }}">
                <div class="filter-group">
                    <input type="text" name="search" placeholder="Cari materi..." value="{{ $search }}">
                    <button type="submit">Cari</button>
                </div>
            </form>
        </div>

        @if (count($materis) > 0)
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>File</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materis as $materi)
                            <tr>
                                <td>{{ substr($materi->title, 0, 40) }}...</td>
                                <td>{{ substr($materi->description, 0, 40) }}...</td>
                                <td>
                                    @if ($materi->file_url)
                                        <a href="{{ asset($materi->file_url) }}" target="_blank" style="color: #667eea;">Unduh</a>
                                    @else
                                        <span style="color: #999;">-</span>
                                    @endif
                                </td>
                                <td>{{ date('d M Y', strtotime($materi->created_at)) }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.materi.edit', $materi->id) }}" class="btn-small btn-edit">Edit</a>
                                        <form action="{{ route('admin.materi.delete', $materi->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn-small btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                {{ $materis->links() }}
            </div>
        @else
            <div class="table-container">
                <div class="empty-state">
                    <p>Tidak ada materi. <a href="{{ route('admin.materi.create') }}" style="color: #667eea;">Buat materi baru</a></p>
                </div>
            </div>
        @endif
    </div>
</body>
</html>
