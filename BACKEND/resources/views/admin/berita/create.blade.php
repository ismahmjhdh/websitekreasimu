<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita - Admin Kreasimu</title>
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
            <h1>Tambah Berita Baru</h1>
            <p>Isi formulir di bawah untuk menambahkan berita, buletin, atau capaian baru</p>
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
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Judul Berita *</label>
                    <input type="text" id="title" name="title" required value="{{ old('title') }}">
                    @error('title')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="category">Kategori *</label>
                        <select id="category" name="category" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="berita" @if(old('category') === 'berita') selected @endif>Berita</option>
                            <option value="buletin" @if(old('category') === 'buletin') selected @endif>Buletin</option>
                            <option value="capaian" @if(old('category') === 'capaian') selected @endif>Capaian</option>
                        </select>
                        @error('category')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status *</label>
                        <select id="status" name="status" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="draft" @if(old('status') === 'draft') selected @endif>Draft</option>
                            <option value="published" @if(old('status') === 'published') selected @endif>Published</option>
                        </select>
                        @error('status')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="content">Konten *</label>
                    <textarea id="content" name="content" required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="youtube_link">Link YouTube</label>
                        <input type="url" id="youtube_link" name="youtube_link" value="{{ old('youtube_link') }}">
                        <div class="help-text">Contoh: https://www.youtube.com/watch?v=.....</div>
                        @error('youtube_link')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image_file">Gambar Sampul</label>
                        <input type="file" id="image_file" name="image_file" accept="image/*">
                        <div class="help-text">Max 2MB (JPEG, PNG, JPG, GIF)</div>
                        @error('image_file')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="pdf_file">File PDF</label>
                    <input type="file" id="pdf_file" name="pdf_file" accept=".pdf">
                    <div class="help-text">Max 10MB</div>
                    @error('pdf_file')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-submit">Simpan Berita</button>
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-cancel">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
