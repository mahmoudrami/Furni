<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'email' => 'App@gmail.com',
            'phone' => 'https://google.com',
            'facebook' => 'https://google.com',
            'instagram' => 'https://google.com',
            'linked_in' => 'https://google.com',
        ]);
    }
}
