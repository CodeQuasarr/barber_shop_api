<?php

namespace App\Models\Haircuts;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;


/**
 * Class HairCutReservation
 *
 * @package App\Models\HairCutReservation
 *
 * @property int $id
 * @property int $hair_cut_id
 * @property int $user_id
 * @property Carbon $start_date
 * @property Carbon $start_time
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 */
class HairCutReservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['hair_cut__id', 'user_id', 'start_date', 'start_time', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'start_time' => 'time',
            'status' => 'integer',
        ];
    }

    const  STATUS_PENDING = 0;
    const  STATUS_CONFIRMED = 1;
    const  STATUS_CANCELLED = 2;

    public function hairCut(): BelongsTo
    {
        return $this->belongsTo(HairCut::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedStatusAttribute(): string
    {
        $statuses = [
            0 => 'Pending',
            1 => 'Confirmed',
            2 => 'Cancelled',
        ];

        return $statuses[$this->status];
    }

    public function getFormattedStartDateAttribute(): string
    {
        return $this->start_date->format('Y-m-d');
    }

    public function getFormattedStartTimeAttribute(): string
    {
        return $this->start_time->format('H:i');
    }


}
