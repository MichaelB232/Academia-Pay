<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Payroll;
use app\Models\Position;
use app\Models\KpiAssessment;

class Employee extends Model
{
    //
    protected $fillable = ["nama_karyawan", "niy", "status_aktif", "gaji_pokok", "position_id"];

    public function jabatan()
    {
        return $this->belongTo(Position::class);
    }
    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
    public function kpiAssessments()
    {
        return $this->hasMany(KpiAssessment::class);
    }
    public function disciplineAssesments()
    {
        return $this->hasMany(DisciplineAssessment::class);
    }
}
