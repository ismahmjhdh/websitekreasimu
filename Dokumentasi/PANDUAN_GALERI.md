# Panduan Fitur Galeri Admin Kreasimu

## Daftar Isi
1. [Gambaran Umum](#gambaran-umum)
2. [Cara Mengakses Galeri](#cara-mengakses-galeri)
3. [Menambah Foto Baru](#menambah-foto-baru)
4. [Melihat Daftar Foto](#melihat-daftar-foto)
5. [Menghapus Foto](#menghapus-foto)
6. [Tips & Trik](#tips--trik)
7. [Spesifikasi Teknis](#spesifikasi-teknis)

---

## Gambaran Umum

Fitur Galeri memungkinkan admin Kreasimu untuk mengelola koleksi foto dalam website. Anda dapat:
- ✅ Menambah foto baru dengan caption
- ✅ Melihat semua foto dalam format grid
- ✅ Mencari foto berdasarkan caption
- ✅ Menghapus foto lama
- ✅ Melihat tanggal upload setiap foto

---

## Cara Mengakses Galeri

### Dari Dashboard
1. Login ke admin panel: `http://localhost:8000/admin/login`
2. Masukkan username dan password admin
3. Di dashboard, cari bagian **"Kelola Galeri"**
4. Klik "Lihat Semua Foto" atau "Tambah Foto"

### Direct URL
- Lihat semua foto: `http://localhost:8000/admin/galeri`
- Tambah foto baru: `http://localhost:8000/admin/galeri/create`

---

## Menambah Foto Baru

### Langkah-Langkah:

1. **Buka Halaman Tambah Foto**
   - Klik "Tambah Foto" di dashboard atau galeri index
   - URL: `/admin/galeri/create`

2. **Unggah Foto**
   - Klik area upload atau drag-drop foto ke area yang ditentukan
   - Format yang diterima: JPEG, PNG, JPG, GIF
   - Ukuran maksimal: 5 MB
   - Tip: Kompres foto terlebih dahulu untuk upload lebih cepat

3. **Tambahkan Caption (Opsional)**
   - Ketik deskripsi atau keterangan untuk foto
   - Contoh: "Tim Kreasimu di Workshop 2024"
   - Maksimal: 500 karakter

4. **Simpan**
   - Klik tombol "Simpan Foto"
   - Foto akan diupload ke folder `/public/images/galeri/`
   - Data disimpan ke database dengan informasi tanggal upload

### Contoh Caption yang Baik:
```
✅ "Tim Kreasimu mengikuti workshop digital marketing 2024"
✅ "Peluncuran produk terbaru Kreasimu"
✅ "Event gathering karyawan Kreasimu Desember 2024"
```

---

## Melihat Daftar Foto

### Halaman Galeri Index

**URL:** `/admin/galeri`

**Fitur:**
- Tampilan grid foto (responsive untuk semua ukuran layar)
- Setiap foto menampilkan:
  - Thumbnail foto
  - Caption di bawah foto
  - Tanggal upload
  - Tombol hapus

### Pencarian Foto
1. Masukkan kata kunci di kolom "Cari caption..."
2. Tekan tombol "Cari" atau Enter
3. Sistem akan menampilkan foto yang sesuai

**Contoh pencarian:**
- Cari: "workshop" → Menampilkan semua foto dengan caption mengandung "workshop"
- Cari: "2024" → Menampilkan semua foto yang caption-nya mengandung "2024"

### Pagination
- Galeri menampilkan 15 foto per halaman
- Gunakan link navigasi di bawah untuk pindah halaman

---

## Menghapus Foto

### Langkah-Langkah:
1. Buka halaman Galeri Index (`/admin/galeri`)
2. Cari foto yang ingin dihapus
3. Klik tombol **"Hapus"** (tombol merah)
4. Sistem akan menanyakan konfirmasi: "Yakin ingin menghapus?"
5. Klik "OK" untuk mengkonfirmasi
6. Foto akan dihapus dari database dan folder penyimpanan

**Perhatian:**
- ⚠️ Penghapusan bersifat **permanen** dan tidak bisa dibatalkan
- File fisik di server juga akan dihapus otomatis
- Pastikan benar-benar ingin menghapus sebelum mengkonfirmasi

---

## Tips & Trik

### Optimasi Foto
1. **Ukuran & Format:**
   - Gunakan format JPEG untuk foto standar (lebih kecil)
   - Gunakan format PNG untuk gambar dengan background transparan
   - Maksimal 5 MB per foto

2. **Resolusi yang Disarankan:**
   - Minimal: 800x600 px
   - Disarankan: 1200x800 px
   - Untuk foto landscape: 1600x900 px

3. **Compression Tools:**
   - Compress foto online: tinypng.com, compressor.io
   - Atau gunakan tool desktop: ImageMagick, XnConvert

### Caption Best Practices
- Jelas dan deskriptif (3-10 kata)
- Sertakan lokasi/acara jika relevan
- Gunakan bahasa Indonesia yang baik
- Hindari karakter khusus yang tidak perlu

### Backup
- Simpan copy foto di drive lokal/cloud
- Catat caption untuk setiap foto penting
- Lakukan backup database secara berkala

---

## Spesifikasi Teknis

### Database Schema
```sql
CREATE TABLE galeri (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    image_url VARCHAR(255) NOT NULL,
    caption TEXT NULL,
    created_by INT NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

### Validasi File
- **Tipe file:** image (image/jpeg, image/png, image/gif, image/webp)
- **Ukuran maksimal:** 5120 KB (5 MB)
- **Wajib diisi:** Ya
- **Multiple upload:** Tidak (satu foto per form submission)

### Penyimpanan File
- **Folder:** `public/images/galeri/`
- **Naming:** `<timestamp>-<random>.extension`
- **Contoh:** `1704051234-abc123xyz.jpg`

### Endpoints API
```
GET    /admin/galeri              - Lihat semua foto dengan search
GET    /admin/galeri/create       - Form tambah foto baru
POST   /admin/galeri              - Submit foto baru
POST   /admin/galeri/{id}/delete  - Hapus foto berdasarkan ID
```

### Model & Relationships
```php
// Galeri Model
class Galeri extends Model {
    protected $table = 'galeri';
    protected $fillable = ['image_url', 'caption', 'created_by'];
    
    public function creator() {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}
```

---

## Troubleshooting

### "File terlalu besar"
- Solusi: Kompres foto sebelum upload
- Ukuran maksimal adalah 5 MB

### "Format file tidak didukung"
- Solusi: Gunakan JPEG, PNG, JPG, atau GIF
- Format lain seperti BMP tidak didukung

### "Folder galeri tidak ditemukan"
- Solusi: Jalankan command: `php artisan storage:link`
- Pastikan folder `public/images/galeri/` ada

### Foto tidak muncul
- Pastikan file tersimpan di `public/images/galeri/`
- Pastikan path di database benar: `images/galeri/filename.jpg`
- Clear browser cache (Ctrl+F5)

---

## Pertanyaan yang Sering Diajukan (FAQ)

**Q: Berapa banyak foto yang bisa disimpan?**
A: Tidak ada batasan jumlah, tetapi sebaiknya upload berkala untuk performa optimal.

**Q: Bisakah saya edit caption foto?**
A: Saat ini belum ada fitur edit, silakan hapus dan upload ulang dengan caption baru.

**Q: Foto mana yang paling baru?**
A: Foto ditampilkan berdasarkan tanggal upload (terbaru di halaman pertama).

**Q: Bisakah saya bulk upload banyak foto?**
A: Saat ini hanya bisa upload satu per satu, rencana ada fitur batch upload di masa depan.

---

## Kontak & Support

Jika mengalami masalah dengan fitur Galeri:
1. Cek error message yang ditampilkan
2. Lihat bagian Troubleshooting di atas
3. Hubungi developer untuk bantuan teknis
4. Cek log file: `storage/logs/laravel.log`

---

**Terakhir diupdate:** Desember 2024
**Versi Fitur:** 1.0
**Status:** Stabil
