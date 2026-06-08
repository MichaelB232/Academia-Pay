<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Position;

class KpiCriteria extends Model
{
    //
    protected $fillable = ['position_id', 'nama_kriteria', 'deskripsi', 'metode_ukur', 'integrasi_kpi', 'bobot'];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function kpiAssessments()
    {
        return $this->hasMany(KpiAssessment::class);
    }
}
