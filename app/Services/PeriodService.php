<?php

namespace app\Services;

use App\Models\DisciplineAssessment;
use App\Models\Employee;
use App\Models\KpiAssessment;
use App\Models\KpiCriteria;
use App\Models\Payroll;
use App\Models\Period;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PeriodService
{
    public function createPeriod(int $month, int $year): Period
    {
        return Period::create([
            'bulan' => $month,
            'tahun' => $year,
            'status' => "open"
        ]);
    }

    private function generatePayrolls(Period $period, Collection $employees): void
    {
        $timestamp = now();
        $payrollRows = [];
        foreach ($employees as $employee) {

            $payrollRows[] = [
                'employee_id' => $employee->id,
                'period_id' => $period->id,
                'gaji_pokok' => $employee->gaji_pokok,
                'gaji_bersih' => $employee->gaji_pokok,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];
        }
        if (!empty($payrollRows)) {
            Payroll::insert($payrollRows);
        }
    }
    private function generateKPIAssessments(Period $period, Collection $employees): void
    {
        $KpiAssessmentsRows = [];
        $timestamp = now();
        $criteriaByPosition = KpiCriteria::all()->groupBy('position_id');
        foreach ($employees as $employee) {
            // $kpi_criterias = KpiCriteria::where('position_id',$employee->position_id)->pluck('id');
            $criteria = $criteriaByPosition[$employee->position_id] ?? collect();
            foreach ($criteria as $criterion) {
                $KpiAssessmentsRows[] = ['period_id' => $period->id, 'employee_id' => $employee->id, 'kpi_criteria_id' => $criterion->id, 'created_at' => $timestamp, 'updated_at' => $timestamp];
            }
        }
        if (!empty($KpiAssessmentsRows)) {
            KpiAssessment::insert($KpiAssessmentsRows);
        }
    }
    private function generateDisciplineAssessments(Period $period, Collection $employees): void
    {
        $timestamp = now();
        $DisciplineAssessmentsRows = [];
        foreach ($employees as $employee) {
            $DisciplineAssessmentsRows[] = ['period_id' => $period->id, 'employee_id' => $employee->id, 'created_at' => $timestamp, 'updated_at' => $timestamp];
        }
        if (!empty($DisciplineAssessmentsRows)) {
            DisciplineAssessment::insert($DisciplineAssessmentsRows);
        }
    }
    public function ensureCurrentPeriodExists(): Period
    {
        $month = now()->month;
        $year = now()->year;

        $existing_period = Period::where('bulan', $month)->where('tahun', $year)->first();

        if ($existing_period) {
            return $existing_period;
        }

        return DB::transaction(function () use ($month, $year) {
            $period = $this->createPeriod($month, $year);
            $employees = Employee::where('status_aktif', true)->get();

            $this->generatePayrolls($period, $employees);
            $this->generateKPIAssessments($period, $employees);
            $this->generateDisciplineAssessments($period, $employees);

            return $period;
        });
    }
}
