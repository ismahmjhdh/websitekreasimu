<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Foto Galeri - Admin Kreasimu</title>
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
            <h1>Tambah Foto Galeri</h1>
            <p>Upload foto dan tambahkan caption untuk galeri</p>
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
            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Tipe Galeri *</label>
                    <div style="display: flex; gap: 20px; margin-top: 5px;">
                        <label>
                            <input type="radio" name="type" value="photo" checked onchange="toggleType()"> Foto
                        </label>
                        <label>
                            <input type="radio" name="type" value="video" onchange="toggleType()"> Video
                        </label>
                    </div>
                </div>

                <div class="form-group" id="photoInputGroup">
                    <label for="image_file">Foto *</label>
                    <div class="file-input-wrapper">
                        <input type="file" id="image_file" name="image_file" accept="image/*" onchange="previewImage(event)">
                        <label for="image_file" class="file-input-label">
                            <div>📷 Klik atau drag foto di sini</div>
                            <div class="help-text">Max 5MB (JPEG, PNG, JPG, GIF)</div>
                        </label>
                    </div>
                    <div class="image-preview" id="preview"></div>
                    @error('image_file')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" id="videoInputGroup" style="display: none;">
                    <label for="video_url">URL Video (YouTube) *</label>
                    <input type="url" id="video_url" name="video_url" placeholder="https://www.youtube.com/watch?v=..." value="{{ old('video_url') }}" oninput="previewYoutubeVideo()">
                    <div class="help-text">Masukkan link YouTube (format: youtube.com/watch?v=..., youtu.be/..., atau youtube.com/shorts/...)</div>
                    @error('video_url')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                    <div id="videoPreview" style="margin-top: 15px; display: none;">
                        <label style="margin-bottom: 8px; display: block;">Preview Video:</label>
                        <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                            <iframe id="videoPreviewIframe" src="" frameborder="0" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
                        </div>
                    </div>
                    
                    <div style="margin-top: 20px;">
                        <label for="video_cover">Cover/Thumbnail Video (Opsional)</label>
                        <div class="file-input-wrapper">
                            <input type="file" id="video_cover" name="video_cover" accept="image/*" onchange="previewVideoCover(event)">
                            <label for="video_cover" class="file-input-label">
                                <div>🖼️ Klik untuk upload cover video</div>
                                <div class="help-text">Max 5MB (JPEG, PNG, JPG, GIF). Jika kosong, akan menggunakan thumbnail YouTube.</div>
                            </label>
                        </div>
                        <div class="image-preview" id="videoCoverPreview"></div>
                        @error('video_cover')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="caption">Caption (Opsional)</label>
                    <textarea id="caption" name="caption" placeholder="Tambahkan deskripsi...">{{ old('caption') }}</textarea>
                    <div class="help-text">Max 500 karakter</div>
                    @error('caption')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-submit">Simpan Galeri</button>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-cancel">Batal</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleType() {
            const types = document.getElementsByName('type');
            let selectedType = 'photo';
            for (const type of types) {
                if (type.checked) {
                    selectedType = type.value;
                    break;
                }
            }

            const photoGroup = document.getElementById('photoInputGroup');
            const videoGroup = document.getElementById('videoInputGroup');
            const photoInput = document.getElementById('image_file');
            const videoInput = document.getElementById('video_url');

            if (selectedType === 'photo') {
                photoGroup.style.display = 'block';
                videoGroup.style.display = 'none';
                photoInput.required = true;
                videoInput.required = false;
            } else {
                photoGroup.style.display = 'none';
                videoGroup.style.display = 'block';
                photoInput.required = false;
                videoInput.required = true;
            }
        }
        
        // Init state
        toggleType();
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = '<img src="' + e.target.result + '" alt="Preview">';
                };
                reader.readAsDataURL(file);
            }
        }

        function previewYoutubeVideo() {
            const url = document.getElementById('video_url').value;
            const previewContainer = document.getElementById('videoPreview');
            const iframe = document.getElementById('videoPreviewIframe');
            
            if (!url) {
                previewContainer.style.display = 'none';
                return;
            }

            let videoId = null;

            // Format: youtube.com/watch?v=VIDEO_ID
            let match = url.match(/[?&]v=([a-zA-Z0-9_-]{11})/);
            if (match) {
                videoId = match[1];
            }
            // Format: youtu.be/VIDEO_ID
            if (!videoId) {
                match = url.match(/youtu\.be\/([a-zA-Z0-9_-]{11})/);
                if (match) videoId = match[1];
            }
            // Format: youtube.com/shorts/VIDEO_ID
            if (!videoId) {
                match = url.match(/youtube\.com\/shorts\/([a-zA-Z0-9_-]{11})/);
                if (match) videoId = match[1];
            }
            // Format: youtube.com/embed/VIDEO_ID (already embed)
            if (!videoId) {
                match = url.match(/youtube\.com\/embed\/([a-zA-Z0-9_-]{11})/);
                if (match) videoId = match[1];
            }

            if (videoId) {
                iframe.src = 'https://www.youtube.com/embed/' + videoId;
                previewContainer.style.display = 'block';
            } else {
                previewContainer.style.display = 'none';
            }
        }

        function previewVideoCover(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('videoCoverPreview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = '<img src="' + e.target.result + '" alt="Cover Preview" style="max-width: 300px; border-radius: 8px; margin-top: 10px;">';
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>
