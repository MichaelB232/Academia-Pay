<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\PayrollDeduction;

/**
 * @property int $id
 * @property int $employee_id
 * @property int $period_id
 * @property float $gaji_pokok
 * @property float $total_tunjangan
 * @property float $total_potongan
 * @property float $gaji_bersih
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Employee $employee
 * @property-read \Illuminate\Database\Eloquent\Collection<int, PayrollDeduction> $payroll_deductions
 * @property-read int|null $payroll_deductions_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereGajiBersih($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereGajiPokok($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll wherePeriodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereTotalPotongan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereTotalTunjangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payroll whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Payroll extends Model
{
    protected $fillable = ["employee_id", "period_id", "gaji_pokok", "total_tunjangan", "total_potongan", "gaji_bersih","status"];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function payroll_deductions()
    {
        return $this->hasMany(PayrollDeduction::class);
    }
}
