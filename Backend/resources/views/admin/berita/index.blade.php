<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Berita - Admin Kreasimu</title>
    <link rel="stylesheet" href="{{ asset('css/admin-styles.css') }}">

</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <img src="{{ asset('FOTO BERANDA/KREASI-SYMBOL_KREASI--768x416.png') }}" alt="Logo Kreasimu" class="navbar-logo">
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
            <h1>Kelola Berita</h1>
            <a href="{{ route('admin.berita.create') }}" class="btn-add">+ Tambah Berita</a>
        </div>

        <div class="filter-box">
            <form method="GET" action="{{ route('admin.berita.index') }}">
                <div class="filter-group">
                    <input type="text" name="search" placeholder="Cari berita..." value="{{ $search }}">
                    <select name="category">
                        <option value="all">Semua Kategori</option>
                        <option value="berita" @if($category === 'berita') selected @endif>Berita</option>
                        <option value="buletin" @if($category === 'buletin') selected @endif>Buletin</option>
                        <option value="capaian" @if($category === 'capaian') selected @endif>Capaian</option>
                    </select>
                    <select name="status">
                        <option value="all">Semua Status</option>
                        <option value="draft" @if($status === 'draft') selected @endif>Draft</option>
                        <option value="published" @if($status === 'published') selected @endif>Published</option>
                    </select>
                    <button type="submit">Filter</button>
                </div>
            </form>
        </div>

        @if (count($beritas) > 0)
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beritas as $berita)
                            <tr>
                                <td>{{ substr($berita->title, 0, 50) }}...</td>
                                <td>
                                    <span class="badge badge-{{ $berita->category }}">
                                        {{ ucfirst($berita->category) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $berita->status }}">
                                        {{ ucfirst($berita->status) }}
                                    </span>
                                </td>
                                <td>{{ date('d M Y', strtotime($berita->created_at)) }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn-small btn-edit">Edit</a>
                                        <form action="{{ route('admin.berita.delete', $berita->id) }}" method="POST" style="display: inline;">
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
                {{ $beritas->links() }}
            </div>
        @else
            <div class="table-container">
                <div class="empty-state">
                    <p>Tidak ada berita. <a href="{{ route('admin.berita.create') }}" style="color: #667eea;">Buat berita baru</a></p>
                </div>
            </div>
        @endif
    </div>
</body>
</html>
