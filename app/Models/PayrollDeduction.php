<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayrollDeduction extends Model
{
    //
    protected $fillable = ['payroll_id', 'nama_potongan', 'deskripsi', 'nominal_potongan'];

    public function payroll()
    {
        return $this->belongsTo(Payroll::class);
    }
}
