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
            ['username' => 'admin',          'role' => 'admin',   'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'sdm_nurhayati',  'role' => 'sdm',     'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'sdm_fauzan',     'role' => 'sdm',     'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'keuangan_titis', 'role' => 'finance', 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
        ]);

        // -------------------------------------------------------
        // 2. DEPARTEMENS
        // -------------------------------------------------------
        DB::table('departemens')->insert([
            ['nama_departemen' => 'Pendidikan & Kurikulum'],
            ['nama_departemen' => 'Sumber Daya Manusia'],
            ['nama_departemen' => 'Keuangan & Akuntansi'],
            ['nama_departemen' => 'Sarana & Prasarana'],
        ]);

        // -------------------------------------------------------
        // 3. POSITIONS
        // -------------------------------------------------------
        DB::table('positions')->insert([
            // Pendidikan & Kurikulum
            ['nama_jabatan' => 'Kepala Sekolah',          'departemen_id' => 1, 'nominal_tunjangan' => 3000000, 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Guru Kelas',               'departemen_id' => 1, 'nominal_tunjangan' => 1500000, 'created_at' => now(), 'updated_at' => now()],
            // SDM
            ['nama_jabatan' => 'Manajer SDM',              'departemen_id' => 2, 'nominal_tunjangan' => 2000000, 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Staf Administrasi',        'departemen_id' => 2, 'nominal_tunjangan' => 1200000, 'created_at' => now(), 'updated_at' => now()],
            // Keuangan
            ['nama_jabatan' => 'Bendahara Yayasan',        'departemen_id' => 3, 'nominal_tunjangan' => 2500000, 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Staf Keuangan',            'departemen_id' => 3, 'nominal_tunjangan' => 1400000, 'created_at' => now(), 'updated_at' => now()],
            // Sarana & Prasarana
            ['nama_jabatan' => 'Kepala Bagian Sarana',     'departemen_id' => 4, 'nominal_tunjangan' => 1800000, 'created_at' => now(), 'updated_at' => now()],
            ['nama_jabatan' => 'Teknisi & Pemeliharaan',   'departemen_id' => 4, 'nominal_tunjangan' => 1100000, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // -------------------------------------------------------
        // 4. EMPLOYEES
        // -------------------------------------------------------
        DB::table('employees')->insert([
            ['nama_karyawan' => 'Drs. Ahmad Fauzi',        'niy' => 'NIY-001', 'status_aktif' => true,  'gaji_pokok' => 9000000, 'position_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['nama_karyawan' => 'Siti Rahmawati, S.Pd',   'niy' => 'NIY-002', 'status_aktif' => true,  'gaji_pokok' => 6000000, 'position_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['nama_karyawan' => 'Nurhayati, S.H',          'niy' => 'NIY-003', 'status_aktif' => true,  'gaji_pokok' => 7000000, 'position_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['nama_karyawan' => 'Fauzan Arifin',           'niy' => 'NIY-004', 'status_aktif' => true,  'gaji_pokok' => 5000000, 'position_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['nama_karyawan' => 'Titis Suryani, S.E',      'niy' => 'NIY-005', 'status_aktif' => true,  'gaji_pokok' => 8000000, 'position_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['nama_karyawan' => 'Bambang Kurniawan',       'niy' => 'NIY-006', 'status_aktif' => true,  'gaji_pokok' => 5500000, 'position_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['nama_karyawan' => 'Hj. Rini Astuti',         'niy' => 'NIY-007', 'status_aktif' => true,  'gaji_pokok' => 6500000, 'position_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['nama_karyawan' => 'Sugeng Prayitno',         'niy' => 'NIY-008', 'status_aktif' => false, 'gaji_pokok' => 4500000, 'position_id' => 8, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // -------------------------------------------------------
        // 5. PERIODS
        // -------------------------------------------------------
        DB::table('periods')->insert([
            ['bulan' => 1, 'tahun' => 2025, 'status' => 'closed', 'created_at' => now(), 'updated_at' => now()],
            ['bulan' => 2, 'tahun' => 2025, 'status' => 'closed', 'created_at' => now(), 'updated_at' => now()],
            ['bulan' => 3, 'tahun' => 2025, 'status' => 'closed', 'created_at' => now(), 'updated_at' => now()],
            ['bulan' => 4, 'tahun' => 2025, 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // -------------------------------------------------------
        // 6. KPI_CRITERIA  (per position)
        // -------------------------------------------------------
        DB::table('kpi_criteria')->insert([
            // Kepala Sekolah (position 1)
            ['position_id' => 1, 'nama_kriteria' => 'Kepemimpinan & Manajerial',  'deskripsi' => 'Kemampuan memimpin dan mengelola sekolah',         'bobot' => 35, 'created_at' => now(), 'updated_at' => now()],
            ['position_id' => 1, 'nama_kriteria' => 'Pencapaian Visi Yayasan',    'deskripsi' => 'Realisasi program kerja tahunan yayasan',           'bobot' => 35, 'created_at' => now(), 'updated_at' => now()],
            ['position_id' => 1, 'nama_kriteria' => 'Hubungan dengan Wali Murid', 'deskripsi' => 'Tingkat kepuasan dan komunikasi dengan orang tua',  'bobot' => 30, 'created_at' => now(), 'updated_at' => now()],
            // Guru Kelas (position 2)
            ['position_id' => 2, 'nama_kriteria' => 'Kualitas Pembelajaran',      'deskripsi' => 'Metode mengajar dan capaian hasil belajar siswa',    'bobot' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['position_id' => 2, 'nama_kriteria' => 'Kelengkapan Administrasi',   'deskripsi' => 'RPP, jurnal kelas, dan laporan nilai tepat waktu',   'bobot' => 30, 'created_at' => now(), 'updated_at' => now()],
            ['position_id' => 2, 'nama_kriteria' => 'Pembinaan Karakter Siswa',   'deskripsi' => 'Pendampingan akhlak dan kedisiplinan peserta didik',  'bobot' => 30, 'created_at' => now(), 'updated_at' => now()],
            // Bendahara Yayasan (position 5)
            ['position_id' => 5, 'nama_kriteria' => 'Akurasi Laporan Keuangan',   'deskripsi' => 'Ketepatan dan kebenaran laporan keuangan bulanan',   'bobot' => 50, 'created_at' => now(), 'updated_at' => now()],
            ['position_id' => 5, 'nama_kriteria' => 'Ketepatan Waktu Pelaporan',  'deskripsi' => 'Laporan diserahkan sesuai jadwal yayasan',           'bobot' => 50, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // -------------------------------------------------------
        // 7. DISCIPLINE_ASSESSMENTS
        // -------------------------------------------------------
        $scores = [94.0, 89.5, 92.0, 80.0, 96.0, 83.0, 91.0, 72.0];
        $disciplineData = [];
        for ($periodId = 1; $periodId <= 4; $periodId++) {
            foreach (range(1, 8) as $empId) {
                $disciplineData[] = [
                    'employee_id'       => $empId,
                    'period_id'         => $periodId,
                    'skor_kedisiplinan' => min(100, max(0, $scores[$empId - 1] + rand(-3, 3))),
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ];
            }
        }
        DB::table('discipline_assessments')->insert($disciplineData);

        // -------------------------------------------------------
        // 8. KPI_ASSESSMENTS
        // -------------------------------------------------------
        $kpiMap = [
            1 => [1, 2, 3], // Kepala Sekolah
            2 => [4, 5, 6], // Guru Kelas
            5 => [7, 8],    // Bendahara Yayasan
        ];
        $kpiData = [];
        foreach ($kpiMap as $empId => $criteriaIds) {
            for ($periodId = 1; $periodId <= 4; $periodId++) {
                foreach ($criteriaIds as $criteriaId) {
                    $kpiData[] = [
                        'employee_id'     => $empId,
                        'period_id'       => $periodId,
                        'kpi_criteria_id' => $criteriaId,
                        'skor_kpi'        => rand(70, 100),
                        'created_at'      => now(),
                        'updated_at'      => now(),
                    ];
                }
            }
        }
        DB::table('kpi_assessments')->insert($kpiData);

        // -------------------------------------------------------
        // 9. PAYROLLS  (periods 1–3, employees 1–7 active)
        // -------------------------------------------------------
        $gajiPokok = [9000000, 6000000, 7000000, 5000000, 8000000, 5500000, 6500000];
        $tunjangan = [3000000, 1500000, 2000000, 1200000, 2500000, 1400000, 1800000];

        $payrollInserts = [];
        for ($periodId = 1; $periodId <= 3; $periodId++) {
            foreach (range(1, 7) as $empId) {
                $pokok    = $gajiPokok[$empId - 1];
                $tunj     = $tunjangan[$empId - 1];
                $potongan = $pokok * 0.05;
                $bersih   = $pokok + $tunj - $potongan;
                $payrollInserts[] = [
                    'employee_id'     => $empId,
                    'period_id'       => $periodId,
                    'gaji_pokok'      => $pokok,
                    'total_tunjangan' => $tunj,
                    'total_potongan'  => $potongan,
                    'gaji_bersih'     => $bersih,
                    'created_at'      => now(),
                    'updated_at'      => now(),
                ];
            }
        }
        DB::table('payrolls')->insert($payrollInserts);

        // -------------------------------------------------------
        // 10. PAYROLL_DEDUCTIONS
        // -------------------------------------------------------
        $deductionInserts = [];
        for ($payrollId = 1; $payrollId <= 21; $payrollId++) {
            $empIdx   = ($payrollId - 1) % 7;
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
