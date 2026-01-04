<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Materi - Admin Kreasimu</title>
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
        <div class="page-header">
            <h1>Edit Materi</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Ada kesalahan:</strong>
                <ul style="margin-top: 10px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-container">
            <form action="{{ route('admin.materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Judul Materi *</label>
                    <input type="text" id="title" name="title" required value="{{ $materi->title }}">
                    @error('title')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi *</label>
                    <textarea id="description" name="description" required>{{ $materi->description }}</textarea>
                    @error('description')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="thumbnail">Thumbnail Materi (Opsional)</label>
                    <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
                    <div class="help-text">Max 5MB. Format: JPEG, PNG, JPG, GIF</div>
                    
                    @if ($materi->thumbnail_url)
                        <div class="file-info" style="margin-top: 15px;">
                            <strong>🖼️ Thumbnail saat ini:</strong>
                            <div style="margin-top: 10px;">
                                <img src="{{ asset($materi->thumbnail_url) }}" alt="Thumbnail" style="max-width: 200px; max-height: 150px; border-radius: 5px;">
                            </div>
                        </div>
                    @endif
                    @error('thumbnail')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="files">File Materi PDF (Tambah File Baru - Opsional)</label>
                    <input type="file" id="files" name="files[]" accept=".pdf" multiple>
                    <div class="help-text">Max 50MB per file. Gunakan Ctrl+Click untuk pilih multiple file. Format PDF</div>
                    
                    @if ($materi->files && $materi->files->count() > 0)
                        <div class="file-info">
                            <strong>📄 File yang ada:</strong>
                            <ul style="margin-top: 10px; padding-left: 20px;">
                                @foreach($materi->files as $file)
                                    <li style="margin-bottom: 8px;">
                                        {{ $file->file_name }}
                                        <a href="{{ asset($file->file_url) }}" target="_blank" style="margin-left: 10px;">(Unduh)</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @error('files')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="access_password">Password Akses (Opsional)</label>
                    <input type="password" id="access_password" name="access_password" minlength="4">
                    <div class="help-text">Kosongkan jika tidak ingin mengubah password. Siswa harus memasukkan password ini untuk mengakses materi</div>
                    @error('access_password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="related_news_id">Berita Terkait (Opsional)</label>
                    <select id="related_news_id" name="related_news_id">
                        <option value="">-- Tidak Ada --</option>
                        @foreach ($beritas as $berita)
                            <option value="{{ $berita->id }}" @if($materi->related_news_id == $berita->id) selected @endif>
                                {{ $berita->title }}
                            </option>
                        @endforeach
                    </select>
                    <div class="help-text">Pilih jika materi ini terkait dengan salah satu berita</div>
                    @error('related_news_id')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-submit">Simpan Perubahan</button>
                    <a href="{{ route('admin.materi.index') }}" class="btn btn-cancel">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
