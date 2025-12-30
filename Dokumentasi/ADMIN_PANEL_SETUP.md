# 📋 Panduan Admin Panel Kreasimu

## ✨ Fitur Admin Panel

Panel admin yang telah dibuat memiliki fitur lengkap untuk mengelola **Berita** dan **Materi**:

### Dashboard Admin
- Tampilan ringkasan dengan statistik total berita dan materi
- Daftar berita dan materi terbaru
- Akses cepat ke manajemen berita dan materi

### Manajemen Berita
- ✅ Membuat berita baru
- ✅ Mengedit berita yang sudah ada
- ✅ Menghapus berita
- ✅ Filter berdasarkan kategori (Berita, Buletin, Capaian)
- ✅ Filter berdasarkan status (Draft, Published)
- ✅ Pencarian berita
- ✅ Upload gambar sampul
- ✅ Upload file PDF
- ✅ Tambah link YouTube

### Manajemen Materi
- ✅ Membuat materi baru dengan file
- ✅ Mengedit materi yang sudah ada
- ✅ Menghapus materi
- ✅ Upload file materi (max 50MB)
- ✅ Set password akses untuk setiap materi
- ✅ Link materi dengan berita terkait
- ✅ Pencarian materi

---

## 🚀 Setup & Instalasi

### 1. **Buat Folder untuk Upload**

Buat folder-folder berikut di dalam folder `public/`:

```bash
mkdir -p public/images/berita
mkdir -p public/uploads/materi
mkdir -p public/pdf
```

### 2. **Register Middleware**

Daftar middleware `AdminAuth` di file `bootstrap/app.php`:

Buka file: `BACKEND/bootstrap/app.php`

Tambahkan di bagian middleware registration:

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin.auth' => \App\Http\Middleware\AdminAuth::class,
    ]);
})
```

Atau jika menggunakan Laravel 11+, edit file `app/Http/Middleware/AdminAuth.php` sudah dibuat dan gunakan di routes.

### 3. **Jalankan Server Laravel**

```bash
cd BACKEND
php artisan serve
```

Server akan berjalan di `http://localhost:8000`

---

## 🔑 Akses Admin Panel

### Login Admin
- **URL**: `http://localhost:8000/admin/login`
- **Username**: Gunakan username yang ada di database table `admins`
- **Password**: Gunakan password yang ada di database table `admins`

> 💡 **Catatan**: Pastikan sudah ada user admin di database. Jika belum ada, jalankan migration dan seeder untuk membuat data admin awal.

### Jika Belum Ada Data Admin

Edit dan jalankan seeder di `BACKEND/database/seeders/DatabaseSeeder.php`:

```php
<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat admin default
        Admin::create([
            'username' => 'admin',
            'password' => 'password123', // Ganti dengan password yang aman
        ]);
    }
}
```

Kemudian jalankan:

```bash
php artisan db:seed
```

---

## 📋 Navigasi Admin Panel

Setelah login, Anda akan melihat dashboard dengan menu:

### Dashboard (`/admin/dashboard`)
- Statistik berita dan materi
- Daftar berita terbaru
- Daftar materi terbaru
- Tombol akses cepat

### Kelola Berita (`/admin/berita`)
- **Lihat Semua Berita**: Daftar semua berita dengan filter
- **Tambah Berita**: Form untuk membuat berita baru
- **Edit**: Update berita yang sudah ada
- **Hapus**: Menghapus berita

### Kelola Materi (`/admin/materi`)
- **Lihat Semua Materi**: Daftar semua materi pembelajaran
- **Tambah Materi**: Form untuk membuat materi baru
- **Edit**: Update materi yang sudah ada
- **Hapus**: Menghapus materi

---

## 📝 Cara Menggunakan

### Membuat Berita Baru

1. Klik **"Kelola Berita"** atau navigasi ke `/admin/berita`
2. Klik tombol **"+ Tambah Berita"**
3. Isi form dengan:
   - **Judul**: Nama berita
   - **Kategori**: Pilih Berita, Buletin, atau Capaian
   - **Status**: Draft atau Published
   - **Konten**: Isi berita (text editor)
   - **Link YouTube**: (Opsional) URL video YouTube
   - **Gambar Sampul**: (Opsional) Upload gambar (max 2MB)
   - **File PDF**: (Opsional) Upload PDF (max 10MB)
4. Klik **"Simpan Berita"**

### Membuat Materi Baru

1. Klik **"Kelola Materi"** atau navigasi ke `/admin/materi`
2. Klik tombol **"+ Tambah Materi"**
3. Isi form dengan:
   - **Judul Materi**: Nama materi
   - **Deskripsi**: Penjelasan singkat materi
   - **File Materi**: Upload file (max 50MB)
   - **Password Akses**: Set password untuk akses materi
   - **Berita Terkait**: (Opsional) Link ke berita terkait
4. Klik **"Simpan Materi"**

### Mengedit Berita/Materi

1. Di halaman daftar, klik tombol **"Edit"**
2. Ubah informasi yang diperlukan
3. Klik **"Simpan Perubahan"**

### Menghapus Berita/Materi

1. Di halaman daftar, klik tombol **"Hapus"**
2. Konfirmasi penghapusan
3. Data akan dihapus

---

## 🔐 Keamanan

### Password Storage
Saat ini password disimpan dalam bentuk **plain text**. Untuk keamanan lebih baik, sebaiknya di-hash menggunakan:

```php
// Di AdminController.php, ubah menjadi:
$hashedPassword = Hash::make($request->password);
Admin::create([
    'username' => $request->username,
    'password' => $hashedPassword,
]);

// Dan saat login:
if ($admin && Hash::check($request->password, $admin->password)) {
    // Login berhasil
}
```

### Session Management
- Session admin tersimpan di server
- Logout otomatis menghapus session admin
- Akses admin panel dilindungi middleware `admin.auth`

---

## 🗂️ File Structure

```
BACKEND/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── AdminController.php         ✨ NEW
│   │   └── Middleware/
│   │       └── AdminAuth.php               ✨ NEW
│   └── Models/
│       ├── Admin.php
│       ├── Berita.php
│       └── Materi.php
├── resources/
│   └── views/
│       └── admin/                          ✨ NEW (Folder Baru)
│           ├── login.blade.php             ✨ NEW
│           ├── dashboard.blade.php         ✨ NEW
│           ├── berita/
│           │   ├── index.blade.php         ✨ NEW
│           │   ├── create.blade.php        ✨ NEW
│           │   └── edit.blade.php          ✨ NEW
│           └── materi/
│               ├── index.blade.php         ✨ NEW
│               ├── create.blade.php        ✨ NEW
│               └── edit.blade.php          ✨ NEW
├── routes/
│   └── web.php                             ✏️ UPDATED
└── bootstrap/
    └── app.php                             ✏️ UPDATED (perlu tambah middleware)
```

---

## 🐛 Troubleshooting

### Problem: "Middleware not found"
**Solution**: Pastikan middleware sudah didaftar di `bootstrap/app.php`

### Problem: "File upload gagal"
**Solution**: 
- Pastikan folder `public/images/berita`, `public/uploads/materi`, dan `public/pdf` sudah ada
- Cek permission folder (chmod 755)
- Pastikan disk storage Laravel sudah dikonfigurasi

### Problem: "Session expired saat login"
**Solution**: Pastikan session driver di `.env` sudah dikonfigurasi (gunakan `file` atau `database`)

### Problem: "Session forgot tidak bekerja"
**Solution**: Gunakan syntax yang benar:
```php
session()->forget(['admin_id', 'admin_name']);
```

---

## 📞 Support

Untuk lebih lanjut tentang fitur atau debugging, hubungi developer!

---

**Happy Coding! 🚀**
