<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminUser::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@admin.com'),
        ]);
    }
}
