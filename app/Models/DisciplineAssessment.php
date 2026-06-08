<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Period;

class DisciplineAssessment extends Model
{
    //
    protected $fillable = ['employee_id', 'period_id', 'skor_kedisiplinan'];

    public function periods()
    {
        return $this->hasMany(Period::class);
    }
}
