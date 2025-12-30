# 🔄 Database Migration & Seeder Setup

## ✅ Required Migrations

Pastikan semua migrations sudah ter-run. Jalankan:

```bash
cd BACKEND
php artisan migrate
```

### Tabel yang Diperlukan

Berikut adalah tabel-tabel yang harus ada:

#### 1. Table `admins`
```sql
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

**Status**: ✅ Sudah ada migration di `database/migrations/2025_12_25_164954_create_admins_table.php`

#### 2. Table `berita`
```sql
CREATE TABLE `berita` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci,
  `pdf_url` varchar(255) COLLATE utf8mb4_unicode_ci,
  `created_by` bigint unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

**Status**: ✅ Sudah ada migration

#### 3. Table `materi`
```sql
CREATE TABLE `materi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci,
  `access_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `related_news_id` bigint unsigned,
  `created_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`related_news_id`) REFERENCES `berita` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

**Status**: ✅ Sudah ada migration

---

## 🌱 Seeder Setup

### Langkah 1: Daftarkan Seeder

Edit file `BACKEND/database/seeders/DatabaseSeeder.php`:

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan AdminSeeder
        $this->call([
            AdminSeeder::class,
        ]);

        // (Optional) Jalankan seeder lainnya
        // $this->call([
        //     BeritaSeeder::class,
        //     MateriSeeder::class,
        // ]);
    }
}
```

### Langkah 2: Jalankan Seeder

```bash
# Run all seeders
php artisan db:seed

# Atau run specific seeder
php artisan db:seed --class=AdminSeeder
```

### Langkah 3: Verifikasi Data

Check database:
```bash
# Using mysql CLI
mysql> USE websitekreasimu;
mysql> SELECT * FROM admins;

# Output yang diharapkan:
# +----+----------+-------------+---------------------+---------------------+
# | id | username | password    | created_at          | updated_at          |
# +----+----------+-------------+---------------------+---------------------+
# |  1 | admin    | password123 | 2025-01-01 00:00:00 | 2025-01-01 00:00:00 |
# +----+----------+-------------+---------------------+---------------------+
```

---

## 🔧 Troubleshooting Seeder

### Error: "Class AdminSeeder not found"
**Solution**: Pastikan file ada di `BACKEND/database/seeders/AdminSeeder.php`

### Error: "Foreign key constraint fails"
**Solution**: Pastikan tabel `admins` sudah ter-create sebelum seeding berita/materi

### Seeder tidak berjalan
**Solution**: 
```bash
# Composer autoload
composer dump-autoload

# Clear cache
php artisan cache:clear

# Run seeder lagi
php artisan db:seed
```

---

## 🔄 Fresh Migration + Seeding

Jika ingin reset database sepenuhnya:

```bash
# ⚠️ WARNING: Ini akan menghapus semua data!
php artisan migrate:fresh --seed

# Atau dengan specific seeder
php artisan migrate:fresh --seed --class=AdminSeeder
```

---

## 📝 Optional: Sample Data Seeder

Jika ingin membuat sample berita dan materi, buat file baru:

**File**: `BACKEND/database/seeders/SampleDataSeeder.php`

```php
<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\Materi;
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    public function run(): void
    {
        // Buat sample berita
        Berita::create([
            'title' => 'Selamat Datang di Kreasimu',
            'content' => 'Ini adalah berita pertama di platform Kreasimu...',
            'category' => 'berita',
            'status' => 'published',
            'created_by' => 1, // Admin ID
        ]);

        // Buat sample materi
        Materi::create([
            'title' => 'Materi Pembelajaran Dasar',
            'description' => 'Materi pembelajaran untuk pemula',
            'access_password' => 'materi123',
            'created_by' => 1, // Admin ID
        ]);
    }
}
```

Kemudian daftarkan di `DatabaseSeeder.php`:
```php
$this->call([
    AdminSeeder::class,
    SampleDataSeeder::class, // ← Tambahan
]);
```

---

## 🗂️ Migration Files Reference

Semua migration sudah ada di `BACKEND/database/migrations/`:

1. **2025_12_25_164954_create_admins_table.php**
   - Create table `admins`

2. **2025_12_25_164954_create_berita_table.php**
   - Create table `berita`

3. **2025_12_25_164954_create_materi_table.php**
   - Create table `materi`

4. **2025_12_25_164957_add_foreign_keys_to_berita_table.php**
   - Add foreign key `created_by` → `admins`

5. **2025_12_25_164957_add_foreign_keys_to_materi_table.php**
   - Add foreign keys `created_by` dan `related_news_id`

---

## ✅ Checklist

- [ ] Migrations sudah ter-run (`php artisan migrate`)
- [ ] Table `admins` ada di database
- [ ] Table `berita` ada di database
- [ ] Table `materi` ada di database
- [ ] AdminSeeder sudah dibuat di `database/seeders/AdminSeeder.php`
- [ ] AdminSeeder sudah didaftarkan di `DatabaseSeeder.php`
- [ ] Seeder sudah di-run (`php artisan db:seed`)
- [ ] Data admin sudah ada di database
- [ ] Admin dapat login dengan username & password

---

## 🚀 Quick Commands

```bash
# Check migrations
php artisan migrate:status

# Run migrations
php artisan migrate

# Run migrations fresh (reset)
php artisan migrate:fresh

# Run seeders
php artisan db:seed

# Run migrations + seeders
php artisan migrate --seed

# Reset dan seed ulang
php artisan migrate:fresh --seed

# Run specific seeder
php artisan db:seed --class=AdminSeeder
```

---

**Database setup complete!** ✅

Lanjut ke [Quick Start Guide](QUICK_START_ADMIN_PANEL.md) untuk menjalankan admin panel.
