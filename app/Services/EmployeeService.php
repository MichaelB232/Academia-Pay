<?php

namespace App\Services;

use App\Models\DisciplineAssessment;
use App\Models\Employee;
use App\Models\KpiAssessment;
use App\Models\KpiCriteria;
use App\Models\Payroll;
use App\Models\Period;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class EmployeeService
{
    public function create(array $data): Employee
    {
        return DB::transaction(function () use ($data) {
            $employee =  Employee::create($data);
            $period = Period::where('status', 'open')->firstOrFail();
            $this->generatePayroll($period, $employee);
            $this->generateDisciplineAssessments($period, $employee);
            $criterias = KpiCriteria::where('position_id', $employee->position_id)->get();
            $this->generateKpiAssessments($period, $employee, $criterias);
            return $employee;
        });
    }
    public function update(Employee $employee, array $data): bool
    {
        return DB::transaction(function () use ($employee, $data) {
            $employee->update($data);
            $this->updateCurrentPayroll($employee);
            return true;
        });
    }
    public function delete(Employee $employee): bool
    {
        return $employee->delete();
    }
    private function generatePayroll(Period $period, Employee $employee): void
    {
        Payroll::create(['employee_id' => $employee->id, 'period_id' => $period->id, 'gaji_pokok' => $employee->gaji_pokok, 'gaji_bersih' => $employee->gaji_pokok]);
    }

    private function updateCurrentPayroll(Employee $employee)
    {
        $period = Period::where('status', 'open')->first();
        Payroll::where('employee_id', $employee->id)->where('period_id', $period->id)->where('status', 'belum_dibayar')->update(['gaji_pokok' => $employee->gaji_pokok]);
    }
    private function generateKpiAssessments(Period $period, Employee $employee, Collection $criterias): void
    {
        foreach ($criterias as $criteria) {
            KpiAssessment::create(['employee_id' => $employee->id, 'kpi_criteria_id' => $criteria->id, 'period_id' => $period->id]);
        }
    }
    private function generateDisciplineAssessments(Period $period, Employee $employee): void
    {
        DisciplineAssessment::create(['employee_id' => $employee->id, 'period_id' => $period->id]);
    }
}
