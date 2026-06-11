<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Departemen;
use App\Models\Employee;
use App\Models\KpiCriteria;

/**
 * @property int $id
 * @property string $nama_jabatan
 * @property int $departemen_id
 * @property float $nominal_tunjangan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \app\Models\Departemen $departemen
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Employee> $employees
 * @property-read int|null $employees_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, KpiCriteria> $kpiCriterias
 * @property-read int|null $kpi_criterias_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position whereDepartemenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position whereNamaJabatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position whereNominalTunjangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Position whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Position extends Model
{

    protected $fillable = ["nama_jabatan", "departement_id", "nominal_tunjangan"];
    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    public function kpiCriterias()
    {
        return $this->hasMany(KpiCriteria::class);
    }
}
