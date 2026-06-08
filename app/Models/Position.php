<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Departemen;

class Position extends Model
{

    protected $fillable = ["nama_jabatan", "departement_id", "nominal_tunjangan"];
    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
}
