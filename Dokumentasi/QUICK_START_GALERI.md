# Quick Start - Galeri Admin Panel

## ⚡ Mulai dalam 30 Detik

### 1. Login
```
URL: http://localhost:8000/admin/login
Username: admin (or your username)
Password: (your password)
```

### 2. Akses Galeri
Di dashboard, scroll down ke "Kelola Galeri" dan klik:
- **"Lihat Semua Foto"** → Melihat galeri
- **"Tambah Foto"** → Upload foto baru

Atau langsung ke: `http://localhost:8000/admin/galeri`

---

## 📸 Menambah Foto

1. Klik **"+ Tambah Foto"** (atau URL `/admin/galeri/create`)
2. **Pilih foto:**
   - Klik area upload atau drag-drop file
   - Format: JPG, PNG, GIF
   - Max 5 MB
3. **Lihat preview** (automatic saat file dipilih)
4. **Tambah caption (opsional):**
   - Contoh: "Tim Kreasimu di event 2024"
   - Max 500 karakter
5. **Klik "Simpan Foto"**

✅ Foto selesai disimpan dan muncul di galeri!

---

## 🔍 Mencari Foto

Di halaman **Galeri Index** (`/admin/galeri`):
1. Ketik kata kunci di kolom "Cari caption..."
2. Klik tombol "Cari"
3. Hasil akan difilter otomatis

**Contoh:**
- Cari: "workshop" → Semua foto dengan caption "workshop"
- Cari: "2024" → Semua foto tahun 2024

---

## 🗑️ Menghapus Foto

1. Buka **Galeri Index** (`/admin/galeri`)
2. Temukan foto yang ingin dihapus
3. Klik tombol **"Hapus"** (merah)
4. Confirm: **"Yakin ingin menghapus?"** → Klik OK
5. ✅ Foto dihapus (file + database)

⚠️ **PERHATIAN:** Penghapusan permanen, tidak bisa dibatalkan!

---

## 📋 Checklist Sebelum Upload

Sebelum upload foto, pastikan:
- ✅ File adalah gambar (JPG, PNG, GIF, WebP)
- ✅ Ukuran < 5 MB
- ✅ Caption jelas dan deskriptif (kalau ada)
- ✅ Foto berkualitas baik

**Tips Kompresi:**
- Online: tinypng.com, compressor.io
- Desktop: XnConvert, ImageMagick

---

## 🎨 Best Practices

### Caption Tips
```
✅ BAIK:  "Tim Kreasimu Workshop Digital Marketing 2024"
✅ BAIK:  "Event Gathering Karyawan Desember 2024"
❌ BURUK: "foto123"
❌ BURUK: "asdf"
```

### Foto Quality
```
✅ Resolusi: Minimal 800x600, Ideal 1200x800
✅ Format: JPEG untuk foto, PNG untuk design
❌ Blur atau low quality
❌ Pixelated atau distorted
```

---

## 🛠️ Troubleshooting

### "File terlalu besar"
→ Kompresi foto sebelum upload (max 5 MB)

### "Format tidak didukung"
→ Gunakan: JPEG, PNG, JPG, GIF

### "Folder tidak ditemukan"
→ Jalankan: `php artisan migrate`

### "404 Not Found"
→ Pastikan middleware admin.auth aktif di `bootstrap/app.php`

---

## 📊 Info Teknis

| Item | Detail |
|------|--------|
| **Upload Path** | `/public/images/galeri/` |
| **Max File Size** | 5 MB |
| **Allowed Formats** | JPEG, PNG, JPG, GIF |
| **Caption Limit** | 500 characters |
| **Per Page** | 12 photos |
| **Storage** | Database: `galeri` table |

---

## 📝 Routes

```
GET    /admin/galeri              → View all photos
GET    /admin/galeri/create       → Upload form
POST   /admin/galeri              → Save photo
POST   /admin/galeri/{id}/delete  → Delete photo
```

---

## 🚀 Next Steps

1. **Backup** - Download copy foto penting
2. **Organize** - Gunakan caption yang konsisten
3. **Monitor** - Cek galeri secara berkala
4. **Update** - Hapus foto lama/tidak terpakai

---

## 📞 Help & Support

**Dokumentasi Lengkap:** Lihat `PANDUAN_GALERI.md`

**Log File:** `storage/logs/laravel.log`

**Database:** Check `galeri` table di MySQL

---

**Happy uploading! 📸✨**
