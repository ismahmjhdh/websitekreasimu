<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Berita - Admin Kreasimu</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
        }

        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .navbar-logo {
            height: 50px;
            width: auto;
        }

        .navbar-left h2 {
            font-size: 20px;
            margin: 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            padding: 8px 16px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header h1 {
            color: #333;
        }

        .btn-add {
            background: #667eea;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-add:hover {
            background: #764ba2;
        }

        .filter-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .filter-group {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .filter-group input,
        .filter-group select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .filter-group button {
            padding: 10px 20px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
        }

        .table-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8f9fa;
            padding: 15px;
            text-align: left;
            color: #333;
            font-weight: 600;
            border-bottom: 2px solid #ddd;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
        }

        tr:hover {
            background: #f9f9f9;
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 3px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-published {
            background: #d4edda;
            color: #155724;
        }

        .badge-draft {
            background: #fff3cd;
            color: #856404;
        }

        .badge-berita {
            background: #e7f3ff;
            color: #004085;
        }

        .badge-buletin {
            background: #f0e6ff;
            color: #5a1f80;
        }

        .badge-capaian {
            background: #ffe6e6;
            color: #721c24;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-small {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-edit {
            background: #28a745;
            color: white;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .btn-edit:hover {
            background: #218838;
        }

        .btn-delete:hover {
            background: #c82333;
        }

        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #666;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 20px;
            padding: 20px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: #667eea;
        }

        .pagination a:hover {
            background: #667eea;
            color: white;
        }

        .pagination .active {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }
    </style>
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
