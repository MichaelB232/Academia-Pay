<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KpiAssessment extends Model
{
    //
    protected $fillable = ['employee_id', 'period_id', 'kpi_criteria_id', 'skor_kpi'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function period()
    {
        return $this->belongsTo(Period::class);
    }
    public function kpiCriteria()
    {
        return $this->belongsTo(KpiCriteria::class);
    }
}
