<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // USERS
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'role' => 'admin',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // DEPARTEMENS
        DB::table('departemens')->insert([
            ['nama_departemen' => 'Management'],
            ['nama_departemen' => 'Human Resources'],
            ['nama_departemen' => 'Finance'],
        ]);

        // POSITIONS
        DB::table('positions')->insert([
            [
                'nama_jabatan' => 'Manager',
                'departemen_id' => 1,
                'nominal_tunjangan' => 3000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_jabatan' => 'HR Staff',
                'departemen_id' => 2,
                'nominal_tunjangan' => 1000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_jabatan' => 'Finance Staff',
                'departemen_id' => 3,
                'nominal_tunjangan' => 1000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // KPI CRITERIA
        DB::table('kpi_criterias')->insert([
            [
                'position_id' => 1,
                'nama_kriteria' => 'Leadership',
                'deskripsi' => 'Kemampuan memimpin tim',
                'bobot' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_id' => 1,
                'nama_kriteria' => 'Decision Making',
                'deskripsi' => 'Kemampuan mengambil keputusan',
                'bobot' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_id' => 2,
                'nama_kriteria' => 'Discipline',
                'deskripsi' => 'Kedisiplinan kerja',
                'bobot' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_id' => 2,
                'nama_kriteria' => 'Communication',
                'deskripsi' => 'Kemampuan komunikasi',
                'bobot' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_id' => 3,
                'nama_kriteria' => 'Accuracy',
                'deskripsi' => 'Ketelitian pekerjaan',
                'bobot' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'position_id' => 3,
                'nama_kriteria' => 'Reporting',
                'deskripsi' => 'Kualitas laporan',
                'bobot' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // EMPLOYEES
        DB::table('employees')->insert([
            [
                'nama_karyawan' => 'Budi Santoso',
                'niy' => 'EMP001',
                'position_id' => 1,
                'gaji_pokok' => 10000000,
                'status_aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_karyawan' => 'Siti Nurhaliza',
                'niy' => 'EMP002',
                'position_id' => 2,
                'gaji_pokok' => 6000000,
                'status_aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_karyawan' => 'Andi Wijaya',
                'niy' => 'EMP003',
                'position_id' => 3,
                'gaji_pokok' => 6500000,
                'status_aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
