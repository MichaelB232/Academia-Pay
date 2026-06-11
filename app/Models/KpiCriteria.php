<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Position;

/**
 * @property int $id
 * @property int $position_id
 * @property string $nama_kriteria
 * @property string $deskripsi
 * @property string $jenis_tunjangan
 * @property float $bobot
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\KpiAssessment> $kpiAssessments
 * @property-read int|null $kpi_assessments_count
 * @property-read Position $position
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiCriteria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiCriteria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiCriteria query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiCriteria whereBobot($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiCriteria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiCriteria whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiCriteria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiCriteria whereJenisTunjangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiCriteria whereNamaKriteria($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiCriteria wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|KpiCriteria whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class KpiCriteria extends Model
{
    //
    protected $fillable = ['position_id', 'nama_kriteria', 'deskripsi', 'metode_ukur', 'jenis_tunjangan', 'bobot'];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function kpiAssessments()
    {
        return $this->hasMany(KpiAssessment::class);
    }
}
