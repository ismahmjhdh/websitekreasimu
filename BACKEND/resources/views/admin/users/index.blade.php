<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Admin - Kreasimu</title>
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
        @if (session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <div class="page-header">
            <h1>Kelola Admin</h1>
            <p>Daftar semua admin yang bisa mengakses panel admin</p>
        </div>

        <div style="margin-bottom: 20px;">
            <a href="{{ route('admin.users.create') }}" class="btn btn-submit">+ Tambah Admin Baru</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $admin)
                        <tr>
                            <td>{{ $admin->id }}</td>
                            <td>
                                {{ $admin->username }}
                                @if($admin->id == session('admin_id'))
                                    <span style="background: #007bff; color: white; padding: 2px 8px; border-radius: 10px; font-size: 11px; margin-left: 5px;">Anda</span>
                                @endif
                            </td>
                            <td style="white-space: nowrap;">
                                <a href="{{ route('admin.users.edit', $admin->id) }}" class="btn-edit">Edit</a>
                                @if($admin->id != session('admin_id'))
                                    <form action="{{ route('admin.users.delete', $admin->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus admin ini?')">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center;">Tidak ada admin.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
