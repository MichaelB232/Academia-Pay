<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Payroll;
use App\Models\Position;
use App\Models\KpiAssessment;

/**
 * @property int $id
 * @property string $nama_karyawan
 * @property string $niy
 * @property int $status_aktif
 * @property float $gaji_pokok
 * @property int $position_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DisciplineAssessment> $disciplineAssesments
 * @property-read int|null $discipline_assesments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, KpiAssessment> $kpiAssessments
 * @property-read int|null $kpi_assessments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Payroll> $payrolls
 * @property-read int|null $payrolls_count
 * @property-read Position $position
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereGajiPokok($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereNamaKaryawan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereNiy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereStatusAktif($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Employee whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Employee extends Model
{
    //
    protected $fillable = ["nama_karyawan", "niy", "status_aktif", "gaji_pokok", "position_id"];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
    public function kpiAssessments()
    {
        return $this->hasMany(KpiAssessment::class);
    }
    public function disciplineAssesments()
    {
        return $this->hasMany(DisciplineAssessment::class);
    }
}
