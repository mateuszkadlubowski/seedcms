<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function insertAdminAccount()
    {
//        DB::table('users')->insertOrIgnore([
//            'id' => 1,
//            'username' => 'admin',
//            'email' => config('admin.admin_email', 'admin@admin.pl'),
//            'password' => Hash::make('admin123'),
//            'email_verified_at' => now(),
//            'created_at' => now()
//        ]);

        User::factory()->create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => config('admin.admin_email', 'admin@admin.pl'),
            'password' => Hash::make('admin123'),
        ]);
    }

    public function run(): void
    {
        // User::factory(10)->create();
        $this->insertAdminAccount();
    }
}
