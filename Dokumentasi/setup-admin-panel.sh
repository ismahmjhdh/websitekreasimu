#!/bin/bash

# ===================================================
# Admin Panel Setup Helper Script
# Script ini membantu setup admin panel Kreasimu
# ===================================================

echo "╔═══════════════════════════════════════════════╗"
echo "║   ADMIN PANEL KREASIMU - SETUP HELPER        ║"
echo "╚═══════════════════════════════════════════════╝"
echo ""

# Check if we're in the right directory
if [ ! -f "BACKEND/artisan" ]; then
    echo "❌ Error: This script must be run from project root directory"
    echo "   Please run: cd /path/to/websitekreasimu"
    exit 1
fi

# Step 1: Create upload folders
echo "📁 Step 1: Creating upload folders..."
mkdir -p BACKEND/public/images/berita
mkdir -p BACKEND/public/uploads/materi
mkdir -p BACKEND/public/pdf
chmod -R 755 BACKEND/public/images/berita
chmod -R 755 BACKEND/public/uploads/materi
chmod -R 755 BACKEND/public/pdf
echo "✅ Upload folders created!"
echo ""

# Step 2: Run migrations
echo "🔄 Step 2: Running migrations..."
cd BACKEND
php artisan migrate --force
cd ..
echo "✅ Migrations completed!"
echo ""

# Step 3: Create admin user (optional)
echo "👤 Step 3: Create admin user (optional)"
read -p "Do you want to create admin user now? (y/n): " create_admin

if [ "$create_admin" = "y" ] || [ "$create_admin" = "Y" ]; then
    cd BACKEND
    echo "Enter admin credentials:"
    read -p "Username: " username
    read -sp "Password: " password
    echo ""
    
    # Create admin using tinker
    php artisan tinker <<EOF
App\Models\Admin::create(['username' => '$username', 'password' => '$password']);
EOF
    
    echo "✅ Admin user created!"
    cd ..
else
    echo "⏭️  Skipping admin user creation"
    echo "   You can create it later with:"
    echo "   php artisan tinker"
    echo "   >>> App\Models\Admin::create(['username' => 'admin', 'password' => 'password123'])"
    echo ""
fi

echo ""
echo "🧹 Step 4: Clearing cache..."
cd BACKEND
php artisan cache:clear
php artisan route:clear
php artisan config:clear
cd ..
echo "✅ Cache cleared!"
echo ""

# Final info
echo "╔═══════════════════════════════════════════════╗"
echo "║   ✅ SETUP COMPLETED!                          ║"
echo "╚═══════════════════════════════════════════════╝"
echo ""
echo "📋 Next steps:"
echo "   1. Start server: cd BACKEND && php artisan serve"
echo "   2. Open browser: http://localhost:8000/admin/login"
echo "   3. Login with your credentials"
echo "   4. Start managing berita and materi!"
echo ""
echo "📖 For more information:"
echo "   - QUICK_START_ADMIN_PANEL.md"
echo "   - ADMIN_PANEL_SETUP.md"
echo "   - README_ADMIN_PANEL.md"
echo ""
echo "Happy Admin Paneling! 🚀"
