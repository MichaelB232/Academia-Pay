<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'role' => 'Biro Sumber Daya Manusia',
            'password' => Hash::make('123')
        ]);

        User::create([
            'username' => 'ifsal',
            'role' => 'Biro Keuangan',
            'password' => Hash::make('123')
        ]);

        User::create([
            'username' => 'admin',
            'role' => 'Kepala Yayasan',
            'password' => Hash::make('123')
        ]);
    }
}
