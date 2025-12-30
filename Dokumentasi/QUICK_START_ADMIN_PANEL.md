# 🎯 Quick Start Guide - Admin Panel Kreasimu

## Akses Cepat

| Halaman | URL | Deskripsi |
|---------|-----|-----------|
| Login Admin | `/admin/login` | Halaman login admin |
| Dashboard | `/admin/dashboard` | Dashboard utama (proteksi middleware) |
| Daftar Berita | `/admin/berita` | List semua berita |
| Tambah Berita | `/admin/berita/create` | Form tambah berita baru |
| Edit Berita | `/admin/berita/{id}/edit` | Form edit berita |
| Daftar Materi | `/admin/materi` | List semua materi |
| Tambah Materi | `/admin/materi/create` | Form tambah materi baru |
| Edit Materi | `/admin/materi/{id}/edit` | Form edit materi |

---

## ⚡ Setup Cepat (5 Langkah)

### 1. Buat Folder Upload
```bash
mkdir -p public/images/berita public/uploads/materi public/pdf
```

### 2. Register Middleware (Edit: `BACKEND/bootstrap/app.php`)
```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin.auth' => \App\Http\Middleware\AdminAuth::class,
    ]);
})
```

### 3. Buat Admin User (Jalankan di command line)
```bash
php artisan tinker
>>> App\Models\Admin::create(['username' => 'admin', 'password' => 'password123'])
>>> exit
```

### 4. Clear Cache
```bash
php artisan cache:clear
php artisan route:clear
```

### 5. Jalankan Server & Test
```bash
php artisan serve
# Buka: http://localhost:8000/admin/login
# Username: admin
# Password: password123
```

---

## 📊 Features Overview

### 🔐 Authentication
- ✅ Login dengan username & password
- ✅ Session-based authentication
- ✅ Protected routes dengan middleware
- ✅ Logout functionality

### 📰 Berita Management
| Fitur | Status |
|-------|--------|
| Create Berita | ✅ |
| Read/List Berita | ✅ |
| Update Berita | ✅ |
| Delete Berita | ✅ |
| Filter Kategori | ✅ |
| Filter Status | ✅ |
| Search | ✅ |
| Upload Gambar | ✅ |
| Upload PDF | ✅ |
| YouTube Link | ✅ |

### 📚 Materi Management
| Fitur | Status |
|-------|--------|
| Create Materi | ✅ |
| Read/List Materi | ✅ |
| Update Materi | ✅ |
| Delete Materi | ✅ |
| Search | ✅ |
| File Upload | ✅ |
| Password Protection | ✅ |
| Link to News | ✅ |

---

## 🏗️ Architecture

```
┌─────────────────────────────────────────┐
│      Admin Login Form                   │
│   (/admin/login)                        │
└──────────────┬──────────────────────────┘
               │ Login dengan username & password
               ↓
┌─────────────────────────────────────────┐
│      Dashboard Admin                    │
│   (/admin/dashboard)                    │
│   (Protected by admin.auth middleware)  │
└──────────────┬──────────────────────────┘
        │              │
        ↓              ↓
    ┌────────┐    ┌────────┐
    │ Berita │    │ Materi │
    │ CRUD   │    │ CRUD   │
    └────────┘    └────────┘
        │              │
        ├─ Create      ├─ Create
        ├─ Read/List   ├─ Read/List
        ├─ Update      ├─ Update
        └─ Delete      └─ Delete
```

---

## 📁 File Baru yang Dibuat

```
✨ CREATED FILES:

Controllers:
  └─ app/Http/Controllers/AdminController.php
  
Middleware:
  └─ app/Http/Middleware/AdminAuth.php
  
Views (Admin Panel):
  └─ resources/views/admin/
      ├─ login.blade.php
      ├─ dashboard.blade.php
      ├─ berita/
      │   ├─ index.blade.php
      │   ├─ create.blade.php
      │   └─ edit.blade.php
      └─ materi/
          ├─ index.blade.php
          ├─ create.blade.php
          └─ edit.blade.php

✏️ UPDATED FILES:

Routes:
  └─ routes/web.php (Added admin routes)
  
Bootstrap:
  └─ bootstrap/app.php (Need to add middleware alias)

📄 DOCUMENTATION:

  └─ ADMIN_PANEL_SETUP.md (Panduan lengkap)
  └─ ADMIN_PANEL_SETUP_CHECKLIST.md (Setup checklist)
```

---

## 🔐 Default Login

**Username:** `admin`  
**Password:** `password123`

> ⚠️ Ganti password segera setelah login pertama kali!

---

## 📸 UI Preview

### Login Page
- Modern gradient design
- Input username & password
- Error messages
- Success notifications

### Dashboard
- Welcome message
- Statistics cards (Total Berita, Total Materi)
- Quick access buttons
- Recent items list

### Berita List
- Table dengan columns: Judul, Kategori, Status, Tanggal, Aksi
- Filter box (Search, Category, Status)
- Pagination
- Edit & Delete buttons
- Add new button

### Create/Edit Forms
- Input validation
- File upload fields
- Rich text areas
- Category & status dropdowns
- Error messages
- Cancel button

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 11+
- **Database**: MySQL/MariaDB
- **Frontend**: HTML5, CSS3 (Modern styling)
- **Authentication**: Session-based
- **File Upload**: Laravel built-in

---

## 💾 Upload File Configuration

### Berita Image
- **Max Size**: 2MB
- **Format**: JPEG, PNG, JPG, GIF
- **Path**: `public/images/berita/`

### Berita PDF
- **Max Size**: 10MB
- **Format**: PDF
- **Path**: `public/pdf/`

### Materi File
- **Max Size**: 50MB
- **Format**: Semua format file
- **Path**: `public/uploads/materi/`

---

## ⚙️ Environment Setup

Pastikan di `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=websitekreasimu
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
FILESYSTEM_DISK=public
```

---

## 🚨 Common Issues & Solutions

| Problem | Solution |
|---------|----------|
| Login gagal | Cek username/password di database |
| File upload error | Check folder permissions (chmod 755) |
| Middleware not found | Daftar di bootstrap/app.php |
| Session expired | Check SESSION_DRIVER di .env |
| Routes not found | Jalankan `php artisan route:clear` |

---

## 🚀 Next Steps

1. ✅ Setup sesuai checklist
2. ✅ Create admin user
3. ✅ Login ke panel
4. ✅ Mulai manage berita & materi
5. (Optional) Hash passwords untuk security
6. (Optional) Add user management

---

## 📞 Quick Reference

```php
// Login check di view
@if (session('admin_id'))
    // User is logged in
@endif

// Get admin name
{{ session('admin_name') }}

// Check user session
$adminId = session('admin_id');

// Logout
session()->forget(['admin_id', 'admin_name']);
```

---

## 🎉 Ready to Go!

Admin panel Kreasimu siap digunakan. Akses ke `/admin/login` dan mulai mengelola konten!

Untuk dokumentasi lebih detail, lihat:
- 📖 `ADMIN_PANEL_SETUP.md`
- ✅ `ADMIN_PANEL_SETUP_CHECKLIST.md`

---

**Happy Admin! 🚀**
