<?php

namespace App\Models\Haircuts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class HairCutCategory
 *
 * @package App\Models\HaircutCategories
 * @property int $id
 * @property string $name
 */
class HairCutCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'created_at', 'updated_at', 'deleted_at'];

    public function hairCuts(): HasMany
    {
        return $this->hasMany(HairCut::class);
    }

}
