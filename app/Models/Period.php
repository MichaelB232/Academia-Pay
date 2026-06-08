<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = ['bulan', 'tahun', 'status'];

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }

    public function disciplineAssessments()
    {
        return $this->hasMany(DisciplineAssessment::class);
    }

    public function kpiAssessments()
    {
        return $this->hasMany(KpiAssessment::class);
    }
}
