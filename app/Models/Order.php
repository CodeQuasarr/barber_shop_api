<?php

namespace App\Models;

use App\Models\Haircuts\HairCut;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['user_id', 'total_price'];

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

    public function haircuts(): BelongsToMany
    {
        return $this->belongsToMany(HairCut::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
