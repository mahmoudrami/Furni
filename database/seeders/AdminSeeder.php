<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Owner',
            'email' => 'admin@gmail.com',
            'image' => 'https://ui-avatars.com/api/?background=a0a0a0&name=Admin',
            'password' => bcrypt(123456789),
        ]);
    }
}
