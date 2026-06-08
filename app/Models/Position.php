<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Departemen;
use App\Models\Employee;
use App\Models\KpiCriteria;

class Position extends Model
{

    protected $fillable = ["nama_jabatan", "departement_id", "nominal_tunjangan"];
    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    public function kpiCriterias()
    {
        return $this->hasMany(KpiCriteria::class);
    }
}
