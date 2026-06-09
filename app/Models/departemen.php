<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Position;

class Departemen extends Model
{
    //
    protected $fillable = ["nama_departemen"];

    public function positions() #Departemen mempunyai banyak jabatan/Positions
    {
        return $this->hasMany(Position::class);
    }
}
