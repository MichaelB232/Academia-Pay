<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $payroll_id
 * @property string $nama_potongan
 * @property string $deskripsi
 * @property float $nominal_potongan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Payroll $payroll
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollDeduction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollDeduction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollDeduction query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollDeduction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollDeduction whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollDeduction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollDeduction whereNamaPotongan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollDeduction whereNominalPotongan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollDeduction wherePayrollId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PayrollDeduction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PayrollDeduction extends Model
{
    //
    protected $fillable = ['payroll_id', 'nama_potongan', 'deskripsi', 'nominal_potongan'];

    public function payroll()
    {
        return $this->belongsTo(Payroll::class);
    }
}
