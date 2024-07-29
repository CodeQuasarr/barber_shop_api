<?php

namespace App\Models\Haircuts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;


/**
 * Class HairCut
 *
 * @package App\Models\Haircuts
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string imageSrc
 * @property string imageAlt
 * @property string stripe_product_id
 * @property float $price
 * @property int $hair_cut_category_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 */
class HairCut extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'hair_cuts';

    protected $fillable = ['stripe_product_id', 'hair_cut_category_id', 'name', 'description', 'price', 'imageSrc', 'imageAlt', 'date', 'sales', 'isOnSale', 'date', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'float',
        ];
    }

    public function category(): hasOne
    {
        return $this->hasOne(HairCutCategory::class, 'id', 'hair_cut_category_id');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(HairCutReservation::class);
    }

    public function getName(): string
    {
        return $this->name;
    }

//    public function getFormattedPriceAttribute(): string
//    {
//        return number_format($this->price, 2);
//    }

//    public function getFormattedNameAttribute(): string
//    {
//        return ucwords($this->name);
//    }

//    public function getFormattedDescriptionAttribute(): string
//    {
//        return ucfirst($this->description);
//    }

//    public function getFormattedCategoryAttribute()
//    {
//        return ucwords($this->category->name);
//    }
}
