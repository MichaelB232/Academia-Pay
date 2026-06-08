<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // -------------------------------------------------------
        // 1. USERS
        // -------------------------------------------------------
        DB::table('users')->insert([
            ['username' => 'admin',       'role' => 'admin',  'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'sdm_budi',    'role' => 'sdm',    'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'sdm_sari',    'role' => 'sdm',    'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'keuangan_eko', 'role' => 'finance', 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
        ]);

        // -------------------------------------------------------
        // 2. DEPARTEMENS
        // -------------------------------------------------------
        DB::table('departemens')->insert([
            ['nama_departemen' => 'Teknologi Informasi'],
            ['nama_departemen' => 'Sumber Daya Manusia'],
            ['nama_departemen' => 'Keuangan'],
            ['nama_departemen' => 'Operasional'],
        ]);

        // -------------------------------------------------------
        // 3. POSITIONS
        // -------------------------------------------------------
        DB::table('positions')->insert([
            // TI
            ['nama_jabatan' => 'Software Engineer',       'departemen_id' => 1, 'nominal_tunjangan' => 2000000, 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'DevOps Engineer',         'departemen_id' => 1, 'nominal_tunjangan' => 2200000, 'created_at' => now(), 'updated_at' => now()],
            // SDM
            ['nama_jabatan' => 'HR Specialist',           'departemen_id' => 2, 'nominal_tunjangan' => 1500000, 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Recruitment Officer',     'departemen_id' => 2, 'nominal_tunjangan' => 1400000, 'created_at' => now(), 'updated_at' => now()],
            // Keuangan
            ['nama_jabatan' => 'Akuntan',                 'departemen_id' => 3, 'nominal_tunjangan' => 1800000, 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Financial Analyst',       'departemen_id' => 3, 'nominal_tunjangan' => 2000000, 'created_at' => now(), 'updated_at' => now()],
            // Operasional
            ['nama_jabatan' => 'Supervisor Operasional',  'departemen_id' => 4, 'nominal_tunjangan' => 1700000, 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Staff Operasional',       'departemen_id' => 4, 'nominal_tunjangan' => 1200000, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // -------------------------------------------------------
        // 4. EMPLOYEES
        // -------------------------------------------------------
        DB::table('employees')->insert([
            ['nama_karyawan' => 'Andi Pratama',    'niy' => 'NIY-001', 'status_aktif' => true,  'gaji_pokok' => 8000000,  'position_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama_karyawan' => 'Budi Santoso',    'niy' => 'NIY-002', 'status_aktif' => true,  'gaji_pokok' => 9000000,  'position_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['nama_karyawan' => 'Citra Dewi',      'niy' => 'NIY-003', 'status_aktif' => true,  'gaji_pokok' => 6500000,  'position_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['nama_karyawan' => 'Dian Rahayu',     'niy' => 'NIY-004', 'status_aktif' => true,  'gaji_pokok' => 6000000,  'position_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['nama_karyawan' => 'Eko Nugroho',     'niy' => 'NIY-005', 'status_aktif' => true,  'gaji_pokok' => 7500000,  'position_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['nama_karyawan' => 'Fajar Hidayat',   'niy' => 'NIY-006', 'status_aktif' => true,  'gaji_pokok' => 8500000,  'position_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['nama_karyawan' => 'Gita Lestari',    'niy' => 'NIY-007', 'status_aktif' => true,  'gaji_pokok' => 7000000,  'position_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['nama_karyawan' => 'Hendra Wijaya',   'niy' => 'NIY-008', 'status_aktif' => false, 'gaji_pokok' => 5500000,  'position_id' => 8, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // -------------------------------------------------------
        // 5. PERIODS
        // -------------------------------------------------------
        DB::table('periods')->insert([
            ['bulan' => 1,  'tahun' => 2025, 'status' => 'closed', 'created_at' => now(), 'updated_at' => now()],
            ['bulan' => 2,  'tahun' => 2025, 'status' => 'closed', 'created_at' => now(), 'updated_at' => now()],
            ['bulan' => 3,  'tahun' => 2025, 'status' => 'closed', 'created_at' => now(), 'updated_at' => now()],
            ['bulan' => 4,  'tahun' => 2025, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // -------------------------------------------------------
        // 6. KPI_CRITERIA  (per position)
        // -------------------------------------------------------
        DB::table('kpi_criteria')->insert([
            // Software Engineer (position 1)
            ['position_id' => 1, 'nama_kriteria' => 'Kualitas Kode',        'deskripsi' => 'Tingkat bug dan code review', 'bobot' => 30, 'created_at' => now(), 'updated_at' => now()],
            ['position_id' => 1, 'nama_kriteria' => 'Ketepatan Deadline',   'deskripsi' => 'Penyelesaian task tepat waktu', 'bobot' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['position_id' => 1, 'nama_kriteria' => 'Kolaborasi Tim',       'deskripsi' => 'Kerja sama dengan tim',         'bobot' => 30, 'created_at' => now(), 'updated_at' => now()],
            // DevOps Engineer (position 2)
            ['position_id' => 2, 'nama_kriteria' => 'Uptime Sistem',        'deskripsi' => 'Persentase uptime server',      'bobot' => 50, 'created_at' => now(), 'updated_at' => now()],
            ['position_id' => 2, 'nama_kriteria' => 'Incident Response',    'deskripsi' => 'Kecepatan penanganan insiden',  'bobot' => 50, 'created_at' => now(), 'updated_at' => now()],
            // HR Specialist (position 3)
            ['position_id' => 3, 'nama_kriteria' => 'Rekrutmen Tepat Waktu', 'deskripsi' => 'SLA rekrutmen terpenuhi',       'bobot' => 60, 'created_at' => now(), 'updated_at' => now()],
            ['position_id' => 3, 'nama_kriteria' => 'Kepuasan Karyawan',    'deskripsi' => 'Hasil survei kepuasan',         'bobot' => 40, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // -------------------------------------------------------
        // 7. DISCIPLINE_ASSESSMENTS
        // -------------------------------------------------------
        $disciplineData = [];
        $scores = [92.5, 88.0, 95.0, 78.5, 90.0, 85.0, 93.0, 70.0];
        for ($periodId = 1; $periodId <= 4; $periodId++) {
            foreach (range(1, 8) as $empId) {
                $disciplineData[] = [
                    'employee_id'       => $empId,
                    'period_id'         => $periodId,
                    'skor_kedisiplinan' => $scores[$empId - 1] + rand(-3, 3),
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ];
            }
        }
        DB::table('discipline_assessments')->insert($disciplineData);

        // -------------------------------------------------------
        // 8. KPI_ASSESSMENTS
        // -------------------------------------------------------
        // Employees 1–2 → position 1 & 2 (criteria 1–5)
        // Employee  3   → position 3     (criteria 6–7)
        $kpiMap = [
            1 => [1, 2, 3],
            2 => [4, 5],
            3 => [6, 7],
        ];
        $kpiData = [];
        foreach ($kpiMap as $empId => $criteriaIds) {
            for ($periodId = 1; $periodId <= 4; $periodId++) {
                foreach ($criteriaIds as $criteriaId) {
                    $kpiData[] = [
                        'employee_id'    => $empId,
                        'period_id'      => $periodId,
                        'kpi_criteria_id' => $criteriaId,
                        'skor_kpi'       => rand(70, 100),
                        'created_at'     => now(),
                        'updated_at'     => now(),
                    ];
                }
            }
        }
        DB::table('kpi_assessments')->insert($kpiData);

        // -------------------------------------------------------
        // 9. PAYROLLS  (periods 1–3, employees 1–7 active)
        // -------------------------------------------------------
        $gajiPokok = [8000000, 9000000, 6500000, 6000000, 7500000, 8500000, 7000000];
        $tunjangan = [2000000, 2200000, 1500000, 1400000, 1800000, 2000000, 1700000];

        $payrollInserts = [];
        for ($periodId = 1; $periodId <= 3; $periodId++) {
            foreach (range(1, 7) as $empId) {
                $pokok      = $gajiPokok[$empId - 1];
                $tunj       = $tunjangan[$empId - 1];
                $potongan   = $pokok * 0.05; // BPJS 5%
                $bersih     = $pokok + $tunj - $potongan;
                $payrollInserts[] = [
                    'employee_id'    => $empId,
                    'period_id'      => $periodId,
                    'gaji_pokok'     => $pokok,
                    'total_tunjangan' => $tunj,
                    'total_potongan' => $potongan,
                    'gaji_bersih'    => $bersih,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ];
            }
        }
        DB::table('payrolls')->insert($payrollInserts);

        // -------------------------------------------------------
        // 10. PAYROLL_DEDUCTIONS
        // -------------------------------------------------------
        // payroll IDs: 1..21  (3 periods × 7 employees)
        $deductionInserts = [];
        for ($payrollId = 1; $payrollId <= 21; $payrollId++) {
            $empIdx  = (($payrollId - 1) % 7);
            $baseGaji = $gajiPokok[$empIdx];

            $deductionInserts[] = [
                'payroll_id'      => $payrollId,
                'nama_potongan'   => 'BPJS Kesehatan',
                'deskripsi'       => 'Iuran BPJS Kesehatan 1%',
                'nominal_potongan' => $baseGaji * 0.01,
                'created_at'      => now(),
                'updated_at'      => now(),
            ];
            $deductionInserts[] = [
                'payroll_id'      => $payrollId,
                'nama_potongan'   => 'BPJS Ketenagakerjaan',
                'deskripsi'       => 'Iuran BPJS TK 2%',
                'nominal_potongan' => $baseGaji * 0.02,
                'created_at'      => now(),
                'updated_at'      => now(),
            ];
            $deductionInserts[] = [
                'payroll_id'      => $payrollId,
                'nama_potongan'   => 'PPh 21',
                'deskripsi'       => 'Pajak Penghasilan 2%',
                'nominal_potongan' => $baseGaji * 0.02,
                'created_at'      => now(),
                'updated_at'      => now(),
            ];
        }
        DB::table('payroll_deductions')->insert($deductionInserts);
    }
}
