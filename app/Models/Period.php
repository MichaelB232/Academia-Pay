<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $bulan
 * @property string $tahun
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DisciplineAssessment> $disciplineAssessments
 * @property-read int|null $discipline_assessments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\KpiAssessment> $kpiAssessments
 * @property-read int|null $kpi_assessments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Payroll> $payrolls
 * @property-read int|null $payrolls_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period whereBulan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period whereTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Period whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Period extends Model
{
    protected $fillable = ['bulan', 'tahun', 'status'];

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }

    public function disciplineAssessments()
    {
        return $this->hasMany(DisciplineAssessment::class);
    }

    public function kpiAssessments()
    {
        return $this->hasMany(KpiAssessment::class);
    }
}
