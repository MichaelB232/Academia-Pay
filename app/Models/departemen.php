<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Position;

class Departemen extends Model
{
    //
    protected $fillable = ["nama_departemen"];

    public function jabatan()
    {
        return $this->hasMany(Position::class);
    }
}
