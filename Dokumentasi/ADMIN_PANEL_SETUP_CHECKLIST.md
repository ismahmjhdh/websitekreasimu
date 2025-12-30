# ✅ Admin Panel Setup Checklist

Ikuti checklist berikut untuk setup admin panel dengan sempurna:

## 1️⃣ Persiapan Awal

- [ ] Database Laravel sudah dibuat dan migrations sudah di-run
  ```bash
  php artisan migrate
  ```

- [ ] Table admins sudah ada di database
  - Check: Database > Table `admins`
  - Columns: `id`, `username`, `password`

## 2️⃣ Folder Structure

- [ ] Buat folder upload di `public/`:
  ```bash
  mkdir -p public/images/berita
  mkdir -p public/uploads/materi
  mkdir -p public/pdf
  ```

- [ ] Set permission folder (Linux/Mac):
  ```bash
  chmod 755 public/images/berita
  chmod 755 public/uploads/materi
  chmod 755 public/pdf
  ```

## 3️⃣ File Registration (Middleware)

**File**: `BACKEND/bootstrap/app.php`

Cari bagian `->withMiddleware(function (Middleware $middleware) {` dan pastikan sudah ada:

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin.auth' => \App\Http\Middleware\AdminAuth::class,
    ]);
})
```

- [ ] Middleware `admin.auth` sudah terdaftar di `bootstrap/app.php`

## 4️⃣ Database Admin User

Pilih salah satu method:

### Method A: Menggunakan Seeder (Rekomendasi)

**File**: `BACKEND/database/seeders/DatabaseSeeder.php`

```php
<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'username' => 'admin',
            'password' => 'password123', // Ganti dengan password aman!
        ]);
    }
}
```

Jalankan:
```bash
php artisan db:seed
```

- [ ] Admin user sudah dibuat via seeder

### Method B: Menggunakan Tinker

```bash
php artisan tinker
>>> App\Models\Admin::create(['username' => 'admin', 'password' => 'password123'])
>>> exit
```

- [ ] Admin user sudah dibuat via Tinker

### Method C: Langsung di Database

INSERT langsung ke database:
```sql
INSERT INTO admins (username, password) VALUES ('admin', 'password123');
```

- [ ] Admin user sudah dibuat langsung di database

## 5️⃣ Verifikasi Files

Pastikan semua file sudah dibuat:

- [ ] `BACKEND/app/Http/Controllers/AdminController.php` ✓
- [ ] `BACKEND/app/Http/Middleware/AdminAuth.php` ✓
- [ ] `BACKEND/resources/views/admin/login.blade.php` ✓
- [ ] `BACKEND/resources/views/admin/dashboard.blade.php` ✓
- [ ] `BACKEND/resources/views/admin/berita/index.blade.php` ✓
- [ ] `BACKEND/resources/views/admin/berita/create.blade.php` ✓
- [ ] `BACKEND/resources/views/admin/berita/edit.blade.php` ✓
- [ ] `BACKEND/resources/views/admin/materi/index.blade.php` ✓
- [ ] `BACKEND/resources/views/admin/materi/create.blade.php` ✓
- [ ] `BACKEND/resources/views/admin/materi/edit.blade.php` ✓
- [ ] `BACKEND/routes/web.php` sudah updated dengan admin routes ✓

## 6️⃣ Test Routes

- [ ] Clear cache
  ```bash
  php artisan route:clear
  php artisan cache:clear
  ```

- [ ] Cek routes admin
  ```bash
  php artisan route:list | grep admin
  ```

  Output yang diharapkan:
  ```
  POST      admin/login .............................. admin.login
  GET       admin/dashboard .......................... admin.dashboard
  GET       admin/berita ............................ admin.berita.index
  GET       admin/berita/create ..................... admin.berita.create
  POST      admin/berita ............................ admin.berita.store
  GET       admin/berita/{id}/edit ................. admin.berita.edit
  POST      admin/berita/{id} ....................... admin.berita.update
  POST      admin/berita/{id}/delete ............... admin.berita.delete
  GET       admin/materi ............................ admin.materi.index
  GET       admin/materi/create ..................... admin.materi.create
  POST      admin/materi ............................ admin.materi.store
  GET       admin/materi/{id}/edit ................. admin.materi.edit
  POST      admin/materi/{id} ....................... admin.materi.update
  POST      admin/materi/{id}/delete ............... admin.materi.delete
  ```

## 7️⃣ Run Server & Test

- [ ] Start Laravel server
  ```bash
  php artisan serve
  ```

- [ ] Buka browser ke `http://localhost:8000/admin/login`

- [ ] Login dengan credentials:
  - Username: `admin`
  - Password: `password123` (atau sesuai yang dibuat)

- [ ] Jika login berhasil, redirect ke dashboard `/admin/dashboard`

- [ ] Test setiap fitur:
  - [ ] Dashboard tampil dengan baik
  - [ ] List Berita tampil
  - [ ] Tambah Berita berfungsi
  - [ ] Edit Berita berfungsi
  - [ ] Hapus Berita berfungsi
  - [ ] List Materi tampil
  - [ ] Tambah Materi berfungsi
  - [ ] Edit Materi berfungsi
  - [ ] Hapus Materi berfungsi
  - [ ] Logout berfungsi

## 8️⃣ (Optional) Security Improvements

- [ ] Hash passwords saat create/update admin
  - Ubah di `AdminController.php` baris login dan create:
  ```php
  use Illuminate\Support\Facades\Hash;
  
  // Saat cek password
  if ($admin && Hash::check($request->password, $admin->password)) {
      // Login OK
  }
  ```

- [ ] Add CSRF protection untuk form (already included)

- [ ] Add input validation (already included)

- [ ] Add file validation (already included)

## 9️⃣ Database Structure

Pastikan table `admins` memiliki struktur ini:

```sql
CREATE TABLE admins (
    id bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL
);
```

- [ ] Table `admins` sudah benar strukturnya

## 🔟 Final Verification

- [ ] Semua checklist di atas sudah di-centang
- [ ] Admin panel dapat diakses dan berfungsi normal
- [ ] File uploads berfungsi (berita + materi)
- [ ] Database records terupdate dengan benar
- [ ] Session management bekerja

---

## 🚨 Emergency Troubleshoot

Jika ada yang error, coba:

1. Clear cache:
   ```bash
   php artisan cache:clear
   php artisan route:clear
   php artisan config:clear
   ```

2. Cek logs:
   ```bash
   tail -f storage/logs/laravel.log
   ```

3. Check permissions:
   ```bash
   chmod -R 755 bootstrap/cache
   chmod -R 755 storage
   chmod -R 755 public/images
   chmod -R 755 public/uploads
   chmod -R 755 public/pdf
   ```

---

**Semua selesai? Panel admin siap digunakan! 🎉**
