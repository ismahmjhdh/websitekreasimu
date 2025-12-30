<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat admin default
        Admin::create([
            'username' => 'admin',
            'password' => 'password123', // GANTI DENGAN PASSWORD YANG AMAN!
        ]);

        // (Optional) Buat admin tambahan
        // Admin::create([
        //     'username' => 'admin2',
        //     'password' => 'password456',
        // ]);
    }
}
