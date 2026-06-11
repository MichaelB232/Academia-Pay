<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $employee_id
 * @property int $period_id
 * @property int $kpi_criteria_id
 * @property float $skor_kpi
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee $employee
 * @property-read \App\Models\KpiCriteria $kpiCriteria
 * @property-read \App\Models\Period $period
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiAssessment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiAssessment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiAssessment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiAssessment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiAssessment whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiAssessment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiAssessment whereKpiCriteriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiAssessment wherePeriodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiAssessment whereSkorKpi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiAssessment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiAssessment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class KpiAssessment extends Model
{
    //
    protected $fillable = ['employee_id', 'period_id', 'kpi_criteria_id', 'skor_kpi'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function period()
    {
        return $this->belongsTo(Period::class);
    }
    public function kpiCriteria()
    {
        return $this->belongsTo(KpiCriteria::class);
    }
}
