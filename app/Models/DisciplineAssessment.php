<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Period;

/**
 * @property int $id
 * @property int $employee_id
 * @property int $period_id
 * @property float $skor_kedisiplinan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Period|null $periods
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DisciplineAssessment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DisciplineAssessment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DisciplineAssessment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DisciplineAssessment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DisciplineAssessment whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DisciplineAssessment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DisciplineAssessment wherePeriodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DisciplineAssessment whereSkorKedisiplinan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DisciplineAssessment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DisciplineAssessment extends Model
{
    //
    protected $fillable = ['employee_id', 'period_id', 'skor_kedisiplinan'];
    public function periods()
    {
        return $this->belongsTo(Period::class);
    }
}
