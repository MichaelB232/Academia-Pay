<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── 1. Users ──────────────────────────────────────────────
        DB::table('users')->insert([
            ['username' => 'admin',       'role' => 'admin',    'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'keuangan',    'role' => 'keuangan', 'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
            ['username' => 'hrd',         'role' => 'hrd',      'password' => Hash::make('password'), 'created_at' => now(), 'updated_at' => now()],
        ]);

        // ── 2. Departements ───────────────────────────────────────
        $deptIds = [];
        $depts = ['Staff & TU', 'SMA', 'SMP', 'SD', 'Keuangan', 'Kurikulum'];
        foreach ($depts as $d) {
            $deptIds[$d] = DB::table('departements')->insertGetId([
                'nama_departement' => $d,
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }

        // ── 3. Positions ──────────────────────────────────────────
        $positions = [
            ['nama_jabatan' => 'Kepala Sekolah',    'departement_id' => $deptIds['Staff & TU'], 'nominal_tunjangan' => 2000000],
            ['nama_jabatan' => 'Kepala TU',         'departement_id' => $deptIds['Staff & TU'], 'nominal_tunjangan' => 1500000],
            ['nama_jabatan' => 'Staff TU',          'departement_id' => $deptIds['Staff & TU'], 'nominal_tunjangan' => 800000],
            ['nama_jabatan' => 'Bendahara',         'departement_id' => $deptIds['Keuangan'],   'nominal_tunjangan' => 1200000],
            ['nama_jabatan' => 'Staf Keuangan',     'departement_id' => $deptIds['Keuangan'],   'nominal_tunjangan' => 900000],
            ['nama_jabatan' => 'Waka Kurikulum',    'departement_id' => $deptIds['Kurikulum'],  'nominal_tunjangan' => 1500000],
            ['nama_jabatan' => 'Guru Matematika',   'departement_id' => $deptIds['SMA'],        'nominal_tunjangan' => 1000000],
            ['nama_jabatan' => 'Guru Bahasa Indo',  'departement_id' => $deptIds['SMA'],        'nominal_tunjangan' => 1000000],
            ['nama_jabatan' => 'Guru Bahasa Ing',   'departement_id' => $deptIds['SMA'],        'nominal_tunjangan' => 1000000],
            ['nama_jabatan' => 'Guru IPA',          'departement_id' => $deptIds['SMA'],        'nominal_tunjangan' => 1000000],
            ['nama_jabatan' => 'Wali Kelas SMA',    'departement_id' => $deptIds['SMA'],        'nominal_tunjangan' => 1100000],
            ['nama_jabatan' => 'Guru Matematika',   'departement_id' => $deptIds['SMP'],        'nominal_tunjangan' => 950000],
            ['nama_jabatan' => 'Guru IPS',          'departement_id' => $deptIds['SMP'],        'nominal_tunjangan' => 950000],
            ['nama_jabatan' => 'Wali Kelas SMP',    'departement_id' => $deptIds['SMP'],        'nominal_tunjangan' => 1050000],
            ['nama_jabatan' => 'Guru Kelas SD',     'departement_id' => $deptIds['SD'],         'nominal_tunjangan' => 900000],
            ['nama_jabatan' => 'Guru Agama SD',     'departement_id' => $deptIds['SD'],         'nominal_tunjangan' => 900000],
        ];

        $posIds = [];
        foreach ($positions as $p) {
            $posIds[] = DB::table('positions')->insertGetId(array_merge($p, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // ── 4. KPI Criteria (per position) ────────────────────────
        $criteriaData = [
            // Kepala Sekolah (posIds[0])
            [$posIds[0], 'Kepemimpinan',          'Penilaian kemampuan memimpin',      'observasi',  30],
            [$posIds[0], 'Manajemen Program',      'Perencanaan & pelaksanaan program', 'laporan',    30],
            [$posIds[0], 'Hubungan Stakeholder',   'Koordinasi dengan orang tua/dinas', 'kuesioner',  20],
            [$posIds[0], 'Administrasi Sekolah',   'Kelengkapan dokumen sekolah',       'dokumen',    20],
            // Kepala TU (posIds[1])
            [$posIds[1], 'Ketepatan Administrasi', 'Keakuratan dokumen TU',             'audit',      40],
            [$posIds[1], 'Kecepatan Layanan',      'Waktu respon layanan TU',           'pengukuran', 30],
            [$posIds[1], 'Pengelolaan Arsip',      'Kerapian & kelengkapan arsip',      'inspeksi',   30],
            // Guru Matematika SMA (posIds[6])
            [$posIds[6], 'Penguasaan Materi',      'Kedalaman pemahaman materi ajar',   'observasi',  30],
            [$posIds[6], 'Metode Mengajar',        'Variasi metode pembelajaran',       'observasi',  25],
            [$posIds[6], 'Nilai Siswa',            'Rata-rata nilai ulangan siswa',     'data_nilai', 30],
            [$posIds[6], 'Kedisiplinan Mengajar',  'Kehadiran & ketepatan waktu',       'absensi',    15],
            // Guru Bahasa Indo SMA (posIds[7])
            [$posIds[7], 'Penguasaan Materi',      'Kedalaman pemahaman materi ajar',   'observasi',  30],
            [$posIds[7], 'Metode Mengajar',        'Variasi metode pembelajaran',       'observasi',  25],
            [$posIds[7], 'Nilai Siswa',            'Rata-rata nilai ulangan siswa',     'data_nilai', 30],
            [$posIds[7], 'Perangkat Mengajar',     'Kelengkapan RPP & silabus',         'dokumen',    15],
            // Guru IPA SMA (posIds[9])
            [$posIds[9], 'Penguasaan Materi',      'Kedalaman pemahaman materi ajar',   'observasi',  30],
            [$posIds[9], 'Praktikum',              'Pelaksanaan kegiatan lab',           'laporan',    25],
            [$posIds[9], 'Nilai Siswa',            'Rata-rata nilai ulangan siswa',     'data_nilai', 30],
            [$posIds[9], 'Perangkat Mengajar',     'Kelengkapan RPP & silabus',         'dokumen',    15],
            // Bendahara (posIds[3])
            [$posIds[3], 'Akurasi Laporan',        'Ketepatan laporan keuangan',        'audit',      40],
            [$posIds[3], 'Ketepatan Waktu',        'Laporan tepat waktu',               'pengukuran', 30],
            [$posIds[3], 'Pengelolaan Anggaran',   'Efisiensi penggunaan anggaran',     'analisis',   30],
            // Guru Kelas SD (posIds[14])
            [$posIds[14], 'Penguasaan Materi',     'Kedalaman pemahaman materi ajar',   'observasi',  30],
            [$posIds[14], 'Pengelolaan Kelas',     'Kondisi & suasana belajar',         'observasi',  30],
            [$posIds[14], 'Nilai Siswa',           'Rata-rata nilai ulangan siswa',     'data_nilai', 40],
        ];

        $kpiCriteriaIds = [];
        foreach ($criteriaData as $c) {
            $kpiCriteriaIds[] = DB::table('kpi_criteria')->insertGetId([
                'position_id'    => $c[0],
                'nama_kriteria'  => $c[1],
                'deskripsi'      => $c[2],
                'metode_ukur'    => $c[3],
                'jenis_tunjangan' => 'kinerja',
                'bobot'          => $c[4],
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }

        // ── 5. Employees ──────────────────────────────────────────
        $employeeNames = [
            'Budi Santoso',
            'Siti Rahayu',
            'Ahmad Fauzi',
            'Dewi Lestari',
            'Rizky Pratama',
            'Nina Susanti',
            'Hendra Wijaya',
            'Rina Marlina',
            'Doni Kurniawan',
            'Leni Wulandari',
            'Fajar Nugroho',
            'Yuni Astuti',
            'Wahyu Hidayat',
            'Sri Mulyani',
            'Agus Setiawan',
            'Putri Handayani',
            'Eko Prasetyo',
            'Mira Oktavia',
            'Surya Dinata',
            'Fitri Rahmawati',
            'Teguh Santoso',
            'Ayu Puspita',
            'Dedi Kurniadi',
            'Lia Amalia',
            'Rudi Hermawan',
            'Indah Permata',
            'Bambang Susilo',
            'Wati Ningsih',
            'Joko Purnomo',
            'Citra Dewi',
            'Andi Firmansyah',
            'Nurul Hidayah',
            'Bayu Setiadi',
            'Ratna Sari',
            'Hadi Purwanto',
            'Mega Lestari',
            'Arif Rahman',
            'Dian Pertiwi',
            'Ujang Sobari',
            'Nani Suryani',
            'Iwan Setiawan',
            'Tuti Alawiyah',
            'Asep Gunawan',
            'Yayah Rokayah',
            'Dian Novita',
            'Roni Setiawan',
            'Ely Marliana',
            'Tono Hartono',
            'Vina Melinda',
            'Dani Prasetyo',
        ];

        $niy_counter = 1001;
        $employeeIds = [];
        $empPositions = [];

        // Distribute employees across positions
        $positionAssignments = array_fill(0, count($posIds), []);
        foreach ($employeeNames as $i => $name) {
            $posIndex = $i % count($posIds);
            $positionAssignments[$posIndex][] = $i;
        }

        foreach ($employeeNames as $i => $name) {
            $posIndex = $i % count($posIds);
            $posId = $posIds[$posIndex];
            $gajiPokok = 3000000 + (($i % 5) * 500000);

            $empId = DB::table('employees')->insertGetId([
                'nama_karyawan' => $name,
                'niy'           => 'NIY' . str_pad($niy_counter++, 4, '0', STR_PAD_LEFT),
                'status_aktif'  => 1,
                'gaji_pokok'    => $gajiPokok,
                'position_id'   => $posId,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            $employeeIds[] = $empId;
            $empPositions[$empId] = $posId;
        }

        // ── 6. Periods ────────────────────────────────────────────
        $periodIds = [];
        for ($m = 1; $m <= 5; $m++) {
            $status = $m < 5 ? 'selesai' : 'aktif';
            $periodIds[$m] = DB::table('periods')->insertGetId([
                'bulan'      => $m,
                'tahun'      => 2026,
                'status'     => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $activePeriodId = $periodIds[5]; // Maret 2026 = aktif

        // ── 7. KPI Criteria map per position ─────────────────────
        // Build a map: position_id => [criteria_ids]
        $criteriByPosition = [];
        foreach ($criteriaData as $idx => $c) {
            $criteriByPosition[$c[0]][] = $kpiCriteriaIds[$idx];
        }

        // ── 8. KPI Assessments & Discipline Assessments ───────────
        foreach ($periodIds as $month => $periodId) {
            foreach ($employeeIds as $empId) {
                $posId = $empPositions[$empId];

                // Discipline Assessment
                DB::table('discipline_assessments')->insert([
                    'employee_id'      => $empId,
                    'period_id'        => $periodId,
                    'skor_kedisiplinan' => rand(60, 100),
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ]);

                // KPI Assessments — only if criteria exist for this position
                if (!empty($criteriByPosition[$posId])) {
                    foreach ($criteriByPosition[$posId] as $criteriaId) {
                        $skor = rand(65, 100);
                        DB::table('kpi_assessments')->insert([
                            'employee_id'     => $empId,
                            'period_id'       => $periodId,
                            'kpi_criteria_id' => $criteriaId,
                            'skor_kpi'        => $skor,
                            'status'          => $skor >= 85 ? 'sangat_baik' : ($skor >= 70 ? 'baik' : 'cukup'),
                            'created_at'      => now(),
                            'updated_at'      => now(),
                        ]);
                    }
                }
            }
        }

        // ── 9. Payrolls ───────────────────────────────────────────
        $positionTunjangan = array_combine($posIds, array_column($positions, 'nominal_tunjangan'));

        foreach ($periodIds as $month => $periodId) {
            foreach ($employeeIds as $empId) {
                $posId    = $empPositions[$empId];
                $gapok    = DB::table('employees')->where('id', $empId)->value('gaji_pokok');
                $tunjangan = $positionTunjangan[$posId] ?? 500000;
                $potongan = rand(0, 1) ? rand(50000, 300000) : 0;
                $bersih   = $gapok + $tunjangan - $potongan;
                $status   = $month < 5 ? 'sudah_dibayar' : 'belum_dibayar';

                $payrollId = DB::table('payrolls')->insertGetId([
                    'employee_id'    => $empId,
                    'period_id'      => $periodId,
                    'gaji_pokok'     => $gapok,
                    'total_tunjangan' => $tunjangan,
                    'total_potongan' => $potongan,
                    'gaji_bersih'    => $bersih,
                    'status'         => $status,
                    'created_at'     => now(),
                    'updated_at'     => now(),
                ]);

                // Payroll Deductions (only if there's a potongan)
                if ($potongan > 0) {
                    DB::table('payroll_deductions')->insert([
                        'payroll_id'       => $payrollId,
                        'nama_potongan'    => collect(['Keterlambatan', 'Absen Tidak Izin', 'Pinjaman', 'BPJS'])->random(),
                        'deskripsi'        => 'Potongan otomatis bulan ' . $month,
                        'nominal_potongan' => $potongan,
                        'created_at'       => now(),
                        'updated_at'       => now(),
                    ]);
                }
            }
        }
    }
}
