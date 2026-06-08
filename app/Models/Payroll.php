<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\PayrollDeduction;

class Payroll extends Model
{
    protected $fillable = ["employee_id", "period_id", "gaji_pokok", "total_tunjangan", "total_potongan", "gaji_bersih"];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function payroll_deductions()
    {
        return $this->hasMany(PayrollDeduction::class);
    }
}
