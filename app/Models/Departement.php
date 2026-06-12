<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Position;

/**
 * @property int $id
 * @property string $nama_departemen
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Position> $positions
 * @property-read int|null $positions_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Departemen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Departemen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Departemen query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Departemen whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Departemen whereNamaDepartemen($value)
 * @mixin \Eloquent
 */
class Departement extends Model
{
    //
    protected $fillable = ['nama_departement'];

    public function positions() #Departemen mempunyai banyak jabatan/Positions
    {
        return $this->hasMany(Position::class);
    }
}
